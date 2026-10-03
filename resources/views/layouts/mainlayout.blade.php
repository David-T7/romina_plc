<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"{{ app()->getLocale() === 'am' ? ' class="lang-am"' : '' }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $pageTitle ?? 'Romina Group' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Ethiopic:wght@400;500;700&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @yield('page-css')

    @php
        $i18nEn   = trans('site', [], 'en');
        $i18nAm   = trans('site', [], 'am');
        $i18nYear = date('Y');
        if (isset($i18nEn['ftr_copyright'])) $i18nEn['ftr_copyright'] = str_replace(':year', $i18nYear, $i18nEn['ftr_copyright']);
        if (isset($i18nAm['ftr_copyright'])) $i18nAm['ftr_copyright'] = str_replace(':year', $i18nYear, $i18nAm['ftr_copyright']);
    @endphp
    <script>window.I18N={!! json_encode(['en'=>$i18nEn,'am'=>$i18nAm],JSON_UNESCAPED_UNICODE|JSON_HEX_TAG) !!};window.I18N_LOCALE='{{ app()->getLocale() }}';</script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

@include('partials.romina-intro')

{{-- Romina Assistant chatbot — global, coordinates with intro overlay --}}
@include('partials.romina-chatbot')

<div class="scroll-prog" aria-hidden="true"><i></i></div>

@include('partials.header')


<main>

@yield('page-content')

@include('partials.footer')

</main>


