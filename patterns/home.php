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
			<h1 class="wp-block-heading hero-headline" lang="en">A <span class="accent">Better View</span><br>From Above</h1>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":1,"className":"hero-headline"} -->
			<h1 class="wp-block-heading hero-headline" lang="de">Ein <span class="accent">besserer Blick</span><br>von oben</h1>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"hero-aside","layout":{"type":"default"}} -->
			<div class="wp-block-group hero-aside">

				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow" lang="en">A project from FAU students</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow" lang="de">Ein Projekt von FAU-Studierenden</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow" lang="en">Supervision by Prof. Fey</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"hero-eyebrow"} -->
				<p class="hero-eyebrow" lang="de">Betreuung durch Prof. Fey</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<a href="#about" class="btn-about" aria-label="Jump to the about section">
					<span class="btn-about-face"><span lang="en">ABOUT</span><span lang="de">ÜBER UNS</span> <?php echo satellite_arrow_up_right_icon(); ?></span>
					<span class="btn-about-face btn-about-face--hover"><span lang="en">ABOUT</span><span lang="de">ÜBER UNS</span> <?php echo satellite_arrow_up_right_icon(); ?></span>
				</a>
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
				<p class="label" lang="en">About</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"label"} -->
				<p class="label" lang="de">Über uns</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"heading"} -->
				<h2 class="wp-block-heading heading" lang="en">Watching the clouds with our satellite. Find out more about the project.</h2>
				<!-- /wp:heading -->
				<!-- wp:heading {"className":"heading"} -->
				<h2 class="wp-block-heading heading" lang="de">Wolken beobachten mit unserem Satelliten. Erfahre mehr über das Projekt.</h2>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:html -->
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-about" aria-label="About the project">
				<span class="btn-about-face">
					<span lang="en" class="btn-label-full">ABOUT THE PROJECT</span><span lang="en" class="btn-label-short">ABOUT US</span><span lang="de" class="btn-label-full">ÜBER DAS PROJEKT</span><span lang="de" class="btn-label-short">ÜBER UNS</span>
					<?php echo satellite_arrow_up_right_icon(); ?>
				</span>
				<span class="btn-about-face btn-about-face--hover">
					<span lang="en" class="btn-label-full">ABOUT THE PROJECT</span><span lang="en" class="btn-label-short">ABOUT US</span><span lang="de" class="btn-label-full">ÜBER DAS PROJEKT</span><span lang="de" class="btn-label-short">ÜBER UNS</span>
					<?php echo satellite_arrow_up_right_icon(); ?>
				</span>
			</a>
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
					<!-- wp:paragraph {"className":"metric-n"} --><p class="metric-n">322</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="en">Hours of Work</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="de">Arbeitsstunden</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"metric","layout":{"type":"default"}} -->
			<div class="wp-block-group metric">
				<!-- wp:html --><?php echo satellite_arrow_icon(); ?><!-- /wp:html -->
				<!-- wp:group {"className":"metric-body","layout":{"type":"default"}} -->
				<div class="wp-block-group metric-body">
					<!-- wp:paragraph {"className":"metric-n"} --><p class="metric-n">173247</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="en">Lines of Code</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="de">Zeilen Code</p><!-- /wp:paragraph -->
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
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="en">Tests run through</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"metric-l"} --><p class="metric-l" lang="de">Durchgeführte Tests</p><!-- /wp:paragraph -->
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
			<p class="label" lang="en">Highlights</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Highlights</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">Highlights of our<br>Work process</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">Highlights unseres<br>Arbeitsprozesses</h2>
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
				array( '01', 'System-in-Package', 'System-in-Package', 'hl-01.png', 'System-in-Package technology packs high-performance electronics into a compact satellite footprint.', 'Die System-in-Package-Technologie packt Hochleistungselektronik auf kleinstem Raum in den Satelliten.' ),
				array( '02', 'Automated Fabrication', 'Automatisierte Fertigung', 'hl-02.png', 'A fully digitalized, automated manufacturing process for building nanosatellites in Bavaria.', 'Ein vollständig digitalisierter, automatisierter Fertigungsprozess für den Bau von Kleinstsatelliten in Bayern.' ),
				array( '03', 'Bavarian Excellence', 'Bayerische Exzellenz', 'hl-03.png', 'Leading Bavarian universities and industry partners collaborate to advance nanosatellite technology.', 'Führende bayerische Universitäten und Industriepartner arbeiten gemeinsam an der Weiterentwicklung der Kleinstsatelliten-Technologie.' ),
				array( '04', 'Broad Applications', 'Vielfältige Anwendungen', 'hl-04.png', 'Applications ranging from Earth observation to IoT connectivity and scientific research.', 'Anwendungen von Erdbeobachtung über IoT-Konnektivität bis hin zu wissenschaftlicher Forschung.' ),
			);
			foreach ( $satellite_highlights as $satellite_hl ) :
				list( $satellite_hl_num, $satellite_hl_title, $satellite_hl_title_de, $satellite_hl_img, $satellite_hl_text, $satellite_hl_text_de ) = $satellite_hl;
				$satellite_hl_has_img = file_exists( $satellite_theme_path . '/images/highlights/' . $satellite_hl_img );
				?>
				<!-- wp:group {"className":"hl-card","layout":{"type":"default"}} -->
				<div class="wp-block-group hl-card">
					<!-- wp:html -->
					<div class="hl-top">
						<h3 class="hl-label"><span lang="en"><?php echo esc_html( $satellite_hl_title ); ?></span><span lang="de"><?php echo esc_html( $satellite_hl_title_de ); ?></span></h3>
						<span class="hl-num"><?php echo esc_html( $satellite_hl_num ); ?></span>
					</div>
					<!-- /wp:html -->
					<?php if ( $satellite_hl_has_img ) : ?>
					<!-- wp:image {"className":"hl-visual"} -->
					<figure class="wp-block-image hl-visual"><img src="<?php echo esc_url( $satellite_hl_dir . '/' . $satellite_hl_img ); ?>" alt="" /></figure>
					<!-- /wp:image -->
					<?php endif; ?>
					<!-- wp:paragraph -->
					<p><span lang="en"><?php echo esc_html( $satellite_hl_text ); ?></span><span lang="de"><?php echo esc_html( $satellite_hl_text_de ); ?></span></p>
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
	'name'    => 'Prof. Fey',
	'role'    => 'Academic supervision',
	'role_de' => 'Wissenschaftliche Betreuung',
	'photo'   => 'fey.jpg',
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
			<p class="label" lang="en">The Team</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Das Team</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">The people behind the project</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">Die Menschen hinter dem Projekt</h2>
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

