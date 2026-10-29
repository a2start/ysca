# Young Star Cricket Academy — Deep SEO Audit & Master Implementation Prompt

**Audit date:** 29 October 2026  
**Primary website requested:** https://youngstarcricketacademy.com/  
**Target market:** Greater Noida first; Noida and Greater Noida West/Noida Extension where genuinely served  
**Mode used:** Read-only inspection. No repository files, DNS, redirects, CMS settings, analytics, or live pages were changed.

---

## 1. Executive summary

The site has a useful foundation for local SEO: dedicated age-based programs, training and net-practice pages, a coaching team, residential hostel and fitness pages, a physical location in Delta II, Greater Noida, and a contact/trial flow. The biggest near-term opportunity is not producing dozens of new pages. It is resolving technical URL signals and business-fact inconsistencies first, then aligning each existing page to one search intent and making the local contact/trial journey trustworthy.

### Highest-priority findings

| Priority | Finding | Why it matters | Safe next action |
|---|---|---|---|
| **P0 — Critical** | The public repository's `index.html` sets the canonical URL to `http://localhost/young/`. Open Graph URL/image and the LocalBusiness-style JSON-LD `@id`, `url`, `logo` and `image` also use localhost. | If this source is what the production page serves, search engines/social crawlers are being told about a development URL rather than the live `.com` page. | Verify the production HTML first, then use absolute HTTPS `youngstarcricketacademy.com` URLs consistently. Test every page after the change. |
| **P0 — Critical** | Repository `robots.txt` points its sitemap directive to `https://youngstarcricketacademy.in/young/sitemap.xml`; the repository sitemap lists `.in/young/` paths, not the requested `.com` root URLs. | Sitemap discovery and canonical signals conflict with the target domain. | Select one canonical domain, regenerate the sitemap with the current, indexable `.com` URLs, update `robots.txt`, and inspect the deployed files directly. |
| **P0 — Critical** | Search results and the source sitemap still expose `youngstarcricketacademy.in` / `/young/`, while the requested `.com` domain serves the current site. `contact?action=trial` is also a URL variant of the contact page. | Duplicate domains and parameter URLs can split crawling, canonicalization and reporting. | Confirm `.com` is the final primary domain. If authorized and intended, map old `.in` URLs one-to-one to their matching `.com` pages; do not blanket-redirect everything to the home page. Canonicalize the trial query variant to `/contact`. |
| **P1 — High** | Business contact details conflict across live page copy and repository markup. The contact page lists `+91 99999 99000` and `+91 99999 99001`, while other CTAs/source markup use `+91 99105 43666`; JSON-LD lists `+91-9999999000`. The visible email is `youngstarcricketacademy123@gmail.com`, while older indexed material shows other contact details. | Inconsistent NAP (name, address, phone), email and WhatsApp information reduces user confidence and weakens local entity consistency. | Confirm the official phone, WhatsApp number, email, postal address, map pin and hours with the owner/Google Business Profile. Then use the same approved facts across the site and structured data. |
| **P1 — High** | Academy statistics vary across pages/source: Home says **20+ years**, **5,000+ players** and **10+ nets**; About says **15+ years**, **500+ cricketers**, **12+ nets/pitches** and **8+ coaches**. The site also uses different descriptions of match exposure. | Contradictory numbers and credential claims damage trust; unsupported claims are unnecessary for SEO. | Keep only figures the academy can document, with one approved value and definition per metric. Remove unverifiable claims rather than guessing. |
| **P1 — High** | About and program-hub metadata are generic in the repository. `our-programs.html` has title `Young Star Cricket Academy` and description `Young Star Cricket Academy`; About has generic metadata and no canonical tag in the inspected source. Contact has a more descriptive title/description but no canonical tag in the inspected source. | Search snippets have less page-specific information and canonical behavior is not explicitly controlled on those templates. | Give every indexable page one unique title, meta description and self-referencing canonical. Verify the rendered production HTML, not only the source file. |
| **P1 — High** | Navigation labels/targets appear mismatched in the crawled page: the top-level “Facilities” link resolves to the hostel page, and the “All Academy Facilities” link resolves to `/our-programs`. | Poor navigation makes facility content harder for users and crawlers to understand. | Correct the link targets. Add a real, useful Facilities hub only if it can provide a distinct summary of grounds, nets, hostel and gym; otherwise make the menu parent a proper non-link dropdown. |
| **P1 — High** | Gallery page shows a Gym category with **0 photos** and the text “Traninner facilities is available.” | An obvious empty state and typo undermine quality and conversion. | Add real, authorized facility photos with descriptive captions or hide the empty category; do not create/index empty album pages. |
| **P2 — Medium** | Home and program pages have rich claims and technical-sounding language about facilities, affiliations, trials and selection pathways. These details need confirmation and can sound overpromotional if not evidenced. | Accurate first-hand information beats inflated marketing copy; Google advises helpful, people-first content and warns against scaled or doorway content. | Add original, verifiable evidence: real coach biographies, credentials, actual training photos, current schedules/fees where approved, and clear admissions steps. |
| **P2 — Medium** | The program filter defaults to “Grassroots” and the crawled markup includes “Showing: Grassroots … (1 Available)” plus a “No programs match this filter” state. | This may be normal filter state markup, but it needs real-browser testing to ensure all programs remain accessible and the default presentation is not confusing. | Test desktop/mobile and JavaScript-disabled or blocked cases. Keep each individual program page crawlable through ordinary `<a href>` links. |
| **P2 — Medium** | The live page set, source sitemap and legacy `.in/young/` sitemap do not align; the source sitemap omits the visible `/cricket-training` and `/net-practice` pages and individual coach profiles. | Important landing pages may be absent from sitemap discovery or outdated URL lists may be submitted. | Build the sitemap from the approved list of canonical, indexable production URLs. Exclude query URLs, redirects, 404s and duplicate/empty pages. |

**Important qualification:** this was a browser/source audit, not an authenticated account audit. I did not access Google Search Console, Google Ads Keyword Planner, Google Business Profile, analytics, a paid keyword database, or the origin server. I therefore do **not** claim exact monthly search volumes, actual organic rankings, index coverage totals, HTTP response headers, or measured Core Web Vitals. Repository findings must be confirmed against the rendered production source before implementation.

