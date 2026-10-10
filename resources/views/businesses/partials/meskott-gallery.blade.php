{{-- ============ MESKOTT GALLERY — editorial mosaic (same pattern as the KOBA and
     Romina Restaurants galleries) + the shared lightbox (.bz-tile-btn).
     Photos come from $gallery (PagesController::businessGallery skips photos already
     shown elsewhere on this page); captions below describe what each photo shows. --}}
@php
    $msCaptions = [
        'meskott_2.webp'          => ['The Dining Room',  'Dining room with banquette seating, a brick wall and the wine shelf'],
        '16-pie-finish.webp'      => ['The Final Touch',  'A chef spooning sauce over a baked pie at the pass'],
        '19-final-garnish.webp'   => ['Garnished by Hand', 'A chef garnishing a clay-pot dish beside fresh flatbread'],
        '13-mezze-flatbread.webp' => ['Mezze & Flatbread', 'Grilled chicken, green beans and pickled onion on hummus, with flatbread'],
        'meskott_5.webp'          => ['The Garden Terrace', 'Garden terrace tables beneath the Meskott sign'],
        '09-wings-and-fries.webp' => ['Wings & Fries',    'Grilled chicken wings with golden fries'],
        'meskott_4.webp'          => ['Courtyard Seating', 'Courtyard tables with red and green cushions among the plants'],
        '14-mezze-served.webp'    => ['Served to the Table', 'A gloved server presenting the mezze plate with flatbread'],
    ];
    // Same photo as meskott_2 (a different export), so it is not shown twice
    $msSkip  = ['01-dining-room.jpg'];
    $msOrder = array_keys($msCaptions);

    $msPhotos = collect($gallery)
        ->filter(fn ($g) => !empty($g['src']) && !in_array(basename($g['src']), $msSkip, true))
        ->unique(fn ($g) => basename($g['src']))
        ->sortBy(fn ($g) => ($i = array_search(basename($g['src']), $msOrder, true)) === false ? 99 : $i)
        ->values()
        ->map(function ($g) use ($msCaptions) {
            [$cap, $alt] = $msCaptions[basename($g['src'])] ?? [$g['caption'], $g['shot']];
            return ['src' => $g['src'], 'caption' => $cap, 'alt' => $alt];
        });
@endphp
@if ($msPhotos->isNotEmpty())
<section class="ms-gallery" aria-labelledby="ms-gallery-title">
    <div class="container">
        <header class="ms-gallery-head">
            <div class="bz-section-head">
                <span class="bz-label">Gallery</span>
                <h2 id="ms-gallery-title">A Closer Look.</h2>
            </div>
            <p>From the pass to the garden terrace.<br>{{ $msPhotos->count() }} photographs; select to enlarge</p>
        </header>

        <ul class="ms-mosaic">
            @foreach ($msPhotos as $p)
                <li>
                    <button type="button" class="bz-tile-btn ms-photo"
                            data-full="{{ asset($p['src']) }}"
                            data-caption="{{ $p['caption'] }}"
                            aria-label="Enlarge photo: {{ $p['caption'] }}">
                        <img src="{{ asset($p['src']) }}" alt="{{ $p['alt'] }}" loading="lazy" decoding="async">
                        <span class="ms-photo-caption"><span>{{ $p['caption'] }}</span><i class="fa-solid fa-expand" aria-hidden="true"></i></span>
                    </button>
                </li>
            @endforeach
        </ul>
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
@endif
