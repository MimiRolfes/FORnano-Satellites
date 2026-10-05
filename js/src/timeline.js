// Startseite: Arbeitspakete-Zeitleiste (nur wenn .timeline-group auf der Seite ist).
// Teil des Satellite-Themes. Wird nur geladen, wenn die Seite das braucht (siehe satellite_enqueue_features() in functions.php).

// ── Arbeitspakete-Timeline: scroll-gekoppelte Enthüllung ───────
// Framer-Agenda-Sektion: jeder Eintrag hat seinen EIGENEN Punkt + eigenes
// Linien-Segment (siehe _timeline.scss) und füllt sich individuell, sobald
// er beim Scrollen erreicht wird — kontinuierlich, reversibel in beide
// Richtungen (kein einmaliges Ein-/Ausblenden). Die Sticky-Gruppenleisten
// brauchen dafür kein JavaScript: durch die .timeline-group-Klammer pro
// Gruppe löst position:sticky sie ganz von allein ab (siehe CSS). Ohne JS
// oder bei prefers-reduced-motion bleibt alles regulär sichtbar.
(function initTimelineScroll() {
  var items = document.querySelectorAll('.timeline-item');
  if (!items.length) return;

  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduce) {
    items.forEach(function (item) { item.classList.add('is-visible'); });
    return;
  }

  function update() {
    var triggerY = window.innerHeight * 0.8;
    items.forEach(function (item) {
      var rect = item.getBoundingClientRect();
      item.classList.toggle('is-visible', rect.top <= triggerY);
    });
  }

  var ticking = false;
  function onScroll() {
    if (ticking) return;
    ticking = true;
    window.requestAnimationFrame(function () { update(); ticking = false; });
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll, { passive: true });
  update();
})();

