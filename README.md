# Satellite

WordPress-Block-Theme für die Projektwebsite von **FORnanoSatellites** (FAU Erlangen-Nürnberg).

Dunkles, mehrseitiges Design mit WebGL-Hero-Animation, zweisprachig (EN/DE umschaltbar) und vollständig im Block-Editor bearbeitbar.

## Voraussetzungen

- WordPress 6.6+ (getestet mit 7.1)
- PHP 8.2+
- Node.js 18+ (nur zum Bearbeiten der Styles/Skripte und für die Tests nötig, nicht zum Betrieb der Seite)

## Installation

1. Diesen `satellite/`-Ordner nach `wp-content/themes/` kopieren.
2. Unter **Design → Themes** aktivieren. Dabei legt das Theme **automatisch** an:
   - die Seiten **Home** (wird zur Startseite), **About the project**, **Work packages**, **Gallery**, **Contact** und **Impressum** — jeweils mit allen Texten und Bildern der Vorlage,
   - darunter als Unterseiten von „Work packages“ die sechs Teilprojekte **TP1–TP6** (Adressen `/work-packages/tp-1/` …).
3. **Einstellungen → Allgemein:** Website-Titel setzen (erscheint im Logo und im Footer).

## Inhalte bearbeiten (Anleitung für Einsteiger)

Die Website wird wie in einem Seitenbaukasten **direkt auf der Seite** bearbeitet: Im Block-Editor sieht jede Seite so aus wie auf der Website. Es ist kein Code nötig. Alle Texte, Bilder, Buttons und Links sind normale WordPress-Blöcke.

**Seite bearbeiten:** Dashboard → **Seiten** → Seite öffnen. Text anklicken und tippen, fertig. **Aktualisieren** (oben rechts) speichert.

**Zwei Sprachen:** Jeder Text gibt es zweimal — einmal Englisch, einmal Deutsch. Im Editor sind beide zu sehen und mit einem kleinen **EN** bzw. **DE** markiert; auf der Website zeigt der EN/DE-Schalter oben jeweils eine Sprache. Bitte immer **beide** Texte pflegen.

**Bild austauschen:** Bild anklicken → in der Werkzeugleiste **Ersetzen** → aus der Mediathek wählen oder hochladen. Leere Bildflächen (z. B. Personenfotos, Logos) zeigen **Hochladen / Mediathek** — einfach anklicken. Den Alternativtext für Screenreader trägt man in der rechten Seitenleiste ein.

**Button oder Link ändern:** Button anklicken, Text ändern; über das Ketten-Symbol der Werkzeugleiste ändert man das Ziel. (Der Button „Mehr erfahren“ auf den Teilprojekt-Karten macht die ganze Karte klickbar.)

**Karten hinzufügen, verschieben oder löschen:** Block anklicken (z. B. eine Personen-Karte) → **⋮** in der Werkzeugleiste → *Duplizieren* / *Löschen*, oder oben links die **Listenansicht** öffnen und per Ziehen umsortieren. Das gilt für Team, Highlights, Partner, Teilprojekt-Karten, Galerie-Bilder und Kennzahlen.

**Akzentfarbe im Titel:** Wort markieren → Werkzeugleiste → *Mehr* → **Hervorheben** → Textfarbe „lime“.

**Dekoration:** Blöcke namens *Dekoration (nicht bearbeiten)* (Glow, Linien, Animationsfläche) sind gesperrt und nur Zierde.

**Teilprojekte:** Dashboard → **Seiten** → „Work packages“ → die Unterseite TP1–TP6 öffnen. Das sind normale Seiten mit Seitenkopf, Text und Zurück-Buttons; ein Bild fügt man mit **+ → Bild** ein, wo man es haben möchte.

**Menü und Fußzeile:** **Design → Editor → Muster → Kopfzeile / Fußzeile**. Menüpunkte und Footer-Links sind Absätze mit Link (je Sprache einer); die Symbole unten rechts sind ein „Social Icons“-Block (anklicken, Adresse ändern oder ein Symbol hinzufügen).

**Kontakt:** Die Seite „Contact“ zeigt Karten mit Projektkoordination, Ansprechpartner und Projektleitung (Adresse, E-Mail, Telefon) — alles normale Textblöcke. Ein Kontaktformular gibt es bewusst nicht.

**Seite zurücksetzen / neue Seite aus der Vorlage:** Neue Seite anlegen → **+** → *Muster* → Kategorie **Satellite** → z. B. „Satellite – Startseite“ einfügen.

## Styles bearbeiten

