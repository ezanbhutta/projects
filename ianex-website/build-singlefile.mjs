/* Assemble a single self-contained, responsive HTML file (SPA) from the
   multi-page source: inlines CSS, inlines every referenced asset (SVG + JPG)
   as data URIs, and wires up in-page navigation. */
import { readFileSync, writeFileSync, existsSync } from 'fs';

const css = readFileSync('assets/styles.css', 'utf8');
const siteJs = readFileSync('assets/site.js', 'utf8');

// --- build data-URI map for every asset referenced as assets/<file> ---
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
  const start = html.indexOf('</header>') + '</header>'.length;
  const end = html.indexOf('<footer');
  return html.slice(start, end).trim();
}
function rewrite(content){
  // inline every assets/<file> reference
  content = content.replace(/assets\/([A-Za-z0-9_.-]+)/g, (m, f) => toDataUri(f) || m);
  // in-app navigation
  content = content.replace(/href="(index|about|services|contact|privacy)\.html"/g,
    (_, p) => `href="#" data-nav="${fileToNav[p+'.html']}"`);
  return content;
}

const sections = pages.map(p => {
  const html = readFileSync(p.file,'utf8');
  return `<div class="page" id="page-${p.id}"${p.id!=='home'?' hidden':''}>\n${rewrite(extractMain(html))}\n</div>`;
}).join('\n\n');

const navItem = (id,label,no,active)=>`<li><a href="#" data-nav="${id}"${active?' class="active"':''}><span>${no}</span>${label}</a></li>`;

const header = `
<div class="progress" id="progress"></div>
<div class="topbar"><div class="wrap">
  <span>Now booking Q3 Discovery Consultations</span>
  <span class="r">Int'l &middot; US &amp; Latin America &middot; <a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></span>
</div></div>
<header class="site-header" id="header"><div class="wrap nav">
  <a class="wordmark" href="#" data-nav="home">IANEX<span class="g">Global</span></a>
  <nav><ul class="nav-links" id="navlinks">
    ${navItem('home','Home','01',true)} ${navItem('about','About','02')} ${navItem('services','Services','03')} ${navItem('contact','Contact','04')}
  </ul></nav>
  <div class="nav-cta">
    <a class="btn btn-ochre" href="#" data-nav="contact">Book a Consultation<span class="ar"> →</span></a>
    <button class="menu-btn" id="menuBtn" aria-label="Menu"><i></i><i></i></button>
  </div>
</div></header>`;

const footer = `
<footer class="site-footer"><div class="wrap">
  <div class="foot-grid">
    <div class="foot-word">IANEX<span class="g">Global</span></div>
    <div class="foot-col"><h5>Navigate</h5><ul>
      <li><a href="#" data-nav="home">Home</a></li><li><a href="#" data-nav="about">About</a></li>
      <li><a href="#" data-nav="services">Services</a></li><li><a href="#" data-nav="contact">Contact</a></li>
    </ul></div>
    <div class="foot-col"><h5>Contact</h5><ul>
      <li><a href="#" data-nav="contact">Book a Consultation</a></li>
      <li><a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></li>
      <li>US &amp; Latin America</li>
    </ul></div>
  </div>
  <div class="foot-bottom">
    <span>&copy; 2026 IANEX Global Services</span>
    <span><a href="#" data-nav="privacy">Privacy Policy</a> &middot; Designed by HaseebMadeIt, Storm Designs</span>
  </div>
</div></footer>`;

const out = `<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IANEX Global Services. Website Concept</title>
<meta name="description" content="Custom website concept for IANEX Global Services. Supply chain, business development, and international trade consulting.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;560;600;680;760&family=Newsreader:ital,opsz,wght@1,18..72,400;1,18..72,500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
${css}
.page[hidden]{display:none}
</style>
</head>
<body>
${header}
<main id="app">
${sections}
</main>
${footer}
<script>
${siteJs}
</script>
<script>
(function(){
  var links=document.querySelectorAll('[data-nav]'),pages=document.querySelectorAll('.page'),
      navlinks=document.getElementById('navlinks'),menuBtn=document.getElementById('menuBtn');
  function animateCount(el){
    var target=parseFloat(el.getAttribute('data-count')),t0=null;
    function step(ts){if(!t0)t0=ts;var k=Math.min((ts-t0)/1200,1),e=1-Math.pow(1-k,3);
      el.textContent=Math.round(target*e);if(k<1)requestAnimationFrame(step);}
    requestAnimationFrame(step);
  }
  function show(id){
    pages.forEach(function(p){p.hidden=(p.id!=='page-'+id);});
    navlinks.querySelectorAll('a').forEach(function(a){a.classList.toggle('active',a.getAttribute('data-nav')===id);});
    navlinks.classList.remove('open');
    window.scrollTo({top:0});
    var pg=document.getElementById('page-'+id);
    pg.querySelectorAll('[data-reveal],.lines').forEach(function(e){e.classList.add('in');});
    pg.querySelectorAll('[data-count]').forEach(animateCount);
  }
  links.forEach(function(a){a.addEventListener('click',function(e){e.preventDefault();var id=a.getAttribute('data-nav');if(id)show(id);});});
})();
</script>
</body>
</html>`;

writeFileSync('ianex-global-website.html', out);
console.log('Wrote ianex-global-website.html ('+(out.length/1024).toFixed(0)+' KB)');
