<?php
/**
 * Title: Home Content
 * Slug: satellite/home
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der Startseite (front-page.html). One-Page-Aufbau:
 * Hero, About, Highlights, Team, Kontakt.
 *
 * Die inhaltlichen Teile (Überschriften, Texte, Kennzahlen, Karten-Bilder)
 * sind als Gutenberg-Blöcke ausgezeichnet und damit im Website-Editor
 * (Design → Editor → „Front Page") bearbeit- und austauschbar. Rein
 * dekorative/strukturelle Teile (WebGL-Orb, Frost-Streifen, Trennlinie,
 * dekorative Satelliten-Grafik) liegen bewusst in wp:html-Blöcken.
 *
 * WICHTIG: style.css ist generiert (siehe src/scss/ + build-css.js) und
 * darf nicht direkt bearbeitet werden.
 */

$satellite_theme_uri  = get_template_directory_uri();
$satellite_theme_path = get_template_directory();
$satellite_hl_dir     = $satellite_theme_uri . '/images/highlights';
?>
<!-- wp:group {"tagName":"section","className":"hero","layout":{"type":"default"}} -->
<section class="wp-block-group hero">

	<!-- wp:html -->
	<img class="hero-earth" alt="" aria-hidden="true"
		src="<?php echo esc_url( $satellite_theme_uri . '/images/landing-earth.jpg' ); ?>" />
	<div class="hero-orb" id="hero-orb"></div>
	<div class="hero-frost" aria-hidden="true"></div>
	<!-- /wp:html -->

	<!-- wp:group {"className":"hero-container","layout":{"type":"default"}} -->
	<div class="wp-block-group hero-container">

		<!-- wp:group {"className":"hero-row","layout":{"type":"default"}} -->
		<div class="wp-block-group hero-row">

			<!-- wp:heading {"level":1,"className":"hero-headline"} -->
			<h1 class="wp-block-heading hero-headline">A <span class="accent">Better View</span><br>From Above</h1>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"hero-aside","layout":{"type":"default"}} -->
			<div class="wp-block-group hero-aside">

				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow">A project from FAU students</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow">Supervision by Prof. Fey</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<a href="#about" class="btn-about" data-label="ABOUT &#8599;" aria-label="Jump to the about section"></a>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:html -->
		<div class="hero-divider" aria-hidden="true"></div>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section","anchor":"about","layout":{"type":"default"}} -->
<section class="wp-block-group section" id="about">

	<!-- wp:group {"className":"container about","layout":{"type":"default"}} -->
	<div class="wp-block-group container about">

		<?php if ( file_exists( $satellite_theme_path . '/images/about-satellite.png' ) ) : ?>
		<!-- wp:html -->
		<img class="about-satellite" alt="" aria-hidden="true"
			src="<?php echo esc_url( $satellite_theme_uri . '/images/about-satellite.png' ); ?>" />
		<!-- /wp:html -->
		<?php endif; ?>

		<!-- wp:group {"className":"about-head","layout":{"type":"default"}} -->
		<div class="wp-block-group about-head">

			<!-- wp:group {"className":"about-titles","layout":{"type":"default"}} -->
			<div class="wp-block-group about-titles">

				<!-- wp:paragraph {"className":"label"} -->
				<p class="label">About</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"heading"} -->
				<h2 class="wp-block-heading heading">Watching the clouds with our satellite. Find out more about the project.</h2>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:html -->
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-about" data-label="ABOUT THE PROJECT &#8599;" aria-label="About the project"></a>
			<!-- /wp:html -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"metrics","layout":{"type":"default"}} -->
		<div class="wp-block-group metrics">

			<!-- wp:group {"className":"metric","layout":{"type":"default"}} -->
			<div class="wp-block-group metric">
				<!-- wp:html --><?php echo satellite_arrow_icon(); ?><!-- /wp:html -->
				<!-- wp:group {"className":"metric-body","layout":{"type":"default"}} -->
				<div class="wp-block-group metric-body">
					<!-- wp:paragraph {"className":"metric-n"} --><p class="metric-n">100%</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l">Hours of Work</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"metric","layout":{"type":"default"}} -->
			<div class="wp-block-group metric">
				<!-- wp:html --><?php echo satellite_arrow_icon(); ?><!-- /wp:html -->
				<!-- wp:group {"className":"metric-body","layout":{"type":"default"}} -->
				<div class="wp-block-group metric-body">
					<!-- wp:paragraph {"className":"metric-n"} --><p class="metric-n">20+</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l">Lines of Code</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"metric","layout":{"type":"default"}} -->
			<div class="wp-block-group metric">
				<!-- wp:html --><?php echo satellite_arrow_icon(); ?><!-- /wp:html -->
				<!-- wp:group {"className":"metric-body","layout":{"type":"default"}} -->
				<div class="wp-block-group metric-body">
					<!-- wp:paragraph {"className":"metric-n"} --><p class="metric-n">50+</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l">Tests run through</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--dark","anchor":"highlights","layout":{"type":"default"}} -->
