import { chromium } from 'playwright';
export async function login() {
  const b = await chromium.launch();
  const ctx = await b.newContext({ viewport: { width: 1280, height: 900 } });
  const p = await ctx.newPage();
  await p.goto('http://localhost:8888/wp-login.php', { waitUntil: 'networkidle' });
  await p.fill('#user_login', 'admin'); await p.fill('#user_pass', 'password');
  await Promise.all([p.waitForNavigation({ waitUntil: 'load' }), p.click('#wp-submit')]);
  return { b, ctx, p };
}
