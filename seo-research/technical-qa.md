# Technical QA and release recommendation

Date: 29 October 2026  
Branch: `seo-optimization`  
Baseline commit: `0fb94dc`

## Source checks

| Check | Result |
| --- | --- |
| Public page inventory | 25 HTML documents reviewed; 21 intended canonical URLs are in `sitemap.xml`. |
| Titles, descriptions, canonicals and H1s | Each public HTML document has one title, meta description, canonical and H1. Four legacy template aliases canonicalise to their intended primary URL and are excluded from the sitemap. |
| Robots | `robots.txt` allows public crawling, blocks CMS/admin/tmp paths and declares the canonical `.com` sitemap. |
| Schema | Home has `SportsActivityLocation` and `SportsClub` JSON-LD. Other pages have no structured data. The home `sameAs` values are generic platform URLs and should be replaced with verified academy profiles or removed. |
| Open Graph/Twitter | Present on the home page only. This is not a crawl blocker, but page-specific sharing metadata remains outstanding. |
| Internal links/assets | Static source validation is required after every edit; see final command results below. |
| Form route | `contact.html` submits to `/api/contact`; `functions/api/contact.js` and the route wrapper exist. |

## Contact-form implementation status

The function validates only expected fields, has maximum lengths, validates email/phone, includes a honeypot and returns no-store JSON. It only confirms success after writing to a Cloudflare KV binding named `CONTACTS_KV`; an absent or failing binding returns a clear 503 error instead of a false success.

Required Cloudflare setup, not possible from this repository: create/bind the actual KV namespace as `CONTACTS_KV` in the Pages project, then test a non-personal-data preview enquiry plus invalid, spam and storage-failure cases. KV retention/access policy and an owner notification workflow also need approval. No secrets are present in source.

## Preview and browser checks

`https://ysca.pages.dev/` was not accessible through the available web inspection tool, and the browser automation host was unavailable/minimised. Consequently live status codes, preview form submission, desktop/mobile rendering, console/network errors, Lighthouse/PageSpeed and Cloudflare binding verification are **unverified**. No production domain, setting or deployment was changed.

## Local validation results

- Parsed `sitemap.xml`: **21 URLs**.
- Reviewed public-page inventory: **25 HTML documents**.
- Checked every local `href` and `src`, treating extensionless internal links as their corresponding `.html` files: **0 missing local targets**.
- Checked each public HTML file for exactly one title, H1 and canonical: **0 source violations**.
- Parsed all JSON-LD blocks: **0 parse errors**.
- Parsed the Pages Function as an ES module: **syntax OK**.
- Function tests with mocked requests: invalid data returns **400**; a valid request without `CONTACTS_KV` returns **503**; a valid request with a working mock binding returns **200** after storage.
- Ran `git diff --check`: **no whitespace errors**.

## Source risks requiring owner confirmation

- The repository is a static Cloudflare Pages project, while `is-cms/` and `.htaccess` assume PHP/Apache. The PHP CMS cannot run on Pages without separate hosting.
- `.htaccess` rewrites to `.php` files although the public source is `.html`; it is inactive on Pages but would need a verified routing plan on Apache.
- Claims about credentials, counts, player outcomes, net/bowling-machine features, free trials, timings, hostel meals/supervision/security, gym benefits, official social profiles and response times are not sufficiently verified for additional SEO use.

## Release recommendation

**BLOCKED.** Source-level form handling and safer enquiry messaging are implemented, but release requires a real `CONTACTS_KV` binding and preview testing. Before publication, obtain owner confirmation for factual content and reconcile or remove inconsistent claims; then test the preview at desktop and mobile widths, submit a safe test enquiry, and validate the intended `.com` responses, redirects and sitemap URLs.
