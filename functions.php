<?php
/**
 * Satellite theme setup.
 */

function satellite_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'satellite_setup' );

function satellite_pattern_categories() {
	register_block_pattern_category( 'satellite', array(
		'label' => __( 'Satellite', 'satellite' ),
	) );
}
add_action( 'init', 'satellite_pattern_categories' );

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