<script>
/* =====================================================
   MOBILE NAV
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    const openBtn  = document.getElementById('menuOpen');
    const closeBtn = document.getElementById('menuClose');
    const mobileNav = document.getElementById('mobileNav');
    const navLinks = document.querySelectorAll('.mobile-nav-links a');

    function openMenu() {
        mobileNav.classList.add('open');
        mobileNav.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileNav.classList.remove('open');
        mobileNav.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);

    navLinks.forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeMenu();
    });

});


/* =====================================================
   FIFTY COUNT-UP
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    const fiftySection = document.querySelector('.fifty-section');
    const counter = fiftySection && fiftySection.querySelector('.fifty-count');

    if (!fiftySection || !counter) return;

    let animated = false;

    function runCount() {
        const target = parseInt(counter.dataset.target, 10) || 50;
        const duration = 2200;
        const startTime = performance.now();

        function tick(now) {
            const elapsed  = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased    = 1 - Math.pow(1 - progress, 3);
            counter.textContent = Math.floor(eased * target);
            if (progress < 1) requestAnimationFrame(tick);
            else counter.textContent = target;
        }

        requestAnimationFrame(tick);
    }

    const obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting && !animated) {
                animated = true;
                runCount();
                obs.unobserve(fiftySection);
            }
        });
    }, { threshold: 0.3 });

    obs.observe(fiftySection);

});


/* =====================================================
   Our story — timeline autoplay (desktop + mobile staircase)
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    function getTlData(locale) {
        var L = window.I18N && (window.I18N[locale] || window.I18N['en']) || {};
        return [
            { year: '1973',              text: L['tl_0_text'] || '' },
            { year: '2009',              text: L['tl_1_text'] || '' },
            { year: '2017',              text: L['tl_2_text'] || '' },
            { year: '2020',              text: L['tl_3_text'] || '' },
            { year: L['tl_4_year'] || 'Today', text: L['tl_4_text'] || '' },
        ];
    }
    var TIMELINE    = getTlData(window.I18N_LOCALE || document.documentElement.lang || 'en');
    var tlActiveIdx = 0;

    var nodes  = document.querySelectorAll('.tl-node');
    var dot    = document.getElementById('tlDot');
    var detail = document.getElementById('tlDetail');
    var big    = document.getElementById('tlBig');
    var text   = document.getElementById('tlText');
    var rail   = document.querySelector('.tl-rail');

    if (!nodes.length || !rail) return;

    var prefRed = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function activate(index) {
        tlActiveIdx = index;
        nodes.forEach(function (n, i) {
            n.classList.toggle('on',   i === index);
            n.classList.toggle('past', i < index);
            n.setAttribute('aria-pressed', i === index ? 'true' : 'false');
            n.setAttribute('aria-current', i === index ? 'step' : 'false');
        });
        if (dot) {
            var p = window.innerWidth >= 1024 ? nodes[index].style.getPropertyValue('--pos').trim() : '';
            dot.style.left = p || ((index / (TIMELINE.length - 1)) * 100) + '%';
        }
        if (detail) { detail.classList.remove('tl-animate'); void detail.offsetWidth; detail.classList.add('tl-animate'); }
        if (big)    big.textContent  = TIMELINE[index].year;
        if (text)   text.textContent = TIMELINE[index].text;
    }

    /* ================================================================
       DESKTOP CONTROLLER  (≥769px)
       Auto-advances every 3 s. Hover pauses; resumes 4 s after leave.
       Click/keyboard stops; resumes 8 s after last interaction.
    ================================================================ */
    function initDesktop() {
        var autoIdx     = 0;
        var autoTimer   = null;
        var resumeTimer = null;
        var isVisible   = false;
        var io          = null;

        function schedule() {
            clearTimeout(autoTimer);
            if (!isVisible) return;
            autoTimer = setTimeout(function () {
                autoIdx = (autoIdx + 1) % TIMELINE.length;
                activate(autoIdx);
                schedule();
            }, 3000);
        }

        function pause() { clearTimeout(autoTimer); }

        function scheduleResume(ms) {
            clearTimeout(resumeTimer);
            clearTimeout(autoTimer);
            resumeTimer = setTimeout(schedule, ms);
        }

        nodes.forEach(function (node) {
            var idx = +node.dataset.index;

            /* Hover: pause, show this milestone */
            node.addEventListener('mouseenter', function () {
                clearTimeout(resumeTimer);
                pause();
                activate(idx);
                autoIdx = idx;
            });
            node.addEventListener('mouseleave', function () { scheduleResume(4000); });

            /* Click: activate + long resume */
            node.addEventListener('click', function () {
                activate(idx);
                autoIdx = idx;
                scheduleResume(8000);
            });

            /* Keyboard focus behaves like hover */
            node.addEventListener('focus', function () {
                clearTimeout(resumeTimer);
                pause();
                activate(idx);
                autoIdx = idx;
            });
            node.addEventListener('blur',  function () { scheduleResume(4000); });
            node.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    activate(idx);
                    autoIdx = idx;
                    scheduleResume(8000);
                }
            });
        });

        function onEnter() {
            isVisible = true;
            if (!rail.classList.contains('tl-entered')) rail.classList.add('tl-entered');
            activate(autoIdx);
            schedule();
        }
        function onLeave() { isVisible = false; pause(); }

        if (typeof IntersectionObserver !== 'undefined') {
            io = new IntersectionObserver(function (entries) {
                entries[0].isIntersecting ? onEnter() : onLeave();
            }, { threshold: 0.2 });
            io.observe(rail);
        } else {
            onEnter();
        }

        return {
            onVisibility: function (hidden) {
                if (hidden) pause();
                else if (isVisible) schedule();
            },
            destroy: function () {
                pause();
                clearTimeout(resumeTimer);
                if (io) io.disconnect();
                rail.classList.remove('tl-entered');
            }
        };
    }

    /* ================================================================
       MOBILE CONTROLLER  (≤768px)
       Ball bounces 1973→…→Today→loop. Tap stops ball; resumes after 8 s.
    ================================================================ */
    function initMobile() {

        /* Reduced motion: instant tap only, no ball */
        if (prefRed) {
            nodes.forEach(function (node) {
                node.addEventListener('click', function () { activate(+node.dataset.index); });
                node.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activate(+node.dataset.index); }
                });
            });
            rail.classList.add('tl-entered');
            activate(0);
            return { onVisibility: function () {}, destroy: function () {} };
        }

        var ball        = null;
        var ballX = 0, ballY = 0;
        var stepIndex   = 0;
        var autoTimer   = null;
        var resumeTimer = null;
        var entrTimer   = null;
        var hopRaf      = null;
        var autoPlaying = false;
        var isVisible   = false;
        var io          = null;

        /* Landing: right-top corner of each step (tread/riser junction) */
        function getLanding(i) {
            var rr = rail.getBoundingClientRect();
            var nr = nodes[i].getBoundingClientRect();
            return { x: nr.right - rr.left, y: nr.top - rr.top };
        }

        function placeBall(x, y) {
            ballX = x; ballY = y;
            ball.style.transform = 'translate(' + (x - 7) + 'px,' + (y - 14) + 'px)';
        }

        function cancelHop() {
            if (hopRaf) { cancelAnimationFrame(hopRaf); hopRaf = null; }
        }

        function squash(x, y) {
            if (typeof ball.animate !== 'function') return;
            var p = 'translate(' + (x - 7) + 'px,' + (y - 14) + 'px)';
            ball.animate(
                [{ transform: p + ' scaleX(1.15) scaleY(0.8)' }, { transform: p }],
                { duration: 80, easing: 'ease-out' }
            );
        }

        function hopTo(toX, toY, dur, onDone) {
            cancelHop();
            var sx = ballX, sy = ballY, dx = toX - sx, dy = toY - sy;
            var arcH = Math.min(80 + Math.abs(dx) * 0.15 + Math.abs(dy) * 0.1, 100);
            var t0   = performance.now();
            (function tick(now) {
                var raw  = Math.min((now - t0) / dur, 1);
                var ease = raw < 0.5 ? 2 * raw * raw : -1 + (4 - 2 * raw) * raw;
                var x    = sx + dx * ease;
                var y    = sy + dy * ease - arcH * Math.sin(Math.PI * raw);
                ball.style.transform = 'translate(' + (x - 7) + 'px,' + (y - 14) + 'px)';
                if (raw < 1) {
                    hopRaf = requestAnimationFrame(tick);
                } else {
                    hopRaf = null; ballX = toX; ballY = toY;
                    squash(toX, toY);
                    if (onDone) onDone();
                }
            })(performance.now());
        }

        function moveTo(i, dur, done) {
            var lp = getLanding(i);
            hopTo(lp.x, lp.y, dur, function () {
                activate(i); stepIndex = i;
                if (done) done();
            });
        }

        function scheduleNext() {
            if (!autoPlaying) return;
            clearTimeout(autoTimer);
            autoTimer = setTimeout(function () {
                if (!autoPlaying) return;
                moveTo((stepIndex + 1) % TIMELINE.length, 550, scheduleNext);
            }, 1800);
        }

        function startAutoplay() {
            if (autoPlaying || !ball) return;
            autoPlaying = true;
            scheduleNext();
        }

        function stopAutoplay() {
            autoPlaying = false;
            clearTimeout(autoTimer);
            cancelHop();
        }

        /* Tap: jump to step, then resume autoplay after 8 s */
        nodes.forEach(function (node) {
            node.addEventListener('click', function () {
                var idx = +node.dataset.index;
                stopAutoplay();
                clearTimeout(resumeTimer);
                if (ball) moveTo(idx, 300, null);
                else { activate(idx); stepIndex = idx; }
                resumeTimer = setTimeout(startAutoplay, 8000);
            });
            node.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); node.click(); }
            });
        });

        function onEnter() {
            isVisible = true;
            if (!rail.classList.contains('tl-entered')) {
                rail.classList.add('tl-entered');
                /* Wait out entrance animation (320ms delay + 500ms duration) */
                entrTimer = setTimeout(function () {
                    ball = document.createElement('span');
                    ball.className = 'tl-ball';
                    ball.setAttribute('aria-hidden', 'true');
                    rail.appendChild(ball);
                    rail.classList.add('tl-has-ball');
                    var lp = getLanding(0);
                    placeBall(lp.x, lp.y);
                    activate(0); stepIndex = 0;
                    startAutoplay();
                }, 860);
            } else if (ball) {
                startAutoplay();
            }
        }

        function onLeave() {
            isVisible = false;
            clearTimeout(entrTimer);
            stopAutoplay();
        }

        if (typeof IntersectionObserver !== 'undefined') {
            io = new IntersectionObserver(function (entries) {
                entries[0].isIntersecting ? onEnter() : onLeave();
            }, { threshold: 0.15 });
            io.observe(rail);
        } else {
            rail.classList.add('tl-entered');
        }

        window.addEventListener('resize', function () {
            if (!ball) return;
            stopAutoplay();
            placeBall(getLanding(stepIndex).x, getLanding(stepIndex).y);
            if (isVisible) setTimeout(startAutoplay, 300);
        });

        return {
            onVisibility: function (hidden) {
                if (hidden) stopAutoplay();
                else if (isVisible) startAutoplay();
            },
            destroy: function () {
                stopAutoplay();
                clearTimeout(entrTimer);
                clearTimeout(resumeTimer);
                if (io) io.disconnect();
                if (ball && ball.parentNode) { ball.parentNode.removeChild(ball); ball = null; }
                rail.classList.remove('tl-entered', 'tl-has-ball');
            }
        };
    }

    /* ================================================================
       BOOTSTRAP — one controller at a time, hot-swap on breakpoint cross
    ================================================================ */
    var mq   = window.matchMedia('(max-width: 768px)');
    var ctrl = null;

    function boot() {
        if (ctrl) ctrl.destroy();
        ctrl = mq.matches ? initMobile() : initDesktop();
    }

    /* addEventListener preferred; addListener is the legacy Safari fallback */
    if (typeof mq.addEventListener === 'function') {
        mq.addEventListener('change', boot);
    } else {
        mq.addListener(boot);
    }

    boot();

    document.addEventListener('visibilitychange', function () {
        if (ctrl) ctrl.onVisibility(document.hidden);
    });

    document.addEventListener('localechange', function (e) {
        TIMELINE = getTlData(e.detail.locale);
        activate(tlActiveIdx);
        /* Also update tl-node title spans */
        nodes.forEach(function (n, i) {
            var span = n.querySelector('.tl-title');
            if (span && span.dataset.i18n) {
                var val = window.I18N && window.I18N[e.detail.locale] && window.I18N[e.detail.locale][span.dataset.i18n];
                if (val != null) span.textContent = val;
            }
        });
    });

});


