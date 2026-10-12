{{-- =====================================================
     JAQUAR WORLD ADDIS ABABA — brand page (styles: public/css/jaquar.css)
     Retail layout in the spirit of large lighting / bath showrooms online:
     lifestyle hero, brand band, shop-by-category icons, featured collections,
     a wellness banner, the story, and a filterable photo gallery.
     Colours from the Jaquar logo (#156579) and brand banner teal (#0B6D76);
     the category icons follow Jaquar's thin grey line-icon style.
     Copy comes from config/businesses.php; captions describe each photo.
===================================================== --}}
@php
    $jqImg = fn ($f) => 'images/jaquar/' . $f . '.webp';
    $jqTel = !empty($brand['phone']) ? preg_replace('/[^0-9+]/', '', $brand['phone']) : null;

    // category key => label, icon (inline SVG path data, 64x64, stroke only)
    $jqCats = [
        'faucets'    => ['Faucets',           '<path d="M22 54V24c0-5 4-9 9-9h3"/><path d="M34 13h8a3 3 0 0 1 3 3v1H34z"/><path d="M22 30h-6c-3 0-5 2-5 5v2"/><path d="M18 54h10"/><path d="M45 17h4"/>'],
        'sanitary'   => ['Sanitaryware',      '<rect x="20" y="8" width="24" height="16" rx="2"/><path d="M28 12h8"/><path d="M14 30h36c0 9-6 15-14 16l2 10H26l2-10c-8-1-14-7-14-16z"/><path d="M14 30c0-3 2-6 6-6h24c4 0 6 3 6 6"/>'],
        'bathtubs'   => ['Bathtubs',          '<rect x="24" y="8" width="16" height="9" rx="2"/><circle cx="29" cy="12.5" r="2"/><circle cx="35" cy="12.5" r="2"/><path d="M8 32h48"/><path d="M10 32v6c0 6 5 10 11 10h22c6 0 11-4 11-10v-6"/><path d="M16 48l-2 6M48 48l2 6"/>'],
        'showers'    => ['Showers',           '<path d="M44 58V14c0-4-3-7-7-7h-6c-4 0-7 3-7 7v3"/><path d="M17 17h14v4H17z"/><circle cx="18" cy="27" r="1.6"/><circle cx="24" cy="27" r="1.6"/><circle cx="30" cy="27" r="1.6"/><circle cx="18" cy="33" r="1.6"/><circle cx="24" cy="33" r="1.6"/><circle cx="30" cy="33" r="1.6"/><circle cx="18" cy="39" r="1.6"/><circle cx="24" cy="39" r="1.6"/><circle cx="30" cy="39" r="1.6"/>'],
        'enclosures' => ['Shower Enclosures', '<rect x="16" y="6" width="32" height="52" rx="1.5"/><path d="M14 58h36"/><path d="M32 10v44"/><rect x="20" y="10" width="9" height="44"/><path d="M27 30v6"/><circle cx="40" cy="16" r="2.4"/><circle cx="40" cy="23" r="2.4"/>'],
        'heaters'    => ['Water Heaters',     '<rect x="20" y="6" width="24" height="46" rx="10"/><circle cx="32" cy="20" r="1.6"/><circle cx="32" cy="40" r="4"/><circle cx="32" cy="40" r="1.2"/><path d="M27 52v5M37 52v5"/>'],
        'lighting'   => ['Lighting',          '<path d="M24 38c-4-3-6-7-6-12a14 14 0 0 1 28 0c0 5-2 9-6 12v6H24z"/><path d="M25 48h14M27 52h10M30 56h4"/><path d="M32 4v4M14 10l3 3M50 10l-3 3M8 26h4M52 26h4M12 40l3-2M52 40l-3-2"/>'],
    ];

    // gallery: [file, category, caption, description]
    $jqPhotos = [
        ['faucet-chrome-arc',      'faucets',    'Chrome Arc Faucet',        'A curved chrome faucet on a round basin, rose gold models behind'],
        ['vanity-twin-arches',     'sanitary',   'Twin Basin Vanity',        'Two vessel basins below arched mirrors on a slatted wall'],
        ['bath-freestanding',      'bathtubs',   'Freestanding Bathtub',     'A freestanding bathtub with a floor-mounted filler'],
        ['light-copper-ring',      'lighting',   'Copper Ring Chandelier',   'A copper ring chandelier lit above the showroom'],
        ['shower-rain-set',        'showers',    'Rain Shower Set',          'An overhead rain shower with a hand shower on a marble wall'],
        ['heater-wall',            'heaters',    'Water Heater Range',       'A wall of Jaquar water heaters in vertical, compact and horizontal sizes'],
        ['enclosure-corner',       'enclosures', 'Corner Shower Enclosure',  'A black-framed glass corner enclosure with a shower column'],
        ['faucet-rose-gold',       'faucets',    'Rose Gold Faucet',         'A rose gold faucet over a round basin'],
        ['smart-toilet',           'sanitary',   'Smart Toilet',             'A wall-hung smart toilet with the lid open'],
        ['light-ribbon-pendant',   'lighting',   'Ribbon Pendant',           'A pendant of twisted copper ribbons, lit from within'],
        ['spa-hot-tub-jets',       'wellness',   'Spa With Jets',            'An outdoor spa with water jets running'],
        ['bath-whirlpool',         'bathtubs',   'Whirlpool Bathtub',        'A whirlpool bathtub with headrests and jets'],
        ['faucet-sculptural',      'faucets',    'Sculptural Faucet',        'A sculptural rose gold faucet with a curved spout'],
        ['shower-rainjoy-ceiling', 'showers',    'Rainjoy Ceiling Shower',   'A ceiling-mounted Rainjoy shower with coloured light'],
        ['toilet-matte-black',     'sanitary',   'Matte Black Toilet',       'A matte black toilet against a walnut wall'],
        ['light-crystal-chandelier','lighting',  'Crystal Chandelier',       'A tiered crystal chandelier'],
        ['sauna-cabin',            'wellness',   'Sauna Cabin',              'A wooden sauna cabin with a glass door'],
        ['heater-compact',         'heaters',    'Compact Water Heater',     'A compact square water heater with a blue control dial'],
        ['basin-matte-black',      'sanitary',   'Matte Black Basin',        'A matte black basin on a dark stone counter'],
        ['faucet-vessel-basin',    'faucets',    'Faucet & Vessel Basin',    'Water running from a chrome faucet into a vessel basin'],
        ['enclosure-frameless',    'enclosures', 'Frameless Shower Enclosure','A frameless glass shower enclosure with a towel bar'],
        ['suite-teal',             'bathtubs',   'Bathtub & Vanity Suite',   'A bathtub and vanity set against a teal wall'],
        ['light-crystal-ring',     'lighting',   'Crystal Ring Pendant',     'A ring of crystals suspended from the ceiling'],
        ['shower-panel',           'showers',    'Shower Panel',             'A stainless steel shower panel with body jets'],
        ['toilet-wall-hung',       'sanitary',   'Wall-Hung Toilet',         'A wall-hung toilet and health faucet on a teal wall'],
        ['heater-horizontal',      'heaters',    'Horizontal Water Heater',  'A horizontal water heater with a digital display'],
        ['light-outdoor-wall',     'lighting',   'Outdoor Wall Lights',      'Outdoor wall lights and garden bollards on display'],
        ['basin-wood-vanity',      'sanitary',   'Basin on a Wood Vanity',   'A white vessel basin on a curved walnut vanity'],
        ['faucet-in-use',          'faucets',    'Hands Under the Faucet',   'Hands rinsing under a chrome faucet'],
        ['shower-concealed',       'showers',    'Concealed Shower',         'A concealed shower with an overhead rain head and hand shower'],
        ['light-glass-pendant',    'lighting',   'Glass Pendant',            'A glass pendant with a copper mesh shade'],
        ['sauna-cabin-wood',       'wellness',   'Sauna Cabin Door',         'The glazed door of a wooden sauna cabin'],
        ['basin-vessel',           'sanitary',   'Vessel Basin',             'A soft-edged vessel basin with a tall faucet'],
        ['heater-vertical',        'heaters',    'Vertical Water Heater',    'A vertical water heater with a digital control panel'],
        ['light-crystal-flush',    'lighting',   'Crystal Ceiling Light',    'A crystal flush-mount ceiling light'],
        ['basin-wall-mixer',       'faucets',    'Wall-Mounted Mixer',       'A round vessel basin under a wall-mounted mixer'],
        ['basin-marble-wall',      'sanitary',   'Wall-Hung Basin',          'A wall-hung basin on blue marble'],
        ['light-bollard',          'lighting',   'Garden Bollard',           'A garden bollard light beside white pebbles'],
        ['bath-slipper-angle',     'bathtubs',   'Slipper Bathtub',          'A slipper bathtub on a timber plinth with a sheepskin rug'],
    ];
    $jqFirst = 12;   // photos shown before "View all"

    $jqCount = collect($jqPhotos)->countBy(fn ($p) => $p[1]);

    $jqFeatured = [
        ['bath-oval',              'bathtubs', 'Bathing',  'Freestanding, slipper and whirlpool bathtubs.'],
        ['spa-hot-tub',            'wellness', 'Wellness', 'Rainjoy showers, spas and sauna cabins.'],
        ['light-copper-ring-wide', 'lighting', 'Lighting', 'Chandeliers, pendants, wall and garden lights.'],
    ];
@endphp

{{-- ============ BRAND BAND — tagline + facts (Jaquar banner teal) ============ --}}
<section class="jq-band" aria-label="Jaquar World at a glance">
    <div class="jq-wrap jq-band-inner">
        <p class="jq-band-tag">Refine Your Bath. Brighten Your Life. Elevate Your Style.</p>
        <ul class="jq-band-facts">
            @foreach ($brand['facts'] as $f)
                <li><strong>{{ $f['value'] }}</strong><span>{{ $f['label'] }}</span></li>
            @endforeach
        </ul>
    </div>
</section>

{{-- ============ SHOP BY CATEGORY — line icons; each filters the gallery ============ --}}
<section class="jq-cats" aria-labelledby="jqCatsTitle">
    <div class="jq-wrap">
        <header class="jq-head jq-head--center">
            <p class="jq-eyebrow">{{ $brand['highlights']['label'] }}</p>
            <h2 id="jqCatsTitle">Shop by Category</h2>
        </header>
        <ul class="jq-cat-grid">
            @foreach ($jqCats as $key => [$label, $icon])
                <li>
                    <a href="#jq-gallery" class="jq-cat" data-jq-filter="{{ $key }}">
                        <svg class="jq-cat-icon" viewBox="0 0 64 64" aria-hidden="true" focusable="false">{!! $icon !!}</svg>
                        <span class="jq-cat-name">{{ $label }}</span>
                        <span class="jq-cat-count">{{ $jqCount[$key] ?? 0 }} photos</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- ============ FEATURED COLLECTIONS — large image tiles ============ --}}
