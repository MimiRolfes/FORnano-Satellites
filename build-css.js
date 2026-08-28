/**
 * Baut style.css aus src/scss/style.scss:
 *   Sass kompilieren -> Autoprefixer -> minifizieren (cssnano)
 *
 * Der WordPress-Theme-Header-Kommentar (Theme Name: ...) wird vorher
 * herausgezogen (cssnano würde ihn beim Minifizieren sonst entfernen)
 * und danach unverändert an den minifizierten Output vorangestellt,
 * da WordPress ihn als reinen Text ausliest, um das Theme zu erkennen.
 *
 * Verwendung:
 *   node build-css.js          einmaliger Build
 *   node build-css.js --watch  baut automatisch neu bei jeder Änderung unter src/scss/
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
const DEV_OUT = path.join(__dirname, 'src/css/style.css'); // lesbar, mit Autoprefixer, aber unminifiziert

async function build() {
	const compiled = sass.compile(SRC, { style: 'expanded' });
	// Sass hängt bei Verwendung von @use automatisch `@charset "UTF-8";` voran
	// — wird entfernt, das eigene Charset der Seite (bloginfo('charset') im
	// <head>) deckt das bereits ab.
	const css = compiled.css.replace(/^@charset\s+"[^"]*";\s*/, '');

	// Theme-Header-Kommentar herausziehen, damit cssnano ihn nicht entfernt.
	const headerMatch = css.match(/^\/\*[\s\S]*?\*\/\s*/);
	if (!headerMatch) {
		throw new Error('Theme-Header-Kommentar am Anfang des kompilierten CSS nicht gefunden — src/scss/style.scss prüfen.');
	}
	const header = headerMatch[0];
	const body = css.slice(header.length);

	const prefixed = await postcss([autoprefixer]).process(body, { from: undefined });

	fs.mkdirSync(path.dirname(DEV_OUT), { recursive: true });
	fs.writeFileSync(DEV_OUT, header + '\n' + prefixed.css);

	const minified = await postcss([cssnano({ preset: 'default' })]).process(prefixed.css, { from: undefined });
	fs.writeFileSync(OUT, header + '\n' + minified.css);

	const stamp = new Date().toLocaleTimeString();
	console.log(`[${stamp}] style.css gebaut (${minified.css.length} Bytes minifiziert) + src/css/style.css (lesbar)`);
}

build().catch((err) => {
	console.error(err);
	process.exit(1);
});

if (process.argv.includes('--watch')) {
	console.log('Beobachte src/scss/ auf Änderungen...');
	fs.watch(SRC_DIR, { recursive: true }, (_event, filename) => {
		if (filename && filename.endsWith('.scss')) {
			build().catch((err) => console.error(err));
		}
	});
}
