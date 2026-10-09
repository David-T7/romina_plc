{{-- Bacio-only presentation. Existing gallery and brand content remain the sources. --}}
@php
    $bacioProducts = array_values(array_filter($brand['gallery'] ?? [], fn ($photo) => !empty($photo['src'])));
    $bacioHero = collect($bacioProducts)->firstWhere('src', 'images/bacio/gelato-plate.webp') ?? $bacioProducts[0];
    $bacioSrcset = function ($src) {
        $candidates = [];
        foreach ([240, 360] as $width) {
            $variant = preg_replace('/\.webp$/', '-' . $width . '.webp', $src);
            if (is_file(public_path($variant))) $candidates[] = asset($variant) . ' ' . $width . 'w';
        }
        $dimensions = getimagesize(public_path($src));
        $candidates[] = asset($src) . ' ' . $dimensions[0] . 'w';
        return implode(', ', $candidates);
    };
@endphp
<section class="bacio-hero">
    <div class="container bacio-hero-grid">
        <div class="bacio-hero-copy">
            <nav class="bacio-crumbs" aria-label="Breadcrumb">
                <a href="{{ $home }}">Home</a><span aria-hidden="true">/</span>
                <a href="{{ $home }}#brands">Businesses</a><span aria-hidden="true">/</span>
                <span aria-current="page">{{ $brand['menu'] }}</span>
            </nav>
            <p class="bacio-eyebrow">{{ $brand['kicker'] }}</p>
            <h1>A little scoop.<br>A lot of <em>joy.</em></h1>
            <p class="bacio-lead">{{ $brand['intro'] }}</p>
            <div class="bacio-actions">
                <a class="bacio-button" href="#bacio-flavors">Explore Flavors <i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
                <a class="bacio-text-link" href="#bz-locations">Find your Bacio <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="bacio-hero-art">
            <span class="bacio-spark bacio-spark--hero" aria-hidden="true">✳</span>
            <figure class="bacio-hero-photo">
                <button type="button" class="bacio-image-btn" aria-label="Enlarge photo" aria-haspopup="dialog" aria-controls="bzLightbox"><img src="{{ asset($bacioHero['src']) }}" srcset="{{ $bacioSrcset($bacioHero['src']) }}" sizes="(max-width: 640px) calc(100vw - 108px), (max-width: 1000px) 42vw, 450px" alt="{{ $bacioHero['shot'] }}" width="548" height="768" fetchpriority="high" decoding="async"><span class="bacio-image-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span></button>
                <figcaption>Little moments. Delicious memories.</figcaption>
            </figure>
            <span class="bacio-round-note" aria-hidden="true">Made for<br>happy moments</span>
        </div>
    </div>
</section>
<section class="bacio-flavors" id="bacio-flavors" aria-labelledby="bacio-flavors-title">
    <div class="container">
        <div class="bacio-section-heading">
            <div><p class="bacio-eyebrow">{{ $brand['highlights']['label'] }}</p><h2 id="bacio-flavors-title">Find your happy scoop.</h2></div>
        </div>
        <ul class="bacio-product-grid">
            @foreach ($bacioProducts as $product)
                <li class="bacio-product-card">
                    <button type="button" class="bacio-image-btn" aria-label="Enlarge photo" aria-haspopup="dialog" aria-controls="bzLightbox"><img src="{{ asset($product['src']) }}" srcset="{{ $bacioSrcset($product['src']) }}" sizes="(max-width: 640px) calc((100vw - 60px) / 2), (max-width: 1000px) 29vw, 214px" alt="{{ $product['shot'] }}" width="{{ in_array($product['src'], ['images/bacio/gelato-plate.webp', 'images/bacio/waffle-ice-cream.webp']) ? 548 : 432 }}" height="768" loading="lazy" decoding="async"><span class="bacio-image-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span></button>
                    <h3>{{ $product['caption'] }}</h3>
                </li>
            @endforeach
        </ul>
    </div>
</section>
<section class="bacio-story" id="bc-about" aria-labelledby="bacio-story-title">
    <div class="container bacio-story-grid">
        <div class="bacio-craft-sequence" aria-label="Bacio gelato at the counter and served at the table">
            <figure><button type="button" class="bacio-image-btn" aria-label="Enlarge photo" aria-haspopup="dialog" aria-controls="bzLightbox"><img src="{{ asset($brand['image']) }}" srcset="{{ $bacioSrcset($brand['image']) }}" sizes="(max-width: 640px) 40vw, 230px" alt="{{ $brand['image_shot'] }}" width="432" height="768" loading="lazy" decoding="async"><span class="bacio-image-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span></button><figcaption>At the counter</figcaption></figure>
            <figure><button type="button" class="bacio-image-btn" aria-label="Enlarge photo" aria-haspopup="dialog" aria-controls="bzLightbox"><img src="{{ asset($bacioHero['src']) }}" srcset="{{ $bacioSrcset($bacioHero['src']) }}" sizes="(max-width: 640px) 40vw, 230px" alt="{{ $bacioHero['shot'] }}" width="548" height="768" loading="lazy" decoding="async"><span class="bacio-image-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span></button><figcaption>Made for your moment</figcaption></figure>
            <span class="bacio-spark bacio-spark--story" aria-hidden="true">✳</span>
        </div>
        <div class="bacio-story-copy">
            <p class="bacio-eyebrow">The care behind every scoop</p>
            <h2 id="bacio-story-title">{{ $brand['title'] }}</h2>
            @foreach ($brand['body'] as $paragraph)<p>{{ $paragraph }}</p>@endforeach
            <div class="bacio-dairy-note"><i class="fa-solid fa-cow" aria-hidden="true"></i><div><h3>Fresh from Romina Dairy Farm</h3><p>{{ $brand['dairy'] }}</p></div></div>
        </div>
    </div>
</section>
<div class="bacio-gallery-wrap">@include('businesses.partials.gallery')</div>
<section class="bacio-moment" aria-labelledby="bacio-moment-title">
    <div class="container">
        <p class="bacio-eyebrow">The Bacio Moment</p>
        <h2 id="bacio-moment-title">Good company.<br>Great ice cream.</h2>
        <p>{{ $brand['moment'] }}</p>
        <p>{{ $brand['closing'] }}</p>
        <a class="bacio-button" href="#bz-locations">Visit Bacio <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        @if ($brand['phone'])<a class="bacio-text-link" href="tel:{{ $tel }}">{{ $brand['phone'] }}</a>@endif
    </div>
</section>