/* =====================================================
   HERO SLIDER
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    const slides      = document.querySelectorAll('.hero-slide');
    const nextButton  = document.querySelector('.next-slide');
    const prevButton  = document.querySelector('.prev-slide');
    const currentNumber  = document.querySelector('.current-slide');
    const progressActive = document.querySelector('.progress-active');
    const progressDot    = document.querySelector('.progress-dot');

    if (!slides.length || !nextButton || !prevButton) return;

    let current = 0;
    let autoplay;
    const total = slides.length;

    function updateSlide(index) {
        slides.forEach((slide, i) => slide.classList.toggle('active', i === index));
        currentNumber.textContent = String(index + 1).padStart(2, '0');
        const pct = ((index + 1) / total) * 100;
        progressActive.style.width = pct + '%';
        progressDot.style.left = `calc(${pct}% - 5px)`;
    }

    function nextSlide() {
        current = (current + 1) % total;
        updateSlide(current);
        restartAutoplay();
    }

    function previousSlide() {
        current = (current - 1 + total) % total;
        updateSlide(current);
        restartAutoplay();
    }

    function startAutoplay() {
        autoplay = setInterval(() => {
            current = (current + 1) % total;
            updateSlide(current);
        }, 6000);
    }

    function restartAutoplay() {
        clearInterval(autoplay);
        startAutoplay();
    }

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', previousSlide);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft')  previousSlide();
    });

    updateSlide(0);
    startAutoplay();

});


/* =====================================================
   PORTFOLIO SLIDER
   Cards scroll sideways via the prev/next arrows (or a
   swipe / trackpad); counter + progress follow the track.
===================================================== */
document.addEventListener('DOMContentLoaded', () => {

    const section = document.querySelector('.portfolio-section');
    if (!section) return;

    const viewport      = section.querySelector('.portfolio-slider-wrapper');
    const cards         = section.querySelectorAll('.portfolio-card');
    const prevBtn       = section.querySelector('.portfolio-prev');
    const nextBtn       = section.querySelector('.portfolio-next');
    const progressBar   = section.querySelector('.portfolio-progress-active');
    const progressDot   = section.querySelector('.portfolio-progress-dot');
    const currentNumber = section.querySelector('.portfolio-current');

    if (!viewport || !cards.length) return;

    function cardStep() {
        const gap = parseFloat(getComputedStyle(cards[0].parentElement).columnGap) || 25;
        return cards[0].offsetWidth + gap;
    }

    function update() {
        const max      = viewport.scrollWidth - viewport.clientWidth;
        const progress = max > 0 ? viewport.scrollLeft / max : 0;
        const pct      = progress * 100;

        if (progressBar) progressBar.style.width = pct + '%';
        if (progressDot) progressDot.style.left  = `calc(${pct}% - 5px)`;

        let index = Math.round(viewport.scrollLeft / cardStep());
        if (progress > 0.99) index = cards.length - 1;
        index = Math.max(0, Math.min(cards.length - 1, index));
        if (currentNumber) currentNumber.textContent = String(index + 1).padStart(2, '0');

        if (prevBtn) prevBtn.disabled = viewport.scrollLeft <= 2;
        if (nextBtn) nextBtn.disabled = viewport.scrollLeft >= max - 2;
    }

    function go(dir) {
        viewport.scrollBy({ left: dir * cardStep(), behavior: 'smooth' });
    }

    if (prevBtn) prevBtn.addEventListener('click', () => go(-1));
    if (nextBtn) nextBtn.addEventListener('click', () => go(1));

    viewport.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') { e.preventDefault(); go(1); }
        if (e.key === 'ArrowLeft')  { e.preventDefault(); go(-1); }
    });

    let ticking = false;
    viewport.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(() => { update(); ticking = false; });
            ticking = true;
        }
    }, { passive: true });

    window.addEventListener('resize', update);
    update();

});


/* =====================================================
   VALUES — WHY CHOOSE ROMINA
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    function getValData(locale) {
        var L = window.I18N && (window.I18N[locale] || window.I18N['en']) || {};
        return [
            { name: L['val_0_name'] || 'Excellence',   text: L['val_0_text'] || '' },
            { name: L['val_1_name'] || 'Innovation',   text: L['val_1_text'] || '' },
            { name: L['val_2_name'] || 'Quality',      text: L['val_2_text'] || '' },
            { name: L['val_3_name'] || 'Sustainability', text: L['val_3_text'] || '' },
            { name: L['val_4_name'] || 'Integrity',    text: L['val_4_text'] || '' },
        ];
    }
    var VALUES      = getValData(window.I18N_LOCALE || document.documentElement.lang || 'en');
    var valActiveIdx = 0;

    var items   = document.querySelectorAll('.val-list li');
    var card    = document.getElementById('valCard');
    var nameEl  = document.getElementById('valName');
    var textEl  = document.getElementById('valText');

    if (!items.length || !card) return;

    function activate(index) {
        valActiveIdx = index;
        items.forEach(function (li, i) {
            li.classList.toggle('on', i === index);
            li.querySelector('button').setAttribute('aria-expanded', i === index ? 'true' : 'false');
        });

        /* re-trigger fadeup animation */
        card.style.animation = 'none';
        card.offsetHeight; /* reflow */
        card.style.animation = '';

        nameEl.textContent = VALUES[index].name;
        textEl.textContent = VALUES[index].text;
    }

    items.forEach(function (li, i) {
        var btn = li.querySelector('button');
        btn.addEventListener('click',      function () { activate(i); });
        btn.addEventListener('mouseenter', function () { activate(i); });
        btn.addEventListener('focus',      function () { activate(i); });
    });

    document.addEventListener('localechange', function (e) {
        VALUES = getValData(e.detail.locale);
        activate(valActiveIdx);
    });

});


