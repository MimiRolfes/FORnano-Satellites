# Satellite

WordPress Block Theme for the **FORnanoSatellites** project website (FAU Erlangen-Nürnberg).

Dark, one-page-style design with a WebGL hero animation, converted from an original [Grav](https://getgrav.org/) theme and rebuilt as a WordPress Block Theme.

## Requirements

- WordPress 6.6+
- PHP 8.1+
- Node.js 18+ (only needed for editing styles, not for running the site)

## Installation

1. Copy this `satellite/` folder into `wp-content/themes/`.
2. Activate it under **Appearance → Themes**.
3. Create two pages in wp-admin with the slugs `about` and `gallery` — their templates are picked up automatically (or assign them manually under **Page → Template** in the block editor: "About Page" / "Gallery Page").
4. Set your site title under **Settings → General** — it's used in the nav logo and footer.

## Editing styles

CSS is built from SCSS via a small Node pipeline (Sass → Autoprefixer → minification). **Don't edit `style.css` directly** — it's a generated file and gets overwritten on every build.

```bash
npm install        # once
npm run watch:css  # rebuilds style.css automatically while you edit
# or just once:
npm run build:css
```

Source files live in [`src/scss/`](src/scss). The build writes:
- `style.css` — minified, this is what WordPress loads
- `src/css/style.css` — readable, autoprefixed, unminified (for inspecting the compiled output)

## Local preview without WordPress

[`../dev-server/`](../dev-server) contains a lightweight PHP router that mocks just enough of the WordPress API to render this theme's actual template/part/pattern files directly — useful for quick visual checks without a full WordPress install.

```bash
cd ../dev-server
bash run.sh
# → http://localhost:8791/
```

This is a dev convenience only, not a substitute for testing against real WordPress before release.

## Theme structure (Block Theme)

- `theme.json` — color palette, typography (self-hosted fonts), layout settings
- `templates/` — top-level page templates (`front-page.html`, `page-about.html`, `page-gallery.html`, `page.html`, `index.html`)
- `parts/` — reusable template parts (header, footer)
- `patterns/` — the actual bespoke markup for each section, as PHP files (so `home_url()`, `get_template_directory_uri()`, etc. work normally)
- `fonts/` — self-hosted Chakra Petch (SIL OFL) and Inter (SIL OFL) font files
- `images/` — theme-bundled imagery
- `js/satellite.js` — nav toggle + WebGL hero orb shader

## Status against FAU RRZE theme requirements

- ✅ Block Editor theme (no Classic-theme exception needed)
- ✅ No external CDNs — fonts self-hosted
- ✅ No plugin dependency, no pagebuilder
- ✅ SASS build with Autoprefixer + minification
- ✅ WordPress/PHP minimum versions declared
- ⚠️ Accessibility: spot-fixed (button labels, contrast) — full WCAG 2.2 AA audit still pending in a real WordPress environment
- ⚠️ Theme Check plugin — not yet run (needs a real WordPress install)

## Contact

Milena Rolfes — milena.rolfes@web.de
