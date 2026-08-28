<?php
/**
 * Title: Gallery Page Content
 * Slug: satellite/gallery-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der Gallery-Seite (templates/page-gallery.html). Wird
 * automatisch für jede WordPress-Seite mit dem Slug "gallery" verwendet,
 * oder manuell im Editor über "Vorlage: Gallery Page" wählbar.
 */
?>
<!-- SEITEN-HERO mit Hintergrundbild -->
<section class="hero hero--page">
	<img class="hero-earth"
		src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/astronaut-earthrise.jpg' ); ?>"
		alt="Astronaut watching an earthrise from the surface of the moon" />
	<div class="page-hero-text">
		<h1 class="heading">GALLERY</h1>
		<p class="hero-eyebrow">GET A SINSIDE VIEW WITH EXCLUSIVE PICTURES</p>
	</div>
</section>

<!-- BILDER-GRID (2-spaltiges Masonry-Layout, siehe .gallery-grid in src/scss/_sections.scss) -->
<section class="section" id="visuals">
	<div class="container">
		<p class="label">VISUALS</p>
		<h2 class="heading">Moments that shaped<br>the upcoming future</h2>
		<div class="gallery-grid">
			<div class="gallery-item gallery-item--tall">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/satellite-horizon.jpg' ); ?>" alt="Satellite silhouette against the Earth's horizon"></div>
			</div>
			<div class="gallery-item">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/earth-starfield.jpg' ); ?>" alt="Earth seen through a field of stars"></div>
			</div>
			<div class="gallery-item">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/nebula-flow.jpg' ); ?>" alt="Abstract nebula flow"></div>
			</div>
			<div class="gallery-item gallery-item--tall">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/astronaut-earthrise.jpg' ); ?>" alt="Astronaut watching an earthrise from the surface of the moon"></div>
			</div>
			<div class="gallery-item">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/particle-sphere.jpg' ); ?>" alt="Particle rendering of a planet"></div>
			</div>
			<div class="gallery-item">
				<div class="gallery-inner"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/nebula-blue.png' ); ?>" alt="Blue nebula clouds"></div>
			</div>
		</div>
	</div>
</section>
