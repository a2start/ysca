import { json, configured, hasSession, sameOrigin, normalizeUpdate, deliverTelegram } from '../../_lib/ysca-manager.js';

async function authorize(request, env) {
  return configured(env) && await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET);
}
const columns = 'id,title,body,category,visibility,status,publish_website,publish_telegram,whatsapp_groups,media_id,video_url,telegram_status,created_at,updated_at,published_at';
function serialize(r) {
  return { ...r, publish_website: !!r.publish_website, publish_telegram: !!r.publish_telegram,
    whatsapp_groups: JSON.parse(r.whatsapp_groups || '[]') };
}
export async function onRequestGet({ request, env }) {
  if (!await authorize(request, env)) return json({ error: 'Login required' }, 401);
  try {
    const results = await env.DB.prepare('SELECT ' + columns + ' FROM ysca_updates ORDER BY created_at DESC LIMIT 150').all();
    const groups = await env.DB.prepare('SELECT id,label FROM ysca_whatsapp_groups ORDER BY id').all();
    return json({ items: (results.results || []).map(serialize), groups: groups.results || [] });
  } catch (e) {
    console.error('YSCA dashboard list failed:', e);
    return json({ error: 'Updates database unavailable; apply migration' }, 503);
  }
}
export async function onRequestPost({ request, env, context }) {
  if (!await authorize(request, env)) return json({ error: 'Login required' }, 401);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  if (!(request.headers.get('content-type') || '').includes('application/json')) return json({ error: 'JSON required' }, 415);
  const input = await request.json().catch(() => null);
  let form;
  try { form = normalizeUpdate(input); } catch (e) { return json({ error: e.message || 'Invalid data' }, 400); }
  // Publish only after an explicit action; saving a draft never sends anything.
  const publish = input.action === 'publish';
  if (!['draft', 'publish'].includes(input.action)) return json({ error: 'Select Save draft or Publish' }, 400);
  if (form.mediaId) {
    const media = await env.DB.prepare('SELECT id FROM ysca_update_media WHERE id = ?').bind(form.mediaId).first();
    if (!media) return json({ error: 'Uploaded file not found' }, 400);
  }
  const id = crypto.randomUUID(), now = new Date().toISOString();
  const published = publish && form.website && form.visibility === 'public';
  const activated = publish && (published || form.telegram);
  try {
    await env.DB.prepare(`INSERT INTO ysca_updates
      (id,title,body,category,visibility,status,publish_website,publish_telegram,
       whatsapp_groups,media_id,video_url,telegram_status,created_at,updated_at,published_at)
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)`)
      .bind(id, form.title, form.message, form.category, form.visibility,
        activated ? 'published' : 'draft',
        form.website ? 1 : 0, form.telegram ? 1 : 0,
        JSON.stringify(form.groups), form.mediaId || null, form.videoUrl || null,
        publish && form.telegram ? 'pending' : 'not_requested', now, now, published ? now : null).run();
  } catch (e) {
    console.error('YSCA save failed:', e);
    return json({ error: 'Could not save update. Check your database migration.' }, 503);
  }
  let telegramStatus = 'not_requested';
  if (publish && form.telegram) {
    telegramStatus = await deliverTelegram(env, {
      title: form.title, body: form.message, publish_website: published, visibility: form.visibility, publish_telegram: 1
    });
    await env.DB.prepare('UPDATE ysca_updates SET telegram_status = ? WHERE id = ?')
      .bind(telegramStatus, id).run().catch(e => console.error('Telegram delivery log failed', e));
  }
  return json({ success: true, id, status: activated ? 'published' : 'draft',
    telegram_status: telegramStatus,
    whatsapp: form.groups.length ? 'ready_to_share_manually' : 'not_selected' }, 201);
}
