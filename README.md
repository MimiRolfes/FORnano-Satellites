# Satellite

WordPress-Block-Theme für die Projektwebsite von **FORnanoSatellites** (FAU Erlangen-Nürnberg).

Dunkles One-Page-Design mit WebGL-Hero-Animation, als WordPress-Block-Theme.

## Voraussetzungen

- WordPress 6.6+
- PHP 8.1+
- Node.js 18+ (nur zum Bearbeiten der Styles nötig, nicht zum Betrieb der Seite)

## Installation

1. Diesen `satellite/`-Ordner nach `wp-content/themes/` kopieren.
2. Unter **Design → Themes** aktivieren. Dabei legt das Theme **automatisch** an:
   - die Seiten **Home** (wird zur Startseite), **About the project**, **Gallery**, **Contact**, **Impressum** und **Datenschutz** — jeweils mit allen Texten und Bildern der Vorlage,
   - die sechs Teilprojekt-Beiträge unter **Subprojects** (TP1–TP6).
3. Einmal **Einstellungen → Permalinks → Speichern** klicken (damit die Adressen `/work-packages/tp-1/` … funktionieren).
4. **Einstellungen → Allgemein:** Website-Titel setzen (erscheint im Logo und im Footer) und die Administrations-E-Mail prüfen — an diese Adresse gehen die Nachrichten aus dem Kontaktformular.

## Inhalte bearbeiten (Anleitung für Einsteiger)

Die Website wird wie in einem Seitenbaukasten **direkt auf der Seite** bearbeitet: Im Block-Editor sieht jede Seite so aus wie auf der Website. Es ist kein Code nötig. Alle Texte, Bilder, Buttons und Links sind normale WordPress-Blöcke.

**Seite bearbeiten:** Dashboard → **Seiten** → Seite öffnen. Text anklicken und tippen, fertig. **Aktualisieren** (oben rechts) speichert.

**Zwei Sprachen:** Jeder Text gibt es zweimal — einmal Englisch, einmal Deutsch. Im Editor sind beide zu sehen und mit einem kleinen **EN** bzw. **DE** markiert; auf der Website zeigt der EN/DE-Schalter oben jeweils eine Sprache. Bitte immer **beide** Texte pflegen.

**Bild austauschen:** Bild anklicken → in der Werkzeugleiste **Ersetzen** → aus der Mediathek wählen oder hochladen. Leere Bildflächen (z. B. Personenfotos, Logos) zeigen **Hochladen / Mediathek** — einfach anklicken. Den Alternativtext für Screenreader trägt man in der rechten Seitenleiste ein.

**Button oder Link ändern:** Button anklicken, Text ändern; über das Ketten-Symbol der Werkzeugleiste ändert man das Ziel. (Der Button „Mehr erfahren“ auf den Teilprojekt-Karten macht die ganze Karte klickbar.)

**Karten hinzufügen, verschieben oder löschen:** Block anklicken (z. B. eine Personen-Karte) → **⋮** in der Werkzeugleiste → *Duplizieren* / *Löschen*, oder oben links die **Listenansicht** öffnen und per Ziehen umsortieren. Das gilt für Team, Highlights, Partner, Teilprojekt-Karten, Galerie-Bilder und Kennzahlen.

**Akzentfarbe im Titel:** Wort markieren → Werkzeugleiste → *Mehr* → **Hervorheben** → Textfarbe „lime“.

**Dekoration:** Blöcke namens *Dekoration (nicht bearbeiten)* (Glow, Linien, Animationsfläche) sind gesperrt und nur Zierde.

**Teilprojekte:** Dashboard → **Subprojects** → Beitrag öffnen. Das ist eine normale Seite mit Text, Zurück-Buttons und Seitenkopf; ein Bild fügt man mit **+ → Bild** ein, wo man es haben möchte.

**Menü und Fußzeile:** **Design → Editor → Muster → Kopfzeile / Fußzeile**. Menüpunkte und Footer-Links sind Absätze mit Link (je Sprache einer); die Symbole unten rechts sind ein „Social Icons“-Block (anklicken, Adresse ändern oder ein Symbol hinzufügen).

