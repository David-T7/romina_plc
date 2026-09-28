{{-- =========================================================
     ROMINA GROUP — 15-SECOND PREMIUM INTRO ANIMATION
     v4 — wordmark wrapper fix + 15s timeline
     ========================================================= --}}
<div id="romina-intro" class="ri-overlay" role="presentation" aria-hidden="true">

    <div class="ri-bg"></div>

    <div class="ri-stage">
        <svg class="ri-svg" viewBox="0 0 400 280" xmlns="http://www.w3.org/2000/svg"
             aria-hidden="true" focusable="false">
            <defs>
                <filter id="ri-glow" x="-80%" y="-80%" width="260%" height="260%">
                    <feGaussianBlur stdDeviation="4" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
                <filter id="ri-glow-soft" x="-120%" y="-120%" width="340%" height="340%">
                    <feGaussianBlur stdDeviation="8" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
                <linearGradient id="ri-sweep-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%"   stop-color="rgba(255,255,255,0)"/>
                    <stop offset="42%"  stop-color="rgba(255,255,255,0)"/>
                    <stop offset="50%"  stop-color="rgba(255,255,255,0.17)"/>
                    <stop offset="58%"  stop-color="rgba(255,255,255,0)"/>
                    <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
                </linearGradient>
            </defs>

            <!-- AMBIENT GLOWS (behind dots) -->
            <circle class="ri-dot-glow ri-dot-top-glow"    cx="200" cy="72"  r="18" fill="rgba(232,19,44,0.18)" filter="url(#ri-glow-soft)"/>
            <circle class="ri-dot-glow ri-dot-bottom-glow" cx="200" cy="208" r="18" fill="rgba(232,19,44,0.18)" filter="url(#ri-glow-soft)"/>

            <!-- RED DOTS -->
            <circle class="ri-dot ri-dot-top"    cx="200" cy="72"  r="7" fill="#E8132C" filter="url(#ri-glow)"/>
            <circle class="ri-dot ri-dot-bottom" cx="200" cy="208" r="7" fill="#E8132C" filter="url(#ri-glow)"/>

            <!-- CONNECTOR LINE: pathLength=1 so dashoffset 0-1 = 0%-100% reveal -->
            <line class="ri-connector"
                  x1="200" y1="79" x2="200" y2="201"
                  stroke="#E8132C" stroke-width="1.1" stroke-linecap="round" pathLength="1"/>

            <!-- PULSE RING at connection moment -->
            <circle class="ri-pulse-ring" cx="200" cy="208" r="7"
                    fill="none" stroke="#E8132C" stroke-width="1.5"/>

            <!-- FRAME: 6 independent lines (2 halves per H edge, 2 V sides) -->
            <!-- Each pathLength=1: draws from center outward (H) or top to bottom (V) -->
            <line class="ri-frame ri-frame-top-l"    x1="200" y1="72"  x2="42"  y2="72"  stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>
            <line class="ri-frame ri-frame-top-r"    x1="200" y1="72"  x2="358" y2="72"  stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>
            <line class="ri-frame ri-frame-bottom-l" x1="200" y1="208" x2="42"  y2="208" stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>
            <line class="ri-frame ri-frame-bottom-r" x1="200" y1="208" x2="358" y2="208" stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>
            <line class="ri-frame ri-frame-left"     x1="42"  y1="72"  x2="42"  y2="208" stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>
            <line class="ri-frame ri-frame-right"    x1="358" y1="72"  x2="358" y2="208" stroke="rgba(255,255,255,0.65)" stroke-width="0.9" stroke-linecap="square" pathLength="1"/>

            <!--
                ROMINA WORDMARK
                FIX: Two-level nesting solves the CSS-vs-SVG transform conflict.
                  OUTER <g class="ri-wordmark">  — CSS animates ONLY this (opacity + tiny translateY)
                                                   No SVG transform attribute here.
                  INNER <g transform="...">       — SVG coordinate mapping, never touched by CSS.

                Coordinate mapping:
                  Source: x=702-1217, y=500-585 (original logo SVG units)
                  Target: x=55-345,   y=95-142  (our 400x280 canvas)
                  Scale:  290/515 = 0.5631 ≈ 0.563
                  tx = 55 - 702*0.563 = 55 - 395.3 = -340
                  ty = 95 - 500*0.563 = 95 - 281.5 = -186.5 ≈ -187
            -->
            <g class="ri-wordmark">
                <g transform="translate(-340,-187) scale(0.563)" fill="white">
                    <!-- R -->
                    <path d="M771.14 546.68C774.70 542.32 776.51 536.64 776.51 529.81L776.51 529.58C776.51 520.80 773.49 513.83 767.54 508.87C761.68 504.00 753.45 501.52 743.08 501.52L702.94 501.52L702.94 584.71L724.94 584.71L724.94 559.23L736.77 559.23L754.76 584.71L780.71 584.71L759.52 555.32C764.19 553.31 768.08 550.41 771.14 546.68M724.94 520.87L741.52 520.87C745.67 520.87 748.91 521.71 751.14 523.37C753.25 524.93 754.27 527.26 754.27 530.49L754.27 530.71C754.27 533.61 753.28 535.85 751.24 537.56C749.14 539.32 745.99 540.21 741.88 540.21L724.94 540.21Z"/>
                    <!-- O -->
                    <path d="M865.60 512.64C861.50 508.82 856.57 505.76 850.96 503.53C845.34 501.29 839.11 500.16 832.44 500.16C825.76 500.16 819.51 501.29 813.86 503.53C808.19 505.76 803.24 508.87 799.14 512.76C795.03 516.66 791.77 521.25 789.45 526.41C787.12 531.58 785.93 537.20 785.93 543.12L785.93 543.35C785.93 549.26 787.09 554.88 789.38 560.05C791.67 565.22 794.91 569.78 799.03 573.60C803.14 577.42 808.06 580.48 813.67 582.71C819.29 584.95 825.53 586.08 832.20 586.08C838.87 586.08 845.12 584.95 850.78 582.71C856.44 580.48 861.39 577.37 865.5 573.48C869.60 569.58 872.86 565 875.19 559.83C877.52 554.66 878.70 549.03 878.70 543.12L878.70 542.89C878.70 536.98 877.54 531.36 875.25 526.19C872.96 521.02 869.72 516.46 865.60 512.64M832.44 566.39C828.94 566.39 825.72 565.77 822.88 564.54C820.03 563.32 817.51 561.62 815.39 559.51C813.29 557.41 811.64 554.92 810.50 552.12C809.36 549.32 808.78 546.29 808.78 543.12L808.78 542.89C808.78 539.73 809.35 536.72 810.50 533.95C811.65 531.17 813.26 528.70 815.30 526.59C817.32 524.50 819.78 522.84 822.62 521.64C825.48 520.46 828.69 519.85 832.20 519.85C835.61 519.85 838.81 520.47 841.70 521.70C844.60 522.93 847.13 524.62 849.24 526.73C851.34 528.83 852.99 531.31 854.13 534.11C855.28 536.92 855.86 539.95 855.86 543.12L855.86 543.35C855.86 546.51 855.28 549.52 854.14 552.29C852.98 555.07 851.37 557.54 849.34 559.64C847.32 561.74 844.83 563.40 841.96 564.59C839.07 565.78 835.87 566.39 832.44 566.39"/>
                    <!-- M -->
                    <path d="M935.34 533.75L914.23 501.53L891.60 501.53L891.60 584.71L913.36 584.71L913.36 536.92L934.06 566.73L936.39 566.73L957.33 536.58L957.33 584.71L979.09 584.71L979.09 501.53L956.46 501.53Z"/>
                    <!-- I -->
                    <path d="M996.55 584.71L1018.55 584.71L1018.55 501.52L996.55 501.52Z"/>
                    <!-- N -->
                    <path d="M1092.38 547.32L1055.65 501.52L1036.01 501.52L1036.01 584.71L1057.77 584.71L1057.77 537.33L1095.82 584.71L1114.14 584.71L1114.14 501.52L1092.38 501.52Z"/>
                    <!-- A -->
                    <path d="M1179.48 500.96L1160.17 500.96L1122.60 584.71L1145.32 584.71L1153 566.85L1186.18 566.85L1193.85 584.71L1217.05 584.71ZM1178.05 547.84L1161.12 547.84L1169.58 528.23Z"/>
                </g>
            </g>

            <!--
                SINCE 1973 text
                FIX: <text> has NO SVG transform attribute so CSS transform is safe.
                     SVG coordinates x=200 y=178 are already in canvas space.
            -->
            <text class="ri-since"
                  x="200" y="178"
                  text-anchor="middle"
                  font-family="'Roboto',sans-serif"
                  font-size="9.5"
                  font-weight="300"
                  letter-spacing="4.5"
                  fill="rgba(255,255,255,0.72)">SINCE 1973</text>

            <!-- LIGHT SWEEP (translated in CSS during hold phase) -->
            <rect class="ri-sweep" x="42" y="66" width="316" height="148"
                  fill="url(#ri-sweep-grad)" rx="0"/>

        </svg>
    </div>

</div>

<script>
/* =============================================================
   ROMINA INTRO — v4 Controller
   15-second cinematic timeline
   ============================================================= */
(function () {
    'use strict';

    var SESSION_KEY      = 'ri_shown_v4';
    var DURATION_FULL    = 15000;
    var DURATION_REDUCED = 1150;

    var overlay = document.getElementById('romina-intro');
    if (!overlay) return;

    var seen = false;
    try { seen = !!sessionStorage.getItem(SESSION_KEY); } catch (e) {}
    if (seen) { overlay.style.display = 'none'; return; }

    var reduced = false;
    try { reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches; } catch (e) {}

    overlay.classList.add(reduced ? 'ri--reduced' : 'ri--animate');

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

    /* Single cleanup timeout */
    setTimeout(function () {
        if (overlay && overlay.parentNode) overlay.parentNode.removeChild(overlay);
        document.documentElement.style.overflow = '';
        document.body.style.paddingRight = '';
        inertEls.forEach(function (el) {
            el.removeAttribute('inert');
            el.removeAttribute('aria-hidden');
        });
        try { sessionStorage.setItem(SESSION_KEY, '1'); } catch (e) {}
    }, reduced ? DURATION_REDUCED : DURATION_FULL);

}());
</script>
