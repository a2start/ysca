# YOUNG STAR CRICKET ACADEMY — PRODUCTION SEO IMPLEMENTATION MASTER PROMPT
**Prepared:** 29 October 2026  
**Deliverable:** Implement the specified changes in the existing website repository. **DO NOT conduct new competitor research or keyword research.** The research and decisions are already supplied here.  
**Repository:** `https://github.com/a2start/ysca`  
**Live production:** `https://youngstarcricketacademy.com/`  
**Separate staging site:** `https://ysca.pages.dev/`  
**Cloudflare production project:** `ysca-live`, production branch `main`; `ysca` is the staging project.  
**Existing SEO branch:** `seo-optimization`; production/preview indexing fix was reportedly merged to `main` and verified on homepage, `/our-programs`, `/robots.txt`, `/sitemap.xml` by the website owner.  
**Do not redeploy the old site from GitHub Pages.** GitHub is for source control; Cloudflare Pages hosts the site.

## 0. Operating instruction: IMPLEMENT, not research
You are an experienced static-site frontend developer, SEO implementation engineer, and QA engineer. Implement the specific page mappings, content, accuracy repairs, navigation fixes, metadata, images, JSON-LD, internal links, and tests below. You are not commissioned to discover keyword targets, research competitors, calculate keyword search volumes, create another SEO strategy, or rewrite the master plan. This document already contains the priorities and keyword-to-page allocation. Inspect repository code only as necessary to edit it safely and verify that changes work. Do not reinterpret the research into a new plan or ignore the specified copy.

**DO NOT merge/push/deploy to `main` or change Cloudflare configuration without the owner's approval.** Use a new `seo-final-implementation` branch based on the latest production `main`, or a fresh feature branch that includes all approved changes. Do not overwrite unrelated work; preserve contact Functions, KV integrations, styling, animations, mobile layouts, imagery, asset URLs, tracking, and page behavior. All changes should be in-place in the existing 21 site pages. Keep the same 21 canonical URLs unless explicitly specified otherwise.

### Critical truth-and-safety rule
The actual live site currently has **unverified and mutually contradictory claims**. **Never assume a statement is true just because it appears on the live website.** Never add a new statistic, certification, award, selection guarantee, coach experience count, facility capacity, fee, training time, age rule, trial promise, hostel service, transport benefit, result, testimonial, quote, or other tangible business promise without written owner-supplied proof. If no proof is in the repository or user-approved fact sheet, **remove the claim and implement the neutral fallback wording supplied below**, not a TODO visible to visitors. Document unresolved facts in `SEO-OWNER-FACTS.md` for optional later owner review. Do not generate fictitious coach quotations or alter the people shown in existing photographs. Specific live-site issues and replacements are provided below.

**Outcome target:** every page answers a clear search intent; accurate, well-scannable copy; meaningful visuals and alt; correct discoverability, schema, accessibility and conversion flow. Ranking #1 cannot be promised, and keyword repetition is not a substitute for value.

## 1. Research conclusions — fixed input, DO NOT re-research
- Primary market: **Malakpur / Greater Noida, Uttar Pradesh**. Secondary enquiry reach: nearby Greater Noida and Noida where relevant; do NOT pretend the physical academy is in central Noida or establish invented branches.
- Main high-intent queries: `cricket academy in greater noida`, `cricket coaching in greater noida`, `cricket academy near me`, `cricket coaching for kids greater noida`, `junior cricket academy greater noida`, `cricket training greater noida`, `cricket net practice greater noida`, `cricket practice nets near me`, `one to one cricket coaching greater noida`, `residential cricket academy greater noida`, `cricket academy hostel greater noida`, `cricket fitness training greater noida`, `cricket academy admission greater noida`.
- Related semantic phrases, used only where natural: batting coaching; bowling coaching; fielding practice; cricket fundamentals; youth coaching; match awareness; batting stance; footwork; bowling run-up; protective equipment; trial enquiry; training ground; session availability; age-appropriate development; coaching team; player progression.
- Competitors reviewed: DRJP Cricket Academy (`drjpcricketacademy.com`), Aarka Cricket Academy (`aarkasports.com/cricket-academy/`), Hawk Sports (`hawksportz.in`), Legend Cricket Academy (`legendcricketacademy.com`), plus local directory listings in Greater Noida/Noida. Their sites feature clear programme formats, facilities, named coaches, admissions, and original player or facility evidence. **Do not copy their wording or make claims by comparison.** Implement YSCA's concrete, accurate information and pictures instead.
- Public research could **not** establish reliable Greater Noida-specific monthly search volume or keyword difficulty. Thus **NO numeric keyword volumes, difficulty scores, CPC, or ranking claims are approved for this work.** Use relevance-based P1/P2 priority only. Do not send yourself or another agent to research them. If a verified Google Ads Keyword Planner export becomes available later, it can be analyzed separately.
- Google Search Console, as reported by the owner on 29 Oct 2026, shows sitemap successfully read with **21 discovered URLs**, while `/our-programs` is **discovered but not yet indexed** and its **live test passes indexing eligibility**. This is not a reason to add noindex, create duplicates, or resubmit sitemap compulsively.

Google primary implementation references (use as normative guidance, not a research task):
- https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- https://developers.google.com/search/docs/fundamentals/creating-helpful-content
- https://developers.google.com/search/docs/essentials
- https://developers.google.com/search/docs/appearance/title-link
- https://developers.google.com/search/docs/appearance/snippet
- https://developers.google.com/search/docs/appearance/google-images
- https://developers.google.com/search/docs/appearance/structured-data/local-business
- https://developers.google.com/search/docs/crawling-indexing/javascript/javascript-seo-basics
- https://developers.google.com/search/docs/crawling-indexing/site-move-with-url-changes

