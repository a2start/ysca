# SEO QA report

Date: 29 October 2026  
Branch: `seo-final-implementation`  
Recommendation: **BLOCKED — not ready to merge to production**

## Passed source checks

| Check | Result |
| --- | --- |
| Branch | Confirmed `seo-optimization`. |
| Public-page inventory | 25 HTML documents reviewed. |
| Metadata cardinality | Every public HTML document has exactly one title, H1 and canonical link. |
| Canonical/sitemap alignment | 21 intended canonical `.com` URLs in `sitemap.xml`; legacy aliases are excluded and canonicalise to their primary page. |
| Robots | Public crawl allowed; `/is-cms/`, `/admin/` and `/tmp/` disallowed; sitemap declared. |
| Local links and assets | Static `href`/`src` check found 0 missing local targets, treating extensionless public routes as their `.html` source files. |
| Structured data syntax | All JSON-LD blocks parse successfully. |
| Function syntax | `functions/api/contact.js` imports as an ES module. |
| Form function behaviour | Mock tests: invalid request = 400; valid request without `CONTACTS_KV` = 503; stored valid request = 200; sixth request from the same mocked IP/hour = 429. The function uses a hashed-IP, five-per-hour KV rate limit. |
| Diff hygiene | `git diff --check` passed. |

## Not verified / failed by environment

| Check | Status | Required next action |
| --- | --- | --- |
| Pages preview status, rendering, console/network | Unverified: the preview was not accessible through the available web inspection tool and browser automation was unavailable. | Open `https://ysca.pages.dev/` after deployment and test desktop/mobile manually. |
| End-to-end form | Blocked: no configured Cloudflare KV binding was available. | Bind a real Pages KV namespace as `CONTACTS_KV`; confirm storage/notification, retention and access controls; submit non-personal test data. |
| Live production HTTP/indexing | Unverified. | Validate canonical URLs, sitemap URLs, redirects and production robots after an approved deploy. |
| Staging index protection | Unverified. | Configure environment-aware preview protection/noindex at the Pages layer and prove production does not inherit it. |
| Rich Results Test | Unverified. | Run the home-page JSON-LD through Google’s Rich Results Test after confirming all entity values. |
| Performance/Core Web Vitals | Unverified. | Run PageSpeed Insights/Lighthouse against staging on mobile and desktop; address measured issues only. |

## Current source and live checks — 29 October 2026

| Check | Result | Status |
| --- | --- | --- |
| 21 sitemap pages | Every sitemap URL has one H1, a production canonical and a meta description in source. | Passed source check |
| Contact Function | Local mock tests: valid KV-backed POST returns 200 and stores one inquiry; invalid input returns 400; missing `CONTACTS_KV` returns 503. | Passed local check |
| Preview middleware | Local host-policy tests pass for `ysca.pages.dev`, `*.ysca.pages.dev`, `ysca-live.pages.dev`, `*.ysca-live.pages.dev`, and the production custom domain. | Passed local check |
| Production home | `https://youngstarcricketacademy.com/` returned HTTP 200 without `X-Robots-Tag` on the live baseline check. | Passed live baseline |
| Staging home | `https://ysca.pages.dev/` returned HTTP 200 with `X-Robots-Tag: noindex, nofollow`. | Passed live baseline |
| Live project default host | `https://ysca-live.pages.dev/` returned HTTP 200 **without** `X-Robots-Tag`. Source is corrected on this branch but it is not deployed. | Failed pending deployment |
| Production robots and sitemap | `robots.txt` and `sitemap.xml` returned HTTP 200; robots allows crawlers and declares the production sitemap. | Passed live baseline |

## Cloudflare configuration needed before release

1. In Cloudflare Pages project **ysca-live**, confirm the production branch is `main` and that Pages Functions are enabled for the deployed output.
2. Bind the intended KV namespace to the production environment as `CONTACTS_KV`. Bind the corresponding staging namespace in the `ysca` project if staging submissions are expected to work.
3. Confirm no dashboard Transform Rule, `_headers` deployment artifact or proxy rule adds `X-Robots-Tag` to `youngstarcricketacademy.com`.
4. After deploying this branch, verify `ysca-live.pages.dev` and a branch-preview hostname return `X-Robots-Tag: noindex, nofollow`, while the custom domain does not.

## Owner confirmations required

1. Official name, address/postcode, phone, email, social profiles and real service area.
2. Programme ages, timings, fees, trial availability and admissions process.
3. Coach credentials/history and academy affiliations.
4. Ground/net features, bowling-machine availability, hostel eligibility/inclusions/supervision and gym details.
5. All player statistics, outcomes, match exposure and selection claims.

## Technical notes

- The home page is the only page with social metadata and JSON-LD. Expand these only with verified page/entity facts. The current `sameAs` entries are generic social-platform homepages and should be replaced with official academy profiles or removed.
- `.htaccess` and `is-cms/` are Apache/PHP-oriented, while the report describes Cloudflare Pages static hosting. They do not validate the live Pages routing and should not be treated as deployment proof.
- Canonicals and sitemap entries consistently use the `.com` host. This follows Google’s recommendation to align canonical hints and sitemap URLs; redirects are the stronger signal for duplicate URLs when a verified hosting configuration permits them.
