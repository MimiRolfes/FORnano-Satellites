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
/**
 * Kleines Inline-SVG "Pfeil nach oben" (↑). Steht in der About-Sektion links
 * neben jeder Kennzahl — analog zur Framer-Referenz. Rein dekorativ
 * (aria-hidden), erbt die Textfarbe.
 */
function satellite_arrow_icon() {
	return '<svg class="metric-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">'
		. '<path d="M12 19V6M12 6L6 12M12 6L18 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/>'
		. '</svg>';
}

/**
 * Gibt eine Personen-Karte der Team-Sektion als Block-Markup aus
 * (Foto oder dunkler Platzhalter mit Eckwinkeln, Name, Rolle, feine Linie).
 * Foto: images/people/<datei> — nur wenn die Datei vorhanden ist.
 *
 * @param array $person name, role, photo (Dateiname unter images/people/).
 */
function satellite_person_card( $person ) {
	$name      = isset( $person['name'] ) ? $person['name'] : '';
	$role      = isset( $person['role'] ) ? $person['role'] : '';
	$photo     = isset( $person['photo'] ) ? $person['photo'] : '';
	$photo_rel = 'images/people/' . $photo;
	$has_photo = $photo && file_exists( get_template_directory() . '/' . $photo_rel );
	?>
	<!-- wp:group {"className":"person","layout":{"type":"default"}} -->
	<div class="wp-block-group person">
		<?php if ( $has_photo ) : ?>
		<!-- wp:image {"className":"person-photo"} -->
		<figure class="wp-block-image person-photo"><img src="<?php echo esc_url( get_template_directory_uri() . '/' . $photo_rel ); ?>" alt="<?php echo esc_attr( $name ); ?>" /></figure>
		<!-- /wp:image -->
		<?php else : ?>
		<!-- wp:html -->
		<div class="person-photo" role="img" aria-label="<?php echo esc_attr( $name ); ?>"></div>
		<!-- /wp:html -->
		<?php endif; ?>
		<!-- wp:paragraph {"className":"person-name"} -->
		<p class="person-name"><?php echo esc_html( $name ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"person-role"} -->
		<p class="person-role"><?php echo esc_html( $role ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:html --><div class="person-line" aria-hidden="true"></div><!-- /wp:html -->
	</div>
	<!-- /wp:group -->
	<?php
}

/**
 * Gibt die Sticky-Gruppenleiste eines Arbeitspakete-Blocks aus (Framer:
 * "Day N Details" — links/Mitte/rechts, Blur-Hintergrund, Rahmen unten).
 *
 * @param array $group range (z. B. "TP1–TP2"), theme (Kurztitel).
 */
function satellite_timeline_bar( $group ) {
	$range = isset( $group['range'] ) ? $group['range'] : '';
	$theme = isset( $group['theme'] ) ? $group['theme'] : '';
	?>
	<div class="timeline-bar">
		<!-- wp:paragraph {"className":"timeline-bar-range"} -->
		<p class="timeline-bar-range"><?php echo esc_html( $range ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"timeline-bar-theme"} -->
		<p class="timeline-bar-theme"><?php echo esc_html( $theme ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"timeline-bar-meta"} -->
		<p class="timeline-bar-meta">FORnano Satellites</p>
		<!-- /wp:paragraph -->
	</div>
	<?php
}

/**
 * Gibt einen Zeitleisten-Eintrag der Arbeitspakete-Sektion als Block-Markup
 * aus (abwechselnd links/rechts per :nth-child(even) in _timeline.scss).
 * Punkt + eigenes Linien-Segment gehören zu diesem Eintrag (siehe
 * _timeline.scss — keine gemeinsame durchgehende Linie über alle Einträge).
 *
 * @param array $item title, text, dark (optional — true ab dem Punkt, wo
 *                     die Karte auf dem hellen Verlaufsteil liegt und
 *                     dunklen statt hellen Text braucht).
 */
function satellite_timeline_item( $item ) {
	$title     = isset( $item['title'] ) ? $item['title'] : '';
	$text      = isset( $item['text'] ) ? $item['text'] : '';
	$card_cls  = 'timeline-card' . ( ! empty( $item['dark'] ) ? ' timeline-card--dark' : '' );
	?>
	<!-- Reines Listen-Element (Layout/Semantik) — kein Block-Wrapper, da
	     "li" kein gültiger Group-Block-Tag ist. Die Inhalte darin (Titel,
	     Text) bleiben als echte Blöcke editierbar. -->
	<li class="timeline-item">
		<!-- wp:html --><div class="timeline-spacer" aria-hidden="true"></div><!-- /wp:html -->
		<!-- wp:html -->
		<div class="timeline-dot-col">
			<span class="timeline-dot"></span>
			<span class="timeline-line-seg" aria-hidden="true"></span>
		</div>
		<!-- /wp:html -->
		<!-- wp:group {"className":"<?php echo esc_attr( $card_cls ); ?>","layout":{"type":"default"}} -->
		<div class="wp-block-group <?php echo esc_attr( $card_cls ); ?>">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html( $title ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html( $text ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</li>
	<?php
}

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