## 2. What was inspected

The current `.com` pages inspected through the live web reader included Home, About, the programs hub, Foundation, Junior Development, Senior Performance, Professional Coaching, Coaching Faculty, Hostel, Gym, Cricket Training, Net Practice, Photo Gallery, Contact and `contact?action=trial`. The public repository `a2start/ysca` was also inspected for `index.html`, `about.html`, `contact.html`, `our-programs.html`, `.htaccess`, `robots.txt` and `sitemap.xml`.

The current `.com` content is substantially more complete than an older indexed snapshot that showed a generic template and unrelated marketing blog posts. Check Search Console for lingering indexed legacy URLs and handle them based on actual URLs and current status; do not treat the older snapshot as proof that those old blocks still appear to current visitors.

### Live-site observations

- The home page has a local academy context and multiple conversion actions, but the primary H1 is generic (“Professional Cricket Coaching for Future Champions”) rather than explicitly identifying the academy as a cricket academy in Greater Noida.
- Dedicated pages exist for age-based programs and specific facilities, which is good for intent separation.
- About content and structured-data/source figures conflict with home-page numbers.
- The contact page has a local address/landmark and free trial form, but business details need standardizing.
- Contact has a query-string variant (`/contact?action=trial`) that should preserve the CTA behavior while canonically resolving to the clean contact URL.
- The Gallery’s Gym category is empty and contains a typo.
- Navigation needs correction around the Facilities parent and “All Academy Facilities” destination.

---

## 3. Technical SEO implementation requirements

### 3.1 Domain and URL consolidation — do this before content rollout

Treat `https://youngstarcricketacademy.com/` as the proposed primary host because that is the domain the request identifies. **Do not change DNS, forwarding or redirects during the audit.** Confirm the intended ownership and migration plan first.

1. Confirm the preferred host: HTTPS, non-`www`, `.com` root.
2. Verify production behavior for these variants: `http://`, `https://www.`, `https://youngstarcricketacademy.com/`, `.in` root, and legacy `.in/young/` paths.
3. If `.com` is the final host and the old `.in` pages are no longer meant to operate independently, set up one-to-one permanent redirects for old URLs to matching new pages **only after a URL map and approval**. Preserve relevant paths: About → About, each program → matching program, Contact → Contact, etc. Do not redirect every old URL to the homepage.
4. Use one self-referencing canonical on each indexable page, for example `https://youngstarcricketacademy.com/about`. Canonical host/path/slash policy must be consistent with the actual deployed URLs.
5. Canonicalize `/contact?action=trial` to `/contact`, while preserving the form-prefill/trial behavior. Query parameters must not break CTA submission.
6. Update internal links, Open Graph URLs, Twitter image URLs, JSON-LD URLs/IDs, sitemap URLs and the `robots.txt` sitemap directive to the approved primary host.
7. Audit source files for `localhost`, `/young/`, `.in` and stale test/staging URLs. A production search should return no unintended development or legacy-host references.
8. Do not rely on `.htaccess` rules without confirming the active hosting platform. Apache `.htaccess` is not executed by a static host such as GitHub Pages. Use only the redirect/routing mechanism supported by the actual production host; do not change platform or DNS as part of an SEO-only patch.

### 3.2 Robots and sitemap

The source repository contains a `robots.txt` and `sitemap.xml`, but they currently refer to the old `.in/young/` URL structure. Update them only in a controlled implementation branch after verifying the primary domain and live routes.

- `https://youngstarcricketacademy.com/robots.txt` must return HTTP 200 and allow crawlable public content/assets. It should disallow only genuine private/admin/staging paths, not CSS, JS or images needed for rendering.
- Include the correct sitemap line: `Sitemap: https://youngstarcricketacademy.com/sitemap.xml`.
- `https://youngstarcricketacademy.com/sitemap.xml` must return HTTP 200, valid XML, and only canonical, indexable, successful URLs on the `.com` host.
- Include the home page, About, programs hub, each active program detail, coaching directory and useful coach profiles, training grounds, net practice, hostel, gym, gallery only if useful/non-empty, and Contact.
- Exclude query variants such as `?action=trial`, development URLs, old `/young/` paths, redirected URLs, 404s, duplicate program templates and empty album pages.
- Include `lastmod` only when it reflects a real meaningful page update. Do not fabricate dates. Google treats sitemap submission as a hint, not a ranking guarantee.
- Submit the sitemap through Search Console only after the live URL returns valid XML. Watch processing errors and URL Inspection reports.

### 3.3 Titles, meta descriptions, headings and canonicals

- One unique title and one useful meta description per indexable URL. Titles should describe the actual page first, then brand/location where natural; avoid repeating “best” or multiple city variants in every title.
- One clear H1 per page. Keep it consistent with the visible page content. Use H2/H3 headings to break the page into program details, schedules, facility information, FAQs and admissions.
- Ensure page-specific metadata lives in the actual production HTML and is not duplicated across every page by a shared template.
- A meta keywords tag is not a substitute for useful on-page keyword placement and should not consume optimization time.
- Do not create a canonical to the homepage from every page. Every distinct indexable page should normally canonicalize to itself; query variants and duplicate templates should canonicalize or redirect to the intended primary URL.
- Add/verify Open Graph and Twitter metadata using `.com` URLs and accessible absolute image URLs. No `localhost` values.

### 3.4 Structured data / local entity

Use Google’s Local Business structured-data documentation as the implementation guide. Keep the markup accurate and in sync with visible text.

- Use an appropriate local business/sports facility entity type and a stable `.com/#academy` identifier.
- Verify the exact legal/trading name, official phone, email, physical address, postal code, coordinates, opening hours, logo and representative image before adding them.
- Update all `url`, `@id`, `logo`, `image` and related URLs to production HTTPS. Never ship `http://localhost/young/...`.
- Replace generic social root URLs (`facebook.com/`, `twitter.com/`, `linkedin.com/`, `youtube.com/`) with official profile URLs only; otherwise omit `sameAs` rather than pointing to generic homepages.
- Do not invent an opening-hours schedule, prices, service availability, affiliation, review rating, coach credentials or guaranteed selection outcome.
- Keep service/program details in visible page copy; do not hide facts solely in JSON-LD.
- Validate markup in Google’s Rich Results Test and URL Inspection. Structured data improves machine understanding but does not guarantee a rich result or ranking.
- Do not add fabricated reviews or misleading aggregate ratings. Only describe authentic reviews in line with Google’s requirements.

