/** Server-only helpers for Cloudflare Pages Functions. Never expose secrets to HTML. */
const enc = new TextEncoder();
export const CATEGORIES = ['announcement', 'fee', 'training', 'match', 'event', 'holiday', 'photo', 'video', 'general'];
export const GROUP_IDS = ['group-1', 'group-2', 'group-3', 'group-4'];
export const SESSION_AGE = 60 * 60 * 8;

export function json(data, status = 200, extra = {}) {
  return new Response(JSON.stringify(data), {
    status,
    headers: {
      'Content-Type': 'application/json; charset=utf-8',
      'Cache-Control': 'no-store',
      'X-Content-Type-Options': 'nosniff',
      ...extra
    }
  });
}
export function configured(env) {
  return !!(env?.DB && typeof env.YSCA_MANAGER_PASSWORD === 'string' &&
    env.YSCA_MANAGER_PASSWORD.length >= 12 &&
    typeof env.YSCA_MANAGER_SESSION_SECRET === 'string' &&
    env.YSCA_MANAGER_SESSION_SECRET.length >= 32);
}
export function sameOrigin(request) {
  const origin = request.headers.get('Origin');
  const fetchSite = request.headers.get('Sec-Fetch-Site');
  return (!origin || origin === new URL(request.url).origin) && fetchSite !== 'cross-site';
}
function encode64(input) {
  return btoa(String.fromCharCode(...input)).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
}
function decode64(s) {
  const base64 = s.replace(/-/g, '+').replace(/_/g, '/');
  return Uint8Array.from(atob(base64.padEnd(Math.ceil(base64.length / 4) * 4, '=')), c => c.charCodeAt(0));
}
function equalBytes(a, b) {
  if (a.length !== b.length) return false;
  let diff = 0;
  for (let i = 0; i < a.length; i++) diff |= a[i] ^ b[i];
  return diff === 0;
}
export async function passwordMatches(supplied, expected) {
  if (typeof supplied !== 'string' || supplied.length > 512) return false;
  // Hash both before comparing to avoid content-dependent early return.
  const [a, b] = await Promise.all([
    crypto.subtle.digest('SHA-256', enc.encode(supplied)),
    crypto.subtle.digest('SHA-256', enc.encode(expected))
  ]);
  return equalBytes(new Uint8Array(a), new Uint8Array(b));
}
async function hmacKey(secret) {
  return crypto.subtle.importKey('raw', enc.encode(secret), { name: 'HMAC', hash: 'SHA-256' }, false, ['sign', 'verify']);
}
export async function sessionCookie(secret) {
  const payload = encode64(enc.encode(JSON.stringify({
    role: 'manager', exp: Math.floor(Date.now() / 1000) + SESSION_AGE
  })));
  const signature = await crypto.subtle.sign('HMAC', await hmacKey(secret), enc.encode(payload));
  return 'ysca_session=' + payload + '.' + encode64(new Uint8Array(signature)) +
    '; Path=/api/manager; Max-Age=' + SESSION_AGE + '; Secure; HttpOnly; SameSite=Strict';
}
export const clearSessionCookie =
  'ysca_session=; Path=/api/manager; Max-Age=0; Secure; HttpOnly; SameSite=Strict';

