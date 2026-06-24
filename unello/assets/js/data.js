/* =====================================================================
   UNELLO — Data layer (in-memory; no localStorage)
   Real photography via Unsplash CDN (verified IDs) + product catalogue.
   ===================================================================== */
window.UNELLO = window.UNELLO || {};

/* ---- Image helper: responsive Unsplash URL ------------------------ */
UNELLO.img = function (id, w, h, focus) {
  let u = "https://images.unsplash.com/" + id + "?auto=format&fit=crop&w=" + (w || 1200) + "&q=80";
  if (h) u += "&h=" + h;
  if (focus) u += "&crop=" + focus;
  return u;
};

/* ---- Curated, verified photo IDs (role-mapped) -------------------- */
const P = {
  heroPortrait: "photo-1598218940656-7126545fd283", // refined earring portrait
  everydayCuffs: "photo-1740567389909-b36e9cadbef9", // two clean gold cuffs
  warmModel:    "photo-1756355201570-4437a6e34717",  // warm gold necklace
  modernModel:  "photo-1756355202062-cf9eb87f5250",  // sunglasses, modern
  gesture:      "photo-1762890815740-4cb1376e8df3",   // hand to ear — "say hi"
  portraitNeck: "photo-1673279495269-bc0d925c0612",  // statement necklace
  founder:      "photo-1613966561243-c6959a886009",  // editorial, hand to face
  datingNeck:   "photo-1616837874254-8d5aaa63e273",  // intimate necklace, blazer
  hoopModel:    "photo-1756355201130-3692200da782",  // gold hoop editorial
  bwModel:      "photo-1777817117637-27c6b1559536",  // b&w model
  flatlay:      "photo-1686575131650-e02f84970212",  // books + jewelry
  greenery:     "photo-1628453208660-b0dd0daac755",  // bracelet, plant
};
UNELLO.P = P;

/* role images used across editorial sections */
UNELLO.IMG = {
  hero: P.heroPortrait, everyday: P.everydayCuffs, warm: P.warmModel,
  modern: P.modernModel, gesture: P.gesture, portrait: P.portraitNeck,
  founder: P.founder, datingNeck: P.datingNeck, hoop: P.hoopModel,
  bw: P.bwModel, flatlay: P.flatlay, greenery: P.greenery,
};

/* lookbook / community grid */
UNELLO.lookbook = [
  "photo-1756355201130-3692200da782", "photo-1756355201570-4437a6e34717",
  "photo-1756355202062-cf9eb87f5250", "photo-1762890815740-4cb1376e8df3",
  "photo-1673279495269-bc0d925c0612", "photo-1777817117637-27c6b1559536",
];

/* ---- Tier meta ---------------------------------------------------- */
UNELLO.tiers = {
  social: {
    key: "social", label: "Social", colorName: "Sun",
    meaning: "Open to friendship, conversation, and community.",
    long: "A Sun signal says you're up for a chat — new friends, a hello at the café, community over isolation.",
    image: P.gesture,
  },
  dating: {
    key: "dating", label: "Dating", colorName: "Rose",
    meaning: "Single and open to meeting someone in real life.",
    long: "A Rose signal says you're single and open to meeting someone in person. Open doesn't mean obligated — you're always in control.",
    image: P.datingNeck,
  },
};

