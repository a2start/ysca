# YSCA design consistency matrix

Status reflects source inspection and local responsive capture. “Canonical” refers to the 21 sitemap URLs; fallback templates are checked separately because they remain reachable source files but are excluded from the sitemap.

| Area / pages | Confirmed issue | Change / current state | Severity |
| --- | --- | --- | --- |
| All 25 top-level templates | No shared semantic token layer; missing legacy heading-font variable. | Every template now loads `ysca-theme.css`; legacy variables map to documented semantic tokens. | P1 fixed |
| All 25 top-level templates | Keyboard focus was suppressed globally. | Visible `:focus-visible` treatment added without changing pointer states. | P1 fixed |
| Canonical programme navigation | Old U-12/U-16/U-19+ labels conflicted with published age bands. | Foundation 6–10, Junior 11–14 and Senior 15–19 are used consistently. | P1 fixed in prior SEO release |
| Canonical footer/contact | Placeholder social URLs could send visitors to unrelated profiles. | Generic social links removed; verified WhatsApp link retained. | P1 fixed in prior SEO release |
| Canonical facility imagery | Stock-style gym and hostel assets were presented as literal facilities. | Relevant alt text identifies these images as illustrative. | P2 fixed in prior SEO release |
| Header/mobile drawer | Multiple legacy styles and fixed positioning. | Preserved pending interactive visual QA; global theme does not override its stacking or geometry. | P1 test pending |
| Program filters | Custom active/no-results state. | Preserved pending browser interaction test. | P1 test pending |
| Gallery/lightbox/video | Third-party plugin styling and JS state. | Preserved pending browser interaction test. | P1 test pending |
| Contact form | Cloudflare Function and validation styling are page-specific. | Preserved; production Function was previously confirmed with a non-sensitive HTTP submission. | P1 visual test pending |
| Legacy aliases | Older duplicate templates contain historical content outside sitemap. | Kept canonicalised/excluded; do not copy claims back into canonical pages without owner evidence. | P2 owner review |
