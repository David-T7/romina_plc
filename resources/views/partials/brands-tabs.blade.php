    {{--
         BRANDS / BUSINESSES — tabbed detail section
         Ported from React romina.jsx  (Brands + BrandPanel + Gallery components)
         Data array lives in the PHP block below — edit here to update content.
    --}}

    <?php
    $brands_order = ['restaurants', 'koba', 'meskott', 'coffee', 'imports', 'jaquar'];
    $brands = [

        'restaurants' => [
            'name'      => 'Romina Restaurants',
            'tone'      => 'light',
            'kicker'    => 'An iconic eatery in the heart of Addis Ababa',
            'title'     => 'The home of great service',
            'body'      => "We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.",
            'list'      => ['label' => 'Culinary promise', 'items' => ['European dishes', 'Asian dishes', 'Local Ethiopian dishes', 'Signature Agelgel']],
            'locations' => [
                ['Arat Kilo (4 Kilo)', 'Romina Restaurant, Bar & Cafe',          true],
                ['Balderas',           'Romina Restaurant / Takeaway Center',     false],
            ],
            'phone'  => null,
            'cta'    => 'Visit Romina Restaurants',
            'href'   => null,
            'slides' => [
                ['src' => 'images/gallery/romina-restaurants/08-romina-restaurant.webp', 'shot' => 'Balderas dining room, evening service',    'caption' => 'Balderas',                'pos' => '50% 50%'],
                ['src' => 'images/gallery/romina-restaurants/05-romina-restaurant.webp', 'shot' => 'Signature Agelgel, plated on the pass',    'caption' => 'Signature Agelgel',       'pos' => '50% 50%'],
                ['src' => 'images/gallery/romina-restaurants/07-romina-restaurant.webp', 'shot' => 'Catering quarter, centralized preparation','caption' => 'Centralized preparation', 'pos' => '50% 50%'],
            ],
        ],

        'koba' => [
            'name'      => 'KOBA',
            'tone'      => 'paper',
            'kicker'    => 'Patisserie & bakery, established 2020',
            'title'     => 'Crafted with passion. Made fresh.',
            'body'      => 'Artisan pastries, handcrafted cakes, signature breakfasts, specialty coffee and savory dishes, baked fresh by skilled pastry artisans across Addis Ababa.',
            'list'      => null,
            'locations' => [
                ['Arat Kilo', 'Pastry & bakery takeaway center',        false],
                ['Sandford',  'Pastry, bakery, meals & drinks cafe',    false],
                ['Atlas',     'Pastry, bakery, meals & drinks cafe',    false],
                ['Peacock',   'Elevated coffee roastery experience',    false],
                ['ICS',       'Pastry, bakery, meals & drinks cafe',    true],
            ],
            'phone'  => '+251 900 989 898',
            'cta'    => 'Visit KOBA',
            'href'   => "https://kobapatisserie.com/",
            'slides' => [
                ['src' => 'images/gallery/koba-patisserie/06-koba.webp', 'shot' => 'KOBA pastry counter, morning light',         'caption' => 'The pastry counter', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/koba-patisserie/01-koba.webp', 'shot' => 'Handcrafted celebration cake, close detail', 'caption' => 'Handcrafted cakes',  'pos' => '50% 50%'],
                ['src' => 'images/gallery/koba-patisserie/03-koba.webp', 'shot' => 'Peacock roastery, espresso being pulled',    'caption' => 'Peacock roastery',   'pos' => '50% 50%'],
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
                ['Arat Kilo', 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', false],
            ],
            'phone'  => '+251 90 387 9999',
            'cta'    => 'Visit Meskott',
            'href'   => null,
            'slides' => [
                ['src' => 'images/gallery/meskott-culinary/meskott_6.webp', 'shot' => 'Meskott bar at night, backlit shelves', 'caption' => 'The bar',            'pos' => '50% 50%'],
                ['src' => 'images/gallery/meskott-culinary/meskott_1.webp', 'shot' => 'VIP table area, set for dinner',         'caption' => 'VIP table area',    'pos' => '50% 50%'],
                ['src' => 'images/gallery/meskott-culinary/meskott_5.webp', 'shot' => 'Street food garden, brunch service',     'caption' => 'Street food garden', 'pos' => '50% 50%'],
            ],
        ],

        'coffee' => [
            'name'      => 'Romina Coffee',
            'tone'      => 'light',
            'kicker'    => 'Launched 2009',
            'title'     => 'Upholding the legacy of Ethiopian coffee',
            'body'      => "Ethiopian coffee is inseparable from daily life here. We export it as more than a commodity: one of life's little luxuries, spread across continents.",
            'list'      => ['label' => 'Markets', 'items' => ['Europe', 'The USA', 'Asia', 'The Middle East']],
            'locations' => null,
            'phone'     => null,
            'cta'       => 'Discover Romina Coffee',
            'href'      => '#coffee',
            'slides'    => [
                ['src' => 'images/coffee/drying-beds.jpg',  'shot' => 'Farmer tending drying beds',      'caption' => 'Drying beds',  'pos' => '50% 30%'],
                ['src' => 'images/coffee/green-beans.jpg',  'shot' => 'Green coffee beans on a raised bed','caption' => 'Green coffee','pos' => '50% 60%'],
                ['src' => 'images/coffee/hand-sorting.jpg', 'shot' => 'Hand-sorting coffee at a station', 'caption' => 'Hand-sorting', 'pos' => '50% 50%'],
            ],
        ],

        'imports' => [
            'name'      => 'Romina Imports',
            'tone'      => 'paper',
            'kicker'    => 'Quality FMCG imported for local consumption',
            'title'     => 'From our kitchens to the market',
            'body'      => "What began as sourcing for Romina's own hospitality operations grew into a dedicated importer supplying the Ethiopian market.",
            'list'      => ['label' => 'Categories', 'items' => ['Pastas', 'Pastry ingredients', 'Dairy products', 'Edible oils', 'Rice']],
            'locations' => null,
            'phone'     => '0116 669 100',
            'cta'       => 'Contact Romina Imports',
            'href'      => '#contact',
            'slides'    => [
                ['src' => null, 'shot' => 'Imported pasta range, studio still life',  'caption' => 'Pastas',       'pos' => '50% 50%'],
                ['src' => null, 'shot' => 'Warehouse aisle, edible oils and rice',    'caption' => 'Distribution', 'pos' => '50% 50%'],
            ],
        ],

        'jaquar' => [
            'name'      => 'Jaquar World',
            'tone'      => 'light',
            'kicker'    => 'Launched 2017 with Jaquar Group',
            'title'     => 'The complete bathroom solutions destination',
            'body'      => 'Faucets, shower systems, sanitaryware, smart toilets, jacuzzi baths and architectural lighting, from Artize luxury to Jaquar Premium.',
            'list'      => ['label' => 'Brands', 'items' => ['Artize (luxury)', 'Jaquar Premium']],
            'locations' => [
                ['Kazanchis',     'Zewditu Street, Joberg Building, 1st floor',                    false],
                ['Meskel Flower', 'Off Ethio-China Street, Martreza Building, ground floor',        false],
            ],
            'phone'  => '+251 944 143 073',
            'cta'    => 'Visit Jaquar World',
            'href'   => null,
            'slides' => [
                ['src' => 'images/portfolio/jaquar-basin.jpg', 'shot' => 'Basin and wall-mounted faucet', 'caption' => 'Bathroom solutions', 'pos' => '50% 45%'],
                ['src' => 'images/gallery/jaquar-world/01-jaquar.webp', 'shot' => 'Jaquar bathroom fixtures', 'caption' => 'Jaquar showroom', 'pos' => '50% 50%'],
                ['src' => 'images/gallery/jaquar-world/02-jaquar.webp', 'shot' => 'Jaquar bathroom fixtures', 'caption' => 'Artize',         'pos' => '50% 50%'],
                ['src' => 'images/gallery/jaquar-world/03-jaquar.webp', 'shot' => 'Jaquar bathroom fixtures', 'caption' => 'Premium range',  'pos' => '50% 50%'],
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
                    Featured brands
                </p>
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
                        data-dark="{{ in_array($k, ['restaurants', 'koba', 'meskott', 'coffee', 'imports'], true) ? '1' : '' }}"
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
                                                    <img
                                                        src="{{ asset($slide['src']) }}"
                                                        alt="{{ $slide['shot'] }}"
                                                        style="object-position: {{ $slide['pos'] ?? '50% 50%' }}"
                                                        draggable="false"
                                                        class="kb"
                                                    >
                                                @else
                                                    <div class="ph" role="img" aria-label="Image placeholder: {{ $slide['shot'] }}">
                                                        <span class="ph-tag"><i></i>IMAGE PLACEHOLDER — OFFICIAL PHOTOGRAPH REQUIRED</span>
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
                                            @php [$loc_name, $loc_desc, $loc_soon] = array_pad($loc, 3, false); @endphp
                                            <li>
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                <span>
                                                    <strong>{{ $loc_name }}</strong>
                                                    @if ($loc_soon)
                                                        <em class="soon">Coming soon</em>
                                                    @endif
                                                    <br>{{ $loc_desc }}
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

                                @if ($b['phone'])
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
