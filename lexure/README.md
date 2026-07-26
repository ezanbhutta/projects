# LEXURE — Private Residences

A cinematic, editorial landing site for **Lexure**, a private luxury real-estate brand.
Dark, warm, architectural — photography that expands and breathes on scroll, magazine-cover
typography, and unhurried, expensive-feeling motion.

## What's inside

```
lexure/
├── index.html            # single-page site
├── favicon.svg           # brass "L" monogram
├── BRIEF.md              # the creative & motion brief (the design prompt)
├── assets/
│   ├── css/styles.css    # full design system + all motion
│   ├── js/main.js        # cursor, parallax, hero, image-expansion, form
│   └── img/              # 12 optimised residence / interior photographs
```

No build step, no dependencies, no framework. Pure HTML/CSS/vanilla JS.

## The experience (mapped to the brief)

1. **Preloader** — letter-spaced brand reveal + progress counter, then a curtain wipe.
2. **Hero** — full-bleed residence with a Ken-Burns zoom, multi-plane parallax, and
   layered floating spec chips (image zoom-on-scroll + depth).
3. **Signature** — the centrepiece: an image that **expands from a framed card to
   full-bleed** as you scroll, with a crossfading caption.
4. **Depth scene** — foreground / midground / background parallax planes over a skyline.
5. **Micro-motion throughout** — custom cursor, magnetic buttons, line-mask text reveals,
   animated counters, an infinite marquee, and a scroll-aware header.

All motion respects `prefers-reduced-motion` and the site is keyboard- and screen-reader-friendly.

## View it locally

Any static server works — for example:

```bash
cd lexure
python3 -m http.server 8000
# open http://localhost:8000
```

(The custom fonts load from Google Fonts, so keep a connection for the intended type;
everything else — including all photography — is bundled locally.)

## Deploy

Drop the `lexure/` folder onto any static host (Netlify, Vercel, GitHub Pages, S3/CloudFront),
or point a web root at it. It can also be copied into a framework's `public/` directory.

---

Photography: Unsplash (royalty-free), optimised and bundled locally.
Type: Fraunces (display) + Archivo (UI) via Google Fonts.