<section class="wp-block-group section section--dark" id="highlights">

	<!-- wp:group {"className":"container","layout":{"type":"default"}} -->
	<div class="wp-block-group container">

		<!-- wp:group {"className":"hl-header","layout":{"type":"default"}} -->
		<div class="wp-block-group hl-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label">Highlights</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading">Highlights of our<br>Work process</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"highlights-grid","layout":{"type":"default"}} -->
		<div class="wp-block-group highlights-grid">

			<?php
			/*
			 * Optionales Karten-Icon: die Bilddateien liegen NICHT im Repo
			 * (Lizenz der Framer-Vorlagen-Grafiken ungeklärt, siehe .gitignore).
			 * Ist images/highlights/<datei> vorhanden, wird sie gezeigt — sonst
			 * bleibt die Karte ohne Bild. Eigene Bilder im Website-Editor
			 * (wp:image "hl-visual") oder als Datei in images/highlights/ setzen.
			 */
			$satellite_highlights = array(
				array( '01', 'System-in-Package', 'hl-01.png', 'System-in-Package technology packs high-performance electronics into a compact satellite footprint.' ),
				array( '02', 'Automated Fabrication', 'hl-02.png', 'A fully digitalized, automated manufacturing process for building nanosatellites in Bavaria.' ),
				array( '03', 'Bavarian Excellence', 'hl-03.png', 'Leading Bavarian universities and industry partners collaborate to advance nanosatellite technology.' ),
				array( '04', 'Broad Applications', 'hl-04.png', 'Applications ranging from Earth observation to IoT connectivity and scientific research.' ),
			);
			foreach ( $satellite_highlights as $satellite_hl ) :
				list( $satellite_hl_num, $satellite_hl_title, $satellite_hl_img, $satellite_hl_text ) = $satellite_hl;
				$satellite_hl_has_img = file_exists( $satellite_theme_path . '/images/highlights/' . $satellite_hl_img );
				?>
				<!-- wp:group {"className":"hl-card","layout":{"type":"default"}} -->
				<div class="wp-block-group hl-card">
					<!-- wp:html -->
					<div class="hl-top">
						<h3 class="hl-label"><?php echo esc_html( $satellite_hl_title ); ?></h3>
						<span class="hl-num"><?php echo esc_html( $satellite_hl_num ); ?></span>
					</div>
					<!-- /wp:html -->
					<?php if ( $satellite_hl_has_img ) : ?>
					<!-- wp:image {"className":"hl-visual"} -->
					<figure class="wp-block-image hl-visual"><img src="<?php echo esc_url( $satellite_hl_dir . '/' . $satellite_hl_img ); ?>" alt="" /></figure>
					<!-- /wp:image -->
					<?php endif; ?>
					<!-- wp:paragraph -->
					<p><?php echo esc_html( $satellite_hl_text ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			<?php endforeach; ?>

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

<?php
/*
 * Personen der Team-Sektion. Fotos liegen (falls vorhanden) unter
 * images/people/<datei> — nicht im Repo, daher file_exists()-Prüfung:
 * ohne Foto zeigt die Karte einen dunklen Platzhalter mit Eckwinkeln.
 * Namen, Rollen und Fotos sind im Website-Editor bearbeitbar.
 */
$satellite_team_featured = array(
	'name'  => 'Prof. Fey',
	'role'  => 'Academic supervision',
	'photo' => 'fey.jpg',
);
$satellite_team = array(
	array( 'name' => 'Richard', 'role' => 'Student', 'photo' => 'richard.jpg' ),
	array( 'name' => 'Flo',     'role' => 'Student', 'photo' => 'flo.jpg' ),
	array( 'name' => 'Yumyum',  'role' => 'Student', 'photo' => 'yumyum.jpg' ),
	array( 'name' => 'Khaled',  'role' => 'Student', 'photo' => 'khaled.jpg' ),
);
// satellite_person_card() ist in functions.php definiert.
?>
<!-- wp:group {"tagName":"section","className":"section","anchor":"team","layout":{"type":"default"}} -->
<section class="wp-block-group section" id="team">

	<!-- wp:group {"className":"container","layout":{"type":"default"}} -->
	<div class="wp-block-group container">

		<!-- wp:group {"className":"team-header","layout":{"type":"default"}} -->
		<div class="wp-block-group team-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label">The Team</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading">The people behind the project</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"team-featured","layout":{"type":"default"}} -->
		<div class="wp-block-group team-featured">
			<?php satellite_person_card( $satellite_team_featured ); ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"team-grid","layout":{"type":"default"}} -->
		<div class="wp-block-group team-grid">
			<?php foreach ( $satellite_team as $satellite_member ) {
				satellite_person_card( $satellite_member );
			} ?>
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

<!-- KONTAKT-SEKTION (noch Template-Platzhalter) -->
<section class="section" id="contact">
	<div class="container">
		<div class="contact-grid">
			<div>
				<p class="label">Contact</p>
				<h2 class="heading">Get in Touch</h2>
			</div>
			<div class="contact-links">
				<a href="mailto:info@example.org" class="contact-row">
					<span class="contact-lbl">Email</span>
					<span>info@example.org</span>
				</a>
			</div>
		</div>
	</div>
</section>