Das CSS wird aus SCSS-Dateien gebaut (Sass → Autoprefixer → Minifizierung). **`style.css` nicht direkt bearbeiten** — die Datei wird automatisch generiert und bei jedem Build überschrieben.

```bash
npm install        # einmalig
npm run watch:css  # baut style.css automatisch neu bei jeder Änderung
# oder einmalig:
npm run build:css
npm run build        # CSS + JS (js/*.min.js)
```

`js/src/` enthält die lesbaren Skripte, `npm run build:js` erzeugt daraus `js/*.min.js`, die WordPress lädt (fehlen sie, fällt das Theme auf die Quellen zurück). Zum Ausliefern des Themes ohne Build-Dateien siehe `.distignore`.

Die Quelldateien liegen unter [`src/scss/`](src/scss). Der Build erzeugt:
- `style.css` — minifiziert, das lädt WordPress
- `src/css/style.css` — lesbar, mit Autoprefixer, aber unminifiziert (zum Nachschauen)

## Die Seite ansehen und ausprobieren

Das Theme läuft in **jedem normalen WordPress** (6.6+, PHP 8.2+). Docker ist nur eine von mehreren Möglichkeiten, es zum Anschauen und Testen zu starten:

**A) Ohne Installation, nur im Browser (am einfachsten, z. B. zum Anschauen)**
Link öffnen: <https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/MimiRolfes/FORnano-Satellites/main/blueprint.json>
WordPress Playground baut im Browser eine komplette WordPress-Seite mit dem Theme aus GitHub auf (etwa eine halbe Minute) und meldet dich als Admin an. Man kann auch im Editor klicken und Texte ändern; geändert wird nur im Browser des Besuchers, nichts ist gespeichert, wenn man den Tab leert. Zeigt den Stand von `main` auf GitHub.

**B) Auf dem eigenen Rechner ohne Docker (nur Node.js nötig)**
Im Theme-Ordner:
```bash
npx @wp-playground/cli@latest server --auto-mount
```
Danach läuft die Seite unter http://127.0.0.1:9400 (Dashboard: `/wp-admin`, Login `admin` / `password`). Das Theme ist aktiviert und die Seiten sind angelegt. Zeigt immer den aktuellen Stand des Ordners.

**C) Auf dem eigenen Rechner mit Docker (volle Testumgebung, nötig für die Tests)**
Docker Desktop muss laufen. `.wp-env.json` startet WordPress mit PHP 8.2, Debug-Modus, *Theme Check* und *Query Monitor*:
```bash
npx @wordpress/env start                                              # → http://localhost:8888
npx @wordpress/env run cli wp theme activate satellite                # legt die Seiten an
npx @wordpress/env run cli wp rewrite structure '/%postname%/' --hard
```
Dashboard: http://localhost:8888/wp-admin — Login `admin` / `password` (nur lokal). Beenden mit `npx @wordpress/env stop`, zurücksetzen mit `npx @wordpress/env destroy`.
Automatische Prüfungen (Theme Check, Block-Editor, Barrierefreiheit, Bedienung) liegen in [`tests/`](tests) — Anleitung in [`tests/README.md`](tests/README.md).

**D) In einem eigenen WordPress (Hosting, Local, XAMPP …)**
Den Ordner `satellite/` (ohne `node_modules`, siehe `.distignore`) nach `wp-content/themes/` kopieren, unter **Design → Themes** aktivieren (siehe Installation oben).

## Theme-Struktur (Block-Theme)

- `theme.json` — Farbpalette, Typografie (lokal eingebundene Schriften), Layout-Einstellungen
- `templates/` — `page.html` (alle Seiten: Kopf, Inhalt der Seite, Fuß), `404.html`, `index.html`
- `parts/` — wiederverwendbare Template-Parts (Header, Footer)
- `patterns/` — Inhalt der Seiten, Kopf- und Fußzeile als PHP-Dateien. Sie werden beim Aktivieren in echte Seiten umgewandelt (siehe `satellite_seed_content()` in `functions.php`); die Seiten-Patterns stehen zusätzlich im Einfüge-Dialog des Editors.
- `inc/blocks.php` — Helfer, die gültige Kernblöcke erzeugen (Text-Paare EN/DE, Bilder, Buttons, Gruppen)
- `editor-style.css` — Zusatz-Stile für den Editor (EN/DE-Marken, sichtbare Platzhalter)
- `fonts/` — lokal eingebundene Schriftarten Chakra Petch (SIL OFL) und Inter (SIL OFL)
- `images/` — im Theme mitgelieferte Bilder
- `inc/work-packages.php` — Texte der Teilprojekte TP1–TP6 (DE/EN)
- `readme.txt`, `screenshot.jpg` — Theme-Beschreibung und Vorschaubild für WordPress
- `tests/`, `.wp-env.json`, `blueprint.json` — Tests, lokale WordPress-Umgebung (Docker) und Browser-Vorschau (Playground) (gehören nicht ins ausgelieferte Theme, siehe `.distignore`)
- `js/src/*.js` — lesbare Skripte (`satellite.js` = Basis, dazu `hero-orb`, `timeline`, `page-hero`, `about`); `js/*.min.js` ist der Build (`npm run build:js`)

