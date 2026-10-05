<?php
/**
 * Deutsch: Kleine Helfer, die in den Patterns (patterns/*.php) echte,
 * gültige Gutenberg-Blöcke erzeugen. Grundregel: Alles, was ein Redakteur
 * ändern können soll (Texte, Bilder, Buttons, Links), ist ein normaler
 * Kernblock (Absatz, Überschrift, Bild, Schaltfläche, Gruppe). Nur
 * Rein-Dekoratives (Glow, Linien, WebGL-Fläche) ist eine leere, gesperrte
 * Gruppe — kein "Eigenes HTML".
 *
 * Zweisprachigkeit: Jeder Text existiert als zwei Blöcke, einer mit der
 * Klasse "lang-en", einer mit "lang-de" (siehe satellite_i18n()). Eine
 * Klasse statt eines lang-Attributs, weil der Block-Editor fremde
 * HTML-Attribute an Kernblöcken als "ungültigen Inhalt" meldet. Das
 * lang-Attribut setzt satellite_add_lang_attribute() beim Ausgeben.
 */

/**
 * Öffnet einen Gruppen-Block (Layout-Container). Mit satellite_close() schließen.
 *
 * @param string $class  CSS-Klasse(n).
 * @param string $tag    HTML-Tag (div, section, header, footer, main …).
 * @param string $anchor Optional: id (Sprungmarke, z. B. "about").
 * @param array  $extra  Weitere Block-Attribute (z. B. 'templateLock').
 */
function satellite_open( $class, $tag = 'div', $anchor = '', $extra = array() ) {
	$attrs = array( 'className' => $class );
	if ( 'div' !== $tag ) {
		$attrs = array( 'tagName' => $tag ) + $attrs;
	}
	if ( $anchor ) {
		$attrs['anchor'] = $anchor;
	}
	$attrs += $extra;
	$attrs['layout'] = array( 'type' => 'default' );
	echo '<!-- wp:group ' . wp_json_encode( $attrs ) . " -->\n";
	echo '<' . esc_html( $tag ) . ' class="wp-block-group ' . esc_attr( $class ) . '"' . ( $anchor ? ' id="' . esc_attr( $anchor ) . '"' : '' ) . ">\n";
}

/** Schließt einen mit satellite_open() geöffneten Gruppen-Block. */
function satellite_close( $tag = 'div' ) {
	echo '</' . esc_html( $tag ) . ">\n<!-- /wp:group -->\n\n";
}

/**
 * Gibt einen Textblock in BEIDEN Sprachen aus (EN-Block, dann DE-Block).
 * Beide Sprachen sind Pflicht — es gibt keinen Fallback auf nur eine.
 *
 * @param string $en    Englischer Text (HTML erlaubt: <br>, <mark>, <strong>, <a>).
 * @param string $de    Deutscher Text.
 * @param string $tag   p, h1 … h6.
 * @param string $class Zusätzliche CSS-Klasse(n).
 */
function satellite_i18n( $en, $de, $tag = 'p', $class = '' ) {
	$is_heading = (bool) preg_match( '/^h[1-6]$/', $tag );
	$block_type = $is_heading ? 'heading' : 'paragraph';
	$level      = $is_heading ? (int) substr( $tag, 1 ) : 0;

	foreach ( array( 'en' => $en, 'de' => $de ) as $lang => $text ) {
		$classes = trim( $class . ' lang-' . $lang );
		$attrs   = array();
		if ( $level && 2 !== $level ) {
			$attrs['level'] = $level;
		}
		$attrs['className'] = $classes;
		$wrap               = $is_heading ? 'wp-block-heading ' . $classes : $classes;
		echo "<!-- wp:{$block_type} " . wp_json_encode( $attrs ) . " -->\n";
		echo '<' . esc_html( $tag ) . ' class="' . esc_attr( $wrap ) . '">' . wp_kses_post( $text ) . '</' . esc_html( $tag ) . ">\n";
		echo "<!-- /wp:{$block_type} -->\n\n";
	}
}

/**
 * Wie satellite_i18n(), aber ein Block ohne Sprachpaar (z. B. Zahlen, Namen).
 */
function satellite_text( $text, $tag = 'p', $class = '' ) {
	$is_heading = (bool) preg_match( '/^h[1-6]$/', $tag );
	$block_type = $is_heading ? 'heading' : 'paragraph';
	$level      = $is_heading ? (int) substr( $tag, 1 ) : 0;
	$attrs      = array();
	if ( $level && 2 !== $level ) {
		$attrs['level'] = $level;
	}
	if ( $class ) {
		$attrs['className'] = $class;
	}
	$wrap = trim( ( $is_heading ? 'wp-block-heading ' : '' ) . $class );
	echo "<!-- wp:{$block_type} " . ( $attrs ? wp_json_encode( $attrs ) . ' ' : '' ) . "-->\n";
	echo '<' . esc_html( $tag ) . ( $wrap ? ' class="' . esc_attr( $wrap ) . '"' : '' ) . '>' . wp_kses_post( $text ) . '</' . esc_html( $tag ) . ">\n";
	echo "<!-- /wp:{$block_type} -->\n\n";
}

