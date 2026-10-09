@extends('layouts/mainlayout')

{{-- =====================================================
     BRAND PAGE — one template for every business.
     Content lives in config/businesses.php.
===================================================== --}}

@php
    $home      = url('/');
    $slugs     = array_keys($brands);
    $index     = array_search($brandSlug, $slugs);
    $tel       = $brand['phone'] ? preg_replace('/\s+/', '', $brand['phone']) : null;
    $showMaps  = $brand['directions'] ?? true;
    $initial   = mb_substr($brand['name'], 0, 1);
    $bzTheme   = $brand['theme'] ?? null;   // e.g. 'coffee' — re-tints the whole page
@endphp

@section('page-css')
@if ($brandSlug === 'bacio-cremeria')
<link rel="stylesheet" href="{{ asset('css/bacio.css') }}">
@endif
@endsection

@section('page-content')

<div class="bz-page{{ $bzTheme ? ' bz-theme--' . $bzTheme : '' }}{{ $brandSlug === 'bacio-cremeria' ? ' bacio-page' : '' }}">

@if ($brandSlug === 'koba-patisserie')

{{-- KOBA has its own hero / about / showcase (Kubo-inspired, with scroll effects) --}}
@include('businesses.partials.koba')

@elseif ($brandSlug === 'bacio-cremeria')

{{-- Bacio has its own page sections and uses the shared business gallery. --}}
@include('businesses.partials.bacio')

@else

{{-- ============ HERO — split: story left, framed photo right ============ --}}
<section class="bz-hero">

    <span class="bz-hero-index" aria-hidden="true">{{ sprintf('%02d', $index + 1) }} / {{ sprintf('%02d', count($slugs)) }}</span>

    <div class="container bz-hero-grid">

        <div class="bz-hero-copy">

            <nav class="page-hero-crumbs" aria-label="Breadcrumb">
                <a href="{{ $home }}">Home</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <a href="{{ $home }}#businesses">Businesses</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <span aria-current="page">{{ $brand['menu'] }}</span>
            </nav>

            <div class="hero-category">{{ strtoupper($groups[$brand['group']]) }}</div>

            <h1>{{ $brand['name'] }}</h1>

            <p class="bz-hero-kicker">{{ $brand['kicker'] }}</p>

            <p class="bz-hero-intro">{{ $brand['intro'] }}</p>

            <div class="story-actions">
                @if ($tel)
                    <a href="tel:{{ $tel }}" class="story-btn story-btn ">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        {{ $brand['phone'] }}
                    </a>
                @else
                    <a href="{{ $home }}#contact" class="story-btn story-btn--solid">
                        Get in Touch
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                @endif

                @if (!empty($brand['locations']))
                    <a href="#bz-locations" class="story-btn story-btn--ghost">
                        {{ $brand['locations_label'] }}
                    </a>
                @endif
            </div>

        </div>

        <div class="bz-hero-media">
            <div class="bz-hero-frame">
                @if ($brand['image'])
                    <img src="{{ asset($brand['image']) }}" alt="{{ $brand['name'] }}">
                @else
                    <div class="bz-ph bz-ph--hero">
                        <span class="bz-ph-initial" aria-hidden="true">{{ $initial }}</span>
                        <span class="bz-ph-note"><i class="fa-regular fa-image" aria-hidden="true"></i> Photo coming soon</span>
                        <span class="bz-ph-shot">{{ $brand['image_shot'] ?? '' }}</span>
                    </div>
                @endif
            </div>

            {{-- <div class="bz-hero-badge">
                <strong>{{ $brand['badge']['value'] }}</strong>
                <span>{{ $brand['badge']['label'] }}</span>
            </div> --}}
        </div>

    </div>

</section>


