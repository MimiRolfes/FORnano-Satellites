// Basis-Skript (auf jeder Seite): Menü, Sprachumschalter, Scroll-Reveal, Überschriften-Effekt, E-Mail kopieren, Buttons.

// Nav-Dropdown öffnen/schließen (der "+"-Button oben rechts in der Navigation)
const toggle = document.getElementById('nav-toggle');
const dropdown = document.getElementById('nav-dropdown');
const backdrop = document.getElementById('nav-backdrop');

function setNav(open) {
  toggle.classList.toggle('open', open);
  dropdown.classList.toggle('open', open);
  backdrop.classList.toggle('open', open);
  toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
}

toggle.addEventListener('click', () => setNav(!dropdown.classList.contains('open')));
dropdown.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setNav(false)));
backdrop.addEventListener('click', () => setNav(false));
document.addEventListener('keydown', e => {
  if (e.key === 'Escape' && dropdown.classList.contains('open')) { setNav(false); toggle.focus(); }
});

// ── Sprachumschalter (DE/EN) ──────────────────────────────────
// Jeder Text existiert doppelt im Markup (siehe satellite_i18n() in
// functions.php); hier wird nur [data-lang] auf <html> gesetzt/gemerkt,
// die eigentliche Sichtbarkeit regelt reines CSS ([lang]-Selektoren).
(function initLanguageToggle() {
  var STORAGE_KEY = 'satellite-lang';
  var buttons = document.querySelectorAll('.lang-toggle-btn');
  if (!buttons.length) return;

  function apply(lang) {
    document.documentElement.setAttribute('data-lang', lang);
    buttons.forEach(function (btn) {
      btn.setAttribute('aria-pressed', btn.getAttribute('data-lang') === lang ? 'true' : 'false');
    });
  }

  var saved = 'en';
  try { saved = localStorage.getItem(STORAGE_KEY) === 'de' ? 'de' : 'en'; } catch (e) {}
  apply(saved);

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var lang = btn.getAttribute('data-lang');
      apply(lang);
      try { localStorage.setItem(STORAGE_KEY, lang); } catch (e) {}
    });
  });
})();


// ── Scroll-Reveal ─────────────────────────────────────────────
// Blendet Sektions-Inhalte beim Hereinscrollen ein (Fade + leichter
// Versatz / Scale), analog zu den "appear"-Effekten der Framer-Referenz.
// Die eigentliche Animation liegt im CSS (src/scss/_reveal.scss); hier
// werden nur die Trigger-Klassen gesetzt. Ohne JS oder bei
// prefers-reduced-motion bleibt alles regulär sichtbar.
(function initReveal() {
  // [Selektor, Modus] — 'single' | 'scale' | 'stagger'
  var groups = [
    ['.hero-headline', 'single'],
    ['.hero-aside', 'single'],
    ['.about-titles', 'scale'],
    ['.metrics', 'stagger'],
    ['.hl-header', 'scale'],
    ['.highlights-grid', 'stagger'],
    ['.team-header', 'scale'],
    ['.team-featured', 'scale'],
    ['.team-grid', 'stagger'],
    ['.wp-header', 'scale'],
    ['.sponsors-header', 'scale'],
    ['.sponsors-grid', 'stagger'],
    ['.gallery-item', 'scale']
    // .timeline-item wird NICHT hier eingetragen: die Arbeitspakete-Timeline
    // hat eine eigene, kontinuierlich scroll-gekoppelte Animation statt
    // eines einmaligen Ein-/Ausblendens, siehe initTimelineScroll() unten.
  ];

  var els = [];
  groups.forEach(function (group) {
    var selector = group[0];
    var mode = group[1];
    document.querySelectorAll(selector).forEach(function (el) {
      el.classList.add(mode === 'stagger' ? 'reveal--stagger' : 'reveal');
      if (mode === 'scale') el.classList.add('reveal--scale');
      els.push(el);
    });
  });
  if (!els.length) return;

  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduce || !('IntersectionObserver' in window)) {
    els.forEach(function (el) { el.classList.add('is-visible'); });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });

  els.forEach(function (el) { observer.observe(el); });

  // Sicherheitsnetz: falls der Observer (z. B. in einem Hintergrund-Tab)
  // nicht auslöst, wird der Inhalt nach spätestens 3 s regulär eingeblendet.
  window.setTimeout(function () {
    els.forEach(function (el) {
      observer.unobserve(el);
      el.classList.add('is-visible');
    });
  }, 3000);
})();

