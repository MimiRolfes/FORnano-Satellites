# Satellite

WordPress-Block-Theme für die Projektwebsite von **FORnanoSatellites** (FAU Erlangen-Nürnberg).

Dunkles One-Page-Design mit WebGL-Hero-Animation, als WordPress-Block-Theme.

## Voraussetzungen

- WordPress 6.6+
- PHP 8.1+
- Node.js 18+ (nur zum Bearbeiten der Styles nötig, nicht zum Betrieb der Seite)

## Installation

1. Diesen `satellite/`-Ordner nach `wp-content/themes/` kopieren.
2. Unter **Design → Themes** aktivieren.
3. Seiten im wp-admin anlegen mit den Slugs `about`, `gallery`, `contact`, `impressum` und `datenschutz` — die passenden Templates werden automatisch zugeordnet. Die sechs Teilprojekt-Seiten (`/work-packages/tp-1/` … `tp-6/`, Beitragstyp "Subprojects") legt das Theme beim Aktivieren selbst an (Texte siehe `inc/work-packages.php`). Danach unter **Einstellungen → Permalinks** einmal speichern.
   - Das Kontaktformular verschickt per `wp_mail` an die Administrations-E-Mail (**Einstellungen → Allgemein**); anderer Empfänger über den Filter `satellite_contact_recipient`.
4. Website-Titel unter **Einstellungen → Allgemein** setzen — wird im Nav-Logo und Footer verwendet.

## Styles bearbeiten

Das CSS wird aus SCSS-Dateien gebaut (Sass → Autoprefixer → Minifizierung). **`style.css` nicht direkt bearbeiten** — die Datei wird automatisch generiert und bei jedem Build überschrieben.

```bash
npm install        # einmalig
npm run watch:css  # baut style.css automatisch neu bei jeder Änderung
# oder einmalig:
npm run build:css
npm run build        # CSS + JS (js/satellite.min.js)
```

`js/satellite.js` ist die lesbare Quelle, `npm run build:js` erzeugt daraus `js/satellite.min.js`, das WordPress lädt (fehlt die Datei, fällt das Theme auf die Quelle zurück).

Die Quelldateien liegen unter [`src/scss/`](src/scss). Der Build erzeugt:
- `style.css` — minifiziert, das lädt WordPress
- `src/css/style.css` — lesbar, mit Autoprefixer, aber unminifiziert (zum Nachschauen)

## Lokale Vorschau ohne WordPress

[`../dev-server/`](../dev-server) enthält einen schlanken PHP-Router, der einen minimalen Teil der WordPress-API simuliert und direkt die echten Template-/Part-/Pattern-Dateien dieses Themes rendert — praktisch für schnelle visuelle Checks ohne komplette WordPress-Installation.

```bash
cd ../dev-server
bash run.sh
# → http://localhost:8791/
```

Das ist nur eine Entwicklungs-Hilfe, kein Ersatz für einen echten Test in WordPress vor der Veröffentlichung.

## Theme-Struktur (Block-Theme)

- `theme.json` — Farbpalette, Typografie (lokal eingebundene Schriften), Layout-Einstellungen
- `templates/` — Seitenvorlagen (`front-page`, `page-about`, `page-gallery`, `page-contact`, `page-impressum`, `page-datenschutz`, `single-work_package`, `page`, `index`, `404`)
- `parts/` — wiederverwendbare Template-Parts (Header, Footer)
- `patterns/` — das eigentliche, individuelle Markup für jede Sektion, als PHP-Dateien (damit `home_url()`, `get_template_directory_uri()` usw. ganz normal funktionieren)
- `fonts/` — lokal eingebundene Schriftarten Chakra Petch (SIL OFL) und Inter (SIL OFL)
- `images/` — im Theme mitgelieferte Bilder
- `inc/work-packages.php` — Texte der Teilprojekte TP1–TP6 (DE/EN)
- `js/satellite.js` — Nav-Toggle, Sprachumschalter, WebGL-Hero-Shader, Scroll-Effekte (`satellite.min.js` ist der Build)

## Stand bezüglich der FAU-RRZE-Theme-Vorgaben

- ✅ Block-Editor-Theme (keine Classic-Theme-Ausnahme nötig)
- ✅ Keine externen CDNs — Schriften lokal eingebunden
- ✅ Keine Plugin-Abhängigkeit, kein Pagebuilder
- ✅ SASS-Build mit Autoprefixer + Minifizierung, JS minifiziert (terser)
- ✅ Mindestversionen für WordPress/PHP hinterlegt
- ⚠️ Barrierefreiheit: punktuell gefixt (Button-Beschriftungen, Kontrast) — vollständiger WCAG-2.2-AA-Audit steht noch aus (braucht echte WordPress-Umgebung)
- ⚠️ Theme-Check-Plugin — noch nicht durchgelaufen (braucht echte WordPress-Installation)

## Kontakt

Milena Rolfes — milena.rolfes@web.de
