# Young Star Cricket Academy — Baseline Audit & Page Inventory

**Audit Date:** 29 October 2026  
**Working Branch:** `seo-optimization` (Baseline commit: `0fb94dc`)  
**Preview Host:** `https://ysca.pages.dev/` (Cloudflare Pages)  
**Primary Canonical Host:** `https://youngstarcricketacademy.com/`  
**Physical Academy Location:** Delta II, Beside Aster Public School, Greater Noida, Uttar Pradesh 201310, India  
**Official Contact:** Phone / WhatsApp: `+91 99105 43666` | Email: `youngstarcricketacademy123@gmail.com`

---

## 1. Executive Baseline & Environment Inspection

| Asset / Parameter | Measured State | Notes & Observations |
|---|---|---|
| **Hosting Platform** | Cloudflare Pages (`https://ysca.pages.dev/`) & GitHub Pages custom domain (`https://youngstarcricketacademy.com/`). | Static HTML/CSS/JS delivery without server-side PHP execution. |
| **GTM Installation** | `GTM-KH6Q8TL8` container script installed across all 25 public HTML pages. | Verified live with HTTP 200 responses from Google Tag Manager endpoints. |
| **Robots.txt** | Clean directives pointing to `https://youngstarcricketacademy.com/sitemap.xml`. | Disallows private `/is-cms/`, `/admin/`, and `/tmp/`. |
| **Sitemap.xml** | Valid XML containing all 21 indexable `.com` URLs. | Excludes duplicate alias templates and query variants. |
| **Form Endpoint** | `<form id="contact-form" action="contact-submit.php" method="POST">` | **Critical Defect:** `contact-submit.php` does not exist on disk and cannot execute on static hosts. Requires Cloudflare Pages Function. |
| **Inconsistent Academy Statistics** | Home claims **20+ years**, **5,000+ players**, **10+ nets**; About claims **15+ years**, **500+ players**, **12+ nets/pitches**, **8+ coaches**. | Must be reconciled to credible, documented figures. Head Coach Kapil Pratap Singh has 20+ years personal coaching experience; the academy grounds have floodlit turf and astroturf net lanes. |
| **Filter Default on Programs Hub** | `our-programs.html` defaults to filtering "Grassroots" on initial load, hiding the other programs until clicked. | Should display all programs clearly or provide immediate visibility to all 4 pathways. |
| **Gallery Gym State** | Previously 0 photos / typo. Updated with real interior image and link to `/gym`. | Verified intact. |

---

## 2. Public Page Inventory (25 HTML Documents)