/**
 * Leere, gesperrte Gruppe für reine Dekoration (Glow, Linien, Orb …).
 * Erscheint in der Listenansicht als "Dekoration" und lässt sich nicht
 * versehentlich verschieben oder löschen.
 */
function satellite_deco( $class, $anchor = '' ) {
	$attrs = array(
		'className' => $class,
		'metadata'  => array( 'name' => 'Dekoration (nicht bearbeiten)' ),
		'lock'      => array( 'move' => true, 'remove' => true ),
		'layout'    => array( 'type' => 'default' ),
	);
	if ( $anchor ) {
		$attrs['anchor'] = $anchor;
	}
	echo '<!-- wp:group ' . wp_json_encode( $attrs ) . " -->\n";
	echo '<div class="wp-block-group ' . esc_attr( $class ) . '"' . ( $anchor ? ' id="' . esc_attr( $anchor ) . '"' : '' ) . "></div>\n";
	echo "<!-- /wp:group -->\n\n";
}

/**
 * Bild-Block. Liegt die Theme-Datei $rel vor, wird sie als Bild gesetzt
 * (im Editor per "Ersetzen" aus der Mediathek austauschbar). Fehlt die Datei
 * (z. B. Vorlagen-Grafik mit ungeklärter Lizenz, siehe .gitignore), entsteht
 * ein leerer Bild-Platzhalter — der Redakteur klickt "Hochladen/Mediathek".
 *
 * @param string $rel   Pfad relativ zum Theme (z. B. images/gallery/x.jpg).
 * @param string $class CSS-Klasse(n) des Blocks.
 * @param string $alt   Alternativtext ('' = dekorativ).
 * @param bool   $always Auch ohne Datei einen leeren Platzhalter ausgeben.
 */
function satellite_image( $rel, $class, $alt = '', $always = true ) {
	$has = $rel && file_exists( get_template_directory() . '/' . $rel );
	if ( ! $has && ! $always ) {
		return;
	}
	echo '<!-- wp:image ' . wp_json_encode( array( 'className' => $class ) ) . " -->\n";
	echo '<figure class="wp-block-image ' . esc_attr( $class ) . '"><img' . ( $has ? ' src="' . esc_url( get_template_directory_uri() . '/' . $rel ) . '"' : '' ) . ' alt="' . esc_attr( $alt ) . "\"/></figure>\n";
	echo "<!-- /wp:image -->\n\n";
}

/**
 * Button-Gruppe im Landing-Page-Look (Klasse btn-about). Jeder Eintrag ist
 * eine echte Schaltfläche (Text + Link im Editor änderbar).
 *
 * @param array  $items array( array( Text, Sprache 'en'|'de'|'', Zusatzklasse ), … )
 * @param string $url   Ziel-Link.
 * @param string $class Zusätzliche Klasse für die Button-Gruppe.
 */
function satellite_buttons( $items, $url, $class = '' ) {
	echo '<!-- wp:buttons ' . ( $class ? wp_json_encode( array( 'className' => $class ) ) . ' ' : '' ) . "-->\n";
	echo '<div class="wp-block-buttons' . ( $class ? ' ' . esc_attr( $class ) : '' ) . "\">\n";
	foreach ( $items as $item ) {
		$label   = $item[0];
		$classes = trim( 'btn-about ' . ( ! empty( $item[1] ) ? 'lang-' . $item[1] . ' ' : '' ) . ( isset( $item[2] ) ? $item[2] : '' ) );
		echo '<!-- wp:button ' . wp_json_encode( array( 'className' => $classes ) ) . " -->\n";
		echo '<div class="wp-block-button ' . esc_attr( $classes ) . '"><a class="wp-block-button__link wp-element-button" href="' . esc_url( $url ) . '">' . esc_html( $label ) . "</a></div>\n";
		echo "<!-- /wp:button -->\n\n";
	}
	echo "</div>\n<!-- /wp:buttons -->\n\n";
}

/** Button auf Deutsch + Englisch (die übliche Variante). */
function satellite_button_pair( $en, $de, $url, $class = '' ) {
	satellite_buttons( array( array( $en, 'en' ), array( $de, 'de' ) ), $url, $class );
}

