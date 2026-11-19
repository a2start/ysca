# YSCA Manager Updates — deployment checklist

This feature is isolated on `feature/manager-updates-dashboard` for review. **Do not merge into production before configuring Cloudflare.**

## Architecture / hosting (critical)

- The live `youngstarcricketacademy.com` GitHub Pages deployment is STATIC and cannot execute `functions/` endpoints.
- Run the management UI and API at a connected **Cloudflare Pages** deployment (for example `https://ysca.pages.dev/manager/updates.html`) with this repository deployed there. Pages preview remains `noindex`.
- Preview `updates.html` uses its own Cloudflare Pages preview origin for the API. When served from GitHub Pages, the public `updates.html` fetches the API at `https://ysca.pages.dev/api/updates`. Change the `PUBLIC_FEED_BASE` constant if your Cloudflare host differs.
- Bind D1 database as `DB`. Apply SQL in `database/ysca_updates.sql` to the same D1 database or a dedicated YSCA updates D1 DB. Existing contact tables are not changed.
- Media uploads use **Cloudinary** instead of R2. Create a free Cloudinary account, then add these **server-side Cloudflare variables / secrets** to the **Production** environment of the `ysca` Pages project (the current manager environment):
  - `CLOUDINARY_CLOUD_NAME` — exact Cloudinary cloud name; plaintext variable is acceptable.
  - `CLOUDINARY_API_KEY` — API key; use an encrypted secret.
  - `CLOUDINARY_API_SECRET` — API secret; **always** encrypted. Never add it to GitHub or a browser.
- After changing Cloudflare environment settings, redeploy `feature/manager-updates-dashboard` and verify uploaded media. There is **no new D1 migration**: the existing `ysca_update_media` table stores `cloudinary:<asset_id>` in `object_key`.
- Cloudinary files are uploaded as `authenticated` assets (not publicly accessible at Cloudinary CDN URLs). The Cloudflare manager media API requires the manager login cookie. The public media API only streams images/videos attached to a **published, public, website-enabled, non-fee** update.
- A legacy `YSCA_MEDIA` R2 binding is optional **only for reading existing R2 records**; new files use Cloudinary. Use YouTube URLs for longer videos (the manager currently allows uploads up to 10 MB).
- Cloudinary upload/download API requests are made by Cloudflare Pages Functions. The API secret never reaches the web browser. Cloudinary's free usage quota applies; monitor bandwidth and storage.
- Configure **Cloudflare Pages secrets** (never commit them):
  - `YSCA_MANAGER_PASSWORD` — random, unique 16+ character password.
  - `YSCA_MANAGER_SESSION_SECRET` — random 64+ character secret.
  - Optional `TELEGRAM_BOT_TOKEN` and `TELEGRAM_CHAT_ID` for auto-sending to one private channel. Add the bot as a channel administrator.
- Only after Cloudflare and D1 have been configured, merge this branch. Check the Cloudflare deployed functions before offering the dashboard URL to managers.

## Publishing and safety

- Staff sign in at `/manager/updates.html` on the Cloudflare Pages host. The login cookie is HttpOnly, SameSite Strict, Secure, and signed by the server.
- Select a category, audience, destination(s), upload photo/video if desired, then Save Draft or Publish.
- Drafts are not public and do not trigger Telegram delivery.
- Website updates are public only when status is published, visibility is public, category is not fee, and website was selected.
- Fee reminders are forced private and cannot be published to the public updates feed. Student-specific payment details should never be posted into publicly accessible channels.
- Uploaded media cannot be accessed publicly unless attached to an approved public website update.
- WhatsApp: **No official API supports sending directly to arbitrary pre-existing WhatsApp groups.** This dashboard prepares messages and opens WhatsApp's own share UI. The manager must choose the groups and press Send individually. Group checkboxes are an intent list, not completed delivery, and the app never claims WhatsApp messages were sent.
- If a manager asks for Facebook, Instagram, Google Business Profile, email or other channels, they need separately configured authorized integrations; currently only website + optional Telegram API are implemented.
- Follow applicable parent/student consent requirements when publishing images or private information.
- Never trust a selected channel as evidence of successful delivery. Telegram records `sent`, `failed`, or `not_configured`; WhatsApp is `ready_to_share_manually`.

## QA before production

1. Configure bindings, migration, and secrets on a Cloudflare staging deployment.
2. Confirm anonymous `/api/manager/updates` = 401.
3. Confirm unauthorized POST/PATCH/upload = 401.
4. Verify login, 8-hour session, logout, invalid password lockout.
5. Save a draft; verify it's missing from the public feed.
6. Publish public announcement and verify it appears on `updates.html`.
7. Publish a private fee notice; confirm it never appears on the public feed.
8. Configure Cloudinary variables/secrets in Cloudflare, redeploy, and upload a test image (<1 MB). Verify private/draft uploads return 404 at the public media endpoint, and that public media appears only after publication. Test MP4/WebM under 10 MB separately.
9. Select multiple WhatsApp groups; verify share handoff requires manual selection/Send and no false success.
10. Test Telegram configured and unconfigured status, XSS escaping and mobile responsiveness.
11. Verify `/manager/updates.html` has noindex, and the public Updates page has its normal canonical metadata.
12. Confirm existing contact form, site navigation and photo gallery are unaffected.

## Cloudinary activation checklist

1. Create a free Cloudinary account at https://cloudinary.com/. Obtain Cloud name, API key, and API secret from Cloudinary's dashboard. Do not paste the secret into chat.
2. In Cloudflare → Workers & Pages → `ysca` → Settings → Production → Variables and secrets, add the three names above; **encrypt both key and secret**.
3. Redeploy the latest `feature/manager-updates-dashboard` commit. Ensure `https://ysca.pages.dev/api/manager/auth` continues to return `configured: true`.
4. Create a **photo** update, upload a non-sensitive test JPG/PNG, and publish it to the website. The public page `https://ysca.pages.dev/updates.html` should display it.
5. Verify no new R2 binding is needed, and check Cloudinary Media Library for a file under `ysca-updates`.
6. Create a **video** update with MP4/WebM under 10 MB. Verify video plays. If Cloudinary's bandwidth/processing limits are reached, use a YouTube URL instead.
7. Archive both test posts and verify they disappear from the public page. Cloudinary files remain stored for now; add a separately reviewed cleanup flow later to avoid deleting shared/in-use assets.
8. Never upload student identities or confidential fee details to a public announcement without consent.

**Security tradeoff:** Private asset URLs are not directly shared with visitors. The public API streams protected assets server-side after checking publication state; it may consume Cloudinary and Cloudflare quotas. This is preferable to unrestricted public CDN URLs for the academy's draft/private workflow.

## Future roadmap

- Admin-edit/update scheduling, delivery queue and retries with Cloudflare Cron.
- Optional additional social APIs, per-platform formatting, consent-driven student/parent member portal, media approval.
- Role-specific manager accounts using Cloudflare Access or established identity provider instead of one shared password.
