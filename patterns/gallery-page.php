<?php
/**
 * Title: Gallery Page Content
 * Slug: satellite/gallery-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der Gallery-Seite (templates/page-gallery.html, gilt für
 * die WordPress-Seite mit Slug "gallery"). Aufbau nach Framers Gallery-Seite:
 * Seitenkopf wie About, darunter Verlauf (hellgrau -> schwarz) mit
 * zentrierter Überschrift und zwei versetzten Bildspalten. Die Bilder sind
 * normale Bild-Blöcke und im Editor austauschbar (die echten Projektbilder
 * folgen später); die Texte sind zweisprachig.
 *
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
?>
<section class="wp-block-group section" id="visuals">
	<div class="wp-block-group gallery-header">
		<!-- wp:paragraph {"className":"label"} -->
		<p class="label" lang="en">Visuals</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"label"} -->
		<p class="label" lang="de">Bilder</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"className":"heading"} -->
		<h2 class="wp-block-heading heading" lang="en">Moments that shaped the upcoming future</h2>
		<!-- /wp:heading -->
		<!-- wp:heading {"className":"heading"} -->
		<h2 class="wp-block-heading heading" lang="de">Momente, die die kommende Zukunft prägen</h2>
		<!-- /wp:heading -->
	</div>

	<!-- wp:group {"className":"gallery-grid","layout":{"type":"default"}} -->
	<div class="wp-block-group gallery-grid">
		<?php foreach ( $satellite_gallery as $satellite_col ) : ?>
		<!-- wp:group {"className":"gallery-col","layout":{"type":"default"}} -->
		<div class="wp-block-group gallery-col">
			<?php foreach ( $satellite_col as $satellite_item ) : ?>
				<?php if ( file_exists( get_template_directory() . '/' . $satellite_item[0] ) ) : ?>
			<!-- wp:image {"className":"gallery-item"} -->
			<figure class="wp-block-image gallery-item"><img src="<?php echo esc_url( get_template_directory_uri() . '/' . $satellite_item[0] ); ?>" alt="<?php echo esc_attr( $satellite_item[1] ); ?>" /></figure>
			<!-- /wp:image -->
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
