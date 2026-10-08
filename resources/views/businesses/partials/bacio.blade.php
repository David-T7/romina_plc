{{-- =====================================================
     BACIO CREMERIA — its own page design (.bc-*), distinct from KOBA.
     Image-forward and light on text: a rectangular framed hero, a short
     About, a dairy band, a "What we make" card grid, a rectangular image
     grid and a centred close. Scroll-reveal + hover animation are wired by
     the Bacio script in show.blade.php (.bc-reveal / data hooks).
     Styles: .bz-theme--bacio block in main.css.
===================================================== --}}

@php
    $items     = $brand['highlights']['items'];
    $locations = $brand['locations'] ?? [];

    // Rectangular image grid. 'img' shows a photo (object-position via 'pos');
    // a tile without one keeps its brand-colour artwork.
    $tiles = [
        ['icon' => 'fa-bowl-food',  'label' => 'Gelato flavors',         'tone' => 'rasp',  'img' => 'images/bacio/gelato-counter.webp',   'pos' => '50% 55%'],
        ['icon' => 'fa-ice-cream',  'label' => 'Handcrafted ice creams', 'tone' => 'teal',  'img' => 'images/bacio/gelato-plate.webp',     'pos' => '50% 45%'],
        ['icon' => 'fa-wine-glass', 'label' => 'Waffles & ice cream',    'tone' => 'gold',  'img' => 'images/bacio/waffle-ice-cream.webp', 'pos' => '50% 45%'],
        ['icon' => 'fa-mug-hot',    'label' => 'Affogato',               'tone' => 'blue',  'img' => 'images/bacio/affogato.webp',         'pos' => '50% 62%'],
        ['icon' => 'fa-glass-water','label' => 'Iced coffee',            'tone' => 'peach', 'img' => 'images/bacio/iced-latte.webp',       'pos' => '50% 50%'],
        // ['icon' => 'fa-heart',      'label' => 'The Bacio moment',       'tone' => 'cream'],
    ];

    // Split a heading into animated word spans (see .bc-words).
    $words = function ($text) { return preg_split('/\s+/', trim($text)); };
@endphp


{{-- ============ HERO — deep teal, rectangular framed photo ============ --}}
<section class="bc-hero">
    <div class="container bc-hero-inner">

        <div class="bc-hero-copy">

            <nav class="page-hero-crumbs bc-crumbs" aria-label="Breadcrumb">
                <a href="{{ $home }}">Home</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <a href="{{ $home }}#businesses">Businesses</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <span aria-current="page">{{ $brand['menu'] }}</span>
            </nav>

            <span class="bc-eyebrow">{{ $brand['kicker'] }}</span>

            <h1 class="bc-hero-title">Bacio <em>Cremeria</em></h1>

            <p class="bc-hero-intro">{{ $brand['intro'] }}</p>

            <div class="bc-actions">
                <a href="#bz-locations" class="story-btn story-btn--solid">
                    Visit Bacio
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="#bc-about" class="story-btn bc-btn-ghost">
                    Discover Bacio
                    <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
                </a>
            </div>

            {{-- colour motif from the logo, kept rectangular --}}
            <ul class="bc-hero-chips" aria-hidden="true">
                <li></li><li></li><li></li><li></li><li></li>
            </ul>

        </div>

        <div class="bc-hero-media" data-bc-tilt>
            <div class="bc-frame">
                @if ($brand['image'])
                    <img src="{{ asset($brand['image']) }}" alt="Bacio Cremeria handcrafted gelato">
                @else
                    {{-- TODO: client photos --}}
                    <div class="bz-ph bz-ph--hero">
                        <span class="bz-ph-note"><i class="fa-regular fa-image" aria-hidden="true"></i> Photo coming soon</span>
                        <span class="bz-ph-shot">{{ $brand['image_shot'] ?? '' }}</span>
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>


