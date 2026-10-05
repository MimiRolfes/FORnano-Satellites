// Seitenkopf der Unterseiten: Titel erscheint Zeichen für Zeichen (nur wenn .about-hero-title vorhanden).
// Teil des Satellite-Themes. Wird nur geladen, wenn die Seite das braucht (siehe satellite_enqueue_features() in functions.php).

// About-Seite, Header: Überschrift erscheint Zeichen für Zeichen (Framer
// "textEffect": opacity/y/blur, getriggert beim Sichtbarwerden, einmalig).
(function initAboutHeroReveal() {
  var titles = document.querySelectorAll('.about-hero-title');
  if (!titles.length) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  titles.forEach(function (title) {
    if (reduce) { title.classList.add('is-visible'); return; }
    var text = title.textContent;
    title.setAttribute('aria-label', text);
    title.textContent = '';
    var i = 0;
    text.split(/(\s+)/).forEach(function (part) {
      if (/^\s+$/.test(part)) { title.appendChild(document.createTextNode(part)); return; }
      var word = document.createElement('span');
      word.style.display = 'inline-block';
      word.setAttribute('aria-hidden', 'true');
      part.split('').forEach(function (ch) {
        var c = document.createElement('span');
        c.className = 'rc';
        c.textContent = ch;
        c.style.transitionDelay = (0.05 * i++) + 's';
        word.appendChild(c);
      });
      title.appendChild(word);
    });
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { title.classList.add('is-visible'); io.disconnect(); }
      });
    }, { threshold: 0.5 });
    io.observe(title);
  });
})();

