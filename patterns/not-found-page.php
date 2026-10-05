<?php
/**
 * Title: Not Found Page Content
 * Slug: satellite/not-found-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der 404-Seite (templates/404.html), zweisprachig; mit
 * Button zurück zur Startseite (gleicher Button wie auf der Landing Page).
 */
satellite_page_hero( 'Page not found', 'Seite nicht gefunden' );
?>
<section class="wp-block-group section page-text" id="not-found">
	<div class="wp-block-group page-text-inner">
		<?php
		satellite_i18n( 'The page you are looking for does not exist or has been moved.', 'Die gesuchte Seite existiert nicht oder wurde verschoben.', 'p' );
		?>
		<!-- wp:html -->
		<a class="btn-about not-found-home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="btn-about-face"><?php satellite_i18n_text( 'BACK TO HOME', 'ZUR STARTSEITE' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
			<span class="btn-about-face btn-about-face--hover" aria-hidden="true"><?php satellite_i18n_text( 'BACK TO HOME', 'ZUR STARTSEITE' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
		</a>
		<!-- /wp:html -->
	</div>
</section>