{{-- ============ OVERVIEW ============ --}}
<section class="bz-overview bz-overview--{{ $brandSlug }}" id="bz-overview">
    <div class="container bz-overview-grid">

        <div class="bz-overview-head">
            <span class="bz-label">About {{ $brand['menu'] }}</span>
            <h2>{{ $brand['title'] }}</h2>
        </div>

        <div class="bz-overview-body">
            @foreach ($brand['body'] as $para)
                <p>{{ $para }}</p>
            @endforeach

            <dl class="bz-facts">
                @foreach ($brand['facts'] as $fact)
                    <div class="bz-fact">
                        <dt>{{ $fact['value'] }}</dt>
                        <dd>{{ $fact['label'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

    </div>
</section>


{{-- ============ HIGHLIGHTS ============ --}}
@if (($brand['show_highlights'] ?? true) && !empty($brand['highlights']['items']))
<section class="bz-highlights bz-highlights--{{ $brandSlug }}">
    <div class="container">

        <div class="bz-section-head">
            <span class="bz-label">{{ $brand['highlights']['label'] }}</span>
            <h2>{{ $brand['highlights']['title'] }}</h2>
        </div>

        <ul class="bz-cards">
            @foreach ($brand['highlights']['items'] as $item)
                <li class="bz-card">
                    <span class="bz-card-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <span class="bz-card-icon" aria-hidden="true"><i class="fa-solid {{ $item['icon'] }}"></i></span>
                    <span class="bz-card-name">{{ $item['name'] }}</span>
                </li>
            @endforeach
        </ul>

    </div>
</section>
@endif

@endif


{{-- ============ STATS + JOURNEY (Romina Coffee) ============ --}}
@if (!empty($brand['stats']))
<section class="bz-stats">
    <div class="container">

        <div class="bz-section-head bz-section-head--light">
            <span class="bz-label">By the numbers</span>
            <h2>The scale behind every cup.</h2>
        </div>

        <div class="bz-stats-grid">
            @foreach ($brand['stats'] as $stat)
                <div class="bz-stat">
                    <strong>{{ $stat['value'] }}</strong>
                    <span>{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>

        @if (!empty($brand['journey']))
            <ol class="bz-journey" aria-label="Export journey">
                @foreach ($brand['journey'] as $step)
                    <li>
                        <span class="bz-journey-dot" aria-hidden="true"></span>
                        <span class="bz-journey-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <span class="bz-journey-name">{{ $step }}</span>
                    </li>
                @endforeach
            </ol>
        @endif

    </div>
</section>
@endif


@if ($brandSlug !== 'bacio-cremeria')
@include('businesses.partials.gallery')
@endif


{{-- ============ LOCATIONS ============ --}}
@if (!empty($brand['locations']))
<section class="bz-locations" id="bz-locations">
    <div class="container">

        <div class="bz-section-head">
            <span class="bz-label">{{ $brand['locations_label'] }}</span>
            <h2>{{ $brand['locations_title'] ?? (count($brand['locations']) === 1 ? 'Worth the trip.' : 'Our Locations') }}</h2>
        </div>

        <ul class="bz-loc-grid">
            @foreach ($brand['locations'] as $loc)
                <li class="bz-loc">
                    <span class="bz-loc-pin" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></span>
                    <div>
                        <h3>
                            {{ $loc['name'] }}
                            @if ($loc['tag'])
                                <em class="bz-tag{{ $loc['tag'] === 'Coming soon' ? ' bz-tag--soon' : '' }}">{{ $loc['tag'] }}</em>
                            @endif
                        </h3>
                        <p>{{ $loc['desc'] }}</p>
                        @if ($showMaps && $loc['tag'] !== 'Coming soon')
                            <a class="bz-loc-link"
                               href="https://www.google.com/maps/search/?api=1&query={{ urlencode($brand['menu'] . ' ' . $loc['name'] . ' Addis Ababa') }}"
                               target="_blank" rel="noopener">
                                Get directions <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</section>
@endif


{{-- ============ OUR BRANDS (Romina Imports only) ============ --}}
@if ($brandSlug === 'romina-imports' && !empty($brand['import_brands']))
@php
    $importBrands = collect($brand['import_brands'])->unique('category')->values()->all();
    $importCategoryIcons = [
        'Pasta' => 'fa-wheat-awn',
        'Rice' => 'fa-bowl-rice',
        'Dairy' => 'fa-cow',
        'Edible Oils' => 'fa-bottle-droplet',
        'Bakery' => 'fa-bread-slice',
    ];
    $importCats   = array_values(array_unique(array_map(fn ($b) => $b['category'], $importBrands)));

    // Hex "molecule" grid — one circle per category, alternating half-step offset.
    // Positions are expressed in diameters (D); CSS multiplies by --sz.
    $rows  = array_map('count', array_chunk($importBrands, 3));
    $hStep = 1.22;   // horizontal step  (× D)
    $vStep = 1.10;   // vertical step    (× D)
    $cells = [];
    foreach ($rows as $r => $count) {
        $rowOffset = ($r % 2) * ($hStep / 2);
        for ($c = 0; $c < $count; $c++) {
            $cells[] = ['x' => $c * $hStep + $rowOffset, 'y' => $r * $vStep];
        }
    }
    $maxX = max(array_map(fn ($p) => $p['x'], $cells));
    $maxY = max(array_map(fn ($p) => $p['y'], $cells));
@endphp
<section class="rib-brands" id="rib-brands" aria-labelledby="rib-brands-title">

    <div class="rib-bg" aria-hidden="true"></div>

    <div class="container rib-inner">

        {{-- LEFT: copy + filters --}}
        <div class="rib-copy">

            <p class="mark tone-white">
                <span class="mark-rule"></span>
                <i aria-hidden="true"></i>
                Our brands
            </p>

            <h2 id="rib-brands-title" class="rib-heading">The names we bring<br>to Ethiopia.</h2>

            {{-- TODO: replace with client-supplied intro copy. --}}
            <p class="rib-intro">
                From pasta and rice to dairy and edible oils, Romina Imports brings a
                growing family of trusted everyday brands to the Ethiopian market —
                each sourced with the same care we hold in our own kitchens.
            </p>

            <div class="rib-filter">
                <span class="rib-filter-label" id="rib-filter-label">Preview our categories</span>
                <div class="rib-chips" role="group" aria-labelledby="rib-filter-label">
                    @foreach ($importCats as $cat)
                        <button type="button" class="rib-chip" data-cat="{{ $cat }}" aria-pressed="false">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
                <button type="button" class="rib-clear" hidden>Clear all filters</button>
            </div>

        </div>

        {{-- RIGHT: overlapping circular badges --}}
        <div class="rib-cluster" role="list" aria-label="Romina Imports brands">
            @foreach ($importBrands as $i => $b)
                @php
                    $cell  = $cells[$i] ?? end($cells);
                    $rx    = round($maxX - $cell['x'], 3);   // distance from right edge (× D)
                    $by    = round($maxY - $cell['y'], 3);   // distance from bottom edge (× D)
                    $delay = ($i * 1.31) - floor($i * 1.31);
                    // deterministic organic jitter: ±4px, ±2°
                    $jx    = (($i * 37 + 11) % 9) - 4;
                    $jy    = (($i * 53 + 7)  % 9) - 4;
                    $rot   = ((($i * 29 + 5) % 41) - 20) / 10;
                    $vars  = "--i: {$i}; --rx: {$rx}; --by: {$by}; --jx: {$jx}px; --jy: {$jy}px; --rot: {$rot}deg;"
                           . " --float-delay: " . number_format($delay * 2.5, 2) . "s;"
                           . " --float-dur: " . number_format(4.5 + $delay * 2.5, 2) . "s;";
                @endphp
                @if (!empty($b['link']))
                    <a class="rib-badge" role="listitem" data-cat="{{ $b['category'] }}"
                       style="{{ $vars }}"
                       href="{{ $b['link'] }}" target="_blank" rel="noopener"
                       aria-label="{{ !empty($b['logo']) ? $b['name'] . ' — ' . $b['category'] : $b['category'] }}">
                @else
                    <button type="button" class="rib-badge" role="listitem" data-cat="{{ $b['category'] }}"
                            style="{{ $vars }}"
                            aria-label="{{ !empty($b['logo']) ? $b['name'] . ' — ' . $b['category'] : $b['category'] }}">
                @endif
                    <span class="rib-badge-face">
                        @if (!empty($b['logo']))
                            <img src="{{ asset($b['logo']) }}" alt="{{ $b['name'] }}" loading="lazy">
                        @else
                            <span class="rib-category-art">
                                <i class="fa-solid {{ $importCategoryIcons[$b['category']] ?? 'fa-box-open' }}" aria-hidden="true"></i>
                                <span class="rib-category-label">{{ $b['category'] }}</span>
                            </span>
                        @endif
                    </span>
                    <span class="rib-badge-tip" aria-hidden="true">{{ !empty($b['logo']) ? $b['name'] : $b['category'] }}</span>
                @if (!empty($b['link']))
                    </a>
                @else
                    </button>
                @endif
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- ============ MORE BUSINESSES ============ --}}
<section class="bz-more">
    <div class="container">

        <div class="bz-section-head">
            <span class="bz-label">Romina Group</span>
            <h2>Explore our other businesses.</h2>
        </div>

        <div class="bz-more-grid">
            @foreach ($brands as $slug => $other)
                @continue($slug === $brandSlug)
                <a href="{{ route('business', $slug) }}" class="bz-more-card">
                    <span class="bz-more-group">{{ $groups[$other['group']] }}</span>
                    <span class="bz-more-name">{{ $other['menu'] }}</span>
                    <span class="bz-more-kicker">{{ $other['kicker'] }}</span>
                    <i class="fa-solid fa-arrow-right bz-more-arrow" aria-hidden="true"></i>
                </a>
            @endforeach
        </div>

    </div>
</section>

</div>{{-- /.bz-page --}}

@endsection

@section('page-js')
<script>
/* Bacio scoops arrive in a wave when What we make comes into view. */
(function () {
    var grid = document.querySelector('.bacio-product-grid');
    if (!grid || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    grid.querySelectorAll('.bacio-product-card').forEach(function (card, index) {
        card.style.setProperty('--wave-index', index);
    });
    if (!('IntersectionObserver' in window)) return;
    var observer = new IntersectionObserver(function (entries) {
        if (!entries.some(function (entry) { return entry.isIntersecting; })) return;
        grid.classList.add('is-waving');
        observer.disconnect();
    }, { threshold: 0.12 });
    observer.observe(grid);
}());
</script>

<script>
/* =====================================================
   BRAND GALLERY — lightbox
   Click a photo tile to open; arrows / swipe to browse,
   Esc or backdrop click to close. Focus returns to the tile.
===================================================== */
(function () {
    var tiles = Array.prototype.slice.call(document.querySelectorAll('.bz-tile-btn'));
    var box   = document.getElementById('bzLightbox');
    if (!tiles.length || !box) return;

    var img     = box.querySelector('.bz-lb-img');
    var countEl = box.querySelector('.bz-lb-count');
    var textEl  = box.querySelector('.bz-lb-text');
    var btnPrev = box.querySelector('.bz-lb-prev');
    var btnNext = box.querySelector('.bz-lb-next');
    var btnClose = box.querySelector('.bz-lb-close');
    var current = 0;
    var opener  = null;

    function pad(n) { return (n < 10 ? '0' : '') + n; }

    function show(i) {
        current = (i + tiles.length) % tiles.length;
        var t = tiles[current];
        box.classList.remove('is-swapping');
        void box.offsetWidth;                       /* restart the swap animation */
        box.classList.add('is-swapping');
        img.src = t.dataset.full;
        img.alt = t.querySelector('img').alt;
        countEl.textContent = pad(current + 1) + ' / ' + pad(tiles.length);
        textEl.textContent  = t.dataset.caption;
    }

    function open(i, trigger) {
        opener = trigger || tiles[i];
        box.hidden = false;
        box.classList.toggle('is-single', tiles.length < 2);
        requestAnimationFrame(function () { box.classList.add('is-open'); });
        document.body.style.overflow = 'hidden';
        show(i);
        btnClose.focus();
    }

    function close() {
        box.classList.remove('is-open');
        document.body.style.overflow = '';
        setTimeout(function () { box.hidden = true; }, 300);
        if (opener) opener.focus();
    }

    tiles.forEach(function (t, i) {
        t.addEventListener('click', function () { open(i); });
    });

    document.querySelectorAll('.bacio-image-btn').forEach(function (button) {
        var photo = button.querySelector('img');
        button.setAttribute('aria-label', 'Enlarge photo: ' + photo.alt);
        var index = tiles.findIndex(function (tile) { return tile.dataset.full === photo.src; });
        if (index < 0) return;
        button.addEventListener('click', function () { open(index, button); });
    });
    btnPrev.addEventListener('click', function () { show(current - 1); });
    btnNext.addEventListener('click', function () { show(current + 1); });
    btnClose.addEventListener('click', close);

    /* Backdrop click (not the photo or controls) closes */
    box.addEventListener('click', function (e) {
        if (e.target === box) close();
    });

    document.addEventListener('keydown', function (e) {
        if (box.hidden) return;
        if (e.key === 'Escape')     close();
        if (e.key === 'ArrowLeft')  show(current - 1);
        if (e.key === 'ArrowRight') show(current + 1);
        /* keep Tab focus inside the viewer */
        if (e.key === 'Tab') {
            var focusables = [btnClose, btnPrev, btnNext].filter(function (b) { return b.offsetParent !== null; });
            var first = focusables[0], last = focusables[focusables.length - 1];
            if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
            else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
        }
    });

    /* Swipe on touch screens */
    var x0 = null;
    box.addEventListener('touchstart', function (e) { x0 = e.changedTouches[0].clientX; }, { passive: true });
    box.addEventListener('touchend', function (e) {
        if (x0 === null) return;
        var dx = e.changedTouches[0].clientX - x0;
        if (Math.abs(dx) > 40) show(dx < 0 ? current + 1 : current - 1);
        x0 = null;
    });
}());
</script>

@if ($brandSlug === 'koba-patisserie')
<script>
/* =====================================================
   KOBA — scroll effects (one rAF-throttled scroll loop)
   · parallax on [data-kb-speed]
   · marquee that speeds up / reverses with the scroll
   · statement words light up as it is read
   Off for reduced motion; parallax off below 900px.
===================================================== */
(function () {
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var wide    = window.matchMedia('(min-width: 901px)');

    if (reduced) {
        /* stop the SVG blob morph and show the statement fully lit */
        document.querySelectorAll('.kb-hero svg').forEach(function (s) { if (s.pauseAnimations) s.pauseAnimations(); });
        document.querySelectorAll('.kb-word').forEach(function (w) { w.classList.add('on'); });
        return;
    }

    var parallax  = Array.prototype.slice.call(document.querySelectorAll('[data-kb-speed]'));
    var words     = Array.prototype.slice.call(document.querySelectorAll('.kb-word'));
    var reveal    = document.querySelector('.kb-reveal');
    var track     = document.querySelector('.kb-marquee-track');

    var lastY = window.scrollY, velocity = 0, ticking = false;

    function update() {
        ticking = false;
        var vh = window.innerHeight;

        /* parallax (desktop only) */
        parallax.forEach(function (el) {
            if (!wide.matches) { el.style.translate = ''; return; }
            var r = el.getBoundingClientRect();
            var offset = (r.top + r.height / 2 - vh / 2) * parseFloat(el.dataset.kbSpeed);
            el.style.translate = '0 ' + offset.toFixed(1) + 'px';
        });

        /* statement: light words up progressively */
        if (reveal) {
            var r2 = reveal.getBoundingClientRect();
            var p  = (vh * 0.85 - r2.top) / (r2.height + vh * 0.35);
            var lit = Math.round(Math.max(0, Math.min(1, p)) * words.length);
            words.forEach(function (w, i) { w.classList.toggle('on', i < lit); });
        }
    }

    function onScroll() {
        var y = window.scrollY;
        velocity = y - lastY;
        lastY = y;
        if (!ticking) { ticking = true; requestAnimationFrame(update); }
    }

    /* ---- Marquee: continuous drift; scroll velocity adds speed and sets direction ---- */
    if (track) {
        var mx = 0, dir = 1, half = 0;
        function measure() { half = track.scrollWidth / 2; }
        measure();
        (function loop() {
            if (Math.abs(velocity) > 0.5) dir = velocity > 0 ? 1 : -1;
            var speed = 0.6 + Math.min(Math.abs(velocity) * 0.15, 8);
            velocity *= 0.9;                               /* ease back to the base drift */
            mx -= speed * dir;
            if (mx <= -half) mx += half;
            if (mx > 0)      mx -= half;
            track.style.transform = 'translate3d(' + mx.toFixed(1) + 'px,0,0)';
            requestAnimationFrame(loop);
        })();
        window.addEventListener('resize', measure);
    }

    update();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', update);
    window.addEventListener('load', update);
}());

/* =====================================================
   KOBA — "What we make" spotlight carousel
   Active card centred + large; neighbours scaled, dimmed
   and blurred; the row loops. Autoplay every ~4s (pauses
   on hover / focus / touch / off-screen / hidden tab and
   resumes after ~6s idle). Swipe / drag (pointer), arrow
   keys when focused, click a side card or a progress pip
   to jump. A live region announces user-driven changes.
   Reduced motion → no autoplay / zoom, instant switches.
===================================================== */
(function () {
    var root = document.querySelector('.kb-spot');
    if (!root) return;

    var stage   = root.querySelector('.kb-spot-stage');
    var cards   = Array.prototype.slice.call(root.querySelectorAll('.kb-spot-card'));
    var prevBtn = root.querySelector('.kb-spot-prev');
    var nextBtn = root.querySelector('.kb-spot-next');
    var nowEl   = root.querySelector('.kb-spot-now');
    var dot     = root.querySelector('.kb-spot-dot');
    var pips    = Array.prototype.slice.call(root.querySelectorAll('.kb-spot-pip'));
    var fill    = root.querySelector('.kb-spot-fill');
    var live    = root.querySelector('.kb-spot-live');
    var n       = cards.length;
    if (!n) return;

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var active  = 0;
    var AUTO    = 4000;   /* autoplay interval */
    var RESUME  = 6000;   /* idle delay before autoplay resumes */
    var autoTimer = null, idleTimer = null;
    var paused = false, visible = true;

    /* shortest signed distance on the ring */
    function offsetOf(i) {
        var d = i - active;
        if (d >  n / 2) d -= n;
        if (d < -n / 2) d += n;
        return d;
    }

    function place() {
        var SCALE = 0.78;                         /* neighbour scale */
        var w     = cards[0].offsetWidth;         /* active card width */
        var gap   = window.matchMedia('(max-width: 1000px)').matches ? 20 : 32;
        /* centre-to-centre step = active half + gap + scaled neighbour half
           → a clear gap between the active edge and each neighbour, no overlap */
        var step  = w / 2 + gap + (w * SCALE) / 2;
        /* never push a neighbour past the stage edge: keep it fully visible */
        var maxStep = stage.offsetWidth / 2 - (w * SCALE) / 2 - 2;
        if (step > maxStep) step = maxStep;

        cards.forEach(function (card, i) {
            var off = offsetOf(i);
            var abs = Math.abs(off);
            var shown = abs <= 1;
            card.style.transform = 'translate(-50%, -50%) translateX(' + (off * step).toFixed(1) + 'px) scale(' + (off === 0 ? 1 : SCALE) + ')';
            card.style.opacity = shown ? (off === 0 ? 1 : 0.45) : 0;
            card.style.filter  = abs === 1 ? 'blur(1px)' : '';
            card.style.zIndex  = off === 0 ? 3 : (abs === 1 ? 2 : 1);
            card.style.pointerEvents = shown ? 'auto' : 'none';
            card.classList.toggle('is-active', off === 0);
            card.setAttribute('aria-hidden', off === 0 ? 'false' : 'true');
        });

        if (nowEl) nowEl.textContent = String(active + 1).padStart(2, '0');
        pips.forEach(function (p, i) { p.setAttribute('aria-selected', i === active ? 'true' : 'false'); });
        if (dot && pips[active]) {
            var p = pips[active];
            dot.style.transform = 'translateX(' + (p.offsetLeft + p.offsetWidth / 2) + 'px)';
        }
    }

    function go(i, announce) {
        active = (i % n + n) % n;
        place();
        if (announce && live) {
            var h = cards[active].querySelector('h3');
            live.textContent = (h ? h.textContent : ('Item ' + (active + 1))) + ', ' + (active + 1) + ' of ' + n;
        }
    }

    /* ---- autoplay ---- */
    function paintCountdown() {              /* (re)start the progress-line fill in sync */
        if (!fill || reduced) return;
        root.classList.remove('is-counting');
        void fill.offsetWidth;              /* reflow so the animation restarts from 0 */
        root.classList.add('is-counting');
        fill.style.animationPlayState = 'running';
    }
    function startAuto() {
        if (reduced || paused || !visible) return;
        stopAuto();
        paintCountdown();
        autoTimer = setInterval(function () { go(active + 1, false); paintCountdown(); }, AUTO);
    }
    function stopAuto() {
        if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
        if (fill) fill.style.animationPlayState = 'paused';   /* freeze the countdown */
    }
    function pause()  { paused = true;  stopAuto(); }
    function resume() { paused = false; startAuto(); }
    function nudge()  {                 /* user acted: hold, then resume when idle */
        pause();
        if (idleTimer) clearTimeout(idleTimer);
        idleTimer = setTimeout(resume, RESUME);
    }

    /* ---- controls ---- */
    function userGo(i) { go(i, true); nudge(); }
    if (prevBtn) prevBtn.addEventListener('click', function () { userGo(active - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { userGo(active + 1); });
    pips.forEach(function (p, i) { p.addEventListener('click', function () { userGo(i); }); });
    cards.forEach(function (card, i) {
        card.addEventListener('click', function () { if (i !== active) userGo(i); });
    });

    /* arrow keys when the carousel holds focus */
    root.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft')  { e.preventDefault(); userGo(active - 1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); userGo(active + 1); }
    });

    /* pause on hover / focus */
    root.addEventListener('mouseenter', pause);
    root.addEventListener('mouseleave', resume);
    root.addEventListener('focusin', pause);
    root.addEventListener('focusout', resume);

    /* ---- pointer swipe / drag (touch + mouse) ---- */
    var x0 = null, dragging = false;
    stage.addEventListener('pointerdown', function (e) { x0 = e.clientX; dragging = true; pause(); });
    window.addEventListener('pointerup', function (e) {
        if (!dragging) return;
        dragging = false;
        var dx = e.clientX - x0;
        if (Math.abs(dx) > 40) userGo(active + (dx < 0 ? 1 : -1));
        else nudge();
        x0 = null;
    });

    /* ---- pause when off-screen or the tab is hidden ---- */
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            visible = entries[0].isIntersecting;
            if (visible) startAuto(); else stopAuto();
        }, { threshold: 0.25 });
        io.observe(root);
    }
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) stopAuto(); else startAuto();
    });

    window.addEventListener('resize', place);
    window.addEventListener('load', place);

    go(0, false);
    startAuto();
}());
</script>
@endif

