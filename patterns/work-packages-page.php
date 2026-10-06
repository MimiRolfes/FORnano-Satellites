<?php
/**
 * Title: Satellite – Arbeitspakete (Übersicht)
 * Slug: satellite/work-packages-page
 * Categories: satellite
 * Description: Übersichtsseite der sechs Teilprojekte mit Links zu den Unterseiten TP1–TP6.
 *
 * Deutsch: Elternseite "Work packages" (Adresse /work-packages/). Die sechs
 * Teilprojekte sind normale Unterseiten dieser Seite (/work-packages/tp-1/ …).
 * Texte aus inc/work-packages.php; alles zweisprachig und als Blöcke editierbar.
 */
satellite_page_hero( 'Work Packages', 'Arbeitspakete' );

satellite_open( 'section page-text', 'section', 'work-packages-overview' );
satellite_open( 'page-text-inner' );
satellite_i18n( '6 interlinked subprojects for a new generation of nanosatellites', '6 vernetzte Teilprojekte für eine neue Generation von Kleinstsatelliten', 'p', 'page-text-note' );
foreach ( satellite_work_packages() as $satellite_n => $satellite_tp ) {
	$satellite_url = home_url( '/work-packages/tp-' . $satellite_n . '/' );
	satellite_i18n(
		'<a href="' . esc_url( $satellite_url ) . '">TP' . $satellite_n . ' · ' . esc_html( $satellite_tp['title'][0] ) . '</a>',
		'<a href="' . esc_url( $satellite_url ) . '">TP' . $satellite_n . ' · ' . esc_html( $satellite_tp['title'][1] ) . '</a>',
		'h3'
	);
	satellite_i18n( $satellite_tp['short'][0], $satellite_tp['short'][1] );
}
satellite_close();
satellite_close( 'section' );
