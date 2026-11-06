# YSCA Manager custom-domain launch

**Manager login:** https://manager.youngstarcricketacademy.com/

The Cloudflare Pages project is **`ysca`**. Keep the production branch set to
`feature/manager-updates-dashboard`, which now contains the simplified
manager dashboard and its existing Cloudinary/D1 endpoints. Do not attach
the manager custom domain to GitHub Pages or to `ysca-live`.

## What was prepared in GitHub

- `functions/index.js`: requests to `/` on the manager hostname return a
  temporary `302` redirect to `/manager/updates.html`; all other hosts
  preserve the existing home page via `next()`.
- The dashboard login and APIs are host-relative (under `/api/manager`).
  The HttpOnly secure session cookie has no `Domain` attribute, so sessions
  on the manager hostname are separate from `ysca.pages.dev`.
- The dashboard has `noindex,nofollow,noarchive`; the manager root redirect
  includes `X-Robots-Tag: noindex, nofollow, noarchive`.
- The public GitHub Pages site has an optional hidden shortcut at
  `https://youngstarcricketacademy.com/manager/`. Do not link it from the
  public navigation.
- No existing D1 migrations, manager secrets or Cloudinary keys are modified.
- Existing `https://ysca.pages.dev/api/updates` remains the public feed
  source for Academy Moments and homepage updates.

## Cloudflare action required (domain not activated by GitHub commit)

1. Log in to Cloudflare dashboard with the account hosting the existing
   `youngstarcricketacademy.com` DNS zone and `ysca` Pages project.
2. Go to **Workers & Pages → ysca → Custom domains → Set up a domain**.
3. Enter `manager.youngstarcricketacademy.com` and confirm.
4. If the DNS zone is in the same Cloudflare account, Pages should create
   the necessary CNAME automatically. Otherwise, create a CNAME:
   `manager` → `ysca.pages.dev`, AFTER assigning the domain to Pages.
5. Wait for Cloudflare to report the custom domain **Active** and
   the managed HTTPS certificate issued.
6. Verify:
   - `https://manager.youngstarcricketacademy.com/` redirects to
     `https://manager.youngstarcricketacademy.com/manager/updates.html`.
   - Login uses existing production manager credentials; do not share them.
   - `/api/manager/auth` returns an anonymous status (not a 404).
   - D1 update list, draft, Cloudinary image upload, and private fee reminder.
   - `https://ysca.pages.dev/api/updates` continues returning public items.
   - `https://youngstarcricketacademy.com/` remains on GitHub Pages.
   - Mobile and desktop dashboard confirm Delete asks once.

## Domain security

- No manager login link is added to the main navigation.
- The manager login URL itself is not a secret. Enforce a strong unique
  password and Cloudflare Access for additional protection if appropriate.
- Do not place `CLOUDINARY_API_SECRET`, `YSCA_MANAGER_PASSWORD`, or
  `YSCA_MANAGER_SESSION_SECRET` in GitHub, screenshots or messages.
- Keeping this manager Pages host out of public search results is intentional.