### 3.5 Internal links and information architecture

Correct the Facilities navigation and the “All Academy Facilities” destination. Every important service should be reachable by normal crawlable links from the home page, relevant hub, navigation or contextual body copy.

Suggested structure:

- Home → Programs hub → Foundation / Junior / Senior / One-to-one Coaching.
- Home → Facilities hub or Facilities dropdown → Cricket Training / Net Practice / Hostel / Gym.
- Home → Coaching Faculty → each real coach profile.
- Home → Gallery (only if useful and populated) and Contact / Free Trial.
- Each program page → 2–3 relevant programs, relevant coaches, trial/contact and facilities actually used by that program.
- Each coach profile → faculty hub, relevant coaching programs and Contact/Trial.
- Contact page → Google Maps pin, call/WhatsApp, actual hours, address, current schedule and trial form.

A new `/facilities` hub is optional, not mandatory. Create it only if it is a genuine useful summary with unique content; otherwise correct the menu and direct links to the existing facility pages.

### 3.6 Content accuracy and trust

Before text rewrites, make an approved fact sheet containing:

- Official brand name and location/address.
- One official phone, one WhatsApp number (if different), email and approved social URLs.
- Current coaching days/hours and office/contact hours.
- Current age bands, schedules, batch sizes, program fees or fee-disclosure policy, trial availability and admission process.
- Real facility counts, pitch types, lighting, gym/hostel availability and relevant safety practices.
- Coaches’ full names, current roles, verifiable qualifications and playing/coaching history.
- Verifiable milestones and the definitions behind “players trained”, “years of experience” and “matches/fixtures”.

Use that source of truth across Home, About, Contact, schema, footer, WhatsApp templates and program pages. Remove claims that cannot be substantiated.

---

## 4. Keyword research strategy and keyword map

### Method and evidence limits

I reviewed live page content and current local search surfaces, and identified local competitor entities around Noida / Greater Noida. I could not access an authenticated Keyword Planner or Search Console account, so **the keyword priorities below are intent-led starting hypotheses, not measured search-volume rankings**. Do not attach fabricated monthly volumes or claim these are “highest volume” without exporting a current data set.

Use these research tools before finalizing copy:

1. **Google Ads Keyword Planner** — Discover new keywords; use seed terms and relevant competitor URLs; set location to the Noida/Greater Noida/Gautam Buddha Nagar area available in the tool; review the last 12 months; export average monthly searches, competition, and top-of-page bid. Test English and Hindi/Hinglish terms only where the academy can serve those users.
2. **Google Search Console** — export 16 months of Queries and Pages; filter queries containing `cricket`, `academy`, `coaching`, `Noida`, `Greater Noida`, `kids`, `fees`, `trial`, `hostel` and `nets`; segment by page, device and country. Also review Page Indexing, URL Inspection, Core Web Vitals and sitemap status.
3. **Google Trends** — compare a shortlist of up to five terms for Uttar Pradesh/available local geography and the last 12 months plus five years. Treat Trends as relative interest, not absolute keyword volume.
4. **Google autocomplete and People Also Ask** — capture current local modifiers and parent questions without copying competitor text.
5. **SERP competitor review** — inspect page type, headline, offer, location proof, review signals, price transparency, photos and FAQs. Do not copy claims or use competitors’ brand names as target keywords.
6. **Technical tools** — crawl all URLs with Screaming Frog or an equivalent crawler; test production URLs with PageSpeed Insights, Search Console URL Inspection and Google Rich Results Test.

Recommended export columns: `Keyword | Source/tool | Location | Language | Monthly searches | Trend | Competition/CPC | Intent | Current ranking URL | Recommended landing page | Priority | Notes/verification`.

### Tier 1 — transactional local keywords

Prioritize the core service and geography on the homepage, with natural variants in copy:

- cricket academy in Greater Noida
- cricket academy Greater Noida
- cricket coaching in Greater Noida
- cricket coaching Greater Noida
- cricket academy in Noida
- cricket coaching in Noida
- cricket classes for kids in Greater Noida
- kids cricket coaching in Greater Noida
- cricket academy for kids in Noida
- cricket coaching near me
- cricket academy near me
- best cricket academy in Greater Noida *(use in user-intent phrasing only; do not claim to be “best” without evidence)*

**Landing page:** Home for the main local-intent cluster; Contact for address, trial and admissions intent. Avoid making the homepage repeat every keyword variant unnaturally.

### Tier 2 — program-specific keywords

| Keyword family | Primary page |
|---|---|
| beginner cricket coaching for kids; cricket coaching ages 6–10; cricket classes for beginners | `/program-foundation-cricket` |
| junior cricket coaching; cricket coaching ages 11–14; hard-ball cricket coaching for juniors | `/program-junior-development` |
| advanced cricket training; competitive cricket coaching ages 15–19; district/state cricket preparation | `/program-senior-performance` |
| one-to-one cricket coaching; personal cricket coach; individual batting/bowling coaching | `/program-professional-coaching` |
| cricket academy fees Greater Noida; cricket coaching fees for kids; trial class / admission | Contact + clearly linked fee/admissions information, if approved |
| cricket training ground Greater Noida; cricket coaching ground | `/cricket-training` |
| cricket net practice Greater Noida; turf cricket nets; bowling machine practice | `/net-practice` |
| cricket academy hostel Greater Noida; residential cricket coaching | `/hostel` — only if hostel is operating and available |
| cricket fitness training; cricket strength and conditioning | `/gym` — only for services actually offered |
| cricket coaches Greater Noida; cricket coaching staff | `/coach` and unique coach profile pages |

### Tier 3 — local area modifiers

Use these only where they accurately describe the actual catchment and travel access. The academy address remains **Delta II, Greater Noida**; never represent it as physically located in a different sector/city.

