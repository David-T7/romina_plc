{{-- ============ GALLERY — photo mosaic + lightbox ============
     Tiles come from $gallery (see PagesController::businessGallery):
     drop photos into public/images/gallery/{slug}/ to add more. --}}
@if ($brand['show_gallery'] ?? true)
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
@endif