**Kontaktformular:** Block *Satellite: Kontaktformular* auf der Seite „Contact“ anklicken — rechts in der Seitenleiste stehen alle Beschriftungen und Rückmeldungen (Englisch + Deutsch). Die Nachrichten gehen an die Administrations-E-Mail.

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
- `templates/` — `page.html` (alle Seiten: Kopf, Inhalt der Seite, Fuß), `single-work_package.html` (Teilprojekte), `404.html`, `index.html`
- `parts/` — wiederverwendbare Template-Parts (Header, Footer)
- `patterns/` — Inhalt der Seiten, Kopf- und Fußzeile als PHP-Dateien. Sie werden beim Aktivieren in echte Seiten umgewandelt (siehe `satellite_seed_content()` in `functions.php`); die Seiten-Patterns stehen zusätzlich im Einfüge-Dialog des Editors.
- `inc/blocks.php` — Helfer, die gültige Kernblöcke erzeugen (Text-Paare EN/DE, Bilder, Buttons, Gruppen)
- `inc/contact-form.php` — Kontaktformular-Block und Versand
- `editor-style.css` — Zusatz-Stile für den Editor (EN/DE-Marken, sichtbare Platzhalter)
- `fonts/` — lokal eingebundene Schriftarten Chakra Petch (SIL OFL) und Inter (SIL OFL)
- `images/` — im Theme mitgelieferte Bilder
- `inc/work-packages.php` — Texte der Teilprojekte TP1–TP6 (DE/EN)
- `js/src/*.js` — lesbare Skripte (`satellite.js` = Basis, dazu `hero-orb`, `timeline`, `page-hero`, `about`); `js/*.min.js` ist der Build (`npm run build:js`)

## Stand bezüglich der FAU-RRZE-Theme-Vorgaben

Quelle: [Vorgaben an Themes (wp.rrze.fau.de)](https://www.wp.rrze.fau.de/entwicklung/einsatz-fremdplugins/vorgaben-an-themes/) und die FAU-Seite zu Pflichtseiten.

**Erfüllt**
- ✅ Block-Editor-Theme (kein Classic Theme, kein eigener Pagebuilder)
- ✅ WordPress 6.6 / PHP 8.2 als Mindestversion (style.css, readme.txt, README konsistent, Version 1.1.0)
- ✅ Alle Laufzeit-Ressourcen lokal: Schriften (Chakra Petch, Inter), Icons als CSS; keine CDNs, keine externen Anfragen
- ✅ Sass-Build (Autoprefixer, cssnano); CSS und JS minifiziert; Skripte nur dort geladen, wo sie gebraucht werden (WebGL-Hero nur mit Hero, Zeitleiste nur mit Zeitleiste …)
- ✅ Läuft ohne zusätzliche Plugins
- ✅ Kontrast (WCAG 2.2 AA) im Ruhezustand geprüft und angepasst; sichtbarer Fokus; Menü per Tastatur; `prefers-reduced-motion`; Formular mit Labels und Fehlermeldungen
- ✅ Impressum- und Datenschutz-Seite mit Link im Footer

**Noch offen / Abstimmung mit dem RRZE nötig**
- ⚠️ **Theme Check** und **WCAG-Audit** laufen nur in echtem WordPress (Debug-Modus an) — noch nicht durchgeführt.
- ⚠️ **Funktionale Erweiterungen gehören laut FAU in Plugins:** Der Beitragstyp „Subprojects“ und das Kontaktformular liegen derzeit im Theme (`functions.php`, `inc/`). Für die zentrale FAU-Instanz sollten beide in ein kleines Plugin (z. B. `satellite-functions`) umziehen oder durch bestehende FAU-Plugins ersetzt werden.
- ⚠️ **Pflichtseiten:** FAU verlangt Impressum, Datenschutzerklärung **und Barrierefreiheitserklärung**; das RRZE erzeugt sie mit dem Plugin *RRZE Legal*. Unsere statischen Impressum-/Datenschutz-Seiten sind Platzhalter aus der alten Seite; eine Barrierefreiheitserklärung fehlt.
- ⚠️ Der Scroll-Effekt der Überschriften (Grau -> Schwarz) hat mitten im Übergang kurz weniger Kontrast als AA; mit „Bewegung reduzieren“ entfällt er.
- ⚠️ Die gemerkte Sprache (EN/DE) liegt im `localStorage` des Browsers — in der Datenschutzerklärung erwähnen.
- ⚠️ Es muss einen Ansprechpartner für das Theme geben und es muss öffentlich (WordPress.org oder öffentliches GitHub/GitLab-Repo) bereitgestellt werden.

## Ansprechpartnerin für das Theme

Milena Rolfes — [GitHub](https://github.com/MimiRolfes) · [Portfolio](https://milenarolfes.framer.website)