- cricket academy Delta II Greater Noida
- cricket coaching near Aster Public School Greater Noida *(only if the landmark/address is accurate)*
- cricket academy Greater Noida West
- cricket coaching Noida Extension
- cricket academy near Pari Chowk Greater Noida *(only if proximity is accurate and useful)*
- cricket coaching in Noida / families from Noida *(service-area wording, if true)*
- cricket academy near Knowledge Park / Omega / Alpha / Beta *(only if actual accessibility and content support it; do not make a page for each modifier by default)*

Do **not** mass-produce “cricket academy in [sector]” pages with near-identical copy. Google describes pages made to funnel similar local searches to one destination as doorway abuse. A Noida-focused landing page is justified only if the academy genuinely targets that market and can provide distinct, useful facts such as travel routes, who it serves, program details and original local information.

### Tier 4 — parent questions and supporting content

Use genuine questions from admissions conversations and Search Console. Candidate article/FAQ topics:

- How to choose a cricket academy for your child in Greater Noida.
- What happens in a first cricket trial for a beginner?
- What equipment does a young cricketer need for the first month?
- What is the difference between beginner, junior and competitive cricket coaching?
- What should parents compare when evaluating cricket coaching fees?
- Questions to ask before choosing a residential cricket academy/hostel.
- How do age-group cricket trials work? Explain process without promising selection.
- What a normal week of cricket training looks like at YSCA (use the actual timetable).

Publish only when a coach/staff member can review the accuracy and add first-hand value. Avoid thin “SEO blogs”, fake fee comparisons, unsourced cricket statistics or high-volume AI-generated location pages.

### Local competition observed

Search surfaces included coaching/club entities such as **Rakesh Rana Cricket Academy (RRCA, Omega II, Greater Noida)**, **Greater Noida Cricket Club Ground**, **Brigade Cricket Academy (Omega 1)**, **Young Talent Cricket Academy (Knowledge Park V area)**, **TWO7 Cricket Academy & Sports Arena (Greater Noida West/Sector 1)**, **Push Cricket Academy (Tech Zone IV)**, **Panjiyars Cricket Academy (Sector 128, Noida)** and **Glory Cricket Club (Sector 73, Noida)**. These are examples of the local market, **not a verified ranking order**. Use a current manual Google Maps/Search review to compare the exact competitors appearing for the academy’s actual pin and target queries. 

The aim is to outperform through accurate location signals, real photos, verified coach proof, useful program details, consistent business information and genuine reviews—not by stuffing competitor locations into copy.

---

## 5. Page-by-page recommendations

The metadata below is a **draft direction**. Final copy must reflect confirmed service facts, page content and actual keyword data. Use each title for a distinct intent; do not publish wording that is not true.