// ── Überschriften-Farb-Enthüllung ─────────────────────────────
// Framer-Komponente "TextReveal": die Sektions-Überschrift startet in
// einem Grauton und färbt sich beim Scrollen Wort für Wort in die
// Ziel-Farbe, verteilt über ~400 px Scroll-Weg (Framer "fullRevealDistance").
// Auf hellen Sektionen (About, Highlights, Team) Grau -> Schwarz; auf der
// sehr dunklen Arbeitspakete-Sektion Dunkelgrau -> Weiß (Framer verwendet
// dort ebenfalls ein anderes Farbpaar). Ohne JS oder bei
// prefers-reduced-motion bleibt die reguläre Textfarbe.
(function initHeadingReveal() {
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduce) return;

  var DISTANCE = 400; // Framer "fullRevealDistance"
  var CONFIGS = [
    { selector: '#about .heading, #highlights .heading, #team .heading, #sponsors .heading, #overview .heading, #tech-stack .heading, #visuals .heading', from: [150, 150, 150], to: [0, 0, 0] }, // Grey 60 -> Black 100
    { selector: '#work-packages .heading', from: [82, 82, 82], to: [250, 250, 250] }                                   // Grey 100 -> White 100
  ];

  function wrapWords(el) {
    Array.prototype.slice.call(el.childNodes).forEach(function (node) {
      if (node.nodeType !== 3) return; // nur Textknoten; <br> u. Ä. bleiben
      var frag = document.createDocumentFragment();
      node.textContent.split(/(\s+)/).forEach(function (part) {
        if (part === '') return;
        if (/^\s+$/.test(part)) {
          frag.appendChild(document.createTextNode(part));
        } else {
          var span = document.createElement('span');
          span.className = 'rw';
          span.textContent = part;
          frag.appendChild(span);
        }
      });
      el.replaceChild(frag, node);
    });
  }

  var items = [];
  CONFIGS.forEach(function (config) {
    document.querySelectorAll(config.selector).forEach(function (h) {
      wrapWords(h);
      var words = h.querySelectorAll('.rw');
      if (words.length) items.push({ words: words, ref: h, from: config.from, to: config.to });
    });
  });
  if (!items.length) return;

  function lerp(a, b, t) { return Math.round(a + (b - a) * t); }

  function update() {
    var start = window.innerHeight * 0.85;
    items.forEach(function (item) {
      var scrolled = start - item.ref.getBoundingClientRect().top;
      var p = Math.max(0, Math.min(1, scrolled / DISTANCE));
      var n = item.words.length;
      for (var i = 0; i < n; i++) {
        var wp = Math.max(0, Math.min(1, p * n - i));
        item.words[i].style.color =
          'rgb(' + lerp(item.from[0], item.to[0], wp) + ',' +
                   lerp(item.from[1], item.to[1], wp) + ',' +
                   lerp(item.from[2], item.to[2], wp) + ')';
      }
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


// Footer: E-Mail-Link kopiert die Adresse statt den Mail-Client zu öffnen
// (mailto bleibt als Fallback erhalten, falls JS oder die Clipboard-API fehlt).
(function initCopyEmail() {
  // Jeder mailto:-Link im Footer-Social-Block (Adresse steht im Link selbst)
  document.querySelectorAll('.footer-social a[href^="mailto:"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      if (!navigator.clipboard) return; // mailto-Fallback greift
      e.preventDefault();
      var email = link.getAttribute('href').replace(/^mailto:/, '');
      navigator.clipboard.writeText(email).then(function () {
        var original = link.getAttribute('title');
        link.classList.add('is-copied');
        link.setAttribute('title', 'Copied!');
        setTimeout(function () {
          link.classList.remove('is-copied');
          if (original === null) { link.removeAttribute('title'); } else { link.setAttribute('title', original); }
        }, 1500);
      });
    });
  });
})();


// Buttons im Landing-Page-Look: Der Text eines Kern-Buttons (Klasse btn-about)
// wird auf der Website in zwei Flächen verpackt (lime + blau), damit die
// Hover-Animation exakt wie in der Framer-Vorlage läuft. Im Editor bleibt es
// ein einfacher Button mit einem Text. (Styles: _hero.scss, .btn-clip/.btn-face)
(function initButtons() {
  document.querySelectorAll('.btn-about .wp-block-button__link').forEach(function (link) {
    var label = link.innerHTML;
    var clip = document.createElement('span');
    clip.className = 'btn-clip';
    var face = document.createElement('span');
    face.className = 'btn-face';
    face.innerHTML = label;
    var hover = document.createElement('span');
    hover.className = 'btn-face btn-face--hover';
    hover.setAttribute('aria-hidden', 'true');
    hover.innerHTML = label;
    clip.appendChild(face);
    clip.appendChild(hover);
    link.textContent = '';
    link.appendChild(clip);
    link.classList.add('is-enhanced');
  });
})();

