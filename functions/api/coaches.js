import { json } from '../_lib/ysca-manager.js';
import { ensureCoachesTable, INITIAL_COACHES } from './manager/coaches.js';

export async function onRequestGet({ env }) {
  if (!env.DB) {
    return json({ coaches: INITIAL_COACHES.filter(c => c.is_active !== 0) });
  }

  try {
    await ensureCoachesTable(env.DB);
    const { results } = await env.DB.prepare(
      'SELECT * FROM ysca_coaches WHERE is_active = 1 ORDER BY sort_order ASC, created_at ASC'
    ).all();

    const coaches = (results || []).map(r => ({
      ...r,
      tags: typeof r.tags === 'string' ? JSON.parse(r.tags || '[]') : r.tags
    }));

    return json({ coaches: coaches.length ? coaches : INITIAL_COACHES });
  } catch (err) {
    console.error('Error fetching public coaches:', err);
    return json({ coaches: INITIAL_COACHES });
  }
}
