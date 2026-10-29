# Visual regression report

## Capture matrix

- Production before-state: `artifacts/visual/before-production/`
- Local after-state: `artifacts/visual/after-local/`
- Routes: all 21 canonical sitemap pages.
- Widths: 320, 375, 390, 768, 1024, 1280, 1440 and 1920 pixels.
- Capture method: local headless Chromium, full-page PNG, device scale factor 1.

## Production baseline result

The before-state capture completed with 168 screenshots. All route loads returned a successful 2xx/3xx response and the viewport measurement detected zero horizontal-overflow cases.

## Manual review

Matched 390px homepage captures were inspected. Header placement, hero/card flow, section ordering and footer composition remain consistent after the token layer. The global layer changes font defaults only where page modules do not already choose their own font, and adds keyboard-only focus treatments.

## Capture limitation

Some below-the-fold images appear as lazy-load placeholders in full-page automated captures because Chromium does not naturally scroll each section into view before the screenshot. This is a capture-method limitation, not treated as an image failure. Interactive browser QA with scrolling remains a release gate.

## Follow-up checks

- Confirm desktop/mobile menus, program filter, gallery/lightbox, accordions, video popup and form states in an interactive browser.
- Re-run captures after any future component refactor; compare by matched route and viewport, then inspect changed regions rather than relying on a numerical diff alone.
