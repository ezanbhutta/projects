# IANEX Global Services. Website Design (v3 "Bright Horizon")

A custom-designed, fully responsive website concept for **IANEX Global Services**, built to
the project SRS and refined through three rounds of design direction. This v3 is a bright,
photographic, premium rebuild informed by 2026 design-trend research (airy neutrals, deep
teal, one warm pop accent).

## View it as a live frontend
- **`ianex-global-website.html`** is a single, self-contained responsive file (all pages,
  CSS, photos, and graphics inlined). Open it in any browser and resize to see it respond.
  The nav switches pages in place and the mobile menu works.
- **`ianex-website-source.zip`** is the editable multi-page source for a Wix Studio / Figma
  developer.
- **`IANEX-Global-Website-Design.pdf`** is the flat proposal (cover + every page + a mobile
  preview) to send to the client.

## Design system
- **Bright / airy / luminous.** Light cream, white, and mint backgrounds dominate; navy is
  used only for text. Deep teal is the signature color, with warm terracotta and gold pops.
- **Palette:** teal `#0E7C7B` / `#15A39A` / `#0A5C5A`, terracotta `#E07A57`, gold `#D8AE60`,
  neutrals cream `#FCFBF8` / sand `#F6EFE3` / mint `#ECF4F1`, ink `#17283C`.
- **Type (timeless):** Spectral (clean, low-contrast serif headings) + Inter (body and UI).
- **Layout:** centered hero with a full-bleed port image and floating stats; alternating
  photo splits for the three pillars; centered section heads; teal color-blocks for rhythm.
- **Navbar:** slim teal topbar, gradient accent line, centered nav with underline-grow hover,
  refined teal CTA.

## Imagery (stock placeholders)
Real professional stock photos stand in for final assets: founder portrait (`founder.jpg`),
port / cargo (`hero-port.jpg`, `img-supply.jpg`), strategy meeting (`img-biz.jpg`), and
partnership (`img-partners.jpg`). Swap `founder.jpg` for Ingrid's real headshot when ready.

## Still to finalize with the client
Final logo files, Ingrid's photo, Calendly URL, email / phone, and the tagline lock
("Driving Growth" vs "Driving Global Growth").

## Build commands
```bash
npm install
node build-singlefile.mjs   # -> ianex-global-website.html
node build-pdf.mjs          # -> IANEX-Global-Website-Design.pdf
```