<section class="jq-feature" aria-labelledby="jqFeatureTitle">
    <div class="jq-wrap">
        <header class="jq-head">
            <p class="jq-eyebrow">In Our Showrooms</p>
            <h2 id="jqFeatureTitle">{{ $brand['highlights']['title'] }}</h2>
        </header>
        <div class="jq-feature-grid">
            @foreach ($jqFeatured as [$file, $cat, $label, $text])
                <a href="#jq-gallery" class="jq-feature-tile" data-jq-filter="{{ $cat }}">
                    <img src="{{ asset($jqImg($file)) }}" alt="" loading="lazy" decoding="async">
                    <span class="jq-feature-copy">
                        <strong>{{ $label }}</strong>
                        <span>{{ $text }}</span>
                        <em>View photos <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></em>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ WELLNESS BANNER — Rainjoy display ============ --}}
<section class="jq-promo" aria-labelledby="jqPromoTitle">
    <div class="jq-wrap jq-promo-inner">
        <div class="jq-promo-copy">
            <p class="jq-eyebrow jq-eyebrow--light">Wellness Technology</p>
            <h2 id="jqPromoTitle">Rainjoy Showers, on Display.</h2>
            <p>Step into the Rainjoy shower display at our showroom and see the overhead rain, light and spray settings for yourself.</p>
            <a href="#jq-gallery" class="jq-btn jq-btn--light" data-jq-filter="showers">See the Showers</a>
        </div>
        <figure class="jq-promo-img">
            <img src="{{ asset($jqImg('rainjoy-wall')) }}" alt="The Rainjoy wellness shower display in the showroom" loading="lazy" decoding="async">
        </figure>
    </div>