{{-- ============ ABOUT — cream, short ============ --}}
<section class="bc-about" id="bc-about">
    <div class="container bc-about-grid">

        <div class="bc-about-head">
            <span class="bc-label bc-reveal">About {{ $brand['menu'] }}</span>
            <h2 class="bc-section-h2 bc-reveal bc-words">@foreach ($words($brand['title']) as $wi => $w)<span class="bc-w" style="--wi: {{ $wi }}">{{ $w }}</span> @endforeach</h2>
        </div>

        <div class="bc-about-body bc-reveal" style="--i: 1">
            @foreach ($brand['body'] as $para)
                <p>{{ $para }}</p>
            @endforeach
        </div>

    </div>
</section>


{{-- ============ FRESH FROM ROMINA DAIRY FARM — teal band ============ --}}
<section class="bc-dairy">
    <div class="container bc-dairy-grid bc-reveal">
        <span class="bc-dairy-icon" aria-hidden="true"><i class="fa-solid fa-cow"></i></span>
        <div>
            <span class="bc-label">Fresh from Romina Dairy Farm</span>
            <p class="bc-dairy-text">{{ $brand['dairy'] }}</p>
        </div>
    </div>
</section>


{{-- ============ WHAT WE MAKE — rectangular card grid ============ --}}
<section class="bc-make">
    <div class="container">

        <div class="bc-make-head">
            <span class="bc-label bc-reveal">{{ $brand['highlights']['label'] }}</span>
            <h2 class="bc-section-h2 bc-reveal bc-words">@foreach ($words($brand['highlights']['title']) as $wi => $w)<span class="bc-w" style="--wi: {{ $wi }}">{{ $w }}</span> @endforeach</h2>
        </div>

        <ul class="bc-make-grid">
            @foreach ($items as $item)
                <li class="bc-make-card bc-reveal" style="--i: {{ $loop->index }}">
                    <span class="bc-make-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <span class="bc-make-icon" aria-hidden="true"><i class="fa-solid {{ $item['icon'] }}"></i></span>
                    <h3>{{ $item['name'] }}</h3>
                    @if (!empty($item['desc']))
                        <p>{{ $item['desc'] }}</p>
                    @endif
                </li>
            @endforeach
        </ul>

    </div>
</section>


{{-- ============ IMAGE GRID — rectangular tiles ============ --}}
<section class="bc-gallery">
    <div class="container">

        <div class="bc-make-head">
            <span class="bc-label bc-reveal">A closer look</span>
            <h2 class="bc-section-h2 bc-reveal bc-words">@foreach ($words('Moments, flavors & craft.') as $wi => $w)<span class="bc-w" style="--wi: {{ $wi }}">{{ $w }}</span> @endforeach</h2>
        </div>

        <div class="bc-gallery-grid">
            @foreach ($tiles as $tile)
                <figure class="bc-tile bc-tile--{{ $tile['tone'] }} bc-reveal"
                        style="--i: {{ $loop->index }}">
                    @if (!empty($tile['img']))
                        <img class="bc-tile-img" src="{{ asset($tile['img']) }}" alt="{{ $tile['label'] }} at Bacio Cremeria"
                             loading="lazy" decoding="async" style="object-position: {{ $tile['pos'] ?? '50% 50%' }}">
                    @else
                        <span class="bc-tile-art" aria-hidden="true">
                            <i class="fa-solid {{ $tile['icon'] }}"></i>
                        </span>
                    @endif
                    <figcaption class="bc-tile-cap">
                        <span>{{ $tile['label'] }}</span>
                    </figcaption>
                </figure>
            @endforeach
        </div>

    </div>
</section>


{{-- ============ THE BACIO MOMENT — teal, centred close ============ --}}
<section class="bc-moment">
    <div class="container bc-moment-inner bc-reveal">
        <span class="bc-label">The Bacio Moment</span>
        <p class="bc-moment-lead">{{ $brand['moment'] }}</p>
        <p class="bc-moment-cta">{{ $brand['closing'] }}</p>
        <div class="bc-actions">
            <a href="#bz-locations" class="story-btn story-btn--solid">
                Visit Bacio
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
