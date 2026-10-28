import { login } from './lib.mjs';
const { b, p } = await login();
await p.goto('http://localhost:8888/wp-admin/edit.php?post_type=page&orderby=ID&order=asc', { waitUntil: 'load' });
const ids = await p.evaluate(() => [...document.querySelectorAll('tr.type-page')].map((tr) => +tr.id.replace('post-', '')));
const out = [];
for (const id of ids) {
  await p.goto(`http://localhost:8888/wp-admin/post.php?post=${id}&action=edit`, { waitUntil: 'load' });
  await p.waitForFunction(() => window.wp && wp.data && wp.data.select('core/block-editor') && wp.data.select('core/block-editor').getBlocks().length > 0, null, { timeout: 60000 });
  await p.waitForTimeout(1500);
  const r = await p.evaluate(() => {
    const bad = []; let total = 0;
    const walk = (bs) => bs.forEach((blk) => { total++; if (!blk.isValid || blk.name === 'core/freeform' || blk.name === 'core/missing') bad.push(blk.name + ' ' + JSON.stringify(blk.attributes && (blk.attributes.className || blk.attributes.content || '')).slice(0, 80)); walk(blk.innerBlocks); });
    walk(wp.data.select('core/block-editor').getBlocks());
    const title = wp.data.select('core/editor').getEditedPostAttribute('title');
    return { title, total, bad };
  });
  out.push(`${id} ${r.title.slice(0, 34).padEnd(34)} Blöcke ${String(r.total).padStart(3)}  ungültig: ${r.bad.length}${r.bad.length ? '  ' + r.bad.slice(0, 3).join(' | ') : ''}`);
}
console.log(out.join('\n'));
await b.close();
