import { json } from '../../../_lib/ysca-manager.js';
import { downloadCloudinary, readLegacyR2, mediaResponse } from '../../../_lib/ysca-cloudinary.js';
export async function onRequestGet({request,env,params}) {
 const id=String(params.id||'');
 if(!/^[0-9a-f-]{36}$/.test(id))return json({error:'Invalid ID'},400);
 if(!env.DB)return json({error:'Media not available'},503);
 const row=await env.DB.prepare(`SELECT m.object_key,m.mime FROM ysca_update_media m
  WHERE m.id=? AND EXISTS(SELECT 1 FROM ysca_updates u WHERE u.media_id=m.id
  AND u.status='published' AND u.visibility='public' AND u.publish_website=1 AND u.category != 'fee')`).bind(id).first();
 if(!row)return json({error:'Not found'},404);
 const file=row.object_key.startsWith('cloudinary:') ?
  await downloadCloudinary(env,row.object_key,request.headers.get('Range')) :
  await readLegacyR2(env,row.object_key);
 if(!file)return json({error:'Media unavailable'},503);
 return mediaResponse(file,row.mime,false,true);
}