/* =====================================================
   COFFEE SECTION
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    /* parallax on hero beans image */
    var beansImg = document.getElementById('cofBeansImg');
    if (beansImg) {
        var beansSec = beansImg.closest('.cof-beans');
        window.addEventListener('scroll', function () {
            var r = beansSec.getBoundingClientRect();
            if (r.bottom < 0 || r.top > window.innerHeight) return;
            var progress = -r.top / window.innerHeight;
            beansImg.style.transform = 'translate3d(0,' + (progress * 80) + 'px,0)';
        }, { passive: true });
    }

    /* journey animate-in */
    var journey = document.getElementById('cofJourney');
    if (journey) {
        new IntersectionObserver(function (entries, obs) {
            if (entries[0].isIntersecting) {
                journey.classList.add('go');
                obs.unobserve(journey);
            }
        }, { threshold: 0.25 }).observe(journey);
    }

    /* quote masonry tiles rise in */
    var quote = document.getElementById('cofQuote');
    if (quote) {
        new IntersectionObserver(function (entries, obs) {
            if (entries[0].isIntersecting) {
                quote.classList.add('go');
                obs.unobserve(quote);
            }
        }, { threshold: 0.2 }).observe(quote);
    }

    /* stats count-up */
    var statsEl = document.getElementById('cofStats');
    if (statsEl) {
        new IntersectionObserver(function (entries, obs) {
            if (!entries[0].isIntersecting) return;
            statsEl.querySelectorAll('.cof-count').forEach(function (el) {
                var to  = parseInt(el.dataset.to, 10);
                var dur = to > 1000 ? 2000 : 1200;
                var t0  = performance.now();
                (function tick(now) {
                    var p = Math.min((now - t0) / dur, 1);
                    var e = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.floor(e * to).toLocaleString();
                    if (p < 1) requestAnimationFrame(tick);
                    else el.textContent = to.toLocaleString();
                })(performance.now());
            });
            obs.unobserve(statsEl);
        }, { threshold: 0.15 }).observe(statsEl);
    }

});