## 2. P0: Resolve specific inaccuracies across ALL site pages
### 2.1 Counters, numbers, and achievements
The current production HOME displays `20+ Years of Coaching Experience`, `5000+ Trained Players`, `50+ District / League Matches Played`, `100% Focus on Skill & Discipline`, `50+ Yearly Competitive Fixtures`, and `1:12 Coach Ratio`. ABOUT says `15+ Years`, `500+ Cricketers Trained`, `12+ Nets`, `8+ Certified Coaches`. Another section claims `10+ Turf Nets`. Such numbers conflict or lack proof.

**Implement immediately**: replace counters with four non-numeric, useful values/feature cards that are consistent everywhere, e.g. `Age-based Programmes`, `Batting, Bowling & Fielding`, `Meet Our Coaching Team`, `Contact Us About a Trial`. If a number is part of a CSS counter animation, refactor that component into a non-counter card while preserving the visual structure. Remove unverified `1:12`, `10+`, `12+`, `50+`, `100%`, `500+`, `5000+`, years experience and automated counters from HTML, metadata, cards, coach summaries, schema, OG descriptions, social text, and hidden UI components. Do NOT leave old values in hidden tabs or mobile duplicates. If an owner-approved fact sheet explicitly validates an individual claim, keep only the verified value and cite it in `SEO-OWNER-FACTS.md`.

### 2.2 Program age labeling
Current individual programme pages say **Foundation ages 6–10**, **Junior ages 11–14**, **Senior ages 15–19**. Yet desktop navigation renders `Foundation (U-12)`, `Junior (U-16)`, `Senior (U-19+)` while home filter labels have yet another interpretation. Implement consistent text labels:
- `Foundation Cricket — Ages 6–10`
- `Junior Development — Ages 11–14`
- `Senior Performance — Ages 15–19`
- `One-to-One Coaching — Ask About Eligibility`
These labels describe **current site offerings, pending academy confirmation**. If an approved enrollment policy exists, it takes precedence; otherwise present these as programme guide ranges and add `Age suitability and current batches are confirmed by the academy.` Do not market selection eligibility or BCCI age-group competition thresholds as if identical to private coaching age bands. Avoid any guaranteed district/state/Ranji selection language.

### 2.3 Unverified coaching, amenities, fees, timing, and trial promises
Remove or condition on documented proof: BCCI/NIS/ECB/ICC certification blanket claims, Ranji Trophy/first-class career claims, `Verified Credential` badges without external evidence, official CBSE selector claims, 150 km/h bowling machines, 135+ km/h throwdowns, guaranteed every-Monday intakes, fixed 1-hour free assessment, 100% free trial, 24/7 warden and CCTV, guaranteed 3 or 4 meals, nutritionist-designed menus, AC rooms, full-day access, exact all-week training timetables, any `Admissions Open / Limited Seats / Year-Round Availability` banner, and injury rehabilitation promises.

**Approved fallback phrasing**:
- For programmes: `Ask our team about the current batch schedule, eligibility, facilities and any trial-session availability.`
- For training facilities: `The academy can confirm the practice surfaces, equipment and coached session options currently available.`
- For coaching credentials: `Learn about the coaching team and contact the academy for confirmed qualifications and session assignments.`
- For residence: `Ask about current hostel availability, accommodation, meals, supervision and fees before making arrangements.`
- For pricing: `Fees and current programme inclusions are shared directly by admissions.`
- For trial buttons: label `Enquire About a Trial Session` unless owner-provided information confirms it is definitively free and available. **Do not remove the functioning `/contact?action=trial` interaction**; change only unsupported promises.
- For safety/fitness: avoid medical treatment or injury-prevention guarantees.

### 2.4 Exact address and online listing mismatch
The production Contact page states **FFW9+CM, Malakpur, Uttar Pradesh, India**; the published About text says Malakpur. An external Justdial listing associates a `Young Star Cricket Academy` with a **Delta 2, Greater Noida** address. Do NOT claim the directory record definitely represents this academy or change the website to Delta 2. On the site, consistently show the currently published ground map link and label `YSCA Training Ground — Malakpur, Greater Noida`, including an actual clickable Google Maps link. Put postcode/street address in schema only if specifically approved. Create `SEO-OWNER-FACTS.md` note to confirm the map pin, any campus variants, and the official Google Business Profile, rather than fabricating NAP. If two distinct ground entities exist, do not merge their identities without owner verification.

### 2.5 Old domain migration — NOT OPTIONAL to document
`https://youngstarcricketacademy.in/` is STILL serving a very similar earlier version and is discoverable in searches. **Do not put a meta canonical on the current `.com` that points to `.in`.** If deployment or DNS access to `.in` is authorized, implement **one-hop server-side 301 redirects** from the exact old URL to the corresponding `.com` URL for all 21 equivalent pages and both `.in` hostnames; map missing legacy paths to the closest relevant new page, not automatically to homepage. If no access, create `SEO-OLD-DOMAIN-REDIRECT-MAP.md` with complete 21-URL mappings and a deployment-ready Cloudflare/old-host redirect configuration but clearly mark `BLOCKED — requires old-domain owner/hosting access`. The owner does not plan to renew `.in`, so be transparent that redirects cease when they no longer control the domain; Google's normal recommendation is to maintain redirects for at least one year where possible. Never advise intentionally creating duplicate indexable `.in` content.

## 3. Mandatory per-page SEO fields — exact content map
Use the following title, description, **one H1**, page-specific keyword intention, and section structure for **all 21 URLs**. Keep titles clean and descriptively human; do not force a 60-character limit if it harms clarity. Exact texts can be tweaked only to reflect verified facts or grammar. Do NOT repeat the homepage keyword as the lead target on every page. Retain existing page slugs and use production-origin, self-referencing canonical links.

### A. Main pages (14 entries)

