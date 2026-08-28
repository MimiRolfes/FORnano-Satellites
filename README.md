# Satellite

WordPress-Block-Theme für die Projektwebsite von **FORnanoSatellites** (FAU Erlangen-Nürnberg).

Dunkles One-Page-Design mit WebGL-Hero-Animation, ursprünglich als [Grav](https://getgrav.org/)-Theme gebaut und hier als WordPress-Block-Theme neu aufgesetzt.

## Voraussetzungen

- WordPress 6.6+
- PHP 8.1+
- Node.js 18+ (nur zum Bearbeiten der Styles nötig, nicht zum Betrieb der Seite)

## Installation

1. Diesen `satellite/`-Ordner nach `wp-content/themes/` kopieren.
2. Unter **Design → Themes** aktivieren.
3. Zwei Seiten im wp-admin anlegen mit den Slugs `about` und `gallery` — die passenden Templates werden automatisch zugeordnet (oder manuell im Block-Editor unter **Seite → Vorlage**: "About Page" / "Gallery Page" auswählen).
4. Website-Titel unter **Einstellungen → Allgemein** setzen — wird im Nav-Logo und Footer verwendet.

## Styles bearbeiten

Das CSS wird aus SCSS-Dateien gebaut (Sass → Autoprefixer → Minifizierung). **`style.css` nicht direkt bearbeiten** — die Datei wird automatisch generiert und bei jedem Build überschrieben.

```bash
npm install        # einmalig
npm run watch:css  # baut style.css automatisch neu bei jeder Änderung
# oder einmalig:
npm run build:css
```

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
- `templates/` — Haupt-Seitenvorlagen (`front-page.html`, `page-about.html`, `page-gallery.html`, `page.html`, `index.html`)
- `parts/` — wiederverwendbare Template-Parts (Header, Footer)
- `patterns/` — das eigentliche, individuelle Markup für jede Sektion, als PHP-Dateien (damit `home_url()`, `get_template_directory_uri()` usw. ganz normal funktionieren)
- `fonts/` — lokal eingebundene Schriftarten Chakra Petch (SIL OFL) und Inter (SIL OFL)
- `images/` — im Theme mitgelieferte Bilder
- `js/satellite.js` — Nav-Toggle + WebGL-Hero-Orb-Shader

## Stand bezüglich der FAU-RRZE-Theme-Vorgaben

- ✅ Block-Editor-Theme (keine Classic-Theme-Ausnahme nötig)
- ✅ Keine externen CDNs — Schriften lokal eingebunden
- ✅ Keine Plugin-Abhängigkeit, kein Pagebuilder
- ✅ SASS-Build mit Autoprefixer + Minifizierung
- ✅ Mindestversionen für WordPress/PHP hinterlegt
- ⚠️ Barrierefreiheit: punktuell gefixt (Button-Beschriftungen, Kontrast) — vollständiger WCAG-2.2-AA-Audit steht noch aus (braucht echte WordPress-Umgebung)
- ⚠️ Theme-Check-Plugin — noch nicht durchgelaufen (braucht echte WordPress-Installation)

## Kontakt

Milena Rolfes — milena.rolfes@web.de
