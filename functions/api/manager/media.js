import { configured, json, sameOrigin, hasSession } from '../../_lib/ysca-manager.js';

export async function onRequestPost({request,env}) {
 if(!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if(!sameOrigin(request)) return json({error:'Invalid origin'},403);
 if(!env.YSCA_MEDIA) return json({error:'Media storage is not configured (YSCA_MEDIA R2 binding)'},503);
 const length=Number(request.headers.get('content-length')||0);
 if(length>12*1024*1024) return json({error:'Media must be under 10 MB'},413);
 const data=await request.formData().catch(()=>null);
 const file=data?.get('file');
 if(!file||typeof file==='string'||typeof file.arrayBuffer!=='function') return json({error:'Select a file'},400);
 const types={'image/jpeg':'jpg','image/png':'png','image/webp':'webp','image/gif':'gif','video/mp4':'mp4','video/webm':'webm'};
 if(!types[file.type]||file.size===0||file.size>10*1024*1024) return json({error:'Upload JPG, PNG, WebP, GIF, MP4 or WebM (max 10MB)'},400);
 const bytes=new Uint8Array(await file.arrayBuffer());
 const ascii=(n)=>String.fromCharCode(...bytes.slice(0,n));
 const valid={
  'image/jpeg':bytes[0]===0xff&&bytes[1]===0xd8&&bytes[2]===0xff,
  'image/png':ascii(8)==='\x89PNG\r\n\x1a\n',
  'image/webp':ascii(4)==='RIFF'&&String.fromCharCode(...bytes.slice(8,12))==='WEBP',
  'image/gif':ascii(3)==='GIF',
  'video/mp4':String.fromCharCode(...bytes.slice(4,8))==='ftyp',
  'video/webm':bytes[0]===0x1a&&bytes[1]===0x45&&bytes[2]===0xdf&&bytes[3]===0xa3
 };
 if(!valid[file.type]) return json({error:'File signature does not match the media type'},400);
 const id=crypto.randomUUID(),key='updates/'+id+'.'+types[file.type],now=new Date().toISOString();
 try {
  await env.YSCA_MEDIA.put(key,bytes,{httpMetadata:{contentType:file.type}});
  await env.DB.prepare('INSERT INTO ysca_update_media(id,object_key,mime,bytes,uploaded_at) VALUES (?,?,?,?,?)')
    .bind(id,key,file.type,file.size,now).run();
  return json({success:true,media_id:id},201);
 }catch(e){console.error('Media upload failed',e);return json({error:'Upload failed; check R2 and D1 bindings'},503)}
}