**01 `/` — Primary: cricket academy in Greater Noida, cricket coaching Greater Noida**
- `<title>`: `Cricket Academy in Greater Noida | Young Star Cricket Academy`
- Meta: `Explore cricket coaching at Young Star Cricket Academy in Greater Noida. Compare beginner, junior and senior programmes, meet the coaches and enquire about training.`
- H1: `Cricket Academy in Greater Noida for Young & Developing Players`
- Hero intro: `Young Star Cricket Academy offers age-based coaching pathways for players learning cricket and those developing their match skills. Explore programmes, meet our coaching team and ask about suitable batches at our Malakpur training ground in Greater Noida.`
- H2s in order: `Cricket Coaching for Different Stages`, `What Players Can Work On`, `Meet Our Coaching Team`, `Explore the Training Ground`, `How to Enquire About Admission`, `Find Us in Malakpur, Greater Noida`.
- Replace unverified stats/selection hype with concrete activities. Feature links → `/our-programs`, `/program-foundation-cricket`, `/program-junior-development`, `/program-senior-performance`, `/cricket-training`, `/net-practice`, `/coach`, `/contact`.
- FAQ only if visibly useful: `Which programme may suit a beginner?` → `The Foundation page introduces an entry-level pathway; contact the academy with the player's age and experience for current suitability.`; `Can parents ask about a trial?` → `Yes. Use the enquiry form to ask about trial-session availability and what to bring.`; `Where is the training ground?` → `The website lists the academy ground in Malakpur, Greater Noida; see directions on the Contact page.`

**02 `/about` — Primary: about Young Star Cricket Academy**
- Title: `About Young Star Cricket Academy | Greater Noida`
- Meta: `Learn about Young Star Cricket Academy in Malakpur, Greater Noida, its coaching approach, programme pathways and how parents can contact the team.`
- H1: `About Young Star Cricket Academy`
- Intro: `Young Star Cricket Academy serves players and families exploring cricket coaching in Greater Noida. Our programme pages explain different stages of development, and our coaching profiles help visitors learn about the people involved.`
- H2s: `Our Approach to Cricket Development`, `Programmes and Skills`, `Coaching Team`, `Training Location`, `Plan a Visit or Enquiry`. Remove all unverified counters, blanket certification claims, 100% assurances, and invented history. Link → programmes, coaches, contact. Do not use a vague history claim as fact.

**03 `/our-programs` — Primary: cricket coaching programs Greater Noida**
- Title: `Cricket Coaching Programs in Greater Noida | YSCA`
- Meta: `Compare Foundation, Junior, Senior and individual cricket coaching options in Greater Noida. Explore focus areas and enquire about age suitability, fees and batches.`
- H1: `Cricket Coaching Programmes in Greater Noida`
- Intro: `The right programme depends on a player's age, experience and goals. Compare the coaching pathways below, then contact the academy to confirm the current schedule, eligibility and availability.`
- H2s: `Compare Cricket Coaching Pathways`, `Foundation: Learning the Basics`, `Junior: Developing Match Skills`, `Senior: Building Competitive Readiness`, `Individual Coaching`, `Choosing a Programme`, `Ask About Admissions`.
- Implement accessible comparison table with **programme, published guide age range, focus, link**, without unverified price/schedule. Fix all filter labels and live-region/empty-state behavior; avoid rendering the `No programs match` message to users when items exist. Link cards to all four programme pages; hostel/gym as related facilities, not age-based programmes.

**04 `/program-foundation-cricket` — Primary: cricket coaching for kids Greater Noida**
- Title: `Cricket Coaching for Kids Ages 6–10 | YSCA Greater Noida`
- Meta: `Explore beginner cricket coaching for children at Young Star Cricket Academy. Learn about batting, bowling, fielding basics and enquiry options in Greater Noida.`
- H1: `Foundation Cricket Coaching for Beginners`
- Intro: `The Foundation programme introduces younger players to cricket fundamentals through an age-appropriate learning pathway. Families can ask about current sessions, equipment and whether the programme suits their child.`
- H2s: `Who This Programme Is For`, `Batting, Bowling and Fielding Fundamentals`, `Coordination and Confidence`, `What Parents Should Ask Before Joining`, `Next Steps After Foundation`, `Enquire About a Session`.
- Clearly label age 6–10 as the **currently published guide**, subject to academy confirmation. Link → `/our-programs`, `/program-junior-development`, `/contact?action=trial&program=foundation` (only if `foundation` is supported by frontend; otherwise use `?action=trial`). Remove unsupported fixed batch size, intake dates and schedule from hero.

**05 `/program-junior-development` — Primary: junior cricket coaching Greater Noida**
- Title: `Junior Cricket Coaching Ages 11–14 | YSCA Greater Noida`
- Meta: `Explore Junior Development cricket coaching in Greater Noida, including batting, bowling, fielding and match-awareness skills. Ask about current junior batches.`
- H1: `Junior Development Cricket Coaching`
- Intro: `Junior Development focuses on progressing from basic techniques towards more confident practice and game awareness. Parents can compare the syllabus and enquire about appropriate sessions for their child's experience.`
- H2s: `Who Junior Development Is For`, `Batting and Bowling Technique`, `Fielding and Match Awareness`, `Progression from Foundation`, `Questions About Batches and Equipment`, `Enquire About Junior Coaching`.
- Link → Foundation, Senior, Net Practice, Contact. Eliminate false guaranteed competition placements.

**06 `/program-senior-performance` — Primary: advanced cricket coaching Greater Noida**
- Title: `Advanced Cricket Coaching Ages 15–19 | YSCA`
- Meta: `Learn about the Senior Performance cricket coaching pathway in Greater Noida, focused on technical practice, match awareness and development. Enquire about eligibility.`
- H1: `Senior Performance Cricket Coaching`
- Intro: `The Senior Performance pathway is intended for developing players who want more focused technical practice and match preparation. The academy can explain the current eligibility, schedule and coaching format.`
- H2s: `Who Senior Coaching May Suit`, `Technical Practice and Feedback`, `Match Situations and Decision-Making`, `Fitness and Practice Planning`, `Questions About Competitive Preparation`, `Enquire About Senior Coaching`.
- Link → Junior, Professional Coaching, Cricket Training, Contact. Remove promises of state/BCCI/Ranji nominations, selections, appointments, or guaranteed trial access.

