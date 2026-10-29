# YSCA — Complete Website Consistency, Global Styling & Safe Implementation Specification

**Prepared:** 29 October 2026  
**Site:** https://youngstarcricketacademy.com/  
**Preview:** https://ysca.pages.dev/  
**Repository:** `a2start/ysca`  
**Production branch:** `main` (Cloudflare Pages `ysca-live`)  
**Existing agent workspace:** `seo-final-implementation` (reported local branch; check locally because it is not a remote branch in the repository at time of repository inspection)

## A. What the source inspection actually found

Source basis: repository's `main` at `1c8ad06aa2344a849ca08d53443c33fd516d0c2c` and current publicly readable homepage and Programs page. These are **source/code observations**, not proof of the pixel-level rendered appearance of all pages. Do not conflate repository branch, deployed commit, and local unfinished work.

1. `assets/css/style.css` is the large shared stylesheet (~243 KB, 10,364 lines), with two separate `:root` token blocks, approximately 328 `!important` uses, and approximately 279 `@media` blocks. Avoid a wholesale rewrite.
2. Its initial `:root` contains `--primary-color: #ff970c`, `--body-font: "Philosopher"`, several gray/ink colors, **but no declaration for `--heading-font`** even though headings call `font-family: var(--heading-font)`.
3. Brand colors are repeated/hardcoded in the same stylesheet, prominently `#07162c` (navy), `#0b1747` (blue), `#fea630` (gold), plus `#ea580c`, `#ff970c`, `#d97706`, `#f59e0b`, etc. Some may intentionally represent status, gradients, or special components; classify before replacing.
4. Fonts are split: `Philosopher` for headings, `Plus Jakarta Sans` on many pages, and `DM Sans` on contact/coaches/program templates. Different page families load different Google Fonts URLs. This may produce inconsistent typography, font metrics, and render shifts.
5. Shared base CSS removes focus outlines via `a:focus, input:focus, textarea:focus, button:focus { outline: none; }` without a universal documented focus-visible replacement. This is an accessibility risk.
6. Global CSS sets `i, span, a { display: inline-block; }`, and `body { overflow-x: hidden; }`; do not change either globally without layout and interaction QA; hidden overflow could conceal layout overflow.
7. The homepage has about 70 inline `style=` declarations; Programs has 32; Contact 28; each of the four primary program pages and the generic `program-detail.html` has 58. Each coach page has about 15. This complicates global tokens and may override shared rules.
8. The main website pages use `assets/css/style.css` and `assets/css/spacings.css`; most also have an inline `<style>` block. `assets/css/spacings.css` contains dozens of fixed-value utility classes. Normalize semantically, **do not rename utilities blindly**.
9. Repeated UI appears in desktop/mobile navigation, program cards, coach cards, facility cards, CTAs, and footer. Shared copy and design should not diverge between those variants.
10. The live homepage and Programs page still include content inconsistencies and unverified claims (age bands vs U-12/U-16 labels; three versus four meals; coach ratio; coaches' certifications, selection promises, numerical track record). This is a **text consistency** as well as SEO task.
11. Accessibility contrast check: `#FEA630` gold against white is ~1.96:1, and against `#07162C` dark navy is ~9.23:1. White regular text directly on gold is not accessible; dark navy on gold is generally much safer. Test every actual component state before choosing text colors.
12. File families include 25 top-level source HTML files, not all necessarily public/canonical. Published sitemap historically contains 21 URLs. Test **every actual canonical public page** plus template/fallback HTML and responsive variants; never equate 25 HTML files with 25 indexable URLs.

## B. Assignment to the implementation agent

You are the senior frontend architect, design-system engineer, editor, accessibility specialist, and regression QA engineer for Young Star Cricket Academy. **Implement** a complete cross-page design and content consistency cleanup. Do not restart keyword research or add new page types. The goal is a unified professional design that closely preserves the current visual identity, with zero confirmed critical regressions.

### Boundaries

- Use the attached current SEO implementation and fact-verification documents and the current repository as your source of truth. **First reconcile any unfinished local commits** in `seo-final-implementation` with current `origin/main`; do not overwrite ongoing SEO work.
- Don't restructure page layouts or redesign major sections unless a defect demands it. No arbitrary color refresh, framework replacement, or broad `!important` override.
- Do not deploy before tests pass. The owner's authorization to deploy applies to a completed, tested result, not an incomplete phase. If tests cannot be run, stop before production and accurately identify the blocker.
- No fabricated facts. Preserve the academy's actual wording and offer details where verified; remove or neutralize unsupported promises.
- Do not change the verified public URL mapping, GTM, canonicals, Cloudflare Pages contact Functions, KV binding, or DNS just for visual cleanup.

## C. Build a token-based global design system without visual regressions

### 1. Inventory existing design

Extract **actual computed** design properties in browser (not just CSS literals) on homepage, About, Programs, four program pages, seven coaches, facilities, Gallery, and Contact at widths 320, 375, 390, 768, 1024, 1280, 1440, 1920. Record:

- Header heights, fixed/sticky behavior, menu styles, mobile drawer, overlay, z-index and menu state.
- Brand logo sizing, footer logo and transparent-background variants.
- Background/foreground colors, gradients, divider colors, opacity, hover, focus, active and disabled states.
- Typography family, weight, clamp sizes, line heights, letter spacing, paragraph width and capitalization.
- Container widths, gutters, section paddings, grids, gaps, card dimensions, border radii and box shadows.
- Buttons, CTAs, badges, cards, tabs, category filters, accordions, galleries, carousels, breadcrumbs and forms.
- Mobile typography and safe-area spacing; 200% browser zoom and text enlargement.

Write a *before* inventory and baseline screenshots for every public page, including menus opened and closed, program filters changed, forms focused, and gallery interactions.

### 2. Canonical brand-token candidates (verify visual baseline)

Preserve existing identity by starting from these **candidate** colors taken from source and the established design, not forcing them into every existing class:

```css
:root {
  /* Brand — verify against current screenshots */
  --ysca-color-navy-950: #07162c;
  --ysca-color-navy-900: #0b1747;
  --ysca-color-navy-800: #0e1b2e;
  --ysca-color-gold-500: #fea630;
  --ysca-color-gold-hover: #e89903;
  --ysca-color-white: #fff;
  --ysca-color-surface: #f8fafc;
  --ysca-color-border: #e2e8f0;
  --ysca-color-text: #1c1d1e;
  --ysca-color-text-muted: #475569;

  /* Roles: maintain good contrast */
  --ysca-color-primary: var(--ysca-color-navy-900);
  --ysca-color-accent: var(--ysca-color-gold-500);
  --ysca-color-on-accent: var(--ysca-color-navy-950);
  --ysca-color-on-dark: var(--ysca-color-white);

  /* Font roles */
  --ysca-font-heading: 'Philosopher', Georgia, serif;
  --ysca-font-body: 'Plus Jakarta Sans', Arial, sans-serif;
  --ysca-font-ui: var(--ysca-font-body);

  /* Semantic layout values; calibrate to current computed UI */
  --ysca-container-max: 1240px;
  --ysca-radius-sm: 6px;
  --ysca-radius-md: 12px;
  --ysca-radius-lg: 20px;
  --ysca-space-1: 4px;
  --ysca-space-2: 8px;
  --ysca-space-3: 12px;
  --ysca-space-4: 16px;
  --ysca-space-6: 24px;
  --ysca-space-8: 32px;
  --ysca-space-12: 48px;
  --ysca-space-16: 64px;
  --ysca-duration-fast: 160ms;
  --ysca-duration-normal: 260ms;
}
```

**Implementation rules:**

- Keep the existing `--primary-color`, `--heading-color`, `--body-font`, etc. as compatibility aliases first. Determine which existing rules consume these variables; do not remove old names immediately.
- Define the missing `--heading-font` with a deliberate fallback. Make heading and body fonts consistent while checking text wrapping and layout changes. Coach/program modules currently use DM Sans; do **not** globally remove it without screenshot/overflow checks.
- Treat status colors (success/error), illustration colors, photo overlays, gradients, third-party CSS, and exceptional branding as exceptions, not mistakenly normalized hardcoded colors.
- Implement in a single clearly documented global theme file or a well-identified global token section within `assets/css/style.css`, whichever is safer given the existing static HTML loader. Ensure identical CSS asset version/load order on all pages.
- Move repeated styles into shared CSS **incrementally**; consolidate repeated selectors while keeping page-specific modules scoped. Do not append another large override pile to the end of `style.css`.
- Convert inline styles only when their actual computed appearance and runtime behavior can be preserved. Ensure JS-driven styles, CSS custom properties, and hidden UI states still work.
- Leave Bootstrap/plugin vendor styles untouched. Do not mass-replace all hex colors with one accent.

### 3. Typography consistency

- Headings generally use Philosopher, body/UI uses Plus Jakarta Sans; retain DM Sans only when visually justified and documented as a deliberate component variant.
- Establish global heading scale using fluid typography and correct line heights, but maintain current breakpoints and avoid headings overlapping navigation.
- Standardize paragraph line height, content widths, strong/emphasis, lists, links, navigation labels, breadcrumbs, captions, and CTA casing. Use actual site language consistently (e.g. English `programme` vs `program` where branding style demands one).
- Fix uneven text alignment, dangling headings, widows, overly dense paragraphs, inconsistent title case, spelling, overly promotional or contradictory wording.
- Never alter H1/heading semantics solely for visual styling; use CSS classes.

### 4. Color and interaction consistency

- One semantic accent role for gold: cards, section eyebrows, buttons, active states, tags and decorative elements should follow one documented rule. Preserve original brand appearance.
- Check legibility on dark hero overlays, tinted sections, buttons, outlines, nav states, banners and form feedback.
- **Do not use white regular-size text on `#fea630`**; use dark navy or verified accessible alternative.
- Replace the inaccessible global `outline: none` behavior with safe `:focus-visible` treatments, tested for all inputs, links, controls and mobile navigation. Do not remove intentional focus behavior of JavaScript widgets.
- Respect `prefers-reduced-motion` without disabling key functionality; ensure hover effects aren't the sole indicator of selection.

### 5. Component consistency

Normalize and verify shared components across every page:

- Desktop/mobile header, nav dropdown, hamburger, sticky state, logo and free-trial CTA.
- Footer: address, contact details, secondary navigation, copyright, social links, WhatsApp behavior and legal links.
- Hero backgrounds/overlays, breadcrumb placement, H1 size, buttons and mobile cropping.
- Programme selector/filter: label clarity, card height, active state, no-results state, selected item and linked detail pages.
- Coach directory/cards/profiles: photos, title style, qualifications display, label formatting and CTA destinations.
- Facility cards and feature lists: icon styles, spacing, descriptions and links.
- Tabs, accordions, galleries, modals, sliders, photo/video previews, loading state, preloader and scroll animations.
- Contact forms: label spacing, input heights, validation error state, confirmation state, phone/email/map links, hidden honeypot, mobile keyboard/zoom and real API submission.
- Floating WhatsApp button and other fixed overlays must not collide with cookies, menus, sticky CTAs or mobile safe areas.
- Buttons: consistent min height, radius, font, horizontal padding, hover/focus/disabled and accessible targets. Do not force uniform button widths if the design intentionally uses different sizes.

### 6. Text and factual consistency

Create a single internal facts/terminology reference. Check all *visible* content, duplicate desktop/mobile UI text, FAQs, metadata and structured data. Correct or neutralize the known contradictions:

- 20+ versus 15+ years of experience; 5000+ versus 500+ trainees.
- U-12/U-16/U-19+ labels versus actual age-based 6–10, 11–14, 15–19 programme descriptions.
- Three versus four hostel meals; hostel supervision, availability and facilities.
- Coach qualifications and accreditation labels; unsupported 1:12 ratio and selection/trial guarantees.
- Training times, batch days, net count, equipment, scholarships/fee promises.
- Inconsistent `Free Trial`, `Free Net Trial`, `1-hour evaluation` and `1-day assessment` labels: use only verified offer terms.
- Contact telephone/email/address/location data on footer, Contact, JSON-LD, social metadata, FAQs and WhatsApp links.
- Consistent naming of `Young Star Cricket Academy` and `YSCA`; heading case; consistent `Net Practice`, `Cricket Training`, `Hostel`, `Gym`, programme names.

Do not rewrite strong content for the sake of uniform word count. Maintain clear, unique SEO intent per page and preserve one H1, current canonical URL, helpful internal links and validated schema.

### 7. Images and icons

- Normalize image proportions, object positioning, placeholder behavior, card thumbnails and border radii **by component role**, not using one global `img` rule. Avoid cropping faces, equipment or important content.
- Keep informative alt text accurately tied to actual image; decorative elements `alt=""`.
- Verify favicon, logos, icon fonts, Font Awesome, SVG decorative colors, loaded plugin CSS, 404 image fallbacks.
- Retain width/height or aspect-ratio to prevent CLS; don't lazy-load the LCP hero image; avoid downloads that slow mobile pages.

## D. Safety and regression testing (hard release gate)

**Preflight:** Record branch, remote SHA, clean/dirty tree, baseline screenshots, CSS asset hashes, current deployment SHA and rollback target. Do not overwrite concurrent SEO agent changes. No force pushes.

**Static validation:** CSS parsing; HTML validity; missing imports/variables; broken asset URLs; forbidden duplicate IDs; title/H1/canonical; canonical and sitemap URL counts; JS syntax; structured-data JSON; color contrast and keyboard-accessible controls. Document intentional exceptions.

**Browser/device matrix:** Chromium, Firefox and WebKit where supported; mobile 320/375/390/430; tablet 768/1024; desktop 1280/1440/1920; 200% zoom; keyboard-only; reduced motion. For every canonical public page, take before/after screenshots at matched viewport/data state, compare and manually review changed pixels. A numerical diff threshold is **not** a substitute for human validation. Test load, font rendering, no horizontal scrolling, no clipped content, responsive cards and focus visibility.

**Functional smoke tests:** all navigation links, dropdowns, programmes filter, accordions, gallery/lightbox, preloader exit, sticky header, scroll animations, contact form validation and success, trial URL parameter prefill, Cloudflare Pages Function and storage, WhatsApp/phone/map buttons, keyboard navigation and escape/back.

**SEO/indexing tests:** Production must have **no `noindex`**, and `ysca.pages.dev`, `ysca-live.pages.dev`, and Cloudflare branch preview hostnames must remain `noindex, nofollow`. Confirm actual deployed headers for home, inner page, sitemap and robots. Verify production `robots.txt`, sitemap (21 canonical URLs unless intentional documented change) and structured data.

**Performance:** Measure before/after mobile Lighthouse/PSI or browser lab metrics under comparable conditions; avoid regressions in LCP, INP, CLS and visual loading. Capture source and timestamp. No fabricated scores.

**Rollback:** Maintain exact previously deployed main commit and verified Cloudflare production deployment ID. If any critical failure appears, restore the prior production deployment and re-verify indexability and contact functionality.

## E. Work plan with actual implementation and checkpoints

1. **Inventory & baseline:** capture computed styles, screenshot baseline and a page/component consistency matrix, without modifying source.
2. **Token layer:** define additive global tokens and compatibility aliases; commit separately; test on all pages.
3. **Fonts + focus/contrast:** normalize roles and accessibility treatments with targeted scoped changes; commit and test.
4. **Reusable components:** move only confirmed duplications into shared rules, grouped by header/footer/cards/buttons/forms; commit per group and test.
5. **Text/facts:** reconcile verified factual inconsistencies in desktop/mobile, SEO and schema; don't invent claims; commit.
6. **Full QA:** automated + visual/interaction tests, before-after diffs, stop on failures.
7. **Production release:** only once every P0/P1 gate passes, reconcile with `origin/main`, merge cleanly, deploy via Cloudflare `ysca-live`, and test production and preview URLs. If release gates cannot be completed, **leave production unchanged and provide a precise checkpoint**.

### Mandatory deliverables

- `DESIGN-TOKENS.md`: named semantic tokens, permitted exceptions, original-to-new mappings.
- `DESIGN-CONSISTENCY-MATRIX.md`: per-page/per-component text, colors, fonts, paddings, nav/footer and interactions, severity/actual fix.
- `VISUAL-REGRESSION-REPORT.md`: screenshot matrix, links or artifact paths, changed-pixel reviews, mobile/desktop notes.
- `CONTENT-CONSISTENCY-REPORT.md`: before/after excerpts for all verified corrections and factual items needing owner confirmation.
- `QA-AND-RELEASE-REPORT.md`: automated/browser tests, accessibility/contrast, cloud indexing checks, contact form, deployment SHA, rollback target and blockers.

### Final execution instruction to the coding agent

**Start implementation now on the existing SEO working branch in the local repository.** Do not start another SEO research cycle or provide only an implementation plan. Do not blindly rewrite `style.css` or batch-replace HEX values. Preserve all site functionality and brand identity. Complete the work, test rigorously, and deploy only when hard release gates pass. If blocked, preserve commits and provide precise, truthful evidence about what remains; do not claim production was updated when it was not.
