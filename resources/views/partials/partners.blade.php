    {{-- ==========================================
         PARTNERS — auto-scroll logo strip
         To add a real logo: place the file in public/images/partners/
         and set 'image' => asset('images/partners/filename.png') below.
    =========================================== --}}

    <?php
    // Logos are trimmed to their artwork (images/brands/logos/) and sized to the same
    // visual area, so wide and square marks read at an equal weight.
    $partners = [
        ['name' => 'Romina Restaurants', 'file' => 'images/brands/logos/romina.png',        'alt' => 'Romina Restaurants'],
        ['name' => 'KOBA',               'file' => 'images/brands/logos/koba.png',          'alt' => 'KOBA Patisserie & Bakery'],
        ['name' => 'Meskott',            'file' => 'images/brands/logos/meskott.png',       'alt' => 'Meskott Culinary Experience'],
        ['name' => 'Bacio',              'file' => 'images/brands/logos/bacio.png',         'alt' => 'Bacio'],
        ['name' => 'Jaquar World',       'file' => 'images/brands/logos/jaquar.png',        'alt' => 'Jaquar World Addis Ababa'],
        ['name' => 'Michael Girma CO',   'file' => 'images/brands/logos/michael-girma.png', 'alt' => 'Michael Girma CO'],
    ];

    $logoArea = 6000;   // px² each logo occupies
    $maxW     = 168;
    $maxH     = 64;

    foreach ($partners as &$partner) {
        $partner['image'] = asset($partner['file']);
        [$w, $h] = @getimagesize(public_path($partner['file'])) ?: [1, 1];
        $ratio  = $w / $h;
        $height = min($maxH, sqrt($logoArea / $ratio), $maxW / $ratio);
        $partner['size'] = ['w' => (int) round($height * $ratio), 'h' => (int) round($height)];
    }
    unset($partner);
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
                            <img loading="lazy" decoding="async" src="{{ $partner['image'] }}" alt="{{ $partner['alt'] }}" style="width: {{ $partner['size']['w'] }}px; height: {{ $partner['size']['h'] }}px;">
                        @else
                            <span class="partner-tile-name">{{ $partner['name'] }}</span>
                        @endif
                    </div>
                @endforeach

                {{-- duplicate pass for seamless loop --}}
                @foreach ($partners as $partner)
                    <div class="partner-tile" aria-hidden="true">
                        @if ($partner['image'])
                            <img loading="lazy" decoding="async" src="{{ $partner['image'] }}" alt="" style="width: {{ $partner['size']['w'] }}px; height: {{ $partner['size']['h'] }}px;">
                        @else
                            <span class="partner-tile-name">{{ $partner['name'] }}</span>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>

    </section>
