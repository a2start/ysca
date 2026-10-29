# Master Prompt: Evidence-Based, Page-by-Page Content SEO for Young Star Cricket Academy

## Role and objective
Act as a senior local SEO strategist, keyword researcher, conversion-focused website content editor, and careful static-site developer. Work on the existing Young Star Cricket Academy website for **Noida and Greater Noida, Uttar Pradesh, India**.

Website preview: https://ysca.pages.dev/  
Primary domain intended for canonical URLs: https://youngstarcricketacademy.com/  
Working branch: `seo-optimization`  
Platform: static HTML/CSS/JavaScript hosted on Cloudflare Pages.

The goal is **not** to sprinkle location keywords into every page. The goal is to inspect every real page, understand what a parent/player needs from it, research actual search intent and relevant keyword language, and then write the shortest complete, clear, credible content that helps a visitor decide what to do next. Content must sound natural, specific to this academy, and written for people—not like SEO boilerplate or generic AI copy.

## Non-negotiable safety rules
1. Work only in the existing `seo-optimization` branch. Never commit to `main`/production, merge, change DNS, alter Cloudflare production settings, or deliberately deploy the production domain.
2. Before editing, inspect the repository root, current branch, latest commit, `git status`, deployment/build settings, all HTML pages, shared CSS/JS, `robots.txt`, sitemap, and any `functions/` or backend directories. Save the baseline commit hash and produce a page inventory. If the working tree contains user changes, preserve them; do not reset, clean, overwrite, or discard them.
3. Take a baseline preview of the current page behavior and record issues. Make small, reversible edits. Avoid broad find-and-replace operations.
4. **Do not redesign the website.** Preserve its existing visual design, DOM structure, classes, IDs, assets, responsive behavior, navigation, animations and working JavaScript. Do not refactor unrelated code or rename files/URLs for SEO convenience. Limit code changes to necessary SEO metadata/content, the broken form/backend integration, and verified related functionality.
5. Do not guess academy facts, statistics, coach qualifications, awards, fees, schedules, admission age, free-trial terms, facilities, hostel amenities, results, affiliations, phone numbers, email addresses or social profiles. Verify them from existing trustworthy first-party material or flag them in the report for the owner. Never publish guessed facts or leave visible `TODO` text in customer-facing pages.
6. Do not claim that a keyword has a particular monthly search volume, keyword difficulty or ranking unless an accessible research tool or documented source actually provides that data. If account access is unavailable, say so and label public-SERP-derived ideas as qualitative, not volume-verified.
7. Do not merge, publish, or claim completion until the acceptance criteria at the end have been checked. If a test cannot be run, state it as unverified rather than passed.

## Phase 1 — Establish the baseline before writing
- Confirm the actual deployed branch and preview URL. Check whether preview output matches the repository source.
- List every HTML page, all navigation destinations, all form actions, all `fetch()` calls, every script and stylesheet, all canonical/OG URLs, structured data, sitemap URLs and robots directives.
- Visit each page in a real browser if available. Record status code, title, meta description, canonical, H1, H2 outline, main visible copy, CTA behavior, internal links, image alt text, and forms. Check both desktop and mobile layouts.
- Verify whether `contact-submit.php` exists and whether a Cloudflare Pages Function or third-party backend actually handles submissions. Do not assume that a PHP action works on Cloudflare Pages.
- Record any existing page errors, console errors, missing assets, broken links, blank states or unexpected redirects. Compare the live preview with the source so the report does not confuse a source intention with a working deployed feature.
- Save a baseline report under `seo-research/baseline-audit.md` (or a similar clearly named folder that does not conflict with the project). Do not place audit files in the public web root if doing so would expose internal notes.

## Phase 2 — Do real keyword and competitor research
Research the target market with **Greater Noida as the primary service area** and **Noida as a secondary area only if the academy genuinely serves it**. Determine the academy's exact confirmed location/service radius first. Use locality terms only if accurate and useful; possible terms to investigate include Greater Noida, Noida, Noida Extension/Greater Noida West, Delta, Alpha, Beta, Gamma, Knowledge Park and nearby sectors—but do not add these mechanically or imply a presence at a location that is not served.

### Seed topics to test, not blindly force into copy
- cricket academy in Greater Noida
- cricket coaching in Greater Noida
- cricket academy in Noida
- cricket coaching in Noida
- cricket classes for kids in Greater Noida
- junior cricket coaching
- beginner cricket coaching
- advanced cricket training
- cricket training ground Greater Noida
- cricket net practice Greater Noida
- cricket academy hostel Greater Noida
- cricket academy fees Greater Noida
- cricket coaching timings
- cricket academy trial session
- one-to-one cricket coaching

These are starting hypotheses, not a final keyword list. Discover additional terms from real evidence.