**07 `/program-professional-coaching` — Primary: one to one cricket coaching Greater Noida**
- Title: `One-to-One Cricket Coaching in Greater Noida | YSCA`
- Meta: `Ask about individual cricket coaching at Young Star Cricket Academy in Greater Noida. Discuss your batting, bowling or match-skills goals and available coaching options.`
- H1: `One-to-One Cricket Coaching in Greater Noida`
- Intro: `Individual coaching enquiries are useful when a player wants to discuss a specific technical challenge or training goal. Contact the academy to check whether a suitable coach and session format are available.`
- H2s: `Who Individual Coaching May Suit`, `Discuss Your Batting or Bowling Goals`, `How a Session May Be Planned`, `Questions About Coach and Slot Availability`, `Enquire About Individual Coaching`.
- No guaranteed 60-minute session, pricing packages, specific personal coach allocation, or video analysis without proof. Link → coaches, training, contact.

**08 `/cricket-training` — Primary: cricket training Greater Noida**
- Title: `Cricket Training in Greater Noida | YSCA`
- Meta: `Explore cricket training at Young Star Cricket Academy in Malakpur, Greater Noida. Learn about practice focus areas and enquire about current coaching sessions.`
- H1: `Cricket Training in Greater Noida`
- Intro: `Cricket training can involve work on batting, bowling, fielding and match awareness. This page explains the skills players may focus on and helps families ask the academy about sessions and training conditions.`
- H2s: `What Cricket Training Can Include`, `Batting Basics and Footwork`, `Bowling Technique`, `Fielding and Match Awareness`, `Training Ground and Equipment Questions`, `Find a Suitable Programme`.
- Distinguish skill coaching from facilities/net practice page. Replace guaranteed weekly practice schedules and unsupported camera, bowling-machine, turf, match-format claims with conditional/verified descriptions. Link → Net Practice, programmes, contact.

**09 `/net-practice` — Primary: cricket net practice Greater Noida**
- Title: `Cricket Net Practice in Greater Noida | YSCA`
- Meta: `Ask about cricket net practice in Greater Noida, including batting and bowling sessions, equipment requirements and availability at Young Star Cricket Academy.`
- H1: `Cricket Net Practice in Greater Noida`
- Intro: `Net sessions give players a setting to practise batting and bowling skills. At Young Star Cricket Academy, contact the team to confirm the current practice surfaces, supervision, session formats and available slots.`
- H2s: `What to Expect from Net Practice`, `Batting Practice`, `Bowling Practice`, `Equipment and Safety`, `Practice Slots and Availability`, `Book a Net Practice Enquiry`.
- Delete unverified `10+ dedicated turf lanes`, exact 150 km/h machine and 135+ km/h throwdown specs, guaranteed floodlighting, fixed slot times unless owner verified. Make the information genuinely useful instead of a pure enquiry prompt. Link → Training, programmes, Contact.

**10 `/hostel` — Primary: cricket academy hostel Greater Noida**
- Title: `Cricket Academy Hostel in Greater Noida | YSCA`
- Meta: `Enquire about accommodation for outstation cricket trainees at Young Star Cricket Academy, Greater Noida. Check current rooms, meals, supervision and fees.`
- H1: `Cricket Academy Hostel in Greater Noida`
- Intro: `Families considering residential cricket training can contact Young Star Cricket Academy to ask about current accommodation availability and arrangements. Confirm rooms, meals, safety supervision, daily routine, eligibility and fees before booking.`
- H2s: `Questions to Ask About Accommodation`, `Daily Routine and Training Access`, `Meals and Supervision`, `Admission and Availability`, `Hostel Enquiry Checklist`.
- Remove 3-versus-4 meals contradiction by omitting a count; delete claims of 24/7 security, guaranteed meal plans, private gym access, air-conditioning, room availability, warden, nutritional specialist unless fact sheet proves them. Do not publish an exact timetable as current policy without proof. Link → programmes and Contact with hostel subject.

**11 `/gym` — Primary: cricket fitness training Greater Noida**
- Title: `Cricket Fitness & Conditioning in Greater Noida | YSCA`
- Meta: `Explore cricket fitness and conditioning topics at Young Star Cricket Academy in Greater Noida, and ask which training options are currently available.`
- H1: `Cricket Fitness and Conditioning in Greater Noida`
- Intro: `Cricket-specific conditioning may include mobility, coordination, strength and running practice appropriate to a player's age and training level. Ask the academy which supervised fitness activities are part of its current programmes.`
- H2s: `Why Conditioning Matters in Cricket`, `Movement, Strength and Coordination`, `Fitness for Different Stages`, `Equipment and Supervision`, `Enquire About Current Sessions`.
- Remove unverified specialist trainers, daily access, weekly plans and rehab or injury-prevention promises. Link → training, senior, contact.

**12 `/coach` — Primary: cricket coaches Greater Noida**
- Title: `Cricket Coaches in Greater Noida | YSCA Coaching Team`
- Meta: `Meet the coaching team featured by Young Star Cricket Academy in Greater Noida. View individual profiles and contact the academy about current programmes.`
- H1: `Meet the Young Star Cricket Academy Coaching Team`
- Intro: `Explore the coaches featured by the academy and learn about their stated areas of focus. For confirmed qualifications, current responsibilities and session assignments, contact the academy directly.`
- H2s: `Our Coaching Team`, `Coaching for Different Player Stages`, `Ask About Coach Availability`.
- Keep all seven coach cards and functional profile links. Replace unverified credential badges, years-of-experience and achievement counts. Person portraits must have real descriptive alt text; decorative divider images `alt=""`.

