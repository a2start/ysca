# Young Star Cricket Academy SEO Implementation Report

## Executive summary

The current staging site at `https://ysca.pages.dev/` already has a useful SEO foundation: dedicated program pages, facility pages, coach profiles, a locally targeted homepage H1, internal navigation, and conversion CTAs. The strongest next opportunity is not generic keyword insertion; it is **page-level search-intent alignment, stronger local relevance, better factual trust, differentiated human-written content, and technical consistency**. The homepage currently targets “Cricket Academy in Greater Noida,” while supporting pages cover kids coaching, junior/senior development, one-to-one coaching, net practice, cricket training, hostel, fitness and coaching faculty. citeturn502912view0turn761924view0turn761924view1turn761924view2turn795245view0turn795245view1

Greater Noida should remain the **primary geographic target** because the academy’s staging contact page identifies its ground as being in Delta II, Greater Noida. Noida should be used as a legitimate nearby service-area term rather than represented as a physical academy location unless a real Noida branch exists. Current Noida competitors include Delhi Capitals Cricket Academy, Ramagya Sports Academy and Sahaj Chadha Cricket Academy, while Greater Noida results include Push Sports, YSCE and other established academies. citeturn297338view12turn686400search0turn686400search1turn686400search2turn686400search4turn686400search7

## Research findings

The most important weakness is **trust and factual consistency**. The homepage currently states 20+ years of coaching experience and 5,000+ trained players, while the About page states 15+ years of coaching and 500+ trained players. The homepage also references 10+ turf nets, while the About page references 12+ turf and astro nets. These inconsistencies should be resolved from an approved academy fact sheet before production deployment. citeturn502912view0turn297338view0

Several pages also contain aggressive claims that should be verified before publication, including direct nominations for state/BCCI trials, selector exposure, Ranji/IPL coach access, specific bowling-machine speeds, professional-standard infrastructure, coach certifications and association affiliations. Google’s current people-first content guidance emphasizes reliable, original, trustworthy information and cautions against content created primarily to manipulate rankings. citeturn297338view6turn297338view7turn795245view0turn395410view0turn952605search4

The SERP research also shows that competing academies commonly surface practical information such as age eligibility, facilities, timings, location, pricing or fee guidance, coaching credentials, admissions and FAQs. This gives YSCA an opportunity to compete through **clarity and specificity rather than promotional superlatives**. citeturn686400search0turn686400search2turn686400search4turn686400search6turn686400search7

## Keyword strategy

The implementation file prioritizes `cricket academy in Greater Noida` and `cricket coaching in Greater Noida` for the homepage, then assigns narrower intent clusters to individual pages: kids/beginner coaching to Foundation, junior coaching to Junior Development, advanced coaching to Senior Performance, private coaching to the one-to-one page, `cricket net practice Greater Noida` to the net-practice page, residential terms to the hostel page, and cricket fitness terms to the gym page.

Google’s Search Essentials recommends using words people actually search for in prominent locations such as page titles, main headings, link text and descriptive alt text, while keeping pages useful for people rather than stuffing keywords. citeturn952605search0

No private Google Ads Keyword Planner or Search Console account was available, so the report deliberately does **not invent monthly search volumes, CPCs, impressions, CTRs or ranking positions**. Google confirms that Keyword Planner can provide keyword ideas and monthly-search estimates once account access is available. citeturn952605search6turn952605search8

## Technical implementation priorities

The implementation plan requires each production page to use a consistent `.com` canonical, with the sitemap containing only canonical indexable production URLs. Google documents canonicals as a signal used when choosing representative URLs and recommends including canonical URLs in sitemaps. citeturn952605search2turn952605search3

The plan also calls for one coherent local-business entity in structured data with verified name, address, phone, location, opening hours and official profiles only. Google’s LocalBusiness guidance specifically recommends accurate address and business information and validation through the Rich Results Test before release. citeturn952605search1

The staging environment should not become an indexed duplicate of production. The playbook therefore requires staging protection or an appropriate `noindex` response, followed by verification that production does **not** inherit that directive.

The `/api/contact` form is treated as a release-blocking dependency. The implementation file includes success, validation, bot, injection, rate-limit, network-failure, query-prefill and Cloudflare backend test cases so the agent verifies the entire browser → function → storage/email → response path rather than assuming the form works.

## Content direction

The content briefs replace repetitive language such as “world-class,” “elite,” “champion,” and similar generic promotional phrasing with concise explanations of what trainees and parents actually need to know: age eligibility, what happens during sessions, hard-ball versus beginner training, match practice, coaching focus, equipment, trial process, hostel arrangements, net availability and location.

Coach profiles are treated as especially important trust pages. The staging site currently contains seven individual coach profiles with detailed playing history, certifications and coaching specialties; the implementation file requires each credential and achievement to be verified and removes the use of “Verified Credential” unless documentary evidence actually exists. citeturn795245view3turn395410view0turn395410view1turn395410view2turn395410view3turn395410view4turn395410view5turn395410view6

Google explicitly says there is no preferred word count for ranking, so the content plan does not require artificially long pages. citeturn952605search4

## Implementation-ready file

The requested Markdown file contains the complete site inventory, approximate current content lengths, current page titles/H1s, page issues, keyword research framework, priority keyword clusters, semantic terms, question keywords, intent classification, keyword-to-page map, exact placement instructions, human-first content briefs and sample copy for every page type, technical SEO checklist, schema recommendations, `/api/contact` test cases, rollout sequence, Mermaid diagrams, QA matrix, rollback plan, monitoring plan and final merge checklist.

[Download the complete YSCA SEO Implementation Playbook](sandbox:/mnt/data/YSCA_SEO_Implementation_Playbook_2026-10-29.md)

## Release position

The recommended sequence is to first approve a single factual source of truth for the academy, then export exact metadata and word counts from the `seo-optimization` branch, obtain real Keyword Planner/Search Console data where access exists, refine the keyword map, rewrite the priority pages, correct technical signals and structured data, verify `/api/contact`, perform mobile/accessibility/performance QA on `ysca.pages.dev`, and only then merge to production.

The staging content should therefore be treated as **not yet production-ready** until factual inconsistencies and unsupported claims are resolved and the form backend passes an end-to-end submission test.