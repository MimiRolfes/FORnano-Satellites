<?php
/**
 * Title: Site Footer
 * Slug: satellite/site-footer
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Fußbereich der Website, wird über parts/footer.html auf jeder
 * Seite eingebunden. Aufbau folgt der Framer-Referenz (Navigation/Footer-
 * Komponente): Marken-Karte (Logo + Tagline) neben zwei gestapelten Karten
 * (Seiten-Navigation, Design-Credit) vor einem dunklen Verlaufshintergrund.
 *
 * Das große "Vision"-Wortbild aus der Framer-Vorlage liegt (falls vorhanden)
 * lokal unter images/footer-vision.png — nicht im Repo, Lizenz ungeklärt
 * (siehe .gitignore). Ohne die Datei rendert der Footer sauber ohne sie.
 */
$satellite_footer_wordmark = get_template_directory() . '/images/footer-vision.png';
?>
<footer class="footer">
	<div class="container footer-grid">

		<div class="footer-card footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">FORnano Satellite</a>
			<!-- wp:paragraph {"className":"footer-tagline"} -->
			<p class="footer-tagline" lang="en">Better vision with our projects at FAU</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"footer-tagline"} -->
			<p class="footer-tagline" lang="de">Bessere Sicht mit unseren Projekten an der FAU</p>
			<!-- /wp:paragraph -->
		</div>

		<div class="footer-side">
			<div class="footer-card footer-pages">
				<span class="footer-pages-label"><?php satellite_i18n_text( 'Pages', 'Seiten' ); ?></span>
				<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'satellite' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php satellite_i18n_text( 'Home', 'Startseite' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php satellite_i18n_text( 'About', 'Über uns' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php satellite_i18n_text( 'Gallery', 'Galerie' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php satellite_i18n_text( 'Contact', 'Kontakt' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/impressum/' ) ); ?>">Impressum</a>
					<a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>"><?php satellite_i18n_text( 'Privacy', 'Datenschutz' ); ?></a>
				</nav>
			</div>
			<div class="footer-card footer-credit-card">
				<!-- wp:paragraph {"className":"footer-credit"} -->
				<p class="footer-credit" lang="en">Design by Milena Rolfes</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"footer-credit"} -->
				<p class="footer-credit" lang="de">Design von Milena Rolfes</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="footer-social">
					<a class="footer-social-link" href="https://github.com/MimiRolfes" target="_blank" rel="noopener" aria-label="GitHub">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
					</a>
					<a class="footer-social-link" href="https://milenarolfes.framer.website" target="_blank" rel="noopener" aria-label="Portfolio">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z"/></svg>
					</a>
					<a class="footer-social-link footer-copy-email" href="mailto:milena.rolfes@web.de" data-email="milena.rolfes@web.de" aria-label="Copy email address" title="Copy email address">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z"/><path d="m22 6-10 7L2 6"/></svg>
					</a>
				</div>
				<!-- /wp:html -->
			</div>
		</div>

	</div>

	<?php if ( file_exists( $satellite_footer_wordmark ) ) : ?>
	<img class="footer-wordmark" alt=""
		src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-vision.png' ); ?>" />
	<?php endif; ?>
</footer>
