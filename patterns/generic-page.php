<?php
/**
 * Title: Generic Page Content
 * Slug: satellite/generic-page
 * Categories: satellite
 * Inserter: no
 *
 * Deutsch: Standard-Fallback für jede WordPress-Seite ohne eigenes
 * Template (also alles außer Startseite, About-, Gallery-, Kontakt- und
 * Rechtsseiten). Gibt Titel + Inhalt der Seite über die Block-Editor-Blöcke
 * "Beitragstitel" und "Beitragsinhalt" aus (kein PHP-Loop in Patterns).
 */
?>
<section class="wp-block-group section page-text page-text--plain">
	<div class="wp-block-group page-text-inner">
		<!-- wp:post-title {"level":1} /-->
		<!-- wp:post-content {"layout":{"type":"default"}} /-->
	</div>
</section>
