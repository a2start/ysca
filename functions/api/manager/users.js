import { configured, json, sameOrigin, hasSession, ensureUsersTable, hashPassword } from '../../_lib/ysca-manager.js';

async function authorizeAdmin(request, env) {
  if (!configured(env)) return null;
  const session = await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET);
  if (!session) return null;
  const isPrimaryAdmin = session.role === 'admin' || session.username === 'admin' || !session.username;
  if (!isPrimaryAdmin) return null;
  return session;
}

export async function onRequestGet({ request, env }) {
  const session = await authorizeAdmin(request, env);
  if (!session) return json({ error: 'Admin access required. Only the primary administrator can view users.' }, 403);
  try {
    await ensureUsersTable(env.DB);
    const result = await env.DB.prepare(
      'SELECT id, username, name, role, created_at FROM ysca_users ORDER BY created_at ASC'
    ).all();
    const dbUsers = (result.results || []).map(u => ({ ...u, is_primary: false }));
    const users = [
      { id: 'primary-admin', username: 'admin', name: 'Primary Administrator (Env)', role: 'admin', created_at: null, is_primary: true },
      ...dbUsers
    ];
    return json({ users });
  } catch (e) {
    console.error('Failed to list users:', e);
    return json({ error: 'Database unavailable' }, 503);
  }
}

export async function onRequestPost({ request, env }) {
  const session = await authorizeAdmin(request, env);
  if (!session) return json({ error: 'Admin access required. Only the primary administrator can add users.' }, 403);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  const type = request.headers.get('content-type') || '';
  if (!type.includes('application/json')) return json({ error: 'JSON required' }, 415);

  const input = await request.json().catch(() => null);
  if (!input || typeof input !== 'object') return json({ error: 'Invalid data' }, 400);

  const username = typeof input.username === 'string' ? input.username.trim().toLowerCase() : '';
  const name = typeof input.name === 'string' ? input.name.trim() : '';
  const password = typeof input.password === 'string' ? input.password : '';
  const role = input.role === 'admin' ? 'admin' : 'manager';

  if (!username || !/^[a-zA-Z0-9_.-]{3,30}$/.test(username)) {
    return json({ error: 'Username must be 3–30 characters (letters, numbers, underscores, dots, hyphens)' }, 400);
  }
  if (username === 'admin') {
    return json({ error: 'Username "admin" is reserved for the primary administrator' }, 400);
  }
  if (!name || name.length < 2 || name.length > 60) {
    return json({ error: 'Name must be 2–60 characters' }, 400);
  }
  if (!password || password.length < 8 || password.length > 100) {
    return json({ error: 'Password must be at least 8 characters' }, 400);
  }

  try {
    await ensureUsersTable(env.DB);
    const existing = await env.DB.prepare('SELECT id FROM ysca_users WHERE LOWER(username) = ?').bind(username).first();
    if (existing) {
      return json({ error: 'Username "' + username + '" already exists' }, 400);
    }
    const id = crypto.randomUUID(), now = new Date().toISOString();
    const hash = await hashPassword(password);
    await env.DB.prepare(
      'INSERT INTO ysca_users (id, username, name, password_hash, role, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)'
    ).bind(id, username, name, hash, role, now, now).run();

    return json({ success: true, user: { id, username, name, role, created_at: now } }, 201);
  } catch (e) {
    console.error('Failed to create user:', e);
    return json({ error: 'Failed to save user' }, 503);
  }
}

export async function onRequestDelete({ request, env }) {
  const session = await authorizeAdmin(request, env);
  if (!session) return json({ error: 'Admin access required. Only the primary administrator can remove users.' }, 403);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  const type = request.headers.get('content-type') || '';
  if (!type.includes('application/json')) return json({ error: 'JSON required' }, 415);

  const input = await request.json().catch(() => null);
  const id = typeof input?.id === 'string' ? input.id.trim() : '';
  if (!id) return json({ error: 'User ID required' }, 400);
  if (id === 'primary-admin') return json({ error: 'Primary administrator cannot be removed' }, 400);

  try {
    await ensureUsersTable(env.DB);
    const res = await env.DB.prepare('DELETE FROM ysca_users WHERE id = ?').bind(id).run();
    return json({ success: true, deleted: res.changes > 0 });
  } catch (e) {
    console.error('Failed to delete user:', e);
    return json({ error: 'Failed to delete user' }, 503);
  }
}
