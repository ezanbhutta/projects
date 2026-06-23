# IANEX Global Services — Website (v5 "Modern Minimal")

A modern, motion-driven website concept for **IANEX Global Services**. v5 is a full
rebuild focused on contemporary UI/UX: a floating glass navbar, a cinematic full-bleed
hero, a bento services grid, smooth scrolling, and a clean cobalt-on-off-white system.

## View it
- **`ianex-global-website.html`** — single self-contained responsive file (all pages, CSS,
  JS, and images inlined). Open in any browser. Scroll to see the motion; resize to see it adapt.
- **`ianex-website-source.zip`** — editable multi-page source for a Wix Studio / Figma dev.
- **`IANEX-Global-Website-Design.pdf`** — flat proposal to send to the client.

## What's modern about it
- **Floating glass navbar** — a rounded, blurred pill that floats over the page with an
  active-state highlight and a compact CTA; collapses to a glass dropdown on mobile.
- **Cinematic full-bleed hero** — a striking aerial port image with a navy scrim, large
  Sora headline, and a glass stats bar. (No more generic stock.)
- **Bento services grid** — mixed-size tiles (image feature tile + text tiles + a dark stat
  tile) with a pointer-following spotlight on hover.
- **Smooth scrolling** via [Lenis](https://github.com/darkroomengineering/lenis), plus
  scroll reveals, count-ups, a capability marquee, hero parallax, and hover micro-interactions.
- **Modern type** — Sora (display) + Inter (text). Pill buttons, rounded cards, soft depth.

## Design tokens
| Role | Value |
|------|-------|
| Background | Off-white `#F4F5F7` / Surface `#FFFFFF` |
| Text | Ink `#0D0F14` |
| Dark sections (approach, footer, CTA, booking) | `#0B1220` |
| Accent | Cobalt `#2F54EB` (tint `#EAF0FF`) |

## Imagery
Hero — aerial container terminal (`hero.jpg`). CTA — cinematic road/storm (`cta-bg.jpg`).
Services — container yard, glass towers, boardroom. Founder portrait — `founder.jpg`
(swap for Ingrid's real photo).

## To finalize with the client
Logo, Ingrid's photo, Calendly URL, email / phone, tagline lock.

## Build
```bash
npm install
node build-singlefile.mjs   # -> ianex-global-website.html
node build-pdf.mjs          # -> IANEX-Global-Website-Design.pdf
```
