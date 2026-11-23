import { configured, json, sameOrigin, passwordMatches, sessionCookie, clearSessionCookie, hasSession, rateCheck, ensureUsersTable, verifyUserPassword } from '../../_lib/ysca-manager.js';

export async function onRequestGet({ request, env }) {
  if (!configured(env)) {
    return json({ authenticated: false, configured: false }, 503);
  }
  const session = await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET);
  if (!session) {
    return json({ authenticated: false, configured: true });
  }
  const isPrimaryAdmin = session.role === 'admin' || session.username === 'admin' || !session.username;
  return json({
    authenticated: true,
    configured: true,
    user: {
      username: session.username || 'admin',
      role: isPrimaryAdmin ? 'admin' : session.role,
      name: session.name || (isPrimaryAdmin ? 'Primary Admin' : 'Manager')
    }
  });
}

export async function onRequestPost({ request, env }) {
  if (!configured(env)) return json({ error: 'Manager system is not configured. See deployment guide.' }, 503);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  const type = request.headers.get('content-type') || '';
  if (!type.includes('application/json')) return json({ error: 'JSON required' }, 415);
  const input = await request.json().catch(() => null);
  if (input?.action === 'logout') return json({ success: true }, 200, { 'Set-Cookie': clearSessionCookie });
  if (input?.action !== 'login') return json({ error: 'Invalid action' }, 400);
  const allowed = await rateCheck(env.DB, request, env.YSCA_MANAGER_SESSION_SECRET);
  if (!allowed) return json({ error: 'Too many login attempts. Try again in 15 minutes.' }, 429);

  const username = typeof input.username === 'string' ? input.username.trim().toLowerCase() : '';
  const password = typeof input.password === 'string' ? input.password : '';
  if (!password) return json({ error: 'Password required' }, 400);

  let authenticatedUser = null;

  // 1. Primary admin: if username is empty, 'admin', or directly matches env.YSCA_MANAGER_PASSWORD
  if (!username || username === 'admin') {
    if (await passwordMatches(password, env.YSCA_MANAGER_PASSWORD)) {
      authenticatedUser = { username: 'admin', name: 'Primary Admin', role: 'admin' };
    }
  }

  // 2. Database users (created by admin)
  if (!authenticatedUser && username && env.DB) {
    try {
      await ensureUsersTable(env.DB);
      const user = await env.DB.prepare(
        'SELECT id, username, name, password_hash, role FROM ysca_users WHERE LOWER(username) = ?'
      ).bind(username).first();
      if (user && await verifyUserPassword(password, user.password_hash)) {
        authenticatedUser = { username: user.username, name: user.name, role: user.role };
      }
    } catch (e) {
      console.error('User DB auth check failed:', e);
    }
  }

  // 3. Fallback: if username was not provided or entered something else but password matches admin
  if (!authenticatedUser && await passwordMatches(password, env.YSCA_MANAGER_PASSWORD)) {
    authenticatedUser = { username: 'admin', name: 'Primary Admin', role: 'admin' };
  }

  if (!authenticatedUser) {
    return json({ error: 'Incorrect username or password' }, 401);
  }

  const cookie = await sessionCookie(env.YSCA_MANAGER_SESSION_SECRET, authenticatedUser);
  return json({
    success: true,
    user: {
      username: authenticatedUser.username,
      name: authenticatedUser.name,
      role: authenticatedUser.role
    }
  }, 200, { 'Set-Cookie': cookie });
}
