/* =====================================================================
   UNELLO data layer (in-memory; no localStorage)
   Bracelets only. Two signals: Social (friendship) and Dating.
   Real photography via Unsplash CDN (verified IDs).
   ===================================================================== */
window.UNELLO = window.UNELLO || {};

UNELLO.img = function (id, w, h, focus) {
  let u = "https://images.unsplash.com/" + id + "?auto=format&fit=crop&w=" + (w || 1200) + "&q=80";
  if (h) u += "&h=" + h;
  if (focus) u += "&crop=" + focus;
  return u;
};

/* curated, verified photo IDs (bracelets + human connection) */
const P = {
  hero:        "photo-1534976618208-4833d5b57d08", // clean wrist + cord bracelet
  coffee:      "photo-1542338332-76971ae8c292",     // friends at a cafe, candid
  friends:     "photo-1555817129-2fa6b81bd8e5",     // friends laughing together
  friendsB:    "photo-1693462467631-e013fa26062d",  // two friends, warm
  couple:      "photo-1511988617509-a57c8a288659",  // couple, golden hour
  coupleB:     "photo-1701858986056-c740b7309e89",  // couple, outdoors
  hands:       "photo-1650920048537-e7be7f25cc8a",  // holding hands, close
  elegant:     "photo-1573446238824-c28afa0cd312",  // delicate bracelet, neckline
  beaded:      "photo-1636520326725-ef3fe2bf0557",  // beaded bracelets, detail
};
UNELLO.P = P;
UNELLO.IMG = {
  hero: P.hero, social: P.coffee, dating: P.hands, everyday: P.elegant,
  friends: P.friends, couple: P.couple, beaded: P.beaded, gesture: P.coffee,
};
UNELLO.lookbook = [P.friends, P.coffee, P.couple, P.hands, P.friendsB, P.beaded];

UNELLO.tiers = {
  social: {
    key: "social", label: "Social", colorName: "Sun",
    meaning: "Open to friendship, conversation, and community.",
    long: "A Sun bracelet says you are up for a hello. New friends, a chat at the cafe, community over isolation.",
    image: P.coffee,
  },
  dating: {
    key: "dating", label: "Dating", colorName: "Rose",
    meaning: "Single, and open to meeting someone in real life.",
    long: "A Rose bracelet says you are single and open to meeting someone in person. Open does not mean obligated. You are always in control.",
    image: P.hands,
  },
};

/* ---- Bracelets only -------------------------------------------------
   images = [main, lifestyle, detail, alt] photo IDs                    */
UNELLO.products = [
  // Social (Sun), friendship
  { id: "sun-cord", name: "Sun Cord", tier: "social", style: "Cord", type: "Bracelet", price: 38, inventory: "in",
    blurb: "A fine woven cord carrying the Sun signal. Light enough to forget you are wearing it.",
    material: "Waxed cotton cord, 14k gold fill signal bead. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1534976618208-4833d5b57d08","photo-1542338332-76971ae8c292","photo-1603321581480-12bd571a7aa2","photo-1573446238824-c28afa0cd312"] },
  { id: "sun-bead", name: "Sun Beaded", tier: "social", style: "Beaded", type: "Bracelet", price: 42, inventory: "low",
    blurb: "Hand strung beads in warm tones, finished with the Sun signal. Easy, everyday, yours.",
    material: "Natural stone beads, gold fill signal bead, stretch fit.", sizes: ["S","M","L"],
    images: ["photo-1598472142308-86f3ac581944","photo-1555817129-2fa6b81bd8e5","photo-1636520326725-ef3fe2bf0557","photo-1601387603639-387c75bdcb0d"] },
  { id: "sun-chain", name: "Sun Chain", tier: "social", style: "Chain", type: "Bracelet", price: 58, inventory: "in",
    blurb: "A fine link chain with the Sun token. A little more dressed up, still quietly readable.",
    material: "14k gold fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1656437342100-6e99ab500845","photo-1542338332-76971ae8c292","photo-1632670549453-7a3dfac254a2","photo-1573446238824-c28afa0cd312"] },
  { id: "sun-cuff", name: "Sun Cuff", tier: "social", style: "Cuff", type: "Bracelet", price: 64, inventory: "pre",
    blurb: "A clean open cuff with a single Sun dot. Sculptural, minimal, unmistakable.",
    material: "Recycled stainless steel, hot enamel signal dot.", sizes: ["S","M","L"],
    images: ["photo-1632670549453-7a3dfac254a2","photo-1555817129-2fa6b81bd8e5","photo-1598472142308-86f3ac581944","photo-1656437342100-6e99ab500845"] },

  // Dating (Rose)
  { id: "rose-cord", name: "Rose Cord", tier: "dating", style: "Cord", type: "Bracelet", price: 38, inventory: "in",
    blurb: "The woven cord in the Rose signal. Single and open, quietly said.",
    material: "Waxed cotton cord, rose enamel signal bead. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1723522938827-aeaecb5d913b","photo-1650920048537-e7be7f25cc8a","photo-1603321581480-12bd571a7aa2","photo-1511988617509-a57c8a288659"] },
  { id: "rose-bead", name: "Rose Beaded", tier: "dating", style: "Beaded", type: "Bracelet", price: 42, inventory: "in",
    blurb: "Hand strung beads with a rose finish. Warm on the wrist, clear in its meaning.",
    material: "Natural stone beads, rose enamel signal bead, stretch fit.", sizes: ["S","M","L"],
    images: ["photo-1660911734586-15536cbd195f","photo-1511988617509-a57c8a288659","photo-1636520326725-ef3fe2bf0557","photo-1650920048537-e7be7f25cc8a"] },
  { id: "rose-chain", name: "Rose Chain", tier: "dating", style: "Chain", type: "Bracelet", price: 58, inventory: "low",
    blurb: "The fine link chain with the Rose token. For when you are out, and open to it.",
    material: "14k gold fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1573446238824-c28afa0cd312","photo-1650920048537-e7be7f25cc8a","photo-1632670549453-7a3dfac254a2","photo-1701858986056-c740b7309e89"] },
  { id: "rose-cuff", name: "Rose Cuff", tier: "dating", style: "Cuff", type: "Bracelet", price: 64, inventory: "out",
    blurb: "The open cuff with a single Rose dot. Minimal, intentional, in control.",
    material: "Recycled stainless steel, hot enamel signal dot.", sizes: ["S","M","L"],
    images: ["photo-1724500229258-b76308d42945","photo-1511988617509-a57c8a288659","photo-1632670549453-7a3dfac254a2","photo-1650920048537-e7be7f25cc8a"] },
];

UNELLO.getProduct = (id) => UNELLO.products.find((p) => p.id === id);
UNELLO.byTier = (t) => UNELLO.products.filter((p) => p.tier === t);
UNELLO.pimg = (p, i, w, h) => UNELLO.img(p.images[i] || p.images[0], w || 800, h || 1000);
