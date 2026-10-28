# Tests in echtem WordPress (wp-env)

Automatische Prüfungen gegen die lokale WordPress-Instanz (`@wordpress/env`, siehe `.wp-env.json`).

```bash
npx @wordpress/env start
npx @wordpress/env run cli wp theme activate satellite
npx @wordpress/env run cli wp rewrite structure '/%postname%/' --hard
npm i --no-save playwright axe-core && npx playwright install chromium   # einmalig

node tests/themecheck.mjs   # Theme Check (Plugin) — "passed the tests" erwartet
node tests/editor.mjs       # alle Seiten im Block-Editor öffnen: 0 ungültige Blöcke erwartet
node tests/axe.mjs          # Barrierefreiheit (axe, WCAG 2.2 AA) auf allen Seiten, EN/DE, Desktop/Handy
node tests/func.mjs         # Sprachumschalter, Menü, Tastatur, Karten-Klick, Editor-Änderung speichern
```

Login in den Skripten: `admin` / `password` (Standard von wp-env, nur lokal).
Multisite: `npx @wordpress/env run cli wp core multisite-convert`, dann Theme netzwerkweit aktivieren
und auf der Unterseite erneut aktivieren (die Seiten werden pro Unterseite angelegt).
