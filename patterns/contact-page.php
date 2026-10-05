<?php
/**
 * Title: Contact Page Content
 * Slug: satellite/contact-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der Kontakt-Seite (templates/page-contact.html, gilt für die
 * WordPress-Seite mit Slug "contact"). Aufbau und Texte nach
 * fornano.pinsker.ai/contact: Formular (Name*, E-Mail*, Organisation,
 * Betreff*, Nachricht*) neben der Projektkoordination (E-Mail, Adresse,
 * Telefon) und der Projektleitung. Alle Texte zweisprachig und editierbar;
 * der Versand läuft über satellite_handle_contact_form() in functions.php.
 */
satellite_page_hero( 'Contact', 'Kontakt' );

$satellite_contact_status = isset( $_GET['contact'] ) && in_array( $_GET['contact'], array( 'sent', 'invalid', 'error' ), true ) ? $_GET['contact'] : '';
$satellite_fields         = array(
	// id => [EN, DE, type, Pflicht]
	'name'    => array( 'Name', 'Name', 'text', true ),
	'email'   => array( 'Email', 'E-Mail', 'email', true ),
	'org'     => array( 'Organization', 'Organisation', 'text', false ),
	'subject' => array( 'Subject', 'Betreff', 'text', true ),
);
?>
<section class="wp-block-group section page-text" id="contact">
	<div class="wp-block-group contact-grid">

		<div class="contact-card contact-form-card">
			<!-- wp:heading {"level":2,"className":"contact-heading"} -->
			<h2 class="wp-block-heading contact-heading" lang="en">Send a message</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":2,"className":"contact-heading"} -->
			<h2 class="wp-block-heading contact-heading" lang="de">Nachricht senden</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"contact-intro"} -->
			<p class="contact-intro" lang="en">Do you have questions about the project? We look forward to your message.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"contact-intro"} -->
			<p class="contact-intro" lang="de">Haben Sie Fragen zum Projekt? Wir freuen uns auf Ihre Nachricht.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<?php if ( $satellite_contact_status ) : ?>
			<div class="contact-notice contact-notice--<?php echo esc_attr( $satellite_contact_status ); ?>" role="<?php echo 'sent' === $satellite_contact_status ? 'status' : 'alert'; ?>">
				<?php if ( 'sent' === $satellite_contact_status ) : ?>
					<?php satellite_i18n_text( 'Thank you — your message has been sent.', 'Vielen Dank – Ihre Nachricht wurde gesendet.' ); ?>
				<?php elseif ( 'invalid' === $satellite_contact_status ) : ?>
					<?php satellite_i18n_text( 'Please fill in all required fields with a valid email address.', 'Bitte füllen Sie alle Pflichtfelder aus und geben Sie eine gültige E-Mail-Adresse an.' ); ?>
				<?php else : ?>
					<?php satellite_i18n_text( 'Your message could not be sent. Please try again later.', 'Ihre Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.' ); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="satellite_contact" />
				<?php wp_nonce_field( 'satellite_contact', 'satellite_contact_nonce' ); ?>
				<div class="contact-hp" aria-hidden="true">
					<label>Website <input type="text" name="satellite_website" tabindex="-1" autocomplete="off" /></label>
				</div>
				<?php foreach ( $satellite_fields as $satellite_id => $satellite_field ) : ?>
				<div class="contact-field">
					<label for="satellite-<?php echo esc_attr( $satellite_id ); ?>"><?php satellite_i18n_text( $satellite_field[0], $satellite_field[1] ); ?><?php echo $satellite_field[3] ? ' *' : ''; ?></label>
					<input id="satellite-<?php echo esc_attr( $satellite_id ); ?>" name="satellite_<?php echo esc_attr( $satellite_id ); ?>" type="<?php echo esc_attr( $satellite_field[2] ); ?>"<?php echo $satellite_field[3] ? ' required aria-required="true"' : ''; ?> />
				</div>
				<?php endforeach; ?>
				<div class="contact-field">
					<label for="satellite-message"><?php satellite_i18n_text( 'Message *', 'Nachricht *' ); ?></label>
					<textarea id="satellite-message" name="satellite_message" rows="6" required aria-required="true"></textarea>
				</div>
				<p class="contact-privacy">
					<?php satellite_i18n_text( 'By sending this form you agree that your data is processed to handle your request. See the', 'Mit dem Absenden willigen Sie in die Verarbeitung Ihrer Angaben zur Bearbeitung Ihrer Anfrage ein. Siehe' ); ?>
					<a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>"><?php satellite_i18n_text( 'privacy policy', 'Datenschutzerklärung' ); ?></a>.
				</p>
				<button type="submit" class="btn-about contact-submit">
					<span class="btn-about-face"><?php satellite_i18n_text( 'SEND MESSAGE', 'NACHRICHT SENDEN' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
					<span class="btn-about-face btn-about-face--hover" aria-hidden="true"><?php satellite_i18n_text( 'SEND MESSAGE', 'NACHRICHT SENDEN' ); ?> <?php echo satellite_arrow_up_right_icon(); ?></span>
				</button>
			</form>
			<!-- /wp:html -->
		</div>

		<div class="contact-side">
			<div class="contact-card">
				<?php
				satellite_i18n( 'Project coordination', 'Projektkoordination', 'h2', 'contact-heading' );
				satellite_i18n( 'For general enquiries about the FORnanoSatellites research consortium, please contact our project coordination.', 'Für allgemeine Anfragen zum FORnanoSatellites Forschungsverbund wenden Sie sich bitte an unsere Projektkoordination.', 'p', 'contact-intro' );
				satellite_i18n( 'Email', 'E-Mail', 'h3', 'contact-label' );
				?>
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value"><a href="mailto:cs3-sekretariat@fau.de">cs3-sekretariat@fau.de</a></p>
				<!-- /wp:paragraph -->
				<?php satellite_i18n( 'Address', 'Adresse', 'h3', 'contact-label' ); ?>
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value" lang="en">Chair of Computer Science 3 (Computer Architecture)<br>Room 07.156<br>Martensstr. 3<br>91058 Erlangen, Germany</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value" lang="de">Lehrstuhl für Informatik 3 (Rechnerarchitektur)<br>Raum 07.156<br>Martensstr. 3<br>91058 Erlangen</p>
				<!-- /wp:paragraph -->
				<?php satellite_i18n( 'Phone', 'Telefon', 'h3', 'contact-label' ); ?>
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value"><a href="tel:+4991318527003">+49 9131 85-27003</a></p>
				<!-- /wp:paragraph -->
			</div>
			<div class="contact-card">
				<?php satellite_i18n( 'Project management', 'Projektleitung', 'h2', 'contact-heading' ); ?>
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value" lang="en">Chair of Manufacturing Automation and Production Systems (FAPS)<br>Friedrich-Alexander-Universität Erlangen-Nürnberg</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"contact-value"} -->
				<p class="contact-value" lang="de">Lehrstuhl für Fertigungsautomatisierung und Produktionssystematik (FAPS)<br>Friedrich-Alexander-Universität Erlangen-Nürnberg</p>
				<!-- /wp:paragraph -->
			</div>
		</div>

	</div>
</section>