### Research sources and required method
1. **Google Search Console**, if access is available: export actual queries, pages, impressions, clicks, CTR, position, and date range. Separate existing traffic data from keyword ideas.
2. **Google Keyword Planner**, if accessible: use “Discover new keywords” with relevant seed terms and the official website; set geography to the relevant local area/India as appropriate, and record date/range/settings. Export keyword ideas and the displayed volume ranges/competition. If billing/account access prevents use, document the blocker—never pretend to have used it.
3. **Google Trends**, autocomplete, People Also Ask, related searches and live search results: use them to discover phrasing and intent; do not represent them as exact monthly volumes.
4. Inspect at least 5 relevant current local competitors/results, including their actual landing pages. Potential starting examples to verify for current relevance include Sahaj Chadha Cricket Academy, Madan Lal Cricket Academy's Greater Noida West location and other academies ranking for the target searches. Verify locations and page contents yourself. Do not copy competitors' wording or repeat directory claims as facts.
5. Compare what searchers need to know: location/commute, suitable age/skill level, coaching approach, coach background, batch timing, fees, trial/admission, facilities, hostel, and how to contact the academy. Record what competitors answer well and what credible, academy-specific information the current website can answer better.
6. Create `seo-research/keyword-research.csv` with columns: `keyword`, `cluster`, `intent`, `target_location`, `candidate_page`, `source/tool`, `volume_or_range`, `volume_period`, `competition_or_difficulty`, `SERP_observation`, `confidence`, `notes`. Use `Not available` for fields not provided by the tool. Include source URLs and research date in a companion notes file.
7. Create a keyword-to-URL map and avoid cannibalization. Each page should have one clear primary intent; related terms support that intent. Do not assign the exact same primary query to every page.

### Keyword selection rules
- Prioritize local relevance, search intent, business fit, evidence and conversion value—not just the biggest estimated volume.
- Use the exact phrase where it fits naturally in the title, H1, intro or a relevant section. Synonyms and semantic terms belong only where they help explain the service.
- Do not target every conceivable keyword on every page. Do not use keyword-density targets, repeated city lists, awkward variants or hidden text.
- Do not create thin city/sector doorway pages. Only propose a separate location page when the academy genuinely serves that area and can provide unique, useful location-specific information.
- Separate informational, local discovery, comparison, admission, facility and contact intent. Do not confuse a program page with a general blog article.

## Phase 3 — Audit and rewrite the actual content page by page
Read the complete current source and visible copy of **each page** before suggesting edits. Do not generate generic replacement blocks before understanding what the page already says and what is actually offered. For every page, document:
- current purpose and audience;
- current content strengths, gaps, repetition and unsupported claims;
- primary keyword and intent;
- supporting/semantic terms, with research evidence;
- proposed title and meta description;
- final H1 and concise section outline;
- exact edited copy or a clear before/after diff;
- contextual internal links and useful anchor text;
- CTA and the next step the visitor should take;
- facts that require owner confirmation;
- test results.

### Writing style: must follow
- Write in clear, natural English suitable for Indian parents, young cricketers and adult players. Be confident, warm and direct, not corporate or salesy.
- Keep copy as short as the page's job allows. There is **no required word count**. Do not add paragraphs solely to fit keywords or make a page look “SEO rich.”
- Replace generic phrases such as “unlock your potential,” “embark on a journey,” “world-class facilities,” “nurturing future champions,” “comprehensive holistic approach,” “cutting-edge training” and other empty claims unless a specific, verifiable detail supports the wording.
- Avoid repetitive openings, formulaic section patterns on every page, fake urgency, excessive exclamation marks, overuse of em dashes, vague superlatives, and repetitive calls to action.
- Prefer concrete details: what a session includes, what level it suits, how practice is structured, which facility is available, how trial/admission works and what parents should ask. Include only details verified by the academy.
- Keep the page's original personality and useful content. Do not rewrite good copy just to change it.
- Read each revised page aloud mentally: it should sound like a knowledgeable academy representative explaining the service to a parent/player. Remove any sentence that could fit any academy in any city.
- Use FAQs only when they answer real questions that are not already clearly answered. Do not add FAQ sections just for schema or keyword coverage.
- Do not fabricate testimonials, student success stories, rankings, selection outcomes, pass rates, coach bios, or “as seen in” claims. Do not claim content is literally human-authored; make it useful, specific, edited and credible.

### Page-specific content requirements
Use the actual filenames and URL paths found in the repository; do not assume a path exists without checking it.

1. **Homepage (`index.html`)**
   - Target broad local discovery intent, with Greater Noida primary.
   - Immediately explain what the academy offers, who it is for, where it is actually located, and how to enquire/book a trial.
   - Prioritize the strongest verified differentiators; do not repeat every keyword or list every facility in the hero.
   - Clarify links to programs, coaches, facilities, gallery and contact. Check homepage statistics against the About page and schema.

