import { json, configured, hasSession, sameOrigin } from '../../_lib/ysca-manager.js';

export const INITIAL_COACHES = [
  {
    id: 'coach-1',
    name: 'Kapil Pratap Singh',
    role: 'Head Coach & Director of Cricket',
    badge: 'Head Coach',
    bio: 'Kapil Pratap Singh brings over a decade of high-performance coaching and mentorship to Young Star Cricket Academy. As Director of Cricket, he oversees youth talent scouting, video biomechanics, and competitive tournament preparation across all academy age groups.',
    image: '/assets/images/kps.jpg',
    slug: 'coach-kapil-pratap-singh',
    tags: JSON.stringify(['Batting Mastery', 'Match Strategy', 'Player Mentorship', 'Game Temperament']),
    sort_order: 1,
    is_active: 1
  },
  {
    id: 'coach-2',
    name: 'Mr. Rajeev Gupta',
    role: 'Senior Cricket Coach — Under-19 & Above Lead Coach',
    badge: 'Under-19 & Above Lead',
    bio: 'Rajeev Gupta leads the Under-19 and above age-group coaching at Young Star Cricket Academy, focusing on match awareness, bowling dynamics, tactical preparation, and competitive tournament performance.',
    image: '/assets/images/rg.jpg',
    slug: 'coach-rajeev-gupta',
    tags: JSON.stringify(['Bowling Dynamics', 'Match Awareness', 'Coaching Guidance', 'Tactical Analysis']),
    sort_order: 2,
    is_active: 1
  },
  {
    id: 'coach-3',
    name: 'Mr. Suryabhan Singh',
    role: 'Cricket & Fitness Coach — Under-12 Lead Coach',
    badge: 'Under-12 Coach',
    bio: 'Suryabhan Singh is the dedicated Under-12 age-group coach and fitness specialist at Young Star Cricket Academy, combining batting and bowling basics with age-appropriate physical agility and movement training.',
    image: '/assets/images/sbs.jpg',
    slug: 'coach-suryabhan-singh',
    tags: JSON.stringify(['Strength & Conditioning', 'Batting Drills', 'Agility & Speed', 'Injury Prevention']),
    sort_order: 3,
    is_active: 1
  },
  {
    id: 'coach-4',
    name: 'Mr. Manoj Gupta',
    role: 'Cricket Coach — Under-16 & Above Lead Coach',
    badge: 'Under-16 & Above Lead',
    bio: 'Manoj Gupta leads coaching for Under-16 and above players at Young Star Cricket Academy, guiding cricketers through advanced technical drills, footwork discipline, and match-scenario execution.',
    image: '/assets/images/mg.jpg',
    slug: 'coach-manoj-gupta',
    tags: JSON.stringify(['Footwork & Balance', 'Bowling Actions', 'Net Discipline', 'Foundational Drills']),
    sort_order: 4,
    is_active: 1
  },
  {
    id: 'coach-5',
    name: 'Mr. Nayan Bhardwaj',
    role: 'Cricket Coach — Under-14 & Above Lead Coach',
    badge: 'Under-14 & Above Lead',
    bio: 'Nayan Bhardwaj is the Under-14 and above lead coach at Young Star Cricket Academy, focusing on modern strokeplay, sharp fielding reflexes, game awareness, and transition to competitive youth cricket.',
    image: '/assets/images/nb.jpg',
    slug: 'coach-nayan-bhardwaj',
    tags: JSON.stringify(['Modern Strokeplay', 'Power Hitting', 'Ground Fielding', 'Video Analytics']),
    sort_order: 5,
    is_active: 1
  },
  {
    id: 'coach-6',
    name: 'Mr. Lakshya Bharti',
    role: 'Junior Cricket Coach — Under-10 Coaching Team',
    badge: 'Under-10 Coach',
    bio: 'Lakshya Bharti coaches the Under-10 grassroots cricketers alongside coaches Priya and Ayush Kashyap, focusing on motor skills, hand-eye coordination, and joyful cricket foundations.',
    image: '/assets/images/lb.jpg',
    slug: 'coach-lokesh-bharti',
    tags: JSON.stringify(['Batting Resilience', 'Coaching Team', 'Youth Grassroots', 'Game Psychology']),
    sort_order: 6,
    is_active: 1
  },
  {
    id: 'coach-7',
    name: 'Mr. Nikhil Yadav',
    role: 'Youth Cricket Coach — Under-11 Coaching Team',
    badge: 'Under-11 Coach',
    bio: 'Nikhil Yadav mentors the Under-11 age category alongside Ayush Naithani at Young Star Cricket Academy, cultivating strong hand-eye coordination, dynamic fielding reflex drills, and match discipline.',
    image: '/assets/images/ny.jpg',
    slug: 'coach-nikhil-yadav',
    tags: JSON.stringify(['Hand-Eye Coordination', 'Fielding Reflexes', 'Positive Motivation', 'Team Synergy']),
    sort_order: 7,
    is_active: 1
  }
];

