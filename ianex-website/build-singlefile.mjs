/* Assemble a single self-contained, responsive HTML file (SPA) from the
   multi-page source: inlines CSS, inlines every referenced asset (SVG + JPG)
   as data URIs, and wires up in-page navigation. */
import { readFileSync, writeFileSync, existsSync } from 'fs';

const css = readFileSync('assets/styles.css', 'utf8');

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

const LOGO_DARK = toDataUri('logo-dark.svg');
const LOGO = toDataUri('logo.svg');
const navItem = (id,label,active)=>`<li><a href="#" data-nav="${id}"${active?' class="active"':''}>${label}</a></li>`;

const header = `
<div class="topbar"><div class="wrap">
  <span><span class="dot"></span>Now booking Q3 Discovery Consultations</span>
  <span class="r">International &nbsp;&middot;&nbsp; US &amp; Latin America &nbsp;&middot;&nbsp; <b><a href="mailto:hello@ianexglobal.com">hello@ianexglobal.com</a></b></span>
</div></div>
<header class="site-header"><div class="wrap nav">
  <a class="brand" href="#" data-nav="home"><img src="${LOGO_DARK}" alt="IANEX Global"></a>
  <nav><ul class="nav-links" id="navlinks">
    ${navItem('home','Home',true)} ${navItem('about','About')} ${navItem('services','Services')} ${navItem('contact','Contact')}
  </ul></nav>
  <div class="nav-right">
    <a class="nav-phone" href="tel:+10000000000">+1 (000) 000-0000</a>
    <a class="btn btn-teal" href="#" data-nav="contact">Book a Consultation <span class="arr">&rarr;</span></a>
    <button class="menu-btn" id="menuBtn" aria-label="Menu">&#9776;</button>
  </div>
</div></header>`;

const footer = `
<footer class="site-footer"><div class="wrap">
  <div class="foot-top">
    <div>
      <a class="brand" href="#" data-nav="home"><img src="${LOGO}" alt="IANEX Global"></a>
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
    <span>&copy; 2026 IANEX Global Services. All rights reserved.</span>
    <span><a href="#" data-nav="privacy">Privacy Policy</a> &nbsp;&middot;&nbsp; Designed by HaseebMadeIt, Storm Designs</span>
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
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
(function(){
  var links=document.querySelectorAll('[data-nav]'),pages=document.querySelectorAll('.page'),
      navlinks=document.getElementById('navlinks'),menuBtn=document.getElementById('menuBtn');
  function show(id){
    pages.forEach(function(p){p.hidden=(p.id!=='page-'+id);});
    navlinks.querySelectorAll('a').forEach(function(a){a.classList.toggle('active',a.getAttribute('data-nav')===id);});
    navlinks.classList.remove('open');
    window.scrollTo({top:0,behavior:'instant'});
  }
  links.forEach(function(a){a.addEventListener('click',function(e){e.preventDefault();var id=a.getAttribute('data-nav');if(id)show(id);});});
  if(menuBtn)menuBtn.addEventListener('click',function(){navlinks.classList.toggle('open');});
  document.addEventListener('submit',function(e){e.preventDefault();var btn=e.target.querySelector('button[type=submit]');if(btn){btn.textContent='Message sent';btn.style.background='#0A5C5A';}});
})();
</script>
</body>
</html>`;

writeFileSync('ianex-global-website.html', out);
console.log('Wrote ianex-global-website.html ('+(out.length/1024).toFixed(0)+' KB)');
