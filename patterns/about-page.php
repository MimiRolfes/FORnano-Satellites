<?php
/**
 * Title: About Page Content
 * Slug: satellite/about-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der "Über das Projekt"-Seite (templates/page-about.html).
 * Aufbau 1:1 nach Framers About-Seite ("Header" + "About" + "Cool Stuff"),
 * alle Texte zweisprachig (EN/DE, beide Pflicht — siehe satellite_i18n()).
 * Texte auf Basis von fornano.pinsker.ai (keine Framer-Platzhalter wie
 * "ICONIQ"/"Tool 1"/"Text über project").
 *
 * Bilder: Framers Overview-Karte wechselt zwischen 4 Bildern; nur das erste
 * (Satellit) ist dort echter Inhalt, Bild 2–4 sind Konferenz-Stockfotos ohne
 * Projektbezug — dafür nutzen wir vorhandene Weltraum-Grafiken. Alle Bilder
 * per file_exists() abgesichert (siehe .gitignore: about-satellite.png und
 * images/tech/ liegen nicht im Repo, Lizenz der Vorlagen-Grafiken ungeklärt).
 */
$satellite_theme_uri  = get_template_directory_uri();
$satellite_theme_path = get_template_directory();

$satellite_img = function ( $rel ) use ( $satellite_theme_path ) {
	return file_exists( $satellite_theme_path . '/' . $rel );
};
$satellite_url = function ( $rel ) use ( $satellite_theme_uri ) {
	return esc_url( $satellite_theme_uri . '/' . $rel );
};

$satellite_summary = array(
	array(
		'The aim of the "FORnanoSatellites" research consortium is to design a new generation of small satellites, referred to below as nanosatellites, weighing only a few kilograms, including a feasibility analysis of a fully digitalized value chain that is meant to lead, in the long term, to automated production of such satellites in Bavaria.',
		'Ziel des Forschungsverbundes "FORnanoSatellites" ist die Konzeption einer neuen Generation von Kleinsatelliten, im Folgenden als Kleinstsatelliten bezeichnet, mit einem Gewicht von wenigen Kilogramm inklusive einer Machbarkeitsanalyse für einen vollständig digitalisierten Wertschöpfungsprozess, der langfristig auf eine automatisierte Produktion solcher Satelliten in Bayern münden soll.',
	),
	array(
		'In the "New Space" sector, nanosatellites in multi-satellite networks are already opening up a broad range of applications in telecommunications, Earth observation and navigation in a cost-efficient way. Standardization approaches support the cost-efficient manufacture of hundreds of satellites, which also makes them economically attractive for industry and science.',
		'Im "New Space"-Sektor erschließen Kleinstsatelliten kosteneffizient in Multi-Satellitennetzen bereits ein breites Anwendungsspektrum in Telekommunikation, Erdbeobachtung und Navigation. Standardisierungsansätze unterstützen die kosteneffiziente Herstellung Hunderter von Satelliten, was sie für Wirtschaft und Wissenschaft auch ökonomisch interessant macht.',
	),
	array(
		'Establishing small-series production of nanosatellites first requires resolving open research challenges in µ-electronics and computer architecture for data processing. In addition, a new assembly and interconnection technology (AVT) for all components is needed for this technology to succeed, for which a stacking technique is being pursued. To ensure reliable operation under harsh space conditions, corresponding redundancy concepts must also be included.',
		'Der Aufbau einer Kleinserienproduktion von Kleinstsatelliten erfordert als Voraussetzung die Klärung offener Forschungsherausforderungen im Bereich der µ-Elektronik und Rechnerarchitektur für die Verarbeitung von Daten. Ferner ist für den Erfolg dieser Technologie eine neue Aufbau- und Verbindungstechnik (AVT) aller Komponenten erforderlich, wofür eine Stapeltechnik angestrebt wird. Um einen zuverlässigen Betrieb unter harten Weltraumbedingungen sicherzustellen, sind auch entsprechende Redundanzkonzepte mit einzubeziehen.',
	),
	array(
		'This task includes a tailored integration of all essential components of a nanosatellite (on-board computer, sensors and power supply) in advanced production processes as well as System-in-Package AVT. A web configurator and hardware demonstrators that take into account applications specifically suited to nanosatellites are to demonstrate that functionality similar to that of traditional satellites can also be provided cost-efficiently in orbit.',
		'Diese Aufgabe beinhaltet eine angepasste Integration aller wesentlichen Komponenten (Bordcomputer+Sensorik+Energieversorgung) eines Kleinstsatelliten in fortgeschrittenen Produktionsverfahren sowie System-in-Package-AVT. Im Projekt soll durch einen Web-Konfigurator und HW-Demonstratoren, die speziell für Kleinstsatelliten geeignete Anwendungen berücksichtigen, der Nachweis erbracht werden, dass auch für Kleinstsatelliten ähnliche Funktionalitäten wie bei traditionellen Satelliten kosteneffizient im Orbit bereitstellbar sind.',
	),
);

