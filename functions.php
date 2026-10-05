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
 * Pfeil-Icon (↗) für Buttons wie "About the project" — als SVG statt als
 * Unicode-Zeichen (U+2197), da Handy-Browser dafür ein anderes Fallback-Font
 * mit sichtbar anderer Pfeilform nutzen als Desktop-Browser. SVG rendert
 * überall identisch.
 */
function satellite_arrow_up_right_icon() {
	return '<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">'
		. '<path d="M7 17 17 7M7 7h10v10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>'
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
		<p class="person-role"><?php satellite_i18n_text( $role, isset( $person['role_de'] ) ? $person['role_de'] : $role ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:html --><div class="person-line" aria-hidden="true"></div><!-- /wp:html -->
	</div>
	<!-- /wp:group -->
	<?php
}

/**
 * Gibt eine Partner-/Förderer-Karte der Sponsoren-Sektion aus (Framer:
 * "Cards/Logo Card"). Eigene Logo-Datei unter images/sponsors/<logo> ablegen
 * oder im Website-Editor per Bild-Block ersetzen — ohne Datei zeigt die
 * Karte einen Platzhalter-Rahmen, damit die Sektion beim Testen ohne echte
 * Logos trotzdem vollständig aussieht.
 *
 * @param array $sponsor name, logo (Dateiname in images/sponsors/, optional).
 */
function satellite_sponsor_card( $sponsor ) {
	$name     = isset( $sponsor['name'] ) ? $sponsor['name'] : '';
	$logo     = isset( $sponsor['logo'] ) ? $sponsor['logo'] : '';
	$logo_rel = 'images/sponsors/' . $logo;
	$has_logo = $logo && file_exists( get_template_directory() . '/' . $logo_rel );
	?>
	<!-- wp:group {"className":"sponsor-card","layout":{"type":"default"}} -->
	<div class="wp-block-group sponsor-card">
		<?php if ( $has_logo ) : ?>
		<!-- wp:image {"className":"sponsor-logo"} -->
		<figure class="wp-block-image sponsor-logo"><img src="<?php echo esc_url( get_template_directory_uri() . '/' . $logo_rel ); ?>" alt="<?php echo esc_attr( $name ); ?>" /></figure>
		<!-- /wp:image -->
		<?php else : ?>
		<!-- wp:html -->
		<div class="sponsor-logo sponsor-logo--placeholder" role="img" aria-label="<?php echo esc_attr( $name ); ?>"></div>
		<!-- /wp:html -->
		<?php endif; ?>
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
	$range    = isset( $group['range'] ) ? $group['range'] : '';
	$theme    = isset( $group['theme'] ) ? $group['theme'] : '';
	$theme_de = isset( $group['theme_de'] ) ? $group['theme_de'] : $theme;
	?>
	<div class="timeline-bar">
		<!-- wp:paragraph {"className":"timeline-bar-range"} -->
		<p class="timeline-bar-range"><?php echo esc_html( $range ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"timeline-bar-theme"} -->
		<p class="timeline-bar-theme"><?php satellite_i18n_text( $theme, $theme_de ); ?></p>
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
	$title_de  = isset( $item['title_de'] ) ? $item['title_de'] : $title;
	$text      = isset( $item['text'] ) ? $item['text'] : '';
	$text_de   = isset( $item['text_de'] ) ? $item['text_de'] : $text;
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
			<h3 class="wp-block-heading"><span lang="en"><?php echo esc_html( $title ); ?></span><span lang="de"><?php echo esc_html( $title_de ); ?></span></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><span lang="en"><?php echo esc_html( $text ); ?></span><span lang="de"><?php echo esc_html( $text_de ); ?></span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</li>
	<?php
}

/**
 * Sprachumschalter (DE/EN): gibt einen Textblock in BEIDEN Sprachen aus,
 * je als eigener, im Block-Editor bearbeitbarer wp:paragraph/wp:heading-
 * Block. Sichtbarkeit wird per [lang]-Attribut + CSS/JS umgeschaltet
 * (siehe _base.scss "[lang]"-Regeln und js/satellite.js initLanguageToggle()).
 * Beide Sprachen sind Pflicht — es gibt bewusst keinen Fallback auf nur
 * eine Sprache, damit im Editor nie eine Übersetzung fehlt.
 *
 * @param string $en    Englischer Text (Pflicht).
 * @param string $de    Deutscher Text (Pflicht).
 * @param string $tag   HTML-Tag: p, h1, h2, h3, h4.
 * @param string $class Zusätzliche CSS-Klasse(n), z. B. "heading".
 */
function satellite_i18n( $en, $de, $tag = 'p', $class = '' ) {
	$is_heading = (bool) preg_match( '/^h[1-6]$/', $tag );
	$block_type = $is_heading ? 'heading' : 'paragraph';
	$level      = $is_heading ? (int) substr( $tag, 1 ) : null;
	$css_class  = trim( 'wp-block-' . $block_type . ' ' . $class );

	foreach ( array( 'en' => $en, 'de' => $de ) as $lang => $text ) {
		$attrs = array( 'className' => trim( $class ) );
		if ( $level && 2 !== $level ) {
			$attrs['level'] = $level;
		}
		?>
		<!-- wp:<?php echo esc_html( $block_type ); ?> <?php echo wp_json_encode( $attrs ); ?> -->
		<<?php echo esc_html( $tag ); ?> lang="<?php echo esc_attr( $lang ); ?>" class="<?php echo esc_attr( $css_class ); ?>"><?php echo esc_html( $text ); ?></<?php echo esc_html( $tag ); ?>>
		<!-- /wp:<?php echo esc_html( $block_type ); ?> -->
		<?php
	}
}

/**
 * Sprachumschalter, Inline-Variante: für kurze Textstücke INNERHALB eines
 * bestehenden Elements (Nav-Link, Button-Beschriftung) — ohne eigene
 * Block-Umschließung, da im Editor als Teil des umgebenden Textes
 * bearbeitbar. Beide Sprachen Pflicht, siehe satellite_i18n().
 */
function satellite_i18n_text( $en, $de ) {
	printf(
		'<span lang="en">%1$s</span><span lang="de">%2$s</span>',
		esc_html( $en ),
		esc_html( $de )
	);
}

/**
 * Seiten-Header der Unterseiten (Impressum, Datenschutz, Kontakt): gleicher
 * Aufbau wie der Header der About-Seite (400px, Bild + heller Glow, Titel
 * erscheint Zeichen für Zeichen). Titel zweisprachig (beide Pflicht).
 *
 * @param string $title_en Englischer Titel.
 * @param string $title_de Deutscher Titel.
 * @param string|array $sub Zeile unter dem Titel: Text (sprachneutral) oder array( EN, DE ).
 */
function satellite_page_hero( $title_en, $title_de, $sub = 'FORnano Satellites' ) {
	$img = get_template_directory() . '/images/gallery/nebula-flow.jpg';
	?>
	<header class="about-hero">
		<div class="about-hero-bg" aria-hidden="true">
			<?php if ( file_exists( $img ) ) : ?>
			<img class="about-hero-img" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery/nebula-flow.jpg' ); ?>" />
			<?php endif; ?>
			<div class="about-hero-glow"></div>
		</div>
		<div class="about-hero-titles">
			<!-- wp:heading {"level":1,"className":"about-hero-title"} -->
			<h1 class="wp-block-heading about-hero-title" lang="en"><?php echo esc_html( $title_en ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":1,"className":"about-hero-title"} -->
			<h1 class="wp-block-heading about-hero-title" lang="de"><?php echo esc_html( $title_de ); ?></h1>
			<!-- /wp:heading -->
			<?php foreach ( is_array( $sub ) ? array( 'en' => $sub[0], 'de' => $sub[1] ) : array( '' => $sub ) as $lang => $text ) : ?>
			<!-- wp:paragraph {"className":"about-hero-sub"} -->
			<p class="about-hero-sub"<?php echo $lang ? ' lang="' . esc_attr( $lang ) . '"' : ''; ?>><?php echo esc_html( $text ); ?></p>
			<!-- /wp:paragraph -->
			<?php endforeach; ?>
		</div>
	</header>
	<?php
}

/**
 * Gibt eine Liste von Textbausteinen als echte Gutenberg-Blöcke aus (für die
 * Rechtstexte, damit sie im Site-Editor als Überschriften/Absätze/Listen
 * bearbeitbar sind). Einträge: array( 'h2'|'h3'|'p'|'ul', Text bzw. Liste ).
 * Zeilenumbrüche in 'p' werden zu <br> (Adressblöcke).
 */
function satellite_render_text_blocks( $items ) {
	foreach ( $items as $item ) {
		list( $type, $text ) = $item;
		if ( 'ul' === $type ) {
			echo "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
			foreach ( $text as $li ) {
				echo "<!-- wp:list-item --><li>" . esc_html( $li ) . "</li><!-- /wp:list-item -->";
			}
			echo "</ul>\n<!-- /wp:list -->\n";
		} elseif ( 'p' === $type ) {
			echo "<!-- wp:paragraph -->\n<p>" . nl2br( esc_html( $text ) ) . "</p>\n<!-- /wp:paragraph -->\n";
		} else {
			$level = (int) substr( $type, 1 );
			$attrs = 2 === $level ? '' : ' ' . wp_json_encode( array( 'level' => $level ) );
			echo "<!-- wp:heading{$attrs} -->\n<{$type} class=\"wp-block-heading\">" . esc_html( $text ) . "</{$type}>\n<!-- /wp:heading -->\n";
		}
	}
}

/**
 * Kontaktformular (templates/page-contact.html → patterns/contact-page.php).
 * Das Formular postet an admin-post.php; die Mail geht an die unter
 * Einstellungen → Allgemein hinterlegte Administrations-E-Mail-Adresse, oder
 * an eine andere, wenn der Filter "satellite_contact_recipient" gesetzt wird.
 * Schutz: Nonce + Honeypot-Feld; alle Eingaben werden bereinigt.
 */
function satellite_handle_contact_form() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );
	$back = remove_query_arg( 'contact', $back );

	if ( ! isset( $_POST['satellite_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['satellite_contact_nonce'] ) ), 'satellite_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', $back ) );
		exit;
	}
	// Honeypot: echte Besucher lassen das (per CSS versteckte) Feld leer.
	if ( ! empty( $_POST['satellite_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', $back ) );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['satellite_name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['satellite_email'] ?? '' ) );
	$org     = sanitize_text_field( wp_unslash( $_POST['satellite_org'] ?? '' ) );
	$subject = sanitize_text_field( wp_unslash( $_POST['satellite_subject'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['satellite_message'] ?? '' ) );

	if ( '' === $name || ! is_email( $email ) || '' === $subject || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'contact', 'invalid', $back ) );
		exit;
	}

	$to      = apply_filters( 'satellite_contact_recipient', get_option( 'admin_email' ) );
	$body    = "Name: $name\nE-Mail: $email\nOrganisation: $org\n\n$message";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( $to, '[FORnano Satellites] ' . $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', $sent ? 'sent' : 'error', $back ) );
	exit;
}
add_action( 'admin_post_nopriv_satellite_contact', 'satellite_handle_contact_form' );
add_action( 'admin_post_satellite_contact', 'satellite_handle_contact_form' );

/**
 * Teilprojekte (TP1–TP6): eigener Beitragstyp "work_package" (URL
 * /work-packages/tp-1/ …), einfach gehalten: Überschrift, Text, optional ein
 * Beitragsbild. Template: templates/single-work_package.html.
 * Die Vorbelegung (Texte von fornano.pinsker.ai) liegt in
 * inc/work-packages.php und wird beim Aktivieren des Themes einmalig als
 * sechs Beiträge angelegt; danach wird alles im Editor gepflegt.
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
 * Block-Markup eines Teilprojekts (zweisprachig: je Text ein EN- und ein
 * DE-Block, Umschaltung über [lang], siehe satellite_i18n()). Die Überschrift
 * des Beitrags selbst wird im Template nicht ausgegeben.
 */
function satellite_work_package_content( $n, $tp ) {
	ob_start();
	foreach ( array( 0 => 'en', 1 => 'de' ) as $i => $lang ) {
		$label = 'en' === $lang ? 'Project lead' : 'Projektleitung';
		?>
<!-- wp:heading {"className":"work-package-title"} -->
<h2 class="wp-block-heading work-package-title" lang="<?php echo esc_attr( $lang ); ?>"><?php echo esc_html( 'TP' . $n . ' · ' . $tp['title'][ $i ] ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"work-package-lead"} -->
<p class="work-package-lead" lang="<?php echo esc_attr( $lang ); ?>"><?php echo esc_html( $label . ': ' . $tp['lead'][ $i ] ); ?></p>
<!-- /wp:paragraph -->
		<?php
	}
	foreach ( $tp['body'] as $para ) {
		foreach ( array( 0 => 'en', 1 => 'de' ) as $i => $lang ) {
			?>
<!-- wp:paragraph -->
<p lang="<?php echo esc_attr( $lang ); ?>"><?php echo esc_html( $para[ $i ] ); ?></p>
<!-- /wp:paragraph -->
			<?php
		}
	}
	return ob_get_clean();
}

/** Legt beim Aktivieren des Themes die sechs Teilprojekt-Beiträge an (nur fehlende). */
function satellite_seed_work_packages() {
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
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'satellite_seed_work_packages' );

/**
 * Setzt [data-lang] auf <html> so früh wie möglich (vor dem ersten Render),
 * damit wiederkehrende Besucher mit gespeicherter DE-Auswahl nicht kurz
 * die englische Version aufblitzen sehen, bevor satellite.js geladen ist.
 */
function satellite_lang_flash_guard() {
	echo "<script>(function(){try{if(localStorage.getItem('satellite-lang')==='de'){document.documentElement.setAttribute('data-lang','de');}}catch(e){}})();</script>\n";
}
add_action( 'wp_head', 'satellite_lang_flash_guard', 0 );

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
		get_template_directory_uri() . ( file_exists( get_template_directory() . '/js/satellite.min.js' ) ? '/js/satellite.min.js' : '/js/satellite.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'satellite_enqueue_assets' );