</section>

{{-- ============ ABOUT — story + brand wall ============ --}}
<section class="jq-about" id="bz-overview" aria-labelledby="jqAboutTitle">
    <div class="jq-wrap jq-about-grid">
        <figure class="jq-about-img">
            <img src="{{ asset($jqImg('brand-wall')) }}" alt="The Jaquar brand wall in the showroom: complete bathroom and lighting solutions" loading="lazy" decoding="async">
        </figure>
        <div class="jq-about-copy">
            <p class="jq-eyebrow">About {{ $brand['name'] }}</p>
            <h2 id="jqAboutTitle">{{ $brand['title'] }}</h2>
            @foreach ($brand['body'] as $para)
                <p>{{ $para }}</p>
            @endforeach
            <ul class="jq-about-brands" aria-label="Brands">
                <li>Artize</li>
                <li>Jaquar Premium</li>
            </ul>
        </div>
    </div>
</section>

{{-- ============ GALLERY — editorial mosaic (KOBA / Romina pattern) + filters ============ --}}
<section class="jq-gallery" id="jq-gallery" aria-labelledby="jqGalleryTitle" data-jq-gallery>
    <div class="jq-wrap">
        <header class="jq-gallery-head">
            <div>
                <p class="jq-eyebrow">Gallery</p>
                <h2 id="jqGalleryTitle">A Closer Look.</h2>
            </div>
            <p>Inside our showrooms, category by category.<br>{{ count($jqPhotos) }} photographs; select to enlarge</p>
        </header>

        <div class="jq-filters" role="group" aria-label="Filter photos by category">
            <button type="button" class="jq-chip is-on" data-jq-chip="all" aria-pressed="true">All</button>
            @foreach ($jqCats as $key => [$label])
                <button type="button" class="jq-chip" data-jq-chip="{{ $key }}" aria-pressed="false">{{ $label }}</button>
            @endforeach
            <button type="button" class="jq-chip" data-jq-chip="wellness" aria-pressed="false">Wellness</button>
        </div>

        <ul class="jq-mosaic" id="jq-mosaic">
            @foreach ($jqPhotos as [$file, $cat, $caption, $desc])
                <li data-cat="{{ $cat }}" @if ($loop->index >= $jqFirst) data-jq-extra @endif>
                    <button type="button" class="bz-tile-btn jq-photo"
                            data-full="{{ asset($jqImg($file)) }}"
                            data-caption="{{ $caption }}"
                            aria-label="Enlarge photo: {{ $caption }}">
                        <img src="{{ asset($jqImg($file)) }}" alt="{{ $desc }}" loading="lazy" decoding="async">
                        <span class="jq-photo-caption"><span>{{ $caption }}</span><i class="fa-solid fa-expand" aria-hidden="true"></i></span>
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="jq-gallery-actions">
            <button type="button" class="jq-btn jq-btn--ghost jq-more" aria-controls="jq-mosaic" aria-expanded="false" hidden>
                View all photos <span>({{ count($jqPhotos) }})</span> <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</section>

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

