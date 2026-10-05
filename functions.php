<?php
/**
 * Grundlegendes Setup des Satellite-Themes.
 *
 * Aufbau:
 *  - inc/blocks.php          Helfer, die gültige Kernblöcke für die Patterns erzeugen
 *  - inc/work-packages.php   Texte der Teilprojekte TP1–TP6 (DE/EN)
 *  - inc/contact-form.php    Kontaktformular-Block + Versand
 *  - patterns/*.php          Inhalt der Seiten (werden beim Aktivieren als echte Seiten angelegt)
 *  - parts/, templates/      Kopf/Fuß und Seitenvorlagen
 */

require_once get_template_directory() . '/inc/blocks.php';
require_once get_template_directory() . '/inc/contact-form.php';

/**
 * Theme-Funktionen: dynamischer <title>, Editor-Stylesheets (der Block-
 * Editor zeigt die Seite im gleichen Look wie die Website, damit man direkt
 * "auf der Seite" bearbeitet).
 */
function satellite_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'fonts/fonts.css', 'style.css', 'editor-style.css' ) );
}
add_action( 'after_setup_theme', 'satellite_setup' );

/**
 * Registriert die Pattern-Kategorie "Satellite" für den Block-Editor.
 * Die Seiten-Patterns erscheinen im Einfüge-Dialog und lassen sich so jederzeit
 * in eine neue Seite einfügen (z. B. um den Ausgangszustand wiederherzustellen).
 */
function satellite_pattern_categories() {
	register_block_pattern_category( 'satellite', array(
		'label' => __( 'Satellite', 'satellite' ),
	) );
}
add_action( 'init', 'satellite_pattern_categories' );

/**
 * Teilprojekte (TP1–TP6): eigener Beitragstyp "work_package" (URL
 * /work-packages/tp-1/ …). Der Inhalt eines Teilprojekts besteht aus
 * normalen Blöcken (Seitenkopf, Überschrift, Text, Zurück-Buttons); die
 * Vorbelegung (inc/work-packages.php) wird beim Aktivieren des Themes
 * einmalig als sechs Beiträge angelegt, danach wird alles im Editor
 * gepflegt. Templates: templates/single-work_package.html.
 */
function satellite_work_packages() {
	return require get_template_directory() . '/inc/work-packages.php';
}

function satellite_register_work_package_type() {
	register_post_type(
		'work_package',
		array(
			'labels'       => array(
				'name'          => __( 'Subprojects', 'satellite' ),
				'singular_name' => __( 'Subproject', 'satellite' ),
				'add_new_item'  => __( 'Add new subproject', 'satellite' ),
				'edit_item'     => __( 'Edit subproject', 'satellite' ),
			),
			'public'       => true,
			'show_in_rest' => true, // Block-Editor
			'menu_icon'    => 'dashicons-networking',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'rewrite'      => array( 'slug' => 'work-packages' ),
			'has_archive'  => false,
		)
	);
}
add_action( 'init', 'satellite_register_work_package_type' );

/**
 * Block-Markup eines Teilprojekts: Seitenkopf, oben ein Zurück-Button,
 * Überschrift + Projektleitung, der Text und unten wieder ein Zurück-Button.
 * Alle Texte zweisprachig (siehe satellite_i18n()).
 */
function satellite_work_package_content( $n, $tp ) {
	ob_start();
	satellite_page_hero( 'Subproject', 'Teilprojekt', 'FORnano Satellites' );

	echo '<!-- wp:group ' . wp_json_encode( array( 'tagName' => 'section', 'className' => 'section page-text', 'anchor' => 'work-package', 'layout' => array( 'type' => 'default' ) ) ) . " -->\n";
	echo "<section class=\"wp-block-group section page-text\" id=\"work-package\">\n";
	echo '<!-- wp:group ' . wp_json_encode( array( 'className' => 'page-text-inner work-package', 'layout' => array( 'type' => 'default' ) ) ) . " -->\n";
	echo "<div class=\"wp-block-group page-text-inner work-package\">\n";

	satellite_button_pair( 'BACK', 'ZURÜCK', home_url( '/about/#tech-stack' ), 'work-package-back work-package-back--top' );
	satellite_i18n( 'TP' . $n . ' · ' . $tp['title'][0], 'TP' . $n . ' · ' . $tp['title'][1], 'h2', 'work-package-title' );
	satellite_i18n( 'Project lead: ' . $tp['lead'][0], 'Projektleitung: ' . $tp['lead'][1], 'p', 'work-package-lead' );
	foreach ( $tp['body'] as $para ) {
		satellite_i18n( $para[0], $para[1] );
	}
	satellite_button_pair( 'BACK', 'ZURÜCK', home_url( '/about/#tech-stack' ), 'work-package-back work-package-back--bottom' );

	echo "</div>\n<!-- /wp:group -->\n\n</section>\n<!-- /wp:group -->\n";
	return ob_get_clean();
}

