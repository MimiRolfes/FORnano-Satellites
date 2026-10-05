<?php
/**
 * Deutsch: Kontaktformular als eigener Block "Satellite: Kontaktformular".
 *
 * Aufbau: Der Block wird serverseitig gerendert (kein JavaScript-Build nötig)
 * und zeigt im Editor alle Beschriftungen — Feldnamen, Datenschutz-Hinweis,
 * Button und Rückmeldungen, jeweils auf Englisch und Deutsch — als einfache
 * Textfelder in der Block-Seitenleiste ("PHP-only block", WordPress 6.4+).
 * Der Versand erfolgt per wp_mail an die Administrations-E-Mail
 * (Einstellungen → Allgemein) oder an die Adresse aus dem Filter
 * "satellite_contact_recipient". Schutz: Nonce + Honeypot; Eingaben werden bereinigt.
 */

/** Standardtexte des Formulars: Schlüssel => array( EN, DE ). */
function satellite_contact_form_defaults() {
	return array(
		'name'         => array( 'Name', 'Name' ),
		'email'        => array( 'Email', 'E-Mail' ),
		'org'          => array( 'Organization', 'Organisation' ),
		'subject'      => array( 'Subject', 'Betreff' ),
		'message'      => array( 'Message', 'Nachricht' ),
		'privacy'      => array( 'By sending this form you agree that your data is processed to handle your request. See the', 'Mit dem Absenden willigen Sie in die Verarbeitung Ihrer Angaben zur Bearbeitung Ihrer Anfrage ein. Siehe' ),
		'privacy_link' => array( 'privacy policy', 'Datenschutzerklärung' ),
		'submit'       => array( 'SEND MESSAGE', 'NACHRICHT SENDEN' ),
		'sent'         => array( 'Thank you — your message has been sent.', 'Vielen Dank – Ihre Nachricht wurde gesendet.' ),
		'invalid'      => array( 'Please fill in all required fields with a valid email address.', 'Bitte füllen Sie alle Pflichtfelder aus und geben Sie eine gültige E-Mail-Adresse an.' ),
		'error'        => array( 'Your message could not be sent. Please try again later.', 'Ihre Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.' ),
	);
}

/** Zwei Sprach-Spans (EN/DE); die Sichtbarkeit steuert das Sprach-CSS (.lang-en/.lang-de). */
function satellite_contact_text( $atts, $key ) {
	return '<span class="lang-en" lang="en">' . esc_html( $atts[ $key . '_en' ] ) . '</span><span class="lang-de" lang="de">' . esc_html( $atts[ $key . '_de' ] ) . '</span>';
}

function satellite_render_contact_form( $attributes = array() ) {
	$atts = array();
	foreach ( satellite_contact_form_defaults() as $key => $texts ) {
		$atts[ $key . '_en' ] = ! empty( $attributes[ $key . '_en' ] ) ? $attributes[ $key . '_en' ] : $texts[0];
		$atts[ $key . '_de' ] = ! empty( $attributes[ $key . '_de' ] ) ? $attributes[ $key . '_de' ] : $texts[1];
	}
	$status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
	if ( ! in_array( $status, array( 'sent', 'invalid', 'error' ), true ) ) {
		$status = '';
	}
	$fields = array(
		'name'    => array( 'text', true ),
		'email'   => array( 'email', true ),
		'org'     => array( 'text', false ),
		'subject' => array( 'text', true ),
	);

	ob_start();
	?>
	<div class="satellite-contact-form">
		<?php if ( $status ) : ?>
		<div class="contact-notice contact-notice--<?php echo esc_attr( $status ); ?>" role="<?php echo 'sent' === $status ? 'status' : 'alert'; ?>">
			<?php echo satellite_contact_text( $atts, $status ); ?>
		</div>
		<?php endif; ?>
		<form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="satellite_contact" />
			<?php wp_nonce_field( 'satellite_contact', 'satellite_contact_nonce' ); ?>
			<div class="contact-hp" aria-hidden="true">
				<label>Website <input type="text" name="satellite_website" tabindex="-1" autocomplete="off" /></label>
			</div>
			<?php foreach ( $fields as $id => $field ) : ?>
			<div class="contact-field">
				<label for="satellite-<?php echo esc_attr( $id ); ?>"><?php echo satellite_contact_text( $atts, $id ); ?><?php echo $field[1] ? ' *' : ''; ?></label>
				<input id="satellite-<?php echo esc_attr( $id ); ?>" name="satellite_<?php echo esc_attr( $id ); ?>" type="<?php echo esc_attr( $field[0] ); ?>"<?php echo $field[1] ? ' required aria-required="true"' : ''; ?> />
			</div>
			<?php endforeach; ?>
			<div class="contact-field">
				<label for="satellite-message"><?php echo satellite_contact_text( $atts, 'message' ); ?> *</label>
				<textarea id="satellite-message" name="satellite_message" rows="6" required aria-required="true"></textarea>
			</div>
			<p class="contact-privacy">
				<?php echo satellite_contact_text( $atts, 'privacy' ); ?>
				<a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>"><?php echo satellite_contact_text( $atts, 'privacy_link' ); ?></a>.
			</p>
			<button type="submit" class="contact-submit"><span class="btn-clip"><span class="btn-face"><?php echo satellite_contact_text( $atts, 'submit' ); ?></span><span class="btn-face btn-face--hover" aria-hidden="true"><?php echo satellite_contact_text( $atts, 'submit' ); ?></span></span></button>
		</form>
	</div>
	<?php
	return ob_get_clean();
}

/** Registriert den Block (serverseitig, Eingabefelder in der Seitenleiste automatisch). */
function satellite_register_contact_form_block() {
	$attributes = array();
	foreach ( satellite_contact_form_defaults() as $key => $texts ) {
		$attributes[ $key . '_en' ] = array( 'type' => 'string', 'default' => $texts[0] );
		$attributes[ $key . '_de' ] = array( 'type' => 'string', 'default' => $texts[1] );
	}
	register_block_type(
		'satellite/contact-form',
		array(
			'api_version'     => 3,
			'title'           => __( 'Satellite: Contact form', 'satellite' ),
			'description'     => __( 'Contact form. All labels are editable in the sidebar (English and German).', 'satellite' ),
			'category'        => 'widgets',
			'icon'            => 'email',
			'attributes'      => $attributes,
			'supports'        => array( 'autoRegister' => true, 'html' => false ),
			'render_callback' => 'satellite_render_contact_form',
		)
	);
}
add_action( 'init', 'satellite_register_contact_form_block' );

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
