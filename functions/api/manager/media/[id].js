import { json, configured, hasSession } from '../../../_lib/ysca-manager.js';
export async function onRequestGet({request,env,params}) {
 if(!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if(!env.YSCA_MEDIA)return json({error:'Not configured'},503);
 const id=String(params.id||'');
 if(!/^[0-9a-f-]{36}$/.test(id))return json({error:'Invalid ID'},400);
 const row=await env.DB.prepare('SELECT object_key,mime FROM ysca_update_media WHERE id=?').bind(id).first();
 if(!row)return json({error:'Not found'},404);
 const file=await env.YSCA_MEDIA.get(row.object_key);
 if(!file)return json({error:'Not found'},404);
 return new Response(file.body,{headers:{'Content-Type':row.mime,'X-Content-Type-Options':'nosniff','Cache-Control':'private,no-store','Content-Security-Policy':"default-src 'none'; sandbox"}});
}