| # | Filename | Canonical Target | Primary Target Intent | Current Title |
|---|---|---|---|---|
| 1 | `index.html` | `https://youngstarcricketacademy.com/` | Local Academy Discovery (Greater Noida) | `Cricket Academy in Greater Noida \| Young Star Cricket Academy (YSCA)` |
| 2 | `about.html` | `https://youngstarcricketacademy.com/about` | Brand Legacy & Coaching Philosophy | `About Young Star Cricket Academy \| Cricket Training in Greater Noida` |
| 3 | `our-programs.html` | `https://youngstarcricketacademy.com/our-programs` | Compare Coaching Pathways by Age | `Cricket Coaching Programs by Age \| Young Star Cricket Academy` |
| 4 | `program-foundation-cricket.html` | `https://youngstarcricketacademy.com/program-foundation-cricket` | Beginner & Kids Coaching (Ages 6–10) | `Cricket Coaching for Kids Ages 6–10 \| Foundation Program \| YSCA` |
| 5 | `program-junior-development.html` | `https://youngstarcricketacademy.com/program-junior-development` | Hard-Ball Junior Coaching (Ages 11–14) | `Junior Cricket Coaching Ages 11–14 \| Development Program \| YSCA` |
| 6 | `program-senior-performance.html` | `https://youngstarcricketacademy.com/program-senior-performance` | Competitive & Selection Prep (Ages 15–19) | `Advanced Cricket Coaching Ages 15–19 \| Senior Performance \| YSCA` |
| 7 | `program-professional-coaching.html` | `https://youngstarcricketacademy.com/program-professional-coaching` | 1-on-1 Personalized Coaching | `One-to-One Cricket Coaching in Greater Noida \| Personal Coaching \| YSCA` |
| 8 | `program-detail.html` | Canonical to `/program-foundation-cricket` | Duplicate Template Alias | Canonicalized to Primary URL |
| 9 | `cricket-training.html` | `https://youngstarcricketacademy.com/cricket-training` | Ground & Pitch Infrastructure | `Cricket Training Grounds in Greater Noida \| YSCA Facilities` |
| 10 | `net-practice.html` | `https://youngstarcricketacademy.com/net-practice` | Net Practice Booking & Bowling Machine | `Cricket Net Practice in Greater Noida \| Turf Nets & Bowling Machine \| YSCA` |
| 11 | `hostel.html` | `https://youngstarcricketacademy.com/hostel` | Residential Boarding & Hostel | `Cricket Academy Hostel in Greater Noida \| Residential Training \| YSCA` |
| 12 | `program-cricket-hostel.html` | Canonical to `/hostel` | Duplicate Template Alias | Canonicalized to Primary URL |
| 13 | `gym.html` | `https://youngstarcricketacademy.com/gym` | Cricket Strength & Conditioning | `Cricket Fitness Training & Gym in Greater Noida \| YSCA` |
| 14 | `program-gym-fitness.html` | Canonical to `/gym` | Duplicate Template Alias | Canonicalized to Primary URL |
| 15 | `coach.html` | `https://youngstarcricketacademy.com/coach` | Coaching Faculty Directory | `Cricket Coaches in Greater Noida \| Faculty Directory \| YSCA` |
| 16 | `coach-detail.html` | Canonical to `/coach-kapil-pratap-singh` | Duplicate Template Alias | Canonicalized to Primary URL |
| 17 | `coach-kapil-pratap-singh.html` | `https://youngstarcricketacademy.com/coach-kapil-pratap-singh` | Head Coach Profile | `Kapil Pratap Singh \| Head Coach \| Young Star Cricket Academy` |
| 18 | `coach-rajeev-gupta.html` | `https://youngstarcricketacademy.com/coach-rajeev-gupta` | Senior Coach Profile | `Rajeev Gupta \| Senior Cricket Coach \| Young Star Cricket Academy` |
| 19 | `coach-lokesh-bharti.html` | `https://youngstarcricketacademy.com/coach-lokesh-bharti` | Youth Coach Profile | `Lokesh Bharti \| Certified Cricket Coach \| Young Star Cricket Academy` |
| 20 | `coach-manoj-gupta.html` | `https://youngstarcricketacademy.com/coach-manoj-gupta` | Spin Specialist Coach | `Manoj Gupta \| Cricket Coach \| Young Star Cricket Academy` |
| 21 | `coach-nayan-bhardwaj.html` | `https://youngstarcricketacademy.com/coach-nayan-bhardwaj` | Wicketkeeping Coach | `Nayan Bhardwaj \| High-Performance Coach \| Young Star Cricket Academy` |
| 22 | `coach-nikhil-yadav.html` | `https://youngstarcricketacademy.com/coach-nikhil-yadav` | Fielding & Youth Coach | `Nikhil Yadav \| Youth Coach \| Young Star Cricket Academy` |
| 23 | `coach-suryabhan-singh.html` | `https://youngstarcricketacademy.com/coach-suryabhan-singh` | S&C Fitness Coach | `Suryabhan Singh \| Cricket Fitness Coach \| Young Star Cricket Academy` |
| 24 | `photo-gallery.html` | `https://youngstarcricketacademy.com/photo-gallery` | Visual Academy Proof | `Cricket Training Photos & Match Gallery \| YSCA Greater Noida` |
| 25 | `contact.html` | `https://youngstarcricketacademy.com/contact` | Admissions, Enquiries & Trial Booking | `Contact Young Star Cricket Academy \| Admissions Greater Noida` |

---

## 3. Technical Form Verification

- **Current Form Markup:** `<form id="contact-form" class="contact-form" action="contact-submit.php" method="POST">`
- **Defect:** Submitting this form in a browser results in a `404 Not Found` or raw file download because PHP is unexecuted on static/Cloudflare Pages environments.
- **Solution Strategy:**
  1. Create a serverless Cloudflare Pages Function at `functions/api/contact.js` and `functions/contact-submit.js` to process POST requests, validate fields, verify the honeypot, and return structured JSON or redirect.
  2. Implement client-side asynchronous `fetch()` handler in `contact.html` with explicit status states (loading, success, error) and safe URL parameter prefill (`?action=trial`, `?program=...`).

