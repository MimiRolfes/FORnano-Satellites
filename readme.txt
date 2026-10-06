=== Satellite ===
Contributors: milenarolfes
Requires at least: 6.6
Requires PHP: 8.2
Stable tag: 1.1.0
License: MIT
License URI: https://opensource.org/license/mit

Block theme for the FORnanoSatellites research project (FAU Erlangen-Nürnberg).

== Description ==

Dark, futuristic project website with bilingual content (English/German, switchable). All texts, images, buttons and links are core blocks and can be edited in the block editor; on activation the theme creates the pages Home, About the project, Work packages (with the six subproject pages TP1-TP6 as child pages), Gallery, Contact, Impressum and Datenschutz.

* Block editor theme (no classic theme, no page builder, no plugin required)
* Fonts Chakra Petch and Inter (SIL OFL) are served locally; no CDN, no external requests
* CSS built with Sass; CSS and JavaScript are minified; scripts are loaded only on pages that need them
* Respects "prefers-reduced-motion"

== Contact person ==

Milena Rolfes - https://github.com/MimiRolfes - https://milenarolfes.framer.website

== Installation ==

1. Copy the `satellite` folder to `wp-content/themes/` (without `node_modules`, see `.distignore`).
2. Activate it under Appearance > Themes.
3. Set the site title under Settings > General.

See README.md for the editing guide.

== Copyright ==

Satellite is licensed under the MIT License (GPL-compatible).
Fonts: Chakra Petch and Inter, SIL Open Font License 1.1.

== Changelog ==

= 1.1.0 =
* Pages are created on activation and are fully editable as blocks (EN/DE pairs)
* About, Gallery, Contact, Impressum, Datenschutz, subproject pages, 404
* Per-page script loading, minified scripts
