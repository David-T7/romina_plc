@php
    $klGallery = [
        ['images/business/baked.jpg', 'Chocolate celebration cake'],
        ['images/koba/croissant.webp', 'Layers of golden pastry'],
        ['images/koba/koba-cakes.jpg', 'A handcrafted cake at the cafe table'],
        ['images/koba/eclair.webp', 'An eclair, finished with care'],
        ['images/koba/layered-cake.webp', 'Layer by layer'],
        ['images/koba/koba-pastries.webp', 'From the pastry counter'],
        ['images/gallery/koba-patisserie/01-koba.webp', 'A quiet macchiato moment'],
        ['images/gallery/koba-patisserie/02-koba.webp', 'Mint, lime and a little refreshment'],
        ['images/gallery/koba-patisserie/03-koba.webp', 'Iced coffee at the cafe table'],
        ['images/gallery/koba-patisserie/04-koba.webp', 'The coffee ritual'],
        ['images/gallery/koba-patisserie/06-koba.webp', 'A glazed chocolate pastry'],
        ['images/koba/koba-coffee.webp', 'Coffee beside cafe seating'],
    ];
@endphp
<section class="kl-gallery" aria-labelledby="kl-gallery-title"><div class="container">
    <header class="kl-heading"><div><p class="kl-eyebrow">Gallery</p><h2 id="kl-gallery-title">A Closer Look.</h2></div><p>From the pastry counter to the coffee table.<br>12 photographs; select to enlarge</p></header>
    <ul class="kl-mosaic">
        @foreach ($klGallery as [$src, $caption])
            <li><button type="button" class="bz-tile-btn kl-gallery-photo" data-full="{{ asset($src) }}" data-caption="{{ $caption }}" aria-label="Enlarge photo: {{ $caption }}"><img src="{{ asset($src) }}" alt="{{ $caption }}" loading="lazy" decoding="async"><span class="kl-gallery-caption"><span>{{ $caption }}</span><i class="fa-solid fa-expand" aria-hidden="true"></i></span></button></li>
        @endforeach
    </ul>
</div></section>
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
