{{-- =========================================================
     ROMINA GROUP — 6-SECOND INTRO ANIMATION
     v7 — simplified: official logo fades in, red dot drops onto the "I"
     ========================================================= --}}
<div id="romina-intro" class="ri-overlay" role="presentation" aria-hidden="true">

    <div class="ri-bg"></div>

    <div class="ri-stage">
        {{-- Official brand logo — inlined at render time. Do not redraw/copy its contents. --}}
        <div class="ri-logo">
            {!! file_get_contents(resource_path('images/romina-logo-reverse.svg')) !!}
        </div>

        {{-- Subtle light sweep across the logo during the hold phase --}}
        <div class="ri-sweep" aria-hidden="true"><i></i></div>
    </div>

    <button class="ri-skip" type="button" aria-label="Skip intro">Skip</button>

</div>

<style>
/* Container basics (.ri-overlay / .ri-bg / .ri-stage / .ri-skip) come from
   main.css. This block defines only the simplified logo animation. */

/* Logo hidden until it fades in (navy-only for the first 0.5s) */
.ri-logo {
    opacity: 0;
}
.ri-logo svg {
    width: 66%;
    height: auto;
    display: block;
}

/* Red dot — the SVG element(s) with fill #E8132C, tagged by JS.
   Hidden at the start; animated with transform/opacity only so it can
   never drift from its exact SVG position. */
.ri-reddot {
    opacity: 0;
    transform-box: fill-box;
    transform-origin: center;
    will-change: transform, opacity;
}

/* Light sweep */
.ri-sweep {
    position: absolute;
    inset: 0;
    overflow: hidden;
    pointer-events: none;
    z-index: 3;
}
.ri-sweep i {
    position: absolute;
    top: -25%;
    left: -45%;
    width: 38%;
    height: 150%;
    background: linear-gradient(105deg,
        rgba(255,255,255,0) 0%,
        rgba(255,255,255,0.14) 50%,
        rgba(255,255,255,0) 100%);
    transform: skewX(-12deg);
    opacity: 0;
}

/* ════════════════════════════════════════════════════
   FULL 6-SECOND TIMELINE (.ri--animate)
   0.0–0.5s  navy background only
   0.5–2.0s  logo fades in with slight rise (no red dot)
   2.0–2.8s  red dot drops onto the "I"
   2.8–3.2s  one subtle pulse of the red dot
   3.2–5.2s  hold + subtle light sweep
   5.2–6.0s  logo + background fade out
   ════════════════════════════════════════════════════ */
.ri--animate .ri-logo {
    animation: ri-logo-in 1.5s cubic-bezier(.16,1,.3,1) 0.5s forwards;
}
.ri--animate .ri-reddot {
    /* Reveal (opacity + drop-in) holds its end state via `both`; the pulse
       is a separate, transform-only animation so it can never reset opacity.
       Result: the dot stays fully visible until the whole logo fades out. */
    animation:
        ri-dot-in    0.8s cubic-bezier(.34,1.1,.64,1) 2.0s both,
        ri-dot-pulse 0.4s ease-in-out                 2.8s forwards;
}
.ri--animate .ri-sweep i {
    animation: ri-sweep 2.0s ease-in-out 3.2s forwards;
}
.ri--animate {
    animation: ri-overlay-out 0.8s ease 5.2s forwards;
    will-change: opacity;
}

@keyframes ri-logo-in {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0);   }
}

/* Drop-in 2.0–2.8s. translateY uses % of the dot's own box
   (transform-box: fill-box), so the drop is viewBox-independent and
   lands exactly at its original position (opacity 1, transform none). */
@keyframes ri-dot-in {
    0%   { opacity: 0; transform: translateY(-120%) scale(0.8); }
    60%  { opacity: 1; }
    100% { opacity: 1; transform: none; }
}

/* One subtle pulse 2.8–3.2s — transform only, never touches opacity. */
@keyframes ri-dot-pulse {
    0%   { transform: none; }
    50%  { transform: scale(1.12); }
    100% { transform: none; }
}

@keyframes ri-sweep {
    0%   { left: -45%; opacity: 0; }
    15%  { opacity: 1; }
    85%  { opacity: 1; }
    100% { left: 110%; opacity: 0; }
}

@keyframes ri-overlay-out {
    from { opacity: 1; }
    to   { opacity: 0; }
}

