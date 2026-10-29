# SEO remediation baseline

Date: 29 October 2026  
Branch: \`seo-optimization\`  
Scope: current repository source and read-only live checks. This matrix is a baseline, not a claim that a feature has been tested in the deployed environment.

## Page inventory baseline

All 25 public root HTML documents have one title, meta description, canonical link and H1. The homepage has Open Graph metadata and JSON-LD; the remaining pages do not currently have page-specific Open Graph metadata. No page is being rewritten solely to add keyword repetition.

| Page group | Issue | Evidence | Severity | Already fixed? | Required action |
| --- | --- | --- | --- | --- | --- |
| Homepage | Entity schema includes generic social-platform homepages, an unverified price range and opening hours. | \`index.html\` JSON-LD \`sameAs\`, \`priceRange\`, \`openingHoursSpecification\`. | High | No | Remove unsupported properties. |
| Homepage | Offer schema ages and outcome language conflict with visible programme ages and safe copy. | \`index.html\` JSON-LD describes Junior as 10–14, Senior as 14–19 and promises trial preparation. | High | No | Use neutral, non-promissory descriptions aligned to visible programme labels. |
| Homepage, About, programmes, facilities, coaches and coach profiles | Historical marketing copy still contains unverified credentials, player/experience counts, infrastructure counts, hostel inclusions and selection claims. | Source scan finds 15+/20+, 500+/5,000+, 10+/12+ nets, BCCI/NIS/ICC claims and meal/selection assertions. | High | Partly documented | Do not choose a competing figure. Retain the register in \`SEO-FACT-VERIFICATION.md\`; remove only claims touched by this remediation unless owner evidence is supplied. |
| Contact and trial routes | Client-side safe query prefill and Pages Function exist; configured storage and real submission cannot be confirmed from the repository. | \`contact.html\` uses \`/api/contact\`; \`functions/api/contact.js\` requires \`CONTACTS_KV\`. | High | Source implementation exists | Verify a non-sensitive preview submission only with authorised Cloudflare access. |
| Preview indexing | Static \`_headers\` and Pages middleware specify \`X-Robots-Tag: noindex, nofollow\`; live deployment must confirm it. | \`_headers\`, \`functions/_middleware.js\`. | High | Source implementation exists | Verify after an authenticated Pages deployment. |
| Canonicals and sitemap | Canonicals/sitemap source use the production \`.com\` host; live response behavior is not source-verifiable. | 21 sitemap URLs; 25 pages have canonical links. | Medium | Source implementation exists | Verify live status, redirects and sitemap response. |
| All non-homepage pages | No page-specific Open Graph metadata. | Source inventory: zero \`og:\` tags outside \`index.html\`. | Low | No | Defer until verified page images/social sharing requirements are available. |
| Navigation, mobile layout and accessibility | Source can be inspected; interactive browser behavior cannot be proven without browser access. | Static HTML/JS only. | Medium | Unverified | Test keyboard navigation, menus, filters and breakpoints in a browser before release. |

## Intent map retained for this remediation

| Page | Primary intent |
| --- | --- |
| Homepage | Cricket academy discovery for Greater Noida service-area searches |
| About | Academy approach and trust |
| Programmes | Compare age/focus-based coaching options |
| Foundation / Junior / Senior / One-to-one | Beginner, junior, advanced and individual-coaching enquiries |
| Cricket Training / Net Practice / Hostel / Gym | Facility or availability enquiries |
| Coaches and profiles | Coaching-team evaluation |
| Gallery | Training visual reference |
| Contact | Admissions, trial and location enquiries |

The physical training-ground address is Malakpur. Greater Noida remains a service-area/search-intent reference only where the page does not state it as the physical address.

## Post-remediation source and live-check status

| Item | Status | Evidence / next action |
| --- | --- | --- |
| Homepage entity schema | Fixed in source | Placeholder \`sameAs\`, \`priceRange\` and unverified hours removed; offer descriptions now avoid unsupported outcomes and match visible age labels. |
| Preview indexing policy | Fixed in source, awaiting deployment | Host-aware middleware adds \`X-Robots-Tag: noindex, nofollow\` for \`ysca.pages.dev\` and branch preview hostnames only. |
| Production indexing policy | **Live failure; source correction awaiting deployment** | On 29 October 2026, \`https://youngstarcricketacademy.com/\` returned HTTP 200 from Cloudflare with \`X-Robots-Tag: noindex, nofollow\`. Do not release until an authorised deployment returns no such header on the production hostname. |
| Production sitemap and robots | Live failure; configuration investigation required | Both returned HTTP 200 but also inherited \`X-Robots-Tag: noindex, nofollow\`, confirming the issue is host-level, not a page canonical problem. |
| Contact endpoint | Partly verified | Preview \`GET /api/contact\` returns HTTP 200. A real storage submission remains blocked pending authorised Cloudflare KV access and an approved non-sensitive test. |
