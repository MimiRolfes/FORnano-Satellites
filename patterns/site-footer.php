<?php
/**
 * Title: Site Footer
 * Slug: satellite/site-footer
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Fußbereich der Website, wird über parts/footer.html auf jeder
 * Seite eingebunden (Logo, Links, Design-Credit).
 */
?>
<!-- FUSSBEREICH -->
<footer class="footer">
	<div class="container footer-inner">
		<div>
			<p class="footer-logo"><?php bloginfo( 'name' ); ?></p>
			<div class="footer-links">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">ABOUT</a>
				<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">GALLERY</a>
			</div>
		</div>
		<p class="footer-credit">DESIGN BY MILENA ROLFES</p>
	</div>
</footer>
