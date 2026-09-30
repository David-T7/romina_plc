{{-- =====================================================
     KOBA — bespoke top of the brand page (Kubo-inspired).
     Replaces the shared hero / overview / highlights; the shared
     gallery, locations, CTA and "more businesses" follow as usual.

     Scroll effects live in the "KOBA — scroll effects" script in
     businesses/show.blade.php:
       [data-kb-speed]   parallax (px per px scrolled)
       .kb-marquee       ticker whose speed/direction follow the scroll
       .kb-reveal        words light up as the statement is read
       .kb-showcase      pinned section, cards slide sideways
===================================================== --}}

@php
    // Two blob outlines with identical path structure, so SMIL can morph between them
    $blobA = 'M44.9,-58.6C57.6,-48.4,66.6,-33.8,70.9,-17.7C75.2,-1.6,74.8,15.9,67.3,29.9C59.8,43.9,45.2,54.4,29.3,61.6C13.4,68.8,-3.8,72.7,-20.9,69.2C-38,65.7,-55,54.8,-65.1,39.4C-75.2,24,-78.4,4.1,-73.6,-12.7C-68.8,-29.5,-56,-43.2,-41.4,-53.2C-26.8,-63.2,-10.4,-69.5,4.9,-75.3C20.2,-81.1,32.2,-68.8,44.9,-58.6Z';
    $blobB = 'M50.1,-62.3C63.9,-51.2,72.4,-34.6,74.5,-17.5C76.6,-0.4,72.3,17.2,63.1,31.4C53.9,45.6,39.8,56.4,23.9,64.1C8,71.8,-9.7,76.4,-26.1,71.8C-42.5,67.2,-57.6,53.4,-66.2,36.9C-74.8,20.4,-76.9,1.2,-71.1,-14.8C-65.3,-30.8,-51.6,-43.6,-37.2,-54.9C-22.8,-66.2,-7.7,-76,7.8,-77.6C23.3,-79.2,36.3,-73.4,50.1,-62.3Z';

    $items     = $brand['highlights']['items'];
    $locations = $brand['locations'] ?? [];
    $openCount = count(array_filter($locations, function ($l) { return ($l['tag'] ?? null) !== 'Coming soon'; }));
@endphp


{{-- ============ HERO — cream, morphing blob, arched photo ============ --}}
<section class="kb-hero">

    {{-- drifting background blobs --}}
    <svg class="kb-blob kb-blob--bg1" data-kb-speed="-0.12" viewBox="0 0 200 200" aria-hidden="true">
        <path transform="translate(100 100)" d="{{ $blobB }}"/>
    </svg>
    <svg class="kb-blob kb-blob--bg2" data-kb-speed="0.08" viewBox="0 0 200 200" aria-hidden="true">
        <path transform="translate(100 100)" d="{{ $blobA }}"/>
    </svg>

    <div class="container kb-hero-grid">

        <div class="kb-hero-copy">

            <nav class="page-hero-crumbs kb-crumbs" aria-label="Breadcrumb">
                <a href="{{ $home }}">Home</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <a href="{{ $home }}#businesses">Businesses</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                <span aria-current="page">{{ $brand['menu'] }}</span>
            </nav>

            <span class="kb-eyebrow">{{ $brand['kicker'] }}</span>

            <h1 class="kb-title">
                <span class="kb-title-main">KOBA</span>
                <span class="kb-title-sub">Patisserie &amp; Bakery</span>
            </h1>

            <p class="kb-lead">{{ $brand['intro'] }}</p>

            <div class="story-actions">
                @if ($tel)
                    <a href="tel:{{ $tel }}" class="story-btn story-btn--solid">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        {{ $brand['phone'] }}
                    </a>
                @endif
                @if (!empty($locations))
                    <a href="#bz-locations" class="story-btn kb-btn-ghost">
                        {{ $brand['locations_label'] }}
                        <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
                    </a>
                @endif
            </div>

        </div>

        <div class="kb-hero-stage">

            <svg class="kb-blob kb-blob--main" data-kb-speed="-0.06" viewBox="0 0 200 200" aria-hidden="true">
                <path transform="translate(100 100)" d="{{ $blobA }}">
                    <animate attributeName="d" dur="14s" repeatCount="indefinite"
                             values="{{ $blobA }};{{ $blobB }};{{ $blobA }}"
                             calcMode="spline" keySplines=".45 0 .55 1;.45 0 .55 1"/>
                </path>
            </svg>

            <div class="kb-arch" data-kb-speed="0.05">
                <img src="{{ asset($brand['image']) }}" alt="A handcrafted KOBA celebration cake">
            </div>

            {{-- rotating badge --}}
            <div class="kb-badge" data-kb-speed="-0.14" aria-hidden="true">
                <svg viewBox="0 0 120 120">
                    <defs>
                        <path id="kbBadgeCircle" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0"/>
                    </defs>
                    <text>
                        <textPath href="#kbBadgeCircle">FRESH EVERY DAY · SINCE 2020 · ADDIS ABABA ·</textPath>
                    </text>
                </svg>
                <span class="kb-badge-core">K</span>
            </div>

            <div class="kb-sticker" data-kb-speed="0.1">
                <strong>{{ $brand['badge']['value'] }}</strong>
                <span>{{ $brand['badge']['label'] }}</span>
            </div>

        </div>

    </div>

    <a href="#kb-about" class="kb-scroll-cue">
        <span>Scroll</span>
        <i aria-hidden="true"></i>
    </a>

