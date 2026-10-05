<?php
/**
 * Title: Satellite – Kontakt
 * Slug: satellite/contact-page
 * Categories: satellite
 * Description: Seite "Kontakt": Seitenkopf, Kontaktformular und Karten mit Projektkoordination und Projektleitung.
 *
 * Deutsch: Inhalt der Kontakt-Seite (Seite "Contact"). Aufbau und Texte nach
 * fornano.pinsker.ai/contact. Alle Texte sind normale, zweisprachige Blöcke;
 * das Formular ist der Block "Satellite: Kontaktformular" — seine
 * Beschriftungen (Englisch + Deutsch) stehen in der Block-Seitenleiste.
 * Versand: siehe inc/contact-form.php.
 */
satellite_page_hero( 'Contact', 'Kontakt' );

satellite_open( 'section page-text', 'section', 'contact' );
satellite_open( 'contact-grid' );

satellite_open( 'contact-card contact-form-card' );
satellite_i18n( 'Send a message', 'Nachricht senden', 'h2', 'contact-heading' );
satellite_i18n( 'Do you have questions about the project? We look forward to your message.', 'Haben Sie Fragen zum Projekt? Wir freuen uns auf Ihre Nachricht.', 'p', 'contact-intro' );
echo "<!-- wp:satellite/contact-form /-->\n\n";
satellite_close();

satellite_open( 'contact-side' );
satellite_open( 'contact-card' );
satellite_i18n( 'Project coordination', 'Projektkoordination', 'h2', 'contact-heading' );
satellite_i18n( 'For general enquiries about the FORnanoSatellites research consortium, please contact our project coordination.', 'Für allgemeine Anfragen zum FORnanoSatellites Forschungsverbund wenden Sie sich bitte an unsere Projektkoordination.', 'p', 'contact-intro' );
satellite_i18n( 'Email', 'E-Mail', 'h3', 'contact-label' );
satellite_text( '<a href="mailto:cs3-sekretariat@fau.de">cs3-sekretariat@fau.de</a>', 'p', 'contact-value' );
satellite_i18n( 'Address', 'Adresse', 'h3', 'contact-label' );
satellite_i18n( 'Chair of Computer Science 3 (Computer Architecture)<br>Room 07.156<br>Martensstr. 3<br>91058 Erlangen, Germany', 'Lehrstuhl für Informatik 3 (Rechnerarchitektur)<br>Raum 07.156<br>Martensstr. 3<br>91058 Erlangen', 'p', 'contact-value' );
satellite_i18n( 'Phone', 'Telefon', 'h3', 'contact-label' );
satellite_text( '<a href="tel:+4991318527003">+49 9131 85-27003</a>', 'p', 'contact-value' );
satellite_close();
satellite_open( 'contact-card' );
satellite_i18n( 'Project management', 'Projektleitung', 'h2', 'contact-heading' );
satellite_i18n( 'Chair of Manufacturing Automation and Production Systems (FAPS)<br>Friedrich-Alexander-Universität Erlangen-Nürnberg', 'Lehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS)<br>Friedrich-Alexander-Universität Erlangen-Nürnberg', 'p', 'contact-value' );
satellite_close();
satellite_close(); // contact-side

satellite_close(); // contact-grid
satellite_close( 'section' );