$satellite_fade_images = array_values( array_filter( array(
	'images/about-satellite.png',
	'images/gallery/earth-starfield.jpg',
	'images/gallery/nebula-blue.png',
	'images/gallery/nebula-flow.jpg',
), $satellite_img ) );
?>
<!-- SEITEN-HEADER (Framer: "Header", 400px) -->
<header class="about-hero about-hero--glow">
	<div class="about-hero-bg" aria-hidden="true">
		<?php if ( $satellite_img( 'images/gallery/nebula-flow.jpg' ) ) : ?>
		<img class="about-hero-img" alt="" src="<?php echo $satellite_url( 'images/gallery/nebula-flow.jpg' ); ?>" />
		<?php endif; ?>
		<div class="about-hero-glow"></div>
	</div>
	<div class="about-hero-titles">
		<!-- wp:heading {"level":1,"className":"about-hero-title"} -->
		<h1 class="wp-block-heading about-hero-title" lang="en">Get to Know the Project</h1>
		<!-- /wp:heading -->
		<!-- wp:heading {"level":1,"className":"about-hero-title"} -->
		<h1 class="wp-block-heading about-hero-title" lang="de">Lerne das Projekt kennen</h1>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"className":"about-hero-sub"} -->
		<p class="about-hero-sub">FORnano Satellites</p>
		<!-- /wp:paragraph -->
	</div>
</header>

<!-- OVERVIEW-SEKTION (Framer: "About") -->
<section class="wp-block-group section" id="overview">
	<div class="wp-block-group overview">

		<!-- wp:group {"className":"overview-header","layout":{"type":"default"}} -->
		<div class="wp-block-group overview-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="en">Overview</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Überblick</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">Project Summary</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">Projektzusammenfassung</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<?php if ( $satellite_fade_images ) : ?>
		<!-- wp:html -->
		<div class="fade-card" id="fade-card">
			<div class="fade-card-frame">
				<?php foreach ( $satellite_fade_images as $i => $rel ) : ?>
				<img class="fade-card-img<?php echo 0 === $i ? ' is-active' : ''; ?>" alt="" src="<?php echo $satellite_url( $rel ); ?>" />
				<?php endforeach; ?>
			</div>
		</div>
		<!-- /wp:html -->
		<?php endif; ?>

		<!-- wp:group {"className":"overview-body","layout":{"type":"default"}} -->
		<div class="wp-block-group overview-body">

			<!-- wp:group {"className":"overview-columns","layout":{"type":"default"}} -->
			<div class="wp-block-group overview-columns">
				<!-- wp:heading {"level":3,"className":"overview-col-heading"} -->
				<h3 class="wp-block-heading overview-col-heading" lang="en">Innovations in Nanosatellites – Advanced Assembly and Packaging, Computing Technology and Applications</h3>
				<!-- /wp:heading -->
				<!-- wp:heading {"level":3,"className":"overview-col-heading"} -->
				<h3 class="wp-block-heading overview-col-heading" lang="de">Innovationen in nano-Satelliten – Fortgeschrittene AVT und Packaging, Rechentechnik und Anwendungen</h3>
				<!-- /wp:heading -->
				<!-- wp:group {"className":"overview-col-text","layout":{"type":"default"}} -->
				<div class="wp-block-group overview-col-text">
				<?php
				foreach ( $satellite_summary as $satellite_para ) {
					satellite_i18n( $satellite_para[0], $satellite_para[1], 'p', 'body-text' );
				}
				?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"overview-images","layout":{"type":"default"}} -->
			<div class="wp-block-group overview-images">
				<?php foreach ( array( 'images/gallery/satellite-horizon.jpg', 'images/gallery/particle-sphere.jpg' ) as $rel ) : ?>
					<?php if ( $satellite_img( $rel ) ) : ?>
				<!-- wp:image {"className":"overview-image"} -->
				<figure class="wp-block-image overview-image"><img src="<?php echo $satellite_url( $rel ); ?>" alt="" /></figure>
				<!-- /wp:image -->
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"overview-feature","layout":{"type":"default"}} -->
		<div class="wp-block-group overview-feature">
			<?php if ( $satellite_img( 'images/gallery/astronaut-earthrise.jpg' ) ) : ?>
			<!-- wp:image {"className":"overview-feature-media"} -->
			<figure class="wp-block-image overview-feature-media"><img src="<?php echo $satellite_url( 'images/gallery/astronaut-earthrise.jpg' ); ?>" alt="" /></figure>
			<!-- /wp:image -->
			<?php endif; ?>
			<!-- wp:group {"className":"overview-feature-card","layout":{"type":"default"}} -->
			<div class="wp-block-group overview-feature-card">
				<!-- wp:paragraph -->
				<p lang="en">FORnano Satellites is a 36-month research project funded with <strong>€1.8 million</strong> by the Bayerische Forschungsstiftung. Project management lies with the Chair of Manufacturing Automation and Production Systems (FAPS) at FAU Erlangen-Nürnberg; the work is organized in six subprojects.</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph -->
				<p lang="de">FORnano Satellites ist ein auf 36&nbsp;Monate angelegtes Forschungsprojekt, das mit <strong>1,8&nbsp;Mio.&nbsp;€</strong> von der Bayerischen Forschungsstiftung gefördert wird. Die Projektleitung liegt beim Lehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS) der FAU Erlangen-Nürnberg; die Arbeit gliedert sich in sechs Teilprojekte.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

	</div>
