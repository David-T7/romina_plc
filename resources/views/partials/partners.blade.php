    {{-- ==========================================
         PARTNERS — auto-scroll logo strip
         To add a real logo: place the file in public/images/partners/
         and set 'image' => asset('images/partners/filename.png') below.
    =========================================== --}}

    <?php
    $partners = [
        ['name' => 'Romina Restaurants', 'image' => asset('images/brands/restaurant.jpg'),   'alt' => 'Romina Restaurants'],
        ['name' => 'KOBA',               'image' => asset('images/brands/koba.jpg'),          'alt' => 'KOBA Patisserie & Bakery'],
        ['name' => 'Meskott',            'image' => asset('images/brands/meskott-final.png'), 'alt' => 'Meskott Culinary Experience'],
        ['name' => 'Bacio',              'image' => asset('images/brands/bacio.png'),         'alt' => 'Bacio'],
        ['name' => 'Jaquar World',       'image' => asset('images/brands/jaquar.png'),        'alt' => 'Jaquar World Addis Ababa'],
        ['name' => 'Michael Girma CO',   'image' => asset('images/brands/michael-girma.webp'),        'alt' => 'Michael Girma CO'],
    ];
    ?>

    <section class="partners-strip" aria-label="Our brands">

        <div class="container">
            <p class="mark">
                <span class="mark-rule"></span>
                <i></i>
                Our Brands
            </p>
        </div>

        <div class="partners-marquee">
            <div class="partners-track">

                {{-- first pass (visible to screen readers) --}}
                @foreach ($partners as $partner)
                    <div class="partner-tile">
                        @if ($partner['image'])
                            <img src="{{ $partner['image'] }}" alt="{{ $partner['alt'] }}">
                        @else
                            <span class="partner-tile-name">{{ $partner['name'] }}</span>
                        @endif
                    </div>
                @endforeach

                {{-- duplicate pass for seamless loop --}}
                @foreach ($partners as $partner)
                    <div class="partner-tile" aria-hidden="true">
                        @if ($partner['image'])
                            <img src="{{ $partner['image'] }}" alt="">
                        @else
                            <span class="partner-tile-name">{{ $partner['name'] }}</span>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>

    </section>
