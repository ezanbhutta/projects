/* =====================================================================
   UNELLO data layer (in-memory; no localStorage)
   Friendship bracelets. One idea: wear it, be open, say hello.
   Real photography via Unsplash CDN (verified IDs).
   ===================================================================== */
window.UNELLO = window.UNELLO || {};

UNELLO.img = function (id, w, h) {
  let u = "https://images.unsplash.com/" + id + "?auto=format&fit=crop&w=" + (w || 1200) + "&q=80";
  if (h) u += "&h=" + h;
  return u;
};

/* curated, verified photo IDs */
const P = {
  heroFriends: "photo-1511632765486-a01980e01a18", // friends at sunset, warm
  friendsOut:  "photo-1758613171760-f0844a4bc1d5",  // two friends outdoors
  latteWrist:  "photo-1644945591077-00b4ac750421",  // bracelet + latte, lifestyle
  handBracelet:"photo-1621341103818-01dada8c6ef8",  // clean hand + bracelet
  delicate:    "photo-1708221235889-244b2b9495f3",  // delicate bracelet, near face
  goldBangle:  "photo-1655707063092-5c4509de41b8",  // gold bangle on white
  goldChain:   "photo-1610223515982-5bae48b7c2c2",  // gold chain bracelet
  goldClasp:   "photo-1602173574767-37ac01994b2a",  // gold bracelet, editorial
  redBeaded:   "photo-1617191880362-aac615de3c26",  // beaded bracelets
};
UNELLO.P = P;
UNELLO.IMG = {
  hero: P.heroFriends, story: P.friendsOut, craft: P.latteWrist, worn: P.handBracelet, friendsB: P.delicate,
};
UNELLO.lookbook = [P.heroFriends, P.latteWrist, P.friendsOut, P.handBracelet, P.delicate, P.goldClasp];

/* ---- Bracelets (friendship) ----------------------------------------
   images = [main, lifestyle, detail] photo IDs                        */
UNELLO.products = [
  { id: "the-cord", name: "The Cord", style: "Cord", price: 38, inventory: "in",
    blurb: "A fine woven cord with the Unello mark. Light enough to forget you are wearing it, clear enough to be read.",
    material: "Waxed cotton cord, 14k gold-fill clasp. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1621341103818-01dada8c6ef8","photo-1644945591077-00b4ac750421","photo-1602173574767-37ac01994b2a"] },
  { id: "the-beaded", name: "The Beaded", style: "Beaded", price: 42, inventory: "in",
    blurb: "Hand-strung beads in warm tones, finished with the mark. Easy, everyday, yours.",
    material: "Natural stone beads, gold-fill detail, stretch fit.", sizes: ["S","M","L"],
    images: ["photo-1617191880362-aac615de3c26","photo-1758613171760-f0844a4bc1d5","photo-1602173574767-37ac01994b2a"] },
  { id: "the-chain", name: "The Chain", style: "Chain", price: 58, inventory: "low",
    blurb: "A fine link chain carrying the mark. A little more dressed up, still quietly readable.",
    material: "14k gold-fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1610223515982-5bae48b7c2c2","photo-1644945591077-00b4ac750421","photo-1602173574767-37ac01994b2a"] },
  { id: "the-cuff", name: "The Cuff", style: "Cuff", price: 64, inventory: "in",
    blurb: "A clean open cuff with the mark set into the metal. Sculptural, minimal, unmistakable.",
    material: "Recycled stainless steel, hand-finished.", sizes: ["S","M","L"],
    images: ["photo-1655707063092-5c4509de41b8","photo-1621341103818-01dada8c6ef8","photo-1610223515982-5bae48b7c2c2"] },
  { id: "the-woven", name: "The Woven", style: "Woven", price: 44, inventory: "in",
    blurb: "A flat woven band, soft on the wrist and made to be layered. Wear one, or wear five.",
    material: "Recycled poly-cotton weave, brass slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1708221235889-244b2b9495f3","photo-1644945591077-00b4ac750421","photo-1621341103818-01dada8c6ef8"] },
  { id: "the-charm", name: "The Charm", style: "Charm", price: 52, inventory: "pre",
    blurb: "A delicate chain with the heart charm. The most quietly expressive piece in the set.",
    material: "14k gold-fill chain and charm.", sizes: ["S","M","L"],
    images: ["photo-1602173574767-37ac01994b2a","photo-1758613171760-f0844a4bc1d5","photo-1610223515982-5bae48b7c2c2"] },
];

UNELLO.getProduct = (id) => UNELLO.products.find((p) => p.id === id);
UNELLO.pimg = (p, i, w, h) => UNELLO.img(p.images[i] || p.images[0], w || 800, h || 1000);
