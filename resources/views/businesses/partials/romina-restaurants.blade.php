{{-- Restaurant-only middle sections; the hero photo joins this lightbox in show.blade.php. --}}
@php
    $rrPath = 'images/gallery/romina-restaurants/';
    $rrDescriptions = [
        '06-romina-restaurant.webp' => ['The dining room', 'Warm brick walls and tables in the Romina dining room'],
        '14-ethiopian-platter.webp' => ['Ethiopian dishes', 'An Ethiopian platter served in a woven basket'],
        '09-romina-restaurant.webp' => ['At the bar', 'The illuminated bar and bottle shelves at Romina'],
        '12-mixed-grill.webp' => ['From the kitchen', 'A plated mixed grill at Romina'],
        '02-romina-restaurant.webp' => ['Made for sharing', 'Ethiopian dishes arranged on injera in a woven basket'],
        '08-romina-restaurant.webp' => ['A place to gather', 'Tables and pendant lights in the brick-lined dining room'],
        '03-romina-restaurant.webp' => ['Around the table', 'A pizza served with a small bowl of sauce'],
        '01-romina-restaurant.webp' => ['Comfort on a plate', 'A plated dish with noodles and dipping sauce'],
        '04-romina-restaurant.webp' => ['Home-styled dishes', 'A plated dish with rice, salad and lime'],
        '05-romina-restaurant.webp' => ['Fresh from the kitchen', 'A rice and cutlet dish on a red dining table'],
        '10-romina-restaurant.webp' => ['Settle in', 'Quiet dining tables beneath warm wall lighting'],
        '10b-baked-clay-pot.webp' => ['At the table', 'A baked dish served in a clay pot'],
        '11-clay-pot-special.webp' => ['The clay-pot special', 'Romina clay-pot dish garnished with fresh herbs'],
        '13-grilled-fish.webp' => ['Grilled fish', 'Grilled fish with rice, sauce and salad'],
        '15-avocado-pizza.webp' => ['European dishes', 'An avocado-topped pizza at Romina'],
        '16-stuffed-flatbread.webp' => ['Something comforting', 'Stuffed flatbread served with sauce'],
    ];
    $rrAvailable = array_values(array_filter($gallery, function ($photo) { return !empty($photo['src']); }));
    if (!in_array($brand['image'], array_column($rrAvailable, 'src'), true)) {
        $rrAvailable[] = ['src' => $brand['image'], 'caption' => 'Romina Restaurants', 'shot' => 'Romina Restaurants'];
    }
    // Crops are restaurant-page variants; shared source images remain unchanged.
    $rrImage = function ($src) {
        $variant = 'images/romina-restaurants/' . basename($src);
        return file_exists(public_path($variant)) ? $variant : $src;
    };
    foreach ($rrAvailable as &$photo) $photo['src'] = $rrImage($photo['src']);
    unset($photo);
    // 4 Kilo uses an explicitly permitted representative interior, not a verified branch photo.
    // Balderas is identified by the homepage's brands-tabs photo caption.
    $rrLocationPhotos = ['4 Kilo' => $rrPath . '10-romina-restaurant.webp', 'Balderas' => $rrPath . '08-romina-restaurant.webp'];
    $rrOrder = array_keys($rrDescriptions);
    usort($rrAvailable, function ($a, $b) use ($rrOrder) {
        $aIndex = array_search(basename($a['src']), $rrOrder);
        $bIndex = array_search(basename($b['src']), $rrOrder);
        return ($aIndex === false ? count($rrOrder) : $aIndex) <=> ($bIndex === false ? count($rrOrder) : $bIndex);
    });
@endphp

