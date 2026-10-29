# SEO release QA

## Passed locally

- All 21 sitemap URLs have one H1, a production canonical and a meta description.
- `sitemap.xml` uses the production `.com` canonical URLs.
- `robots.txt` allows crawling and declares the production sitemap.
- Contact Function tests passed for valid KV storage, invalid input and an absent binding.
- Middleware tests passed for the custom domain and both Cloudflare Pages host families.
- `git diff --check` passes apart from existing Markdown line-ending/trailing-space notices recorded in Git output.

## Must pass after approved deployment

- `youngstarcricketacademy.com` homepage and representative inner pages: 200, no `X-Robots-Tag` noindex value.
- `ysca.pages.dev`, `ysca-live.pages.dev` and an actual branch-preview hostname: 200 with `X-Robots-Tag: noindex, nofollow`.
- Production `robots.txt` and `sitemap.xml`: 200 and production-only URLs.
- Cloudflare `CONTACTS_KV` binding: real non-sensitive submission stores successfully.
- Desktop/mobile navigation, gallery, trial prefill and contact feedback: manual browser pass.

## Release blockers

1. Confirm Cloudflare Pages Functions and the production `CONTACTS_KV` binding in the `ysca-live` dashboard.
2. Deploy the branch and re-test the `ysca-live.pages.dev` noindex header; it is absent on the current live baseline.
3. Obtain owner confirmations in `SEO-OWNER-FACTS.md` before restoring credentials, achievements, facility specifications, fees or accommodation inclusions.
