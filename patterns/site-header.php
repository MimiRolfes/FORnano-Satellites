<?php
/**
 * Title: Site Header
 * Slug: satellite/site-header
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Kopfbereich mit Navigation (wird über parts/header.html auf jeder
 * Seite eingebunden; bearbeitbar unter Design → Editor → Muster → Kopfzeile).
 * Logo-Text = Website-Titel (Einstellungen → Allgemein). Die Menüeinträge sind
 * normale Absätze mit Link, je Sprache einer: Text anklicken zum Ändern, das
 * Link-Symbol der Werkzeugleiste ändert das Ziel.
 * Nur Lang-Schalter und Menü-Knopf sind "Eigenes HTML" (reine Bedienelemente).
 */
satellite_deco( 'nav-backdrop', 'nav-backdrop' );

$satellite_menu = array(
	array( '/', 'HOME', 'STARTSEITE' ),
	array( '/about/', 'ABOUT THE PROJECT', 'ÜBER DAS PROJEKT' ),
	array( '/gallery/', 'GALLERY', 'GALERIE' ),
	array( '/contact/', 'CONTACT', 'KONTAKT' ),
);
?>
<!-- wp:group {"tagName":"header","className":"nav","layout":{"type":"default"}} -->
<header class="wp-block-group nav">

<!-- wp:group {"className":"nav-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group nav-wrap">

<!-- wp:group {"className":"nav-top","layout":{"type":"default"}} -->
<div class="wp-block-group nav-top">

<!-- wp:group {"className":"nav-left","layout":{"type":"default"}} -->
<div class="wp-block-group nav-left">
<!-- wp:site-title {"level":0,"className":"nav-logo"} /-->
</div>
<!-- /wp:group -->

<!-- wp:html {"metadata":{"name":"Sprachumschalter (nicht bearbeiten)"},"lock":{"move":true,"remove":true}} -->
<div class="lang-toggle" role="group" aria-label="Language / Sprache">
	<button type="button" class="lang-toggle-btn" data-lang="en">EN</button>
	<button type="button" class="lang-toggle-btn" data-lang="de">DE</button>
</div>
<!-- /wp:html -->

<!-- wp:html {"metadata":{"name":"Menü-Knopf (nicht bearbeiten)"},"lock":{"move":true,"remove":true}} -->
<button type="button" class="nav-plus" id="nav-toggle" aria-expanded="false" aria-controls="nav-dropdown" aria-label="Menu"><span class="nav-plus-icon" aria-hidden="true">+</span></button>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

<!-- wp:group {"className":"nav-dropdown","anchor":"nav-dropdown","layout":{"type":"default"}} -->
<div class="wp-block-group nav-dropdown" id="nav-dropdown">
<?php
foreach ( $satellite_menu as $satellite_item ) {
	foreach ( array( 'en' => $satellite_item[1], 'de' => $satellite_item[2] ) as $satellite_lang => $satellite_label ) {
		echo '<!-- wp:paragraph ' . wp_json_encode( array( 'className' => 'lang-' . $satellite_lang ) ) . " -->\n";
		echo '<p class="lang-' . esc_attr( $satellite_lang ) . '"><a href="' . esc_url( home_url( $satellite_item[0] ) ) . '">' . esc_html( $satellite_label ) . "</a></p>\n";
		echo "<!-- /wp:paragraph -->\n\n";
	}
}
?>
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</header>
<!-- /wp:group -->
