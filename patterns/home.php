<?php
/**
 * Title: Satellite – Startseite
 * Slug: satellite/home
 * Categories: satellite
 * Description: Komplette Startseite (Hero, About, Highlights, Team, Arbeitspakete, Partner). Mit diesem Muster lässt sich der Ausgangszustand der Startseite in einer neuen Seite wiederherstellen.
 *
 * Deutsch: Inhalt der Startseite. Beim Aktivieren des Themes wird daraus die
 * Seite "Home" angelegt (siehe satellite_seed_content() in functions.php);
 * bearbeitet wird sie danach wie jede Seite unter "Seiten".
 *
 * Alles Inhaltliche besteht aus normalen Blöcken (Absatz, Überschrift, Bild,
 * Schaltfläche, Gruppe): Text anklicken und tippen, Bilder per "Ersetzen"
 * austauschen, Karten über die Listenansicht duplizieren oder löschen.
 * Jeder Text hat zwei Blöcke — einen englischen ("lang-en") und einen
 * deutschen ("lang-de"); im Editor sind beide sichtbar und mit EN/DE markiert.
 * Rein Dekoratives (Glow, Linien, WebGL-Fläche) sind leere, gesperrte Gruppen.
 *
 * WICHTIG: style.css ist generiert (siehe src/scss/ + build-css.js).
 */

$satellite_accent = '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-lime-color">%s</mark>';

/* ───────────────────────── HERO ───────────────────────── */
satellite_open( 'hero', 'section' );
satellite_image( 'images/landing-earth.jpg', 'hero-earth' );
satellite_deco( 'hero-orb', 'hero-orb' );
satellite_deco( 'hero-frost' );
satellite_open( 'hero-container' );
satellite_open( 'hero-row' );
satellite_i18n(
	'A ' . sprintf( $satellite_accent, 'Better View' ) . '<br>From Above',
	'Ein ' . sprintf( $satellite_accent, 'besserer Blick' ) . '<br>von oben',
	'h1',
	'hero-headline'
);
satellite_open( 'hero-aside' );
satellite_i18n( 'A project from FAU students', 'Ein Projekt von FAU-Studierenden', 'p', 'hero-eyebrow' );
satellite_i18n( 'Supervision by Prof. Fey', 'Betreuung durch Prof. Fey', 'p', 'hero-eyebrow' );
satellite_button_pair( 'ABOUT', 'ÜBER UNS', '#about' );
satellite_close();
satellite_close(); // hero-row
satellite_deco( 'hero-divider' );
satellite_close(); // hero-container
satellite_close( 'section' );

/* ───────────────────────── ABOUT ───────────────────────── */
satellite_open( 'section', 'section', 'about' );
satellite_open( 'container about' );
satellite_image( 'images/about-satellite.png', 'about-satellite', '', false ); // Vorlagen-Grafik, nicht im Repo (.gitignore)
satellite_open( 'about-head' );
satellite_open( 'about-titles' );
satellite_i18n( 'About', 'Über uns', 'p', 'label' );
satellite_i18n( 'Watching the clouds with our satellite. Find out more about the project.', 'Wolken beobachten mit unserem Satelliten. Erfahre mehr über das Projekt.', 'h2', 'heading' );
satellite_close();
satellite_buttons(
	array(
		array( 'ABOUT THE PROJECT', 'en', 'btn-label-full' ),
		array( 'ABOUT US', 'en', 'btn-label-short' ),
		array( 'ÜBER DAS PROJEKT', 'de', 'btn-label-full' ),
		array( 'ÜBER UNS', 'de', 'btn-label-short' ),
	),
	home_url( '/about/' ),
	'about-cta'
);
satellite_close(); // about-head

satellite_open( 'metrics' );
foreach ( array(
	array( '322', 'Hours of Work', 'Arbeitsstunden' ),
	array( '173247', 'Lines of Code', 'Zeilen Code' ),
	array( '50+', 'Tests run through', 'Durchgeführte Tests' ),
) as $satellite_metric ) {
	satellite_open( 'metric' );
	satellite_deco( 'metric-icon' );
	satellite_open( 'metric-body' );
	satellite_text( $satellite_metric[0], 'p', 'metric-n' );
	satellite_i18n( $satellite_metric[1], $satellite_metric[2], 'p', 'metric-l' );
	satellite_close();
	satellite_close();
}
satellite_close(); // metrics
satellite_close(); // container
satellite_close( 'section' );