@if ($brandSlug === 'bacio-cremeria')
<script>
/* =====================================================
   BACIO — scroll reveal + a gentle pointer tilt on the hero frame.
   Reveal: elements marked .bc-reveal fade/rise in as they enter view
   (staggered by their --i). The hero photo tilts slightly toward the
   pointer on fine-pointer devices. Both honour reduced-motion.
===================================================== */
(function () {
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---- scroll reveal ---- */
    var items = Array.prototype.slice.call(document.querySelectorAll('.bc-reveal'));
    if (items.length && !reduced && 'IntersectionObserver' in window) {
        items.forEach(function (el) { el.classList.add('is-armed'); });
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                var i = parseInt(e.target.style.getPropertyValue('--i'), 10) || 0;
                setTimeout(function () { e.target.classList.add('is-in'); }, i * 80);
                io.unobserve(e.target);
            });
        }, { threshold: 0.18, rootMargin: '0px 0px -8% 0px' });
        items.forEach(function (el) { io.observe(el); });
    }

    /* ---- hero frame pointer tilt (fine pointers only) ---- */
    var tilt = document.querySelector('[data-bc-tilt]');
    var frame = tilt && tilt.querySelector('.bc-frame');
    if (frame && !reduced && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        frame.style.transition = 'transform .3s ease';
        frame.style.willChange = 'transform';
        tilt.addEventListener('pointermove', function (e) {
            var r = tilt.getBoundingClientRect();
            var px = (e.clientX - r.left) / r.width - 0.5;
            var py = (e.clientY - r.top) / r.height - 0.5;
            frame.style.transform = 'perspective(900px) rotateX(' + (-py * 4).toFixed(2) + 'deg) rotateY(' + (px * 5).toFixed(2) + 'deg)';
        });
        tilt.addEventListener('pointerleave', function () {
            frame.style.transform = '';
        });
    }
}());
</script>
@endif

