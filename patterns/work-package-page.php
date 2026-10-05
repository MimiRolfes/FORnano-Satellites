<?php
/**
 * Title: Work Package (Subproject) Page
 * Slug: satellite/work-package-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Einzelseite eines Teilprojekts (templates/single-work_package.html).
 * Bewusst schlicht: Seitenkopf wie auf den anderen Unterseiten, darunter
 * (optional) ein Beitragsbild, die Überschrift samt Text aus dem Beitrag
 * (zweisprachig, siehe satellite_work_package_content()) und der
 * Zurück-Button zu den Teilprojekt-Karten auf der About-Seite.
 */
satellite_page_hero( 'Subproject', 'Teilprojekt' );

// Zurück-Button: erscheint oben und unten, damit man bei falsch angeklickter
// Karte sofort zurück kann, ohne zu scrollen.
$satellite_back_button = function ( $position ) {
	?>
		<!-- wp:html -->
		<a class="btn-about work-package-back work-package-back--<?php echo esc_attr( $position ); ?>" href="<?php echo esc_url( home_url( '/about/#tech-stack' ) ); ?>">
			<span class="btn-about-face"><?php satellite_i18n_text( 'BACK', 'ZURÜCK' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
			<span class="btn-about-face btn-about-face--hover" aria-hidden="true"><?php satellite_i18n_text( 'BACK', 'ZURÜCK' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
		</a>
		<!-- /wp:html -->
	<?php
};
?>
<section class="wp-block-group section page-text" id="work-package">
	<div class="wp-block-group page-text-inner work-package">
		<?php $satellite_back_button( 'top' ); ?>
		<!-- wp:post-featured-image {"className":"work-package-image"} /-->
		<!-- wp:post-content {"layout":{"type":"default"}} /-->
		<?php $satellite_back_button( 'bottom' ); ?>
	</div>
</section>
