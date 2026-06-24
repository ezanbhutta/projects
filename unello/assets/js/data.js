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
  heroWrist: "photo-1534976618208-4833d5b57d08", // clean wrist + cord bracelet
  friends:   "photo-1555817129-2fa6b81bd8e5",     // friends laughing together
  friendsB:  "photo-1693462467631-e013fa26062d",  // two friends, warm
  cafe:      "photo-1542338332-76971ae8c292",      // friends at a cafe, candid
  elegant:   "photo-1573446238824-c28afa0cd312",   // delicate bracelet, neckline
  beadedMac: "photo-1636520326725-ef3fe2bf0557",   // beaded bracelets, detail
};
UNELLO.P = P;
UNELLO.IMG = {
  hero: P.friends, story: P.cafe, craft: P.elegant, worn: P.heroWrist, friendsB: P.friendsB,
};
UNELLO.lookbook = [P.friends, P.cafe, P.friendsB, P.heroWrist, P.elegant, P.beadedMac];

/* ---- Bracelets (friendship) ----------------------------------------
   images = [main, lifestyle, detail] photo IDs                        */
UNELLO.products = [
  { id: "the-cord", name: "The Cord", style: "Cord", price: 38, inventory: "in",
    blurb: "A fine woven cord with the Unello mark. Light enough to forget you are wearing it, clear enough to be read.",
    material: "Waxed cotton cord, 14k gold-fill clasp. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1534976618208-4833d5b57d08","photo-1542338332-76971ae8c292","photo-1603321581480-12bd571a7aa2"] },
  { id: "the-beaded", name: "The Beaded", style: "Beaded", price: 42, inventory: "in",
    blurb: "Hand-strung beads in warm tones, finished with the mark. Easy, everyday, yours.",
    material: "Natural stone beads, gold-fill detail, stretch fit.", sizes: ["S","M","L"],
    images: ["photo-1598472142308-86f3ac581944","photo-1555817129-2fa6b81bd8e5","photo-1636520326725-ef3fe2bf0557"] },
  { id: "the-chain", name: "The Chain", style: "Chain", price: 58, inventory: "low",
    blurb: "A fine link chain carrying the mark. A little more dressed up, still quietly readable.",
    material: "14k gold-fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1656437342100-6e99ab500845","photo-1573446238824-c28afa0cd312","photo-1632670549453-7a3dfac254a2"] },
  { id: "the-cuff", name: "The Cuff", style: "Cuff", price: 64, inventory: "in",
    blurb: "A clean open cuff with the mark set into the metal. Sculptural, minimal, unmistakable.",
    material: "Recycled stainless steel, hand-finished.", sizes: ["S","M","L"],
    images: ["photo-1632670549453-7a3dfac254a2","photo-1693462467631-e013fa26062d","photo-1598472142308-86f3ac581944"] },
  { id: "the-woven", name: "The Woven", style: "Woven", price: 44, inventory: "in",
    blurb: "A flat woven band, soft on the wrist and made to be layered. Wear one, or wear five.",
    material: "Recycled poly-cotton weave, brass slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1603321581480-12bd571a7aa2","photo-1542338332-76971ae8c292","photo-1534976618208-4833d5b57d08"] },
  { id: "the-charm", name: "The Charm", style: "Charm", price: 52, inventory: "pre",
    blurb: "A delicate chain with the heart charm. The most quietly expressive piece in the set.",
    material: "14k gold-fill chain and charm.", sizes: ["S","M","L"],
    images: ["photo-1573446238824-c28afa0cd312","photo-1555817129-2fa6b81bd8e5","photo-1656437342100-6e99ab500845"] },
];

UNELLO.getProduct = (id) => UNELLO.products.find((p) => p.id === id);
UNELLO.pimg = (p, i, w, h) => UNELLO.img(p.images[i] || p.images[0], w || 800, h || 1000);
