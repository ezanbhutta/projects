/* Assemble a single self-contained, responsive SPA from the multi-page source:
   inlines CSS + JS + every referenced image as data URIs, and wires up in-page nav. */
import { readFileSync, writeFileSync, existsSync } from 'fs';

const css = readFileSync('assets/styles.css', 'utf8');
const siteJs = readFileSync('assets/site.js', 'utf8');

function toDataUri(file){
  const p = 'assets/' + file;
  if(!existsSync(p)) return null;
  if(file.endsWith('.svg')) return 'data:image/svg+xml,' + encodeURIComponent(readFileSync(p,'utf8'));
  if(file.endsWith('.jpg')||file.endsWith('.jpeg')) return 'data:image/jpeg;base64,' + readFileSync(p).toString('base64');
  if(file.endsWith('.png')) return 'data:image/png;base64,' + readFileSync(p).toString('base64');
  return null;
}

const pages = [
  { id:'home', file:'index.html' }, { id:'about', file:'about.html' },
  { id:'services', file:'services.html' }, { id:'contact', file:'contact.html' },
  { id:'privacy', file:'privacy.html' },
];
const fileToNav = {'index.html':'home','about.html':'about','services.html':'services','contact.html':'contact','privacy.html':'privacy'};

function extractMain(html){
  const mm = html.indexOf('id="mobileMenu"');
  const start = html.indexOf('</div>', mm) + '</div>'.length;
  const end = html.indexOf('<footer');
  return html.slice(start, end).trim();
}
function rewrite(content){
  content = content.replace(/assets\/([A-Za-z0-9_.-]+)/g, (m, f) => toDataUri(f) || m);
  content = content.replace(/href="(index|about|services|contact|privacy)\.html"/g,
    (_, p) => `href="#" data-nav="${fileToNav[p+'.html']}"`);
  return content;
}

const sections = pages.map(p => {
  const html = readFileSync(p.file,'utf8');
  return `<div class="page" id="page-${p.id}"${p.id!=='home'?' hidden':''}>\n${rewrite(extractMain(html))}\n</div>`;
}).join('\n\n');

const arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ar"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
const navlink = (id,label,active)=>`<a href="#" data-nav="${id}"${active?' class="active"':''}>${label}</a>`;

const nav = `
<nav class="nav-float" id="nav">
  <a class="brand" href="#" data-nav="home"><span class="mk">IX</span>IANEX<span class="g">Global</span></a>
  <div class="nav-mid">${navlink('home','Home',true)}${navlink('about','About')}${navlink('services','Services')}${navlink('contact','Contact')}</div>
  <div class="nav-right">
    <a class="btn btn-dark" href="#" data-nav="contact">Book a call ${arrow}</a>
    <button class="burger" id="burger" aria-label="Menu"><i></i><i></i></button>
  </div>
</nav>
<div class="mobile-menu" id="mobileMenu">
  ${navlink('home','Home',true)}${navlink('about','About')}${navlink('services','Services')}${navlink('contact','Contact')}
  <a class="btn btn-primary" href="#" data-nav="contact">Book a Discovery Call</a>
</div>`;

const footer = `
<footer class="footer"><div class="wrap">
  <div class="foot-top">
    <div class="foot-brand">
      <a class="brand" href="#" data-nav="home"><span class="mk">IX</span>IANEX<span class="g">Global</span></a>
      <p>Strategic consulting in supply chain, business development, and international trade.</p>
    </div>
    <div class="foot-col"><h5>Navigate</h5><ul><li><a href="#" data-nav="home">Home</a></li><li><a href="#" data-nav="about">About</a></li><li><a href="#" data-nav="services">Services</a></li><li><a href="#" data-nav="contact">Contact</a></li></ul></div>
    <div class="foot-col"><h5>Services</h5><ul><li><a href="#" data-nav="services">Supply Chain</a></li><li><a href="#" data-nav="services">Business Development</a></li><li><a href="#" data-nav="services">Partnerships</a></li></ul></div>
    <div class="foot-col"><h5>Contact</h5><ul><li><a href="#" data-nav="contact">Book a call</a></li><li><a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></li><li>US &amp; Latin America</li></ul></div>
  </div>
  <div class="foot-bottom"><span>© 2026 IANEX Global Services</span><span><a href="#" data-nav="privacy">Privacy Policy</a> · Designed by HaseebMadeIt, Storm Designs</span></div>
</div></footer>`;

const out = `<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IANEX Global Services — Supply Chain &amp; Business Development Consulting</title>
<meta name="description" content="Strategic consulting in supply chain, business development, and international trade for companies expanding across global markets.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
${css}
.page[hidden]{display:none}
</style>
</head>
<body>
${nav}
<main id="app">
${sections}
</main>
${footer}
<script src="https://unpkg.com/lenis@1.1.14/dist/lenis.min.js"></script>
<script>
${siteJs}
</script>
<script>
(function(){
  var pages=document.querySelectorAll('.page'),navs=document.querySelectorAll('[data-nav]'),
      menu=document.getElementById('mobileMenu');
  function animateCount(el){var t=parseFloat(el.getAttribute('data-count')),t0=null;
    (function s(ts){if(!t0)t0=ts;var k=Math.min((ts-t0)/1200,1),e=1-Math.pow(1-k,3);
    el.textContent=Math.round(t*e);if(k<1)requestAnimationFrame(s);})(performance.now());}
  function show(id){
    pages.forEach(function(p){p.hidden=(p.id!=='page-'+id);});
    navs.forEach(function(a){if(a.getAttribute('data-nav'))a.classList.toggle('active',a.getAttribute('data-nav')===id);});
    if(menu)menu.classList.remove('open');
    window.scrollTo({top:0});
    var pg=document.getElementById('page-'+id);
    pg.querySelectorAll('[data-reveal]').forEach(function(e){e.classList.add('in');});
    pg.querySelectorAll('[data-count]').forEach(animateCount);
  }
  navs.forEach(function(a){a.addEventListener('click',function(e){var id=a.getAttribute('data-nav');if(id){e.preventDefault();show(id);}});});
})();
</script>
</body>
</html>`;

writeFileSync('ianex-global-website.html', out);
console.log('Wrote ianex-global-website.html ('+(out.length/1024).toFixed(0)+' KB)');
