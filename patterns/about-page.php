<?php
/**
 * Title: Satellite – Über das Projekt
 * Slug: satellite/about-page
 * Categories: satellite
 * Description: Seite "Über das Projekt": Seitenkopf, Projektzusammenfassung mit Bildwechsel-Karte und die sechs Teilprojekt-Karten.
 *
 * Deutsch: Inhalt der "Über das Projekt"-Seite. Beim Aktivieren des Themes
 * wird daraus die Seite "About the project" angelegt. Aufbau 1:1 nach Framers
 * About-Seite ("Header" + "About" + "Cool Stuff"); alle Texte zweisprachig
 * (EN/DE, beide Pflicht, siehe satellite_i18n()) und als normale Blöcke
 * editierbar; alle Bilder per "Ersetzen" austauschbar.
 *
 * Bilder: Die Bildwechsel-Karte (Framer "Fade Switching Image Card") wechselt
 * zwischen den Bildern in ihrer Gruppe — Bilder lassen sich im Editor
 * hinzufügen/entfernen. about-satellite.png und images/tech/ liegen nicht im
 * Repo (Lizenz der Vorlagen-Grafiken ungeklärt, siehe .gitignore); fehlt eine
 * Datei, entsteht ein leerer Bild-Platzhalter bzw. entfällt das Bild.
 * Teilprojekt-Texte: inc/work-packages.php.
 */
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


$satellite_work_packages = satellite_work_packages();

/* ── Seitenkopf ── */
satellite_page_hero( 'Get to Know the Project', 'Lerne das Projekt kennen', 'FORnano Satellites', 'about-hero--glow' );

/* ── Überblick (Framer "About") ── */
satellite_open( 'section', 'section', 'overview' );
satellite_open( 'overview' );

satellite_open( 'overview-header' );
satellite_i18n( 'Overview', 'Überblick', 'p', 'label' );
satellite_i18n( 'Project Summary', 'Projektzusammenfassung', 'h2', 'heading' );
satellite_close();

// Bildwechsel-Karte: alle 5 s Überblendung (js/satellite.js, initFadeCard)
satellite_open( 'fade-card', 'div', 'fade-card' );
satellite_open( 'fade-card-frame' );
foreach ( array( 'images/about-satellite.png', 'images/gallery/earth-starfield.jpg', 'images/gallery/nebula-blue.png', 'images/gallery/nebula-flow.jpg' ) as $satellite_rel ) {
	satellite_image( $satellite_rel, 'fade-card-img', '', false );
}
satellite_close();
satellite_close();

satellite_open( 'overview-body' );
satellite_open( 'overview-columns' );
satellite_i18n( 'Innovations in Nanosatellites – Advanced Assembly and Packaging, Computing Technology and Applications', 'Innovationen in nano-Satelliten – Fortgeschrittene AVT und Packaging, Rechentechnik und Anwendungen', 'h3', 'overview-col-heading' );
satellite_open( 'overview-col-text' );
foreach ( $satellite_summary as $satellite_para ) {
	satellite_i18n( $satellite_para[0], $satellite_para[1], 'p', 'body-text' );
}
satellite_close();
satellite_close(); // overview-columns
satellite_open( 'overview-images' );
satellite_image( 'images/gallery/satellite-horizon.jpg', 'overview-image' );
satellite_image( 'images/gallery/particle-sphere.jpg', 'overview-image' );
satellite_close();
satellite_close(); // overview-body

satellite_open( 'overview-feature' );
satellite_image( 'images/gallery/astronaut-earthrise.jpg', 'overview-feature-media' );
satellite_open( 'overview-feature-card' );
satellite_i18n(
	'FORnano Satellites is a 36-month research project funded with <strong>€1.8 million</strong> by the Bayerische Forschungsstiftung. Project management lies with the Chair of Manufacturing Automation and Production Systems (FAPS) at FAU Erlangen-Nürnberg; the work is organized in six subprojects.',
	'FORnano Satellites ist ein auf 36&nbsp;Monate angelegtes Forschungsprojekt, das mit <strong>1,8&nbsp;Mio.&nbsp;€</strong> von der Bayerischen Forschungsstiftung gefördert wird. Die Projektleitung liegt beim Lehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS) der FAU Erlangen-Nürnberg; die Arbeit gliedert sich in sechs Teilprojekte.'
);
satellite_close();
satellite_close(); // overview-feature

satellite_close(); // overview
satellite_close( 'section' );

/* ── Teilprojekt-Karten (Framer "Cool Stuff"): jede Karte führt zur Teilprojekt-Seite ── */
satellite_open( 'section', 'section', 'tech-stack' );
satellite_open( 'tech-stack-row' );
satellite_open( 'tech-stack-header' );
satellite_i18n( 'Work Packages', 'Arbeitspakete', 'p', 'label' );
satellite_i18n( '6 interlinked subprojects', '6 vernetzte Teilprojekte', 'h2', 'heading' );
satellite_close();
satellite_open( 'tech-cards' );
foreach ( $satellite_work_packages as $satellite_n => $satellite_tp ) {
	satellite_open( 'tech-card' );
	satellite_image( 'images/tech/tech-' . ( ( $satellite_n - 1 ) % 3 + 1 ) . '.png', 'tech-card-icon' );
	satellite_open( 'tech-card-body' );
	satellite_text( 'TP' . $satellite_n, 'p', 'tech-card-num' );
	satellite_i18n( $satellite_tp['title'][0], $satellite_tp['title'][1], 'h3', 'tech-card-title' );
	satellite_i18n( $satellite_tp['short'][0], $satellite_tp['short'][1], 'p', 'tech-card-text' );
	// Der Button-Link wird per CSS über die ganze Karte gezogen (Karte komplett klickbar).
	satellite_button_pair( 'LEARN MORE', 'MEHR ERFAHREN', home_url( '/work-packages/tp-' . $satellite_n . '/' ), 'tech-card-more' );
	satellite_close();
	satellite_close();
}
satellite_close(); // tech-cards
satellite_close(); // tech-stack-row
satellite_close( 'section' );
