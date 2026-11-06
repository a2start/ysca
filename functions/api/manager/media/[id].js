import { json, configured, hasSession } from '../../../_lib/ysca-manager.js';
import { downloadCloudinary, readLegacyR2, mediaResponse } from '../../../_lib/ysca-cloudinary.js';
export async function onRequestGet({request,env,params}) {
 if(!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 const id=String(params.id||'');
 if(!/^[0-9a-f-]{36}$/.test(id))return json({error:'Invalid ID'},400);
 const row=await env.DB.prepare('SELECT object_key,mime FROM ysca_update_media WHERE id=?').bind(id).first();
 if(!row)return json({error:'Not found'},404);
 const file=row.object_key.startsWith('cloudinary:') ?
   await downloadCloudinary(env,row.object_key,request.headers.get('Range')) :
   await readLegacyR2(env,row.object_key);
 if(!file)return json({error:'Media unavailable'},503);
 return mediaResponse(file,row.mime,true);
}