<script>
/* Gallery: category filters (chips, category tiles, featured tiles), "View all",
   and mosaic slots recomputed for whichever photos are visible. */
(function () {
    var root = document.querySelector('[data-jq-gallery]');
    if (!root) return;
    var items = [].slice.call(root.querySelectorAll('.jq-mosaic li'));
    var chips = [].slice.call(root.querySelectorAll('[data-jq-chip]'));
    var more  = root.querySelector('.jq-more');
    var filter = 'all', expanded = false;

    // 12-column pattern in groups: [feature 8 + side 4] [4 4 4] [4 + feature 8] [6 6]
    var GROUPS = [[[8, 3], [4, 3]], [[4, 2], [4, 2], [4, 2]], [[4, 3], [8, 3]], [[6, 2], [6, 2]]];

    function layout() {
        var vis = items.filter(function (li) {
            var match = filter === 'all' || li.dataset.cat === filter;
            var show  = match && (filter !== 'all' || expanded || !li.hasAttribute('data-jq-extra'));
            li.hidden = !show;
            return show;
        });
        var i = 0, g = 0;
        while (i < vis.length) {
            var grp = GROUPS[g % GROUPS.length], left = vis.length - i;
            var n = Math.min(grp.length, left), rows = grp[0][1];
            for (var k = 0; k < n; k++) {
                var span = n < grp.length ? 12 / n : grp[k][0];
                var li = vis[i + k];
                li.style.gridColumn = 'span ' + span;
                li.style.gridRow = 'span ' + rows;
                li.classList.toggle('is-wide', span >= 8 || n === 1);
            }
            i += n; g++;
        }
        // phones (2 columns): one wide photo, then two rows of pairs; widen a lone last photo
        vis.forEach(function (li, k) {
            var wide = k % 5 === 0 || (k === vis.length - 1 && (k % 5) % 2 === 1);
            li.classList.toggle('m-wide', wide);
        });
        if (more) {
            var extra = items.filter(function (li) { return li.hasAttribute('data-jq-extra'); }).length;
            more.hidden = filter !== 'all' || !extra;
            more.setAttribute('aria-expanded', String(expanded));
            more.firstChild.textContent = expanded ? 'Show fewer photos ' : 'View all photos ';
            more.querySelector('span').hidden = expanded;
        }
    }

    function setFilter(f) {
        filter = f;
        chips.forEach(function (c) {
            var on = c.dataset.jqChip === f;
            c.classList.toggle('is-on', on);
            c.setAttribute('aria-pressed', String(on));
        });
        layout();
    }

    chips.forEach(function (c) { c.addEventListener('click', function () { setFilter(c.dataset.jqChip); }); });
    document.querySelectorAll('[data-jq-filter]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            e.preventDefault();
            setFilter(a.dataset.jqFilter);
            root.scrollIntoView({ behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
        });
    });
    if (more) more.addEventListener('click', function () { expanded = !expanded; layout(); });
    layout();
})();
</script>
