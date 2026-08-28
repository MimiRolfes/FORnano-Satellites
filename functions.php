<?php
/**
 * Grundlegendes Setup des Satellite-Themes.
 */

/**
 * Aktiviert den dynamischen <title>-Tag von WordPress, damit der
 * Seitentitel automatisch (Seitenname + Website-Titel) erzeugt wird.
 */
function satellite_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'satellite_setup' );

/**
 * Registriert eine eigene Pattern-Kategorie "Satellite" für den Block-Editor.
 * Unsere Patterns (siehe patterns/*.php) sind aber mit "Inserter: no"
 * markiert, tauchen also nicht im normalen Einfüge-Dialog auf — sie werden
 * nur intern von den templates/*.html-Dateien referenziert.
 */
function satellite_pattern_categories() {
	register_block_pattern_category( 'satellite', array(
		'label' => __( 'Satellite', 'satellite' ),
	) );
}
add_action( 'init', 'satellite_pattern_categories' );

/**
 * Bindet Schriften, Haupt-Stylesheet und JavaScript ein.
 * Wichtig: Schriften laufen lokal über fonts/fonts.css (keine externen
 * CDNs, siehe FAU-RRZE-Vorgaben) und style.css ist eine generierte Datei
 * (siehe src/scss/ und build-css.js) — hier nicht manuell anpassen.
 */
function satellite_enqueue_assets() {
	wp_enqueue_style(
		'satellite-fonts',
		get_template_directory_uri() . '/fonts/fonts.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_style(
		'satellite-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'satellite-script',
		get_template_directory_uri() . '/js/satellite.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'satellite_enqueue_assets' );
