<?php
/**
 * Title: Site Header
 * Slug: satellite/site-header
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Kopfbereich der Website (Navigation). Wird über
 * parts/header.html auf jeder Seite eingebunden. "Inserter: no" heißt,
 * dieses Pattern taucht nicht im Einfüge-Dialog des Block-Editors auf —
 * es ist reine Theme-internes Bauteil.
 */
?>
<!-- Unscharfer Hintergrund hinter dem aufgeklappten Nav-Dropdown -->
<div class="nav-backdrop" id="nav-backdrop"></div>

<!-- NAVIGATION -->
<header class="nav">
	<div class="nav-wrap">
		<div class="nav-top">
			<div class="nav-left">
				<a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
			<div class="lang-toggle" role="group" aria-label="Language / Sprache">
				<button type="button" class="lang-toggle-btn" data-lang="en">EN</button>
				<button type="button" class="lang-toggle-btn" data-lang="de">DE</button>
			</div>
			<button type="button" class="nav-plus" id="nav-toggle" aria-expanded="false" aria-controls="nav-dropdown" aria-label="<?php esc_attr_e( 'Menu', 'satellite' ); ?>"><span class="nav-plus-icon" aria-hidden="true">+</span></button>
		</div>
		<nav class="nav-dropdown" id="nav-dropdown" aria-label="<?php esc_attr_e( 'Main', 'satellite' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php satellite_i18n_text( 'HOME', 'STARTSEITE' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php satellite_i18n_text( 'ABOUT THE PROJECT', 'ÜBER DAS PROJEKT' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php satellite_i18n_text( 'GALLERY', 'GALERIE' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php satellite_i18n_text( 'CONTACT', 'KONTAKT' ); ?></a>
		</nav>
	</div>
</header>
