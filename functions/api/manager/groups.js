import { json, configured, hasSession, sameOrigin, GROUP_IDS } from '../../_lib/ysca-manager.js';
export async function onRequestPost({request,env}) {
 if(!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if(!sameOrigin(request)) return json({error:'Invalid origin'},403);
 const data=await request.json().catch(()=>null);
 if(!data||!GROUP_IDS.includes(data.id)||typeof data.label!=='string'||data.label.trim().length<2||data.label.length>60) return json({error:'Invalid group'},400);
 await env.DB.prepare('UPDATE ysca_whatsapp_groups SET label=? WHERE id=?').bind(data.label.trim(),data.id).run();
 return json({success:true});
}