## Stand bezüglich der FAU-RRZE-Theme-Vorgaben

Quelle: [Vorgaben an Themes (wp.rrze.fau.de)](https://www.wp.rrze.fau.de/entwicklung/einsatz-fremdplugins/vorgaben-an-themes/) und die FAU-Seite zu Pflichtseiten.

**Erfüllt**
- ✅ Block-Editor-Theme (kein Classic Theme, kein eigener Pagebuilder, keine Plugin-Installer)
- ✅ WordPress 6.6 / PHP 8.2 als Mindestversion (`style.css`, `readme.txt`, `package.json`, README konsistent, Version 1.1.0, `Tested up to` 7.1)
- ✅ Alle Laufzeit-Ressourcen lokal: Schriften (Chakra Petch, Inter), Icons als CSS; keine CDNs, keine externen Anfragen
- ✅ Sass-Build (Autoprefixer, cssnano); CSS und JS minifiziert; Skripte nur dort geladen, wo sie gebraucht werden (WebGL-Hero nur mit Hero, Zeitleiste nur mit Zeitleiste …)
- ✅ Läuft ohne zusätzliche Plugins; keine funktionalen Erweiterungen im Theme (Teilprojekte sind normale Seiten, kein Beitragstyp; kein Formular, daher auch keine Verarbeitung personenbezogener Daten)
- ✅ Barrierefreiheit (WCAG 2.2 AA): Kontrast im Ruhezustand geprüft und angepasst, sichtbarer Fokus, Fokus nicht unter der fixierten Navigation, Klickflächen mind. 24 px, Menü per Tastatur, `prefers-reduced-motion`
- ✅ Corporate Design mit dem RRZE geklärt (eigenes Design ist in Ordnung); GitHub-Repo ist öffentlich; Ansprechpartnerin: siehe unten
- ✅ Getestet in echtem WordPress (wp-env, WordPress 7.1.4, PHP 8.2, Debug-Modus an, Stand 2026-10-28): Theme Check (5019 Tests) bestanden; alle Seiten und Vorlagen im Block-Editor ohne ungültige Blöcke; axe (WCAG 2.2 AA, EN/DE, Desktop/Handy) ohne Verstöße; Multisite mit Unterseite; keine PHP-Meldungen im Debug-Log. Skripte: `tests/`

**Pflichtseiten:** Die Datenschutzerklärung stellt die FAU bereit; der Footer verlinkt `/datenschutz/`, das Theme enthält bewusst keinen eigenen Datenschutztext. Das Impressum bleibt im Theme (Text bearbeitbar, vom Projektverantwortlichen zu prüfen). Die Barrierefreiheitserklärung fehlt noch und soll ebenfalls von der FAU kommen (RRZE-Plugin *RRZE Legal*).

**Offen / mit dem RRZE zu klären**
- ⚠️ **Seiten beim Aktivieren anlegen** (`satellite_seed_content()`): Grenzfall zur FAU-Regel „keine Plugin-Aufgaben im Theme“. Alternative: Seiten manuell aus den Mustern („Satellite – …“) anlegen.
- ⚠️ **CSS** liegt in einer Datei (`style.css`, ca. 40 KB) und wird auf jeder Seite geladen; nur das JavaScript ist nach Bedarf aufgeteilt. Die FAU-Regel „nur laden, wo benötigt“ ist beim CSS nur teilweise erfüllt.
- ⚠️ **Manuelle Prüfungen:** Screenreader-Test (VoiceOver/NVDA) und Test in der echten FAU-Instanz.
- ⚠️ Der Scroll-Effekt der Überschriften (Grau -> Schwarz) hat mitten im Übergang kurz weniger Kontrast als AA; mit „Bewegung reduzieren“ entfällt er.
- ⚠️ Die gemerkte Sprache (EN/DE) liegt im `localStorage` des Browsers — Hinweis ggf. in der FAU-Datenschutzerklärung ergänzen lassen.

## Ansprechpartnerin für das Theme

Milena Rolfes — [GitHub](https://github.com/MimiRolfes) · [Portfolio](https://milenarolfes.framer.website)
