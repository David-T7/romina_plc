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
@endphp

@section('page-content')

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
                    <a href="tel:{{ $tel }}" class="story-btn story-btn--solid">
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

            <div class="bz-hero-badge">
                <strong>{{ $brand['badge']['value'] }}</strong>
                <span>{{ $brand['badge']['label'] }}</span>
            </div>
        </div>

    </div>

</section>


{{-- ============ OVERVIEW ============ --}}
<section class="bz-overview" id="bz-overview">
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
<section class="bz-highlights">
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


{{-- ============ GALLERY — photo mosaic + lightbox ============
     Tiles come from $gallery (see PagesController::businessGallery):
     drop photos into public/images/gallery/{slug}/ to add more. --}}
@php
    $tileCount  = count($gallery);
    $photoCount = count(array_filter($gallery, function ($g) { return !empty($g['src']); }));
@endphp
<section class="bz-gallery">
    <div class="container">

        <div class="bz-gallery-head">
            <div class="bz-section-head">
                <span class="bz-label">Gallery</span>
                <h2>A closer look.</h2>
            </div>
            @if ($photoCount)
                <p class="bz-gallery-hint">
                    <i class="fa-regular fa-images" aria-hidden="true"></i>
                    {{ $photoCount }} {{ $photoCount === 1 ? 'photo' : 'photos' }} · click to enlarge
                </p>
            @endif
        </div>

        <ul class="bz-mosaic">
            @foreach ($gallery as $i => $shot)
                <li class="bz-tile{{ $shot['src'] ? '' : ' bz-tile--ph' }}">

                    @if ($shot['src'])
                        <button type="button" class="bz-tile-btn"
                                data-full="{{ asset($shot['src']) }}"
                                data-caption="{{ $shot['caption'] }}"
                                aria-label="Enlarge photo: {{ $shot['caption'] }}">
                            <img src="{{ asset($shot['src']) }}" alt="{{ $shot['shot'] }}" loading="lazy">
                            <span class="bz-tile-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span>
                            <span class="bz-tile-overlay" aria-hidden="true">
                                <span class="bz-tile-index">{{ sprintf('%02d', $i + 1) }} / {{ sprintf('%02d', $tileCount) }}</span>
                                <span class="bz-tile-caption">{{ $shot['caption'] }}</span>
                                @if ($shot['shot'] !== $shot['caption'])
                                    <span class="bz-tile-shot">{{ $shot['shot'] }}</span>
                                @endif
                            </span>
                        </button>
                    @else
                        <div class="bz-ph">
                            <span class="bz-ph-note"><i class="fa-regular fa-image" aria-hidden="true"></i> Photo coming soon</span>
                            <span class="bz-ph-shot">{{ $shot['shot'] }}</span>
                            <span class="bz-tile-caption">{{ $shot['caption'] }}</span>
                        </div>
                    @endif

                </li>
            @endforeach
        </ul>

    </div>
</section>

{{-- Lightbox (one per page, filled by JS) --}}
<div class="bz-lightbox" id="bzLightbox" role="dialog" aria-modal="true" aria-label="Photo viewer" hidden>
    <button type="button" class="bz-lb-btn bz-lb-close" aria-label="Close photo viewer"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
    <button type="button" class="bz-lb-btn bz-lb-prev" aria-label="Previous photo"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
    <figure class="bz-lb-figure">
        <img class="bz-lb-img" src="" alt="">
        <figcaption class="bz-lb-caption">
            <span class="bz-lb-count"></span>
            <span class="bz-lb-text"></span>
        </figcaption>
    </figure>
    <button type="button" class="bz-lb-btn bz-lb-next" aria-label="Next photo"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
</div>


{{-- ============ LOCATIONS ============ --}}
@if (!empty($brand['locations']))
<section class="bz-locations" id="bz-locations">
    <div class="container">

        <div class="bz-section-head">
            <span class="bz-label">{{ $brand['locations_label'] }}</span>
            <h2>{{ $brand['locations_title'] ?? (count($brand['locations']) === 1 ? 'One address, worth the trip.' : 'Our Locations') }}</h2>
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
    $importBrands = $brand['import_brands'];
    $importCats   = array_values(array_unique(array_map(fn ($b) => $b['category'], $importBrands)));

    // Hex "molecule" grid — rows of 3 / 3 / 2, alternating half-step offset.
    // Positions are expressed in diameters (D); CSS multiplies by --sz.
    $rows  = [3, 3, 2];
    $hStep = 0.96;   // horizontal step  (× D)
    $vStep = 0.84;   // vertical step    (× D)
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

            <a href="{{ $home }}#contact" class="rib-viewall">
                View all brands
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>

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
                       aria-label="{{ $b['name'] }} — {{ $b['category'] }}">
                @else
                    <button type="button" class="rib-badge" role="listitem" data-cat="{{ $b['category'] }}"
                            style="{{ $vars }}"
                            aria-label="{{ $b['name'] }} — {{ $b['category'] }}">
                @endif
                    <span class="rib-badge-face">
                        @if (!empty($b['logo']))
                            <img src="{{ asset($b['logo']) }}" alt="{{ $b['name'] }}" loading="lazy">
                        @else
                            <span class="rib-badge-name">{{ $b['name'] }}</span>
                        @endif
                    </span>
                    <span class="rib-badge-tip" aria-hidden="true">{{ $b['name'] }}</span>
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

@endsection

<<<<<<< HEAD

@section('page-js')
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

    function open(i) {
        opener = tiles[i];
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
@endsection
=======
@if ($brandSlug === 'romina-imports' && !empty($brand['import_brands']))
@section('page-js')
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
@endsection
@endif
>>>>>>> 1ac4de82b39c3f2be7499ca19e8efff5e39a4bd4
