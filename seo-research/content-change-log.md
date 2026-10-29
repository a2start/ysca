# Content change log

Date: 29 October 2026  
Branch: `seo-optimization`  
Baseline commit: `0fb94dc`

## Contact and admissions — `contact.html`

| Item | Before | After | Reason |
| --- | --- | --- | --- |
| Form action | `contact-submit.php` in the committed baseline | `/api/contact` | Cloudflare Pages does not execute the missing PHP endpoint. |
| Enquiry copy | Promised a 24-hour response and a complimentary one-day assessment | Says the academy can confirm batches, timings, fees and trial availability | Avoids unverified service promises. |
| Query parameters | Program and trial links did not populate the form | Allowlisted `program`, recognised subject keywords and `action=trial` prefill a safe subject | Keeps existing links useful without injecting arbitrary query-string text. |
| Feedback | No client-side status state | Accessible sending, success and error feedback | Makes submission state understandable without changing the design. |
| Inputs | No explicit maximum lengths or autocomplete hints | Adds sensible maximum lengths, name/email/tel autocomplete and phone input mode | Matches server validation and improves mobile entry. |

## Metadata safety pass — `index.html`, `about.html`, `cricket-training.html`, `net-practice.html`, `hostel.html`, `gym.html`, `program-senior-performance.html`, `program-professional-coaching.html`

Descriptions and, on the home page, sharing copy were revised to describe the page purpose and invite an enquiry. Unverified claims about certifications, performance outcomes, bowling machines, floodlights, hostel inclusions, supervision, injury benefits and response/trial guarantees were removed from this metadata. The underlying pages retain their current layout and content pending owner confirmation of material claims.

## Content review outcome

All 25 public HTML documents were inventoried and their titles, descriptions, canonicals, H1s, H2/H3 outlines, navigation targets, scripts/stylesheets, image alt coverage and forms were reviewed. Existing page-specific titles, descriptions, canonical URLs and keyword mapping were retained because they already distinguish the academy, program, facility, coach and contact intents.

No broad copy rewrite was made. The source contains many material claims about certifications, results, equipment, ratios, schedules, trials, hostel services and fitness outcomes that conflict across pages or lack independent owner evidence. Rewriting those claims with invented substitutes would breach the task brief. They are recorded as owner-confirmation items in `research-notes.md` and `technical-qa.md`.
