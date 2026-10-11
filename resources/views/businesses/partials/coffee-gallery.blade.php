{{-- Reuse the existing editorial mosaic styles and shared business photo viewer. --}}
@php
    $coffeePhotos = collect($gallery)->filter(fn ($photo) => !empty($photo['src']))->values();
@endphp
@if (($brand['show_gallery'] ?? true) && $coffeePhotos->isNotEmpty())
<section class="ms-gallery" aria-labelledby="ce-gallery-title">
    <div class="container">
        <header class="ms-gallery-head">
            <div class="bz-section-head">
                <span class="bz-label">Gallery</span>
                <h2 id="ce-gallery-title">A Closer Look.</h2>
            </div>
            <p>People, process and the coffee we export.<br>{{ $coffeePhotos->count() }} photographs; select to enlarge</p>
        </header>
        <ul class="ms-mosaic">
            @foreach ($coffeePhotos as $photo)
                @php
                    [$photoWidth, $photoHeight] = @getimagesize(public_path($photo['src'])) ?: [1920, 1280];
                @endphp
                <li>
                    <button type="button" class="bz-tile-btn ms-photo" data-full="{{ asset($photo['src']) }}" data-caption="{{ $photo['caption'] }}" aria-label="Enlarge photo: {{ $photo['caption'] }}">
                        <img src="{{ asset($photo['src']) }}" width="{{ $photoWidth }}" height="{{ $photoHeight }}" loading="lazy" decoding="async" alt="{{ $photo['shot'] }}">
                        <span class="ms-photo-caption"><span>{{ $photo['caption'] }}</span><i class="fa-solid fa-expand" aria-hidden="true"></i></span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif

{{-- Also serves the hero photo; keep the same controls and behavior as other pages. --}}
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
