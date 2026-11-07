-- Apply once to the D1 database bound as DB on the public Cloudflare Pages site.
-- Additive migration: does not alter existing academy manager or contact tables.
CREATE TABLE IF NOT EXISTS ysca_contact_enquiries (
  id TEXT PRIMARY KEY,
  name TEXT NOT NULL,
  email TEXT NOT NULL,
  phone TEXT NOT NULL,
  subject TEXT NOT NULL,
  message TEXT NOT NULL DEFAULT '',
  submitted_at TEXT NOT NULL,
  status TEXT NOT NULL DEFAULT 'new' CHECK (status IN ('new','contacted','trial_scheduled','joined','closed'))
);
CREATE INDEX IF NOT EXISTS idx_ysca_contact_enquiries_status_date
  ON ysca_contact_enquiries (status, submitted_at DESC);
CREATE TABLE IF NOT EXISTS ysca_enquiry_rate (
  rate_key TEXT PRIMARY KEY,
  attempts INTEGER NOT NULL DEFAULT 1,
  expires_at INTEGER NOT NULL
);
CREATE INDEX IF NOT EXISTS idx_ysca_enquiry_rate_expiry
  ON ysca_enquiry_rate (expires_at);
