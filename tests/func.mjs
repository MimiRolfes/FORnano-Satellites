import { chromium } from 'playwright';
import { login } from './lib.mjs';
const res = [];
const ok = (n, c, extra = '') => res.push(`${c ? '✔' : '✘'} ${n}${extra ? ' — ' + extra : ''}`);
const b = await chromium.launch();
const errs = [];
const p = await (await b.newContext({ viewport: { width: 1280, height: 900 } })).newPage();
p.on('pageerror', e => errs.push(e.message)); p.on('console', m => { if (m.type() === 'error') errs.push(m.text()); });
await p.goto('http://localhost:8888/', { waitUntil: 'networkidle' });
ok('Startseite zeigt EN', await p.evaluate(() => document.documentElement.dataset.lang) === 'en');
await p.click('.lang-toggle-btn[data-lang="de"]');
await p.waitForTimeout(300);
ok('Sprachumschalter → DE', await p.evaluate(() => document.documentElement.dataset.lang) === 'de' && (await p.locator('h1.hero-headline:visible').innerText()).toLowerCase().includes('besserer'));
await p.reload({ waitUntil: 'networkidle' });
ok('Sprache bleibt nach Reload (DE)', await p.evaluate(() => document.documentElement.dataset.lang) === 'de');
await p.click('.lang-toggle-btn[data-lang="en"]');
await p.click('#nav-toggle'); await p.waitForTimeout(700);
ok('Menü öffnet (aria-expanded)', await p.getAttribute('#nav-toggle', 'aria-expanded') === 'true');
const items = await p.locator('#nav-dropdown p:visible').allInnerTexts();
ok('Menü-Einträge', items.length === 4, items.join(', '));
await p.keyboard.press('Escape');
ok('Esc schließt Menü', await p.getAttribute('#nav-toggle', 'aria-expanded') === 'false');
ok('Buttons "verpackt" (2 Flächen)', await p.locator('.wp-block-button__link.is-enhanced .btn-face--hover').count() >= 2);
const ext = await p.evaluate(() => [...document.querySelectorAll('.footer-social a')].map(a => a.href.split('/')[2] + ':' + (a.target || '-')));
ok('Footer-Social: externe Links öffnen in neuem Tab', ext.filter(x => !x.startsWith('localhost') && !x.startsWith('web.de') && !x.includes('mailto')).every(x => x.endsWith(':_blank')), ext.join(' '));
const copyLinkCheck = await p.evaluate(() => !!document.querySelector('.footer-social a[href^="mailto:"]'));
ok('Mail-Symbol vorhanden', copyLinkCheck);
// Tastatur: 40x Tab, Fokus sichtbar & nicht unter der Navigation
await p.goto('http://localhost:8888/about/', { waitUntil: 'networkidle' });
let hidden = 0, noOutline = 0, n = 0;
for (let i = 0; i < 45; i++) {
  await p.keyboard.press('Tab');
  const r = await p.evaluate(() => { const e = document.activeElement; if (!e || e === document.body) return null; const b = e.getBoundingClientRect(); const cs = getComputedStyle(e); const nav = document.querySelector('.nav-wrap'); const nb = nav ? nav.getBoundingClientRect() : { bottom: 0 }; return { tag: e.tagName, underNav: b.top < nb.bottom && b.bottom > 0 && b.top < 90 && scrollY > 120, outline: cs.outlineStyle !== 'none' || cs.boxShadow !== 'none' || !!e.closest('.tech-card, .is-enhanced, .btn-about') }; });
  if (r) { n++; if (r.underNav) hidden++; if (!r.outline) noOutline++; }
}
ok('Tab-Durchgang About (' + n + ' Stopps)', hidden === 0 && noOutline === 0, `unter Navigation verdeckt: ${hidden}, ohne Fokus-Anzeige: ${noOutline}`);
// Teilprojekt-Karte klickbar
await p.goto('http://localhost:8888/about/', { waitUntil: 'networkidle' });
await p.evaluate(() => document.querySelector('.tech-card').scrollIntoView({ block: 'center' }));
await p.waitForTimeout(500);
const box = await p.locator('.tech-card').first().boundingBox();
await p.mouse.click(box.x + 40, box.y + 40);
await p.waitForLoadState('networkidle');
ok('Karte anklicken → Teilprojekt-Seite', p.url().includes('/work-packages/tp-1'), p.url());
ok('Zurück-Button (oben/unten)', await p.locator('.work-package-back--top, .wp-block-buttons.work-package-back').count() >= 2);
// Editor-Roundtrip
const { b: b2, p: ap } = await login();
await ap.goto('http://localhost:8888/wp-admin/edit.php?post_type=page', { waitUntil: 'load' });
const homeId = await ap.evaluate(() => +document.querySelector('tr.type-page .row-title').closest('tr').id.replace('post-', ''));
await ap.goto(`http://localhost:8888/wp-admin/post.php?post=${homeId}&action=edit`, { waitUntil: 'load' });
await ap.waitForFunction(() => window.wp && wp.data && wp.data.select('core/block-editor').getBlocks().length > 0);
await ap.evaluate(() => wp.data.dispatch('core/preferences').set('core/edit-post', 'welcomeGuide', false));
const found = await ap.evaluate(() => {
  const find = (bs) => { for (const blk of bs) { if (blk.name === 'core/heading' && (blk.attributes.className || '').includes('hero-headline') && (blk.attributes.className || '').includes('lang-en')) return blk; const r = find(blk.innerBlocks); if (r) return r; } };
  const blk = find(wp.data.select('core/block-editor').getBlocks());
  if (!blk) return false;
  wp.data.dispatch('core/block-editor').updateBlockAttributes(blk.clientId, { content: 'TESTÄNDERUNG <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-lime-color">im Editor</mark>' });
  return true;
});
await ap.evaluate(() => wp.data.dispatch('core/editor').savePost());
await ap.waitForTimeout(3000);
await p.goto('http://localhost:8888/', { waitUntil: 'networkidle' });
const t = await p.locator('h1.hero-headline.lang-en').innerText();
ok('Editor-Änderung speichern → erscheint auf der Website', found && t.includes('TESTÄNDERUNG'), t.replace(/\n/g, ' '));
// zurücksetzen
await ap.evaluate(() => {
  const find = (bs) => { for (const blk of bs) { if (blk.name === 'core/heading' && (blk.attributes.className || '').includes('hero-headline') && (blk.attributes.className || '').includes('lang-en')) return blk; const r = find(blk.innerBlocks); if (r) return r; } };
  const blk = find(wp.data.select('core/block-editor').getBlocks());
  wp.data.dispatch('core/block-editor').updateBlockAttributes(blk.clientId, { content: 'A <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-lime-color">Better View</mark><br>From Above' });
  return wp.data.dispatch('core/editor').savePost();
});
await ap.waitForTimeout(3000);
await p.reload({ waitUntil: 'networkidle' });
ok('Test-Änderung zurückgesetzt', (await p.locator('h1.hero-headline.lang-en').innerText()).includes('BETTER VIEW') || (await p.locator('h1.hero-headline.lang-en').innerText()).toLowerCase().includes('better view'));
ok('Keine JavaScript-Fehler in der Konsole', errs.length === 0, errs.slice(0, 3).join(' | '));
console.log(res.join('\n'));
await b2.close(); await b.close();
