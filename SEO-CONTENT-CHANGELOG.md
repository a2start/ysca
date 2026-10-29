# SEO content changelog

Branch: `seo-optimization`  
Research reference: `MD/deep-research-report.md` and `SEO-IMPLEMENTATION-PLAN.md`

## Implemented changes

| URL | Previous issue | Revision | Intent / terms | Reason and reference |
| --- | --- | --- | --- | --- |
| `/` | Metadata used promotional facility claims not yet confirmed. | Title retained; description, Open Graph and Twitter text now describe coaching programmes, facilities and admissions enquiries without promising specific equipment or results. | Local discovery; cricket academy and cricket coaching in Greater Noida. | Report’s trust/consistency finding; [Google people-first guidance](https://developers.google.com/search/docs/fundamentals/creating-helpful-content). |
| `/about` | Description asserted certifications and facilities without an approved fact sheet. | Description now introduces the academy approach, programmes and admissions enquiry. | Academy trust and cricket training in Greater Noida. | Avoids unsupported detail while preserving the page purpose. |
| `/cricket-training` | Description asserted specific ground/equipment features. | Description now invites visitors to explore the training environment and enquire about availability. | Cricket training facilities. | Facilities require owner confirmation. |
| `/net-practice` | Description/title promised named net features and a bowling machine. | Description now covers net-practice enquiry and availability; title targets cricket net practice in Greater Noida without the unverified equipment claim. | Cricket net practice Greater Noida. | Keeps a distinct facility intent. |
| `/hostel` | Description promised meals, supervision and daily coaching. | Description now asks visitors to enquire about eligibility, availability and residential accommodation. | Cricket academy with hostel. | Hostel inclusions must be confirmed. |
| `/gym` | Description promised performance and injury outcomes. | Description now introduces fitness/conditioning and directs visitors to ask about suitable sessions. | Cricket fitness training. | Avoids medical and performance guarantees. |
| `/program-senior-performance` | Description implied district/state outcome path. | Description focuses on ages 15–19, skills, match awareness and appropriate next steps. | Advanced cricket coaching. | No selection/result claim. |
| `/program-professional-coaching` | Description named equipment and technical interventions not verified in the fact sheet. | Description now explains one-to-one coaching as an option available by enquiry. | One-to-one cricket coaching. | Keeps a clear commercial intent without overpromising. |
| `/contact` | Baseline form pointed to missing PHP; existing trial/query URLs were not safely applied. Copy guaranteed a response/trial. | Form submits to `/api/contact`, supports safe known programme/trial prefills, has accessible success/error feedback and asks the academy to confirm timings, fees and trial availability. | Admissions, trial-session and programme enquiries. | The report identifies the form as release-critical. |

## Kept intentionally unchanged

- Page titles, canonical URLs, programme age labels, layouts, navigation, galleries, filters, animations and CTA structure remain intact.
- Coach bios, programme/facility body copy and structured-data details were not expanded because the report identifies factual inconsistencies and no owner-approved fact sheet is present.
- No city doorway pages, keyword-density edits, fabricated FAQs, reviews, outcomes, credentials, fees or service-area claims were introduced.

## Content-level implementation — 29 October 2026

| URL | Previous copy issue | Revised copy | Intent and reason |
| --- | --- | --- | --- |
| `/` | Hero and programme introduction promised certified coaches, limited seats and competitive outcomes. | Introduces age-based programmes and asks visitors to contact the academy about a suitable current batch. | Broad local discovery without unverified proof points. |
| `/about` | Opening copy asserted professional backgrounds and match exposure. | Opening copy identifies the Greater Noida location and directs visitors to the programme pages and a current-enquiry route. | Trust/about intent; avoids unsupported credentials. |
| `/our-programs` | Intro referred to selection trials, named credentials and guaranteed programme components. | Explains comparison by age/focus and directs visitors to confirm session structure, timing, fees and availability. | Programme-comparison intent. |
| `/cricket-training` | Hero and introduction asserted BCCI-standard facilities, named equipment and coaching qualifications. | Explains the page’s training-environment purpose and asks visitors to confirm format, equipment and facilities. | Cricket training facilities intent. |
| `/net-practice` | Hero and introduction asserted a net count, surfaces, machine speeds and floodlights. | H1 is now “Cricket Net Practice in Greater Noida”; copy explains how to enquire about current session options. | Distinct net-practice intent. |
| `/hostel` | Above-the-fold copy promised safety, meals, supervision, location and year-round availability. | Explains the residential-enquiry purpose and tells families which current details to ask about. | Residential accommodation intent. |
| `/gym` | Opening copy guaranteed daily access, integrated sessions and performance effects. | Explains age-appropriate fitness/conditioning and directs visitors to confirm suitability and supervision. | Cricket fitness enquiry intent. |
| `/contact` | Promised free trials, response times, hostel inclusions, equipment and selection-related tracking. | FAQs and contact copy now ask the academy to confirm availability and current arrangements. | Admissions/trial enquiry intent and conversion accuracy. |
| `/program-junior-development` | Implied a defined selection pathway. | Uses progression guidance instead of selection claims. | Junior cricket training. |
| `/program-senior-performance` | Promised state/national pathways, selectors and named credentials. | Explains advanced skill development and explicitly states that no team/trial selection is implied. | Advanced cricket coaching. |
| `/program-professional-coaching` | Promised video/sensor/machine equipment and technical results. | Defines one-to-one coaching as an enquiry-led option with no promised outcome. | Private cricket coaching. |
| `/coach` | Hero and meta claimed specific credentials and competitive history. | Presents profiles as stated roles/areas of focus and asks visitors to confirm current details. | Coach/faculty evaluation intent. |

## Research interpretation

The target phrases are qualitative intent themes, not volume-verified metrics. Greater Noida is the primary location. Noida may be mentioned only as a nearby travel catchment and not as a YSCA location until a branch/service-area statement is approved. Google's guidance supports useful, people-first content and consistent canonical/sitemap signals rather than keyword repetition: [Search Essentials](https://developers.google.com/search/docs/essentials), [canonicalization](https://developers.google.com/search/docs/crawling-indexing/canonicalization), and [Keyword Planner limitations](https://support.google.com/google-ads/answer/6325025?hl=en).

## Continued implementation — `seo-final-implementation`

| URL / file | Previous issue | Revision | Reason |
| --- | --- | --- | --- |
| `/` | Fixed coach ratios, selection pathways, unverified facilities and free-trial claims. | Neutral programme, match-practice and trial-enquiry wording. | Avoid unsupported outcomes and facility promises. |
| `/our-programs` | Selection nominations, coach credentials, ratio, hostel and meal claims. | Enquiry-led programme and accommodation copy. | Visitors receive useful next steps without invented facts. |
| Facilities and programme aliases | Fixed schedules, equipment specifications, meal counts, supervision and performance claims. | Current availability and eligibility guidance. | Facility and boarding facts remain owner-confirmation items. |
| Coach directory and profiles | Experience totals, certifications, affiliations, selections and achievements were stated as fact. | Neutral roles, confirmed-profile enquiry route and updated unique metadata. | Coach credentials require owner evidence before publication. |
| `/about`, `/cricket-training`, `/hostel`, `/gym`, `/coach`, `/photo-gallery` | Generic or mismatched H1/title/description. | Distinct intent-led metadata and H1s. | Improves relevance without keyword repetition. |
| `functions/_middleware.js` | Only the `ysca` Pages host family was protected from indexing. | Added `ysca-live.pages.dev` and branch-preview host protection; custom domains are left indexable. | Keeps preview noindex separate from production. |
| `SEO-OWNER-FACTS.md`, `SEO-PAGE-METADATA.csv`, `SEO-IMAGE-ALT-AUDIT.csv` | No consolidated evidence/implementation record. | Added owner-fact, page metadata and reviewed image-alt records. | Supports safe future updates and release review. |

## Consistency pass — `seo-final-implementation`

| URL / file group | Previous content | Revised content | Reason |
| --- | --- | --- | --- |
| All public desktop/mobile navigation templates | Used conflicting U-12, U-16 and U-19+ labels. | Uses Foundation (ages 6–10), Junior (ages 11–14) and Senior (ages 15–19), matching the programme pages. | Keeps programme eligibility consistent. |
| `/about` | Included unverified net counts, programme totals, match-exposure percentages and a promised one-day free trial. | Uses enquiry-led wording for current facilities, match practice and trial availability. | Removes unsupported numerical and availability claims. |
| `/` and `/our-programs` | Used non-descriptive alt text for illustrative hostel/gym images; some accommodation copy implied fixed meals and arrangements. | Uses accurate illustrative alt text and directs visitors to confirm current accommodation and meal arrangements. | Image accessibility and fact accuracy. |
| `/coach` | CTA promised a free trial. | CTA asks visitors to enquire about a trial session. | Trial availability and pricing require confirmation. |
| All 21 canonical sitemap pages | Footer and Contact-page social controls linked to generic social-platform homepages. | Removed placeholder social links while retaining verified WhatsApp contact access. | Prevents visitors and crawlers from being sent to unrelated profiles. |

## Academy content enrichment — October 2026

| URL / file group | Previous issue | Revision | Reason |
| --- | --- | --- | --- |
| Homepage, About and Programs | Repeated availability prompts and unsupported training/facility language. | Added age-pathway, skill-development, coaching-directory, facilities-navigation and admissions guidance. | Gives parents useful next steps without inventing operations. |
| Foundation, Junior, Senior and one-to-one coaching pages | Legacy claims about equipment, schedules, selection, trials and outcomes. | Added practical educational guides for the relevant player stage and removed unsupported operational promises. | Separates cricket education from unverified academy services. |
| Cricket Training, Net Practice and Gym | Thin enquiry copy and unsupported equipment/performance claims. | Added practical batting, bowling, fielding, wicketkeeping, preparation and age-appropriate fitness guidance. | Helps visitors understand the subject without claiming specific facilities. |
| Hostel and Contact | Repetitive confirmation panels. | Added parent-focused residential-decision and admissions-enquiry guidance; clarified programme choices and what to include in an enquiry. | Improves conversion clarity without publishing unverified hostel arrangements. |
| Coach directory and indexed profiles | Generic credential disclaimers and unsupported biographies/trial claims. | Retained published names/Head Coach role only, linked to programme information and removed unsupported credentials and free-trial claims. | Keeps the directory factual. |
