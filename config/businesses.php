<?php

/*
|--------------------------------------------------------------------------
| Romina Group businesses
|--------------------------------------------------------------------------
|
| One entry per brand page (/businesses/{slug}). This also drives the
| "Businesses" mega menu in the header, grouped by 'group'.
|
| Images: set 'image' / gallery 'src' to a path under public/, or null to
| show a styled "photo coming soon" placeholder described by 'shot'.
| Location 'tag' is an optional pill such as "Flagship" or "Coming soon".
| Optional 'locations_title' overrides the auto "N places to find us." heading.
|
| Gallery: drop photos into public/images/gallery/{slug}/ and they appear
| in the brand's photo mosaic automatically (sorted by filename; the caption
| comes from the filename, e.g. "02-bar-at-night.jpg" -> "Bar at night").
| 'gallery' entries below are added after those; entries with 'src' => null
| show as "photo coming soon" tiles until the mosaic has 7 tiles.
|
*/

return [

    'groups' => [
        'culinary' => 'Restaurants & Culinary Brands',
        'coffee'   => 'Romina Coffee',
        'other'    => 'Other Businesses',
    ],

    'brands' => [

        'romina-restaurants' => [
            'name'       => 'Romina Restaurants',
            'menu'       => 'Romina Restaurants',
            'group'      => 'culinary',
            'theme'      => 'restaurant',   // warm dining re-tint (see .bz-theme--restaurant)
            'kicker'     => 'An iconic eatery in the heart of Addis Ababa',
            'intro'      => 'Home-styled dishes from across the world, served with the warmth of home.',
            'badge'      => ['value' => '1973', 'label' => 'Where it all began'],
            'image'      => 'images/business/restaurant.jpg',
            'title'      => 'The home of great service',
            'body'       => [
                "We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.",
                'Romina Group itself began in 1973 with a small, cherished restaurant in 4 Kilo. Hospitality has been at the heart of the Group ever since, and Romina Restaurants carries that legacy forward today.',
            ],
            'facts'      => [
                ['value' => '1973', 'label' => 'Our roots in 4 Kilo'],
                ['value' => '2',    'label' => 'Locations in Addis Ababa'],
                ['value' => '4',    'label' => 'Culinary traditions'],
            ],
            'highlights' => [
                'label' => 'Our culinary promise',
                'title' => 'Comfort food, from every corner of the world.',
                'items' => [
                    ['icon' => 'fa-utensils',   'name' => 'European dishes'],
                    ['icon' => 'fa-bowl-rice',  'name' => 'Asian dishes'],
                    ['icon' => 'fa-pepper-hot', 'name' => 'Local Ethiopian dishes'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/business/restaurant.jpg', 'shot' => 'A signature plate from the kitchen', 'caption' => 'From our kitchen'],
                ['src' => null, 'shot' => 'Balderas dining room, evening service',     'caption' => 'Balderas'],
                ['src' => null, 'shot' => 'Signature Agelgel, plated on the pass',     'caption' => 'Signature Agelgel'],
                ['src' => null, 'shot' => 'Arat Kilo restaurant, bar and cafe',        'caption' => 'Arat Kilo'],
                ['src' => null, 'shot' => 'Chef finishing a European dish',            'caption' => 'European dishes'],
                ['src' => null, 'shot' => 'Traditional Ethiopian platter, shared',     'caption' => 'Ethiopian classics'],
                ['src' => null, 'shot' => 'Takeaway counter at Balderas',              'caption' => 'Takeaway center'],
            ],
            'locations_label' => 'Visit us',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'Romina Restaurant, Bar & Cafe',      'tag' => null],
                ['name' => 'Balderas',           'desc' => 'Romina Restaurant / Takeaway Center', 'tag' => null],
            ],
            'phone'      => null,
            'website'    => null,
        ],

        'koba-patisserie' => [
            'name'       => 'KOBA Patisserie & Bakery',
            'menu'       => 'KOBA Patisserie',
            'group'      => 'culinary',
            'kicker'     => 'Patisserie & bakery, established 2020',
            'intro'      => 'Crafted with passion. Made fresh, every day, across Addis Ababa.',
            'badge'      => ['value' => '2020', 'label' => 'Established'],
            'image'      => 'images/business/baked.jpg',
            'title'      => 'Crafted with passion. Made fresh.',
            'body'       => [
                'Pastries, Cakes, Signature Breakfasts, Specialty Coffee and Savory Dishes, baked fresh across Addis Ababa.',
                "Established in 2020, KOBA is built on craftsmanship and artisan baking, and has grown into a family of cafes and takeaway counters, including an elevated coffee roastery experience at Peacock.",
            ],
            'facts'      => [
                ['value' => '2020', 'label' => 'Established'],
                ['value' => '5',    'label' => 'Locations, one coming soon'],
                ['value' => '100%', 'label' => 'Baked fresh by our artisans'],
            ],
            'highlights' => [
                'label' => 'What we make',
                'title' => 'From the first croissant to the last slice of cake.',
                'items' => [
                    // 'desc' is shown on the KOBA page's sliding showcase cards.
                    // 'image' (optional) replaces the icon on the showcase card.
                    ['icon' => 'fa-bread-slice',  'name' => 'Artisan pastries',     'image' => 'images/koba/koba-pastries.webp',  'desc' => 'Flaky, buttery and shaped by hand by our pastry artisans.'],
                    ['icon' => 'fa-cake-candles', 'name' => 'Handcrafted cakes',    'image' => 'images/koba/koba-cakes.webp',     'desc' => 'Celebration cakes and slices, finished with care for every occasion.'],
                    ['icon' => 'fa-egg',          'name' => 'Signature breakfasts', 'image' => 'images/koba/koba-breakfast.webp', 'desc' => 'A slow, generous start to the day at our cafe tables.'],
                    ['icon' => 'fa-mug-hot',      'name' => 'Specialty coffee',     'image' => 'images/koba/koba-coffee.webp',    'desc' => 'From the espresso bar to the elevated roastery at Peacock.'],
                    ['icon' => 'fa-plate-wheat',  'name' => 'Savory dishes',        'image' => 'images/koba/koba-savory.webp',    'desc' => 'Fresh-baked savory plates for lunch, or for the road.'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/business/baked.jpg', 'shot' => 'Handcrafted celebration cake, close detail', 'caption' => 'Handcrafted cakes'],
                ['src' => null, 'shot' => 'KOBA pastry counter, morning light',       'caption' => 'The pastry counter'],
                ['src' => null, 'shot' => 'Peacock roastery, espresso being pulled',  'caption' => 'Peacock roastery'],
                ['src' => null, 'shot' => 'Fresh croissants out of the oven',         'caption' => 'Artisan pastries'],
                ['src' => null, 'shot' => 'Signature breakfast plate, cafe table',    'caption' => 'Signature breakfasts'],
                ['src' => null, 'shot' => 'Pastry artisan piping a cake',             'caption' => 'Our artisans'],
                ['src' => null, 'shot' => 'Atlas cafe interior, afternoon',           'caption' => 'Atlas cafe'],
            ],
            'locations_label' => 'Find a KOBA near you',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'Pastry & bakery takeaway center',     'tag' => null],
                ['name' => 'Sandford',  'desc' => 'Pastry, bakery, meals & drinks cafe', 'tag' => null],
                ['name' => 'Atlas',     'desc' => 'Pastry, bakery, meals & drinks cafe', 'tag' => null],
                ['name' => 'Peacock',   'desc' => 'Elevated coffee roastery experience', 'tag' => 'Flagship'],
                ['name' => 'ICS',       'desc' => 'Pastry, bakery, meals & drinks cafe', 'tag' => 'Coming soon'],
            ],
            'phone'      => '+251 900 989 898',
            'website'    => 'https://kobapatisserie.com/',
        ],

        'meskott-culinary' => [
            'name'       => 'Meskott Culinary Experience',
            'menu'       => 'Meskott Culinary',
            'group'      => 'culinary',
            'kicker'     => 'Promising an unparalleled selection of International Cuisine',
            'intro'      => 'The new upscale meeting place in the city.',
            'badge'      => ['value' => '4 Kilo', 'label' => 'Selassie Twin Towers'],
            'image'      => 'images/gallery/meskott-culinary/meskott_1.webp',
            'image_shot' => 'Meskott bar at night, backlit shelves',
            'title'      => 'Your Evening, Elevated.',
            'body'       => [
                'International cuisine led by talented chefs, paired with a curated selection of wines, spirits and classy cocktails.',
                'From intimate VIP tables to a lively selection and a bar made for long evenings, Meskott brings four distinct experiences together under one roof in 4 Kilo.',
            ],
            'facts'      => [
                ['value' => '4',   'label' => 'Experiences under one roof'],
                ['value' => '1',   'label' => 'Destination in 4 Kilo'],
                ['value' => 'Intl.', 'label' => 'Cuisine by Talented Chefs'],
            ],
            'highlights' => [
                'label' => 'The experience',
                'title' => 'Enjoying your Nights at Meskott.',
                'items' => [
                    ['icon' => 'fa-utensils',              'name' => 'Fine dining'],
                    ['icon' => 'fa-globe',                  'name' => 'International Cuisine'],
                    ['icon' => 'fa-martini-glass-citrus',  'name' => 'Immersive bar'],
                ],
            ],
            'gallery'    => [
                // The dining-room photo is picked up from public/images/gallery/meskott-culinary/
                ['src' => 'images/gallery/meskott-culinary/meskott_2.webp', 'shot' => 'Meskott bar at night, backlit shelves', 'caption' => 'The bar'],
                ['src' => 'images/gallery/meskott-culinary/meskott_3.webp', 'shot' => 'VIP table area, set for dinner',        'caption' => 'VIP table area'],
                ['src' => 'images/gallery/meskott-culinary/meskott_4.webp', 'shot' => 'Local food garden, brunch service',    'caption' => 'Street food garden'],
                ['src' => 'images/gallery/meskott-culinary/meskott_5.webp', 'shot' => 'Signature cocktail, garnished at the bar', 'caption' => 'Classy cocktails'],
                ['src' => 'images/gallery/meskott-culinary/meskott_6.webp', 'shot' => 'Chef plating an international dish',   'caption' => 'Our chefs'],
                ['src' => 'images/gallery/meskott-culinary/meskott_7.webp', 'shot' => 'Curated wine wall',                    'caption' => 'Wines & spirits'],
            ],
            'locations_label' => 'Find us',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', 'tag' => null],
            ],
            'phone'      => '+251 90 387 9999',
            'website'    => null,
        ],

        'romina-coffee' => [
            'name'       => 'Romina Coffee',
            'menu'       => 'Romina Coffee',
            'group'      => 'coffee',
            'theme'      => 'coffee',   // warm espresso/crema re-tint (see .bz-theme--coffee)
            'kicker'     => 'Ethiopian Arabica, exported since 2009',
            'intro'      => 'Upholding the legacy of Ethiopian coffee, from farm to cup, across four continents.',
            'badge'      => ['value' => '2009', 'label' => 'Exporting since'],
            'image'      => 'images/portfolio/coffee.jpg',
            'title'      => 'Upholding the legacy of Ethiopian coffee',
            'body'       => [
                "Ethiopian coffee is inseparable from daily life here. We export it as more than a commodity: one of life's little luxuries, spread across continents.",
                'Launched in 2009, Romina Coffee sources Arabica from seven growing regions and more than 30,000 farmers, and exports to Europe, the USA, Asia and the Middle East.',
            ],
            'facts'      => [
                ['value' => '2009', 'label' => 'Exporting since'],
                ['value' => '4',    'label' => 'Continents served'],
                ['value' => '6',   'label' => 'Growing regions'],
            ],
            'highlights' => [
                'label' => 'Where our coffee goes',
                'title' => 'From Ethiopian highlands to cups around the world.',
                'items' => [
                    ['icon' => 'fa-earth-europe',   'name' => 'Europe'],
                    ['icon' => 'fa-earth-americas', 'name' => 'The USA'],
                    ['icon' => 'fa-earth-asia',     'name' => 'Asia'],
                    ['icon' => 'fa-earth-africa',   'name' => 'The Middle East'],
                ],
            ],
            'stats'      => [
                ['value' => '24+',          'label' => 'Wet mill stations'],
                ['value' => '6',          'label' => 'Coffee-growing regions'],
                ['value' => '3,500+', 'label' => 'Tons of annual capacity'],
                ['value' => '30,000+',     'label' => 'Farmers Collaborated With'],
                ['value' => '6,000+',      'label' => 'Specialty Farmer Partners'],
                ['value' => '7',           'label' => 'Certified Rainforest Alliance & Organic Certifications'],
            ],
            'journey'    => ['Farm', 'Harvest', 'Wet mill', 'Processing', 'Cup testing', 'Export', 'Global market'],
            'gallery'    => [
                ['src' => 'images/coffee/drying-beds.jpg',  'shot' => 'Farmer tending drying beds',        'caption' => 'Drying beds'],
                ['src' => 'images/coffee/green-beans.jpg',  'shot' => 'Green coffee beans on a raised bed', 'caption' => 'Green coffee'],
                ['src' => 'images/coffee/hand-sorting.jpg', 'shot' => 'Hand-sorting coffee at a station',   'caption' => 'Hand-sorting'],
                ['src' => 'images/business/coffee.jpg',     'shot' => 'Ripe coffee cherries on the branch', 'caption' => 'Ripe cherries'],
                ['src' => 'images/hero/hero-01.jpg',        'shot' => 'Our team at a coffee nursery',       'caption' => 'At the nursery'],
                ['src' => 'images/hero/hero-03.jpg',        'shot' => 'Misty coffee-growing highlands',     'caption' => 'The highlands'],
                ['src' => null, 'shot' => 'Cup testing in the quality lab',                 'caption' => 'Cup testing'],
            ],
            'locations_label' => 'Growing regions',
            'locations_title' => 'Seven regions, one legacy.',
            'locations'  => [
                ['name' => 'Sidamo',     'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Limmu',      'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Yirgachefe', 'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Guji',       'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Nekempte',   'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Nansabo',    'desc' => 'Coffee-growing region', 'tag' => null],
            ],
            'directions' => false,
            'phone'      => null,
            'website'    => null,
        ],

        'romina-imports' => [
            'name'       => 'Romina Imports & Distribution',
            'menu'       => 'Romina Imports & Distribution',
            'group'      => 'other',
            'theme'          => 'imports',   // fresh market-green re-tint (see .bz-theme--imports)
            'show_highlights' => false,      // hidden: the brand cluster carries this page
            'show_gallery'    => false,
            'kicker'     => 'Quality FMCG imported for local consumption',
            'intro'      => 'Essential products, sourced with care and distributed across the Ethiopian market.',
            'badge'      => ['value' => '5', 'label' => 'Product categories'],
            'image'      => null,
            'image_shot' => 'Warehouse aisle, edible oils and rice',
            'title'      => 'From our kitchens to the market',
            'body'       => [
                "What began as sourcing for Romina's own hospitality operations grew into a dedicated importer supplying the Ethiopian market.",
                'Today, Romina Imports brings in quality fast-moving consumer goods and distributes essential products to the local market, built on the same standards we hold in our own kitchens.',
            ],
            'facts'      => [
                ['value' => '5',     'label' => 'Product categories'],
                ['value' => 'FMCG',  'label' => 'Imported for local consumption'],
                ['value' => 'ETH',   'label' => 'Distributing nationwide'],
            ],
            'highlights' => [
                'label' => 'What we import',
                'title' => 'Everyday essentials, held to our kitchen standards.',
                'items' => [
                    ['icon' => 'fa-wheat-awn',       'name' => 'Pastas'],
                    ['icon' => 'fa-bread-slice',     'name' => 'Pastry ingredients'],
                    ['icon' => 'fa-cow',             'name' => 'Dairy products'],
                    ['icon' => 'fa-bottle-droplet',  'name' => 'Edible oils'],
                    ['icon' => 'fa-bowl-rice',       'name' => 'Rice'],
                ],
            ],
            'gallery'    => [
                ['src' => null, 'shot' => 'Imported pasta range, studio still life', 'caption' => 'Pastas'],
                ['src' => null, 'shot' => 'Warehouse aisle, edible oils and rice',   'caption' => 'Distribution'],
                ['src' => null, 'shot' => 'Dairy and pastry ingredients, ready for dispatch', 'caption' => 'Ingredients'],
                ['src' => null, 'shot' => 'Edible oils, palletised in the warehouse',        'caption' => 'Edible oils'],
                ['src' => null, 'shot' => 'Rice sacks, stacked for distribution',            'caption' => 'Rice'],
                ['src' => null, 'shot' => 'Delivery truck loading at dawn',                  'caption' => 'On the road'],
                ['src' => null, 'shot' => 'Shelf of Romina-imported products in a store',    'caption' => 'On the shelf'],
            ],
            // TODO: replace with client-supplied brands and logos.
            // 'logo' is a path under public/ (e.g. 'images/imports/acme.png') or null
            // to render a clean name badge. 'category' drives the filter chips.
            // 'link' is an optional external/brand URL.
            // 'logo' is a path under public/ or null to render a clean name badge.
            'import_brands' => [
                ['name' => 'Sample Pasta Co.', 'category' => 'Pasta',       'logo' => null, 'link' => null],
                ['name' => 'Durum Mills',      'category' => 'Pasta',       'logo' => null, 'link' => null],
                ['name' => 'Golden Grain',     'category' => 'Rice',        'logo' => null, 'link' => null],
                ['name' => 'Valley Dairy',     'category' => 'Dairy',       'logo' => null, 'link' => null],
                ['name' => 'Highland Cream',   'category' => 'Dairy',       'logo' => null, 'link' => null],
                ['name' => 'Pure Press',       'category' => 'Edible Oils', 'logo' => null, 'link' => null],
                ['name' => 'Sunfield Oil',     'category' => 'Edible Oils', 'logo' => null, 'link' => null],
                ["name" => "Baker's Choice",   'category' => 'Bakery',      'logo' => null, 'link' => null],
            ],
            'locations_label' => null,
            'locations'  => [],
            'phone'      => '0116 669 100',
            'website'    => null,
        ],

        'jaquar-world' => [
            'name'       => 'Jaquar World Addis Ababa',
            'menu'       => 'Jaquar World – Addis Ababa',
            'group'      => 'other',
            'theme'      => 'jaguar',   // white-dominant, small blue (see .bz-theme--jaguar)
            'kicker'     => 'Launched 2017 with Jaquar Group',
            'intro'      => 'The complete bathroom solutions destination in Addis Ababa.',
            'badge'      => ['value' => '2017', 'label' => 'Launched with Jaquar Group'],
            'image'      => 'images/gallery/jaquar-world/jaguar_1.webp',
            'title'      => 'The complete bathroom solutions destination',
            'body'       => [
                'Faucets, shower systems, sanitaryware, smart toilets, jacuzzi baths and architectural lighting, from Artize luxury to Jaquar Premium.',
                'Jaquar World Addis Ababa opened in 2017 through a partnership between Jaquar Group and Romina Group, bringing a complete range of bathroom solutions to two showrooms in the city.',
            ],
            'facts'      => [
                ['value' => '2017', 'label' => 'Partnership with Jaquar Group'],
                ['value' => '2',    'label' => 'Showrooms in Addis Ababa'],
                ['value' => '2',    'label' => 'Brands: Artize & Jaquar Premium'],
            ],
            'highlights' => [
                'label' => 'In our showrooms',
                'title' => 'Everything the modern bathroom needs.',
                'items' => [
                    ['icon' => 'fa-faucet',     'name' => 'Faucets'],
                    ['icon' => 'fa-shower',     'name' => 'Shower systems'],
                    ['icon' => 'fa-toilet',     'name' => 'Sanitaryware'],
                    ['icon' => 'fa-microchip',  'name' => 'Smart toilets'],
                    ['icon' => 'fa-bath',       'name' => 'Jacuzzi baths'],
                    ['icon' => 'fa-lightbulb',  'name' => 'Architectural lighting'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/gallery/jaquar-world/jaguar_1.webp', 'shot' => 'Basin and wall-mounted faucet',                'caption' => 'Bathroom solutions'],
                ['src' => 'images/gallery/jaquar-world/jaguar_2.webp', 'shot' => 'Jaquar World showroom, Kazanchis',             'caption' => 'Kazanchis showroom'],
                ['src' => 'images/gallery/jaquar-world/jaguar_3.webp', 'shot' => 'Artize shower system, architectural lighting', 'caption' => 'Artize'],
                ['src' => 'images/gallery/jaquar-world/jaguar_4.webp', 'shot' => 'Meskel Flower showroom floor',                  'caption' => 'Meskel Flower'],
                ['src' => 'images/gallery/jaquar-world/jaguar_5.webp', 'shot' => 'Smart toilet display, detail',                  'caption' => 'Smart toilets'],
                ['src' => 'images/gallery/jaquar-world/jaguar_6.webp', 'shot' => 'Jacuzzi bath in a styled bathroom',             'caption' => 'Jacuzzi baths'],
                ['src' => 'images/gallery/jaquar-world/jaguar_7.webp', 'shot' => 'Premium faucet range on display',               'caption' => 'Faucets'],
            ],
            'locations_label' => 'Visit a showroom',
            'locations'  => [
                ['name' => 'Kazanchis',     'desc' => 'Zewditu Street, Joberg Building, 1st floor',             'tag' => null],
                ['name' => 'Meskel Flower', 'desc' => 'Off Ethio-China Street, Martreza Building, ground floor', 'tag' => null],
            ],
            'phone'      => '+251 944 143 073',
            'website'    => null,
        ],

    ],

];
