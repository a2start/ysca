-- YSCA Manager Dashboard v1. Apply to the Cloudflare Pages D1 database bound as DB.
-- All tables are prefixed to avoid modifying existing academy contact submissions.
CREATE TABLE IF NOT EXISTS ysca_updates (
  id TEXT PRIMARY KEY,
  title TEXT NOT NULL,
  body TEXT NOT NULL,
  category TEXT NOT NULL,
  visibility TEXT NOT NULL CHECK (visibility IN ('public','private')),
  status TEXT NOT NULL CHECK (status IN ('draft','published','archived')),
  publish_website INTEGER NOT NULL DEFAULT 0,
  publish_telegram INTEGER NOT NULL DEFAULT 0,
  whatsapp_groups TEXT NOT NULL DEFAULT '[]',
  media_id TEXT,
  video_url TEXT,
  telegram_status TEXT NOT NULL DEFAULT 'not_requested',
  created_at TEXT NOT NULL,
  updated_at TEXT NOT NULL,
  published_at TEXT
);
CREATE INDEX IF NOT EXISTS idx_ysca_updates_public
  ON ysca_updates(status, visibility, publish_website, published_at);
CREATE TABLE IF NOT EXISTS ysca_update_media (
  id TEXT PRIMARY KEY,
  object_key TEXT NOT NULL UNIQUE,
  mime TEXT NOT NULL,
  bytes INTEGER NOT NULL,
  uploaded_at TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS ysca_manager_auth_attempts (
  ip_hash TEXT PRIMARY KEY,
  attempts INTEGER NOT NULL,
  window_expires INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS ysca_whatsapp_groups (
  id TEXT PRIMARY KEY,
  label TEXT NOT NULL
);
INSERT OR IGNORE INTO ysca_whatsapp_groups(id,label) VALUES
  ('group-1','WhatsApp Group 1'),
  ('group-2','WhatsApp Group 2'),
  ('group-3','WhatsApp Group 3'),
  ('group-4','WhatsApp Group 4');
