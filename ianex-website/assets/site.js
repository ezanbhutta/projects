/* IANEX Global — v5 interaction layer (vanilla + Lenis). */
(function () {
  'use strict';
  var doc = document, root = doc.documentElement;
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var renderMode = doc.body.classList.contains('render-mode');

  /* ---- nav stuck (rAF-throttled, paint-cheap) ---- */
  var nav = doc.getElementById('nav');
  var stuck = false, ticking = false;
  function applyNav(y){ var s = y > 20; if (s !== stuck && nav){ stuck = s; nav.classList.toggle('stuck', s); } }
  function onScroll(){
    if (ticking) return; ticking = true;
    requestAnimationFrame(function(){ applyNav(window.scrollY || root.scrollTop); ticking = false; });
  }

  /* ---- smooth scroll (Lenis) — snappy, frame-rate independent ---- */
  var isTouch = matchMedia('(hover:none)').matches;
  if (window.Lenis && !reduce && !renderMode && !isTouch) {
    var lenis = new Lenis({ lerp: 0.12, wheelMultiplier: 1, smoothWheel: true });
    function raf(t){ lenis.raf(t); requestAnimationFrame(raf); }
    requestAnimationFrame(raf);
    lenis.on('scroll', function(){ applyNav(window.scrollY || root.scrollTop); });
  } else {
    window.addEventListener('scroll', onScroll, { passive: true });
  }
  onScroll();

  /* ---- reveal on scroll ---- */
  var reveals = [].slice.call(doc.querySelectorAll('[data-reveal]'));
  if ('IntersectionObserver' in window && !reduce) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: 0.14, rootMargin: '0px 0px -6% 0px' });
    reveals.forEach(function (el) { io.observe(el); });
  } else { reveals.forEach(function (el) { el.classList.add('in'); }); }

  /* ---- count up ---- */
  function countEl(el) {
    var target = parseFloat(el.getAttribute('data-count')), t0 = null;
    if (reduce) { el.textContent = target; return; }
    (function step(ts){ if(!t0)t0=ts; var k=Math.min((ts-t0)/1300,1),e=1-Math.pow(1-k,3);
      el.textContent = Math.round(target*e); if(k<1) requestAnimationFrame(step); })(performance.now());
  }
  var counters = [].slice.call(doc.querySelectorAll('[data-count]'));
  if ('IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { countEl(e.target); cio.unobserve(e.target); } });
    }, { threshold: 0.6 });
    counters.forEach(function (el) { cio.observe(el); });
  } else { counters.forEach(function (el) { el.textContent = el.getAttribute('data-count'); }); }

  /* ---- spotlight tiles (pointer-follow highlight) ---- */
  if (matchMedia('(hover:hover)').matches) {
    [].slice.call(doc.querySelectorAll('.spotlight')).forEach(function (t) {
      t.addEventListener('mousemove', function (e) {
        var r = t.getBoundingClientRect();
        t.style.setProperty('--mx', (e.clientX - r.left) + 'px');
        t.style.setProperty('--my', (e.clientY - r.top) + 'px');
      });
    });
  }

  /* ---- mobile menu ---- */
  var burger = doc.getElementById('burger'), menu = doc.getElementById('mobileMenu');
  if (burger && menu) {
    burger.addEventListener('click', function () { menu.classList.toggle('open'); burger.classList.toggle('on'); });
    menu.addEventListener('click', function (e) { if (e.target.tagName === 'A') menu.classList.remove('open'); });
  }

  /* ---- form demo ---- */
  doc.addEventListener('submit', function (e) {
    e.preventDefault();
    var btn = e.target.querySelector('button[type=submit]');
    if (btn) { btn.textContent = 'Message sent ✓'; btn.style.background = 'var(--ok)'; }
  });
})();