/**
 * Seitenkopf der Unterseiten (About, Gallery, Kontakt, Teilprojekte …):
 * 400 px hoch, Bild + heller Glow, Titel erscheint Zeichen für Zeichen.
 * Alle Texte zweisprachig, das Hintergrundbild per Mediathek austauschbar.
 *
 * @param string       $title_en Englischer Titel.
 * @param string       $title_de Deutscher Titel.
 * @param string|array $sub      Untertitel: Text (für beide Sprachen gleich) oder array( EN, DE ).
 * @param string       $modifier Zusatzklasse für den Seitenkopf (about-hero--glow = dunkler Untertitel).
 */
function satellite_page_hero( $title_en, $title_de, $sub = 'FORnano Satellites', $modifier = '' ) {
	$sub = is_array( $sub ) ? $sub : array( $sub, $sub );
	echo '<!-- wp:group ' . wp_json_encode(
		array(
			'tagName'       => 'header',
			'className'     => trim( 'about-hero ' . $modifier ),
			'templateLock'  => 'contentOnly',
			'layout'        => array( 'type' => 'default' ),
		)
	) . " -->\n";
	echo '<header class="wp-block-group ' . esc_attr( trim( 'about-hero ' . $modifier ) ) . "\">\n";

	echo '<!-- wp:group ' . wp_json_encode( array( 'className' => 'about-hero-bg', 'layout' => array( 'type' => 'default' ) ) ) . " -->\n";
	echo "<div class=\"wp-block-group about-hero-bg\">\n";
	satellite_image( 'images/gallery/nebula-flow.jpg', 'about-hero-img' );
	satellite_deco( 'about-hero-glow' );
	echo "</div>\n<!-- /wp:group -->\n\n";

	echo '<!-- wp:group ' . wp_json_encode( array( 'className' => 'about-hero-titles', 'layout' => array( 'type' => 'default' ) ) ) . " -->\n";
	echo "<div class=\"wp-block-group about-hero-titles\">\n";
	satellite_i18n( $title_en, $title_de, 'h1', 'about-hero-title' );
	satellite_i18n( $sub[0], $sub[1], 'p', 'about-hero-sub' );
	echo "</div>\n<!-- /wp:group -->\n\n";

	echo "</header>\n<!-- /wp:group -->\n\n";
}

/**
 * Gibt eine Liste von Textbausteinen als Kernblöcke aus (Rechtstexte).
 * Einträge: array( 'h2'|'h3'|'p'|'ul', Text bzw. Liste ). Zeilenumbrüche
 * in 'p' werden zu <br> (Adressblöcke).
 */
function satellite_render_text_blocks( $items ) {
	foreach ( $items as $item ) {
		list( $type, $text ) = $item;
		if ( 'ul' === $type ) {
			echo "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
			foreach ( $text as $li ) {
				echo '<!-- wp:list-item --><li>' . esc_html( $li ) . '</li><!-- /wp:list-item -->';
			}
			echo "</ul>\n<!-- /wp:list -->\n\n";
		} elseif ( 'p' === $type ) {
			echo "<!-- wp:paragraph -->\n<p>" . nl2br( esc_html( $text ) ) . "</p>\n<!-- /wp:paragraph -->\n\n";
		} else {
			$level = (int) substr( $type, 1 );
			$attrs = 2 === $level ? '' : wp_json_encode( array( 'level' => $level ) ) . ' ';
			echo "<!-- wp:heading {$attrs}-->\n<{$type} class=\"wp-block-heading\">" . esc_html( $text ) . "</{$type}>\n<!-- /wp:heading -->\n\n";
		}
	}
}

/**
 * Setzt beim Ausgeben aus der Klasse "lang-en"/"lang-de" eines Blocks das
 * passende lang-Attribut (für Screenreader), ohne dass der Editor es sieht.
 */
function satellite_add_lang_attribute( $content, $block ) {
	if ( false === strpos( $content, 'lang-' ) || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $content;
	}
	$p = new WP_HTML_Tag_Processor( $content );
	if ( $p->next_tag() ) {
		$class = (string) $p->get_attribute( 'class' );
		if ( preg_match( '/(?:^|\s)lang-(en|de)(?:\s|$)/', $class, $m ) ) {
			$p->set_attribute( 'lang', $m[1] );
		}
	}
	return $p->get_updated_html();
}
add_filter( 'render_block', 'satellite_add_lang_attribute', 10, 2 );

/**
 * Personen-Karte (Team): Foto (images/people/<datei>, falls vorhanden — sonst
 * leerer Bild-Platzhalter zum Anklicken), Name, Rolle (EN/DE), feine Linie.
 */
function satellite_person( $name, $role_en, $role_de, $photo ) {
	satellite_open( 'person' );
	satellite_image( 'images/people/' . $photo, 'person-photo', $name );
	satellite_text( $name, 'p', 'person-name' );
	satellite_i18n( $role_en, $role_de, 'p', 'person-role' );
	satellite_deco( 'person-line' );
	satellite_close();
}
