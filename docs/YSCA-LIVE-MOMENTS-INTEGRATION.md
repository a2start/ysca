# YSCA Live Media → Existing Website Sections

## Content routing
- The manager at `ysca.pages.dev/manager/updates.html` is the authoring interface.
- It writes published, public, website-enabled updates to the existing Cloudflare D1 tables; the public read-only `/api/updates` endpoint filters drafts, private messages, fee reminders and archived items.
- **YouTube URL** in an approved website update → `youngstarcricketacademy.com` existing **Training Highlights** section, alongside the curated eight YouTube videos, using the current thumbnail → click → inline player and close behavior. New videos are newest-first, deduped by video ID, limited to eight new cards on the homepage. The complete set of newly published videos is available under Academy Moments.
- **Image upload (Cloudinary)** in an approved website update → up to six newest images in the homepage's existing photo gallery, plus latest media grid at **Academy Moments** (existing `/photo-gallery` URL).
- **Short Cloudinary MP4/WebM upload** in an approved website update → Academy Moments page with native playback controls.
- **YouTube video** in Academy Moments → thumbnail with click-to-play embed (no iframe loaded until click).
- General text announcements, training notices, schedules and matches remain in the existing public `/updates.html` archive. If a public update contains a photo/video, the media additionally appears in Academy Moments.
- **Private fee reminders NEVER appear in public feeds**; WhatsApp sharing still requires recipient selection and sending inside WhatsApp.

## SEO and URLs
- Keep `/photo-gallery` as the existing page URL/canonical (no redirects or broken links).
- Change visible name to **Academy Moments**; desktop header uses **Moments** to preserve menu width, mobile/footer use full title.
- Page title/H1 and description are updated for photo/video relevance in Greater Noida.
- Media cards are client-side progressive enhancements; existing static content remains if backend is offline.
- Google may not index all dynamically inserted photos/videos. A future server-rendered feed can improve individual-media discoverability if needed.

## Technical notes
- New assets: `assets/js/ysca-live-moments.js`, `assets/css/ysca-live-moments.css`.
- Home video script uses event delegation; dynamic cards use identical DOM hooks and classnames.
- Homepage and gallery lightGallery instances refresh after new images are appended.
- Source of truth is Cloudflare D1 read-only `https://ysca.pages.dev/api/updates`. No GitHub commits/builds are required for each new media item once these front-end assets deploy.
- Public `/api/updates` allows Origin `https://youngstarcricketacademy.com` already; published media endpoint permits CORS.
- No credentials, Cloudinary API secrets or WhatsApp group IDs are sent to website visitors.
- Up to 100 newest public updates are queried from API, max 48 moment cards rendered, and home adds up to 8 YouTube videos + 6 photos.

## QA before release
1. Verify eight existing YouTube cards still work, close icon remains above iframe, and no autoplay until click.
2. Publish a website-approved YouTube video link from manager. It must appear as a thumbnail in the homepage Training Highlights grid without a GitHub deploy. Click to play; second click on another poster stops the first.
3. Publish approved photo. It should appear on homepage gallery and Academy Moments without a GitHub deploy; clicking should enlarge via lightGallery. Test title/alt text.
4. Upload short MP4/WebM and check native controls in Academy Moments.
5. Archive content: after cache (~60 seconds), verify it disappears from dynamic sections.
6. Verify draft/private/fee reminder records never appear in homepage or public gallery.
7. Verify main site remains usable if Cloudflare API fails or is blocked.
8. Verify mobile layouts and non-duplicated photo/video cards; test invalid/duplicate YouTube IDs.
9. Verify existing gallery album cards, links, nav and other site pages remain intact.
10. Confirm all visible navigation says Academy Moments (or Moments) without changing `/photo-gallery` paths.

**Deployment:** Front-end can be promoted to GitHub Pages `main` independently of unfinished manager dashboard UX. Backend stays on Cloudflare Pages `ysca`.