/* ════════════════════════════════════════════════════
   REDUCED MOTION — show the full logo ~1s, then fade
   ════════════════════════════════════════════════════ */
.ri--reduced .ri-logo   { opacity: 1; }
.ri--reduced .ri-reddot { opacity: 1; }
.ri--reduced .ri-sweep  { display: none; }
.ri--reduced {
    animation: ri-overlay-out 0.4s ease 1.1s forwards;
}
</style>

<script>
/* =============================================================
   ROMINA INTRO — v7 Controller  (6-second timeline)
   ============================================================= */
(function () {
    'use strict';

    var SESSION_KEY      = 'ri_shown_v7';
    var DURATION_FULL    = 6000;
    var DURATION_REDUCED = 1500;

    var overlay = document.getElementById('romina-intro');
    if (!overlay) return;

    var seen = false;
    try { seen = !!sessionStorage.getItem(SESSION_KEY); } catch (e) {}
    if (seen) { overlay.style.display = 'none'; return; }

    var reduced = false;
    try { reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches; } catch (e) {}

    overlay.classList.add(reduced ? 'ri--reduced' : 'ri--animate');

    /* Tag the logo's red dot — the element(s) filled #E8132C (attribute
       or inline style) — so CSS can drop it in without misaligning. */
    (function tagRedDot() {
        try {
            var logo = overlay.querySelector('.ri-logo svg');
            if (!logo) return;
            var RED = ['#e8132c', 'rgb(232, 19, 44)'];
            Array.prototype.forEach.call(logo.querySelectorAll('*'), function (el) {
                var f = (el.getAttribute && el.getAttribute('fill') || '').trim().toLowerCase();
                var s = (el.style && el.style.fill || '').trim().toLowerCase();
                if (RED.indexOf(f) !== -1 || RED.indexOf(s) !== -1) {
                    el.classList.add('ri-reddot');
                }
            });
        } catch (e) {}
    }());

    /* Scroll lock + scrollbar gap compensation */
    var sbWidth = 0;
    try { sbWidth = window.innerWidth - document.documentElement.clientWidth; } catch (e) {}
    document.documentElement.style.overflow = 'hidden';
    if (sbWidth > 0) document.body.style.paddingRight = sbWidth + 'px';

    /* Inert siblings — deferred until DOM is fully ready */
    var inertEls = [];
    function markInert() {
        try {
            Array.prototype.forEach.call(document.body.children, function (el) {
                if (el !== overlay && !el.hasAttribute('inert')) {
                    el.setAttribute('inert', '');
                    el.setAttribute('aria-hidden', 'true');
                    inertEls.push(el);
                }
            });
        } catch (e) {}
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', markInert);
    } else {
        markInert();
    }

    /* Idempotent exit handler */
    var dismissed = false;
    function dismiss() {
        if (dismissed) return;
        dismissed = true;
        if (overlay && overlay.parentNode) overlay.parentNode.removeChild(overlay);
        document.documentElement.style.overflow = '';
        document.body.style.paddingRight = '';
        inertEls.forEach(function (el) {
            el.removeAttribute('inert');
            el.removeAttribute('aria-hidden');
        });
        try { sessionStorage.setItem(SESSION_KEY, '1'); } catch (e) {}
        try { window.dispatchEvent(new CustomEvent('romina:intro-done')); } catch (e) {}
    }

    /* Normal completion */
    var exitTimer = setTimeout(dismiss, reduced ? DURATION_REDUCED : DURATION_FULL);

    /* Fail-safe: never block the site beyond 7s */
    setTimeout(dismiss, 7000);

    /* Skip: instant fade-out in 0.3s then remove */
    function skip() {
        if (dismissed) return;
        clearTimeout(exitTimer);
        try {
            overlay.style.transition = 'opacity 0.3s ease';
            overlay.style.opacity = '0';
        } catch (e) {}
        setTimeout(dismiss, 320);
    }

    /* Skip button */
    var skipBtn = overlay.querySelector('.ri-skip');
    if (skipBtn) {
        skipBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            skip();
        });
    }

    /* Escape key */
    function onKey(e) {
        if (e.key === 'Escape') {
            document.removeEventListener('keydown', onKey);
            skip();
        }
    }
    document.addEventListener('keydown', onKey);

}());
</script>
