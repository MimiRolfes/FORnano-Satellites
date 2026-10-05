<?php
/**
 * Title: Satellite – Impressum
 * Slug: satellite/impressum-page
 * Categories: satellite
 * Description: Impressum (Rechtstext, Seite "Impressum").
 *
 * Deutsch: Inhalt der Seite "Impressum" (Slug impressum). Text von fornano.pinsker.ai/impressum.
 * Nur auf Deutsch, da rechtsverbindlich (im EN-Modus steht ein Hinweis). Alle
 * Absätze sind normale Blöcke; vor dem Livegang von der FAU zu prüfen.
 */
satellite_page_hero( 'Legal Notice', 'Impressum' );

$satellite_legal = array(
	array( 'h2', 'Angaben gemäß § 5 TMG' ),
	array( 'p', "Friedrich-Alexander-Universität Erlangen-Nürnberg (FAU)\nLehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS)\nFürther Str. 246b\n90429 Nürnberg\nDeutschland" ),
	array( 'h3', 'Vertreten durch' ),
	array( 'p', 'Die Friedrich-Alexander-Universität Erlangen-Nürnberg ist eine Körperschaft des öffentlichen Rechts. Sie wird gesetzlich vertreten durch den Präsidenten Prof. Dr. Joachim Hornegger.' ),
	array( 'h3', 'Projektleitung FORnanoSatellites' ),
	array( 'p', "Prof. Dr.-Ing. Jörg Franke\nLehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS)\nE-Mail: info@faps.fau.de\nTelefon: +49 911 5302-96100" ),
	array( 'h3', 'Zuständige Aufsichtsbehörde' ),
	array( 'p', "Bayerisches Staatsministerium für Wissenschaft und Kunst\nSalvatorstraße 2\n80333 München" ),
	array( 'h3', 'Umsatzsteuer-Identifikationsnummer' ),
	array( 'p', "Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz:\nDE 132507686" ),
	array( 'h3', 'Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV' ),
	array( 'p', "Prof. Dr.-Ing. Jörg Franke\nFürther Str. 246b\n90429 Nürnberg" ),
	array( 'h3', 'Förderung' ),
	array( 'p', 'Das Projekt FORnanoSatellites wird gefördert durch die Bayerische Forschungsstiftung mit einem Fördervolumen von 1,8 Mio. €.' ),
	array( 'h2', 'Haftungsausschluss' ),
	array( 'h3', 'Haftung für Inhalte' ),
	array( 'p', 'Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.' ),
	array( 'h3', 'Haftung für Links' ),
	array( 'p', 'Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.' ),
	array( 'h3', 'Urheberrecht' ),
	array( 'p', 'Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.' ),
);


satellite_open( 'section page-text', 'section', 'legal' );
satellite_open( 'page-text-inner' );
satellite_text( 'This legal text is provided in German only.', 'p', 'page-text-note lang-en' );
satellite_render_text_blocks( $satellite_legal );
satellite_close();
satellite_close( 'section' );
