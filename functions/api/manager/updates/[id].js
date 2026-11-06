import { configured, json, sameOrigin, hasSession, normalizeUpdate, deliverTelegram } from '../../../_lib/ysca-manager.js';

export async function onRequestPatch({ request, env, params }) {
  if (!configured(env) || !await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET)) return json({ error: 'Login required' }, 401);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  const id = String(params.id || '');
  if (!/^[0-9a-f-]{36}$/.test(id)) return json({ error: 'Invalid ID' }, 400);
  const input = await request.json().catch(() => null);
  if (!input || !['publish', 'archive'].includes(input.action)) return json({ error: 'Invalid action' }, 400);
  const existing = await env.DB.prepare('SELECT * FROM ysca_updates WHERE id = ?').bind(id).first();
  if (!existing) return json({ error: 'Not found' }, 404);
  if (input.action === 'archive') {
    await env.DB.prepare("UPDATE ysca_updates SET status='archived', publish_website=0, updated_at=? WHERE id=?")
      .bind(new Date().toISOString(), id).run();
    return json({ success: true, status: 'archived' });
  }
  if (existing.status !== 'draft') return json({ error: 'Only drafts can be published' }, 409);
  // Enforce the original destination choices, especially private fee reminders.
  const f = normalizeUpdate({ title: existing.title, body: existing.body,
    category: existing.category, visibility: existing.visibility,
    website: !!existing.publish_website, telegram: !!existing.publish_telegram,
    groups: JSON.parse(existing.whatsapp_groups || '[]'),
    media_id: existing.media_id, video_url: existing.video_url });
  // Drafts store destinations, but do not publish until explicitly requested.
  const website = f.website && f.visibility === 'public';
  const telegram = f.telegram;
  if (!website && !telegram) return json({ error: 'Only WhatsApp sharing is available for this draft; use the Share action' }, 400);
  const now = new Date().toISOString();
  await env.DB.prepare("UPDATE ysca_updates SET status=?, publish_website=?, updated_at=?, published_at=?, telegram_status=? WHERE id=?")
    .bind('published', website ? 1 : 0, now, website ? now : null, telegram ? 'pending' : 'not_requested', id).run();
  let telegramStatus = 'not_requested';
  if (telegram) {
    telegramStatus = await deliverTelegram(env, {
      title: existing.title, body: existing.body, publish_website: website,
      visibility: existing.visibility, publish_telegram: 1
    });
    await env.DB.prepare('UPDATE ysca_updates SET telegram_status=? WHERE id=?').bind(telegramStatus,id).run();
  }
  return json({ success: true, status: 'published', telegram_status: telegramStatus });
}

/** Delete a notice permanently. Uploaded media is retained because it may be shared
 * with other notices. The public media route requires a published parent notice. */
export async function onRequestDelete({request,env,params}) {
 if (!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if (!sameOrigin(request)) return json({error:'Invalid request origin'},403);
 if (!(request.headers.get('content-type')||'').includes('application/json')) return json({error:'JSON required'},415);
 const id=String(params.id||'');
 if (!/^[0-9a-f-]{36}$/.test(id)) return json({error:'Invalid update ID'},400);
 const input=await request.json().catch(()=>null);
 if(!input||input.confirm!=='DELETE'||typeof input.title!=='string') return json({error:'Deletion confirmation required'},400);
 try {
  const existing=await env.DB.prepare('SELECT title FROM ysca_updates WHERE id=?').bind(id).first();
  if(!existing)return json({error:'Update not found'},404);
  if(existing.title!==input.title)return json({error:'Title changed; refresh your list and retry.'},409);
  const r=await env.DB.prepare('DELETE FROM ysca_updates WHERE id=? AND title=?').bind(id,input.title).run();
  if(r.meta?.changes!==1)return json({error:'Could not delete this item; refresh and retry.'},409);
  return json({success:true,deleted_id:id,media_retained:true});
 }catch(e){console.error('YSCA delete failed',e);return json({error:'Could not delete this update'},503)}
}
