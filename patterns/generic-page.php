<?php
/**
 * Title: Generic Page Content
 * Slug: satellite/generic-page
 * Categories: satellite
 * Inserter: no
 */
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="heading"><?php the_title(); ?></h1>
			<div class="body-text"><?php the_content(); ?></div>
		<?php endwhile; endif; ?>
	</div>
</section>