2. **About page**
   - Explain the academy's real background, coaching philosophy and who it serves. Use verified facts and meaningful details, not generic mission statements.
   - Reconcile years of experience, number of students, nets/facilities and any credentials with the homepage and all other pages.

3. **Programs overview**
   - Help a parent/player select the right program. Summarize real differences between programs and link to their details.
   - Check the filter logic and remove/fix any visible default “No programs match” state when programs should be visible. Do not break the filter or alter its design unnecessarily.

4. **Foundation/grassroots program**
   - Explain beginner suitability, foundational skills, typical session approach and how to start, using verified information. Avoid promising professional outcomes.

5. **Junior development program**
   - Describe how this level differs from beginner training, its verified age range, skills focus and progression. Reconcile age labels with navigation, other program pages and structured data.

6. **Senior performance program**
   - Explain the actual requirements, skill level, practice focus and opportunities available. Do not imply selection, elite results or professional pathways unless documented.

7. **Professional/performance coaching program**
   - Verify what “professional” means at this academy. If it overpromises or misrepresents the offer, recommend more accurate wording rather than optimizing a misleading claim.

8. **Coaches directory and every coach profile**
   - Use only verifiable name, role, playing/coaching history, certification, specialties and achievements. Give each profile distinct useful detail. Never invent credentials or keyword-heavy bios.

9. **Cricket training page**
   - Focus on the actual training environment and what a visitor can expect. Keep this distinct from the coaching-program pages and net-practice page.

10. **Net-practice page**
    - Explain available net facilities, types of practice, booking/use rules and suitability only where verified. Do not claim bowling machines, turf wickets or net counts without evidence.

11. **Hostel page**
    - Verify whether accommodation is actually available, eligibility, supervision, meals, schedules, safety, contact procedure and any fees. Do not publish unsupported claims about meals, security, distance or residential life.

12. **Gym page**
    - State only the confirmed equipment/facilities and how gym/fitness sessions relate to cricket training. Do not make medical, injury-prevention or guaranteed-performance claims.

13. **Photo gallery**
    - Ensure image captions/categories match the actual photographs. Use descriptive alt text for informative images; use empty alt for decorative images. Do not stuff local keywords into every alt attribute. Fix missing image links and non-working lightbox/category interactions.

14. **Contact/admissions page**
    - Make the location, official phone/WhatsApp, email, office hours (if confirmed), trial process and enquiry purpose easy to find.
    - Ensure all trial buttons populate the intended form/program using allowlisted URL parameters. The form must actually submit to a deployed backend and show real success/failure states.

15. **Any additional pages found in the repository**
    - Include them in the inventory and audit. Do not skip pages because they were not listed here.

## Phase 4 — On-page and technical SEO checks
For every indexable HTML page:
- Provide a unique, meaningful `<title>` and meta description. Write for the specific intent; do not rely on mechanical character limits or repeated templates.
- Use one descriptive primary H1 and logical H2/H3 hierarchy. The content should work for visitors, not only crawlers.
- Set exactly the intended canonical URL on the chosen `.com` domain, using one consistent slash/path policy. Confirm page paths exist before writing their canonical.
- Correct Open Graph/Twitter URLs and images; remove every localhost, staging, preview or obsolete-domain reference from production-facing metadata and schema.
- Audit internal links, buttons, breadcrumb behavior if present, image dimensions/alt, anchor names, mobile readability and accessible labels.
- Validate `robots.txt`, sitemap XML syntax and live HTTP responses. The sitemap should list canonical, indexable, successful `.com` URLs—not the legacy `.in/young/` paths, staging URLs, redirects, 404s, or noindex pages. Do not add non-existent URLs.
- Validate structured data against the actual visible content. Use a suitable, supported business/location type only if the exact real-world location and details are confirmed. Keep NAP data consistent. Do not invent review/rating values or expect schema alone to guarantee a rich result.
- Check 404 behavior, redirect chains, duplicate URL variants, broken links and unintended `noindex` directives. Do not redirect or delete pages without a verified reason and a mapping plan.
- Test mobile and desktop performance/accessibility. Do not remove images or scripts blindly. Record real Lighthouse/PageSpeed measurements if the tool is available; otherwise identify testing as outstanding.
- Keep local relevance natural: use Greater Noida in the pages where it answers a real location-intent query. Mention Noida/Noida Extension or specific sectors only where factually appropriate. Do not create repetitive city lists in footers.

## Phase 5 — Fix and prove the static-site contact form
The current source has been observed using `contact-submit.php`. Inspect the branch and deployed runtime to prove whether the endpoint exists and works. A plain static HTML page can use a working form, but HTML alone does not process/store/send the submission: it needs a real backend or hosted form provider.