/* =====================================================
   Coffee legacy video
===================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var vid      = document.getElementById('cofBgVideo');
    var beans    = document.querySelector('.cof-beans');
    if (!vid || !beans) return;

    var centerBtn = document.getElementById('cofCenterBtn');
    var controls  = document.getElementById('cofControls');
    var ctrlPlay  = document.getElementById('cofCtrlPlay');
    var ctrlRew   = document.getElementById('cofCtrlRew');
    var ctrlFwd   = document.getElementById('cofCtrlFwd');
    var timeEl    = document.getElementById('cofTime');
    var seekWrap  = document.getElementById('cofSeekWrap');
    var seekBuf   = document.getElementById('cofSeekBuf');
    var seekPlayed= document.getElementById('cofSeekPlayed');
    var seekTip   = document.getElementById('cofSeekTip');
    var speedBtn  = document.getElementById('cofSpeedBtn');
    var speedMenu = document.getElementById('cofSpeedMenu');
    var muteBtn   = document.getElementById('cofCtrlMute');
    var volSlider = document.getElementById('cofVolSlider');
    var fsBtn     = document.getElementById('cofCtrlFs');

    /* ---- Accessibility / performance ---- */
    var prefRed  = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var saveData = !!(typeof navigator.connection !== 'undefined' && navigator.connection.saveData);
    if (prefRed)  beans.classList.add('no-pulse');
    if (saveData) vid.preload = 'none';

    /* ---- Mobile source swap (before first metadata load) ---- */
    if (window.matchMedia('(max-width: 768px)').matches && vid.dataset.mobileSrc) {
        vid.querySelectorAll('source').forEach(function (s) { s.remove(); });
        var ms = document.createElement('source');
        ms.src  = vid.dataset.mobileSrc;
        ms.type = 'video/mp4';
        vid.appendChild(ms);
        vid.load();
    }

    beans.setAttribute('tabindex', '0');

    /* ---- Helpers ---- */
    var hideTimer  = null;
    var isDragging = false;

    function fmtTime(s) {
        if (!isFinite(s) || isNaN(s)) return '0:00';
        var m  = Math.floor(s / 60);
        var ss = Math.floor(s % 60);
        return m + ':' + (ss < 10 ? '0' : '') + ss;
    }

    function getSeekFrac(e) {
        if (!seekWrap) return 0;
        var r  = seekWrap.getBoundingClientRect();
        var cx = (e.touches && e.touches.length) ? e.touches[0].clientX : e.clientX;
        return Math.max(0, Math.min(1, (cx - r.left) / r.width));
    }

    /* ---- Icon helpers ---- */
    var vidState = 'play';   /* track for localechange */

    function vidStr(key) {
        var loc = window.I18N_LOCALE || document.documentElement.lang || 'en';
        return (window.I18N && window.I18N[loc] && window.I18N[loc][key]) || key;
    }

    function setPlayIcons(state) {
        vidState = state;
        [centerBtn, ctrlPlay].forEach(function (btn) {
            if (!btn) return;
            ['play', 'pause', 'replay'].forEach(function (s) {
                var el = btn.querySelector('.icon-' + s);
                if (el) el.style.display = (s === state) ? '' : 'none';
            });
        });
        if (centerBtn) centerBtn.setAttribute('aria-label',
            state === 'replay' ? vidStr('vid_replay') : state === 'pause' ? vidStr('vid_pause') : vidStr('vid_play'));
        if (ctrlPlay) ctrlPlay.setAttribute('aria-label', state === 'pause' ? vidStr('vid_pause_ctrl') : vidStr('vid_play_ctrl'));
    }

    function setMuteIcons() {
        var m = vid.muted || vid.volume === 0;
        if (muteBtn) {
            var iv = muteBtn.querySelector('.icon-vol');
            var im = muteBtn.querySelector('.icon-muted');
            if (iv) iv.style.display = m ? 'none' : '';
            if (im) im.style.display = m ? '' : 'none';
            muteBtn.setAttribute('aria-label', m ? vidStr('vid_unmute') : vidStr('vid_mute'));
        }
        if (volSlider) volSlider.value = (vid.muted ? 0 : vid.volume).toString();
    }

    function setFsIcons() {
        var inFs = !!document.fullscreenElement;
        if (fsBtn) {
            var ifs  = fsBtn.querySelector('.icon-fs');
            var iefs = fsBtn.querySelector('.icon-exit-fs');
            if (ifs)  ifs.style.display  = inFs ? 'none' : '';
            if (iefs) iefs.style.display = inFs ? '' : 'none';
            fsBtn.setAttribute('aria-label', inFs ? vidStr('vid_exit_fullscreen') : vidStr('vid_fullscreen'));
        }
    }

    /* ---- Controls visibility ---- */
    function showControls() {
        clearTimeout(hideTimer);
        beans.classList.add('controls-visible');
        if (!vid.paused && !vid.ended) {
            hideTimer = setTimeout(function () {
                beans.classList.remove('controls-visible');
            }, 2500);
        }
    }

    /* ---- Timeline ---- */
    function updateTimeline() {
        var dur = vid.duration;
        var pct = dur ? vid.currentTime / dur * 100 : 0;
        if (seekPlayed) seekPlayed.style.width = pct + '%';
        if (seekBuf && vid.buffered.length) {
            seekBuf.style.width = (vid.buffered.end(vid.buffered.length - 1) / (dur || 1) * 100) + '%';
        }
        if (timeEl) timeEl.textContent = fmtTime(vid.currentTime) + ' / ' + fmtTime(dur);
    }

    /* ---- Play / pause ---- */
    function doPlay()  { vid.play().catch(function () {}); }
    function doPause() { vid.pause(); }
    function togglePlay() {
        if (vid.ended) { vid.currentTime = 0; doPlay(); }
        else if (vid.paused) doPlay();
        else doPause();
    }

    /* ---- Video events drive UI state ---- */
    vid.addEventListener('play', function () {
        beans.classList.add('is-playing');
        beans.classList.remove('is-ended');
        setPlayIcons('pause');
        showControls();
    });
    vid.addEventListener('pause', function () {
        if (vid.ended) return;
        beans.classList.remove('is-playing');
        setPlayIcons('play');
        clearTimeout(hideTimer);
        beans.classList.add('controls-visible');
    });
    vid.addEventListener('ended', function () {
        beans.classList.remove('is-playing');
        beans.classList.add('is-ended');
        setPlayIcons('replay');
        clearTimeout(hideTimer);
        beans.classList.add('controls-visible');
    });
    vid.addEventListener('timeupdate',     updateTimeline);
    vid.addEventListener('seeked',         updateTimeline);
    vid.addEventListener('progress',       updateTimeline);
    vid.addEventListener('loadedmetadata', updateTimeline);
    vid.addEventListener('durationchange', updateTimeline);

    /* ---- Click targets ---- */
    if (centerBtn) centerBtn.addEventListener('click', function (e) { togglePlay(); e.stopPropagation(); });
    if (ctrlPlay)  ctrlPlay.addEventListener('click',  function (e) { togglePlay(); e.stopPropagation(); });
    beans.addEventListener('click', function (e) {
        if (controls  && controls.contains(e.target))  return;
        if (centerBtn && centerBtn.contains(e.target)) return;
        togglePlay();
    });

    /* ---- Rewind / Forward ---- */
    if (ctrlRew) ctrlRew.addEventListener('click', function (e) {
        vid.currentTime = Math.max(0, vid.currentTime - 10);
        updateTimeline(); showControls(); e.stopPropagation();
    });
    if (ctrlFwd) ctrlFwd.addEventListener('click', function (e) {
        vid.currentTime = Math.min(vid.duration || 0, vid.currentTime + 10);
        updateTimeline(); showControls(); e.stopPropagation();
    });

    /* ---- Seek (mouse + touch) ---- */
    if (seekWrap) {
        seekWrap.addEventListener('mousedown', function (e) {
            isDragging = true;
            if (isFinite(vid.duration)) vid.currentTime = getSeekFrac(e) * vid.duration;
            updateTimeline(); showControls(); e.stopPropagation();
        });
        seekWrap.addEventListener('mousemove', function (e) {
            if (!seekTip) return;
            var r    = seekWrap.getBoundingClientRect();
            var x    = e.clientX - r.left;
            seekTip.textContent  = fmtTime(getSeekFrac(e) * (vid.duration || 0));
            seekTip.style.left   = Math.max(18, Math.min(r.width - 18, x)) + 'px';
            seekTip.style.opacity = '1';
        });
        seekWrap.addEventListener('mouseleave', function () {
            if (seekTip) seekTip.style.opacity = '0';
        });
        seekWrap.addEventListener('touchstart', function (e) {
            isDragging = true;
            if (isFinite(vid.duration)) vid.currentTime = getSeekFrac(e) * vid.duration;
            updateTimeline(); showControls(); e.stopPropagation();
        }, { passive: true });
    }
    document.addEventListener('mousemove', function (e) {
        if (!isDragging) return;
        if (isFinite(vid.duration)) vid.currentTime = getSeekFrac(e) * vid.duration;
        updateTimeline();
    });
    document.addEventListener('mouseup',   function () { isDragging = false; });
    document.addEventListener('touchmove', function (e) {
        if (!isDragging) return;
        if (isFinite(vid.duration)) vid.currentTime = getSeekFrac(e) * vid.duration;
        updateTimeline();
    }, { passive: true });
    document.addEventListener('touchend',  function () { isDragging = false; });

    /* ---- Speed ---- */
    if (speedBtn && speedMenu) {
        speedBtn.addEventListener('click', function (e) {
            var open = speedMenu.classList.toggle('is-open');
            speedBtn.setAttribute('aria-expanded', String(open));
            showControls(); e.stopPropagation();
        });
        speedMenu.querySelectorAll('[data-speed]').forEach(function (item) {
            item.addEventListener('click', function (e) {
                var spd = parseFloat(item.dataset.speed);
                vid.playbackRate = spd;
                speedBtn.textContent = (spd === 1 ? '1' : spd) + '×';
                speedMenu.querySelectorAll('[data-speed]').forEach(function (i) { i.classList.remove('active'); });
                item.classList.add('active');
                speedMenu.classList.remove('is-open');
                speedBtn.setAttribute('aria-expanded', 'false');
                showControls(); e.stopPropagation();
            });
        });
        document.addEventListener('click', function () {
            if (speedMenu.classList.contains('is-open')) {
                speedMenu.classList.remove('is-open');
                speedBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /* ---- Mute / Volume ---- */
    if (muteBtn) muteBtn.addEventListener('click', function (e) {
        vid.muted = !vid.muted; setMuteIcons(); showControls(); e.stopPropagation();
    });
    if (volSlider) volSlider.addEventListener('input', function (e) {
        vid.volume = parseFloat(volSlider.value);
        vid.muted  = (vid.volume === 0);
        setMuteIcons(); showControls(); e.stopPropagation();
    });

    /* ---- Fullscreen ---- */
    if (fsBtn) fsBtn.addEventListener('click', function (e) {
        if (!document.fullscreenElement) beans.requestFullscreen && beans.requestFullscreen();
        else document.exitFullscreen && document.exitFullscreen();
        showControls(); e.stopPropagation();
    });
    document.addEventListener('fullscreenchange', setFsIcons);

    /* ---- Controls auto-show on hover / tap ---- */
    beans.addEventListener('mousemove',  showControls);
    beans.addEventListener('touchstart', showControls, { passive: true });

    /* ---- IntersectionObserver: pause only when scrolled out ---- */
    if (typeof IntersectionObserver !== 'undefined') {
        new IntersectionObserver(function (entries) {
            if (!entries[0].isIntersecting && !vid.paused) doPause();
        }, { threshold: 0.1 }).observe(beans);
    }

    /* ---- Tab visibility ---- */
    document.addEventListener('visibilitychange', function () {
        if (document.hidden && !vid.paused) doPause();
    });

    /* ---- Locale change: refresh aria-labels ---- */
    document.addEventListener('localechange', function () {
        setPlayIcons(vidState);
        setMuteIcons();
        setFsIcons();
    });

    /* ---- Keyboard (Space/K play-pause, J/← rwd, L/→ fwd, M mute, F fullscreen) ---- */
    beans.addEventListener('keydown', function (e) {
        if (e.target.tagName === 'INPUT') return;
        switch (e.key) {
            case ' ': case 'k': case 'K':
                e.preventDefault(); togglePlay(); showControls(); break;
            case 'j': case 'J': case 'ArrowLeft':
                e.preventDefault();
                vid.currentTime = Math.max(0, vid.currentTime - 10);
                updateTimeline(); showControls(); break;
            case 'l': case 'L': case 'ArrowRight':
                e.preventDefault();
                vid.currentTime = Math.min(vid.duration || 0, vid.currentTime + 10);
                updateTimeline(); showControls(); break;
            case 'm': case 'M':
                e.preventDefault(); vid.muted = !vid.muted; setMuteIcons(); showControls(); break;
            case 'f': case 'F':
                e.preventDefault();
                if (!document.fullscreenElement) beans.requestFullscreen && beans.requestFullscreen();
                else document.exitFullscreen && document.exitFullscreen();
                break;
        }
    });

});


/* =====================================================
   EXECUTIVE TEAM — SCROLL REVEAL
===================================================== */
document.addEventListener("DOMContentLoaded", function () {

    const section = document.querySelector("#executive-team");
    if (!section) return;

    /* Each grid reveals on its own as it scrolls into view */
    const grids = section.querySelectorAll(".executive-team-grid");

    if ("IntersectionObserver" in window) {

        const observer = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                });
            },
            { threshold: 0.12, rootMargin: "0px 0px -70px 0px" }
        );

        grids.forEach(function (grid) { observer.observe(grid); });

    } else {
        grids.forEach(function (grid) { grid.classList.add("is-visible"); });
    }

});


