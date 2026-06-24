# Unello, UI/UX Design Build

> **v2, "Quiet Signal".** Reworked into a minimal, editorial, timeless system
> (inspired by the calm of Mejuri, pushed further): warm-white canvas, ink type,
> a single crimson accent (**#E4002B**, the brand red), **Fraunces × Inter**
> typography, full-bleed real photography, and generous negative space. Uses the
> client's **exact interlocking-heart logo** (vectorised from the supplied `.ai`
> and embedded) and **real curated Unsplash photography** throughout.


A high-fidelity, static front-end implementing the **Unello "Open Signal"** design
system from `Unello_UI_UX_Design_Spec_FINAL.md`. This is the **design source-of-truth
and approval artifact**, every page in §5 and every state in §6 of the spec, built
on the §2 tokens and §3 component library.

> **Unello** = *Unity + Hello*. Wearable social-signal jewelry. A bracelet or ring is a
> public signal that the wearer is open to connecting in real life, **Social (Sun)** for
> friendship, **Dating (Rose)** for dating. The site's job: *teach the signal, then sell
> the way in.*

## Run it

It's plain HTML/CSS/JS, no build step.

**Easiest, one file, no server:** open **`unello-standalone.html`** directly in any
browser (double-click it). It bundles all 14 pages, the CSS, and the JS into a single
self-contained file and navigates via hash routes (`#/shop`, `#/product?id=…`, `#/beach`).
Only Google Fonts load from the network.

**Or the multi-page version with a static server:**

```bash
cd unello
python3 -m http.server 8000
# open http://localhost:8000
```

## What's here

```
unello/
├── index.html              Home, teaches the signal in one screen (§5.1)
├── shop.html               Shop landing + filters/sort (§5.2)
├── collection.html         Social / Dating collection, ?tier=social|dating (§5.3)
├── product.html            PDP, all 4 inventory states via mock toggle (§5.4, §6)
├── how-it-works.html       4 steps + "Read the Signal" colour code (§5.5)
├── about.html              Unity+Hello, founder story, the movement (§5.6)
├── faq.html                Grouped accordion, idea / control / orders (§5.7)
├── contact.html            Validated contact form + CS note (§5.8)
├── beach.html              /beach QR campaign, single-screen, thumb-first (§5.9)
├── 404.html                On-brand, routes to Shop (§6)
├── shipping-returns.html · privacy.html · terms.html · accessibility.html   (§5.11)
└── assets/
    ├── css/styles.css      Design tokens (§2) + full component library (§3)
    ├── js/data.js          In-memory product data + SVG placeholder imagery
    ├── js/app.js           Shared chrome (header/footer/cart/modals/toast) + interactions
    └── img/logo-reference.png   The supplied "say hi" logo mockup, for reference
```

## How the spec maps to the build

**Design language, "Open Signal."** The signature **signal token** (filled dot inside a
soft pulsing ring, in the tier colour) tags products, bullets the steps, anchors the
logo lockup, and pulses like a beacon. It's a CSS-only component (`.signal`), set the
tier with `data-tier="social|dating"` and the size with `sm | md | lg | xl`. The pulse is
a ~2s ring expand-and-fade that turns **off under `prefers-reduced-motion`** (static dot
remains).

**Tokens are the single source of truth.** All colour, spacing, radius, elevation, type,
and motion live as CSS custom properties in `:root` (`assets/css/styles.css §1`). Tier
theming is done by re-pointing `--tier / --tier-tint / --tier-ink` via `[data-tier]`, so
one component renders in either signal colour. No hardcoded hex in markup.

**Colour usage law.** Primary buttons & core UI are **ink on paper**. Signal colours are
**semantic**, they appear only where they communicate tier. Text on signal colours is
**ink**, never white. (Two darkened tier-ink tokens, `--social-ink` / `--dating-ink`, are
used for text on the light tints so everything clears **AA 4.5:1**, verified.)

**Brand mark.** The supplied logo (two interlocking links forming a heart) is recreated as
an inline SVG in `app.js` (`MARK`), paired with the `unello` wordmark in **Bricolage
Grotesque**. Body/UI type is **Inter**. Both via Google Fonts.

## Inventory states (§6), review them

On any **product page**, use the dashed **"Preview state"** toggle to flip the buy area
between the four inventory states. Each drives the CTA and copy:

| State | Buy area |
|-------|----------|
| In stock | Add to Cart + Buy Now |
| Low stock | + "Only a few left" |
| Sold out | **Join the Waitlist** (4-field modal + confirmation) |
| Pre-order | **Pre-order now, ships in 3 to 4 weeks** |

Also designed: empty cart, form success/error, loading skeletons (`.skeleton`), image
fallback, on-brand 404, and the waitlist/pre-order confirmation.

## Interactions (§7)

- **Signal pulse**, the signature; reduced-motion safe.
- **Cart drawer**, slide-over with free-ship progress bar, "complete the set" cross-sell,
  qty/size edit, subtotal → external checkout (**stubbed**, no payment UI).
- **Find my size** drawer, accordions, product image cross-fade on hover, sticky mobile
  add-to-cart on the PDP, toasts, mobile full-screen menu.
- Micro-interactions are 150 to 300ms ease-out; the pulse is the one bold thing.

## Accessibility & responsive (§9)

WCAG 2.1 AA target: keyboard navigation, `:focus-visible` rings, labelled fields, alt
text, AA contrast (all token pairs verified ≥ 4.5:1), reduced-motion path, 44×44 touch
targets, SVG line icons only (no emoji/icon-fonts). Mobile-first; verified to reflow at
**375 / 768 / 1280**.

## Build notes & stubs (design build only)

- **In-memory state only**, no `localStorage`, per the build directive. Cart resets on
  reload.
- **No real checkout/payment**, the checkout and Buy Now buttons are stubbed with a toast.
- **Search** is a stub.
- **Imagery is placeholder**, warm, on-brand SVG placeholders generated in `data.js`
  (`UNELLO.ph`), including lifestyle frames with the signal visible in context and product
  macros, ready to swap for real photography.
- **Signal colour values** (`--social #F59E2C`, `--dating #FF5A6E`) are from the spec, *confirm final brand IP values with Alicia* before launch.

## Acceptance criteria (§10.4)

- [x] Token system referenced everywhere; zero hardcoded colour/space in components.
- [x] Home teaches the Signal in one screen; dual CTA works.
- [x] Signal token + pulse present and consistent across pages.
- [x] PDP renders all four inventory states.
- [x] Waitlist/pre-order modal captures 4 fields + confirmation.
- [x] Cart drawer with free-ship progress + cross-sell.
- [x] `/beach` template: single-screen, thumb-first, fastest page.
- [x] Control/consent microcopy on Dating surfaces + FAQ.
- [x] Fully responsive (375/768/1280); AA contrast; reduced-motion respected.
