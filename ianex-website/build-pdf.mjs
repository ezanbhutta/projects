/* Render each design page to a single tall PDF page, then merge into
   one client-ready proposal PDF. */
import puppeteer from 'puppeteer';
import { PDFDocument } from 'pdf-lib';
import { writeFileSync, readFileSync } from 'fs';
import { pathToFileURL } from 'url';
import path from 'path';

const DIR = path.resolve('.');
const WIDTH = 1440;
const pages = [
  { file: 'cover.html',    label: 'Cover' },
  { file: 'index.html',    label: 'Home' },
  { file: 'about.html',    label: 'About' },
  { file: 'services.html', label: 'Services' },
  { file: 'contact.html',  label: 'Contact' },
  { file: 'privacy.html',  label: 'Privacy Policy' },
  { file: 'responsive.html', label: 'Responsive' },
];

const browser = await puppeteer.launch({
  headless: 'shell',
  args: ['--no-sandbox', '--disable-setuid-sandbox', '--font-render-hinting=none'],
});

const merged = await PDFDocument.create();

for (const p of pages) {
  const page = await browser.newPage();
  await page.setViewport({ width: WIDTH, height: 1024, deviceScaleFactor: 2 });
  const url = pathToFileURL(path.join(DIR, p.file)).href;
  await page.goto(url, { waitUntil: 'networkidle0', timeout: 60000 });
  // disable sticky header so it doesn't float on the long page
  await page.evaluate(() => {
    document.body.classList.add('render-mode');
    document.querySelectorAll('[data-count]').forEach(e => { e.textContent = e.getAttribute('data-count'); });
  });
  try { await page.evaluate(async () => { await document.fonts.ready; }); } catch {}
  await new Promise(r => setTimeout(r, 450));
  const height = await page.evaluate(() =>
    Math.ceil(Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)));
  const pdfBytes = await page.pdf({
    width: `${WIDTH}px`,
    height: `${height}px`,
    printBackground: true,
    pageRanges: '1',
  });
  const src = await PDFDocument.load(pdfBytes);
  const [copied] = await merged.copyPages(src, [0]);
  merged.addPage(copied);
  console.log(`✓ ${p.label.padEnd(16)} ${WIDTH}×${height}`);
  await page.close();
}

await browser.close();
const out = merged.save ? await merged.save() : null;
writeFileSync('IANEX-Global-Website-Design.pdf', out);
console.log('\nSaved → IANEX-Global-Website-Design.pdf');
