import { configured, json, sameOrigin, passwordMatches, sessionCookie, clearSessionCookie, hasSession, rateCheck } from '../../_lib/ysca-manager.js';

export async function onRequestGet({ request, env }) {
  if (!configured(env)) {
    // Temporary staging-only diagnosis: expose missing setting names, never secret values.
    // Keep production responses generic, and remove this branch-only diagnostic after setup.
    const isDashboardPreview = new URL(request.url).hostname ===
      'feature-manager-updates-dash.ysca.pages.dev';
    if (!isDashboardPreview) return json({ authenticated: false, configured: false }, 503);

    const missing = [];
    if (!env?.DB) missing.push('DB (D1 database binding)');
    if (typeof env?.YSCA_MANAGER_PASSWORD !== 'string' ||
        env.YSCA_MANAGER_PASSWORD.length < 12) {
      missing.push('YSCA_MANAGER_PASSWORD (minimum 12 characters)');
    }
    if (typeof env?.YSCA_MANAGER_SESSION_SECRET !== 'string' ||
        env.YSCA_MANAGER_SESSION_SECRET.length < 32) {
      missing.push('YSCA_MANAGER_SESSION_SECRET (minimum 32 characters)');
    }
    return json({
      authenticated: false,
      configured: false,
      missing,
      error: 'Preview setup incomplete: ' + missing.join('; ')
    }, 503);
  }
  return json({ authenticated: await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET), configured: true });
}

export async function onRequestPost({ request, env }) {
  if (!configured(env)) return json({ error: 'Manager system is not configured. See deployment guide.' }, 503);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  const type = request.headers.get('content-type') || '';
  if (!type.includes('application/json')) return json({ error: 'JSON required' }, 415);
  const input = await request.json().catch(() => null);
  if (input?.action === 'logout') return json({ success: true }, 200, { 'Set-Cookie': clearSessionCookie });
  if (input?.action !== 'login') return json({ error: 'Invalid action' }, 400);
  const allowed = await rateCheck(env.DB, request, env.YSCA_MANAGER_SESSION_SECRET);
  if (!allowed) return json({ error: 'Too many login attempts. Try again in 15 minutes.' }, 429);
  if (!await passwordMatches(input.password, env.YSCA_MANAGER_PASSWORD)) {
    return json({ error: 'Incorrect password' }, 401);
  }
  const cookie = await sessionCookie(env.YSCA_MANAGER_SESSION_SECRET);
  return json({ success: true }, 200, { 'Set-Cookie': cookie });
}
