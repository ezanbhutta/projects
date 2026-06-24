/* =====================================================================
   UNELLO — Data layer (in-memory; no localStorage per build directive)
   Products, copy, and SVG placeholder imagery generator.
   ===================================================================== */

window.UNELLO = window.UNELLO || {};

/* ---- Tier meta ---------------------------------------------------- */
UNELLO.tiers = {
  social: {
    key: "social", label: "Social", colorName: "Sun",
    meaning: "Open to friendship, conversation, and community.",
    long: "A Sun signal says you're up for a chat — new friends, a hello at the café, community over isolation.",
  },
  dating: {
    key: "dating", label: "Dating", colorName: "Rose",
    meaning: "Single and open to meeting someone in real life.",
    long: "A Rose signal says you're single and open to meeting someone in person. Open doesn't mean obligated — you're always in control.",
  },
};

/* ---- Placeholder imagery -----------------------------------------
   Warm, on-brand SVG placeholders. Lifestyle variants render a hand/
   wrist with the signal visible (spec §2.5). Returns a data-URI.       */
UNELLO.ph = function (opts) {
  const o = Object.assign({ w: 800, h: 1000, tier: "social", kind: "product", label: "" }, opts);
  const tint = o.tier === "dating" ? "#FFE0E4" : "#FDEFD9";
  const tint2 = o.tier === "dating" ? "#FFC9D0" : "#FBE0B4";
  const sig = o.tier === "dating" ? "#FF5A6E" : "#F59E2C";
  let body = "";

  if (o.kind === "lifestyle") {
    // abstract warm scene + wrist + visible signal dot
    body = `
      <rect width="100%" height="100%" fill="url(#g)"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.32}" r="${o.w*0.22}" fill="#FFFFFF" opacity=".35"/>
      <path d="M${o.w*0.12} ${o.h*0.78} q ${o.w*0.2} -${o.h*0.18} ${o.w*0.42} -${o.h*0.05}
               q ${o.w*0.18} ${o.h*0.1} ${o.w*0.36} ${o.h*0.02} l0 ${o.h*0.4} l-${o.w} 0 z"
            fill="#E8B98E" opacity=".55"/>
      <rect x="${o.w*0.42}" y="${o.h*0.55}" width="${o.w*0.16}" height="${o.h*0.06}" rx="${o.h*0.03}" fill="${sig}" opacity=".9"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.58}" r="${o.w*0.045}" fill="#FFFFFF"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.58}" r="${o.w*0.028}" fill="${sig}"/>
    `;
  } else if (o.kind === "macro") {
    body = `
      <rect width="100%" height="100%" fill="#FCFBF8"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.5}" r="${o.w*0.3}" fill="none" stroke="${tint2}" stroke-width="${o.w*0.05}"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.5}" r="${o.w*0.12}" fill="${sig}"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.5}" r="${o.w*0.12}" fill="none" stroke="#FFFFFF" stroke-width="2" opacity=".6"/>
    `;
  } else { // product
    body = `
      <rect width="100%" height="100%" fill="url(#g)"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.46}" r="${o.w*0.27}" fill="none" stroke="#FFFFFF" stroke-width="${o.w*0.055}" opacity=".75"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.46}" r="${o.w*0.1}" fill="${sig}"/>
      <circle cx="${o.w*0.5}" cy="${o.h*0.46}" r="${o.w*0.16}" fill="none" stroke="${sig}" stroke-width="2" opacity=".5"/>
    `;
  }

  const txt = o.label
    ? `<text x="50%" y="${o.h - 26}" text-anchor="middle" font-family="Inter,sans-serif" font-size="${Math.round(o.w*0.035)}" fill="#181410" opacity=".4">${o.label}</text>`
    : "";

  const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${o.w}" height="${o.h}" viewBox="0 0 ${o.w} ${o.h}">
    <defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0" stop-color="${tint}"/><stop offset="1" stop-color="${tint2}"/>
    </linearGradient></defs>${body}${txt}</svg>`;
  return "data:image/svg+xml;utf8," + encodeURIComponent(svg);
};

/* ---- Products ----------------------------------------------------- */
/* inventory: in | low | out | pre  (PDP can override via mock toggle) */
UNELLO.products = [
  // Social
  { id: "sun-cord", name: "Sun Cord Bracelet", tier: "social", type: "Bracelet", price: 38, inventory: "in",
    blurb: "Woven cord with the Sun signal bead. Everyday, water-friendly.",
    material: "Waxed cotton cord, brass-tone signal bead. Adjustable.", sizes: ["XS","S","M","L"] },
  { id: "sun-band", name: "Sun Band Bracelet", tier: "social", type: "Bracelet", price: 46, inventory: "low",
    blurb: "Soft silicone band — comfortable for all-day, all-summer wear.",
    material: "Medical-grade silicone, enamel signal inlay.", sizes: ["S","M","L"] },
  { id: "sun-ring", name: "Sun Signal Ring", tier: "social", type: "Ring", price: 52, inventory: "in",
    blurb: "A clean band with a single warm Sun dot. Subtle, readable.",
    material: "Stainless steel, hot-enamel signal dot.", sizes: ["6","7","8","9","10"] },
  { id: "sun-chain", name: "Sun Chain Bracelet", tier: "social", type: "Bracelet", price: 64, inventory: "pre",
    blurb: "Fine chain with the Sun token charm. A little more dressed up.",
    material: "18k gold-plate over brass.", sizes: ["S","M","L"] },

  // Dating
  { id: "rose-cord", name: "Rose Cord Bracelet", tier: "dating", type: "Bracelet", price: 38, inventory: "in",
    blurb: "Woven cord with the Rose signal bead. Single and open — quietly.",
    material: "Waxed cotton cord, rose-enamel signal bead. Adjustable.", sizes: ["XS","S","M","L"] },
  { id: "rose-band", name: "Rose Band Bracelet", tier: "dating", type: "Bracelet", price: 46, inventory: "in",
    blurb: "Soft silicone band in the Rose signal. Wear it where it's seen.",
    material: "Medical-grade silicone, enamel signal inlay.", sizes: ["S","M","L"] },
  { id: "rose-ring", name: "Rose Signal Ring", tier: "dating", type: "Ring", price: 52, inventory: "out",
    blurb: "A clean band with a single Rose dot. Open doesn't mean obligated.",
    material: "Stainless steel, hot-enamel signal dot.", sizes: ["6","7","8","9","10"] },
  { id: "rose-chain", name: "Rose Chain Bracelet", tier: "dating", type: "Bracelet", price: 64, inventory: "low",
    blurb: "Fine chain with the Rose token charm. For when you're out, out.",
    material: "18k gold-plate over brass.", sizes: ["S","M","L"] },
];

/* attach generated imagery */
UNELLO.products.forEach((p, i) => {
  p.images = [
    UNELLO.ph({ tier: p.tier, kind: "product",   label: p.name }),
    UNELLO.ph({ tier: p.tier, kind: "lifestyle", label: "the signal, in context" }),
    UNELLO.ph({ tier: p.tier, kind: "macro",     label: "macro" }),
    UNELLO.ph({ tier: p.tier, kind: "product",   w: 800, h: 1000, label: "on paper" }),
    UNELLO.ph({ tier: p.tier, kind: "lifestyle", label: "worn" }),
  ];
});

UNELLO.getProduct = (id) => UNELLO.products.find((p) => p.id === id);
UNELLO.byTier = (t) => UNELLO.products.filter((p) => p.tier === t);