export async function hasSession(request, secret) {
  if (typeof secret !== 'string' || secret.length < 32) return false;
  const cookies = request.headers.get('Cookie') || '';
  const raw = cookies.split(';').map(s => s.trim()).find(s => s.startsWith('ysca_session='));
  if (!raw) return false;
  const value = raw.slice('ysca_session='.length);
  const [payload, sig, extra] = value.split('.');
  if (!payload || !sig || extra || value.length > 800) return false;
  try {
    const valid = await crypto.subtle.verify('HMAC', await hmacKey(secret), decode64(sig), enc.encode(payload));
    if (!valid) return false;
    const obj = JSON.parse(new TextDecoder().decode(decode64(payload)));
    return obj?.role === 'manager' && Number.isInteger(obj.exp) &&
      obj.exp > Math.floor(Date.now() / 1000) && obj.exp <= Math.floor(Date.now() / 1000) + SESSION_AGE;
  } catch (_) { return false; }
}
export async function rateCheck(db, request, salt) {
  const ip = request.headers.get('CF-Connecting-IP') || 'unknown';
  const keyBytes = await crypto.subtle.digest('SHA-256', enc.encode(salt + ':' + ip));
  const ipHash = Array.from(new Uint8Array(keyBytes)).map(n => n.toString(16).padStart(2,'0')).join('');
  const now = Math.floor(Date.now() / 1000);
  const expires = now + 900;
  await db.prepare(`INSERT INTO ysca_manager_auth_attempts (ip_hash, attempts, window_expires)
    VALUES (?, 1, ?)
    ON CONFLICT(ip_hash) DO UPDATE SET
    attempts = CASE WHEN window_expires <= ? THEN 1 ELSE attempts + 1 END,
    window_expires = CASE WHEN window_expires <= ? THEN ? ELSE window_expires END`
  ).bind(ipHash, expires, now, now, expires).run();
  const row = await db.prepare('SELECT attempts FROM ysca_manager_auth_attempts WHERE ip_hash = ?').bind(ipHash).first();
  return (row?.attempts || 0) <= 8;
}
export function normalizeUpdate(body) {
  if (!body || typeof body !== 'object' || Array.isArray(body)) throw new Error('Invalid update');
  const title = typeof body.title === 'string' ? body.title.trim() : '';
  const message = typeof body.body === 'string' ? body.body.trim() : '';
  if (title.length < 4 || title.length > 140) throw new Error('Title must be 4–140 characters');
  if (message.length < 5 || message.length > 3500) throw new Error('Message must be 5–3500 characters');
  const category = String(body.category || '');
  if (!CATEGORIES.includes(category)) throw new Error('Invalid category');
  const visibility = body.visibility === 'private' ? 'private' : body.visibility === 'public' ? 'public' : null;
  if (!visibility) throw new Error('Choose public or private visibility');
  const website = body.website === true;
  const telegram = body.telegram === true;
  // V2: WhatsApp recipient choice happens inside WhatsApp, not on the website.
  // Keep legacy group IDs readable without a D1 schema migration.
  const groups = typeof body.whatsapp === 'boolean' ?
    (body.whatsapp ? ['__share__'] : []) : body.groups;
  if (!Array.isArray(groups) || groups.length > 4 ||
      groups.some(g => g !== '__share__' && !GROUP_IDS.includes(g)) ||
      new Set(groups).size !== groups.length) {
    throw new Error('Choose a valid sharing destination');
  }
  if (!website && !telegram && !groups.length) throw new Error('Choose at least one sharing destination');
  if (website && visibility !== 'public') throw new Error('Private updates cannot be published on the public website');
  // Financial reminders are private by default and never published to public news.
  if (category === 'fee' && (website || visibility !== 'private')) {
    throw new Error('Fee reminders must stay private; use Announcement for a general public fee deadline');
  }
  let videoUrl = '';
  if (body.video_url) {
    if (typeof body.video_url !== 'string' || body.video_url.length > 300) throw new Error('Invalid YouTube video URL');
    let parsed;
    try { parsed = new URL(body.video_url); } catch (_) { throw new Error('Invalid YouTube video URL'); }
    if (parsed.protocol !== 'https:' || !['www.youtube.com','youtube.com','youtu.be'].includes(parsed.hostname)) {
      throw new Error('Please enter a YouTube video URL');
    }
    let videoId = '';
    if (parsed.hostname === 'youtu.be') {
      videoId = parsed.pathname.split('/')[1] || '';
    } else {
      const parts = parsed.pathname.split('/').filter(Boolean);
      if (parts[0] === 'watch') videoId = parsed.searchParams.get('v') || '';
      else if (['shorts','live','embed','v'].includes(parts[0])) videoId = parts[1] || '';
    }
    if (!/^[A-Za-z0-9_-]{11}$/.test(videoId)) {
      throw new Error('Please enter a link to a specific YouTube video, not a channel or playlist');
    }
    videoUrl = 'https://www.youtube.com/watch?v=' + videoId;
  }
  const mediaId = body.media_id ? String(body.media_id) : '';
  if (mediaId && !/^[0-9a-f-]{36}$/.test(mediaId)) throw new Error('Invalid media ID');
  return { title, message, category, visibility, website, telegram, groups, videoUrl, mediaId };
}
export async function deliverTelegram(env, update) {
  if (!update.publish_telegram) return 'not_requested';
  if (!env.TELEGRAM_BOT_TOKEN || !env.TELEGRAM_CHAT_ID) return 'not_configured';
  const message = update.title + '\n\n' + update.body +
    (update.publish_website && update.visibility === 'public' ?
      '\n\nhttps://youngstarcricketacademy.com/updates' : '');
  try {
    const result = await fetch('https://api.telegram.org/bot' + env.TELEGRAM_BOT_TOKEN + '/sendMessage', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ chat_id: env.TELEGRAM_CHAT_ID, text: message.slice(0, 4096),
        disable_web_page_preview: true })
    });
    return result.ok ? 'sent' : 'failed';
  } catch (_) { return 'failed'; }
}
