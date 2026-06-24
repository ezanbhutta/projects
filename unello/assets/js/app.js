/* =====================================================================
   UNELLO — App  ·  shared chrome + interactions
   In-memory state only (no localStorage). SVG line icons only (§2.4).
   ===================================================================== */
(function () {
  "use strict";
  const U = window.UNELLO;
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));
  const money = (n) => "$" + n.toFixed(0);
  const FREE_SHIP = 75;

  /* ---------------- SVG line icons ---------------- */
  const I = {
    cart: '<path d="M3 4h2l2.4 12.3a2 2 0 0 0 2 1.7h7.7a2 2 0 0 0 2-1.6L21 8H6"/><circle cx="10" cy="21" r="1.4"/><circle cx="18" cy="21" r="1.4"/>',
    menu: '<path d="M3 6h18M3 12h18M3 18h18"/>',
    close: '<path d="M5 5l14 14M19 5L5 19"/>',
    plus: '<path d="M12 5v14M5 12h14"/>',
    minus: '<path d="M5 12h14"/>',
    search: '<circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>',
    arrow: '<path d="M5 12h14M13 6l6 6-6 6"/>',
    check: '<path d="M4 12.5l5 5L20 6.5"/>',
    alert: '<circle cx="12" cy="12" r="9"/><path d="M12 7v6M12 16.5v.5"/>',
    truck: '<path d="M3 6h11v9H3zM14 9h4l3 3v3h-7z"/><circle cx="7" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/>',
    refresh: '<path d="M3 12a9 9 0 0 1 15.5-6.2M21 4v4h-4"/><path d="M21 12a9 9 0 0 1-15.5 6.2M3 20v-4h4"/>',
    pin: '<path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>',
    insta: '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/>',
    tiktok: '<path d="M14 4v9.5a3.5 3.5 0 1 1-3-3.46"/><path d="M14 4a4.5 4.5 0 0 0 4.5 4.5"/>',
    sun: '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M2 12h2M20 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/>',
    eye: '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/>',
    hand: '<path d="M7 11V6a1.5 1.5 0 0 1 3 0v4M10 10V4.5a1.5 1.5 0 0 1 3 0V10M13 10V6a1.5 1.5 0 0 1 3 0v6c0 4-2.5 7-6 7s-6-2.5-6-6v-1l-1.4-1.4a1.4 1.4 0 0 1 2-2L7 11"/>',
    wave: '<path d="M3 12a9 9 0 0 1 18 0M6 12a6 6 0 0 1 12 0M9 12a3 3 0 0 1 6 0"/>',
    tag: '<path d="M3 12V4h8l9 9-8 8-9-9z"/><circle cx="7.5" cy="7.5" r="1.3"/>',
    ruler: '<rect x="3" y="8" width="18" height="8" rx="1.5"/><path d="M7 8v3M11 8v4M15 8v3M19 8v4"/>',
    lock: '<rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/>',
    mail: '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
    spark: '<path d="M12 3v6M12 15v6M3 12h6M15 12h6"/>',
    box: '<path d="M3 8l9-5 9 5-9 5-9-5z"/><path d="M3 8v8l9 5 9-5V8M12 13v8"/>',
    chat: '<path d="M4 5h16v11H9l-5 4z"/>',
    leaf: '<path d="M5 19c0-8 6-13 14-13 0 8-5 14-14 14M5 19c2-4 5-6 9-7"/>',
  };
  function svg(name, cls = "ico") {
    return `<svg class="${cls}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">${I[name] || ""}</svg>`;
  }
  U.svg = svg;

  /* brand mark — interlocking links forming a heart (Unity + Hello) */
  /* two interlocking links tilted into a heart (Unity + Hello) */
  const MARK = `<svg class="brand-mark" viewBox="0 0 64 56" fill="none" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <rect x="-13" y="-19" width="26" height="38" rx="13" transform="translate(25 25) rotate(-40)"/>
      <rect x="-13" y="-19" width="26" height="38" rx="13" transform="translate(39 25) rotate(40)"/>
    </svg>`;
  U.brand = (sub) => `<a class="brand" href="index.html" aria-label="Unello — home">
      ${MARK}<span class="brand-word">unello</span>${sub ? `<span class="sr-only">${sub}</span>` : ""}
    </a>`;

  function signal(tier, size = "md") { return `<span class="signal ${size}" data-tier="${tier}" role="img" aria-label="${tier} signal"></span>`; }
  U.signal = signal;

  /* ---------------- in-memory cart ---------------- */
  const cart = []; // {id, size, qty}
  U.cart = cart;
  function cartCount() { return cart.reduce((s, l) => s + l.qty, 0); }
  function cartSubtotal() { return cart.reduce((s, l) => s + U.getProduct(l.id).price * l.qty, 0); }
  function addToCart(id, size, qty = 1) {
    const line = cart.find((l) => l.id === id && l.size === size);
    if (line) line.qty += qty; else cart.push({ id, size, qty });
    syncCart();
  }
  function removeLine(idx) { cart.splice(idx, 1); syncCart(); }
  function setQty(idx, q) { if (q <= 0) removeLine(idx); else { cart[idx].qty = q; syncCart(); } }
  U.addToCart = addToCart;

  function syncCart() {
    const c = cartCount();
    $$(".cart-count").forEach((el) => { el.textContent = c; el.hidden = c === 0; });
    renderCartBody();
  }

  /* ---------------- header ---------------- */
  const NAV = [
    { href: "shop.html", label: "Shop" },
    { href: "how-it-works.html", label: "How It Works" },
    { href: "about.html", label: "About" },
    { href: "faq.html", label: "FAQ" },
  ];
  function renderHeader(opts = {}) {
    const cur = location.pathname.split("/").pop() || "index.html";
    const navLinks = (cls) => NAV.map((n) => {
      const active = cur === n.href || (n.href === "shop.html" && /collection|product/.test(cur));
      return `<a href="${n.href}"${active ? ' aria-current="page"' : ""}>${n.label}</a>`;
    }).join("");

    const announce = opts.announce === false ? "" :
      `<div class="announce">${signal("social", "sm")} Free shipping over ${money(FREE_SHIP)} · new pieces dropping soon</div>`;

    const html = `${announce}
      <header class="site-header" id="siteHeader">
        <div class="wrap header-bar">
          ${U.brand()}
          <nav class="nav-desktop" aria-label="Primary">${navLinks()}</nav>
          <div class="header-actions">
            <button class="icon-btn" id="searchBtn" aria-label="Search">${svg("search")}</button>
            <button class="icon-btn" id="cartBtn" aria-label="Open cart" aria-haspopup="dialog">
              ${svg("cart")}<span class="cart-count" hidden>0</span>
            </button>
            <button class="icon-btn hamburger" id="menuBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileSheet">${svg("menu")}</button>
          </div>
        </div>
      </header>
      <div class="mobile-sheet" id="mobileSheet" role="dialog" aria-modal="true" aria-label="Menu" inert>
        <div class="wrap header-bar">
          ${U.brand()}
          <button class="icon-btn" id="menuClose" aria-label="Close menu">${svg("close")}</button>
        </div>
        <nav aria-label="Mobile">
          ${NAV.map((n) => `<a href="${n.href}">${n.label} ${svg("arrow")}</a>`).join("")}
          <a href="contact.html">Contact ${svg("arrow")}</a>
        </nav>
        <div class="wrap" style="padding-bottom:var(--s-6)">
          <a class="btn btn-primary btn-block" href="shop.html">Shop Unello</a>
        </div>
      </div>`;
    const mount = $("#header") || document.body.insertBefore(document.createElement("div"), document.body.firstChild);
    mount.id = "header"; mount.innerHTML = html;

    // scroll condense
    const head = $("#siteHeader");
    const onScroll = () => head.classList.toggle("scrolled", window.scrollY > 8);
    window.addEventListener("scroll", onScroll, { passive: true }); onScroll();

    // mobile sheet
    const sheet = $("#mobileSheet");
    const openSheet = () => { sheet.classList.add("open"); sheet.removeAttribute("inert"); $("#menuBtn").setAttribute("aria-expanded", "true"); lockScroll(true); };
    const closeSheet = () => { sheet.classList.remove("open"); sheet.setAttribute("inert", ""); $("#menuBtn").setAttribute("aria-expanded", "false"); lockScroll(false); };
    $("#menuBtn").addEventListener("click", openSheet);
    $("#menuClose").addEventListener("click", closeSheet);
    $$("#mobileSheet nav a").forEach((a) => a.addEventListener("click", closeSheet));
    $("#cartBtn").addEventListener("click", () => openDrawer("cart"));
    $("#searchBtn").addEventListener("click", () => toast("Search is a stub in this design build.", "info"));
  }

  /* ---------------- footer ---------------- */
  function renderFooter() {
    const html = `<footer class="site-footer">
      <div class="wrap footer-grid">
        <div>
          ${U.brand()}
          <p class="footer-movement mt-4">Unello is a movement, not a store.</p>
          <form class="inline-capture mt-4" data-capture="footer" novalidate>
            <input class="input" type="email" placeholder="Your email" aria-label="Email" required>
            <button class="btn btn-primary" type="submit">Join</button>
          </form>
        </div>
        <div>
          <h4>Shop</h4>
          <a href="collection.html?tier=social">Social Collection</a>
          <a href="collection.html?tier=dating">Dating Collection</a>
          <a href="shop.html">All pieces</a>
          <a href="beach.html">/beach campaign</a>
        </div>
        <div>
          <h4>Learn</h4>
          <a href="how-it-works.html">How it works</a>
          <a href="how-it-works.html#read-the-signal">Read the Signal</a>
          <a href="about.html">About</a>
          <a href="faq.html">FAQ</a>
          <a href="contact.html">Contact</a>
        </div>
        <div>
          <h4>Legal</h4>
          <a href="shipping-returns.html">Shipping &amp; Returns</a>
          <a href="privacy.html">Privacy</a>
          <a href="terms.html">Terms</a>
          <a href="accessibility.html">Accessibility</a>
        </div>
      </div>
      <div class="wrap footer-bottom">
        <div class="flex" style="align-items:center;gap:var(--s-4)">
          <span class="small muted">© 2026 Unello</span>
          <span class="small muted">Designed to teach the signal, then sell the way in.</span>
        </div>
        <div class="flex" style="align-items:center;gap:var(--s-5)">
          <div class="social-links">
            <a href="#" aria-label="Instagram">${svg("insta")}</a>
            <a href="#" aria-label="TikTok">${svg("tiktok")}</a>
          </div>
          <div class="pay-badges" aria-label="Accepted payments">
            ${payBadge("VISA")}${payBadge("AMEX")}${payBadge("PAY")}
          </div>
        </div>
      </div>
    </footer>`;
    const mount = $("#footer") || document.body.appendChild(document.createElement("div"));
    mount.id = "footer"; mount.innerHTML = html;
  }
  function payBadge(t) {
    return `<svg viewBox="0 0 48 22" role="img" aria-label="${t}"><rect width="48" height="22" rx="4" fill="#181410" opacity=".08"/><text x="24" y="15" text-anchor="middle" font-family="Inter,sans-serif" font-size="9" font-weight="700" fill="#181410" opacity=".7">${t}</text></svg>`;
  }

  /* ---------------- cart drawer ---------------- */
  function renderCartDrawer() {
    const html = `<div class="scrim" id="scrim"></div>
      <aside class="drawer" id="cartDrawer" role="dialog" aria-modal="true" aria-label="Your cart" inert>
        <div class="drawer-head">
          <strong>Your cart</strong>
          <button class="icon-btn" data-close-drawer aria-label="Close cart">${svg("close")}</button>
        </div>
        <div class="drawer-body" id="cartBody"></div>
        <div class="drawer-foot" id="cartFoot" hidden>
          <div class="flex-between"><span>Subtotal</span><strong id="cartSubtotal">$0</strong></div>
          <p class="small muted">Shipping &amp; taxes calculated at checkout.</p>
          <button class="btn btn-primary btn-block btn-lg" id="checkoutBtn">Checkout</button>
          <button class="btn btn-text" data-close-drawer>Continue shopping</button>
        </div>
      </aside>
      <aside class="drawer from-left" id="sizeDrawer" role="dialog" aria-modal="true" aria-label="Find my size" inert>
        <div class="drawer-head"><strong>Find my size</strong>
          <button class="icon-btn" data-close-drawer aria-label="Close">${svg("close")}</button></div>
        <div class="drawer-body stack">
          <p class="muted">Wrap a strip of paper or a soft tape around your wrist (bracelets) or the base of your finger (rings), snug but not tight.</p>
          <table class="size-table">
            <thead><tr><th>Size</th><th>Wrist</th><th>Ring (US)</th></tr></thead>
            <tbody>
              <tr><td>XS</td><td>14–15 cm</td><td>5–6</td></tr>
              <tr><td>S</td><td>15–16.5 cm</td><td>6–7</td></tr>
              <tr><td>M</td><td>16.5–18 cm</td><td>8</td></tr>
              <tr><td>L</td><td>18–19.5 cm</td><td>9–10</td></tr>
            </tbody>
          </table>
          <p class="small muted">Between sizes? Cords are adjustable — size down. Rings — size up.</p>
        </div>
      </aside>`;
    const mount = document.body.appendChild(document.createElement("div"));
    mount.id = "overlays"; mount.innerHTML = html;
    $("#scrim").addEventListener("click", closeDrawers);
    $$("[data-close-drawer]").forEach((b) => b.addEventListener("click", closeDrawers));
    $("#checkoutBtn").addEventListener("click", () => toast("Checkout is external — stubbed in this design build.", "info"));
    syncCart();
  }

  function renderCartBody() {
    const body = $("#cartBody"); if (!body) return;
    const foot = $("#cartFoot");
    if (!cart.length) {
      foot.hidden = true;
      body.innerHTML = `<div class="empty-state">
        ${svg("cart", "ico")}
        <div><h3>Your cart is empty</h3><p class="muted mt-2">Pick your signal — Social or Dating — and wear it out.</p></div>
        <a class="btn btn-primary" href="shop.html" data-close-drawer>Shop Unello</a>
      </div>`;
      body.querySelector("[data-close-drawer]")?.addEventListener("click", closeDrawers);
      return;
    }
    foot.hidden = false;
    const sub = cartSubtotal();
    const remain = Math.max(0, FREE_SHIP - sub);
    const pct = Math.min(100, (sub / FREE_SHIP) * 100);
    const ship = `<div class="ship-bar">
      <div class="small">${remain > 0 ? `You're ${money(remain)} from <strong>free shipping</strong>` : `🎉 You've unlocked <strong>free shipping</strong>`}</div>
      <div class="track"><div class="fill" style="width:${pct}%"></div></div>
    </div>`;

    const lines = cart.map((l, i) => {
      const p = U.getProduct(l.id);
      return `<div class="cart-line" data-tier="${p.tier}">
        <img src="${p.images[0]}" alt="${p.name}">
        <div class="info">
          <div class="row"><strong class="small">${p.name}</strong><span class="price small">${money(p.price * l.qty)}</span></div>
          <div class="small muted flex" style="align-items:center;gap:6px">${signal(p.tier, "sm")} ${U.tiers[p.tier].label} · Size ${l.size}</div>
          <div class="row mt-2">
            <div class="stepper" aria-label="Quantity for ${p.name}">
              <button data-dec="${i}" aria-label="Decrease">−</button>
              <input value="${l.qty}" inputmode="numeric" aria-label="Quantity" data-qty="${i}">
              <button data-inc="${i}" aria-label="Increase">+</button>
            </div>
            <button class="link-remove" data-rm="${i}">Remove</button>
          </div>
        </div>
      </div>`;
    }).join("");

    // cross-sell: a piece from the cart's first tier not already in cart
    const inCart = new Set(cart.map((l) => l.id));
    const firstTier = U.getProduct(cart[0].id).tier;
    const xs = U.byTier(firstTier).find((p) => !inCart.has(p.id) && p.inventory !== "out");
    const cross = xs ? `<div class="mt-5"><div class="eyebrow">Complete the set</div>
      <div class="cart-line" data-tier="${xs.tier}" style="border:0">
        <img src="${xs.images[0]}" alt="${xs.name}">
        <div class="info">
          <div class="row"><strong class="small">${xs.name}</strong><span class="price small">${money(xs.price)}</span></div>
          <p class="small muted">${xs.blurb}</p>
          <button class="btn btn-secondary" style="min-height:40px" data-xadd="${xs.id}" data-xsize="${xs.sizes[1] || xs.sizes[0]}">Add ${svg("plus")}</button>
        </div>
      </div></div>` : "";

    body.innerHTML = ship + `<div class="mt-4">${lines}</div>` + cross;
    $("#cartSubtotal").textContent = money(sub);

    body.querySelectorAll("[data-inc]").forEach((b) => b.onclick = () => setQty(+b.dataset.inc, cart[+b.dataset.inc].qty + 1));
    body.querySelectorAll("[data-dec]").forEach((b) => b.onclick = () => setQty(+b.dataset.dec, cart[+b.dataset.dec].qty - 1));
    body.querySelectorAll("[data-rm]").forEach((b) => b.onclick = () => { removeLine(+b.dataset.rm); toast("Removed.", "info"); });
    body.querySelectorAll("[data-qty]").forEach((inp) => inp.onchange = () => { const q = parseInt(inp.value) || 1; setQty(+inp.dataset.qty, q); });
    body.querySelectorAll("[data-xadd]").forEach((b) => b.onclick = () => { addToCart(b.dataset.xadd, b.dataset.xsize); toast("Added to your set."); });
  }

  /* ---------------- drawers / focus / scroll lock ---------------- */
  let lastFocus = null;
  function lockScroll(on) { document.documentElement.style.overflow = on ? "hidden" : ""; }
  function openDrawer(which) {
    lastFocus = document.activeElement;
    $("#scrim").classList.add("open");
    const el = which === "size" ? $("#sizeDrawer") : $("#cartDrawer");
    el.classList.add("open"); el.removeAttribute("inert");
    lockScroll(true);
    el.querySelector("button, a, input")?.focus();
  }
  U.openDrawer = openDrawer;
  function closeDrawers() {
    $("#scrim")?.classList.remove("open");
    $$(".drawer").forEach((d) => { d.classList.remove("open"); d.setAttribute("inert", ""); });
    lockScroll(false);
    lastFocus?.focus();
  }
  U.closeDrawers = closeDrawers;

  /* ---------------- modal (waitlist / pre-order) ---------------- */
  function renderModal() {
    const html = `<div class="modal" id="waitModal" role="dialog" aria-modal="true" aria-labelledby="waitTitle" inert>
      <div class="scrim" data-close-modal style="position:absolute"></div>
      <div class="modal-card">
        <button class="icon-btn modal-close" data-close-modal aria-label="Close">${svg("close")}</button>
        <div id="waitForm">
          <div class="eyebrow" id="waitKind">Join the waitlist</div>
          <h2 id="waitTitle" class="mt-2">You're early — we'll hold your spot.</h2>
          <p class="muted mt-2" id="waitSub">Tell us where to reach you. No spam, just the drop.</p>
          <form class="stack mt-5" id="waitlistForm" novalidate>
            <div class="field"><label for="wname">Name <span class="req">*</span></label>
              <input class="input" id="wname" name="name" required autocomplete="name"><span class="field-error">Please add your name.</span></div>
            <div class="field"><label for="wemail">Email <span class="req">*</span></label>
              <input class="input" id="wemail" name="email" type="email" required autocomplete="email"><span class="field-error">Enter a valid email.</span></div>
            <div class="field"><label for="wproduct">Product <span class="req">*</span></label>
              <input class="input" id="wproduct" name="product" readonly></div>
            <div class="field"><label for="wtier">Tier <span class="req">*</span></label>
              <select class="select" id="wtier" name="tier"><option value="social">Social — Sun</option><option value="dating">Dating — Rose</option></select></div>
            <button class="btn btn-primary btn-block btn-lg" type="submit" id="waitSubmit">Join the waitlist</button>
          </form>
        </div>
        <div id="waitDone" hidden class="center stack">
          <span class="signal lg" data-tier="social" style="margin-inline:auto"></span>
          <h2>You're on the list.</h2>
          <p class="muted">We'll email you the moment it's back. Welcome to the movement.</p>
          <button class="btn btn-primary" data-close-modal>Done</button>
        </div>
      </div>
    </div>`;
    const mount = document.body.appendChild(document.createElement("div"));
    mount.id = "modals"; mount.innerHTML = html;
    $$("[data-close-modal]").forEach((b) => b.addEventListener("click", closeModal));
    $("#waitlistForm").addEventListener("submit", onWaitSubmit);
  }
  function openWaitlist(product, kind) {
    lastFocus = document.activeElement;
    const m = $("#waitModal"); m.classList.add("open"); m.removeAttribute("inert"); lockScroll(true);
    $("#waitForm").hidden = false; $("#waitDone").hidden = true;
    const pre = kind === "pre";
    $("#waitKind").textContent = pre ? "Pre-order" : "Join the waitlist";
    $("#waitTitle").textContent = pre ? "Reserve yours — ships in 3–4 weeks." : "You're early — we'll hold your spot.";
    $("#waitSub").textContent = pre ? "Pre-order now and you're first in line when it ships." : "Tell us where to reach you. No spam, just the drop.";
    $("#waitSubmit").textContent = pre ? "Pre-order now" : "Join the waitlist";
    $("#waitProduct") || $("#wproduct").setAttribute("value", "");
    if (product) { $("#wproduct").value = product.name; $("#wtier").value = product.tier; $("#waitDone .signal").setAttribute("data-tier", product.tier); }
    $("#wname").focus();
  }
  U.openWaitlist = openWaitlist;
  function closeModal() { const m = $("#waitModal"); m.classList.remove("open"); m.setAttribute("inert", ""); lockScroll(false); lastFocus?.focus(); }
  function onWaitSubmit(e) {
    e.preventDefault();
    const f = e.target;
    let ok = true;
    ["wname", "wemail"].forEach((id) => {
      const el = $("#" + id), field = el.closest(".field");
      const bad = id === "wemail" ? !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(el.value) : !el.value.trim();
      field.dataset.invalid = bad; el.setAttribute("aria-invalid", bad); if (bad) ok = false;
    });
    if (!ok) return;
    $("#waitForm").hidden = true; $("#waitDone").hidden = false;
    $("#waitDone .signal").setAttribute("data-tier", $("#wtier").value);
    f.reset();
  }

  /* ---------------- toast ---------------- */
  function renderToastWrap() { const w = document.createElement("div"); w.className = "toast-wrap"; w.id = "toasts"; w.setAttribute("aria-live", "polite"); document.body.appendChild(w); }
  function toast(msg, type = "success", action) {
    const w = $("#toasts"); if (!w) return;
    const t = document.createElement("div");
    t.className = "toast" + (type === "error" ? " error" : "");
    t.innerHTML = `${svg(type === "error" ? "alert" : type === "info" ? "spark" : "check")}<span>${msg}</span>${action ? `<a href="#" data-act>${action.label}</a>` : ""}`;
    w.appendChild(t);
    if (action) t.querySelector("[data-act]").onclick = (e) => { e.preventDefault(); action.fn(); t.remove(); };
    requestAnimationFrame(() => t.classList.add("show"));
    setTimeout(() => { t.classList.remove("show"); setTimeout(() => t.remove(), 300); }, action ? 5000 : 2600);
  }
  U.toast = toast;

  /* ---------------- icon hydration ----------------
     Lets static HTML place icons with <i data-ico="arrow"></i>.        */
  function hydrateIcons(root = document) {
    $$("[data-ico]", root).forEach((el) => {
      if (el.dataset.icoDone) return; el.dataset.icoDone = "1";
      el.innerHTML = svg(el.dataset.ico, el.dataset.icoCls || "ico");
    });
  }
  U.hydrateIcons = hydrateIcons;

  /* ---------------- accordion ---------------- */
  function initAccordions(root = document) {
    $$(".accordion-trigger", root).forEach((btn) => {
      if (btn.dataset.bound) return; btn.dataset.bound = "1";
      btn.addEventListener("click", () => {
        const open = btn.getAttribute("aria-expanded") === "true";
        btn.setAttribute("aria-expanded", String(!open));
      });
    });
  }
  U.initAccordions = initAccordions;

  /* ---------------- captures (email) ---------------- */
  function initCaptures(root = document) {
    $$("[data-capture]", root).forEach((form) => {
      if (form.dataset.bound) return; form.dataset.bound = "1";
      form.addEventListener("submit", (e) => {
        e.preventDefault();
        const email = form.querySelector('input[type="email"]');
        if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) { email.setAttribute("aria-invalid", "true"); toast("Enter a valid email.", "error"); return; }
        email.setAttribute("aria-invalid", "false"); form.reset();
        toast("You're in. We'll be in touch.");
      });
    });
  }
  U.initCaptures = initCaptures;

  /* ---------------- reveal on scroll ---------------- */
  function prefersReduced() { return window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches; }
  function initReveal() {
    if (prefersReduced()) { $$(".reveal").forEach((el) => el.classList.add("in")); return; }
    const io = new IntersectionObserver((es) => es.forEach((en) => { if (en.isIntersecting) { en.target.classList.add("in"); io.unobserve(en.target); } }), { threshold: 0.12 });
    $$(".reveal").forEach((el) => io.observe(el));
  }
  U.initReveal = initReveal;

  /* ---------------- product card (reusable) ---------------- */
  U.productCard = function (p) {
    const t = U.tiers[p.tier];
    const inv = U.invBadge(p.inventory);
    const soldOut = p.inventory === "out";
    const pre = p.inventory === "pre";
    let cta;
    if (soldOut) cta = `<button class="btn btn-secondary btn-block quick-add" data-waitlist="${p.id}">Join the waitlist</button>`;
    else if (pre) cta = `<button class="btn btn-tier btn-block quick-add" data-tier="${p.tier}" data-preorder="${p.id}">Pre-order</button>`;
    else cta = `<button class="btn btn-primary btn-block quick-add" data-quickadd="${p.id}">Quick add ${svg("plus")}</button>`;
    return `<article class="card product-card" data-tier="${p.tier}">
      <div class="product-media">
        <a href="product.html?id=${p.id}" aria-label="${p.name}" tabindex="-1">
          <img src="${p.images[0]}" alt="${p.name}" loading="lazy">
          <img class="img-2" src="${p.images[1]}" alt="" loading="lazy">
        </a>
        ${signal(p.tier, "md")}
        ${cta}
      </div>
      <div class="product-body">
        <a href="product.html?id=${p.id}" class="product-title">${p.name}</a>
        <span class="small muted">${t.label} · ${p.type}</span>
        <div class="product-meta"><span class="price">${money(p.price)}</span>${inv}</div>
      </div>
    </article>`;
  };
  U.invBadge = function (inv) {
    if (inv === "in") return `<span class="badge in"><span class="dot"></span>In stock</span>`;
    if (inv === "low") return `<span class="badge low"><span class="dot"></span>Only a few left</span>`;
    if (inv === "out") return `<span class="badge out"><span class="dot"></span>Sold out</span>`;
    if (inv === "pre") return `<span class="badge pre"><span class="dot"></span>Pre-order</span>`;
    return "";
  };

  /* delegate quick-add / waitlist / preorder on any product grid */
  document.addEventListener("click", (e) => {
    const qa = e.target.closest("[data-quickadd]");
    if (qa) { e.preventDefault(); const p = U.getProduct(qa.dataset.quickadd); addToCart(p.id, p.sizes[1] || p.sizes[0]); toast("Added.", "success", { label: "View cart", fn: () => openDrawer("cart") }); return; }
    const wl = e.target.closest("[data-waitlist]");
    if (wl) { e.preventDefault(); openWaitlist(U.getProduct(wl.dataset.waitlist), "waitlist"); return; }
    const po = e.target.closest("[data-preorder]");
    if (po) { e.preventDefault(); openWaitlist(U.getProduct(po.dataset.preorder), "pre"); return; }
    const fs = e.target.closest("[data-find-size]");
    if (fs) { e.preventDefault(); openDrawer("size"); }
  });

  /* global ESC */
  document.addEventListener("keydown", (e) => {
    if (e.key !== "Escape") return;
    if ($("#waitModal")?.classList.contains("open")) return closeModal();
    if ($(".drawer.open")) return closeDrawers();
    if ($("#mobileSheet")?.classList.contains("open")) { $("#mobileSheet").classList.remove("open"); $("#mobileSheet").setAttribute("inert", ""); $("#menuBtn").setAttribute("aria-expanded", "false"); lockScroll(false); }
  });

  /* ---------------- boot ---------------- */
  U.mountChrome = function (opts = {}) {
    renderHeader(opts); renderFooter(); renderCartDrawer(); renderModal(); renderToastWrap();
    hydrateIcons(); initAccordions(); initCaptures(); initReveal();
  };

  document.addEventListener("DOMContentLoaded", () => { if (!window.__noAutoChrome) U.mountChrome(); });
})();
