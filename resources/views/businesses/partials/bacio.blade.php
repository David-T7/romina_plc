{{-- =====================================================
     BACIO CREMERIA — brand page (styles: public/css/bacio.css)
     Follows the Bacio brand guideline (Lama Kaddura, 2020):
       · palette   blue #0075A7, magenta, yellow #FDC937, peach #FAC2A3,
                   mint, light grey, white (logo sampled for exact values)
       · type      geometric sans (Champagne & Limousines; Josefin Sans fallback)
       · motifs    "melting sweet cream" blobs, layered flavours, sprinkles,
                   dot fields and the diamond mark from the logo
     All copy and photos come from config/businesses.php (no invented facts).
     Gallery + lightbox are the shared partial; photo buttons here open it.
===================================================== --}}
@php
    $bacioPhotos = array_values(array_filter($brand['gallery'] ?? [], fn ($p) => !empty($p['src'])));
    $bacioByFile = collect($bacioPhotos)->keyBy('src');
    $heroMain    = $bacioByFile['images/bacio/gelato-counter.webp'] ?? $bacioPhotos[0];
    $heroSide    = $bacioByFile['images/bacio/gelato-plate.webp']   ?? ($bacioPhotos[1] ?? $bacioPhotos[0]);

    // brand colours, cycled for the diamond markers
    $bacioTones  = ['blue', 'magenta', 'yellow', 'peach', 'mint'];

    // responsive candidates (the -240 / -360 variants sit next to each photo)
    $bacioSrcset = function ($src) {
        $set = [];
        foreach ([240, 360] as $w) {
            $v = preg_replace('/\.webp$/', '-' . $w . '.webp', $src);
            if (is_file(public_path($v))) $set[] = asset($v) . ' ' . $w . 'w';
        }
        [$w0] = getimagesize(public_path($src));
        $set[] = asset($src) . ' ' . $w0 . 'w';
        return implode(', ', $set);
    };
    $bacioSize = function ($src) { [$w, $h] = getimagesize(public_path($src)); return ['w' => $w, 'h' => $h]; };
    $hm = $bacioSize($heroMain['src']);
    $hs = $bacioSize($heroSide['src']);

    // melting-cream outlines (decorative SVG paths, viewBox 0 0 600 600)
    $meltA = 'M120 40c70-38 170-20 236 10 62 28 92 6 150 34 58 28 80 96 62 156-14 46-58 64-52 118 8 66 74 96 50 168-26 78-118 82-182 58-52-20-74 18-128 30-70 16-144-18-176-80-28-54 10-92-2-150C64 330 4 300 8 226 12 152 54 76 120 40z';
    $meltB = 'M84 92c58-62 148-70 214-36 50 26 78-8 138 4 74 16 120 84 108 156-10 58-60 72-56 122 6 70 50 108 16 170-34 62-118 60-176 44-46-12-70 26-124 22-78-6-140-66-150-138-8-58 34-86 22-138C64 248 30 154 84 92z';
@endphp

<div class="bacio" data-bacio>

{{-- ============ HERO — editorial split: logo + words left, layered photos right ============ --}}
<section class="bacio-hero" aria-labelledby="bacioTitle">

    <svg class="bacio-hero-melt" viewBox="0 0 600 600" aria-hidden="true" focusable="false">
        <path d="{{ $meltA }}" />
    </svg>
    <span class="bacio-dots bacio-dots--hero" aria-hidden="true"></span>

    <div class="bacio-wrap bacio-hero-grid">

        <div class="bacio-hero-copy">
            <nav class="bacio-crumbs" aria-label="Breadcrumb">
                <a href="{{ $home }}">Home</a>
                <span aria-hidden="true">/</span>
                <a href="{{ $home }}#brands">Businesses</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">{{ $brand['menu'] }}</span>
            </nav>

            <img class="bacio-logo" src="{{ asset('images/brands/logos/bacio.png') }}"
                 alt="Bacio Cremeria" width="176" height="65" fetchpriority="high">

            <p class="bacio-kicker">{{ $brand['kicker'] }}</p>

            <h1 id="bacioTitle" class="bacio-display">
                A Little Scoop.
                <span>A Lot of Joy.</span>
            </h1>

            <p class="bacio-lead">{{ $brand['intro'] }}</p>

            <div class="bacio-actions">
                <a class="bacio-btn" href="#bacio-menu">Explore the menu</a>
                <a class="bacio-link" href="#bz-locations">Find your Bacio <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="bacio-hero-stage">
            <figure class="bacio-frame bacio-frame--main" data-bacio-reveal>
                <button type="button" class="bacio-image-btn" aria-haspopup="dialog" aria-controls="bzLightbox">
                    <img src="{{ asset($heroMain['src']) }}" srcset="{{ $bacioSrcset($heroMain['src']) }}"
                         sizes="(max-width: 700px) 62vw, 340px"
                         width="{{ $hm['w'] }}" height="{{ $hm['h'] }}"
                         alt="{{ $heroMain['shot'] }}" fetchpriority="high" decoding="async">
                </button>
            </figure>

            <figure class="bacio-frame bacio-frame--side" data-bacio-reveal style="--d: 1">
                <button type="button" class="bacio-image-btn" aria-haspopup="dialog" aria-controls="bzLightbox">
                    <img src="{{ asset($heroSide['src']) }}" srcset="{{ $bacioSrcset($heroSide['src']) }}"
                         sizes="(max-width: 700px) 44vw, 250px"
                         width="{{ $hs['w'] }}" height="{{ $hs['h'] }}"
                         alt="{{ $heroSide['shot'] }}" decoding="async">
                </button>
            </figure>

            <span class="bacio-sprinkles bacio-sprinkles--hero" aria-hidden="true"></span>
            <span class="bacio-diamonds" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
            <span class="bacio-vertical" aria-hidden="true">CREMERIA</span>
        </div>

    </div>
