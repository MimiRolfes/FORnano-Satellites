// Teilprojekt-Karten (Stapel-Effekt) und Bildwechsel-Karte (nur wenn vorhanden).
// Teil des Satellite-Themes. Wird nur geladen, wenn die Seite das braucht (siehe satellite_enqueue_features() in functions.php).

// About-Seite, Tech-Stack: Framers Scroll-Pin-Stapel-Effekt — jede Karte ist
// sticky und weicht (Skalierung + leichter Versatz nach oben) zurück, sobald
// die jeweils nächste(n) Karte(n) von unten heranscrollen. Framer schaltet
// das pro Karte hart um (spring-physics bei Erreichen eines Scroll-Ziels);
// hier stattdessen kontinuierlich an den Scroll gekoppelt, wie auch
// initTimelineScroll/initHeadingReveal es in diesem Projekt machen.
(function initTechStackScroll() {
  var cards = document.querySelectorAll('.tech-card');
  if (cards.length < 2) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduce) return;

  var DISTANCE = 200; // px Scrollstrecke, bis eine Karte als "angekommen" gilt

  function progressFor(card) {
    var trigger = window.innerHeight / 2;
    var top = card.getBoundingClientRect().top;
    return Math.max(0, Math.min(1, (trigger - top) / DISTANCE));
  }

  var phone = window.matchMedia('(max-width: 809px)');

  function update() {
    if (phone.matches) { // Phone: Karten nicht sticky (siehe _responsive.scss) — kein Stapel-Effekt
      cards.forEach(function (c) { c.style.transform = ''; });
      return;
    }
    var progress = [];
    for (var i = 0; i < cards.length; i++) progress[i] = progressFor(cards[i]);

    for (var i = 0; i < cards.length - 1; i++) {
      var scale = 1;
      var y = 0;
      for (var j = i + 1; j < cards.length; j++) {
        scale -= 0.1 * progress[j];
        y -= 10 * progress[j];
      }
      cards[i].style.transform = 'translateY(' + y.toFixed(1) + 'px) scale(' + scale.toFixed(3) + ')';
    }
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



// About-Seite, Overview: Framer "Fade Switching Image Card" — Bilder wechseln
// alle 5 s mit weicher Überblendung (CSS-Transition, 2 s).
(function initFadeCard() {
  var card = document.getElementById('fade-card');
  var imgs = document.querySelectorAll('#fade-card .fade-card-img');
  if (!card || !imgs.length) return;
  card.classList.add('has-js'); // ab hier steuert is-active (nicht mehr :first-child) das sichtbare Bild
  imgs[0].classList.add('is-active');
  if (imgs.length < 2) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var current = 0;
  setInterval(function () {
    imgs[current].classList.remove('is-active');
    current = (current + 1) % imgs.length;
    imgs[current].classList.add('is-active');
  }, 5000);
})();

