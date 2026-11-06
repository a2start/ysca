import { json } from '../../../_lib/ysca-manager.js';
export async function onRequestGet({request,env,params}) {
 const id=String(params.id||'');
 if(!/^[0-9a-f-]{36}$/.test(id))return json({error:'Invalid ID'},400);
 if(!env.DB||!env.YSCA_MEDIA)return json({error:'Media not available'},503);
 const row=await env.DB.prepare(`SELECT m.object_key,m.mime FROM ysca_update_media m
  WHERE m.id=? AND EXISTS(SELECT 1 FROM ysca_updates u WHERE u.media_id=m.id
  AND u.status='published' AND u.visibility='public' AND u.publish_website=1 AND u.category != 'fee')`).bind(id).first();
 if(!row)return json({error:'Not found'},404);
 const object=await env.YSCA_MEDIA.get(row.object_key);
 if(!object)return json({error:'Not found'},404);
 return new Response(object.body,{headers:{
  'Content-Type':row.mime,'X-Content-Type-Options':'nosniff',
  'Access-Control-Allow-Origin':'*','Content-Security-Policy':"default-src 'none'; sandbox",
  'Cache-Control':'public,max-age=3600'
 }});
}