</section>

<?php
$satellite_work_packages = satellite_work_packages();
?>
<!-- TEILPROJEKTE-SEKTION (Framer: "Cool Stuff"): sechs Karten laut fornano.pinsker.ai, jede führt zur Teilprojekt-Seite -->
<section class="wp-block-group section" id="tech-stack">
	<div class="wp-block-group tech-stack-row">

		<!-- wp:group {"className":"tech-stack-header","layout":{"type":"default"}} -->
		<div class="wp-block-group tech-stack-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="en">Work Packages</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Arbeitspakete</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">6 interlinked subprojects</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">6 vernetzte Teilprojekte</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"tech-cards","layout":{"type":"default"}} -->
		<div class="wp-block-group tech-cards">
			<?php foreach ( $satellite_work_packages as $satellite_n => $satellite_tp ) : ?>
			<?php $satellite_icon = 'images/tech/tech-' . ( ( $satellite_n - 1 ) % 3 + 1 ) . '.png'; ?>
			<!-- wp:group {"className":"tech-card","layout":{"type":"default"}} -->
			<div class="wp-block-group tech-card">
				<?php if ( $satellite_img( $satellite_icon ) ) : ?>
				<!-- wp:image {"className":"tech-card-icon"} -->
				<figure class="wp-block-image tech-card-icon"><img src="<?php echo $satellite_url( $satellite_icon ); ?>" alt="" /></figure>
				<!-- /wp:image -->
				<?php else : ?>
				<!-- wp:html --><div class="tech-card-icon tech-card-icon--fallback" aria-hidden="true"><?php echo satellite_arrow_icon(); ?></div><!-- /wp:html -->
				<?php endif; ?>
				<!-- wp:group {"className":"tech-card-body","layout":{"type":"default"}} -->
				<div class="wp-block-group tech-card-body">
					<!-- wp:paragraph {"className":"tech-card-num"} -->
					<p class="tech-card-num"><?php echo esc_html( 'TP' . $satellite_n ); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:heading {"level":3,"className":"tech-card-title"} -->
					<h3 class="wp-block-heading tech-card-title"><a class="tech-card-link" href="<?php echo esc_url( home_url( '/work-packages/tp-' . $satellite_n . '/' ) ); ?>"><span lang="en"><?php echo esc_html( $satellite_tp['title'][0] ); ?></span><span lang="de"><?php echo esc_html( $satellite_tp['title'][1] ); ?></span></a></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"className":"tech-card-text"} -->
					<p class="tech-card-text"><span lang="en"><?php echo esc_html( $satellite_tp['short'][0] ); ?></span><span lang="de"><?php echo esc_html( $satellite_tp['short'][1] ); ?></span></p>
					<!-- /wp:paragraph -->
					<!-- wp:html -->
					<span class="btn-about tech-card-more" aria-hidden="true">
						<span class="btn-about-face"><?php satellite_i18n_text( 'LEARN MORE', 'MEHR ERFAHREN' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
						<span class="btn-about-face btn-about-face--hover"><?php satellite_i18n_text( 'LEARN MORE', 'MEHR ERFAHREN' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
					</span>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

	</div>
</section>
