import { login } from './lib.mjs';
const { b, p } = await login();
await p.goto('http://localhost:8888/wp-admin/themes.php?page=themecheck', { waitUntil: 'load' });
await p.selectOption('select[name="themename"]', { label: 'Satellite' });
await Promise.all([p.waitForNavigation({ waitUntil: 'load' }), p.click('input[type=submit]')]);
const t = await p.innerText('#wpbody-content');
const i = t.indexOf('Running');
console.log(i >= 0 ? t.slice(i) : t.slice(0, 1500));
await b.close();