**13 `/photo-gallery` — Primary: cricket academy training photos Greater Noida**
- Title: `Cricket Training Photos & Academy Gallery | YSCA`
- Meta: `Explore photos of cricket practice, match activities and training facilities featured by Young Star Cricket Academy in Greater Noida.`
- H1: `Cricket Training and Academy Photo Gallery`
- Intro: `See photographs of training sessions and cricket activities associated with Young Star Cricket Academy. Visit the programme and facilities pages to learn about current coaching options.`
- H2s: `Training Sessions`, `Match and Practice Moments`, `Facilities`, `Explore Related Programmes`.
- Existing gallery album query links `?album=training-sessions` and `?album=match-highlights` were observed. These should open a working gallery view; if intentionally query-driven, keep canonical pointing to `/photo-gallery`, unless album pages genuinely provide substantial unique indexable content. Remove fabricated photo counts/date claims. Use accurate individual image captions/alt, real image dimensions and lazy-loading for non-hero images. Link → training, net practice, contact.

**14 `/contact` — Primary: cricket academy admission Greater Noida**
- Title: `Contact Young Star Cricket Academy | Greater Noida Admissions`
- Meta: `Contact Young Star Cricket Academy about cricket coaching, admission, trial enquiries, training facilities and directions to the ground in Malakpur, Greater Noida.`
- H1: `Contact Young Star Cricket Academy in Greater Noida`
- Intro: `Tell us the player's age, experience and the programme you're interested in. Our team can explain current eligibility, session times, fees, trial availability and directions to the training ground.`
- H2s: `Call or Send an Enquiry`, `Programmes and Trial Enquiries`, `Training Ground Location and Directions`, `Admissions Questions`.
- Preserve working form and same-origin `/api/contact` POST. Keep validation, honeypot, privacy, anti-spam and `CONTACTS_KV` integration. Don't change production KV namespace or reveal private records. Keep exact phone `+91 99105 43666` **only as the currently published contact number, pending owner sign-off**; do not replace from a third-party listing. Keep published map `FFW9+CM, Malakpur, Uttar Pradesh` until owner corrects it. Any printed timings must be reconciled with the programme pages or replaced with `Please contact us to confirm current opening and training times.` The page's CTA must say `Submit Admission Enquiry` or `Enquire About a Trial`, not imply instant booking or guaranteed trial entitlement if no actual booking service exists.

### B. All 7 individual coach pages (entries 15–21)
**Do not fabricate or infer anyone's credentials, career history, sporting achievements, years of experience, certifications, honors, success counts or exact batches.** Existing biographies and credential sections contain numerous claims that cannot be independently validated with the available research. Remove false `Verified Credential` labels without supplied proof. Where a displayed specialization is not owner-verified, use the neutral fallback bio below. Preserve real names and the published role labels as provisional website descriptions, and retain coach portraits.

For EACH coach page implement this common H2 hierarchy:
- `Coaching Role and Focus`
- `Approach to Player Development`
- `Programmes and Enquiries`
- `Contact the Academy`.
Use no duplicate H1, name-only H1, a direct link back to `/coach`, a relevant link to a programme only if its association is verified, and a relevant link to `/contact?action=trial` (or validated coach-specific parameter if supported). Do not attribute made-up quotations to real coaches. Removing claims must not leave empty counters, award galleries, headings, or broken layouts. Use a visually balanced skills/details layout instead.

**15 `/coach-kapil-pratap-singh`**
- Title: `Kapil Pratap Singh | Head Coach | Young Star Cricket Academy`
- Meta: `View Kapil Pratap Singh's coaching profile at Young Star Cricket Academy and enquire about current training programmes in Greater Noida.`
- H1: `Kapil Pratap Singh`
- Neutral bio: `Kapil Pratap Singh is featured on the Young Star Cricket Academy coaching team as Head Coach. Contact the academy for current responsibilities, programme guidance and session availability.`
- If a real academy-approved bio exists, enhance this with verified coaching areas; do not keep current unverified ECB, BCCI, NIS or award counts by default.
- Photo alt when verified portrait: `Kapil Pratap Singh, head coach at Young Star Cricket Academy`.

**16 `/coach-rajeev-gupta`**
- Title: `Rajeev Gupta | Senior Cricket Coach | YSCA`
- Meta: `View Rajeev Gupta's coaching profile and contact Young Star Cricket Academy in Greater Noida about current training options.`
- H1: `Rajeev Gupta`
- Neutral bio: `Rajeev Gupta is listed as a senior coach at Young Star Cricket Academy. For current coaching activities, qualifications and programmes, please contact the academy.`
- Remove unsupported official selector and competitive playing achievements unless a written record is approved. Alt: `Rajeev Gupta, senior cricket coach at Young Star Cricket Academy`.

**17 `/coach-suryabhan-singh`**
- Title: `Suryabhan Singh | Cricket & Fitness Coach | YSCA`
- Meta: `Learn about Suryabhan Singh's listed coaching role at Young Star Cricket Academy and enquire about current cricket and fitness sessions.`
- H1: `Suryabhan Singh`
- Neutral bio: `Suryabhan Singh is featured as a cricket and fitness-focused coach at Young Star Cricket Academy. Contact the academy about current responsibilities and session availability.`
- Remove unsupported ICC/Rajasthan Royals or strength credential claims. Alt: `Suryabhan Singh, cricket and fitness coach at Young Star Cricket Academy`.

**18 `/coach-manoj-gupta`**
- Title: `Manoj Gupta | Cricket Coach | Young Star Cricket Academy`
- Meta: `Meet Manoj Gupta, featured on the coaching team at Young Star Cricket Academy. Enquire about the academy's current cricket programmes.`
- H1: `Manoj Gupta`
- Neutral bio: `Manoj Gupta is listed as a cricket coach at Young Star Cricket Academy. The academy can confirm his current role, teaching focus and coaching availability.`
- Remove unverified university/state representation and credentials. Alt: `Manoj Gupta, cricket coach at Young Star Cricket Academy`.

