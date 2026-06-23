/* IANEX Global. Interaction layer (vanilla, no dependencies). */
(function () {
  'use strict';
  var doc = document, root = doc.documentElement;
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- scroll progress + sticky header ---- */
  var progress = doc.getElementById('progress');
  var header = doc.getElementById('header');
  function onScroll() {
    var h = root.scrollHeight - root.clientHeight;
    var p = h > 0 ? (root.scrollTop || doc.body.scrollTop) / h : 0;
    if (progress) progress.style.width = (p * 100).toFixed(2) + '%';
    if (header) header.classList.toggle('stuck', (root.scrollTop || doc.body.scrollTop) > 12);
    approachTick();
  }

  /* ---- reveal on scroll ---- */
  var reveals = [].slice.call(doc.querySelectorAll('[data-reveal], .lines'));
  if ('IntersectionObserver' in window && !reduce) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('in'); });
  }

  /* ---- count up ---- */
  var counters = [].slice.call(doc.querySelectorAll('[data-count]'));
  function runCount(el) {
    var target = parseFloat(el.getAttribute('data-count')), t0 = null, dur = 1400;
    if (reduce) { el.textContent = target; return; }
    function step(ts) {
      if (!t0) t0 = ts;
      var k = Math.min((ts - t0) / dur, 1), eased = 1 - Math.pow(1 - k, 3);
      el.textContent = Math.round(target * eased);
      if (k < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  if ('IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { if (e.isIntersecting) { runCount(e.target); cio.unobserve(e.target); } });
    }, { threshold: 0.6 });
    counters.forEach(function (el) { cio.observe(el); });
  } else { counters.forEach(function (el) { el.textContent = el.getAttribute('data-count'); }); }

  /* ---- approach pinned stepper ---- */
  var approach = doc.getElementById('approach');
  var steps = approach ? [].slice.call(approach.querySelectorAll('.step')) : [];
  var ticks = approach ? [].slice.call(approach.querySelectorAll('.track .t')) : [];
  var curStep = -1;
  function approachTick() {
    if (!approach || steps.length === 0) return;
    if (matchMedia('(max-width:980px)').matches) return;
    var rect = approach.getBoundingClientRect();
    var total = approach.offsetHeight - window.innerHeight;
    if (total <= 0) return;
    var p = Math.min(Math.max(-rect.top / total, 0), 0.999);
    var idx = Math.min(steps.length - 1, Math.floor(p * steps.length));
    if (idx !== curStep) {
      curStep = idx;
      steps.forEach(function (s, i) { s.classList.toggle('on', i === idx); });
      ticks.forEach(function (t, i) { t.classList.toggle('on', i === idx); });
    }
  }

  /* ---- mobile menu ---- */
  var menuBtn = doc.getElementById('menuBtn'), navlinks = doc.getElementById('navlinks');
  if (menuBtn && navlinks) menuBtn.addEventListener('click', function () { navlinks.classList.toggle('open'); });

  /* ---- contact form (demo) ---- */
  doc.addEventListener('submit', function (e) {
    e.preventDefault();
    var btn = e.target.querySelector('button[type=submit]');
    if (btn) { btn.innerHTML = '<span class="dot"></span>Message sent'; btn.style.background = 'var(--navy)'; btn.style.borderColor = 'var(--navy)'; btn.style.color = 'var(--bone)'; }
  });

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll);
  onScroll();
})();
