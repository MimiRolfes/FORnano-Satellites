<?php
/**
 * Title: Satellite – Seite nicht gefunden (404)
 * Slug: satellite/not-found-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Inhalt der 404-Seite (templates/404.html, im Site-Editor unter
 * Design → Editor → Vorlagen → 404 bearbeitbar), zweisprachig, mit Button
 * zurück zur Startseite (derselbe Button wie auf der Landing Page).
 */
satellite_page_hero( 'Page not found', 'Seite nicht gefunden' );

satellite_open( 'section page-text', 'section', 'not-found' );
satellite_open( 'page-text-inner' );
satellite_i18n( 'The page you are looking for does not exist or has been moved.', 'Die gesuchte Seite existiert nicht oder wurde verschoben.' );
satellite_button_pair( 'BACK TO HOME', 'ZUR STARTSEITE', home_url( '/' ), 'not-found-home' );
satellite_close();
satellite_close( 'section' );