**19 `/coach-nayan-bhardwaj`**
- Title: `Nayan Bhardwaj | Cricket Coach | YSCA Greater Noida`
- Meta: `Explore Nayan Bhardwaj's coaching profile at Young Star Cricket Academy and ask about current training and programme availability.`
- H1: `Nayan Bhardwaj`
- Neutral bio: `Nayan Bhardwaj is featured on the Young Star Cricket Academy coaching team. Contact the academy to confirm his current coaching role and available sessions.`
- Remove unverified Ranji Trophy probable/representative awards and certificates. Alt: `Nayan Bhardwaj, cricket coach at Young Star Cricket Academy`.

**20 `/coach-lokesh-bharti`**
- Title: `Lokesh Bharti | Cricket Coach | Young Star Cricket Academy`
- Meta: `Meet Lokesh Bharti from Young Star Cricket Academy's listed coaching team in Greater Noida and ask about current coaching options.`
- H1: `Lokesh Bharti`
- Neutral bio: `Lokesh Bharti is listed as a cricket coach at Young Star Cricket Academy. Contact admissions to ask about his current responsibilities, qualifications and sessions.`
- Do not display `ICC Certified` or Binoo Mankad records without proof. Alt: `Lokesh Bharti, cricket coach at Young Star Cricket Academy`.

**21 `/coach-nikhil-yadav`**
- Title: `Nikhil Yadav | Youth Cricket Coach | YSCA`
- Meta: `Learn about Nikhil Yadav's listed youth coaching role at Young Star Cricket Academy in Greater Noida and enquire about suitable programmes.`
- H1: `Nikhil Yadav`
- Neutral bio: `Nikhil Yadav is featured on the academy's coaching team with a youth development focus. Ask the academy about current age groups, training responsibilities and availability.`
- Remove unsupported first-aid/sports psychology credentials and trainee counts. Alt: `Nikhil Yadav, youth cricket coach at Young Star Cricket Academy`.

**Critical coach implementation nuance:** Coach identities and roles above are **as currently published**; treat them as a provisional existing roster, not externally established proof. If one or more coaches are no longer associated, remove from navigation and apply appropriate route strategy only after owner approval. If approved real bios and credentials are available, use those in preference to the generic fallback, but document the evidence source without exposing private materials.

## 4. Structured information in HTML — prescribed content architecture
For every programme/facility page implement: clear H1 and immediate user-value summary; short eligibility/visitor-intent explanation; distinctive H2 sections with meaningful short paragraphs (not generic filler or lists of keywords); a small `What to ask / what to bring / availability` box that does not invent facilities; links to 2–4 relevant pages; single relevant enquiry CTA. Use actual detail rather than arbitrary minimum word counts. Avoid generic repetitive `professional/world-class/elite/premier/champion` labels and copy/paste sales lines.

**Suggested non-fabricated useful microcopy:**
- Beginner: `Ask whether any protective equipment is provided and what a first-time player should bring.`
- Junior: `If the player has trained before, share their age, preferred batting or bowling role and current experience when enquiring.`
- Senior: `Ask how technical feedback and match preparation are handled for the current batch.`
- Net practice: `Confirm the practice surface, whether the session is coached, the required protective gear, and whether slots are available.`
- Hostel: `Confirm room arrangements, supervision, meal provisions, residence rules, costs and any minimum stay before travel.`
- Contact: `Include the player's age and cricket experience so the team can suggest a suitable next step.`

**FAQs (visible HTML) may be added only to pages where they genuinely help visitors.** Do not add FAQ schema across every page hoping for stars or enhancements. For most non-government and non-health sites, Google does not generally show FAQ rich results. Use accessible `<details><summary>` or existing accordion component; never mark hidden/inaccurate content as structured data.

## 5. Images: exact implementation contract across 21 pages
Use real existing academy photographs, not stock/AI-generated athlete photos passed off as authentic. Do not swap an image just to fit a keyword. **First inspect the actual image visually before applying a description.** If it doesn't depict what the proposed alt says, write accurate alt for what is truly shown instead. An `alt` attribute must explain the image, not mechanically repeat keywords.

### Required alt-text mapping by image purpose
- Logo: `Young Star Cricket Academy logo` (if logo is a link to homepage, ensure accessible link name without duplicate reading).
- Homepage hero ONLY IF depicting practice: `Cricket players training at Young Star Cricket Academy in Greater Noida`.
- Group practice photo: `Players practising cricket drills at Young Star Cricket Academy`.
- Batter photo: `Cricket player practising batting technique during training`.
- Bowler photo: `Cricket player practising a bowling delivery at training`.
- Fielding photo: `Cricket players working on catching and fielding drills`.
- Programme image Foundation: `Young cricket beginners learning cricket skills at the academy` **only if it depicts children**; otherwise describe the actual image.
- Junior: `Junior cricket players practising in a coached session` **only if visually accurate**.
- Senior: `Older cricket trainees during a skills or match practice session` **only if visually accurate**.
- Individual coaching: `Player receiving individual cricket coaching during practice` **only if visually accurate**.
- Ground: `Cricket practice ground used for coaching at Young Star Cricket Academy` **only if location verified**.
- Nets: `Cricket practice nets at Young Star Cricket Academy in Greater Noida` **only if actual photographed venue**.
- Hostel: `Accommodation room featured on the academy hostel page` **only if actual room**; avoid implying YSCA ownership if unverified.
- Gym: `Cricket conditioning equipment featured at Young Star Cricket Academy` **only if actual equipment**.
- Gallery: short distinct action/location alt for **each** photograph, not one alt copied to all images.
- Seven coach portrait images: use exact person-specific alt text in section 3B, only when image matches the named person.
- Decorative rules, shapes, corner ornaments, line artwork, repeated background illustrations: `alt=""` and/or `aria-hidden="true"`, never `alt="line"` or keyword-stuffed filler.

