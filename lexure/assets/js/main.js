/* =====================================================================
   LEXURE — interactions
   Vanilla JS. One rAF loop drives cursor, parallax, hero + image expansion.
   ===================================================================== */
(() => {
  'use strict';

  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const fine = window.matchMedia('(pointer: fine)').matches;
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => Array.from(c.querySelectorAll(s));
  const clamp = (v, a, b) => Math.min(Math.max(v, a), b);
  const lerp = (a, b, t) => a + (b - a) * t;
  const easeInOut = t => (t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2);

  document.getElementById('year').textContent = new Date().getFullYear();

  /* ---------------------------------------------------------------
     PRELOADER
  --------------------------------------------------------------- */
  const preloader = $('#preloader');
  const heroTitle = $('.hero__title');

  function finishLoad() {
    document.body.classList.remove('is-locked');
    if (heroTitle) heroTitle.classList.add('is-loaded');
    document.body.classList.add('is-loaded');
  }

  if (reduce || !preloader) {
    finishLoad();
  } else {
    document.body.classList.add('is-locked');
    const bar = $('#preBar');
    const countEl = $('#preCount');
    const start = performance.now();
    const DUR = 1500;
    (function tick(now) {
      const p = clamp((now - start) / DUR, 0, 1);
      const eased = easeInOut(p);
      if (bar) bar.style.width = (eased * 100) + '%';
      if (countEl) countEl.textContent = String(Math.round(eased * 100)).padStart(2, '0');
      if (p < 1) {
        requestAnimationFrame(tick);
      } else {
        preloader.classList.add('is-done');
        finishLoad();
        setTimeout(() => preloader.remove(), 1100);
      }
    })(start);
  }

  /* ---------------------------------------------------------------
     CUSTOM CURSOR
  --------------------------------------------------------------- */
  const cursor = $('#cursor');
  const cursorLabel = $('#cursorLabel');
  const mouse = { x: innerWidth / 2, y: innerHeight / 2 };
  const cpos = { x: mouse.x, y: mouse.y };

  if (fine && cursor && !reduce) {
    document.body.classList.add('cursor-on');
    cursor.style.opacity = '0';
    cursor.style.transition = 'opacity .4s ease, width .3s cubic-bezier(.19,1,.22,1), height .3s cubic-bezier(.19,1,.22,1), background .3s, border-color .3s';
    let cursorShown = false;
    addEventListener('mousemove', e => {
      mouse.x = e.clientX; mouse.y = e.clientY;
      if (!cursorShown) { cursorShown = true; cursor.style.opacity = '1'; }
    }, { passive: true });

    const hoverSel = 'a, button, [data-cursor], .card__media, .svc';
    document.addEventListener('mouseover', e => {
      const t = e.target.closest(hoverSel);
      if (!t) return;
      cursor.classList.add('is-active');
      cursorLabel.textContent = t.getAttribute('data-cursor') || '';
    });
    document.addEventListener('mouseout', e => {
      if (e.target.closest(hoverSel)) cursor.classList.remove('is-active');
    });
  } else if (cursor) {
    cursor.style.display = 'none';
  }

  /* ---------------------------------------------------------------
     MAGNETIC BUTTONS
  --------------------------------------------------------------- */
  if (fine && !reduce) {
    $$('[data-magnetic]').forEach(el => {
      const strength = 0.32;
      el.addEventListener('mousemove', e => {
        const r = el.getBoundingClientRect();
        const dx = e.clientX - (r.left + r.width / 2);
        const dy = e.clientY - (r.top + r.height / 2);
        el.style.transform = `translate(${dx * strength}px, ${dy * strength}px)`;
      });
      el.addEventListener('mouseleave', () => { el.style.transform = ''; });
    });
  }

  /* ---------------------------------------------------------------
     HEADER — solidify + hide on scroll-down
  --------------------------------------------------------------- */
  const header = $('#header');
  let lastY = 0;
  function updateHeader(y) {
    header.classList.toggle('is-solid', y > 80);
    if (y > innerHeight * 0.9 && y > lastY + 4) header.classList.add('is-hidden');
    else if (y < lastY - 4 || y < 120) header.classList.remove('is-hidden');
    lastY = y;
  }

  /* ---------------------------------------------------------------
     MOBILE MENU
  --------------------------------------------------------------- */
  const menuToggle = $('#menuToggle');
  const mobileMenu = $('#mobileMenu');
  function closeMenu() {
    menuToggle.classList.remove('is-open');
    mobileMenu.classList.remove('is-open');
    menuToggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('is-locked');
  }
  if (menuToggle) {
    menuToggle.addEventListener('click', () => {
      const open = mobileMenu.classList.toggle('is-open');
      menuToggle.classList.toggle('is-open', open);
      menuToggle.setAttribute('aria-expanded', String(open));
      document.body.classList.toggle('is-locked', open);
    });
    $$('#mobileMenu a').forEach(a => a.addEventListener('click', closeMenu));
  }

  /* ---------------------------------------------------------------
     REVEAL ON SCROLL (blocks, fades, line masks)
  --------------------------------------------------------------- */
  const lineParents = new Set();
  $$('.line').forEach(l => {
    if (l.parentElement && !l.closest('.hero__title') && !l.closest('.preloader')) {
      lineParents.add(l.parentElement);
    }
  });
  lineParents.forEach(p => p.classList.add('reveal-lines'));

  const revealTargets = [
    ...$$('[data-reveal]'),
    ...$$('[data-fade]'),
    ...lineParents
  ];

  if ('IntersectionObserver' in window && !reduce) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(en => {
        if (en.isIntersecting) {
          en.target.classList.add('is-in');
          io.unobserve(en.target);
        }
      });
    }, { rootMargin: '0px 0px -12% 0px', threshold: 0 });
    revealTargets.forEach(t => io.observe(t));
  } else {
    revealTargets.forEach(t => t.classList.add('is-in'));
  }

  /* ---------------------------------------------------------------
     COUNTERS
  --------------------------------------------------------------- */
  function runCounter(el) {
    const target = parseFloat(el.dataset.count);
    const dec = parseInt(el.dataset.decimals || '0', 10);
    if (reduce) { el.textContent = target.toFixed(dec); return; }
    const dur = 1700;
    const t0 = performance.now();
    (function step(now) {
      const p = clamp((now - t0) / dur, 0, 1);
      const val = target * easeInOut(p);
      el.textContent = val.toFixed(dec);
      if (p < 1) requestAnimationFrame(step);
      else el.textContent = target.toFixed(dec);
    })(t0);
  }
  const counters = $$('[data-count]');
  if ('IntersectionObserver' in window && counters.length) {
    const cio = new IntersectionObserver((entries) => {
      entries.forEach(en => {
        if (en.isIntersecting) { runCounter(en.target); cio.unobserve(en.target); }
      });
    }, { threshold: 0.6 });
    counters.forEach(c => cio.observe(c));
  } else {
    counters.forEach(runCounter);
  }

  /* ---------------------------------------------------------------
     PARALLAX + HERO + IMAGE EXPANSION  (single rAF loop)
  --------------------------------------------------------------- */
  const parallaxEls = $$('[data-parallax]:not([data-reveal])').map(el => ({
    el, speed: parseFloat(el.dataset.parallax) || 0
  }));

  const hero = $('#hero');
  const heroImg = $('[data-hero-img]');
  const heroContent = $('.hero__content');

  // Image expansion refs
  const sig = $('[data-expand]');
  const frame = $('[data-expand-frame]');
  const frameImg = frame ? frame.querySelector('img') : null;
  const innerScrim = frame ? frame.querySelector('.signature__inner-scrim') : null;
  const capIntro = $('[data-expand-intro]');
  const capFull = $('[data-expand-full]');

  let startX = 27, startY = 19;
  function computeStart() {
    startX = innerWidth <= 640 ? 8 : innerWidth <= 1024 ? 20 : 27;
    startY = innerWidth <= 640 ? 14 : 19;
  }
  computeStart();
  addEventListener('resize', computeStart);

  function setExpansion(eased) {
    if (!frame) return;
    const iy = lerp(startY, 0, eased);
    const ix = lerp(startX, 0, eased);
    const r  = lerp(16, 0, eased);
    frame.style.clipPath = `inset(${iy}vh ${ix}vw round ${r}px)`;
    if (frameImg) frameImg.style.transform = `scale(${lerp(1.22, 1, eased)})`;
    if (innerScrim) innerScrim.style.opacity = String(lerp(0.42, 0.95, eased));
  }

  if (reduce) {
    // Static, fully-expanded signature; no parallax
    setExpansion(1);
    if (capIntro) capIntro.style.opacity = '0';
    if (capFull) { capFull.style.opacity = '1'; capFull.classList.add('is-live'); }
    let ticking = false;
    addEventListener('scroll', () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => { updateHeader(scrollY); ticking = false; });
    }, { passive: true });
  } else {
    let sy = scrollY;
    addEventListener('scroll', () => { sy = scrollY; }, { passive: true });

    (function raf() {
      // cursor
      if (fine && cursor) {
        cpos.x = lerp(cpos.x, mouse.x, 0.18);
        cpos.y = lerp(cpos.y, mouse.y, 0.18);
        cursor.style.transform = `translate(${cpos.x}px, ${cpos.y}px) translate(-50%,-50%)`;
      }

      updateHeader(sy);

      // hero parallax + fade
      const vh = innerHeight;
      if (hero && sy < vh * 1.1) {
        if (heroImg) heroImg.style.transform = `translate3d(0, ${sy * 0.32}px, 0)`;
        if (heroContent) {
          heroContent.style.transform = `translate3d(0, ${sy * 0.16}px, 0)`;
          heroContent.style.opacity = String(clamp(1 - sy / (vh * 0.85), 0, 1));
        }
      }

      // generic parallax
      for (const p of parallaxEls) {
        const r = p.el.getBoundingClientRect();
        if (r.bottom < -200 || r.top > vh + 200) continue;
        const offset = (r.top + r.height / 2) - vh / 2;
        p.el.style.transform = `translate3d(0, ${(offset * p.speed).toFixed(2)}px, 0)`;
      }

      // image expansion
      if (sig && frame) {
        const r = sig.getBoundingClientRect();
        const total = sig.offsetHeight - vh;
        const scrolled = clamp(-r.top, 0, total);
        const prog = total > 0 ? scrolled / total : 0;
        const e = clamp((prog - 0.06) / 0.62, 0, 1);
        const eased = easeInOut(e);
        setExpansion(eased);
        if (capIntro) {
          const io2 = clamp(1 - e * 1.5, 0, 1);
          capIntro.style.opacity = String(io2);
          capIntro.style.transform = `translateY(${lerp(0, -40, eased)}px) scale(${lerp(1, .96, eased)})`;
        }
        if (capFull) {
          const fo = clamp((e - 0.5) / 0.45, 0, 1);
          capFull.style.opacity = String(fo);
          capFull.classList.toggle('is-live', fo > 0.6);
        }
      }

      requestAnimationFrame(raf);
    })();
  }

  /* ---------------------------------------------------------------
     FORM
  --------------------------------------------------------------- */
  const form = $('#enquiry');
  if (form) {
    const status = $('#formStatus');
    form.addEventListener('submit', e => {
      e.preventDefault();
      const name = form.name;
      const email = form.email;
      let ok = true;
      [name, email].forEach(f => f.classList.remove('invalid'));
      if (!name.value.trim()) { name.classList.add('invalid'); ok = false; }
      if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) { email.classList.add('invalid'); ok = false; }
      if (!ok) {
        status.textContent = 'Please add your name and a valid email.';
        status.style.color = '#e0a89d';
        return;
      }
      status.style.color = '';
      status.textContent = `Thank you, ${name.value.trim().split(' ')[0]} — we'll be in touch within a day.`;
      form.reset();
    });
  }
})();