/* ---- Products ----------------------------------------------------- */
/* images = [main, lifestyle, macro/detail, alt] photo IDs            */
UNELLO.products = [
  // Social — Sun
  { id: "sun-cord", name: "Sun Cord Bracelet", tier: "social", type: "Bracelet", price: 38, inventory: "in",
    blurb: "A fine woven cord carrying the Sun signal. Light enough to forget you're wearing it.",
    material: "Waxed cotton cord, 14k-gold-fill signal bead. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1744472457504-f99a96ecbd3e","photo-1628453208660-b0dd0daac755","photo-1623279743107-152e86999257","photo-1642609881636-f8f67f770c0c"] },
  { id: "sun-band", name: "Sun Band Bracelet", tier: "social", type: "Bracelet", price: 46, inventory: "low",
    blurb: "A soft, sculptural band in the Sun signal — made for all-day, every-day.",
    material: "Hand-finished silicone, enamel signal inlay.", sizes: ["S","M","L"],
    images: ["photo-1625792508553-5e66a81659fa","photo-1741071520895-47d81779c11e","photo-1625792508272-bc6ad2788b14","photo-1686575131650-e02f84970212"] },
  { id: "sun-ring", name: "Sun Signal Ring", tier: "social", type: "Ring", price: 52, inventory: "in",
    blurb: "A quiet band with a single warm Sun dot. Subtle, readable, yours.",
    material: "Solid stainless steel, hot-enamel signal dot.", sizes: ["6","7","8","9","10"],
    images: ["photo-1705854937134-dd130d90df5d","photo-1731406322274-fb018de6fa97","photo-1610489800994-1330ea56e30f","photo-1623251209756-e7a6fad1cf94"] },
  { id: "sun-chain", name: "Sun Chain Bracelet", tier: "social", type: "Bracelet", price: 64, inventory: "pre",
    blurb: "A fine link chain with the Sun token. A little more dressed up.",
    material: "14k gold-fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1703034390242-1174e133db0a","photo-1728647771933-9946a13e29f6","photo-1725114073768-b437fb81e26c","photo-1628453208660-b0dd0daac755"] },

  // Dating — Rose
  { id: "rose-cord", name: "Rose Cord Bracelet", tier: "dating", type: "Bracelet", price: 38, inventory: "in",
    blurb: "The woven cord in the Rose signal. Single and open — quietly said.",
    material: "Waxed cotton cord, rose-enamel signal bead. Adjustable slider.", sizes: ["XS","S","M","L"],
    images: ["photo-1655707063092-5c4509de41b8","photo-1633810543462-77c4a3b13f07","photo-1625792508553-5e66a81659fa","photo-1642609881636-f8f67f770c0c"] },
  { id: "rose-band", name: "Rose Band Bracelet", tier: "dating", type: "Bracelet", price: 46, inventory: "in",
    blurb: "The sculptural band in the Rose signal. Wear it where it's seen.",
    material: "Hand-finished silicone, enamel signal inlay.", sizes: ["S","M","L"],
    images: ["photo-1655707063513-a08dad26440e","photo-1721206624468-2b3496c3bcfc","photo-1625792508272-bc6ad2788b14","photo-1686575131650-e02f84970212"] },
  { id: "rose-ring", name: "Rose Signal Ring", tier: "dating", type: "Ring", price: 52, inventory: "out",
    blurb: "A clean band with a single Rose dot. Open doesn't mean obligated.",
    material: "Solid stainless steel, hot-enamel signal dot.", sizes: ["6","7","8","9","10"],
    images: ["photo-1706196612848-0cd22cb6231e","photo-1643387774657-01bffa461627","photo-1610489800994-1330ea56e30f","photo-1623251209756-e7a6fad1cf94"] },
  { id: "rose-chain", name: "Rose Chain Bracelet", tier: "dating", type: "Bracelet", price: 64, inventory: "low",
    blurb: "The fine link chain with the Rose token. For when you're out, out.",
    material: "14k gold-fill over brass, lobster clasp.", sizes: ["S","M","L"],
    images: ["photo-1725114073768-b437fb81e26c","photo-1777126413468-4049400fe441","photo-1703034390242-1174e133db0a","photo-1628453208660-b0dd0daac755"] },
];

UNELLO.getProduct = (id) => UNELLO.products.find((p) => p.id === id);
UNELLO.byTier = (t) => UNELLO.products.filter((p) => p.tier === t);
/* product image at size */
UNELLO.pimg = (p, i, w, h) => UNELLO.img(p.images[i] || p.images[0], w || 800, h || 1000);
