import { json, configured, hasSession } from '../../_lib/ysca-manager.js';
import { ensureCoachesTable } from './coaches.js';

// Pre-packaged academy coach images stored in assets/images/
const DEFAULT_COACH_IMAGES = [
  { name: 'Kapil Pratap Singh', file: 'kps.jpg', url: '/assets/images/kps.jpg' },
  { name: 'Rajeev Gupta', file: 'rg.jpg', url: '/assets/images/rg.jpg' },
  { name: 'Suryabhan Singh', file: 'sbs.jpg', url: '/assets/images/sbs.jpg' },
  { name: 'Manoj Gupta', file: 'mg.jpg', url: '/assets/images/mg.jpg' },
  { name: 'Nayan Bhardwaj', file: 'nb.jpg', url: '/assets/images/nb.jpg' },
  { name: 'Lakshya Bharti', file: 'lb.jpg', url: '/assets/images/lb.jpg' },
  { name: 'Nikhil Yadav', file: 'ny.jpg', url: '/assets/images/ny.jpg' }
];

export async function onRequestGet({ request, env }) {
  if (!configured(env) || !await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET)) {
    return json({ error: 'Unauthorized' }, 401);
  }

  const items = [...DEFAULT_COACH_IMAGES];

  // Also query any uploaded media from ysca_update_media that are images
  if (env.DB) {
    try {
      const { results } = await env.DB.prepare(
        "SELECT id, object_key, mime, uploaded_at FROM ysca_update_media WHERE mime LIKE 'image/%' ORDER BY uploaded_at DESC LIMIT 30"
      ).all();

      if (results && results.length) {
        results.forEach(r => {
          items.push({
            name: 'Uploaded Photo (' + r.id.slice(0, 8) + ')',
            file: r.object_key,
            url: '/api/updates/media/' + r.id,
            uploaded: true
          });
        });
      }
    } catch (e) {
      console.warn('Could not query uploaded media:', e);
    }
  }

  return json({ library: items });
}
