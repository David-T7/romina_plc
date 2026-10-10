    {{--
         Locations: [name, description, comingSoon, phone]. A location phone shows
         beside the branch; the brand 'phone' shows only when no branch has one.
         BRANDS / BUSINESSES — tabbed detail section
         Ported from React romina.jsx  (Brands + BrandPanel + Gallery components)
         Data array lives in the PHP block below — edit here to update content.
    --}}

    <?php
    $brands_order = ['restaurants', 'coffee', 'jaquar', 'koba', 'bacio', 'meskott', 'imports'];
    $brands = [

        'restaurants' => [
            'name'      => 'Romina Restaurants',
            'tone'      => 'light',
            'kicker'    => 'An iconic eatery in the heart of Addis Ababa',
            'title'     => 'The Home of Great Service',
            'body'      => "We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.",
            'list'      => ['label' => 'Culinary Promise', 'items' => ['European dishes', 'Asian dishes', 'Local Ethiopian dishes', 'Signature Agelgel']],
            'locations' => [
                ['4 Kilo', 'Romina Restaurant, Bar & Cafe',          true],
                ['Balderas',           'Romina Restaurant / Takeaway Center',     false],
            ],
            'phone'  => null,
            'cta'    => 'Visit Romina Restaurants',
            'href'   => route('business', 'romina-restaurants'),
            'slides' => [
                ['src' => 'images/gallery/romina-restaurants/08-romina-restaurant.webp', 'shot' => 'Romina dining room, brick wall and pendant lights', 'caption' => 'The Dining Room',                'pos' => '50% 50%'],
                ['src' => 'images/gallery/romina-restaurants/05-romina-restaurant.webp', 'shot' => 'Breaded cutlet with saffron rice, lime and side salad', 'caption' => 'Breaded Cutlet & Saffron Rice', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/romina-restaurants/12-mixed-grill.webp',      'shot' => 'Mixed grill with rice, mushroom sauce and crispy greens', 'caption' => 'Mixed Grill', 'pos' => '50% 55%'],
            ],
        ],

        'koba' => [
            'name'      => 'KOBA',
            'tone'      => 'paper',
            'kicker'    => 'Patisserie & bakery, established 2020',
            'title'     => 'Crafted With Passion. Made Fresh.',
            'body'      => 'Artisan pastries, handcrafted cakes, signature breakfasts, specialty coffee and savory dishes, baked fresh by skilled pastry artisans across Addis Ababa.',
            'list'      => null,
            'locations' => [
                ['4 Kilo', 'Pastry & bakery takeaway center',        false],
                ['Sandford',  'Pastry, bakery, meals & drinks cafe',    false],
                ['Atlas',     'Pastry, bakery, meals & drinks cafe',    false],
                ['Peacock',   'Elevated coffee experience',    false],
                ['ICS',       'Pastry, bakery, meals & drinks cafe',    true],
            ],
            'phone'  => '+251 900 989 898',
            'cta'    => 'Visit KOBA',
            'href'   => "https://kobapatisserie.com/",
            'slides' => [
                ['src' => 'images/gallery/koba-patisserie/06-koba.webp', 'shot' => 'Glazed chocolate dome pastry on a marble board', 'caption' => 'Signature Dome Pastry', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/koba-patisserie/01-koba.webp', 'shot' => 'Layered macchiato in a glass cup and saucer',    'caption' => 'Macchiato',           'pos' => '50% 50%'],
                ['src' => 'images/gallery/koba-patisserie/03-koba.webp', 'shot' => 'Milk poured over iced coffee at the table',     'caption' => 'Iced Coffee',         'pos' => '50% 50%'],
            ],
        ],

        'bacio' => [
            'name'      => 'Bacio Cremeria',
            'tone'      => 'night',
            'kicker'    => 'A blend of authentic flavor and modern creativity.',
            'title'     => 'A Blend of Authentic Flavor and Modern Creativity.',
            'body'      => 'Handcrafted ice creams, gelatos, and elegant sundaes, made with fresh dairy ingredients sourced directly from Romina Dairy Farm. A premium ice cream and gelato concept in Addis Ababa, made for moments of connection.',
            'list'      => ['label' => 'What We Make', 'items' => ['Handcrafted Ice Creams', 'Gelatos', 'Elegant Sundaes', 'Fresh Dairy Ingredients']],
            'locations' => [
                ['Bole Japan',      'Ice cream, gelato & sundae cafe', false],
                ['Bisrate Gabriel', 'Ice cream, gelato & sundae cafe', false],
            ],
            'phone'  => null,
            'cta'    => 'Visit Bacio Cremeria',
            'href'   => route('business', 'bacio-cremeria'),
            'slides' => [
                ['src' => 'images/bacio/gelato-counter.webp',   'shot' => 'Bacio Cremeria gelato counter, flavors on display', 'caption' => 'The Gelato Counter',  'pos' => '50% 55%'],
                ['src' => 'images/bacio/gelato-plate.webp',     'shot' => 'Gelato scoops, plated with chocolate',              'caption' => 'Handcrafted Gelato',   'pos' => '50% 45%'],
                ['src' => 'images/bacio/waffle-ice-cream.webp', 'shot' => 'Waffle topped with ice cream and chocolate',        'caption' => 'Waffles & Ice Cream',  'pos' => '50% 45%'],
            ],
        ],

        'meskott' => [
            'name'      => 'Meskott',
            'tone'      => 'night',
            'kicker'    => 'Fine dining, VIP tables, a street food garden and the bar',
            'title'     => 'Meskott Culinary Experience',
            'body'      => 'International cuisine led by talented chefs, paired with a curated selection of wines, spirits and classy cocktails. The new upscale meeting place in the city.',
            'list'      => null,
            'locations' => [
                ['4 Kilo', 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', false, '+251 90 387 9999'],
            ],
            'phone'  => '+251 90 387 9999',
            'cta'    => 'Visit Meskott',
            'href'   => route('business', 'meskott-culinary'),
            'slides' => [
                ['src' => 'images/gallery/meskott-culinary/meskott_6.webp', 'shot' => 'Meskott entrance and green wall at Sellassie Twin Towers', 'caption' => 'The Entrance',       'pos' => '50% 50%'],
                ['src' => 'images/gallery/meskott-culinary/meskott_3.webp', 'shot' => 'Lounge seating beneath framed Ethiopian art',  'caption' => 'The Lounge',        'pos' => '50% 50%'],
                ['src' => 'images/gallery/meskott-culinary/meskott_5.webp', 'shot' => 'Garden terrace tables under the Meskott sign',  'caption' => 'The Garden Terrace', 'pos' => '50% 50%'],
            ],
        ],

        'coffee' => [
            'name'      => 'Romina Coffee',
            'tone'      => 'light',
            'kicker'    => 'Launched 2009',
            'title'     => 'Upholding the Legacy of Ethiopian Coffee',
            'body'      => "Ethiopian coffee is inseparable from daily life here. We export it as more than a commodity: one of life's little luxuries, spread across continents.",
            'list'      => ['label' => 'Markets', 'items' => ['Europe', 'The USA', 'Asia', 'The Middle East']],
            'locations' => null,
            'phone'     => null,
            'cta'       => 'Discover Romina Coffee',
            'href'      => route('business', 'romina-coffee'),
            'slides'    => [
                ['src' => 'images/coffee/processing-floor.webp',   'shot' => 'Coffee processing hall with sacks ready for export', 'caption' => 'Processing Hall', 'pos' => '50% 50%'],
                ['src' => 'images/coffee/green-beans-burlap.webp', 'shot' => 'Green coffee beans in a burlap sack',     'caption' => 'Green Coffee',     'pos' => '50% 50%'],
                ['src' => 'images/coffee/sample-tray.webp',        'shot' => 'A single green bean in a Romina sample tray',     'caption' => 'Sample Grading',   'pos' => '50% 50%'],
            ],
        ],

        'imports' => [
            'name'      => 'Romina Imports',
            'tone'      => 'paper',
            'kicker'    => 'Quality FMCG imported for local consumption',
            'title'     => 'From Our Kitchens to the Market',
            'body'      => "What began as sourcing for Romina's own hospitality operations grew into a dedicated importer supplying the Ethiopian market.",
            'list'      => ['label' => 'Categories', 'items' => ['Pastas', 'Pastry ingredients', 'Dairy products', 'Edible oils', 'Rice']],
            'locations' => null,
            'phone'     => '0116 669 100',
            'cta'       => 'Visit Romina Imports',
            'href'      => route('business', 'romina-imports'),
            'slides'    => [
                ['src' => config('businesses.brands.romina-imports.image'), 'shot' => 'Two partners reviewing a presentation on a tablet', 'caption' => 'With Our Partners', 'pos' => '50% 50%'],
            ],
        ],

        'jaquar' => [
            'name'      => 'Jaquar World',
            'tone'      => 'light',
            'kicker'    => 'Launched 2017 with Jaquar Group',
            'title'     => 'The Complete Bathroom Solutions Destination',
            'body'      => 'Faucets, shower systems, sanitaryware, smart toilets, jacuzzi baths and architectural lighting, from Artize luxury to Jaquar Premium.',
            'list'      => ['label' => 'Brands', 'items' => ['Artize (luxury)', 'Jaquar Premium']],
            'locations' => [
                ['Kazanchis',     'Zewditu Street, Joberg Building, 1st floor',                    false],
                ['Meskel Flower', 'Off Ethio-China Street, Martreza Building, ground floor',        false],
            ],
            'phone'  => '+251 944 143 073',
            'cta'    => 'Visit Jaquar World',
            'href'   => route('business', 'jaquar-world'),
            'slides' => [
                ['src' => 'images/portfolio/jaquar-basin.jpg', 'shot' => 'Square vessel basin with a wall-mounted matte black mixer', 'caption' => 'Basin & Wall Mixer', 'pos' => '50% 45%'],
                ['src' => 'images/gallery/jaquar-world/01-jaquar.webp', 'shot' => 'Outdoor wall and bollard lights on display', 'caption' => 'Outdoor Lighting', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/jaquar-world/02-jaquar.webp', 'shot' => 'Glass pendant light with a woven brass shade', 'caption' => 'Pendant Lighting', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/jaquar-world/03-jaquar.webp', 'shot' => 'Twin wall lights with frosted glass shades', 'caption' => 'Wall Lights',  'pos' => '50% 50%'],
            ],
        ],

    ];
    ?>

    <section class="sec brands tone-restaurants is-dark" id="brands">
        <div class="container">

            {{-- Section label --}}
            <div class="brands-head">
                <p class="mark" id="brandsMark">
                    <span class="mark-rule"></span>
                    <i></i>
                    Featured Brands
                </p>

                {{-- mobile only: step through the brands when the tab strip overflows --}}
                <div class="ac-arrows brands-arrows" role="group" aria-label="Browse brands">
                    <button class="brands-prev" aria-label="Previous brand">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </button>
                    <button class="brands-next" aria-label="Next brand">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>
                </div>
            </div>

            {{-- Tab strip --}}
            <div class="brand-list" role="tablist" aria-label="Business brands">
                @foreach ($brands_order as $k)
                    <button
                        class="brand-tab"
                        role="tab"
                        id="brand-tab-{{ $k }}"
                        aria-selected="{{ $k === 'restaurants' ? 'true' : 'false' }}"
                        aria-controls="brand-panel-{{ $k }}"
                        data-brand="{{ $k }}"
                        data-tone="{{ $k }}"
                        data-dark="{{ in_array($k, ['restaurants', 'koba', 'bacio', 'meskott', 'coffee', 'imports'], true) ? '1' : '' }}"
                        data-state="{{ $k === 'restaurants' ? 'active' : 'inactive' }}"
                    >{{ $brands[$k]['name'] }}</button>
                @endforeach
            </div>

            {{-- Tab panels --}}
            @foreach ($brands_order as $k)
                @php $b = $brands[$k]; @endphp
                <div
                    class="brand-pane"
                    id="brand-panel-{{ $k }}"
                    role="tabpanel"
                    aria-labelledby="brand-tab-{{ $k }}"
                    data-state="{{ $k === 'restaurants' ? 'active' : 'inactive' }}"
                >
                    <div class="bp">

                        {{-- LEFT: image gallery --}}
                        <div class="gallery">
                            <div class="stack gallery-stack">
                                @foreach ($b['slides'] as $si => $slide)
                                    <div
                                        class="slide{{ $si === 0 ? ' on' : '' }}"
                                        aria-hidden="{{ $si !== 0 ? 'true' : 'false' }}"
                                        data-caption="{{ $slide['caption'] }}"
                                    >
                                        <div class="brands-media">
                                            <div class="brands-media-inner">
                                                @if ($slide['src'])
                                                    <img loading="lazy" decoding="async"
                                                        src="{{ asset($slide['src']) }}"
                                                        alt="{{ $slide['shot'] }}"
                                                        style="object-position: {{ $slide['pos'] ?? '50% 50%' }}"
                                                        draggable="false"
                                                        class="kb"
                                                    >
                                                @else
                                                    <div class="ph" role="img" aria-label="Image placeholder: {{ $slide['shot'] }}">
                                                        <span class="ph-tag"><i></i>IMAGE PLACEHOLDER: OFFICIAL PHOTOGRAPH REQUIRED</span>
                                                        <span class="ph-shot">{{ $slide['shot'] }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            @if ($slide['src'])
                                                <span class="grade"></span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="gallery-bar">
                                <span class="gallery-cap">{{ $b['slides'][0]['caption'] }}</span>
                                <span class="prog tone-auto">
                                    <span class="prog-fill"></span>
                                </span>
                                <div class="arrows small">
                                    <button class="gal-prev" aria-label="Previous image">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </button>
                                    <button class="gal-next" aria-label="Next image">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- RIGHT: copy --}}
                        <div class="bp-copy">

                            <p class="bp-kicker">{{ $b['kicker'] }}</p>
                            <h3 class="bp-title">{{ $b['title'] }}</h3>
                            <p class="bp-body">{{ $b['body'] }}</p>

                            @if ($b['list'])
                                <div class="bp-list">
                                    <p class="bp-label">{{ $b['list']['label'] }}</p>
                                    <ul>
                                        @foreach ($b['list']['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if ($b['locations'])
                                <div class="bp-locs">
                                    <p class="bp-label">Locations</p>
                                    <ul>
                                        @foreach ($b['locations'] as $loc)
                                            @php [$loc_name, $loc_desc, $loc_soon, $loc_phone] = array_pad($loc, 4, null); @endphp
                                            <li>
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                <span>
                                                    <strong>{{ $loc_name }}</strong>
                                                    @if ($loc_soon)
                                                        <em class="soon">Coming soon</em>
                                                    @endif
                                                    <br>{{ $loc_desc }}
                                                    @if ($loc_phone)
                                                        <a class="bp-loc-phone" href="tel:{{ preg_replace('/\s/', '', $loc_phone) }}">
                                                            <i class="fa-solid fa-phone" aria-hidden="true"></i>{{ $loc_phone }}
                                                        </a>
                                                    @endif
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="bp-actions">
                                <a
                                    href="{{ $b['href'] ?? '#' }}"
                                    class="bp-cta-btn"
                                    @if (!$b['href']) onclick="return false;" @endif
                                >{{ $b['cta'] }}</a>

                                @if ($b['phone'] && !collect($b['locations'] ?? [])->contains(fn ($l) => !empty($l[3])))
                                    <a class="bp-phone" href="tel:{{ preg_replace('/\s/', '', $b['phone']) }}">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        {{ $b['phone'] }}
                                    </a>
                                @endif
                            </div>

                            @if (!$b['href'])
                                <p class="bp-note">Website link to be supplied{{ $b['name'] !== 'Romina Imports' ? '; social links (Instagram, TikTok, Facebook) pending' : '' }}.</p>
                            @endif

                        </div>{{-- .bp-copy --}}

                    </div>{{-- .bp --}}
                </div>{{-- .brand-pane --}}
            @endforeach

        </div>{{-- .container --}}
    </section>