/* =====================================================
   SUSTAINABILITY COUNTERS
===================================================== */
document.addEventListener("DOMContentLoaded", function () {

    const section  = document.querySelector("#sustainability");
    if (!section) return;
    const counters = section.querySelectorAll(".counter");
    let hasAnimated = false;

    function animateCounter(counter) {
        const target    = Number(counter.dataset.target);
        const duration  = target > 1000 ? 1800 : 1200;
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed      = currentTime - startTime;
            const progress     = Math.min(elapsed / duration, 1);
            const easedProgress = 1 - Math.pow(1 - progress, 3);
            counter.textContent = Math.floor(easedProgress * target).toLocaleString();
            if (progress < 1) requestAnimationFrame(update);
            else counter.textContent = target.toLocaleString();
        }

        requestAnimationFrame(update);
    }

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !hasAnimated) {
                    hasAnimated = true;
                    counters.forEach(function (counter, i) {
                        setTimeout(function () { animateCounter(counter); }, i * 100);
                    });
                    observer.unobserve(section);
                }
            });
        },
        { threshold: 0.25 }
    );

    observer.observe(section);

});


/* =====================================================
   SUSTAINABILITY APPROACH
===================================================== */
(function () {

    /* Heading + photo tiles fade up as they enter; "Read More" is a plain
       anchor link, so the jump to each detail block needs no JS. */
    function initApproachReveal() {
        var section = document.querySelector('.sustainability-details');
        if (!section) return;

        var header = section.querySelector('.sa-reveal');
        var tiles  = section.querySelectorAll('.appr-reveal');
        var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (reduced || typeof IntersectionObserver === 'undefined') {
            if (header) header.classList.add('revealed');
            tiles.forEach(function (tile) { tile.classList.add('revealed'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                el.classList.add('revealed');
                observer.unobserve(el);
                /* Drop the stagger once in, so the hover dim responds instantly */
                setTimeout(function () { el.style.transitionDelay = ''; }, 1200);
            });
        }, { threshold: 0.12 });

        if (header) observer.observe(header);

        tiles.forEach(function (tile, i) {
            tile.style.transitionDelay = ((i % 3) * 110) + 'ms';   /* cascade per row */
            observer.observe(tile);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initApproachReveal);
    } else {
        initApproachReveal();
    }

}());


/* =====================================================
   BUSINESSES TABS
   Tab switching + per-panel image carousel with
   progress bar autoplay (5.2 s/slide, pause on hover).
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    var section = document.getElementById('brands');
    if (!section) return;

    var tabs      = Array.from(section.querySelectorAll('.brand-tab'));
    var panels    = Array.from(section.querySelectorAll('.brand-pane'));
    var markEl    = section.querySelector('#brandsMark');
    var DURATION  = 5200;
    var reduced   = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var activeKey = 'restaurants';

    /* ---- gallery factory ------------------------------------------ */
    function initGallery(panel) {

        var stack     = panel.querySelector('.stack');
        var slideEls  = Array.from(panel.querySelectorAll('.slide'));
        var capEl     = panel.querySelector('.gallery-cap');
        var progFill  = panel.querySelector('.prog-fill');
        var prevBtn   = panel.querySelector('.gal-prev');
        var nextBtn   = panel.querySelector('.gal-next');
        var galEl     = panel.querySelector('.gallery');
        var n         = slideEls.length;
        var current   = 0;
        var timer     = null;
        var hovered   = false;

        if (!n) return { pause: noop, resume: noop };

        function noop() {}

        function restartAnim() {
            if (!progFill) return;
            progFill.style.animation = 'none';
            void progFill.offsetHeight;                          /* force reflow */
            progFill.style.animation = '';
            progFill.style.animationName     = 'brands-grow';
            progFill.style.animationDuration = DURATION + 'ms';
            progFill.style.animationTimingFunction = 'linear';
            progFill.style.animationFillMode = 'both';
            progFill.style.animationPlayState = (hovered || reduced) ? 'paused' : 'running';
        }

        function scheduleNext() {
            clearTimeout(timer);
            if (!hovered && !reduced) {
                timer = setTimeout(function () { goTo(current + 1, 1); }, DURATION);
            }
        }

        function goTo(i, dir) {
            var prev = current;
            current  = ((i % n) + n) % n;
            if (current === prev) return;

            stack.classList.toggle('back', dir < 0);

            slideEls.forEach(function (s, idx) {
                s.classList.remove('on', 'was');
                s.setAttribute('aria-hidden', idx !== current ? 'true' : 'false');
                if (idx === prev)    s.classList.add('was');
                if (idx === current) s.classList.add('on');
            });

            if (capEl) capEl.textContent = slideEls[current].dataset.caption || '';
            restartAnim();
            scheduleNext();
        }

        function pause() {
            hovered = true;
            clearTimeout(timer);
            if (progFill) progFill.style.animationPlayState = 'paused';
        }

        function resume() {
            hovered = false;
            if (progFill) progFill.style.animationPlayState = 'running';
            scheduleNext();
        }

        if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1, -1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1,  1); });

        if (galEl) {
            galEl.addEventListener('mouseenter', pause);
            galEl.addEventListener('mouseleave', resume);
        }

        /* boot */
        restartAnim();
        scheduleNext();

        return { pause: pause, resume: resume };
    }

    /* ---- initialise all panels ------------------------------------ */
    var galleries = {};
    panels.forEach(function (panel) {
        var key       = panel.id.replace('brand-panel-', '');
        galleries[key] = initGallery(panel);
    });

    /* ---- tab switching -------------------------------------------- */
    function switchTab(key) {
        if (key === activeKey) return;

        if (galleries[activeKey]) galleries[activeKey].pause();

        var oldPanel = document.getElementById('brand-panel-' + activeKey);
        if (oldPanel) oldPanel.setAttribute('data-state', 'inactive');

        activeKey = key;

        var tone = 'light';
        var isDark = false;
        tabs.forEach(function (tab) {
            var isActive = tab.dataset.brand === key;
            tab.setAttribute('data-state',    isActive ? 'active'   : 'inactive');
            tab.setAttribute('aria-selected', isActive ? 'true'     : 'false');
            if (isActive) {
                tone   = tab.dataset.tone || 'light';
                isDark = tab.dataset.dark === '1';
            }
        });

        /* swap section tone class (background) + dark flag (light text) */
        var base = section.className
            .replace(/\btone-\S+/g, '')
            .replace(/\bis-dark\b/g, '')
            .replace(/\s+/g, ' ')
            .trim();
        section.className = base + ' tone-' + tone + (isDark ? ' is-dark' : '');

        /* mark colour follows the dark background */
        if (markEl) markEl.classList.toggle('tone-white', isDark);

        var newPanel = document.getElementById('brand-panel-' + key);
        if (newPanel) newPanel.setAttribute('data-state', 'active');

        if (galleries[key]) galleries[key].resume();
    }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () { switchTab(tab.dataset.brand); revealTab(); });
    });

    /* ---- mobile arrows: step through brands ------------------------ */
    var tabList = section.querySelector('.brand-list');

    /* scroll the strip (not the page) so the active tab sits in view */
    function revealTab() {
        var tab = section.querySelector('.brand-tab[data-state="active"]');
        if (!tabList || !tab || tabList.scrollWidth <= tabList.clientWidth) return;
        var left = tab.offsetLeft - tabList.offsetLeft - (tabList.clientWidth - tab.offsetWidth) / 2;
        tabList.scrollTo({ left: Math.max(0, left), behavior: reduced ? 'auto' : 'smooth' });
    }

    function stepBrand(dir) {
        var i = tabs.findIndex(function (t) { return t.dataset.brand === activeKey; });
        var next = tabs[(i + dir + tabs.length) % tabs.length];
        switchTab(next.dataset.brand);
        revealTab();
    }

    var bPrev = section.querySelector('.brands-prev');
    var bNext = section.querySelector('.brands-next');
    if (bPrev) bPrev.addEventListener('click', function () { stepBrand(-1); });
    if (bNext) bNext.addEventListener('click', function () { stepBrand(1); });

});

