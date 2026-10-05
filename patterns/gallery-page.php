<?php
/**
 * Title: Satellite – Galerie
 * Slug: satellite/gallery-page
 * Categories: satellite
 * Description: Seite "Galerie": Seitenkopf und zwei versetzte Bildspalten.
 *
 * Deutsch: Inhalt der Galerie-Seite. Aufbau nach Framers Gallery-Seite:
 * Seitenkopf wie About, darunter Verlauf (hellgrau -> schwarz) mit zentrierter
 * Überschrift und zwei versetzten Bildspalten. Die Bilder sind normale
 * Bild-Blöcke (Ersetzen, Alternativtext in der Seitenleiste); weitere Bilder
 * einfach in eine Spalte einfügen. Texte zweisprachig.
 * Framer-Korrekturen: "SINSIDE" -> "an inside", "VISUUALS" -> "Visuals".
 */
satellite_page_hero(
	'Gallery',
	'Galerie',
	array( 'Get an inside view with exclusive pictures', 'Exklusive Einblicke in Bildern' )
);

// Spalte 1 = Bild 1, 3, 5; Spalte 2 = Bild 2, 4, 6 (auf dem Handy 1–6 untereinander, per CSS-order).
$satellite_gallery = array(
	array(
		array( 'images/gallery/satellite-horizon.jpg', 'Satellite silhouette against the Earth\'s horizon' ),
		array( 'images/gallery/nebula-flow.jpg', 'Abstract nebula flow' ),
		array( 'images/gallery/particle-sphere.jpg', 'Particle rendering of a planet' ),
	),
	array(
		array( 'images/gallery/earth-starfield.jpg', 'Earth seen through a field of stars' ),
		array( 'images/gallery/astronaut-earthrise.jpg', 'Astronaut watching an earthrise from the surface of the moon' ),
		array( 'images/gallery/nebula-blue.png', 'Blue nebula clouds' ),
	),
);

satellite_open( 'section', 'section', 'visuals' );
satellite_open( 'gallery-header' );
satellite_i18n( 'Visuals', 'Bilder', 'p', 'label' );
satellite_i18n( 'Moments that shaped the upcoming future', 'Momente, die die kommende Zukunft prägen', 'h2', 'heading' );
satellite_close();
satellite_open( 'gallery-grid' );
foreach ( $satellite_gallery as $satellite_col ) {
	satellite_open( 'gallery-col' );
	foreach ( $satellite_col as $satellite_item ) {
		satellite_image( $satellite_item[0], 'gallery-item', $satellite_item[1] );
	}
	satellite_close();
}
satellite_close(); // gallery-grid
satellite_close( 'section' );
