/** Public, sanitized updates feed. Never include drafts, fee reminders or private recipients. */
import { json } from '../_lib/ysca-manager.js';
export async function onRequestGet({request,env}) {
 if(!env.DB)return json({error:'Updates service unavailable'},503);
 const url=new URL(request.url),origin=request.headers.get('Origin');
 const host=url.hostname;
 const allowed=new Set(['https://youngstarcricketacademy.com','https://www.youngstarcricketacademy.com']);
 const cors=origin&&allowed.has(origin)?{'Access-Control-Allow-Origin':origin,'Vary':'Origin'}:{};
 try{
  const r=await env.DB.prepare(`SELECT id,title,body,category,media_id,video_url,published_at
    FROM ysca_updates WHERE status='published' AND visibility='public'
    AND publish_website=1 AND category != 'fee'
    ORDER BY published_at DESC LIMIT 100`).all();
  return json({items:r.results||[]},200,{...cors,'Cache-Control':'public,max-age=60'});
 }catch(e){console.error('Public feed error',e);return json({error:'Updates feed not yet configured'},503,cors)}
}
