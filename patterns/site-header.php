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
			<div class="nav-plus" id="nav-toggle"><span class="nav-plus-icon">+</span></div>
		</div>
		<div class="nav-dropdown" id="nav-dropdown">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">ABOUT THE PROJECT</a>
			<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">GALLERY</a>
		</div>
	</div>
</header>
