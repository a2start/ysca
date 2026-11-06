import { configured, json, sameOrigin, hasSession, normalizeUpdate, deliverTelegram } from '../../../_lib/ysca-manager.js';

export async function onRequestPatch({request, env, params}) {
 if (!configured(env) || !await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if (!sameOrigin(request)) return json({error:'Invalid request origin'},403);
 if (!(request.headers.get('content-type')||'').includes('application/json')) return json({error:'JSON required'},415);
 const id=String(params.id||'');
 if (!/^[0-9a-f-]{36}$/.test(id)) return json({error:'Invalid update ID'},400);
 const input=await request.json().catch(()=>null);
 if (!input || !['publish','archive','restore','edit'].includes(input.action)) return json({error:'Invalid action'},400);
 const existing=await env.DB.prepare('SELECT * FROM ysca_updates WHERE id=?').bind(id).first();
 if (!existing) return json({error:'Update not found'},404);
 const now=new Date().toISOString();
 if (input.action==='archive') {
  if(existing.status==='archived') return json({error:'Already archived'},409);
  await env.DB.prepare("UPDATE ysca_updates SET status='archived',publish_website=0,updated_at=? WHERE id=?")
   .bind(now,id).run();
  return json({success:true,status:'archived'});
 }
 if (input.action==='restore') {
  if(existing.status!=='archived') return json({error:'Only archived updates can be restored'},409);
  // Restored entries must be reviewed before republishing.
  await env.DB.prepare("UPDATE ysca_updates SET status='draft',published_at=NULL,publish_website=0,publish_telegram=0,telegram_status='not_requested',updated_at=? WHERE id=?")
   .bind(now,id).run();
  return json({success:true,status:'draft'});
 }
 if(input.action==='edit') {
  if(existing.status==='archived') return json({error:'Restore this update before editing'},409);
  let f;
  try{f=normalizeUpdate(input)}catch(e){return json({error:e.message||'Invalid update'},400)}
  if(f.mediaId) {
   const media=await env.DB.prepare('SELECT id FROM ysca_update_media WHERE id=?').bind(f.mediaId).first();
   if(!media)return json({error:'Selected media was not found'},400);
  }
  const publicPost=existing.status==='published' && f.visibility==='public' && f.website && f.category!=='fee';
  // Editing never resends a Telegram message; the manager can publish a new update instead.
  // For published posts, changed destinations are applied only to the website.
  await env.DB.prepare(`UPDATE ysca_updates SET
    title=?,body=?,category=?,visibility=?,publish_website=?,whatsapp_groups=?,
    media_id=?,video_url=?,updated_at=?,published_at=?
    WHERE id=?`).bind(f.title,f.message,f.category,f.visibility,publicPost?1:(existing.status==='draft'&&f.website?1:0),
     JSON.stringify(f.groups),f.mediaId||null,f.videoUrl||null,now,
     publicPost?(existing.published_at||now):null,id).run();
  return json({success:true,status:existing.status,website_live:publicPost,telegram_not_resent:true});
 }
 if(existing.status!=='draft')return json({error:'Only drafts can be published'},409);
 let f;
 try {
  f=normalizeUpdate({
   title:existing.title,body:existing.body,category:existing.category,
   visibility:existing.visibility,website:!!existing.publish_website,
   telegram:!!existing.publish_telegram,groups:JSON.parse(existing.whatsapp_groups||'[]'),
   media_id:existing.media_id,video_url:existing.video_url
  });
 }catch(e){return json({error:e.message||'Invalid draft'},400)}
 const website=f.website&&f.visibility==='public';
 if(!website&&!f.telegram) return json({error:'This notice is ready for WhatsApp sharing. Open WhatsApp to send it.'},409);
 await env.DB.prepare("UPDATE ysca_updates SET status='published',publish_website=?,published_at=?,updated_at=?,telegram_status=? WHERE id=?")
  .bind(website?1:0,website?now:null,now,f.telegram?'pending':'not_requested',id).run();
 let telegramStatus='not_requested';
 if(f.telegram) {
  telegramStatus=await deliverTelegram(env,{
   title:existing.title,body:existing.body,publish_website:website,visibility:existing.visibility,publish_telegram:1
  });
  await env.DB.prepare('UPDATE ysca_updates SET telegram_status=? WHERE id=?').bind(telegramStatus,id).run();
 }
 return json({success:true,status:'published',telegram_status:telegramStatus});
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