</section>


{{-- ============ STORY — a quiet, text-led statement ============ --}}
<section class="bacio-story" id="bc-about" aria-labelledby="bacioStory">
    <span class="bacio-dots bacio-dots--story" aria-hidden="true"></span>

    <div class="bacio-wrap bacio-story-grid">
        <p class="bacio-label" data-bacio-reveal>About {{ $brand['menu'] }}</p>

        <h2 id="bacioStory" class="bacio-statement" data-bacio-reveal>{{ $brand['title'] }}</h2>

        <div class="bacio-story-body" data-bacio-reveal style="--d: 1">
            @foreach ($brand['body'] as $para)
                <p>{{ $para }}</p>
            @endforeach
        </div>
    </div>

    {{-- signature offerings (config highlights): a ruled row, not cards --}}
    <div class="bacio-wrap">
        <ul class="bacio-offer" aria-label="{{ $brand['highlights']['label'] }}">
            @foreach ($brand['highlights']['items'] as $item)
                <li data-bacio-reveal style="--d: {{ $loop->index }}">
                    <span class="bacio-diamond bacio-diamond--{{ $bacioTones[$loop->index % 5] }}" aria-hidden="true"></span>
                    <h3>{{ $item['name'] }}</h3>
                    @if (!empty($item['desc']))<p>{{ $item['desc'] }}</p>@endif
                </li>
            @endforeach
        </ul>
    </div>
</section>


