<?php
/**
 * Title: Satellite – Kontakt
 * Slug: satellite/contact-page
 * Categories: satellite
 * Description: Seite "Kontakt": Seitenkopf und Karten mit Projektkoordination, Projektleitung und Ansprechpartner.
 *
 * Deutsch: Inhalt der Kontakt-Seite (Seite "Contact"). Kein Formular — nur
 * Kontaktdaten (Entscheidung: E-Mail, Telefon und Adresse genügen). Angaben von
 * fornano.pinsker.ai/contact; alle Texte zweisprachig und als Blöcke
 * editierbar. Karte "Ansprechpartner Satellitenprojekt": Prof. Fey — Schreibweise
 * des Namens und Kontaktdaten sind noch zu ergänzen.
 */
satellite_page_hero( 'Contact', 'Kontakt' );

satellite_open( 'section page-text', 'section', 'contact' );
satellite_open( 'contact-intro-block' );
satellite_i18n( 'Do you have questions about the project? Get in touch with us.', 'Haben Sie Fragen zum Projekt? Nehmen Sie gerne Kontakt mit uns auf.', 'p', 'contact-lead' );
satellite_close();

satellite_open( 'contact-grid' );

/*
 * Drei Karten mit gleichem Aufbau: Überschrift, Kurztext, dann Feld-Paare
 * (Beschriftung + Wert) in fester Reihenfolge. Felder: array( EN-Label, DE-Label,
 * EN-Wert, DE-Wert ) — Werte mit <a> oder <br> sind erlaubt.
 */
$satellite_contact_cards = array(
	array(
		'Project coordination', 'Projektkoordination',
		'For general enquiries about the FORnanoSatellites research consortium, please contact our project coordination.',
		'Für allgemeine Anfragen zum FORnanoSatellites Forschungsverbund wenden Sie sich bitte an unsere Projektkoordination.',
		array(
			array( 'Institution', 'Einrichtung', 'Chair of Computer Science 3 (Computer Architecture)', 'Lehrstuhl für Informatik 3 (Rechnerarchitektur)' ),
			array( 'Email', 'E-Mail', '<a href="mailto:cs3-sekretariat@fau.de">cs3-sekretariat@fau.de</a>', '<a href="mailto:cs3-sekretariat@fau.de">cs3-sekretariat@fau.de</a>' ),
			array( 'Address', 'Adresse', 'Room 07.156<br>Martensstr. 3<br>91058 Erlangen, Germany', 'Raum 07.156<br>Martensstr. 3<br>91058 Erlangen' ),
			array( 'Phone', 'Telefon', '<a href="tel:+4991318527003">+49 9131 85-27003</a>', '<a href="tel:+4991318527003">+49 9131 85-27003</a>' ),
		),
	),
	array(
		'Contact person', 'Ansprechpartner',
		'Contact person for the satellite project.',
		'Ansprechpartner für das Satellitenprojekt.',
		array(
			array( 'Name', 'Name', 'Prof. Fey', 'Prof. Fey' ),
			array( 'Role', 'Funktion', 'Academic supervision', 'Wissenschaftliche Betreuung' ),
			array( 'Email', 'E-Mail', 'to be added', 'wird ergänzt' ),
			array( 'Phone', 'Telefon', 'to be added', 'wird ergänzt' ),
		),
	),
	array(
		'Project management', 'Projektleitung',
		'Project management of the FORnanoSatellites research consortium.',
		'Projektleitung des FORnanoSatellites Forschungsverbundes.',
		array(
			array( 'Name', 'Name', 'Prof. Dr.-Ing. Jörg Franke', 'Prof. Dr.-Ing. Jörg Franke' ),
			array( 'Institution', 'Einrichtung', 'Chair of Manufacturing Automation and Production Systems (FAPS), Friedrich-Alexander-Universität Erlangen-Nürnberg', 'Lehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS), Friedrich-Alexander-Universität Erlangen-Nürnberg' ),
			array( 'Email', 'E-Mail', '<a href="mailto:info@faps.fau.de">info@faps.fau.de</a>', '<a href="mailto:info@faps.fau.de">info@faps.fau.de</a>' ),
			array( 'Address', 'Adresse', 'Fürther Str. 246b<br>90429 Nürnberg, Germany', 'Fürther Str. 246b<br>90429 Nürnberg' ),
			array( 'Phone', 'Telefon', '<a href="tel:+49911530296100">+49 911 5302-96100</a>', '<a href="tel:+49911530296100">+49 911 5302-96100</a>' ),
		),
	),
);

foreach ( $satellite_contact_cards as $satellite_card ) {
	satellite_open( 'contact-card' );
	satellite_i18n( $satellite_card[0], $satellite_card[1], 'h2', 'contact-heading' );
	satellite_i18n( $satellite_card[2], $satellite_card[3], 'p', 'contact-intro' );
	foreach ( $satellite_card[4] as $satellite_field ) {
		satellite_i18n( $satellite_field[0], $satellite_field[1], 'h3', 'contact-label' );
		satellite_i18n( $satellite_field[2], $satellite_field[3], 'p', 'contact-value' );
	}
	satellite_close();
}

satellite_close(); // contact-grid
satellite_close( 'section' );