/* ───────────────────────── HIGHLIGHTS ───────────────────────── */
satellite_open( 'section section--dark', 'section', 'highlights' );
satellite_open( 'container' );
satellite_open( 'hl-header' );
satellite_i18n( 'Highlights', 'Highlights', 'p', 'label' );
satellite_i18n( 'Highlights of our<br>Work process', 'Highlights unseres<br>Arbeitsprozesses', 'h2', 'heading' );
satellite_close();
satellite_open( 'highlights-grid' );
// Karten-Bilder: images/highlights/<datei> (Vorlagen-Grafiken, nicht im Repo, .gitignore).
// Fehlt die Datei, bleibt ein leerer Bild-Platzhalter — im Editor anklicken und ein Bild wählen.
foreach ( array(
	array( '01', 'System-in-Package', 'System-in-Package', 'hl-01.png', 'System-in-Package technology packs high-performance electronics into a compact satellite footprint.', 'Die System-in-Package-Technologie packt Hochleistungselektronik auf kleinstem Raum in den Satelliten.' ),
	array( '02', 'Automated Fabrication', 'Automatisierte Fertigung', 'hl-02.png', 'A fully digitalized, automated manufacturing process for building nanosatellites in Bavaria.', 'Ein vollständig digitalisierter, automatisierter Fertigungsprozess für den Bau von Kleinstsatelliten in Bayern.' ),
	array( '03', 'Bavarian Excellence', 'Bayerische Exzellenz', 'hl-03.png', 'Leading Bavarian universities and industry partners collaborate to advance nanosatellite technology.', 'Führende bayerische Universitäten und Industriepartner arbeiten gemeinsam an der Weiterentwicklung der Kleinstsatelliten-Technologie.' ),
	array( '04', 'Broad Applications', 'Vielfältige Anwendungen', 'hl-04.png', 'Applications ranging from Earth observation to IoT connectivity and scientific research.', 'Anwendungen von Erdbeobachtung über IoT-Konnektivität bis hin zu wissenschaftlicher Forschung.' ),
) as $satellite_hl ) {
	satellite_open( 'hl-card' );
	satellite_open( 'hl-top' );
	satellite_i18n( $satellite_hl[1], $satellite_hl[2], 'h3', 'hl-label' );
	satellite_text( $satellite_hl[0], 'p', 'hl-num' );
	satellite_close();
	satellite_image( 'images/highlights/' . $satellite_hl[3], 'hl-visual' );
	satellite_i18n( $satellite_hl[4], $satellite_hl[5] );
	satellite_close();
}
satellite_close(); // highlights-grid
satellite_close(); // container
satellite_close( 'section' );

/* ───────────────────────── TEAM ───────────────────────── */
satellite_open( 'section', 'section', 'team' );
satellite_open( 'container' );
satellite_open( 'team-header' );
satellite_i18n( 'The Team', 'Das Team', 'p', 'label' );
satellite_i18n( 'The people behind the project', 'Die Menschen hinter dem Projekt', 'h2', 'heading' );
satellite_close();
satellite_open( 'team-featured' );
satellite_person( 'Prof. Fey', 'Academic supervision', 'Wissenschaftliche Betreuung', 'fey.jpg' );
satellite_close();
satellite_open( 'team-grid' );
foreach ( array( 'Richard' => 'richard.jpg', 'Flo' => 'flo.jpg', 'Yumyum' => 'yumyum.jpg', 'Khaled' => 'khaled.jpg' ) as $satellite_name => $satellite_photo ) {
	satellite_person( $satellite_name, 'Student', 'Student', $satellite_photo );
}
satellite_close(); // team-grid
satellite_close(); // container
satellite_close( 'section' );

/* ───────────────────────── ARBEITSPAKETE / ZEITLEISTE ───────────────────────── */
/*
 * Arbeitspakete TP1–TP6, Quelle: fornano.pinsker.ai. Framer gliedert diese
 * Sektion in 3 Sticky-Gruppenleisten (dort: Tag 1/2/3 einer Konferenz-
 * Agenda); die Struktur ist übernommen, aber neutral befüllt: drei Paare der
 * echten Arbeitspakete mit einem Thementitel statt Tag/Datum. Keine Termine
 * erfunden (siehe _timeline.scss).
 */
$satellite_work_package_groups = array(
	array(
		'TP1–TP2', 'Concept & Architecture', 'Konzept & Architektur',
		array(
			array( 'TP1 — System concept for small satellites', 'TP1 – Systemkonzept für Kleinsatelliten', 'Development of a comprehensive system concept for the automated, configurable production of nanosatellites through modularization and standardization.', 'Entwicklung eines umfassenden Systemkonzepts für die automatisierte, konfigurierbare Fertigung von Kleinstsatelliten durch Modularisierung und Standardisierung.', false ),
			array( 'TP2 — Computer architecture for on-board computers (OBC)', 'TP2 – Rechnerarchitektur für Bordcomputer (OBC)', 'Establishing and testing a new architecture concept for the on-board computer, based on the open RISC-V instruction set and FPGA hardware.', 'Aufbau und Erprobung eines neuen Architekturkonzepts für den Bordcomputer auf Basis der offenen RISC-V-Befehlssatzarchitektur und FPGA-Hardware.', false ),
		),
	),
	array(
		'TP3–TP4', 'Manufacturing & Applications', 'Fertigung & Anwendungen',
		array(
			array( 'TP3 — Automated assembly system for nanosatellites', 'TP3 – Automatisiertes Montagesystem für Kleinstsatelliten', 'Concept, development and prototype implementation of assembly and interconnection technology plus automated assembly processes, using System-in-Package technology.', 'Konzeption, Entwicklung und prototypische Umsetzung von Aufbau- und Verbindungstechnik sowie automatisierten Montageprozessen auf Basis der System-in-Package-Technologie.', false ),
			array( 'TP4 — Applications of small satellites', 'TP4 – Anwendungen von Kleinsatelliten', 'Identifying and developing application scenarios for the new generation of nanosatellites, with a focus on Earth observation, telecommunications and atmospheric measurements.', 'Identifikation und Entwicklung von Anwendungsszenarien für die neue Generation von Kleinstsatelliten mit Schwerpunkt auf Erdbeobachtung, Telekommunikation und atmosphärischen Messungen.', false ),
		),
	),
	array(
		'TP5–TP6', 'Communication & Platform', 'Kommunikation & Plattform',
		array(
			array( 'TP5 — Communication with small satellites', 'TP5 – Kommunikation mit Kleinsatelliten', 'Developing innovative communication systems for reliable data exchange with nanosatellites, including optical communication technologies.', 'Entwicklung innovativer Kommunikationssysteme für den zuverlässigen Datenaustausch mit Kleinstsatelliten, einschließlich optischer Kommunikationstechnologien.', true ),
			array( 'TP6 — Knowledge-based web configurator', 'TP6 – Wissensbasierter Web-Konfigurator', 'Developing an intelligent platform for the digital configuration and design of nanosatellite missions, including automated generation of manufacturing instructions.', 'Entwicklung einer intelligenten Plattform für die digitale Konfiguration und Auslegung von Kleinstsatelliten-Missionen, einschließlich automatisierter Erstellung von Fertigungsanweisungen.', true ),
		),
	),
);

