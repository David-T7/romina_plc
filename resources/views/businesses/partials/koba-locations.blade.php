@php
    // Supplied photographs are representative KOBA settings, not verified branch interiors.
    $klSupportCaptions = [
        'croissant.webp' => 'Layers of golden pastry', 'eclair.webp' => 'An eclair, finished with care',
        'koba-breakfast.webp' => 'A pastry at the breakfast table', 'layered-cake.webp' => 'Layer by layer',
        'koba-pastries.webp' => 'From the pastry counter', '02-koba.webp' => 'A refreshing drink at KOBA',
        '01-koba.webp' => 'A quiet macchiato moment',
    ];
    $klPhotos = [
        ['images/koba/koba-cakes.jpg', 'A handcrafted cake on a KOBA cafe table', ['images/koba/croissant.webp', 'images/koba/eclair.webp']],
        ['images/gallery/koba-patisserie/03-koba.webp', 'Iced coffee at a KOBA cafe table', ['images/koba/koba-breakfast.webp', 'images/koba/layered-cake.webp']],
        ['images/koba/koba-coffee.webp', 'Coffee beside seating at a KOBA cafe', ['images/koba/koba-pastries.webp', 'images/gallery/koba-patisserie/02-koba.webp']],
        ['images/gallery/koba-patisserie/04-koba.webp', 'Coffee poured at a KOBA cafe', ['images/gallery/koba-patisserie/01-koba.webp', 'images/koba/croissant.webp']],
    ];
@endphp
<section class="kl-locations" id="bz-locations" aria-labelledby="kl-location-title"><div class="container">
    <header class="kl-heading"><div><p class="kl-eyebrow">{{ $brand['locations_label'] }}</p><h2 id="kl-location-title">Our Locations.</h2></div><p>Four open locations.<br>A new chapter coming soon.</p></header>
    <div class="kl-explorer">
        <ul class="kl-branches" aria-label="Choose a KOBA location">
            @foreach ($brand['locations'] as $loc)
                <li>
                    @if ($loc['tag'] !== 'Coming soon')
                        <button type="button" data-kl-branch="{{ $loop->index }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}" aria-controls="kl-feature"><span class="kl-number">{{ sprintf('%02d', $loop->iteration) }}</span><span><strong>{{ $loc['name'] }}</strong><span>{{ $loc['desc'] }}</span></span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                    @else
                        <div class="kl-planned"><span class="kl-number">{{ sprintf('%02d', $loop->iteration) }}</span><div><strong>{{ $loc['name'] }}</strong><span class="kl-coming">Coming soon</span><p>{{ $loc['desc'] }}</p></div></div>
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="kl-feature" id="kl-feature">
            <div class="kl-feature-frame">
                @foreach ($brand['locations'] as $loc)
                    @if ($loc['tag'] !== 'Coming soon')
                        @php [$src, $alt] = $klPhotos[$loop->index]; @endphp
                        <figure class="kl-state{{ $loop->first ? ' is-active' : '' }}" data-kl-state="{{ $loop->index }}" @unless ($loop->first) aria-hidden="true" inert @endunless>
                            <button type="button" class="kl-photo kl-main-photo" data-full="{{ asset($src) }}" data-caption="{{ $alt }}" aria-label="Enlarge photo: {{ $alt }}"><img src="{{ asset($src) }}" alt="{{ $alt }}" loading="eager" decoding="async" data-kl-fallback="{{ asset('images/business/baked.jpg') }}"></button>
                            <figcaption><p class="kl-representative">A moment at KOBA · representative photograph</p><h3>{{ $loc['name'] }}</h3><p>{{ $loc['desc'] }}</p>@if ($showMaps)<a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($brand['menu'] . ' ' . $loc['name'] . ' Addis Ababa') }}" target="_blank" rel="noopener">Get directions <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>@endif</figcaption>
                        </figure>
                    @endif
                @endforeach
            </div>
            @foreach ($klPhotos as $i => $photo)
                <div class="kl-support" data-kl-support="{{ $i }}" @unless ($i === 0) hidden @endunless role="group" aria-label="More KOBA photographs">
                    @foreach ($photo[2] as $src)
                        @php $shot = [$src, $klSupportCaptions[basename($src)]]; @endphp
                        <button type="button" class="kl-photo" data-full="{{ asset($src) }}" data-caption="{{ $shot[1] }}" aria-label="Enlarge photo: {{ $shot[1] }}"><img src="{{ asset($src) }}" alt="{{ $shot[1] }}" loading="lazy"><span>{{ $shot[1] }}</span></button>
                    @endforeach
                </div>
            @endforeach
            <p class="kl-load-status" role="status" hidden>That photo is unavailable. The current KOBA photograph remains visible.</p>
        </div>
    </div>
</div></section>
