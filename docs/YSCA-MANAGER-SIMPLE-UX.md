# YSCA Manager Dashboard — Simple UX rollout

## Scope
This branch builds on `feature/manager-updates-dashboard` and keeps existing Cloudflare Pages Functions, D1 tables, signed login, Cloudinary, and public Updates feed.

### Quick actions
- Announcement (public website default, optional WhatsApp/Telegram).
- Fee reminder (private, website disabled, WhatsApp preselected; fee month and due date auto-fill a template).
- Schedule/Event (training, matches, holidays, events).
- Photos & Videos (Cloudinary upload for a single photo/video, optional YouTube link).
- Additional content types are available in the type dropdown.
- Clear Review & Continue step before publish.

### WhatsApp sharing
The user selects *WhatsApp* just once and chooses recipients inside WhatsApp, not in the dashboard. New records store the marker `["__share__"]` in the existing `whatsapp_groups` JSON column, avoiding a schema migration. Old group IDs continue to work in history.

**Important:** No automatic WhatsApp group delivery, no recipient preselection, no delivery confirmation. WhatsApp opens *only after* the dashboard confirms the update is saved. If the popup is blocked, the user can retry from All Updates.

WhatsApp sharing carries the **text and, when website publication is selected, a public Updates page link**. It does **not** attach Cloudinary media files directly to a WhatsApp conversation; managers can choose recipients and share website links.

### Updates history
- Search and filter drafts, published and archived records.
- Edit titles/content and category, media reference, and website publication visibility.
- Duplicate an existing update as a new draft.
- Archive or restore, with restored records always going to Draft for review.
- Changes to already published content **do not resend Telegram**. A new update must be created to re-notify Telegram followers.
- Telegram and WhatsApp statuses do not overstate actual delivery.

### Compatibility and data safety
No database schema changes. Existing update rows, groups and attachments remain intact.
- Private fee reminders must remain private and cannot go to the public updates feed.
- No user-supplied content is inserted into UI via `innerHTML`; render text using `textContent`.
- Site copy uses YSCA typography and colors, and controls remain usable on mobile.
- Manager login and D1 authorization are unchanged.
- The deployment on the Cloudflare `ysca` project currently uses `feature/manager-updates-dashboard` as its **Production** branch. Don't replace it automatically; test this redesign on a preview with equivalent bindings/secrets or use a controlled staging environment. Preserve the separate `ysca-live` project and the .com website.

## QA checks
1. Confirm the new branch deploys assets and functions successfully; check mobile and desktop navigation.
2. Sign in/out, verify unauthenticated requests return 401.
3. Quick-create Announcement; Save Draft and confirm missing from public feed.
4. Review and Publish Announcement, confirm public Updates feed displays it.
5. Fee Reminder: auto-fill month/date, confirm website disabled; Save and ensure private content is absent from public feed.
6. WhatsApp toggle: after successful save, share picker opens without selecting groups automatically; group recipients are chosen in WhatsApp only.
7. Test no WhatsApp popup if saving/upload fails; retry from All Updates.
8. Upload a Cloudinary photo and confirm preview/public display. Test a short video and a YouTube link.
9. Search, duplicate, edit, archive, restore and republish without losing historical records.
10. Verify editing an existing published record doesn't resend Telegram, and archiving removes it from the public feed.
11. Check WCAG keyboard navigation, contrast, touch targets, long messages, reduced motion, and responsive layout.
12. Do not merge until tests pass on the target deployment.

## Deferred advanced features
- True scheduled publishing (requires a job/queue and schema changes).
- Multiple photo uploads, image optimization, video transcoding and storage usage dashboard.
- Granular manager accounts/roles (replace shared password with managed identity).
- Native official social platform API integrations.
- Scheduled fee reminder generation and delivery confirmations.