### Image technical controls
- Use real `width`/`height` or stable aspect ratios to prevent CLS.
- Responsive `srcset`/`sizes` where appropriate; modern WebP/AVIF when available while preserving original quality.
- LCP hero image: eager/high priority; do **not** `loading="lazy"` the LCP image.
- Below-the-fold images: `loading="lazy"`, `decoding="async"` where appropriate.
- Descriptive filenames for newly introduced assets only. Do NOT break old paths or image imports just to rename files.
- Ensure `<picture>` sources and alt belong to the actual meaningful `<img>`.
- Check social-sharing featured images are appropriate and accessible. Do not create bogus VideoObject markup for a decorative placeholder or an unplayable video.

## 6. Internal linking architecture and navigation (implement exactly)
- Header / logo → `/`.
- Homepage → `/our-programs`, relevant 4 programme pages, `/cricket-training`, `/net-practice`, `/coach`, `/contact`.
- `/our-programs` → all four distinct programmes, `/hostel`, `/gym`, `/contact`.
- Foundation → Junior, main programmes, contact.
- Junior → Foundation, Senior, net practice, contact.
- Senior → Junior, one-to-one, training, contact.
- Professional → coach directory, training, contact.
- Training → programs, net practice, gym, contact.
- Nets → training, relevant programmes, contact.
- Hostel → programmes, contact; Gym → training, programmes, contact.
- Coach directory → all seven profile pages, relevant programmes, contact.
- Each coach profile → coach directory, contact; optionally relevant programme if genuinely associated.
- Gallery → training, net practice, programmes, contact.
- Contact → programmes, Google Maps directions link.
Use crawlable `<a href>` for primary links, meaningful anchor text (not 50 generic `Learn More` duplicates), and accessible labels on repeated CTAs. Don't hide critical programme links behind JS-only filter actions. Desktop/mobile dropdown labels must match the actual programme age guides. Keep active-page nav, mobile controls, and breadcrumbs accurate. Do not create a generic `/facilities` hub that does not exist; link Facilities directly to `/cricket-training` or use a valid section menu.

## 7. Technical SEO and Cloudflare implementation — preserve working state
- **Existing verified success:** production homepage, `/our-programs`, robots.txt, sitemap.xml were owner-tested as HTTP 200 without `X-Robots-Tag: noindex`. Do not undo this. Staging `ysca.pages.dev` must continue to respond with `X-Robots-Tag: noindex, nofollow`.
- Respect two Cloudflare Pages projects: production `ysca-live` from `main`; staging `ysca` from `seo-optimization`. `ysca-live.pages.dev` is an auto-generated default host and must not be indexed; place sensible noindex/redirect handling on it **without adding a production header to the live custom domain**. Branch preview hostnames also noindex. Validate hostname-based middleware behavior with mocks and real headers after authorized deployment.
- One unique `<title>`, one descriptive meta description, one unique H1, one absolute self-canonical on each of 21 pages. Canonicals have `https://youngstarcricketacademy.com{path}` with no query parameters or `pages.dev` host.
- `/robots.txt`: keep `User-agent: *`, `Allow: /`, site exclusions if needed, and `Sitemap: https://youngstarcricketacademy.com/sitemap.xml`; do not gratuitously change permissions to AI crawlers. Do not think robots.txt can authenticate an admin route.
- `/sitemap.xml`: exactly the intended **21 canonical URLs** (plus any new genuinely valuable URL only if separately approved), valid XML, avoid query/preview/old-domain URLs; `lastmod` only when meaningful real modifications occur.
- No phantom indexable pages generated by a SPA fallback; unknown paths return a real 404 status, not HTTP 200 with homepage content.
- Consistent HTTPS, `www`→apex and other preferred-host redirects when supported; prevent redirect chains.
- Gallery `?album=...`, trial `?action=trial`, programme prefill parameters canonicalize to base page; preserve user interaction. Do not create alternate indexable query URLs.
- Meta OG: `og:type=website` for site overview, specific og:title/description/url/image per main page; appropriate Twitter card; use existing shareable site images. Add an accessible favicon and site name if missing.
- Functional tests: contact form goes to `/api/contact`, server validates, KV binding is `CONTACTS_KV`, authorized test storage; do not mutate production storage during automated unit tests. Add email notifications only with separate owner approval, not in this SEO release.
- Maintain existing GA4/GTM/consent flows; do not add duplicate trackers, auto-consent, or fake events. If tracking ready, implement semantic GA4 event hooks for `contact_form_submit_success`, `trial_enquiry_click`, `whatsapp_click`, `call_click` **only if existing tracking implementation can support them without duplicates and respecting consent**; otherwise document as external access need.

## 8. JSON-LD entity graph — precise decision
Implement schema because it describes the business accurately, not to game rich results. On home, use **one** coherent `@graph` with `Organization` and, only if the published site has approved correct ground address details, `LocalBusiness` (with a proper SportsActivityLocation subtype if valid) describing the academy's real location; website `WebSite`, homepage `WebPage`. Reference same business `@id` elsewhere without duplicating contradictory entities. Fields allowed only if actually known: name `Young Star Cricket Academy`, URL `https://youngstarcricketacademy.com/`, genuine logo URL, page URL, and the currently site-published map URL/location pending approval. Telephone, full PostalAddress, geo coordinates, hours, sameAs, email, services etc must be included **only after source verification**.

- On internal pages: `WebPage`/`AboutPage`/`ContactPage` where appropriate, `BreadcrumbList` reflecting real hierarchy, referencing main Organization `@id`.
- Program pages: only add `Service` descriptions if the actual programme is genuinely offered; no invented `Offer` price/availability, AggregateRating, Review, Course details, duration, start dates or `Event`.
- Coach profiles: `Person` markup for real featured people using correct name, actual portrait URL and role if confirmed; `worksFor` only if approved. No fake `sameAs`, credentials or awards.
- Photo Gallery: `ImageObject` optional only when real image metadata is known and helpful; no fake `VideoObject` or structured carousel claims.
- Visible FAQs: accessible and helpful, but no assumption that `FAQPage` produces rich results.
- Run JSON parser and Google Rich Results Test on representative URLs; valid JSON alone is not rich-result eligibility.

