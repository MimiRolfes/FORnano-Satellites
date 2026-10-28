import { chromium } from 'playwright';
import fs from 'fs';
const axeSrc = fs.readFileSync('node_modules/axe-core/axe.min.js', 'utf8');
const pages = ['/', '/about/', '/work-packages/', '/work-packages/tp-1/', '/gallery/', '/contact/', '/impressum/', '/nichtda/'];
const b = await chromium.launch();
const all = {};
for (const w of [1280, 390]) for (const lang of ['en', 'de']) {
  const ctx = await b.newContext({ viewport: { width: w, height: 900 } });
  await ctx.addInitScript((l) => { try { localStorage.setItem('satellite-lang', l); } catch (e) {} }, lang);
  const p = await ctx.newPage();
  for (const path of pages) {
    await p.goto('http://localhost:8888' + path, { waitUntil: 'networkidle' });
    await p.addStyleTag({ content: '*{transition:none!important;animation:none!important}' });
    await p.evaluate(() => { document.querySelectorAll('.reveal,.reveal--stagger').forEach(e => e.classList.add('is-visible')); document.querySelectorAll('.rw').forEach(e => e.style.color = '#000'); });
    await p.waitForTimeout(500);
    await p.evaluate(axeSrc);
    const r = await p.evaluate(() => axe.run(document, { runOnly: { type: 'tag', values: ['wcag2a', 'wcag2aa', 'wcag21a', 'wcag21aa', 'wcag22aa', 'best-practice'] } }));
    for (const v of r.violations) {
      const key = v.id + ' [' + v.impact + '] ' + v.help;
      all[key] = all[key] || { n: 0, where: new Set(), ex: [] };
      all[key].n += v.nodes.length; all[key].where.add(path);
      if (all[key].ex.length < 3) all[key].ex.push(v.nodes[0].target.join(' ') + ' :: ' + (v.nodes[0].failureSummary || '').split('\n')[1]);
    }
  }
  await ctx.close();
}
for (const k in all) console.log(k + '\n   ×' + all[k].n + ' auf ' + [...all[k].where].join(', ') + '\n   z. B. ' + all[k].ex.join('\n        '));
if (!Object.keys(all).length) console.log('keine axe-Verstöße');
await b.close();