export async function ensureCoachesTable(db) {
  if (!db) return;
  await db.prepare(`CREATE TABLE IF NOT EXISTS ysca_coaches (
    id TEXT PRIMARY KEY,
    name TEXT NOT NULL,
    role TEXT NOT NULL,
    badge TEXT NOT NULL DEFAULT '',
    bio TEXT NOT NULL,
    image TEXT NOT NULL DEFAULT '/assets/images/kps.jpg',
    slug TEXT NOT NULL,
    tags TEXT NOT NULL DEFAULT '[]',
    sort_order INTEGER NOT NULL DEFAULT 0,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL
  )`).run();

  // If table is empty or has relative asset paths without leading slash, normalize them
  const countRow = await db.prepare('SELECT COUNT(*) AS total FROM ysca_coaches').first();
  if (!countRow || countRow.total === 0) {
    const now = new Date().toISOString();
    for (const c of INITIAL_COACHES) {
      await db.prepare(`INSERT OR IGNORE INTO ysca_coaches (id, name, role, badge, bio, image, slug, tags, sort_order, is_active, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`
      ).bind(c.id, c.name, c.role, c.badge, c.bio, c.image, c.slug, c.tags, c.sort_order, c.is_active, now, now).run();
    }
  } else {
    // Fix existing relative image paths that might be missing the leading slash
    await db.prepare("UPDATE ysca_coaches SET image = '/' || image WHERE image LIKE 'assets/%'").run();
  }
}

async function authorize(request, env) {
  return configured(env) && await hasSession(request, env.YSCA_MANAGER_SESSION_SECRET);
}

export async function onRequestGet({ env }) {
  if (!env.DB) return json({ coaches: INITIAL_COACHES });
  try {
    await ensureCoachesTable(env.DB);
    const { results } = await env.DB.prepare('SELECT * FROM ysca_coaches ORDER BY sort_order ASC, created_at ASC').all();
    const coaches = (results || []).map(r => ({
      ...r,
      image: r.image && r.image.startsWith('assets/') ? '/' + r.image : (r.image || '/assets/images/kps.jpg'),
      tags: typeof r.tags === 'string' ? JSON.parse(r.tags || '[]') : r.tags
    }));
    return json({ coaches: coaches.length ? coaches : INITIAL_COACHES });
  } catch (err) {
    console.error('Failed to load coaches:', err);
    return json({ coaches: INITIAL_COACHES, error: err.message });
  }
}

export async function onRequestPost({ request, env }) {
  const session = await authorize(request, env);
  if (!session) return json({ error: 'Unauthorized' }, 401);
  if (!sameOrigin(request)) return json({ error: 'Invalid request origin' }, 403);
  if (!env.DB) return json({ error: 'Database unavailable' }, 503);

  const input = await request.json().catch(() => null);
  if (!input) return json({ error: 'Invalid JSON payload' }, 400);

  await ensureCoachesTable(env.DB);

  const name = typeof input.name === 'string' ? input.name.trim() : '';
  const role = typeof input.role === 'string' ? input.role.trim() : '';
  const badge = typeof input.badge === 'string' ? input.badge.trim() : '';
  const bio = typeof input.bio === 'string' ? input.bio.trim() : '';
  let image = typeof input.image === 'string' && input.image.trim() ? input.image.trim() : '/assets/images/kps.jpg';
  if (image.startsWith('assets/')) image = '/' + image;
  
  if (!name || !role || !bio) {
    return json({ error: 'Name, Role, and Bio are required' }, 400);
  }

  // Generate slug from name
  const baseSlug = 'coach-' + name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
  const slug = typeof input.slug === 'string' && input.slug.trim() ? input.slug.trim() : baseSlug;

  let tagsArray = [];
  if (Array.isArray(input.tags)) {
    tagsArray = input.tags.map(t => String(t).trim()).filter(Boolean);
  } else if (typeof input.tags === 'string') {
    tagsArray = input.tags.split(',').map(t => t.trim()).filter(Boolean);
  }

  const sortOrder = Number.isInteger(input.sort_order) ? input.sort_order : 99;
  const isActive = input.is_active === 0 || input.is_active === false ? 0 : 1;
  const id = input.id || 'coach-' + crypto.randomUUID();
  const now = new Date().toISOString();

  await env.DB.prepare(`
    INSERT INTO ysca_coaches (id, name, role, badge, bio, image, slug, tags, sort_order, is_active, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
  `).bind(id, name, role, badge, bio, image, slug, JSON.stringify(tagsArray), sortOrder, isActive, now, now).run();

  return json({
    success: true,
    coach: { id, name, role, badge, bio, image, slug, tags: tagsArray, sort_order: sortOrder, is_active: isActive }
  }, 201);
}