<script>
/* =====================================================
   BRAND STATS — count-up + journey reveal
   Stat numbers count from 0 (keeping their prefix/suffix
   and thousands grouping, e.g. "30,000+"); the journey
   rail draws and its steps rise in sequence. Both fire
   once, when scrolled into view. Reduced motion → static.
===================================================== */
(function () {
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---- stat count-up ---- */
    var statsSec = document.querySelector('.bz-stats');
    if (statsSec) {
        var parsed = Array.prototype.slice
            .call(statsSec.querySelectorAll('.bz-stat strong'))
            .map(function (el) {
                var raw = el.textContent.trim();
                var m   = raw.match(/[\d.,]*\d/);           /* first number run */
                if (!m) return null;
                var numStr = m[0];
                var target = parseFloat(numStr.replace(/,/g, ''));
                if (!isFinite(target)) return null;
                return {
                    el:      el,
                    target:  target,
                    prefix:  raw.slice(0, m.index),
                    suffix:  raw.slice(m.index + numStr.length),
                    grouped: numStr.indexOf(',') !== -1 || target >= 1000
                };
            })
            .filter(Boolean);

        var fmt = function (p, v) {
            var n = p.grouped ? Math.floor(v).toLocaleString('en-US') : String(Math.floor(v));
            return p.prefix + n + p.suffix;
        };

        var runCount = function () {
            parsed.forEach(function (p) {
                if (reduce) { p.el.textContent = fmt(p, p.target); return; }
                var dur = p.target > 1000 ? 1900 : 1300;
                var t0  = performance.now();
                (function tick(now) {
                    var prog  = Math.min((now - t0) / dur, 1);
                    var eased = 1 - Math.pow(1 - prog, 3);
                    p.el.textContent = fmt(p, eased * p.target);
                    if (prog < 1) requestAnimationFrame(tick);
                    else p.el.textContent = fmt(p, p.target);
                })(performance.now());
            });
        };

        if (!reduce) parsed.forEach(function (p) { p.el.textContent = fmt(p, 0); });

        if ('IntersectionObserver' in window && !reduce) {
            var io1 = new IntersectionObserver(function (entries) {
                if (!entries[0].isIntersecting) return;
                runCount();
                io1.disconnect();
            }, { threshold: 0.3 });
            io1.observe(statsSec);
        } else {
            runCount();
        }
    }

    /* ---- journey — a marker circle travels farm → global market ---- */
    var journey = document.querySelector('.bz-journey');
    if (journey) {
        var steps  = Array.prototype.slice.call(journey.querySelectorAll('li'));
        var marker = document.createElement('span');
        var fill   = document.createElement('span');
        marker.className = 'bz-journey-marker';
        fill.className   = 'bz-journey-fill';
        marker.setAttribute('aria-hidden', 'true');
        fill.setAttribute('aria-hidden', 'true');
        journey.appendChild(fill);
        journey.appendChild(marker);

        var centerX = function (li) {
            var dot = li.querySelector('.bz-journey-dot');
            var jr  = journey.getBoundingClientRect();
            var dr  = dot.getBoundingClientRect();
            return (dr.left - jr.left) + dr.width / 2;
        };

        var placeAt = function (x) {
            marker.style.transform = 'translateX(' + x + 'px)';
            fill.style.width = x + 'px';
        };

        var idx = 0;
        var advance = function () {
            if (idx >= steps.length) return;
            placeAt(centerX(steps[idx]));
            steps[idx].classList.add('is-active');
            idx++;
            if (idx < steps.length) setTimeout(advance, 620);
        };

        var start = function () {
            journey.classList.add('is-in');

            if (reduce || steps.length === 0) {
                steps.forEach(function (s) { s.classList.add('is-active'); });
                if (steps.length) placeAt(centerX(steps[steps.length - 1]));
                return;
            }

            /* seat the marker on step 1 without a glide, then travel */
            marker.style.transition = 'none';
            placeAt(centerX(steps[0]));
            steps[0].classList.add('is-active');
            requestAnimationFrame(function () {
                requestAnimationFrame(function () {
                    marker.style.transition = '';
                    idx = 1;
                    advance();
                });
            });
        };

        if ('IntersectionObserver' in window && !reduce) {
            var io2 = new IntersectionObserver(function (entries) {
                if (!entries[0].isIntersecting) return;
                start();
                io2.disconnect();
            }, { threshold: 0.35 });
            io2.observe(journey);
        } else {
            start();
        }

        /* keep the marker seated on the last reached step on resize */
        window.addEventListener('resize', function () {
            var active = journey.querySelectorAll('li.is-active');
            if (active.length) placeAt(centerX(active[active.length - 1]));
        });
    }
}());
</script>

