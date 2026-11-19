/** Public, sanitized updates feed. Never include drafts, fee reminders or private recipients. */
import { json } from '../_lib/ysca-manager.js';
export async function onRequestGet({request,env}) {
 if(!env.DB)return json({error:'Updates service unavailable'},503);
 const url=new URL(request.url),origin=request.headers.get('Origin');
 const host=url.hostname;
 const allowed=new Set(['https://youngstarcricketacademy.com','https://www.youngstarcricketacademy.com']);
 const cors=origin&&allowed.has(origin)?{'Access-Control-Allow-Origin':origin,'Vary':'Origin'}:{};
 try{
  const r=await env.DB.prepare(`SELECT u.id,u.title,u.body,u.category,u.media_id,u.video_url,u.published_at,m.mime AS media_mime
    FROM ysca_updates u LEFT JOIN ysca_update_media m ON m.id=u.media_id WHERE u.status='published' AND u.visibility='public'
    AND u.publish_website=1 AND u.category != 'fee'
    ORDER BY u.published_at DESC LIMIT 100`).all();
  return json({items:r.results||[]},200,{...cors,'Cache-Control':'public,max-age=60'});
 }catch(e){console.error('Public feed error',e);return json({error:'Updates feed not yet configured'},503,cors)}
}