## 9. Trust-building and local conversion elements
- Include readable, accurate academy name and **Malakpur / Greater Noida** location in hero/footer/contact where relevant; not every H2.
- Prominent `Call`, `WhatsApp`, `Get Directions`, `Send Enquiry` actions, but do not invent message delivery or instant bookings.
- Use true image captions, programme overview, coach information and admission steps to build trust. Avoid anonymous fabricated testimonials, claims of affiliations, and misleading certification icons.
- Add a minimal privacy notice near the contact form linked to an existing valid privacy policy, if such a policy actually exists. Don't create a legal commitment without approved language.
- A Google Business Profile is a separate external account task; do NOT claim to have updated it. Prepare a succinct `SEO-GBP-HANDOFF.md` with implementable owner actions: verify **exact academy name and address/pin**, correct hours/phone/website, select relevant category, upload original actual ground/team photos, request authentic voluntary reviews without incentives, and handle duplicate/old addresses carefully.
- The directory listing showing Delta 2 could be another organisation or an outdated listing. Do not change other entities without ownership proof.
- Prepare a public-facing brochure/ground visit FAQ only from verified content; do not invent customer quotes or price lists.

## 10. Page performance, accessibility, and UX changes to implement
- Preserve existing layout, but fix actual CLS through image sizing/font fallback; load hero image optimally; defer noncritical JavaScript; use appropriate caching and lazy loading without breaking gallery and forms.
- Semantics: correct H1–H2–H3 hierarchy, actual button controls for toggles, keyboard-operable dropdowns, visible focus, form labels tied to inputs, validation messages with accessible live regions, touch hit areas.
- Color contrast for text and controls, distinct link labels; skip-to-content link if no equivalent; meaningful landmarks.
- Navigation and gallery still function without breakage on 360/390/768/1024/1440px viewports. Avoid disruptive visual redesign or arbitrary new animation libraries.
- Use actual field or lab results when available; no fabricated 95+ score. CWV targets: LCP <=2.5s, INP <=200ms, CLS <=0.1 at 75th percentile on mobile (targets, not measured current claims). Don't introduce broken analytics to chase scores.

## 11. Implementation order, exact acceptance criteria and handoff
### Work order (perform all non-blocked items, no questions or research assignment)
1. Branch safely from current `main`, preserve existing good Cloudflare middleware / contact API and all designs.
2. Apply P0 truthful-content cleanup site-wide (including hidden filter templates, nav, cards and seven coach pages).
3. Apply specified 21-page title/description/H1, unique lead intros, H2/content architecture and internal links. **Do not needlessly replace good, verified, substantive sections**; integrate the specified improvements into existing design.
4. Implement actual-image-matched alt/captions and media optimization.
5. Implement correct canonical, metadata, OG, breadcrumbs, coherent JSON-LD, sitemap, noindex split; ensure no duplicate tags or entities.
6. Implement form/UX/accessibility improvements without changing submission storage or business process.
7. Create old-domain redirect map/config and GBP handoff, only actually applying old-domain redirects if separately authorized access exists.
8. Run QA across all 21 routes, mobile/desktop and functional flows; prepare changes for review **without pushing/merging/deploying**.

### Automated pass/fail gates
- All 21 expected URLs map to 21 HTML routes, no broken 404s, no duplicate titles/descriptions/canonicals/H1s.
- No unsupported claims in public or hidden UI text; grep known risky phrases, numeric counters, `Verified Credential` labels, hostel meals, trial `free` promises, and U-age discrepancies.
- All decorative images have empty alt; informative images have accurate non-repetitive alt (validated against image content).
- Internal link crawler finds no broken asset or internal anchor; all primary links are real `<a href>`.
- Production pages remain indexable and canonical to `.com`; staging/preview noindex; no static header rule leaks to production. Run mocked host tests and provide exact `curl.exe -I` commands for real release verification.
- Valid JSON-LD, no fake review stars, affiliations, prices, business hours, or certificates.
- Contact Function unit tests and `/contact?action=trial` behavior pass; no prod KV test without explicit approval; prove mock success and 503/error handling.
- Mobile nav/filter/album interactions and accessibility tests pass; screenshot visual regression evidence when browser tool is available. Never mark unavailable real-browser tests as passed.
- No invented monthly volumes, ranking position, SEO score, PageSpeed result, business counts or coaching credentials.

### Return ONLY these concrete deliverables
1. `SEO-IMPLEMENTATION-CHANGELOG.md` — concise mapping of 21 routes and what changed.
2. `SEO-PAGE-METADATA.csv` — page URL, primary cluster, final title, meta, H1, canonical, schema type, internal links.
3. `SEO-IMAGE-ALT-AUDIT.csv` — exact file/path, page, visible subject, final alt, decorative yes/no, image dimensions/optimization.
4. `SEO-OWNER-FACTS.md` — unresolved facts with the safe fallback already applied; no blocking questions while coding.
5. `SEO-OLD-DOMAIN-REDIRECT-MAP.md` — 21 path mappings, config and permission blocker.
6. `SEO-GBP-HANDOFF.md` — settings/actions the owner must make externally, without claiming these were changed.
7. `SEO-RELEASE-QA.md` — executed tests, outputs, screenshots/commands, pass/fail/blockers, before-after proof.
8. A concise final message: working branch, files changed, unresolved external items, explicit `NOT DEPLOYED — awaiting owner approval`.

**Do not conduct new keyword/competitor research or generate another strategy report. IMPLEMENT the specific researched instructions here.**