/* =====================================================
   ACCOMPLISHMENTS — swipe carousel
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    var section = document.getElementById('accomplishments');
    if (!section) return;

    var track   = document.getElementById('acTrack');
    if (!track) return;

    var cards   = Array.from(track.querySelectorAll('.ac-card'));
    var prevBtn = section.querySelector('.ac-prev');
    var nextBtn = section.querySelector('.ac-next');
    var dot     = section.querySelector('.ac-progress-dot');
    var ptrack  = section.querySelector('.ac-progress-track');

    /* ----- progress dot ----- */
    function updateProgress() {
        var max = track.scrollWidth - track.clientWidth;
        if (max <= 0 || !dot || !ptrack) return;
        var pct  = track.scrollLeft / max;
        var room = ptrack.offsetWidth - 9;
        dot.style.left = Math.round(pct * room) + 'px';
    }

    track.addEventListener('scroll', updateProgress, { passive: true });

    /* ----- arrow scroll ----- */
    function scrollCards(dir) {
        var w = cards[0] ? cards[0].offsetWidth + 16 : 356;
        track.scrollBy({ left: dir * w, behavior: 'smooth' });
    }

    if (prevBtn) prevBtn.addEventListener('click', function () { scrollCards(-1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { scrollCards(1); });

    /* ----- keyboard on track ----- */
    track.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight') { e.preventDefault(); scrollCards(1); }
        if (e.key === 'ArrowLeft')  { e.preventDefault(); scrollCards(-1); }
    });

    /* ----- mouse drag-to-scroll ----- */
    var dragging = false, startX = 0, startScroll = 0;

    track.addEventListener('pointerdown', function (e) {
        if (e.pointerType === 'touch') return;
        dragging = true;
        startX = e.clientX;
        startScroll = track.scrollLeft;
        track.setPointerCapture(e.pointerId);
        track.style.cursor = 'grabbing';
    });
    track.addEventListener('pointermove', function (e) {
        if (!dragging) return;
        track.scrollLeft = startScroll - (e.clientX - startX);
    });
    track.addEventListener('pointerup',     function () { dragging = false; track.style.cursor = ''; });
    track.addEventListener('pointercancel', function () { dragging = false; track.style.cursor = ''; });

    /* ----- entrance stagger (once) ----- */
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!prefersReduced && typeof IntersectionObserver !== 'undefined') {
        var io = new IntersectionObserver(function (entries) {
            if (!entries[0].isIntersecting) return;
            cards.forEach(function (card, i) {
                setTimeout(function () { card.classList.add('ac-visible'); }, i * 100);
            });
            io.disconnect();
        }, { threshold: 0.1 });
        io.observe(section);
    } else {
        cards.forEach(function (c) { c.classList.add('ac-visible'); });
    }

    updateProgress();

});