/**
 * Inhalt eines Seiten-Patterns als Block-Markup (für die Start-Seiten).
 */
function satellite_pattern_content( $slug ) {
	$registry = WP_Block_Patterns_Registry::get_instance();
	$pattern  = $registry->get_registered( $slug );
	return $pattern ? $pattern['content'] : '';
}

/**
 * Beim Aktivieren des Themes werden angelegt (nur was fehlt):
 *  - die sechs Teilprojekt-Beiträge,
 *  - die Seiten Home, About, Gallery, Contact, Impressum und Datenschutz
 *    mit dem Inhalt der gleichnamigen Patterns (als echte, bearbeitbare Blöcke),
 *  - Home wird als Startseite gesetzt.
 * Danach arbeitet man wie gewohnt unter "Seiten" bzw. "Subprojects".
 */
function satellite_seed_content() {
	satellite_register_work_package_type();

	foreach ( satellite_work_packages() as $n => $tp ) {
		if ( get_page_by_path( 'tp-' . $n, OBJECT, 'work_package' ) ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_type'    => 'work_package',
				'post_status'  => 'publish',
				'post_name'    => 'tp-' . $n,
				'post_title'   => 'TP' . $n . ': ' . $tp['title'][1],
				'menu_order'   => $n,
				'post_content' => satellite_work_package_content( $n, $tp ),
			)
		);
	}

	$pages = array(
		'home'        => array( 'Home', 'satellite/home' ),
		'about'       => array( 'About the project', 'satellite/about-page' ),
		'gallery'     => array( 'Gallery', 'satellite/gallery-page' ),
		'contact'     => array( 'Contact', 'satellite/contact-page' ),
		'impressum'   => array( 'Impressum', 'satellite/impressum-page' ),
		'datenschutz' => array( 'Datenschutz', 'satellite/datenschutz-page' ),
	);
	foreach ( $pages as $slug => $page ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $slug,
				'post_title'   => $page[0],
				'post_content' => satellite_pattern_content( $page[1] ),
			)
		);
	}

	$home = get_page_by_path( 'home' );
	if ( $home ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home->ID );
	}
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'satellite_seed_content' );

/**
 * Setzt [data-lang] auf <html> so früh wie möglich (vor dem ersten Render),
 * damit wiederkehrende Besucher mit gespeicherter Sprachwahl nicht kurz die
 * andere Sprache aufblitzen sehen, bevor satellite.js geladen ist. Standard: Englisch.
 */
function satellite_lang_flash_guard() {
	echo "<script>(function(){var l='en';try{if(localStorage.getItem('satellite-lang')==='de'){l='de';}}catch(e){}document.documentElement.setAttribute('data-lang',l);})();</script>\n";
}
add_action( 'wp_head', 'satellite_lang_flash_guard', 0 );

/**
 * URL eines Skripts aus js/: bevorzugt die minifizierte Datei (js/<name>.min.js,
 * erzeugt mit `npm run build:js`), sonst die lesbare Quelle aus js/src/.
 */
function satellite_script_url( $name ) {
	$min = get_template_directory() . '/js/' . $name . '.min.js';
	return get_template_directory_uri() . ( file_exists( $min ) ? '/js/' . $name . '.min.js' : '/js/src/' . $name . '.js' );
}

/**
 * Skripte, die nur bestimmte Seiten brauchen (FAU: Skripte nur laden, wo sie
 * benötigt werden). Jeder Eintrag: Dateiname => Erkennungsmerkmale im Markup.
 * Das Basis-Skript (satellite.js: Menü, Sprachumschalter, Buttons, Effekte)
 * läuft überall.
 */
function satellite_feature_scripts() {
	return array(
		'hero-orb'  => array( 'id="hero-orb"' ),
		'timeline'  => array( 'timeline-group' ),
		'page-hero' => array( 'about-hero-title' ),
		'about'     => array( 'wp-block-group tech-card', 'id="fade-card"' ),
	);
}

/** Lädt ein Feature-Skript, sobald ein gerenderter Block sein Merkmal enthält. */
function satellite_enqueue_features( $content ) {
	foreach ( satellite_feature_scripts() as $name => $markers ) {
		foreach ( $markers as $marker ) {
			if ( false !== strpos( $content, $marker ) ) {
				wp_enqueue_script( 'satellite-' . $name, satellite_script_url( $name ), array(), wp_get_theme()->get( 'Version' ), true );
				break;
			}
		}
	}
	return $content;
}
add_filter( 'render_block', 'satellite_enqueue_features', 20 );

/**
 * Bindet Schriften, Haupt-Stylesheet und JavaScript ein. Schriften laufen
 * lokal über fonts/fonts.css (keine externen CDNs, siehe FAU-RRZE-Vorgaben);
 * style.css ist eine generierte Datei (src/scss/ + build-css.js).
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
	wp_enqueue_script( 'satellite-script', satellite_script_url( 'satellite' ), array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'satellite_enqueue_assets' );
