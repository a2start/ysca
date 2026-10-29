# Young Star Cricket Academy SEO Merge-Readiness Research

## Executive summary

The deep-research implementation guide is complete and is based on a live review of both **`youngstarcricketacademy.com`** and **`ysca.pages.dev`**, supplemented with current Google Search Central, Google Business Profile, Cloudflare Pages/KV, and GitHub Pages documentation. Google’s current guidance continues to emphasize helpful, reliable, people-first content, descriptive page titles, crawlable internal links, accurate structured data, and good page experience rather than keyword-density targets. citeturn960954search0turn960954search1turn811970search5

The most important issue is **production/preview drift**. Several pages now contain safer wording on production while the Cloudflare preview still exposes stronger claims about credentials, selection pathways, facilities, hostel services, equipment and performance outcomes. For example, the production coaches page uses substantially more cautious language than the preview, while the preview still refers to former First-Class/Ranji and certification-related credentials. Similar differences exist on Senior Performance, Professional Coaching, Hostel and Net Practice. citeturn585855view0turn123936view1turn457018view0turn123936view3turn457018view2turn123936view5

The production homepage still contains numerous claims that should be owner-verified before merge, including experience counts, player counts, coaching credentials, coach ratios, net counts, trials, pathways and facility statements. The report treats these as factual-approval blockers rather than SEO opportunities to amplify. citeturn846235view0

## Deliverable

The full implementation guide is **7,959 words** and contains the requested crawl inventory, all-page audit, keyword mapping, schema fixes, technical SEO checks, contact backend review, Cloudflare/GitHub deployment instructions, local SEO plan, human-written copy examples, roadmap, Mermaid diagrams, QA criteria and post-deployment monitoring procedure.

[Download `deep-research-report.md`](sandbox:/mnt/data/deep-research-report.md)

## Key technical findings

The research identified **21 intended public HTML URLs**, matching the previous repository audit of 21 sitemap URLs. Titles and H1s are generally well differentiated, with strong local alignment on pages such as the homepage, Net Practice, Hostel, Gym and Contact. Exact live meta-description and canonical values could not be reliably exposed by the research fetcher, so the report deliberately marks those fields for final source/DevTools verification rather than inventing values.

Core Web Vitals were also **not fabricated**. No trustworthy field-performance or Lighthouse run was available during the research, so the guide instead defines Google’s current acceptance thresholds—LCP at or below 2.5 seconds, INP below 200 ms and CLS below 0.1—and specifies the pages that should receive final mobile and desktop PageSpeed testing. citeturn960954search6

Google recommends sitemaps as a discovery mechanism rather than a guarantee of indexing, and canonicalization should consistently identify the preferred production URL. The report therefore requires the final production `sitemap.xml`, `robots.txt`, self-referencing canonicals and staging `noindex` state to be verified from the deployed build before merge. citeturn960954search3turn960954search4turn960954search5

## Contact form and Cloudflare findings

The Cloudflare preview contact workflow is supported by the tests and screenshots supplied during this work: the form displayed a successful confirmation, `CONTACTS_KV` was bound to `ysca-contacts`, and KV contained both an `inquiry:` record and the `contact-rate:` record. The earlier automated tests also exercised `400`, `503`, `200` and `429` paths.

Production is treated separately because an earlier production test displayed the configuration-error state. The implementation guide therefore requires a **fresh production submission after the production KV binding and redeployment**, rather than assuming the working preview proves production functionality.

The guide also flags a technical limitation in using Workers KV as a strict rate limiter: Cloudflare documents KV as eventually consistent, so a read-modify-write counter is useful as lightweight abuse protection but should not be treated as an atomic security control. For stricter enforcement, Cloudflare-native rate limiting or Durable Objects are more appropriate. citeturn524452search6turn524452search8

Exact implementation examples are included for 90-day KV retention, Resend notification delivery, and Cloudflare’s own email-sending option. Cloudflare documents Resend integration for Workers and provides native email-sending APIs as another option. citeturn650314search0turn650314search4

## Local and content SEO direction

The report maps each major page to a distinct search intent rather than duplicating “cricket academy Greater Noida” everywhere. Greater Noida is treated as the primary market; Noida and Noida Extension/Greater Noida West are secondary contextual locations and should only appear where the academy genuinely serves those users.

That approach is consistent with Google’s explanation that local results are principally influenced by **relevance, distance and prominence**. Accurate business information, genuine reviews and real-world prominence signals are therefore more valuable than generating thin city pages. citeturn960954search7

The content section contains replacement copy for the homepage hero, programme overview, Foundation, Junior, Senior, one-to-one coaching, Cricket Training, Net Practice, Hostel, Gym, coaches and Contact page. The samples intentionally avoid unverified certification, selection, equipment and performance claims. The guide also includes unique meta-description patterns for the principal page types.

For reviews, the recommendation is to request genuine customer feedback without incentives or selective manipulation, consistent with Google Business Profile review policies. citeturn960954search8

## Cloudflare deployment architecture

Cloudflare Pages distinguishes production and preview deployments by branch, and the project’s base `*.pages.dev` hostname follows its production environment. citeturn524452search2turn524452search3turn524452search5

Because your desired public arrangement is:

- `https://ysca.pages.dev/` → staging/SEO work
- `https://youngstarcricketacademy.com/` → production

while those environments must serve different branches, the guide recommends **two Cloudflare Pages projects connected to the same GitHub repository**. This keeps `seo-optimization` behind the staging project and `main` behind the production project, with separate KV namespaces recommended so test enquiries never mix with genuine production leads.

The file contains exact dashboard procedures for KV binding, Pages redeployment, changing production branch, attaching the custom domain and finally unpublishing GitHub Pages. GitHub’s official process allows the Pages deployment to be unpublished without deleting the underlying repository or source code. citeturn116260search0

## Merge verdict

**Merge readiness: BLOCKED.**

The implementation guide sets the remaining P0 criteria as: reconcile production/preview drift; approve or remove all high-risk factual claims; verify production KV with a real submission; validate live robots, sitemap, canonicals and staging index protection; complete final structured-data validation; run mobile/desktop functional testing and PageSpeed checks; and obtain explicit owner approval of the final production content.

Once those conditions pass, the report provides the post-deployment Search Console workflow, including sitemap submission, representative URL Inspection, Core Web Vitals monitoring and 28-day performance comparisons. Google recommends sitemap submission and URL Inspection as mechanisms to help Google discover and reprocess changed pages, while making clear that crawling and indexing are not guaranteed or immediate. citeturn116260search2turn116260search7