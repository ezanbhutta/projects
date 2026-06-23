/* Assemble a single self-contained, responsive HTML file (SPA) from the
   multi-page source: inlines CSS, inlines SVG assets as data URIs, and
   wires up in-page navigation so all pages live in one openable file. */
import { readFileSync, writeFileSync } from 'fs';

const css = readFileSync('assets/styles.css', 'utf8');

// --- inline SVG assets as data URIs ---
const svgAssets = ['logo', 'headshot', 'svc-supply', 'svc-biz', 'svc-partner'];
const dataUri = {};
for (const name of svgAssets) {
  const svg = readFileSync(`assets/${name}.svg`, 'utf8');
  dataUri[name] = 'data:image/svg+xml,' + encodeURIComponent(svg);
}

const pages = [
  { id: 'home',     file: 'index.html' },
  { id: 'about',    file: 'about.html' },
  { id: 'services', file: 'services.html' },
  { id: 'contact',  file: 'contact.html' },
  { id: 'privacy',  file: 'privacy.html' },
];

const fileToNav = {
  'index.html': 'home', 'about.html': 'about', 'services.html': 'services',
  'contact.html': 'contact', 'privacy.html': 'privacy',
};

function extractMain(html) {
  // everything between the end of </header> and the start of <footer
  const start = html.indexOf('</header>') + '</header>'.length;
  const end = html.indexOf('<footer');
  return html.slice(start, end).trim();
}

function rewrite(content) {
  // inline asset images
  for (const name of svgAssets) {
    content = content.split(`assets/${name}.svg`).join(dataUri[name]);
  }
  // rewrite page links to in-app navigation
  content = content.replace(/href="(index|about|services|contact|privacy)\.html"/g,
    (_, p) => `href="#" data-nav="${fileToNav[p + '.html']}"`);
  return content;
}

const sections = pages.map(p => {
  const html = readFileSync(p.file, 'utf8');
  const main = rewrite(extractMain(html));
  return `<div class="page" id="page-${p.id}"${p.id !== 'home' ? ' hidden' : ''}>\n${main}\n</div>`;
}).join('\n\n');

const navItem = (id, label, active) =>
  `<li><a href="#" data-nav="${id}"${active ? ' class="active"' : ''}>${label}</a></li>`;

const header = `
<div class="topbar"><div class="wrap">
  <span><span class="dot"></span>Now booking Q3 Discovery Consultations</span>
  <span class="r">International · US &amp; Latin America &nbsp;·&nbsp; <a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></span>
</div></div>
<header class="site-header"><div class="wrap nav">
  <a class="brand" href="#" data-nav="home"><img src="${dataUri.logo}" alt="IANEX Global"></a>
  <nav><ul class="nav-links" id="navlinks">
    ${navItem('home','Home',true)}
    ${navItem('about','About')}
    ${navItem('services','Services')}
    ${navItem('contact','Contact')}
  </ul></nav>
  <div class="nav-cta"><a class="btn btn-gold" href="#" data-nav="contact"><span class="lbl">Book a Consultation</span><span class="arr">→</span></a>
    <button class="menu-btn" id="menuBtn" aria-label="Menu">☰</button></div>
</div></header>`;

const footer = `
<footer class="site-footer"><div class="wrap">
  <div class="foot-top">
    <div>
      <a class="brand" href="#" data-nav="home"><img src="${dataUri.logo}" alt="IANEX Global"></a>
      <p class="blurb">Strategic consulting in supply chain, business development, and international trade for companies expanding across global markets.</p>
    </div>
    <div class="foot-col"><h5>Navigate</h5><ul>
      <li><a href="#" data-nav="home">Home</a></li><li><a href="#" data-nav="about">About</a></li>
      <li><a href="#" data-nav="services">Services</a></li><li><a href="#" data-nav="contact">Contact</a></li>
    </ul></div>
    <div class="foot-col"><h5>Services</h5><ul>
      <li><a href="#" data-nav="services">Supply Chain Solutions</a></li>
      <li><a href="#" data-nav="services">Business Development</a></li>
      <li><a href="#" data-nav="services">International Partnerships</a></li>
    </ul></div>
    <div class="foot-col"><h5>Get in Touch</h5><ul>
      <li><a href="#" data-nav="contact">Schedule a Consultation</a></li>
      <li><a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></li>
      <li><a href="#" data-nav="contact">Send an Enquiry</a></li>
    </ul></div>
  </div>
  <div class="foot-bottom">
    <span>© 2026 IANEX Global Services. All rights reserved.</span>
    <span><a href="#" data-nav="privacy">Privacy Policy</a> &nbsp;·&nbsp; Designed by HaseebMadeIt · Storm Designs</span>
  </div>
</div></footer>`;

const out = `<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IANEX Global Services — Website Concept</title>
<meta name="description" content="Custom website concept for IANEX Global Services — supply chain, business development, and international trade consulting.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500;1,9..144,600&family=Inter:wght@400;500;600&family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
<style>
${css}

/* single-file extras */
.page[hidden]{display:none}
.menu-btn{display:none;background:transparent;border:1px solid var(--hair-gold);color:#fff;width:46px;height:46px;border-radius:10px;font-size:18px;cursor:pointer}
.nav-links.open{display:flex}
@media(max-width:1000px){
  .menu-btn{display:inline-grid;place-items:center}
  .nav-links{position:absolute;top:88px;left:0;right:0;flex-direction:column;gap:4px;
    background:var(--navy-900);padding:16px var(--gutter);border-bottom:1px solid var(--hair-gold);display:none}
  .nav-links.open{display:flex}
  .nav-links a{padding:14px 8px;border-radius:8px}
}
</style>
</head>
<body>
${header}
<main id="app">
${sections}
</main>
${footer}
<script>
(function(){
  var links = document.querySelectorAll('[data-nav]');
  var pages = document.querySelectorAll('.page');
  var navlinks = document.getElementById('navlinks');
  var menuBtn = document.getElementById('menuBtn');
  function show(id){
    pages.forEach(function(p){ p.hidden = (p.id !== 'page-'+id); });
    navlinks.querySelectorAll('a').forEach(function(a){
      a.classList.toggle('active', a.getAttribute('data-nav')===id);
    });
    if(navlinks) navlinks.classList.remove('open');
    window.scrollTo({top:0,behavior:'instant'});
  }
  links.forEach(function(a){
    a.addEventListener('click', function(e){
      e.preventDefault();
      var id = a.getAttribute('data-nav');
      if(id) show(id);
    });
  });
  if(menuBtn){ menuBtn.addEventListener('click', function(){ navlinks.classList.toggle('open'); }); }
  // contact form: prevent reload, show inline success
  document.addEventListener('submit', function(e){
    e.preventDefault();
    var btn = e.target.querySelector('button[type=submit]');
    if(btn){ btn.textContent = 'Message sent ✓'; btn.style.background='#155E63'; btn.style.color='#fff'; }
  });
})();
</script>
</body>
</html>`;

writeFileSync('ianex-global-website.html', out);
console.log('Wrote ianex-global-website.html  (' + (out.length/1024).toFixed(0) + ' KB)');