| URL | Main intent / keyword target | Suggested title tag | Content and implementation instructions |
|---|---|---|---|
| `/` | Local discovery: cricket academy/coaching in Greater Noida | **Cricket Academy in Greater Noida | Young Star Cricket Academy** | Change H1 to something clear such as “Cricket Academy in Greater Noida for Kids and Competitive Players”. State Delta II location and program age groups early. Add real facility/coach imagery, verified proof points, a concise summary of all programs and clear Call / WhatsApp / Book Trial actions. Resolve localhost canonical/OG/schema URLs and inconsistent stats. Ensure the programs filter does not hide the value proposition or mislead visitors. |
| `/about` | Brand, coaching method, credibility | **About Young Star Cricket Academy | Greater Noida** | Explain who operates the academy, coaching philosophy, verified experience, real achievements and facilities. Reconcile 15+ vs 20+ years and 500+ vs 5,000+ players. Add genuine staff credentials and original photographs. Unique description and self-canonical. |
| `/our-programs` | Compare coaching options by age/level | **Cricket Coaching Programs by Age | Greater Noida** | Replace generic source metadata. Add a brief intro and comparison table with age, skill level, days/week, timings, duration, batch capacity and trial eligibility—only confirmed fields. Each card links to the correct detail page. Test filters. |
| `/program-foundation-cricket` | Beginner/children ages 6–10 | **Cricket Coaching for Kids Ages 6–10 | Greater Noida** | Answer parent concerns: safety, equipment, session length, coach-to-player ratio, beginner progression, age eligibility, trial, fees/fee request and schedule. Remove duplicated “Age: Age:” phrasing. Keep all numerical claims verified. |
| `/program-junior-development` | Junior/hard-ball coaching ages 11–14 | **Junior Cricket Coaching Ages 11–14 | Greater Noida** | Explain weekly structure, hard-ball transition, batting/bowling/fielding work, match practice and selection preparation without promising outcomes. Keep schedule claims consistent with Contact. Verify claims about association affiliations and direct trial nominations. |
| `/program-senior-performance` | Advanced/competitive coaching ages 15–19 | **Advanced Cricket Coaching Ages 15–19 | Greater Noida** | Detail selection criteria, fitness/skill evaluation, workload, real competitions and eligibility. Distinguish guidance from guaranteed selection. Confirm all tournament and BCCI/state-related claims. |
| `/program-professional-coaching` | One-to-one/private coaching | **One-to-One Cricket Coaching | Greater Noida** | Explain who the session suits, booking length, available specialties, actual coach, fee/quote process, timetable and what a trainee receives. Avoid ambiguous “elite” claims without supporting facts. |
| `/coach` | Coach-team discovery | **Cricket Coaches in Greater Noida | Young Star Cricket Academy** | Give each coach a real role, accurate qualifications and playing/coaching history. Add profile links with descriptive anchor text. Resolve conflicting claims (“ECB Level 2”, “ICC certified”, BCCI/NIS) against original certificates. |
| `/coach-kapil-pratap-singh` | Coach/name search | **Kapil Pratap Singh | Cricket Coach at YSCA** | Unique biography, role, verified credentials, coaching specialties, actual experience and current programs. Avoid duplicating the same generic biography across the team. |
| `/coach-manoj-gupta` | Coach/name search | **Manoj Gupta | Cricket Coach at YSCA** | Unique verified profile; document specialties and current coaching role. Do not infer certifications or achievements. |
| `/coach-nayan-bhardwaj` | Coach/name search | **Nayan Bhardwaj | Cricket Coach at YSCA** | Unique verified profile; distinguish wicketkeeping/fielding role only if accurate. |
| `/coach-lokesh-bharti` | Coach/name search | **Lokesh Bharti | Cricket Coach at YSCA** | Validate the “ICC certified” claim and credential level before displaying it. Unique biography and photo alt text. |
| `/coach-nikhil-yadav` | Coach/name search | **Nikhil Yadav | Cricket Coach at YSCA** | Unique verified profile, role, program links and experience. |
| `/coach-rajeev-gupta` | Coach/name search | **Rajeev Gupta | Cricket Coach at YSCA** | Unique verified profile, role, credentials and program links. |
| `/coach-suryabhan-singh` | Coach/name search | **Suryabhan Singh | Cricket Fitness Coach at YSCA** | Use the fitness-specialist label only if it is the actual role. Describe the training scope accurately; avoid health/injury claims that imply medical treatment. |
| `/cricket-training` | Ground/facility and structured training | **Cricket Training Grounds in Greater Noida | YSCA** | Describe actual pitch types, practice options, supervision, schedule, safety, what is included, who can use the facility and how to book. Confirm “BCCI-standard”, pitch counts and all equipment statements before use. Link to the training program and Contact. |
| `/net-practice` | Nets, turf and bowling machine | **Cricket Net Practice in Greater Noida | YSCA** | Explain available nets, session types, booking rules, included equipment, player safety and actual availability for non-members if offered. Ensure “10+” vs “12+” net counts are consistent. |
| `/hostel` | Residential cricket training | **Cricket Academy Hostel in Greater Noida | YSCA** | Explain eligibility, accommodation, supervision, meal policy, study time, safety, admissions process and actual fees/availability. Verify all claims about 24/7 warden, meal types, school options, medical arrangements and “year-round” availability. Because minors may stay, provide transparent safety/contact information. |
| `/gym` | Cricket-specific strength/conditioning | **Cricket Fitness Training in Greater Noida | YSCA** | Define if this is a dedicated facility for academy trainees or a public service. Include genuine training scope, coach role, availability and booking. Avoid medical rehabilitation/injury-prevention promises unless qualified and accurate. |
| `/photo-gallery` | Visual proof and brand trust | **Cricket Training Photos and Match Gallery | YSCA** | Replace the empty Gym state/typo with real authorized images or hide the category until populated. Add concise descriptive alt text, accurate captions, image dimensions and optimized WebP/AVIF where practical. Do not add keyword-filled alt text to decorative images. Empty album detail routes should not be indexed. |
| `/contact` | Admissions, address, trial, fees/timings | **Contact Young Star Cricket Academy | Greater Noida** | Unify official phone, WhatsApp, email, address, hours and map pin. Put the address and click-to-call/WhatsApp near the top. Keep the form working, including validation and success feedback. Explain whether the trial is free and what it includes only if true. Add useful FAQs with visible answers. |
| `/contact?action=trial` | CTA route/prefilled trial form | **Use the clean Contact URL as canonical** | Preserve the functional prefill/subject behavior, but canonicalize this query variant to `/contact`; do not include it in the sitemap. Check the form on mobile, submit test leads only in a safe/staging environment. |
| Facility hub (optional) | Overview of training ground, nets, hostel and gym | **Academy Facilities in Greater Noida | YSCA** | Add `/facilities` only if a genuinely useful, distinct page can summarize each facility and link to the detailed pages. Fix current navigation targets first; do not create an empty/duplicate hub for SEO. |
| Noida-focused landing page (optional) | Local discovery for Noida families | **Only choose after keyword/coverage validation** | Do not create this by default. Consider one only if Noida is a real strategic service area and the page can give unique useful information (commute/access, eligible programs, actual service context, original details). Never imply the physical location is in Noida if it is in Greater Noida. Avoid sector-by-sector doorway pages. |

### Pages/files requiring a URL disposition decision

The repository also contains files/templates such as `program-cricket-hostel.html`, `program-gym-fitness.html` and `program-detail.html` in addition to `/hostel` and `/gym`. Before exposing or indexing all these routes, map the links, content and current status. If pages duplicate one another, choose a single preferred route and use a supported redirect or canonical rule as appropriate. Do not delete or redirect any route until it has been checked for traffic, backlinks, enquiries and existing indexation.

---

## 6. Local SEO and Google Business Profile

1. Verify the official Google Business Profile name and primary category, address/pin, phone, website URL, hours and service details. Do not rename the business to include extra keywords.
2. Set the website link to the approved `.com` canonical host after the domain migration is verified.
3. Upload current, real photos of the entrance/landmark, training grounds, net lanes, coaches, player activities and facilities. Do not use generic stock photos as proof of the real location.
4. Ask real parents/players for honest reviews after a genuine experience. Never buy reviews, filter out unhappy customers, or supply scripted keyword-rich reviews. Reply professionally and naturally.
5. Ensure business name/address/phone/email are consistent across the website, map pin and major directories. Correct stale listings rather than multiplying listings.
6. Build useful local citations only in relevant, legitimate directories. Avoid bulk low-quality directory submissions.
7. Mention the physical location accurately on Contact and naturally on Home/About. Use nearby area names only where the academy actually serves those families; do not imply a separate branch.
8. Track calls, form submissions, WhatsApp clicks, trial bookings and directions as conversions where analytics consent and technical setup permit. Search visibility should be evaluated alongside actual enquiries.

Google says local results are mainly influenced by relevance, distance and prominence; complete business information and genuine reviews can help prominence, but no one can request or guarantee a specific local ranking.

---

## 7. Performance, accessibility and conversion checks

These checks are not measured scores; run them before and after the eventual implementation.

- Run PageSpeed Insights on Home, one program page, Contact and one facility page on mobile and desktop. Save baseline and post-change reports.
- Preserve the visual design, spacing, responsive navigation, forms, sliders, filtering and galleries. SEO changes must not redesign unrelated UI.
- Compress oversized images, use descriptive filenames where sensible, declare image width/height, lazy-load below-the-fold images and avoid lazy-loading the main LCP/hero image.
- Ensure image alt text describes the actual image; alt text is not a space for keyword repetition.
- Check only one H1 per page, heading order, visible link labels, keyboard focus, form labels, contrast and mobile tap targets.
- Check console/network errors, missing images, JS exceptions, external dependencies, broken links and any CTA that no longer works.
- Ensure the main content is accessible to crawlers as ordinary text and key pages have crawlable anchor links. Do not depend on a filter control alone for discovering program detail pages.
- Make no broad JS/CSS or library updates as part of metadata work. Keep changes small and focused.

