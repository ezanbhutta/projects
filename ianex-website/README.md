# IANEX Global Services. Website Design (v4 "Editorial")

A custom, editorial, motion-driven website concept for **IANEX Global Services**. This v4 is a
ground-up rethink aimed at a minimal, creative, studio-grade feel (not a template): type-led
layouts, asymmetry, hairline rules, numbered indices, duotone imagery, and real interaction
built in vanilla JavaScript.

## View it as a live frontend
- **`ianex-global-website.html`** is a single, self-contained responsive file (all pages, CSS,
  JS, and images inlined). Open it in any browser. **Scroll slowly** to see the motion, and
  resize to see it respond.
- **`ianex-website-source.zip`** is the editable multi-page source for a Wix Studio / Figma dev.
- **`IANEX-Global-Website-Design.pdf`** is the flat proposal to send to the client.

## What makes it distinctive (not AI/template)
- **Type as the hero.** Oversized Archivo display with italic Newsreader accents, large negative
  space, asymmetric meta columns. No generic centered hero + cards.
- **Motion (vanilla JS, no framework):** masked line-reveal on scroll, a scroll progress bar,
  count-up stats, a marquee, a hover-to-reveal duotone preview on the service index, and a
  **pinned, scroll-driven "Approach" stepper** that advances Discover, Strategize, Grow as you
  scroll. See `assets/site.js`.
- **Duotone imagery** (navy + ochre) so the stock photos read as intentional and on-brand.
- **Editorial service index** (numbered rows with hover-reveal) instead of cards/splits.

## Palette (navy as accent, not the main color)
| Role | Token |
|------|-------|
| Background (main) | Bone `#F4F0E8` / Paper `#FBF9F4` |
| Text | Ink `#1A1813` |
| Dark anchor (approach, CTA, footer) | Navy `#15273F` |
| Accent (single pop) | Ochre `#BE732A` |
| Secondary text / hairlines | Muted `#857B6B` / Line `#DAD2C2` |

## Type
Archivo (display) + Newsreader italic (accents) + Inter (body / UI).

## Imagery (stock placeholders)
Founder portrait (`founder.jpg`), port/cargo (`hero-port.jpg`, `img-supply.jpg`), strategy
meeting (`img-biz.jpg`), partnership (`img-partners.jpg`). Swap `founder.jpg` for Ingrid's photo.

## Still to finalize with the client
Final logo files, Ingrid's photo, Calendly URL, email / phone, and the tagline lock.

## Build commands
```bash
npm install
node build-singlefile.mjs   # -> ianex-global-website.html
node build-pdf.mjs          # -> IANEX-Global-Website-Design.pdf
```