Preferred implementation order:
1. Reuse an existing verified Cloudflare Pages Function and existing D1/database configuration if they are present and correctly wired in this repository and Cloudflare project.
2. Otherwise, implement a Cloudflare Pages Function endpoint if compatible with the current Git-integrated Pages setup. For a repository-root Pages project, inspect whether a `functions/api/contact.js`-style route is appropriate before creating it. Configure only real bindings that exist; do not invent database IDs or credentials.
3. If backend work is out of scope, integrate a reputable hosted form service with an explicitly configured endpoint and document any plan limits/costs. Do not pretend a `mailto:` link is an equivalent reliable submission system.

Required form safeguards:
- Server-side validation and length limits; validate email and phone sensibly; accept only expected fields; handle invalid data with a useful response.
- Store submissions securely where required and/or send notifications through a verified API. Put tokens/API keys in Cloudflare secrets or the service's secret manager—never commit secrets in HTML, JavaScript or Git.
- Basic spam protection/rate limiting or honeypot; safe error handling; no success message unless the server accepted the submission; accessible labels and status messages; privacy notice and minimum necessary data collection.
- Preserve program/trial parameters safely. Only accept recognized program values; never inject arbitrary query-string content into the page.
- Test with a real test submission on the preview: success response, stored row/notification, invalid fields, failure response, spam check, mobile usability, no secrets in client code, and no console/network errors. Do not send real test personal data to an unverified destination.
- Do not remove an existing working backend in order to make the HTML look simpler. Document any Cloudflare dashboard setup that is still required rather than claiming it was completed from source code alone.

## Phase 6 — Validate changes without breaking the website
After each small group of edits:
- Run the repository's existing validation/build scripts if any. Do not add a build tool solely for convenience without a clear reason.
- Check every internal link and asset path; inspect console/network errors; verify forms, query-parameter prefill, program filters, navigation dropdowns, gallery functions, phone and WhatsApp links.
- Revisit every modified page at desktop and mobile sizes. Compare with the baseline; visual layout should remain unchanged except for text wrapping naturally.
- Check page titles, meta descriptions, H1, canonical, schema, sitemap membership and robots accessibility with scripts or validators where available.
- Test the actual deployed preview, not only local files. Do not use the production domain to test experimental endpoints.
- Keep a rollback path. Do not proceed to production if the form, navigation, assets, canonical URLs or critical interactions fail.

## Required deliverables
Create or update audit artifacts outside the public site root:
1. `seo-research/keyword-research.csv` — source-backed keyword research with measured data only where available.
2. `seo-research/keyword-map.md` — one primary intent per URL, secondary/semantic terms, evidence, and cannibalization notes.
3. `seo-research/page-by-page-content-audit.md` — every page, current issues, facts requiring confirmation, and rationale for the chosen content.
4. `seo-research/content-change-log.md` — before/after title, description, H1, rewritten copy, internal links and keyword intent for each modified page.
5. `seo-research/technical-qa.md` — canonical, sitemap, robots, structured data, broken links, performance/accessibility results, form tests, preview URL and any unverified item.
6. Final concise release recommendation: PASS / FAIL / BLOCKED, with outstanding risks and exact next actions.

## Release acceptance criteria — all must pass or be explicitly reported as blocked
- Every page in the repository has been inventoried and reviewed.
- Keyword mapping is evidence-based; no invented search volumes, scores or source access.
- Content is concise, unique, natural, accurate, specific to the page and genuinely helpful. It does not repeat a keyword formula or pad sections for word count.
- Unsupported academy claims have been corrected or left out pending owner confirmation.
- No keyword cannibalization or thin doorway pages have been introduced.
- Canonicals, sitemap, robots, OG URLs and structured data agree with the intended `.com` URL strategy and live page content.
- The enquiry form demonstrably works in the deployed preview; trial buttons prefill the correct information; server errors and invalid input are handled correctly.
- Navigation, program filters, gallery, links, mobile layout and all existing functionality still work.
- No production domain/settings were changed and no merge/deployment to production occurred.
- Final report distinguishes verified results from assumptions, unavailable tools and remaining work.

## Official guidance to follow
- Google people-first helpful content: https://developers.google.com/search/docs/fundamentals/creating-helpful-content
- Google Keyword Planner: https://support.google.com/google-ads/answer/7337243
- Google LocalBusiness structured data: https://developers.google.com/search/docs/appearance/structured-data/local-business
- Cloudflare Pages Functions: https://developers.cloudflare.com/pages/functions/
- Cloudflare HTML forms tutorial: https://developers.cloudflare.com/pages/tutorials/forms/
- Cloudflare Pages Static Forms plugin: https://developers.cloudflare.com/pages/functions/plugins/static-forms/

Start with the read-only inventory and research. Then implement carefully in `seo-optimization`, verify every change in the deployed preview, and never label a task complete just because the source code looks correct.