</section>


{{-- ============ MARQUEE — speed & direction follow the scroll ============ --}}
<div class="kb-marquee" aria-hidden="true">
    <div class="kb-marquee-track">
        @for ($r = 0; $r < 4; $r++)
            @foreach ($items as $item)
                <span class="kb-marquee-item">{{ $item['name'] }}</span>
                <i class="fa-solid fa-star kb-marquee-sep"></i>
            @endforeach
        @endfor
    </div>
</div>


{{-- ============ STATEMENT — words light up as you scroll ============ --}}
<section class="kb-about" id="kb-about">

    <svg class="kb-blob kb-blob--about" data-kb-speed="-0.1" viewBox="0 0 200 200" aria-hidden="true">
        <path transform="translate(100 100)" d="{{ $blobB }}"/>
    </svg>

    <div class="container">

        <span class="bz-label">About {{ $brand['menu'] }}</span>

        <p class="kb-reveal">
            @foreach (preg_split('/\s+/', $brand['body'][0]) as $word)
                <span class="kb-word">{{ $word }}</span>
            @endforeach
        </p>

        <div class="kb-about-grid">
            <p class="kb-about-more">{{ $brand['body'][1] ?? '' }}</p>

            <ul class="kb-pillars">
                <li class="kb-pillar">
                    <span class="kb-pillar-icon" aria-hidden="true"><i class="fa-solid fa-hands"></i></span>
                    <strong>100% handmade</strong>
                    <span>Baked fresh by our pastry</span>
                </li>
                <li class="kb-pillar">
                    <span class="kb-pillar-icon" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></span>
                    <strong>{{ count($locations) }} locations</strong>
                    <span>{{ $openCount }} open across Addis Ababa, {{ count($locations) - $openCount }} coming soon</span>
                </li>
                <li class="kb-pillar">
                    <span class="kb-pillar-icon" aria-hidden="true"><i class="fa-solid fa-mug-hot"></i></span>
                    <strong>Specialty coffee</strong>
                    <span>An elevated roastery experience at Peacock</span>
                </li>
            </ul>
        </div>

    </div>
</section>


{{-- ============ SHOWCASE — pinned; cards slide sideways ============ --}}
<section class="kb-showcase" aria-labelledby="kbShowcaseTitle">
    <div class="kb-showcase-sticky">

        <div class="container kb-showcase-head">
            <div>
                <span class="bz-label">{{ $brand['highlights']['label'] }}</span>
                <h2 id="kbShowcaseTitle">{{ $brand['highlights']['title'] }}</h2>
            </div>
            <span class="kb-showcase-count" aria-hidden="true">
                <b class="kb-showcase-now">01</b> / {{ sprintf('%02d', count($items)) }}
            </span>
        </div>

        <div class="kb-showcase-viewport">
            <ul class="kb-track">
                @foreach ($items as $item)
                    <li class="kb-card">
                        <span class="kb-card-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div class="kb-card-art" aria-hidden="true">
                            <svg class="kb-card-blob" viewBox="0 0 200 200">
                                <path transform="translate(100 100) rotate({{ $loop->index * 67 }})" d="{{ $loop->odd ? $blobA : $blobB }}"/>
                            </svg>
                            @if (!empty($item['image']))
                                <img class="kb-card-img" src="{{ asset($item['image']) }}" alt="" loading="lazy">
                            @else
                                <i class="fa-solid {{ $item['icon'] }}"></i>
                            @endif
                        </div>
                        <h3>{{ $item['name'] }}</h3>
                        @if (!empty($item['desc']))
                            <p>{{ $item['desc'] }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="container">
            <div class="kb-progress" aria-hidden="true"><i></i></div>
        </div>

    </div>
</section>
