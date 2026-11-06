import { configured, json, sameOrigin, hasSession } from '../../_lib/ysca-manager.js';
import { cloudinaryConfigured, uploadCloudinary } from '../../_lib/ysca-cloudinary.js';

export async function onRequestPost({request,env}) {
 if(!configured(env)||!await hasSession(request,env.YSCA_MANAGER_SESSION_SECRET)) return json({error:'Login required'},401);
 if(!sameOrigin(request)) return json({error:'Invalid origin'},403);
 if(!cloudinaryConfigured(env)) return json({error:'Cloudinary is not configured. Add CLOUDINARY_CLOUD_NAME, CLOUDINARY_API_KEY and CLOUDINARY_API_SECRET in Cloudflare.'},503);
 const length=Number(request.headers.get('content-length')||0);
 if(length>12*1024*1024) return json({error:'Media must be under 10 MB'},413);
 const data=await request.formData().catch(()=>null);
 const file=data?.get('file');
 if(!file||typeof file==='string'||typeof file.arrayBuffer!=='function') return json({error:'Select a file'},400);
 const types={'image/jpeg':'jpg','image/png':'png','image/webp':'webp','image/gif':'gif','video/mp4':'mp4','video/webm':'webm'};
 if(!types[file.type]||file.size===0||file.size>10*1024*1024) return json({error:'Upload JPG, PNG, WebP, GIF, MP4 or WebM (max 10MB)'},400);
 const bytes=new Uint8Array(await file.arrayBuffer());
 const ascii=n=>String.fromCharCode(...bytes.slice(0,n));
 const valid={
  'image/jpeg':bytes[0]===0xff&&bytes[1]===0xd8&&bytes[2]===0xff,
  'image/png':ascii(8)==='\x89PNG\r\n\x1a\n',
  'image/webp':ascii(4)==='RIFF'&&String.fromCharCode(...bytes.slice(8,12))==='WEBP',
  'image/gif':ascii(3)==='GIF',
  'video/mp4':String.fromCharCode(...bytes.slice(4,8))==='ftyp',
  'video/webm':bytes[0]===0x1a&&bytes[1]===0x45&&bytes[2]===0xdf&&bytes[3]===0xa3
 };
 if(!valid[file.type]) return json({error:'File signature does not match the media type'},400);
 const id=crypto.randomUUID(),now=new Date().toISOString();
 try {
  const key=await uploadCloudinary(env,bytes,file.type,id,types[file.type]);
  await env.DB.prepare('INSERT INTO ysca_update_media(id,object_key,mime,bytes,uploaded_at) VALUES (?,?,?,?,?)')
    .bind(id,key,file.type,file.size,now).run();
  return json({success:true,media_id:id},201);
 }catch(e){
  console.error('YSCA Cloudinary upload:', e?.code || 'UPLOAD_FAILED', String(e?.message || '').slice(0,200));
  if(e?.code==='CLOUDINARY_HTTP_ERROR'||e?.code==='CLOUDINARY_TYPE_ERROR'||e?.code==='CLOUDINARY_ASSET_ID_ERROR'){
    return json({error:e.message,code:e.code},502);
  }
  return json({error:'Media upload failed. Check Cloudflare function logs if Cloudinary credentials are configured.',code:'UPLOAD_FAILED'},503);
 }
}
