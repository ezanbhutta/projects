# IANEX Global Services — Website Design

A professionally designed, fully responsive website concept for **IANEX Global Services**,
built to the project SRS (v1.0). The design exists as real, browsable HTML/CSS and is
exported to a single client-ready proposal PDF.

## Deliverable
**`IANEX-Global-Website-Design.pdf`** — 7-page proposal: cover + Home, About, Services,
Contact, Privacy Policy, plus a responsive (mobile) preview. This is the document to share
with the client, and the HTML/CSS converts cleanly to Figma or rebuilds 1:1 in Wix Studio.

## Pages
| File | Page |
|------|------|
| `index.html` | Home — hero, value, services overview, *Who We Serve*, founder teaser, stats, final CTA |
| `about.html` | About — Ingrid Lozana profile + credibility blocks |
| `services.html` | Services — 3 pillars × sub-services, *How We Work* |
| `contact.html` | Contact — Calendly booking block + contact form |
| `privacy.html` | Privacy Policy (template) |
| `cover.html` / `responsive.html` | Proposal cover & mobile showcase (PDF only) |

## Brand system (from SRS §8.1)
- Deep navy `#0F2D52`, secondary navy `#26314A`, clay/terracotta accent `#C08A73`, off-white `#FBF8F4`
- Display: Playfair Display · Body: EB Garamond · UI/labels: Jost — *placeholders pending the official brand kit*
- WCAG AA contrast, 44px min touch targets, 150–300ms transitions, consistent grid

## Placeholders to replace with final assets
- **Logo** (`assets/logo.svg`) — recreation of the in-review wordmark; swap for final files
- **Headshot** (`assets/headshot.svg`) — replace with Ingrid's professional photo
- **Calendly** embed on Contact — drop in the live Discovery Consultation URL
- **Email / phone** — currently `hello@ianexglobal.com` / placeholder number
- **Tagline** — using "Connecting Opportunities. Driving Growth." (confirm vs. "Driving Global Growth")
- **Copy** — refined from the SRS; align with final client text

## Regenerate the PDF
```bash
npm install
node build-pdf.mjs   # → IANEX-Global-Website-Design.pdf
```
