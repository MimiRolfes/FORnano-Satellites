/**
 * Builds style.css from src/scss/style.scss:
 *   Sass compile -> Autoprefixer -> minify (cssnano)
 *
 * The WordPress theme header comment (Theme Name: ...) is pulled out
 * before minifying (cssnano would otherwise strip it) and prepended
 * to the minified output untouched, since WordPress reads it as plain
 * text to identify the theme.
 *
 * Usage:
 *   node build-css.js          one-off build
 *   node build-css.js --watch  rebuild on every change under src/scss/
 */
const fs = require('fs');
const path = require('path');
const sass = require('sass');
const postcss = require('postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const SRC_DIR = path.join(__dirname, 'src/scss');
const SRC = path.join(SRC_DIR, 'style.scss');
const OUT = path.join(__dirname, 'style.css');
const DEV_OUT = path.join(__dirname, 'src/css/style.css'); // readable, autoprefixed, unminified

async function build() {
	const compiled = sass.compile(SRC, { style: 'expanded' });
	// Sass auto-prepends `@charset "UTF-8";` when @use is involved — drop it,
	// the page's own charset (via bloginfo('charset') in <head>) covers this.
	const css = compiled.css.replace(/^@charset\s+"[^"]*";\s*/, '');

	// Pull the theme header comment out so cssnano can't strip it.
	const headerMatch = css.match(/^\/\*[\s\S]*?\*\/\s*/);
	if (!headerMatch) {
		throw new Error('Could not find the WordPress theme header comment at the top of the compiled CSS — check src/scss/style.scss.');
	}
	const header = headerMatch[0];
	const body = css.slice(header.length);

	const prefixed = await postcss([autoprefixer]).process(body, { from: undefined });

	fs.mkdirSync(path.dirname(DEV_OUT), { recursive: true });
	fs.writeFileSync(DEV_OUT, header + '\n' + prefixed.css);

	const minified = await postcss([cssnano({ preset: 'default' })]).process(prefixed.css, { from: undefined });
	fs.writeFileSync(OUT, header + '\n' + minified.css);

	const stamp = new Date().toLocaleTimeString();
	console.log(`[${stamp}] built style.css (${minified.css.length} bytes minified) + src/css/style.css (readable)`);
}

build().catch((err) => {
	console.error(err);
	process.exit(1);
});

if (process.argv.includes('--watch')) {
	console.log('Watching src/scss/ for changes...');
	fs.watch(SRC_DIR, { recursive: true }, (_event, filename) => {
		if (filename && filename.endsWith('.scss')) {
			build().catch((err) => console.error(err));
		}
	});
}