/* =====================================================
   CONTACT FORM — client-side validation only
===================================================== */
(function () {
    function initContactForm() {
        var form   = document.getElementById('ctcForm');
        var status = document.getElementById('ctcStatus');
        if (!form || !status) return;

        function fStr(key) {
            var loc = window.I18N_LOCALE || document.documentElement.lang || 'en';
            return (window.I18N && window.I18N[loc] && window.I18N[loc][key]) || key;
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            var name    = (form.querySelector('[name="name"]').value    || '').trim();
            var email   = (form.querySelector('[name="email"]').value   || '').trim();
            var message = (form.querySelector('[name="message"]').value || '').trim();

            if (!name || !email || !message) {
                status.textContent   = fStr('form_err_required');
                status.className     = 'f-status err';
                status.style.display = 'block';
                return;
            }

            status.textContent   = fStr('form_preview_msg');
            status.className     = 'f-status';
            status.style.display = 'block';
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContactForm);
    } else {
        initContactForm();
    }
}());


/* =====================================================
   OUR STORY — reveal + 3D tilt
   Pointer position drives --rx/--ry (tilt) and --gx/--gy
   (glare). Tilt only on fine pointers with motion allowed.
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    var cards = document.querySelectorAll('.story [data-tilt]');
    if (!cards.length) return;

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* Entrance */
    var reveals = document.querySelectorAll('.story-reveal');
    if (reduced || typeof IntersectionObserver === 'undefined') {
        reveals.forEach(function (el) { el.classList.add('revealed'); });
    } else {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('revealed');
                io.unobserve(entry.target);
            });
        }, { threshold: 0.15 });

        reveals.forEach(function (el, i) {
            el.style.transitionDelay = (i * 160) + 'ms';
            io.observe(el);
            /* Clear the stagger after entry so the tilt stays responsive */
            setTimeout(function () { el.style.transitionDelay = ''; }, 2000);
        });
    }

    /* Tilt */
    var canTilt = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    if (reduced || !canTilt) return;

    var MAX_Y = 10;   /* degrees, left-right */
    var MAX_X = 7;    /* degrees, up-down */

    cards.forEach(function (card) {
        var raf = 0;

        card.addEventListener('pointermove', function (e) {
            cancelAnimationFrame(raf);
            raf = requestAnimationFrame(function () {
                var r  = card.getBoundingClientRect();
                var px = (e.clientX - r.left) / r.width;
                var py = (e.clientY - r.top)  / r.height;

                card.classList.add('is-tilting');
                card.style.setProperty('--ry', ((px - 0.5) * MAX_Y).toFixed(2) + 'deg');
                card.style.setProperty('--rx', ((0.5 - py) * MAX_X).toFixed(2) + 'deg');
                card.style.setProperty('--gx', (px * 100).toFixed(1) + '%');
                card.style.setProperty('--gy', (py * 100).toFixed(1) + '%');
            });
        });

        card.addEventListener('pointerleave', function () {
            cancelAnimationFrame(raf);
            card.classList.remove('is-tilting');
            card.style.setProperty('--ry', '0deg');
            card.style.setProperty('--rx', '0deg');
        });
    });

});


/* =====================================================
   SCROLL PROGRESS
===================================================== */
(function () {
    var bar = document.querySelector('.scroll-prog');
    if (!bar) return;
    var raf = 0;
    function update() {
        var max = document.documentElement.scrollHeight - window.innerHeight;
        var sp  = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
        bar.style.setProperty('--sp', sp.toFixed(4));
    }
    window.addEventListener('scroll', function () {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(update);
    }, { passive: true });
    window.addEventListener('resize', function () {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(update);
    }, { passive: true });
    update();
}());


/* =====================================================
   HEADER SCROLL STATE
===================================================== */
(function () {
    var hdr = document.querySelector('.site-header');
    if (!hdr) return;
    function updateHeader() { hdr.classList.toggle('is-scrolled', window.scrollY > 60); }
    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
}());


/* =====================================================
   LANG SWITCHER — instant client-side swap
===================================================== */
(function () {
    'use strict';

    var CSRF     = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';
    var postBase = '/lang/';

    function lookup(locale, key) {
        var dict = window.I18N && window.I18N[locale];
        return (dict && dict[key] != null) ? dict[key] : null;
    }

    function applyLocale(locale) {
        var prev = window.I18N_LOCALE || document.documentElement.lang || 'en';
        if (locale === prev || !window.I18N || !window.I18N[locale]) return;

        /* — text nodes — */
        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            var val = lookup(locale, el.dataset.i18n);
            if (val != null) el.textContent = val;
        });

        /* — trusted HTML (our own <br>/<strong> strings only) — */
        document.querySelectorAll('[data-i18n-html]').forEach(function (el) {
            var val = lookup(locale, el.dataset.i18nHtml);
            if (val != null) el.innerHTML = val;
        });

        /* — attributes (format: "attr:key" or "attr:key;attr2:key2") — */
        document.querySelectorAll('[data-i18n-attr]').forEach(function (el) {
            el.dataset.i18nAttr.split(';').forEach(function (pair) {
                var sep  = pair.indexOf(':');
                if (sep < 1) return;
                var attr = pair.slice(0, sep).trim();
                var key  = pair.slice(sep + 1).trim();
                var val  = lookup(locale, key);
                if (val != null) el.setAttribute(attr, val);
            });
        });

        /* — <html lang> + Amharic font class — */
        document.documentElement.lang = locale;
        document.documentElement.classList.toggle('lang-am', locale === 'am');

        /* — switcher active states — */
        document.querySelectorAll('[data-locale]').forEach(function (a) {
            var on = a.dataset.locale === locale;
            a.classList.toggle('lang-opt--on',        on);
            a.classList.toggle('mobile-lang-opt--on', on);
        });

        /* — update global tracker — */
        window.I18N_LOCALE = locale;

        /* — notify dynamic components — */
        document.dispatchEvent(new CustomEvent('localechange', {
            detail: { locale: locale, prev: prev }
        }));

        /* — persist (fire-and-forget; GET link is the no-JS fallback) — */
        if (typeof fetch !== 'undefined') {
            fetch(postBase + locale, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN':    CSRF,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).catch(function () {});
        }
    }

    document.addEventListener('click', function (e) {
        var a = e.target.closest('[data-locale]');
        if (!a) return;
        e.preventDefault();
        var locale = a.dataset.locale;
        if (!locale) return;
        applyLocale(locale);
        a.focus();   /* keep keyboard focus on the switcher */
    });

}());
</script>

@yield('page-js')

</body>
</html>