{{-- ============ MENU — index of names; the stage shows the one in focus ============ --}}
<section class="bacio-menu" id="bacio-menu" aria-labelledby="bacioMenu" data-bacio-menu>

    <div class="bacio-wrap bacio-menu-grid">

        <div class="bacio-menu-copy">
            <p class="bacio-label">{{ $brand['highlights']['label'] }}</p>
            <h2 id="bacioMenu" class="bacio-h2">{{ $brand['highlights']['title'] }}</h2>

            <ol class="bacio-index">
                @foreach ($bacioPhotos as $photo)
                    <li class="{{ $loop->first ? 'is-on' : '' }}" data-menu-item="{{ $loop->index }}">
                        <button type="button" class="bacio-index-btn" aria-describedby="bacioMenuHint">
                            <span class="bacio-index-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <span class="bacio-diamond bacio-diamond--{{ $bacioTones[$loop->index % 5] }}" aria-hidden="true"></span>
                            <span class="bacio-index-name">{{ $photo['caption'] }}</span>
                        </button>
                        {{-- phones: the photo sits under its name --}}
                        <img class="bacio-index-thumb" src="{{ asset($photo['src']) }}"
                             srcset="{{ $bacioSrcset($photo['src']) }}" sizes="(max-width: 700px) 88vw, 1px"
                             alt="{{ $photo['shot'] }}" loading="lazy" decoding="async">
                    </li>
                @endforeach
            </ol>
            <p id="bacioMenuHint" class="bacio-sr">Shows the photo beside the list.</p>
        </div>

        <div class="bacio-menu-stage" aria-live="polite">
            <svg class="bacio-menu-melt" viewBox="0 0 600 600" aria-hidden="true" focusable="false">
                <path d="{{ $meltB }}" />
            </svg>
            @foreach ($bacioPhotos as $photo)
                @php $ps = $bacioSize($photo['src']); @endphp
                <figure class="bacio-stage-photo{{ $loop->first ? ' is-on' : '' }}" data-menu-photo="{{ $loop->index }}"
                        @unless ($loop->first) aria-hidden="true" @endunless>
                    <button type="button" class="bacio-image-btn" aria-haspopup="dialog" aria-controls="bzLightbox"
                            @unless ($loop->first) tabindex="-1" @endunless>
                        <img src="{{ asset($photo['src']) }}" srcset="{{ $bacioSrcset($photo['src']) }}"
                             sizes="360px" width="{{ $ps['w'] }}" height="{{ $ps['h'] }}"
                             alt="{{ $photo['shot'] }}" loading="lazy" decoding="async">
                    </button>
                    <figcaption>{{ $photo['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>

    </div>
</section>


{{-- ============ DAIRY — one bold blue band, the guideline's lead colour ============ --}}
<section class="bacio-dairy" aria-labelledby="bacioDairy">
    <svg class="bacio-dairy-edge" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true" focusable="false">
        <path d="M0 120V64c120-40 240-58 360-30s210 70 330 52 190-78 330-80 250 46 420 30V120z" />
    </svg>
    <span class="bacio-sprinkles bacio-sprinkles--dairy" aria-hidden="true"></span>

    <div class="bacio-wrap bacio-dairy-inner">
        <p class="bacio-label bacio-label--light">Farm to Scoop</p>
        <h2 id="bacioDairy" class="bacio-h2">Fresh From Romina Dairy Farm.</h2>
        <p class="bacio-dairy-text" data-bacio-reveal>{{ $brand['dairy'] }}</p>
    </div>
</section>


{{-- ============ GALLERY — shared mosaic + lightbox, styled for Bacio ============ --}}
<div class="bacio-gallery">
    @include('businesses.partials.gallery')
</div>


{{-- ============ THE BACIO MOMENT — closing, layered melts ============ --}}
<section class="bacio-moment" aria-labelledby="bacioMoment">
    <svg class="bacio-moment-melt bacio-moment-melt--a" viewBox="0 0 600 600" aria-hidden="true" focusable="false"><path d="{{ $meltA }}" /></svg>
    <svg class="bacio-moment-melt bacio-moment-melt--b" viewBox="0 0 600 600" aria-hidden="true" focusable="false"><path d="{{ $meltB }}" /></svg>
    <span class="bacio-dots bacio-dots--moment" aria-hidden="true"></span>

    <div class="bacio-wrap bacio-moment-inner">
        <p class="bacio-label">The Bacio Moment</p>
        <h2 id="bacioMoment" class="bacio-display bacio-display--center" data-bacio-reveal>
            Good Company.
            <span>Great Ice Cream.</span>
        </h2>
        <p data-bacio-reveal style="--d: 1">{{ $brand['moment'] }}</p>
        <p data-bacio-reveal style="--d: 2">{{ $brand['closing'] }}</p>
        <div class="bacio-actions bacio-actions--center">
            <a class="bacio-btn" href="#bz-locations">Visit Bacio</a>
            @if ($brand['phone'])<a class="bacio-link" href="tel:{{ $tel }}">{{ $brand['phone'] }}</a>@endif
        </div>
    </div>
</section>

</div>{{-- /.bacio --}}

<script>
/* =====================================================
   BACIO — reveals + menu stage. Content is visible by default;
   motion is switched on only once this script runs (.bacio-js),
   and never with prefers-reduced-motion.
===================================================== */
(function () {
    var root = document.querySelector('[data-bacio]');
    if (!root) return;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* one-time entrance reveals */
    if (!reduce && 'IntersectionObserver' in window) {
        root.classList.add('bacio-js');
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.classList.add('is-in');
                io.unobserve(e.target);
            });
        }, { threshold: 0.18, rootMargin: '0px 0px -6% 0px' });
        root.querySelectorAll('[data-bacio-reveal]').forEach(function (el) { io.observe(el); });
        /* the hero is already on screen: show it straight away */
        root.querySelectorAll('.bacio-hero [data-bacio-reveal]').forEach(function (el) {
            requestAnimationFrame(function () { el.classList.add('is-in'); });
        });
    }

    /* menu: the hovered / focused name brings its photo to the stage */
    var menu = root.querySelector('[data-bacio-menu]');
    if (menu) {
        var items  = menu.querySelectorAll('[data-menu-item]');
        var photos = menu.querySelectorAll('[data-menu-photo]');
        function show(i) {
            items.forEach(function (li) { li.classList.toggle('is-on', li.dataset.menuItem === String(i)); });
            photos.forEach(function (f) {
                var on = f.dataset.menuPhoto === String(i);
                f.classList.toggle('is-on', on);
                if (on) f.removeAttribute('aria-hidden'); else f.setAttribute('aria-hidden', 'true');
                var b = f.querySelector('button');
                if (b) b.tabIndex = on ? 0 : -1;
            });
        }
        items.forEach(function (li) {
            var btn = li.querySelector('.bacio-index-btn');
            ['mouseenter', 'focus', 'click'].forEach(function (ev) {
                btn.addEventListener(ev, function () { show(li.dataset.menuItem); });
            });
        });
    }
}());
</script>