---

## 8. Safe implementation plan

### Phase 0 — read-only baseline (must happen first)

1. Record the current production URL, hosting provider/deployment workflow and preferred domain. Do not change DNS.
2. Take a current repository backup/tag and create an isolated branch. Save screenshots of Home, program pages, Contact and mobile navigation.
3. Crawl the current domain and create a URL inventory with status code, indexability, title, description, H1, canonical, sitemap inclusion, incoming links and page purpose.
4. Export Search Console data and GBP details if the owner can authorize access. If unavailable, mark those fields “not measured”; do not estimate.
5. Capture PageSpeed results and test all existing forms/WhatsApp/call paths before editing anything.

### Phase 1 — approved facts and research

1. Confirm the fact sheet (contact details, location, service hours, program schedules, coaching credentials, equipment/facility counts, fees/trial rules and claims).
2. Export Keyword Planner ideas for the seeds in Section 4 at the target geography. Merge them with Search Console queries and live SERP questions.
3. Map one primary keyword intent to one page; record secondary variants separately. Do not make every page target “cricket academy in Noida”.
4. Identify legacy `.in/young/` URLs and any indexed stale URLs; map them to their closest equivalent or document why they should remain.

### Phase 2 — fix critical technical signals

1. Replace localhost canonical/OG/Twitter/JSON-LD URLs with approved production URLs.
2. Add accurate unique canonicals and metadata to all indexable pages.
3. Update sitemap/robots for the `.com` host and complete, approved URL list.
4. Validate LocalBusiness/SportsActivityLocation data and remove generic/false social links.
5. Fix navigation targets and query-parameter canonical behavior.
6. Resolve domain redirects only after explicit approval and a tested one-to-one URL map.

### Phase 3 — on-page content and local trust

1. Apply the title/H1/description directions in Section 5.
2. Reconcile stats and claims against the approved fact sheet.
3. Improve real program details, coach biographies, facility descriptions, FAQs and call-to-action clarity.
4. Fix/curate the gallery and optimize images without changing the design system.
5. Add the optional Facilities hub or Noida landing page only if justified by content and keyword research.

### Phase 4 — validation and release gate

Before any production deployment, verify:

- Every canonical indexable URL returns the expected successful status.
- Canonical URLs point to themselves on the `.com` primary host; query/duplicate URLs point to the right clean URL.
- No production canonical, schema, OG, Twitter or sitemap references contain `localhost`, `/young/` or unintended `.in` URLs.
- `robots.txt` and XML sitemap return HTTP 200 on the live host; sitemap contains only canonical, indexable, successful URLs.
- Structured data passes validation and reflects visible, approved facts.
- No unintended changes to layout, menu, filters, gallery, forms, phone/WhatsApp, trial prefill, mobile behavior or tracking.
- Broken links, images and console errors are checked on mobile and desktop.
- PageSpeed is compared with baseline; any material regression is investigated.
- Search Console URL Inspection and sitemap reports are checked after launch; indexed URLs are monitored over subsequent weeks.

**Release control:** do not push to `main`, trigger production deployment, change DNS, change domain forwarding or issue permanent redirects until the user has reviewed the diff and explicitly approved that separate release step.

---

# 9. MASTER PROMPT — copy into the coding/research agent