satellite_open( 'section', 'section', 'work-packages' );
satellite_open( 'container' );
satellite_open( 'wp-header' );
satellite_i18n( 'Timeline', 'Zeitachse', 'p', 'label' );
satellite_i18n( 'Get to know our work packages', 'Lerne unsere Arbeitspakete kennen', 'h2', 'heading' );
satellite_close();
satellite_open( 'wp-groups' );
foreach ( $satellite_work_package_groups as $satellite_group ) {
	satellite_open( 'timeline-group' );
	satellite_open( 'timeline-bar' );
	satellite_text( $satellite_group[0], 'p', 'timeline-bar-range' );
	satellite_i18n( $satellite_group[1], $satellite_group[2], 'p', 'timeline-bar-theme' );
	satellite_text( 'FORnano Satellites', 'p', 'timeline-bar-meta' );
	satellite_close();
	satellite_open( 'timeline' );
	foreach ( $satellite_group[3] as $satellite_item ) {
		satellite_open( 'timeline-item' );
		satellite_deco( 'timeline-spacer' );
		satellite_open( 'timeline-dot-col' );
		satellite_deco( 'timeline-dot' );
		satellite_deco( 'timeline-line-seg' );
		satellite_close();
		satellite_open( 'timeline-card' . ( $satellite_item[4] ? ' timeline-card--dark' : '' ) );
		satellite_i18n( $satellite_item[0], $satellite_item[1], 'h3' );
		satellite_i18n( $satellite_item[2], $satellite_item[3] );
		satellite_close();
		satellite_close(); // timeline-item
	}
	satellite_close(); // timeline
	satellite_close(); // timeline-group
}
satellite_close(); // wp-groups
satellite_close(); // container
satellite_close( 'section' );

/* ───────────────────────── PARTNER ───────────────────────── */
/*
 * Framers Karten zeigen teils echte, teils erfundene Platzhalter-Logos —
 * das übernehmen wir nicht. Stattdessen die auf fornano.pinsker.ai
 * bestätigten Träger/Kern-Institute als Karten mit Namen; eigene Logos
 * lassen sich im Editor in den Bild-Platzhalter der Karte einsetzen (dann
 * blendet das CSS den Namen aus).
 */
satellite_open( 'section', 'section', 'sponsors' );
satellite_open( 'container' );
satellite_open( 'sponsors-header' );
satellite_i18n( 'Sponsors', 'Sponsoren', 'p', 'label' );
satellite_i18n( 'Our Partners in Science and Industry', 'Unsere Partner aus Wissenschaft und Wirtschaft', 'h2', 'heading' );
satellite_close();
satellite_open( 'sponsors-grid' );
foreach ( array(
	array( 'FAU Erlangen-Nürnberg', 'fau.svg' ),
	array( 'Julius-Maximilians-Universität Würzburg', 'jmu.svg' ),
	array( 'DLR – Deutsches Zentrum für Luft- und Raumfahrt', 'dlr.svg' ),
	array( 'Zentrum für Telematik e.V. (ZfT)', 'zft.svg' ),
	array( 'FAPS – Lehrstuhl für Fertigungsautomatisierung', 'faps.svg' ),
	array( 'Bayerische Forschungsstiftung', 'bfs.svg' ),
) as $satellite_sponsor ) {
	satellite_open( 'sponsor-card' );
	satellite_image( 'images/sponsors/' . $satellite_sponsor[1], 'sponsor-logo', $satellite_sponsor[0] );
	satellite_text( $satellite_sponsor[0], 'p', 'sponsor-name' );
	satellite_close();
}
satellite_close(); // sponsors-grid
satellite_close(); // container
satellite_close( 'section' );
