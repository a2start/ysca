# YSCA design tokens

The shared token layer is [assets/css/ysca-theme.css](assets/css/ysca-theme.css). It loads after the legacy stylesheet on every top-level HTML template. It is additive: existing page modules and their inline styles remain responsible for specialised layouts.

## Semantic tokens

| Role | Token | Value | Existing source relationship |
| --- | --- | --- | --- |
| Primary dark surface | `--ysca-color-navy-950` | `#07162c` | Existing navigation and overlay navy. |
| Primary brand navy | `--ysca-color-navy-900` | `#0b1747` | Existing headings and branded modules. |
| Accent gold | `--ysca-color-gold-500` | `#fea630` | Existing gold highlights. |
| Accent hover | `--ysca-color-gold-hover` | `#e89903` | Existing gold hover shade. |
| Accent foreground | `--ysca-color-on-accent` | navy 950 | Prevents regular white text on gold. |
| Surface / border | `--ysca-color-surface`, `--ysca-color-border` | `#f8fafc`, `#e2e8f0` | Existing light cards and dividers. |
| Body / muted text | `--ysca-color-text`, `--ysca-color-text-muted` | `#1c1d1e`, `#475569` | Existing readable neutral text. |
| Heading font | `--ysca-font-heading` | Philosopher with serif fallback | Explicit replacement for the missing legacy `--heading-font`. |
| Body/UI font | `--ysca-font-body` | Plus Jakarta Sans with Arial fallback | Existing primary UI font; pages deliberately using DM Sans can override it locally. |

## Compatibility aliases

The theme retains `--primary-color`, `--heading-color`, `--body-font`, `--heading-font`, `--text-color`, `--border-color`, `--gray-color`, and `--white-color`. This makes the legacy stylesheet consume semantic values without a risky mass rewrite.

## Deliberate exceptions

- Page-scoped Contact, programme and coach modules retain their local variables where they are part of the established composition.
- Status colors, photo overlays, gradients, third-party plugin styles, illustrated asset colors and JavaScript-driven inline styles are not normalised automatically.
- The existing `overflow-x` and `inline-block` global legacy rules remain unchanged; viewport captures are used to identify actual defects before altering them.

## Shared accessibility primitives

- Keyboard focus uses a gold outline with a navy halo through `:focus-visible`; mouse and touch interactions remain visually unchanged.
- `prefers-reduced-motion` shortens non-essential motion without removing interaction functionality.
- `ysca-ui-button`, `ysca-ui-button--accent`, and `ysca-ui-card` are opt-in primitives for future shared component refactors. No legacy component is force-restyled by them.
