/**
 * Minifiziert alle Skripte aus js/src/ nach js/<name>.min.js (terser).
 * js/src/ ist die lesbare Quelle; WordPress lädt die .min.js-Dateien
 * (fehlen sie, fällt functions.php auf die Quellen zurück).
 *
 *   node build-js.js
 */
const fs = require('fs');
const path = require('path');
const { minify } = require('terser');

const SRC_DIR = path.join(__dirname, 'js/src');

(async () => {
	for (const file of fs.readdirSync(SRC_DIR).filter((f) => f.endsWith('.js'))) {
		const code = fs.readFileSync(path.join(SRC_DIR, file), 'utf8');
		const result = await minify(code, { compress: true, mangle: true });
		const out = path.join(__dirname, 'js', file.replace(/\.js$/, '.min.js'));
		fs.writeFileSync(out, result.code);
		console.log(`${file} -> ${path.relative(__dirname, out)} (${result.code.length} Bytes)`);
	}
})().catch((err) => {
	console.error(err);
	process.exit(1);
});