<div class="rr-content" data-rr-page>
    <section class="rr-story" id="bz-overview" aria-labelledby="rr-story-title">
        <div class="rr-wrap rr-story-grid">
            <div class="rr-story-visual">
                <figure class="rr-story-room">
                    <a class="rr-photo" data-rr-photo data-caption="The dining room" aria-label="Enlarge photo: The dining room" href="{{ asset($rrImage($rrPath . '06-romina-restaurant.webp')) }}"><img src="{{ asset($rrImage($rrPath . '06-romina-restaurant.webp')) }}" width="1600" height="1066" alt="Warm brick walls and tables in the Romina dining room" loading="lazy" decoding="async"></a>
                    <figcaption>A place to feel at home.</figcaption>
                </figure>
                <figure class="rr-story-dish">
                    <a class="rr-photo" data-rr-photo data-caption="A baked dish served in a clay pot" aria-label="Enlarge photo: A baked dish served in a clay pot" href="{{ asset($rrImage($rrPath . '10b-baked-clay-pot.webp')) }}"><img src="{{ asset($rrImage($rrPath . '10b-baked-clay-pot.webp')) }}" width="640" height="740" alt="A baked dish served in a clay pot at Romina" loading="lazy" decoding="async"></a>
                </figure>
            </div>
            <div class="rr-story-copy">
                <p class="rr-eyebrow">About Romina Restaurants</p>
                <h2 id="rr-story-title">The home of<br>great service.</h2>
                @foreach ($brand['body'] as $paragraph)
                    <p class="rr-body">{{ $paragraph }}</p>
                @endforeach
                <dl class="rr-heritage">
                    <div><dt>{{ $brand['facts'][0]['value'] }}</dt><dd>{{ $brand['facts'][0]['label'] }}</dd></div>
                    <div><dt class="rr-home-names"><span>4 Kilo</span><i class="rr-home-divider" aria-hidden="true"></i><span>Balderas</span></dt><dd>Our homes in Addis Ababa</dd></div>
                </dl>
                <a class="rr-text-link" href="#bz-locations">Come and join us <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <section class="rr-cuisine" aria-labelledby="rr-cuisine-title">
        <div class="rr-wrap">
            <header class="rr-cuisine-head" data-rr-reveal>
                <div><p class="rr-eyebrow">{{ $brand['highlights']['label'] }}</p><h2 id="rr-cuisine-title">Comfort food,<br>from every corner<br>of the world.</h2></div>
                <p>Home-styled dishes from across the world, prepared as the most comforting versions of what you love.</p>
            </header>
            <div class="rr-cuisine-grid">
                <article class="rr-cuisine-panel rr-cuisine-panel--european" data-rr-reveal>
                    <figure><a class="rr-photo" data-rr-photo data-caption="European dishes" aria-label="Enlarge photo: European dishes" href="{{ asset($rrImage($rrPath . '15-avocado-pizza.webp')) }}"><img src="{{ asset($rrImage($rrPath . '15-avocado-pizza.webp')) }}" width="1599" height="1850" alt="Avocado-topped pizza at Romina" loading="lazy" decoding="async"></a></figure>
                    <div class="rr-cuisine-caption"><span class="rr-number" aria-hidden="true">01</span><h3>European dishes</h3><p>Familiar dishes from European kitchens, served with the warmth of home.</p></div>
                </article>
                <article class="rr-cuisine-panel rr-cuisine-panel--asian" data-rr-reveal>
                    <figure><a class="rr-photo" data-rr-photo data-caption="Asian dishes" aria-label="Enlarge photo: Asian dishes" href="{{ asset($rrImage($rrPath . '01-romina-restaurant.webp')) }}"><img src="{{ asset($rrImage($rrPath . '01-romina-restaurant.webp')) }}" width="2000" height="1333" alt="A plated dish with noodles and dipping sauce at Romina" loading="lazy" decoding="async"></a></figure>
                    <div class="rr-cuisine-caption"><span class="rr-number" aria-hidden="true">02</span><h3>Asian dishes</h3><p>Comforting favourites from Asian kitchens, part of our world of home-styled dishes.</p></div>
                </article>
                <article class="rr-cuisine-panel rr-cuisine-panel--ethiopian" data-rr-reveal>
                    <figure><a class="rr-photo" data-rr-photo data-caption="Ethiopian dishes" aria-label="Enlarge photo: Ethiopian dishes" href="{{ asset($rrImage($rrPath . '14-ethiopian-platter.webp')) }}"><img src="{{ asset($rrImage($rrPath . '14-ethiopian-platter.webp')) }}" width="1599" height="1850" alt="An Ethiopian platter in a woven basket at Romina" loading="lazy" decoding="async"></a></figure>
                    <div class="rr-cuisine-caption"><span class="rr-number" aria-hidden="true">03</span><h3>Ethiopian dishes</h3><p>The familiar comfort of Ethiopian dishes, rooted in our home in Addis Ababa.</p></div>
                </article>
            </div>
        </div>
    </section>

    <section class="rr-gallery" aria-labelledby="rr-gallery-title">
        <div class="rr-wrap rr-gallery-heading" data-rr-reveal>
            <div><p class="rr-eyebrow">A closer look</p><h2 id="rr-gallery-title">Pull up a chair.</h2></div>
            <p>Inside our dining rooms.<br>Across our tables.</p>
        </div>
        <ul class="rr-gallery-grid" id="rr-gallery-grid">
            @foreach ($rrAvailable as $photo)
                @php
                    $rrFile = basename($photo['src']);
                    $rrDescription = $rrDescriptions[$rrFile] ?? [$photo['caption'], $photo['shot']];
                    [$rrWidth, $rrHeight] = getimagesize(public_path($photo['src']));
                    $rrPortrait = $rrHeight > $rrWidth;
                @endphp
                <li class="rr-gallery-item{{ $rrPortrait ? ' rr-gallery-item--portrait' : '' }}" @if ($loop->index >= 7) data-rr-extra @endif>
                    <a href="{{ asset($photo['src']) }}" class="rr-photo" data-rr-photo data-caption="{{ $rrDescription[0] }}" aria-label="Enlarge photo: {{ $rrDescription[0] }}">
                        <img src="{{ asset($photo['src']) }}" width="{{ $rrWidth }}" height="{{ $rrHeight }}" alt="{{ $rrDescription[1] }}" loading="lazy" decoding="async">
                        <span class="rr-photo-caption"><span>{{ $rrDescription[0] }}</span><i class="fa-solid fa-expand" aria-hidden="true"></i></span>
                    </a>
                </li>
            @endforeach
        </ul>
        @if (count($rrAvailable) > 7)
            <div class="rr-gallery-actions"><button type="button" class="rr-button rr-gallery-toggle" aria-expanded="false" aria-controls="rr-gallery-grid" hidden>View all photos <span>({{ count($rrAvailable) }})</span> <i class="fa-solid fa-arrow-down" aria-hidden="true"></i></button></div>
        @endif
    </section>

    <section class="rr-locations" id="bz-locations" aria-labelledby="rr-locations-title">
        <div class="rr-wrap rr-locations-grid">
            <div class="rr-locations-copy" data-rr-reveal>
                <p class="rr-eyebrow">{{ $brand['locations_label'] }}</p>
                <h2 id="rr-locations-title">Our Locations</h2>
                <p class="rr-locations-intro">Two homes in Addis Ababa.<br>The same warm welcome.</p>
                <ul class="rr-location-list">
                    @foreach ($brand['locations'] as $location)
                        <li data-rr-location="{{ $loop->index }}" class="{{ $loop->first ? 'is-active' : '' }}">
                            <span class="rr-location-number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <div><h3><button type="button" class="rr-location-select" aria-pressed="{{ $loop->first ? 'true' : 'false' }}" aria-controls="rr-location-frame">{{ $location['name'] }}</button></h3><p>{{ $location['desc'] }}</p>
                                @if ($showMaps && $location['tag'] !== 'Coming soon')
                                    <a class="rr-text-link" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($brand['menu'] . ' ' . $location['name'] . ' Addis Ababa') }}" target="_blank" rel="noopener">Get directions <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="rr-location-photo" id="rr-location-frame" data-rr-reveal>
                @foreach ($brand['locations'] as $location)
                    @php $rrLocationSrc = $rrLocationPhotos[$location['name']] ?? null; @endphp
                    <figure class="rr-location-state{{ $loop->first ? ' is-active' : '' }}" data-rr-location-state="{{ $loop->index }}" @unless ($loop->first) aria-hidden="true" inert @endunless>
                        @php $rrLocationAlt = $loop->first ? 'Romina restaurant interior' : 'Balderas dining room at Romina'; @endphp
                        <a class="rr-photo" data-rr-photo data-caption="{{ $rrLocationAlt }}" aria-label="Enlarge photo: {{ $rrLocationAlt }}" href="{{ asset($rrLocationSrc) }}">
                            <img src="{{ asset($rrLocationSrc) }}" data-rr-fallback="{{ asset($rrPath . '06-romina-restaurant.webp') }}" width="1600" height="1066" alt="{{ $rrLocationAlt }}" loading="eager" decoding="async">
                        </a>
                        <figcaption>{{ $location['name'] }} &middot; {{ $location['desc'] }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <dialog class="rr-lightbox" aria-labelledby="rr-lightbox-caption" aria-describedby="rr-lightbox-count">
        <div class="rr-lightbox-inner">
            <button type="button" class="rr-lightbox-close" aria-label="Close photo viewer" autofocus><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
            <button type="button" class="rr-lightbox-prev" aria-label="Previous photo"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
            <figure><img class="rr-lightbox-image" alt=""><figcaption><span id="rr-lightbox-caption"></span><span id="rr-lightbox-count" aria-live="polite"></span></figcaption></figure>
            <button type="button" class="rr-lightbox-next" aria-label="Next photo"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
        </div>
    </dialog>
</div>
