import { json, configured, hasSession, sameOrigin } from '../../../_lib/ysca-manager.js';
import { ensureCoachesTable } from '../coaches.js';

async function authorize(request, env) {
  return configured(env) && await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET);
}

export async function onRequestPatch({ request, params, env }) {
  const session = await authorize(request, env);
  if (!session) return json({ error: 'Unauthorized' }, 401);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  if (!env.DB) return json({ error: 'Database unavailable' }, 503);

  const { id } = params;
  if (!id) return json({ error: 'Coach ID required' }, 400);

  const input = await request.json().catch(() => null);
  if (!input) return json({ error: 'Invalid JSON' }, 400);

  await ensureCoachesTable(env.DB);
  const existing = await env.DB.prepare('SELECT * FROM ysca_coaches WHERE id = ?').bind(id).first();
  if (!existing) return json({ error: 'Coach not found' }, 404);

  const name = typeof input.name === 'string' ? input.name.trim() : existing.name;
  const role = typeof input.role === 'string' ? input.role.trim() : existing.role;
  const badge = typeof input.badge === 'string' ? input.badge.trim() : existing.badge;
  const bio = typeof input.bio === 'string' ? input.bio.trim() : existing.bio;
  let image = typeof input.image === 'string' && input.image.trim() ? input.image.trim() : existing.image;
  if (image && image.startsWith('assets/')) image = '/' + image;
  const slug = typeof input.slug === 'string' && input.slug.trim() ? input.slug.trim() : existing.slug;
  
  let tagsJson = existing.tags;
  if (Array.isArray(input.tags)) {
    tagsJson = JSON.stringify(input.tags.map(t => String(t).trim()).filter(Boolean));
  } else if (typeof input.tags === 'string') {
    tagsJson = JSON.stringify(input.tags.split(',').map(t => t.trim()).filter(Boolean));
  }

  const sortOrder = Number.isInteger(input.sort_order) ? input.sort_order : existing.sort_order;
  const isActive = input.is_active !== undefined ? (input.is_active ? 1 : 0) : existing.is_active;
  const now = new Date().toISOString();

  await env.DB.prepare(`
    UPDATE ysca_coaches
    SET name = ?, role = ?, badge = ?, bio = ?, image = ?, slug = ?, tags = ?, sort_order = ?, is_active = ?, updated_at = ?
    WHERE id = ?
  `).bind(name, role, badge, bio, image, slug, tagsJson, sortOrder, isActive, now, id).run();

  return json({
    success: true,
    coach: {
      id,
      name,
      role,
      badge,
      bio,
      image,
      slug,
      tags: JSON.parse(tagsJson || '[]'),
      sort_order: sortOrder,
      is_active: isActive
    }
  });
}

export async function onRequestDelete({ request, params, env }) {
  const session = await authorize(request, env);
  if (!session) return json({ error: 'Unauthorized' }, 401);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  if (!env.DB) return json({ error: 'Database unavailable' }, 503);

  const { id } = params;
  if (!id) return json({ error: 'Coach ID required' }, 400);

  await ensureCoachesTable(env.DB);
  await env.DB.prepare('DELETE FROM ysca_coaches WHERE id = ?').bind(id).run();

  return json({ success: true, message: 'Coach removed successfully' });
}