<?php
/*
 * Arbeitspakete (TP1–TP6), Quelle: fornano.pinsker.ai ("Arbeitspakete").
 * Titel übersetzt, Beschreibungen inhaltlich unverändert. Framer gliedert
 * diese Sektion in 3 Sticky-Gruppenleisten (dort: Tag 1/2/3 einer
 * Konferenz-Agenda) — die Gruppen-Struktur wurde 1:1 übernommen, aber
 * neutral befüllt: 3 Zweier-Paare der echten Arbeitspakete mit einem
 * beschreibenden Thementitel statt Tag/Datum. Keine Termine/Phasen erfunden
 * (siehe _timeline.scss für die ausführliche Begründung).
 */
$satellite_work_package_groups = array(
	array(
		'range'    => 'TP1–TP2',
		'theme'    => 'Concept & Architecture',
		'theme_de' => 'Konzept & Architektur',
		'items'    => array(
			array(
				'title'    => 'TP1 — System concept for small satellites',
				'title_de' => 'TP1 – Systemkonzept für Kleinsatelliten',
				'text'     => 'Development of a comprehensive system concept for the automated, configurable production of nanosatellites through modularization and standardization.',
				'text_de'  => 'Entwicklung eines umfassenden Systemkonzepts für die automatisierte, konfigurierbare Fertigung von Kleinstsatelliten durch Modularisierung und Standardisierung.',
			),
			array(
				'title'    => 'TP2 — Computer architecture for on-board computers (OBC)',
				'title_de' => 'TP2 – Rechnerarchitektur für Bordcomputer (OBC)',
				'text'     => 'Establishing and testing a new architecture concept for the on-board computer, based on the open RISC-V instruction set and FPGA hardware.',
				'text_de'  => 'Aufbau und Erprobung eines neuen Architekturkonzepts für den Bordcomputer auf Basis der offenen RISC-V-Befehlssatzarchitektur und FPGA-Hardware.',
			),
		),
	),
	array(
		'range'    => 'TP3–TP4',
		'theme'    => 'Manufacturing & Applications',
		'theme_de' => 'Fertigung & Anwendungen',
		'items'    => array(
			array(
				'title'    => 'TP3 — Automated assembly system for nanosatellites',
				'title_de' => 'TP3 – Automatisiertes Montagesystem für Kleinstsatelliten',
				'text'     => 'Concept, development and prototype implementation of assembly and interconnection technology plus automated assembly processes, using System-in-Package technology.',
				'text_de'  => 'Konzeption, Entwicklung und prototypische Umsetzung von Aufbau- und Verbindungstechnik sowie automatisierten Montageprozessen auf Basis der System-in-Package-Technologie.',
			),
			array(
				'title'    => 'TP4 — Applications of small satellites',
				'title_de' => 'TP4 – Anwendungen von Kleinsatelliten',
				'text'     => 'Identifying and developing application scenarios for the new generation of nanosatellites, with a focus on Earth observation, telecommunications and atmospheric measurements.',
				'text_de'  => 'Identifikation und Entwicklung von Anwendungsszenarien für die neue Generation von Kleinstsatelliten mit Schwerpunkt auf Erdbeobachtung, Telekommunikation und atmosphärischen Messungen.',
			),
		),
	),
	array(
		'range'    => 'TP5–TP6',
		'theme'    => 'Communication & Platform',
		'theme_de' => 'Kommunikation & Plattform',
		'items'    => array(
			array(
				'title'    => 'TP5 — Communication with small satellites',
				'title_de' => 'TP5 – Kommunikation mit Kleinsatelliten',
				'text'     => 'Developing innovative communication systems for reliable data exchange with nanosatellites, including optical communication technologies.',
				'text_de'  => 'Entwicklung innovativer Kommunikationssysteme für den zuverlässigen Datenaustausch mit Kleinstsatelliten, einschließlich optischer Kommunikationstechnologien.',
				'dark'     => true,
			),
			array(
				'title'    => 'TP6 — Knowledge-based web configurator',
				'title_de' => 'TP6 – Wissensbasierter Web-Konfigurator',
				'text'     => 'Developing an intelligent platform for the digital configuration and design of nanosatellite missions, including automated generation of manufacturing instructions.',
				'text_de'  => 'Entwicklung einer intelligenten Plattform für die digitale Konfiguration und Auslegung von Kleinstsatelliten-Missionen, einschließlich automatisierter Erstellung von Fertigungsanweisungen.',
				'dark'     => true,
			),
		),
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section","anchor":"work-packages","layout":{"type":"default"}} -->
<section class="wp-block-group section" id="work-packages">

	<!-- wp:group {"className":"container","layout":{"type":"default"}} -->
	<div class="wp-block-group container">

		<!-- wp:group {"className":"wp-header","layout":{"type":"default"}} -->
		<div class="wp-block-group wp-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="en">Timeline</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Zeitachse</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">Get to know our work packages</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">Lerne unsere Arbeitspakete kennen</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- Reine Struktur (Layout/Semantik) — bewusst kein einzelner
		     wp:html-Wrapper um die ganze Liste: das würde die darin
		     verschachtelten wp:group/wp:heading/wp:paragraph-Blöcke der
		     einzelnen Karten (siehe satellite_timeline_item()) zu einem
		     einzigen, nicht mehr editierbaren HTML-Klumpen zusammenfassen.
		     "ol"/"div" hier sind daher unverpackt, wie schon bei .timeline
		     und .timeline-item weiter oben. -->
		<div class="wp-groups">
		<?php foreach ( $satellite_work_package_groups as $satellite_wp_group ) : ?>
			<!-- .timeline-group klammert Leiste + Zeitleiste dieser Gruppe —
			     das begrenzt den Sticky-Gültigkeitsbereich der Leiste auf
			     genau diese Gruppe (siehe _timeline.scss). -->
			<div class="timeline-group">
				<?php satellite_timeline_bar( $satellite_wp_group ); ?>
				<ol class="timeline">
				<?php foreach ( $satellite_wp_group['items'] as $satellite_wp_item ) : ?>
					<?php satellite_timeline_item( $satellite_wp_item ); ?>
				<?php endforeach; ?>
				</ol>
			</div>
		<?php endforeach; ?>
		</div>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

<?php
/*
 * SPONSOREN-SEKTION (Framer: "Sponsers"). Framers eigene Karten zeigen
 * teils echte, teils erfundene Platzhalter-Logos (Logoipsum, "LOQO" …) —
 * das übernehmen wir nicht (siehe CLAUDE.md: keine erfundenen Partner/
 * Logos). Stattdessen die auf fornano.pinsker.ai bestätigten Träger/
 * Kern-Institute der Universitäten, als Text-Wordmark-Karten (wie
 * Framers eigene "FAU"/"DIEHL"-Karten es auch als reinen Text tun).
 * Die dort zusätzlich gelisteten ~13 Industriepartner sind auf der
 * Quellseite nur als Logo ohne auslesbaren Namen vorhanden und daher
 * hier (noch) nicht einzeln aufgeführt.
 */
$satellite_sponsors = array(
	array( 'name' => 'FAU Erlangen-Nürnberg', 'logo' => 'fau.svg' ),
	array( 'name' => 'Julius-Maximilians-Universität Würzburg', 'logo' => 'jmu.svg' ),
	array( 'name' => 'DLR – Deutsches Zentrum für Luft- und Raumfahrt', 'logo' => 'dlr.svg' ),
	array( 'name' => 'Zentrum für Telematik e.V. (ZfT)', 'logo' => 'zft.svg' ),
	array( 'name' => 'FAPS – Lehrstuhl für Fertigungsautomatisierung', 'logo' => 'faps.svg' ),
	array( 'name' => 'Bayerische Forschungsstiftung', 'logo' => 'bfs.svg' ),
);
?>
<!-- wp:group {"tagName":"section","className":"section","anchor":"sponsors","layout":{"type":"default"}} -->
<section class="wp-block-group section" id="sponsors">

	<!-- wp:group {"className":"container","layout":{"type":"default"}} -->
	<div class="wp-block-group container">

		<!-- wp:group {"className":"sponsors-header","layout":{"type":"default"}} -->
		<div class="wp-block-group sponsors-header">
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="en">Sponsors</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"label"} -->
			<p class="label" lang="de">Sponsoren</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="en">Our Partners in Science and Industry</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"className":"heading"} -->
			<h2 class="wp-block-heading heading" lang="de">Unsere Partner aus Wissenschaft und Wirtschaft</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"sponsors-grid","layout":{"type":"default"}} -->
		<div class="wp-block-group sponsors-grid">
			<?php foreach ( $satellite_sponsors as $satellite_sponsor ) : ?>
				<?php satellite_sponsor_card( $satellite_sponsor ); ?>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
