# YSCA SEO implementation plan

Date: 29 October 2026  
Branch: `seo-optimization`  
Primary source: `MD/deep-research-report.md`

## Research position

Greater Noida is the primary location because the repository identifies the academy at Delta II, Greater Noida. Noida, Noida Extension and nearby areas are travel catchments only; no branch or location-specific service claim will be added without owner confirmation. The report provides qualitative search-intent evidence only: Search Console and Keyword Planner metrics were not available, so no volume, difficulty, CTR, position or competitor-performance figures will be added.

The linked implementation playbook referenced by the report is not present in this repository or accessible at its `sandbox:` path. This plan therefore uses the complete report, the existing `seo-research/` artifacts, and the current source as its implementation evidence.

## Keyword and intent map

| URL / source file | Primary intent and theme | Supporting terms | Implementation decision |
| --- | --- | --- | --- |
| `/` / `index.html` | Local discovery: cricket academy in Greater Noida | cricket coaching, children, competitive players, programmes | Keep broad, local focus; remove unsupported proof points from metadata. |
| `/about` / `about.html` | Trust and academy approach | cricket training, programmes, admissions | Retain factual background only; reconcile statistics before copy expansion. |
| `/our-programs` | Compare coaching programmes | age group, beginner, junior, senior, one-to-one | Keep programme-selection focus and visible filters. |
| `/program-foundation-cricket` | Beginner and children’s cricket coaching | ages 6–10, fundamentals, hand-eye coordination | Keep age-focused intent; verify equipment and batch claims. |
| `/program-junior-development` | Junior cricket training | ages 11–14, hard-ball, skills development | Keep distinct from beginner and senior pages. |
| `/program-senior-performance` | Advanced cricket coaching | ages 15–19, match awareness, competitive players | Remove unverified selection/outcome language from metadata. |
| `/program-professional-coaching` | One-to-one cricket coaching | private coaching, individual sessions | Describe availability by enquiry; do not imply unavailable equipment or outcomes. |
| `/coach` and coach profiles | Faculty evaluation | coach role, coaching specialty | Preserve individual pages; credentials require owner evidence. |
| `/cricket-training` | Training environment | cricket training facilities, practice | Explain only confirmed environment/features. |
| `/net-practice` | Net-practice availability | cricket net practice Greater Noida | Keep facility/use intent separate from courses; verify equipment and booking rules. |
| `/hostel` | Residential enquiry | cricket academy with hostel | Confirm eligibility, facilities and inclusions before claims. |
| `/gym` | Cricket fitness enquiry | conditioning, fitness training | Avoid medical, injury-prevention and performance guarantees. |
| `/photo-gallery` | Visual proof | training photos, facilities | Keep captions/alt text descriptive and factual. |
| `/contact` | Admissions and trial enquiry | contact, fees, timings, trial availability | Use explicit, safe programme prefills and a working form route. |

Legacy aliases (`coach-detail`, `program-detail`, `program-cricket-hostel`, `program-gym-fitness`) remain excluded from the sitemap and canonicalise to their primary pages. They are not separate keyword targets.

## Priority implementation

1. **P0 — factual and conversion safety:** retain the Pages Function but return no success unless storage succeeds; make form prefills safe; remove unsupported promises from changed metadata.
2. **P0 — consistency:** maintain one `.com` canonical policy, sitemap-only canonical URLs and crawlable public pages.
3. **P1 — content trust:** obtain an owner-approved fact sheet before changing claims about coaching credentials, player counts, facilities, hostel, timings, trials, fees or outcomes.
4. **P1 — sharing/entity data:** add page-specific social metadata and expand structured data only after official social accounts, NAP and relevant entity details are confirmed.
5. **P2 — measurement and local authority:** connect Search Console/Keyword Planner, improve the real Google Business Profile, publish verified photos/updates and earn relevant local references.

## Current implementation scope

This pass makes only P0 source changes that are factual without external access: form correctness, rate limiting, clear enquiry language, safe local metadata, research documentation and static QA. It does not redesign pages, create location doorway pages, add unverified schema, alter URLs, or claim edits to external Google/Cloudflare accounts.

The content pass now covers the highest-visibility homepage, about, programme overview, facilities, hostel, gym, contact, senior/one-to-one programme and coach-directory copy. Individual coach biographies and detailed feature cards remain subject to `SEO-FACT-VERIFICATION.md`; they are not safe to rewrite from assumptions.

## Owner confirmations required before a broader copy pass

- Official domain and public social profiles.
- Exact address, postcode, phone/email and service area.
- Academy/coaches’ credentials and biographies.
- Verified programme ages, timings, fees, trial policy and admissions process.
- Ground, net, hostel and gym features; availability, supervision, meals and booking rules.
- Any player statistics, match exposure, affiliation, selection or result claims.

## Validation plan

- Parse sitemap/XML and JSON-LD; confirm exactly one title, canonical and H1 on each public page.
- Check local links and assets, including extensionless public routes.
- Test the function’s invalid, unconfigured-storage and stored-submission paths with non-personal test data.
- Test the real Pages preview after `CONTACTS_KV` is bound: form success/failure/spam path, desktop/mobile layout, query prefill, navigation, filters and console/network errors.
- Do not call the branch ready until that preview validation and fact confirmation are complete.