> **Role:** Act as a senior technical SEO specialist, local SEO strategist, content strategist and careful static-site engineer. Your assignment is to audit and prepare a safe SEO improvement plan for Young Star Cricket Academy. The goal is better relevant organic visibility and qualified enquiries from Greater Noida first, and Noida/Greater Noida West where genuinely served.
>
> **Primary site requested:** `https://youngstarcricketacademy.com/`  
> **Public repository to inspect:** `https://github.com/a2start/ysca`  
> **Location evidence currently visible:** Delta II, Greater Noida, near Aster Public School; exact address/PIN/coordinates must be confirmed with the owner and Google Business Profile before schema or redirect changes.  
> **Safety constraint:** Start in READ-ONLY mode. Do not edit files, write to the repository, commit, push, deploy, change DNS, change settings, alter forms, replace assets, or create redirects during the audit. First deliver a complete report and proposed diff/implementation plan. Only implement after explicit user approval in a separate phase. Never deploy to production without a separate release approval.
>
> ## A. First confirm the current state
>
> 1. Open the current production `.com` site and crawl all linked public pages. Inspect the home page, `/about`, `/our-programs`, `/program-foundation-cricket`, `/program-junior-development`, `/program-senior-performance`, `/program-professional-coaching`, `/coach`, each coach profile, `/cricket-training`, `/net-practice`, `/hostel`, `/gym`, `/photo-gallery`, `/contact`, and `/contact?action=trial`.
> 2. Inspect the repository and identify the active deployment workflow and actual production host. Do not assume `.htaccess` works until the hosting platform is confirmed; a static host may ignore Apache rewrite rules.
> 3. Verify current production source—not only GitHub source—because cached pages and repository source can differ. Search for `localhost`, `youngstarcricketacademy.in`, `/young/`, generic social root URLs, stale contacts and duplicate page templates.
> 4. Make a baseline table: URL, status, indexability, title, description, H1, canonical, robots directive, Open Graph URL/image, JSON-LD, sitemap inclusion, internal links, broken assets and observations. Do not claim a 404/status/header/score if you did not directly measure it.
> 5. Record current design/functionality before recommending changes. The site must retain its appearance, forms, program filters, internal navigation, gallery, phone/WhatsApp CTAs, trial-form prefill and mobile behavior.
>
> ## B. Resolve critical technical risks in the proposed plan
>
> - The repository currently contains a homepage canonical reference to `http://localhost/young/`; the related Open Graph and structured-data identifiers/URLs/images also contain localhost. Validate production output, then recommend changing all intended production references to absolute HTTPS `.com` URLs.
> - Repository `robots.txt` points to `https://youngstarcricketacademy.in/young/sitemap.xml`, while `sitemap.xml` lists `.in/young/` URLs. The requested primary site is `.com` at root. Recommend a sitemap of approved canonical `.com` URLs and an updated sitemap directive in `robots.txt`.
> - The sitemap source appears to include only part of the page set and omits visible `/cricket-training`, `/net-practice` and individual coach profiles. Generate the final sitemap from the real crawl and approved indexable URL inventory, not by guessing.
> - Check whether `.in` and `.com` are both accessible/indexed with duplicate content. Recommend `.com` as primary only if confirmed. If the old `.in` version is to be retired, prepare a one-to-one redirect map after approval; preserve meaningful old paths and never redirect every URL to the homepage by default.
> - Canonicalize `/contact?action=trial` to `/contact` while preserving form prefill/CTA behavior. Do not include the query variant in the sitemap.
> - The repository’s About and Contact source pages do not show canonical tags; `our-programs.html` has generic metadata (`Young Star Cricket Academy` as title/description). Inspect all pages and propose unique metadata/canonicals for each.
> - The Facilities top-level link and “All Academy Facilities” target appear mismatched. Recommend the correct existing page/hub and test all nav links.
> - The gallery Gym category currently shows zero photos and a typo. Recommend adding real authorized photos or hiding that category; do not index empty albums.
>
> ## C. Business fact validation is a gate, not an assumption
>
> The site/source contains conflicting phone and achievement details. Contact lists `+91 99999 99000` and `+91 99999 99001`; other buttons/source use `+91 99105 43666`; JSON-LD uses `+91-9999999000`; the contact email shown is `youngstarcricketacademy123@gmail.com`. Home claims 20+ years, 5,000+ trained players and 10+ nets; About claims 15+ years, 500+ trained players and 12+ nets/pitches plus 8+ coaches. These must be verified and standardized. Ask the owner / use authorized official source data; do not choose a number by intuition.
>
> Create a source-of-truth fact sheet for the exact brand name, phone, WhatsApp, email, address, postcode, map pin, opening/training hours, age groups, schedules, fees/fee policy, trial offer, facility counts, coaching certificates, affiliation, match counts and player counts. Remove unsupported or misleading claims. Validate all schema fields and social profiles against this fact sheet.
>
> ## D. Research local keywords using real tools
>
> Do not invent volumes, keyword difficulty, traffic estimates or current rank positions. I want live tool exports or explicit “not measured” labels.
>
> **Tools and tasks:**
> 1. Google Ads Keyword Planner: “Discover new keywords,” use seed terms and competitor URLs, set geography to the closest available Noida/Greater Noida/Gautam Buddha Nagar targeting, review 12 months, export monthly-search estimates, competition and top-of-page bid. Test English and Hindi/Hinglish only where useful.
> 2. Search Console: export 16 months of Queries and Pages, review clicks/impressions/CTR/position, query/page mapping, device segments, Indexing, URL Inspection, Core Web Vitals and sitemap errors. If no authorized access exists, leave the corresponding fields unmeasured.
> 3. Google Trends: compare key terms for Uttar Pradesh/available local area and 12 months plus five years. Trends is relative interest, not absolute search volume.
> 4. Google autocomplete and People Also Ask: collect actual parent questions and local modifiers.
> 5. Current local SERPs/Google Maps: compare the exact competitors appearing for the address and target phrases. Local examples already found include RRCA (Omega II), Greater Noida Cricket Club Ground, Brigade Cricket Academy (Omega 1), Young Talent Cricket Academy (Knowledge Park V area), TWO7 (Greater Noida West/Sector 1), Push Cricket Academy (Tech Zone IV), Panjiyars (Sector 128 Noida) and Glory Cricket Club (Sector 73 Noida). Do not describe them as a ranked top list unless rankings are measured.
> 6. Technical crawl and PageSpeed Insights: use Screaming Frog or equivalent and PageSpeed on Home, Contact, one program and one facility page.
>
> **Seed terms:** `cricket academy in Greater Noida`; `cricket coaching Greater Noida`; `cricket academy in Noida`; `cricket coaching in Noida`; `cricket classes for kids Greater Noida`; `kids cricket coaching Greater Noida`; `cricket academy near me`; `cricket coaching near me`; `best cricket academy Greater Noida`; `cricket academy fees Greater Noida`; `free cricket trial Greater Noida`; `beginner cricket coaching ages 6–10`; `junior cricket coaching ages 11–14`; `advanced cricket training ages 15–19`; `one-to-one cricket coaching`; `cricket training ground Greater Noida`; `cricket net practice Greater Noida`; `turf nets and bowling machine practice`; `cricket academy hostel Greater Noida`; `cricket fitness training Greater Noida`; `cricket academy Delta II`; `cricket academy Greater Noida West`; `cricket coaching Noida Extension`.
>
> **Keyword rules:** assign one primary search intent to each page. Use synonyms and related phrases naturally in copy. Do not repeat the same city/phrase in every heading. Do not create thin sector pages or doorway pages. Keep location claims honest: the academy is physically in Greater Noida unless verified otherwise. Do not imply a branch in Noida.
>
> ## E. Page-by-page metadata and content plan
>
> Propose and document the final title, meta description, H1, primary intent, supporting terms, internal links, missing facts and CTA for every current canonical page. Use these as starting directions, not unverified claims:
>
> - `/`: title “Cricket Academy in Greater Noida | Young Star Cricket Academy”; H1 “Cricket Academy in Greater Noida for Kids and Competitive Players”; explain location, actual age bands, programs, coaches, confirmed facilities and trial.
> - `/about`: title “About Young Star Cricket Academy | Greater Noida”; explain ownership/approach, real coach credentials, verified history and real milestones.
> - `/our-programs`: title “Cricket Coaching Programs by Age | Greater Noida”; make ages, timing, days/week, skills and trial options comparable and accurate; test filters.
> - `/program-foundation-cricket`: title “Cricket Coaching for Kids Ages 6–10 | Greater Noida”; focus on beginner safety, age-appropriate drills, equipment, parent questions and schedule.
> - `/program-junior-development`: title “Junior Cricket Coaching Ages 11–14 | Greater Noida”; cover hard-ball progression and actual match experience without guaranteeing selection.
> - `/program-senior-performance`: title “Advanced Cricket Coaching Ages 15–19 | Greater Noida”; explain selection criteria, competitive preparation and real outcomes without false affiliation claims.
> - `/program-professional-coaching`: title “One-to-One Cricket Coaching | Greater Noida”; explain session format, coach/specialty, availability and booking.
> - `/coach`: title “Cricket Coaches in Greater Noida | Young Star Cricket Academy”; link to unique, verified profiles.
> - `/coach-kapil-pratap-singh`, `/coach-manoj-gupta`, `/coach-nayan-bhardwaj`, `/coach-lokesh-bharti`, `/coach-nikhil-yadav`, `/coach-rajeev-gupta`, `/coach-suryabhan-singh`: unique name-based title, original bio and verified credentials. Use “fitness coach” only for the actual role.
> - `/cricket-training`: title “Cricket Training Grounds in Greater Noida | YSCA”; detail actual pitches, supervision, training and access.
> - `/net-practice`: title “Cricket Net Practice in Greater Noida | YSCA”; detail real nets, equipment, bookings and safety.
> - `/hostel`: title “Cricket Academy Hostel in Greater Noida | YSCA”; verify accommodation, meals, supervision, study-time and safety information before publishing.
> - `/gym`: title “Cricket Fitness Training in Greater Noida | YSCA”; describe actual training and who can use it; avoid unsupported medical claims.
> - `/photo-gallery`: title “Cricket Training Photos and Match Gallery | YSCA”; real images, useful captions/alt text; hide or noindex empty album routes.
> - `/contact`: title “Contact Young Star Cricket Academy | Greater Noida”; accurate phone/WhatsApp/email/address/hours/map, trial details, fees/contact pathway and working form.
> - `/contact?action=trial`: preserve functionality but canonicalize to `/contact`; omit from sitemap.
> - Optional `/facilities`: create only if a real, helpful hub is warranted; do not duplicate `/our-programs`.
> - Optional Noida landing page: only if keyword evidence and genuine service reach justify unique helpful content. No near-identical city/sector doorway pages.
>
> For each page, write a distinct meta description describing the actual contents and a next step. Avoid empty adjectives (“world-class”, “best”, “premier”) unless supported. Keep the layout and design unchanged unless the user explicitly approves a design change.
>
> ## F. Local SEO, structured data and trust
>
> 1. Verify Google Business Profile name/category/address/pin/hours/phone/website. Do not keyword-stuff the business name.
> 2. Standardize phone, WhatsApp, email, location and hours sitewide and in schema.
> 3. Use one appropriate LocalBusiness/SportsActivityLocation identity with stable `.com/#academy` IDs; correct all localhost fields; only use official social profile URLs in `sameAs`.
> 4. Use breadcrumbs where they help navigation; only add schema for content actually visible on the corresponding page. Validate all JSON-LD. Do not invent ratings or reviews.
> 5. Recommend real photos of actual facility, coaches, training and entrance; maintain review collection ethically and consistently.
> 6. Track calls, trial forms, WhatsApp clicks and map directions as conversions if authorized tracking and consent settings allow.
>
> ## G. Content and reputation rules
>
> - Prioritize accurate, first-hand, helpful information, especially parent questions about coaching style, safety, batch sizes, schedules, admissions and residential care.
> - Use coaches to review program/technical content. Add original photo/video evidence and clear authorship where practical.
> - Do not generate large volumes of similar location pages or generic blogs. Do not plagiarize competitor text or claim a ranking, result, association, award, certification or selection guarantee without evidence.
> - Use FAQs because they help users, not as a promise of FAQ rich results. Put answers visibly on the page.
> - Blog topics can include choosing a cricket academy, what happens in a first trial, beginner equipment, age-group progression, fees comparison factors, hostel questions and actual week schedules—only where a knowledgeable staff member can review the information.
>
> ## H. Safe implementation and quality gates
>
> **Phase 0 (read-only):** inventory URLs, inspect production, record baseline screenshots, form/CTA behavior, technical issues, performance and tracking. Deliver report only; no edits.
>
> **Phase 1 (after approval):** create a feature branch and backup; standardize verified facts; implement canonical/metadata/schema/robots/sitemap changes in small, reviewable commits.
>
> **Phase 2 (after approval):** improve copy and page metadata page by page; fix the Facilities link and gallery. Avoid unrelated redesign, CSS or JS changes.
>
> **Phase 3 (after approval):** test on a staging/preview URL, never by blindly deploying to production. Test all pages/links, desktop and mobile menus, filters, gallery, contact form validation and submission, trial query-prefill, phone and WhatsApp CTAs, maps, images, analytics events and console/network errors.
>
> **Technical acceptance checks:**
> - No accidental `localhost`, `/young/` or unintended `.in` canonical/OG/JSON-LD/sitemap references remain on the `.com` production version.
> - Every indexable page has the intended unique title, description, H1 and canonical.
> - Canonicals, sitemap and robots point to the same approved primary host; sitemap only contains canonical indexable success URLs.
> - No indexable empty/duplicate pages, broken links, inaccessible main content or hidden core program links.
> - LocalBusiness fields match the visible, approved real-world facts.
> - Existing appearance, routes, forms, program filtering, trial prefill, call/WhatsApp and mobile functionality remain intact.
> - Compare PageSpeed and crawl results with baseline; investigate regressions before release.
>
> **Release gate:** prepare the diff, list files changed, summarize every SEO change, provide before/after validation evidence and wait. Do not commit to `main`, push or deploy, change DNS, switch domains or set permanent redirects until the user explicitly approves the release step.
>
> ## I. Final deliverables required from the agent
>
> 1. Audit report with severity, evidence, impact, fix and verification.
> 2. Keyword research spreadsheet/export with actual tool source and volume/date/location fields; clearly label unavailable data.
> 3. Keyword-to-URL map with one primary intent per page.
> 4. Page-by-page final title/meta/H1/content/internal-link/schema recommendations.
> 5. Domain/redirect map covering `.in/young/`, `.in` root, `.com` and query variants.
> 6. A small, reversible implementation plan; no code change until approval.
> 7. Post-implementation QA checklist and Search Console monitoring plan.
