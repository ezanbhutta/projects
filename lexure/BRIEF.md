# LEXURE — Creative & Motion Brief

> The design prompt behind the site. This is the "vibe document" that every layout,
> type, and animation decision answers to.

## 1. The one-line prompt

**A cinematic, editorial landing experience for a private luxury real-estate house —
dark, warm, and architectural; where photography expands and breathes on scroll, type
behaves like a magazine cover, and every motion feels expensive and unhurried.**

Reference feeling: *Aman × Sotheby's International Realty × a print architecture journal.*
Restraint over noise. Confidence over decoration.

## 2. Brand

- **Name:** LEXURE — a coined word between *lex* (law / order) and *luxe* (luxury).
  Positioning: architecture as legacy, homes for people who notice everything.
- **Voice:** quiet authority. Short, declarative. Never salesy. "By invitation."
- **Tagline system:** *Homes for the few who notice everything.* / *Where architecture becomes legacy.*

## 3. Aesthetic direction

Dark-first, warm-neutral, editorial luxury. Not "tech dark mode" — closer to a dim
gallery at dusk: warm ink, bone-white type, a single champagne-bronze accent used
sparingly like brass hardware.

## 4. Palette (CSS variables)

| Token          | Value                       | Use                                  |
|----------------|-----------------------------|--------------------------------------|
| `--ink`        | `#0e0d0b`                   | Base background (warm near-black)    |
| `--ink-2`      | `#15130f`                   | Raised sections                      |
| `--bone`       | `#f3ede1`                   | Primary text / ivory                 |
| `--bone-dim`   | `rgba(243,237,225,.58)`     | Secondary text                       |
| `--champagne`  | `#c9a15e`                   | Accent (brass/bronze)                |
| `--champagne-2`| `#e6c78d`                   | Accent highlight / gradient stop     |
| `--line`       | `rgba(243,237,225,.14)`     | Hairlines, dividers                  |

Dominant ink + bone, with champagne as the *only* chromatic accent. No second hue.

## 5. Typography

- **Display — Fraunces** (variable, high optical contrast, Didone-adjacent serif).
  Used large, tight leading, for headlines, pull-quotes, and stat numerals. This is the
  "magazine cover" voice.
- **UI / Body — Archivo** (variable grotesque). Eyebrows in `UPPERCASE` with wide
  tracking (`.28em`), body at comfortable measure, tabular numerals for specs.
- Numeric specs / coordinates rendered in Archivo with tracking to read like a spec sheet
  (e.g. `25.7617° N`).

Contrast rule: extreme weights (Fraunces 300/400 vs Archivo 500/600), dramatic size jumps
(3×+), generous negative space.

## 6. Layout system

Long-scroll, single page, twelve movements:

1. **Preloader** — letter-spaced LEXURE reveal, thin progress rule, % counter, curtain wipe.
2. **Header** — wordmark left, minimal nav, "Private Viewing" CTA; transparent → solid on scroll.
3. **Hero** — full-bleed residence photo with Ken-Burns zoom + multi-plane parallax; layered
   headline, floating spec chips, scroll cue.
4. **Ethos** — editorial two-column statement, line-mask text reveal.
5. **Residences** — asymmetric editorial grid of listings; hover/scroll image zoom, mono coordinates.
6. **Signature (image expansion)** — sticky section where one image grows inset → full-bleed
   with a crossfading caption. The centerpiece scroll effect.
7. **Depth scene** — foreground / midground / background parallax planes over a skyline.
8. **By the numbers** — animated counters.
9. **Approach** — services as an interactive editorial list with hover reveal.
10. **Testimonial** — oversized pull-quote.
11. **Invitation** — contact / private-viewing form + details.
12. **Footer** — wordmark, nav, coordinates, fine print.

Grid-breaking: 2/3 + 1/3 splits, overlaps, images bleeding past columns, an infinite marquee strip.

## 7. Motion system

- **Preloader curtain** — brand reveal then vertical wipe.
- **Custom cursor** — small ring, scales & labels on interactive hover (desktop / fine-pointer only).
- **Magnetic buttons** — subtle pull toward cursor.
- **Scroll reveals** — line masks (`overflow:hidden` + `translateY`) and staggered fades via
  IntersectionObserver.
- **Parallax** — rAF + lerp for smoothness; transform/opacity only.
- **Ken-Burns hero zoom** — slow continuous scale, plus scroll-linked scale/translate.
- **Image expansion** — sticky, scroll-progress-driven `clip`/scale/radius.
- **Counters** — eased count-up on view.
- **Marquee** — infinite brass-lettered strip.
- **Header** — hide on scroll-down, reveal on scroll-up, solidify past hero.

Timing: micro-interactions 150–300ms `ease-out`; large reveals ≤900ms with custom cubic-bezier;
exits faster than entrances.

## 8. Non-negotiables

- Respect `prefers-reduced-motion` — disable parallax/zoom/curtain, keep gentle fades.
- WCAG AA contrast; visible focus rings; keyboard-operable nav & form; real `<label>`s.
- No layout shift — images carry explicit aspect ratios; tasteful gradient sits behind every
  photo so nothing ever flashes white or renders broken.
- Fully self-contained static site (no build step) — deployable to any static host or dropped
  into a framework's public directory.