@if ($brandSlug === 'romina-imports' && !empty($brand['import_brands']))
<script>
/* Romina Imports brands */
(function () {
    var section = document.getElementById('rib-brands');
    if (!section) return;

    var cluster = section.querySelector('.rib-cluster');
    var badges  = Array.prototype.slice.call(section.querySelectorAll('.rib-badge'));
    var chips   = Array.prototype.slice.call(section.querySelectorAll('.rib-chip'));
    var clear   = section.querySelector('.rib-clear');
    if (!cluster || !badges.length) return;

    /* ---- entrance reveal ---- */
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                section.classList.add('rib-in');
                io.unobserve(e.target);
            });
        }, { threshold: 0.2 });
        io.observe(cluster);
    } else {
        section.classList.add('rib-in');
    }

    /* ---- category filter ---- */
    var active = [];

    function apply() {
        var filtering = active.length > 0;
        cluster.classList.toggle('rib-filtering', filtering);
        badges.forEach(function (b) {
            var match = !filtering || active.indexOf(b.getAttribute('data-cat')) !== -1;
            b.classList.toggle('rib-match', filtering && match);
            b.classList.toggle('rib-dim', filtering && !match);
        });
        if (clear) clear.hidden = !filtering;
    }

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            var cat = chip.getAttribute('data-cat');
            var on  = chip.getAttribute('aria-pressed') === 'true';
            chip.setAttribute('aria-pressed', on ? 'false' : 'true');
            if (on) { active = active.filter(function (c) { return c !== cat; }); }
            else if (active.indexOf(cat) === -1) { active.push(cat); }
            apply();

            if (window.matchMedia('(max-width: 640px)').matches) {
                var badge = badges.find(function (b) {
                    return b.getAttribute('data-cat') === cat;
                });
                if (badge) {
                    badge.focus({ preventScroll: true });
                    var badgeRect = badge.getBoundingClientRect();
                    var clusterRect = cluster.getBoundingClientRect();
                    var targetLeft = cluster.scrollLeft + badgeRect.left - clusterRect.left
                        - (cluster.clientWidth - badgeRect.width) / 2;
                    cluster.scrollTo({
                        left: targetLeft,
                        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
                    });
                }
            }
        });
    });

    if (clear) {
        clear.addEventListener('click', function () {
            active = [];
            chips.forEach(function (c) { c.setAttribute('aria-pressed', 'false'); });
            apply();
        });
    }
})();
</script>
@endif
@endsection
