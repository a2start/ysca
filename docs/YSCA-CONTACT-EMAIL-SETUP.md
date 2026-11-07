# YSCA contact form + professional email setup

## What is implemented
- Website: `/contact` submits to `/api/contact` on the Cloudflare Pages origin.
- Save before sending emails: D1 table `ysca_contact_enquiries` if migrated; otherwise legacy `CONTACTS_KV` fallback when bound.
- Rate limit 5 submissions per IP per hour; hidden honeypot, length checks, and same-origin checks.
- Email notifications: from `contact@youngstarcricketacademy.com` through SMTP2GO API. One manager notice to the same professional address (forwarded by Cloudflare to academy Gmail) and one acknowledgement to the student/parent.
- Notification errors are logged; a successfully stored enquiry is not lost or falsely reported as failed if SMTP2GO is unavailable. This is not yet a retry queue.

## Required Cloudflare configuration (public website deployment)
The domain uses Cloudflare Pages. Configure the **Pages project currently serving `youngstarcricketacademy.com`** (not automatically the separate `manager.` deployment).

1. Cloudflare → Workers & Pages → relevant Pages project → Settings → Bindings → Add → D1 database, binding **`DB`**, selecting the existing academy D1 database where enquiries should live. Apply `database/ysca_contact_enquiries.sql` to that database using the D1 dashboard/SQL Console. This is additive and creates its own tables.
2. Alternatively, bind a Workers KV namespace as **`CONTACTS_KV`** to preserve legacy storage while configuring D1. Use D1 for the final installation; do not remove an existing KV binding until records are migrated if they must remain available.
3. SMTP2GO → Sending → API Keys → create an API key allowed to send emails. Add it in Cloudflare → Pages project → Settings → Variables and Secrets → **`SMTP2GO_API_KEY`** → encrypted secret. **This is not your Gmail App Password or SMTP2GO SMTP password.** Do not share or commit the value.
4. Optional: set **`YSCA_ENQUIRY_RATE_SALT`** to a random secret to salt the per-IP rate-limit hash.
5. Redeploy the public Pages project after changing bindings or secrets.
6. Keep Cloudflare Email Routing (MX + DKIM), SMTP2GO verified domain (DKIM + Return-Path) and DMARC as they are. Do not add extra SPF TXT records.

SMTP2GO accepts `POST https://api.smtp2go.com/v3/email/send` with `X-Smtp2go-Api-Key`. The API response must report `data.succeeded >= 1`, not merely HTTP 200.

## Acceptance tests
1. Request GET `https://youngstarcricketacademy.com/api/contact` → JSON endpoint health. If this returns HTML/404, the public Pages project's Functions deployment/routing is not active.
2. Submit the live contact form using **your own** test contact info. Verify a success response.
3. Check the D1 `ysca_contact_enquiries` table for the submission and status `new`. If using KV instead, check an `inquiry:<id>` key.
4. Confirm **manager notice** reaches `contact@youngstarcricketacademy.com` and is forwarded to `youngstarcricketacademy.com@gmail.com`, and **parent acknowledgement** reaches the supplied test address.
5. Check SMTP2GO Activity for accepted/delivered status and recipient headers for SPF/DKIM/DMARC.
6. Submit an invalid email, a honeypot submission, and repeat submissions to check validation/rate limiting. Avoid using a genuine student's data in tests.
7. Check Cloudflare Function logs for redacted error messages and review sender quota.

## Limitations / follow-up
- Code is committed, but **actual delivery is not enabled** until the Pages project has the encrypted SMTP2GO API key and active storage binding/table.
- The manager dashboard's existing enquiry viewer has **not** been connected to the new `ysca_contact_enquiries` table; that requires a separate authenticated manager endpoint/UI.
- The contact form notification has no persistent retry mechanism. If sending fails after saving, check Cloudflare logs and SMTP2GO activity. For higher assurance add a durable email outbox/queue.
- Use Cloudflare Pages Functions, not static GitHub Pages, for `/api/contact`.
