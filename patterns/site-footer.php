<?php
/**
 * Title: Site Footer
 * Slug: satellite/site-footer
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Fußbereich (wird über parts/footer.html auf jeder Seite eingebunden;
 * bearbeitbar unter Design → Editor → Muster → Fußzeile). Aufbau nach Framer:
 * Marken-Karte neben zwei gestapelten Karten (Seiten-Navigation, Design-Credit)
 * vor dunklem Verlaufshintergrund.
 *
 * Alles besteht aus normalen Blöcken: Texte anklicken und ändern; Links über
 * das Link-Symbol der Werkzeugleiste; die Symbole rechts unten sind ein
 * "Social-Icons"-Block (Symbol anklicken → Adresse ändern oder weitere hinzufügen).
 * Das große "Vision"-Wortbild liegt lokal unter images/footer-vision.png (nicht
 * im Repo, Lizenz ungeklärt, siehe .gitignore) — ohne Datei entfällt es; im
 * Editor lässt sich jederzeit ein eigenes Bild dort einfügen.
 */
$satellite_footer_links = array(
	array( '/', 'Home', 'Startseite' ),
	array( '/about/', 'About', 'Über uns' ),
	array( '/gallery/', 'Gallery', 'Galerie' ),
	array( '/contact/', 'Contact', 'Kontakt' ),
	array( '/impressum/', 'Impressum', 'Impressum' ),
	array( '/datenschutz/', 'Privacy', 'Datenschutz' ),
);
?>
<!-- wp:group {"tagName":"footer","className":"footer","layout":{"type":"default"}} -->
<footer class="wp-block-group footer">

<!-- wp:group {"className":"container footer-grid","layout":{"type":"default"}} -->
<div class="wp-block-group container footer-grid">

<!-- wp:group {"className":"footer-card footer-brand","layout":{"type":"default"}} -->
<div class="wp-block-group footer-card footer-brand">
<!-- wp:site-title {"level":0,"className":"footer-logo"} /-->

<?php satellite_i18n( 'Better vision with our projects at FAU', 'Bessere Sicht mit unseren Projekten an der FAU', 'p', 'footer-tagline' ); ?>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"footer-side","layout":{"type":"default"}} -->
<div class="wp-block-group footer-side">

<!-- wp:group {"className":"footer-card footer-pages","layout":{"type":"default"}} -->
<div class="wp-block-group footer-card footer-pages">
<?php satellite_i18n( 'Pages', 'Seiten', 'p', 'footer-pages-label' ); ?>
<!-- wp:group {"className":"footer-nav","layout":{"type":"default"}} -->
<div class="wp-block-group footer-nav">
<?php
foreach ( $satellite_footer_links as $satellite_link ) {
	foreach ( array( 'en' => $satellite_link[1], 'de' => $satellite_link[2] ) as $satellite_lang => $satellite_label ) {
		echo '<!-- wp:paragraph ' . wp_json_encode( array( 'className' => 'lang-' . $satellite_lang ) ) . " -->\n";
		echo '<p class="lang-' . esc_attr( $satellite_lang ) . '"><a href="' . esc_url( home_url( $satellite_link[0] ) ) . '">' . esc_html( $satellite_label ) . "</a></p>\n";
		echo "<!-- /wp:paragraph -->\n\n";
	}
}
?>
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"footer-card footer-credit-card","layout":{"type":"default"}} -->
<div class="wp-block-group footer-card footer-credit-card">
<?php satellite_i18n( 'Design by Milena Rolfes', 'Design von Milena Rolfes', 'p', 'footer-credit' ); ?>
<!-- wp:social-links {"openInNewTab":true,"className":"is-style-logos-only footer-social"} -->
<ul class="wp-block-social-links is-style-logos-only footer-social"><!-- wp:social-link {"url":"https://github.com/MimiRolfes","service":"github","label":"GitHub"} /-->

<!-- wp:social-link {"url":"https://milenarolfes.framer.website","service":"chain","label":"Portfolio"} /-->

<!-- wp:social-link {"url":"mailto:milena.rolfes@web.de","service":"mail","label":"Email"} /--></ul>
<!-- /wp:social-links -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<?php satellite_image( 'images/footer-vision.png', 'footer-wordmark', '', false ); ?>
</footer>
<!-- /wp:group -->
