# IANEX Global Services — Website Design (v2 "Trade Routes")

A custom-designed, fully responsive website concept for **IANEX Global Services**, built to
the project SRS. The design exists as real, browsable HTML/CSS and exports to a single
client-ready proposal PDF. This v2 is a ground-up redesign for a premium, differentiated feel
— informed by competitor analysis of leading consulting / logistics / supply-chain sites.

## Deliverable
**`IANEX-Global-Website-Design.pdf`** — proposal: cover + Home, About, Services, Contact,
Privacy Policy, plus a responsive (mobile) preview. The clean HTML/CSS converts directly to
Figma or rebuilds 1:1 in Wix Studio.

## What makes it feel custom (not a template)
- **Signature motif:** a global trade-route / globe graphic (ties to the logo ring) woven
  through the hero, service illustrations, and CTAs.
- **Editorial, asymmetric layouts:** oversized index numbers, a service "index" instead of
  equal cards, alternating split pillars, a process timeline, a marquee, and pull-quotes.
- **Color-blocked section rhythm:** Navy → Cream → Teal → Sand → Navy for a designed cadence.
- **Distinctive type system** rather than default web fonts.

## Expanded color system (secondary suite added)
| Role | Tokens |
|------|--------|
| Primary navy | `#081B33` · `#0B2545` · `#0F2D52` · `#163A64` |
| Secondary — ocean teal | `#0C3A40` · `#114A52` · `#155E63` · `#1B7B82` |
| Accent — gold | `#C99B53` · `#E4C684` |
| Accent — terracotta | `#C17A57` · `#D69D7E` |
| Neutrals | Cream `#FBF7F1` · Sand `#F4ECE0` · Sky `#CADAD8` |

## Typography
- **Display:** Fraunces (characterful editorial serif)
- **Body / UI:** Inter
- **Labels / numbers:** Space Grotesk (technical accent)

## Pages
| File | Page |
|------|------|
| `index.html` | Home — hero + route motif, marquee, positioning, service index, *Who We Serve* (teal), stats, founder, process, quote, CTA |
| `about.html` | About — Ingrid Lozana profile, expertise list, quote |
| `services.html` | Services — 3 alternating pillar splits with custom illustrations, process |
| `contact.html` | Contact — Calendly booking card + form |
| `privacy.html` | Privacy Policy (template) |
| `cover.html` / `responsive.html` | Proposal cover & mobile showcase (PDF only) |

## Placeholders to replace with final assets
- **Logo** (`assets/logo.svg`) — recreation of the in-review wordmark; swap for final files
- **Headshot** (`assets/headshot.svg`) — replace with Ingrid's professional photo
- **Service illustrations** (`assets/svc-*.svg`) — brand graphics; can swap for photography
- **Calendly** embed on Contact — drop in the live Discovery Consultation URL
- **Email / phone** — `hello@ianexglobal.com` / placeholder number
- **Tagline** — "Connecting Opportunities. Driving Growth." (confirm vs. "Driving Global Growth")
- **Copy** — refined from the SRS; align with final client text

## View it as a live frontend
- **`ianex-global-website.html`** — a single, self-contained responsive file (all pages,
  CSS, and graphics inlined). Just open it in any browser and resize the window to see it
  respond; the nav switches pages in place and the mobile hamburger menu works.
- The multi-page source (`index.html`, `about.html`, …) is the editable version for handing
  to a Wix Studio / Figma developer.

## Build commands
```bash
npm install
node build-singlefile.mjs   # → ianex-global-website.html (portable live demo)
node build-pdf.mjs          # → IANEX-Global-Website-Design.pdf (proposal)
```
