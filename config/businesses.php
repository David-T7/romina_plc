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
            'badge'      => ['value' => '1973', 'label' => 'Where It All Began'],
            'image'      => 'images/gallery/romina-restaurants/11-clay-pot-special.webp',
            'title'      => 'The Home of Great Service',
            'body'       => [
                "We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.",
                'Romina Group itself began in 1973 with a small, cherished restaurant in 4 Kilo. Hospitality has been at the heart of the Group ever since, and Romina Restaurants carries that legacy forward today.',
            ],
            'facts'      => [
                ['value' => '1973', 'label' => 'Our Roots in 4 Kilo'],
                ['value' => '2',    'label' => 'Locations in Addis Ababa'],
                ['value' => '4',    'label' => 'Culinary Traditions'],
            ],
            'highlights' => [
                'label' => 'Our Culinary Promise',
                'title' => 'Comfort Food, From Every Corner of the World.',
                'items' => [
                    ['icon' => 'fa-utensils',   'name' => 'European Dishes'],
                    ['icon' => 'fa-bowl-rice',  'name' => 'Asian Dishes'],
                    ['icon' => 'fa-pepper-hot', 'name' => 'Ethiopian Dishes'],
                ],
            ],
            'gallery'    => [
                ['src' => null, 'shot' => 'Balderas dining room, evening service',     'caption' => 'Balderas'],
                ['src' => null, 'shot' => 'Signature Agelgel, plated on the pass',     'caption' => 'Signature Agelgel'],
                ['src' => null, 'shot' => '4 Kilo restaurant, bar and cafe',        'caption' => '4 Kilo'],
                ['src' => null, 'shot' => 'Chef finishing a European dish',            'caption' => 'European Dishes'],
                ['src' => null, 'shot' => 'Traditional Ethiopian platter, shared',     'caption' => 'Ethiopian Classics'],
                ['src' => null, 'shot' => 'Takeaway counter at Balderas',              'caption' => 'Takeaway Center'],
            ],
            'locations_label' => 'Visit Us',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'Romina Restaurant, Bar & Cafe',      'tag' => null],
                ['name' => 'Balderas', 'desc' => 'Romina Restaurant / Takeaway Center', 'tag' => null],
            ],
            'phone'      => null,
            'website'    => null,
        ],

        'koba-patisserie' => [
            'name'       => 'KOBA Patisserie & Bakery',
            'menu'       => 'KOBA Patisserie',
            'group'      => 'culinary',
            'theme'      => 'koba',   // KOBA green re-tint of the shared lower sections (see .bz-theme--koba)
            'kicker'     => 'Patisserie & bakery, established 2020',
            'intro'      => 'Crafted with passion. Made fresh, every day, across Addis Ababa.',
            'badge'      => ['value' => '2020', 'label' => 'Established'],
            'image'      => 'images/business/baked.jpg',
            'title'      => 'Crafted With Passion. Made Fresh.',
            'body'       => [
                'Pastries, Cakes, Signature Breakfasts, Coffee and Savory Dishes, baked fresh across Addis Ababa.',
                "Established in 2020, KOBA is built on craftsmanship and artisan baking, and has grown into a family of cafes and takeaway counters, including an elevated coffee experience",
            ],
            'facts'      => [
                ['value' => '2020', 'label' => 'Established'],
                ['value' => '5',    'label' => 'Locations, One Coming Soon'],
                ['value' => '100%', 'label' => 'Baked Fresh'],
            ],
            'highlights' => [
                'label' => 'What We Make',
                'title' => 'From the first croissant to the last slice of cake.',
                'items' => [
                    // 'desc' is shown on the KOBA page's sliding showcase cards.
                    // 'image' (optional) replaces the icon on the showcase card.
                    ['icon' => 'fa-bread-slice',  'name' => 'Pastries',     'image' => 'images/koba/koba-pastries.webp',  'desc' => 'Flaky, buttery and shaped to perfection'],
                    ['icon' => 'fa-cake-candles', 'name' => 'Handcrafted Cakes',    'image' => 'images/koba/koba-cakes.jpg',     'desc' => 'Celebration cakes and slices, finished with care'],
                    ['icon' => 'fa-egg',          'name' => 'Signature Breakfasts', 'image' => 'images/koba/koba-breakfast.webp', 'desc' => 'A slow, generous start to the day '],
                    ['icon' => 'fa-mug-hot',      'name' => 'Coffee',     'image' => 'images/koba/koba-coffee.webp',    'desc' => 'From the espresso bar to the elevated roastery'],
                    ['icon' => 'fa-plate-wheat',  'name' => 'Savory Dishes',        'image' => 'images/koba/koba-savory.webp',    'desc' => 'Fresh-baked savory plates'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/business/baked.jpg', 'shot' => 'Koba', 'caption' => 'Koba'],
                ['src' => null, 'shot' => 'KOBA pastry counter, morning light',       'caption' => 'The Pastry Counter'],
                ['src' => null, 'shot' => 'Peacock roastery, espresso being pulled',  'caption' => 'Peacock Roastery'],
                ['src' => null, 'shot' => 'Fresh croissants out of the oven',         'caption' => 'Pastries'],
                ['src' => null, 'shot' => 'Signature breakfast plate, cafe table',    'caption' => 'Signature Breakfasts'],
                ['src' => null, 'shot' => 'Pastrycake',             'caption' => 'Our Selected List'],
                ['src' => null, 'shot' => 'Atlas cafe interior, afternoon',           'caption' => 'Atlas Cafe'],
            ],
            'locations_label' => 'Find a KOBA Near You',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'Pastry & bakery takeaway center',     'tag' => null],
                ['name' => 'Sandford',  'desc' => 'Pastry, bakery, meals & drinks cafe', 'tag' => null],
                ['name' => 'Atlas',     'desc' => 'Pastry, bakery, meals & drinks cafe', 'tag' => null],
                ['name' => 'Peacock',   'desc' => 'Elevated coffee experience', 'tag' => null],
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
            'hero_logo'  => 'images/brands/logos/meskott.png',   // shown large in place of the hero title
            'title'      => 'Your Evening, Elevated.',
            'body'       => [
                'International cuisine led by talented chefs, paired with a curated selection of wines, spirits and classy cocktails.',
                'From intimate VIP tables to a lively selection and a bar made for long evenings, Meskott brings four distinct experiences together under one roof in 4 Kilo.',
            ],
            'facts'      => [
                ['value' => 'Luxurious',   'label' => 'Experiences Under One Roof'],
                ['value' => 'Elegant',   'label' => 'Contemporary Fine Dining'],
                ['value' => 'Creative.', 'label' => 'Cuisine by Talented Chefs'],
            ],
            'highlights' => [
                'label' => 'The Experience',
                'title' => 'Enjoying Your Nights at Meskott.',
                'items' => [
                    // 'image' = the section background shown while this card is hovered
                    ['icon' => 'fa-utensils',             'name' => 'Fine Dining',           'image' => 'images/gallery/meskott-culinary/11-garden-table-set.webp'],
                    ['icon' => 'fa-globe',                'name' => 'International Cuisine', 'image' => 'images/gallery/meskott-culinary/12-glazed-salmon.webp'],
                    ['icon' => 'fa-martini-glass-citrus', 'name' => 'Immersive Bar',         'image' => 'images/gallery/meskott-culinary/meskott_7.webp'],
                    ['icon' => 'fa-music',                'name' => 'Jazz Nights',           'image' => 'images/gallery/meskott-culinary/meskott_3.webp'],
                ],
            ],
            'gallery'    => [
                // The dining-room photo is picked up from public/images/gallery/meskott-culinary/
                ['src' => 'images/gallery/meskott-culinary/meskott_2.webp', 'shot' => 'Meskott bar at night, backlit shelves', 'caption' => 'The Bar'],
                ['src' => 'images/gallery/meskott-culinary/meskott_3.webp', 'shot' => 'VIP table area, set for dinner',        'caption' => 'VIP Table Area'],
                ['src' => 'images/gallery/meskott-culinary/meskott_4.webp', 'shot' => 'Local food garden, brunch service',    'caption' => 'Street Food Garden'],
                ['src' => 'images/gallery/meskott-culinary/meskott_5.webp', 'shot' => 'Signature cocktail, garnished at the bar', 'caption' => 'Classy Cocktails'],
                ['src' => 'images/gallery/meskott-culinary/meskott_6.webp', 'shot' => 'Chef plating an international dish',   'caption' => 'Our Chefs'],
                ['src' => 'images/gallery/meskott-culinary/meskott_7.webp', 'shot' => 'Curated wine wall',                    'caption' => 'Wines & Spirits'],
            ],
            'locations_label' => 'Find Us',
            // Photo slider beside the "Worth the trip." card (advances every 6 s)
            'location_slides' => [
                ['src' => 'images/gallery/meskott-culinary/meskott_6.webp',              'caption' => 'Meskott at Sellassie Twin Towers'],
                ['src' => 'images/gallery/meskott-culinary/10-garden-long-table.webp',   'caption' => 'The Garden Terrace'],
                ['src' => 'images/gallery/meskott-culinary/08-curtained-dining.webp',    'caption' => 'The Dining Room'],
                ['src' => 'images/gallery/meskott-culinary/15-sauce-pour.webp',          'caption' => 'Finished at the Table'],
                ['src' => 'images/gallery/meskott-culinary/18-chef-plating.webp',        'caption' => 'From Our Chefs'],
                ['src' => 'images/gallery/meskott-culinary/17-smoking-skewers.webp',     'caption' => 'Off the Grill'],
            ],
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', 'tag' => null],
            ],
            'phone'      => '+251 90 387 9999',
            'website'    => null,
        ],

        'bacio-cremeria' => [
            'name'       => 'Bacio Cremeria',
            'menu'       => 'Bacio Cremeria',
            'group'      => 'culinary',
            'theme'      => 'bacio',   // Bacio's own design (.bc-*); colours from the Bacio logo
            'kicker'     => 'Authentic flavor, modern creativity',
            'intro'      => 'Handcrafted ice creams, gelatos and elegant sundaes, crafted with care and made for moments of connection. A fresh, indulgent experience in the heart of Addis Ababa.',
            'badge'      => ['value' => 'New', 'label' => 'Handcrafted in Addis Ababa'],
            'image'      => 'images/bacio/gelato-counter.webp',
            'image_shot' => 'Bacio Cremeria gelato counter',
            'title'      => 'A Blend of Authentic Flavor and Modern Creativity.',
            'body'       => [
                'A contemporary home for handcrafted ice creams, gelatos and elegant sundaes, made with fresh ingredients and thoughtful craft for sharing.',
                'Every creation balances authentic flavor with modern creativity: simple, quality ingredients turned into treats that feel both familiar and distinctive.',
            ],
            // Bacio-only content blocks, rendered by businesses/partials/bacio.blade.php
            'dairy'      => 'Fresh dairy sourced directly from Romina Dairy Farm. A farm-to-creation connection that brings freshness and authenticity into every scoop, sundae and cone.',
            'moment'     => 'Whether it is friends, a family outing, or simply treating yourself, Bacio is designed to make the moment memorable. Come for the flavor, stay for the experience.',
            'closing'    => 'Make room for something delicious: handcrafted treats in a space made for connection.',
            'highlights' => [
                'label' => 'What We Make',
                'title' => 'Handcrafted Ice Creams, Gelatos & Elegant Sundaes.',
                'items' => [
                    ['icon' => 'fa-ice-cream',  'name' => 'Handcrafted Ice Creams', 'desc' => 'Freshly crafted for moments of pure indulgence.'],
                    ['icon' => 'fa-bowl-food',  'name' => 'Gelatos',                'desc' => 'Smooth, rich and full of authentic flavor.'],
                    ['icon' => 'fa-wine-glass', 'name' => 'Elegant Sundaes',        'desc' => 'Beautifully presented, made to feel special.'],
                    ['icon' => 'fa-cow',        'name' => 'Fresh Dairy',            'desc' => 'Sourced directly from Romina Dairy Farm.'],
                ],
            ],
            'gallery' => [
                ['src' => 'images/bacio/gelato-counter.webp', 'shot' => 'Gelato flavors at Bacio Cremeria', 'caption' => 'Gelato Flavors'],
                ['src' => 'images/bacio/gelato-plate.webp', 'shot' => 'Handcrafted ice creams at Bacio Cremeria', 'caption' => 'Handcrafted Ice Creams'],
                ['src' => 'images/bacio/waffle-ice-cream.webp', 'shot' => 'Waffles & ice cream at Bacio Cremeria', 'caption' => 'Waffles & Ice Cream'],
                ['src' => 'images/bacio/affogato.webp', 'shot' => 'Affogato at Bacio Cremeria', 'caption' => 'Affogato'],
                ['src' => 'images/bacio/iced-latte.webp', 'shot' => 'Iced coffee at Bacio Cremeria', 'caption' => 'Iced Coffee'],
            ],
            'locations_label' => 'Visit Bacio',
            'locations'  => [
                ['name' => 'Bole Japan',      'desc' => 'Ice cream, gelato & sundae cafe', 'tag' => null],
                ['name' => 'Bisrate Gabriel', 'desc' => 'Ice cream, gelato & sundae cafe', 'tag' => null],
            ],
            'phone'      => null,
            'website'    => null,
        ],

        'romina-coffee' => [
            'name'       => 'Romina Coffee',
            'menu'       => 'Coffee Export',
            'group'      => 'coffee',
            'theme'      => 'coffee',   // black & white re-tint with the site red (see .bz-theme--coffee)
            'kicker'     => 'Ethiopian Arabica, exported since 2009',
            'intro'      => 'Upholding the legacy of Ethiopian coffee, from farm to cup, across four continents.',
            'badge'      => ['value' => '2009', 'label' => 'Exporting Since'],
            'image'      => 'images/coffee/warehouse-stacks.webp',
            'title'      => 'Upholding the Legacy of Ethiopian Coffee',
            'body'       => [
                "Ethiopian coffee is inseparable from daily life here. We export it as more than a commodity: one of life's little luxuries, spread across continents.",
                'Launched in 2009, Romina Coffee sources Arabica from seven growing regions and more than 30,000 farmers, and exports to Europe, the USA, Asia and the Middle East.',
            ],
            'facts'      => [
                ['value' => '2009', 'label' => 'Exporting Since'],
                ['value' => '4',    'label' => 'Continents Served'],
                ['value' => '6',   'label' => 'Growing Regions'],
            ],
            'export_journey' => true,   // "Where our coffee goes" renders as the interactive map (partials/coffee-journey)
            'highlights' => [
                'label' => 'Where Our Coffee Goes',
                'title' => 'From Ethiopian Highlands to Cups Around the World.',
                'items' => [
                    ['icon' => 'fa-earth-europe',   'name' => 'Europe'],
                    ['icon' => 'fa-earth-americas', 'name' => 'The USA'],
                    ['icon' => 'fa-earth-asia',     'name' => 'Asia'],
                    ['icon' => 'fa-earth-africa',   'name' => 'The Middle East'],
                ],
            ],
            'stats'      => [
                ['value' => '24+',          'label' => 'Wet Mill Stations'],
                ['value' => '6',          'label' => 'Coffee-Growing Regions'],
                ['value' => '3,500+', 'label' => 'Tons of Annual Capacity'],
                ['value' => '30,000+',     'label' => 'Farmers Collaborated With'],
                ['value' => '6,000+',      'label' => 'Specialty Farmer Partners'],
                ['value' => '7',           'label' => 'Certified Rainforest Alliance & Organic Certifications'],
            ],
            'journey'    => ['Farm', 'Harvest', 'Wet mill', 'Processing', 'Cup testing', 'Export', 'Global market'],
            'gallery'    => [
                ['src' => 'images/coffee/sorting-line.webp',       'shot' => 'Hand-sorting green coffee on the sorting line',     'caption' => 'Hand-Sorting'],
                ['src' => 'images/coffee/romina-sack.webp',        'shot' => 'Romina sack: produce of Ethiopia, washed Arabica',  'caption' => 'Produce of Ethiopia'],
                ['src' => 'images/coffee/quality-control.webp',    'shot' => 'Quality control in the warehouse',                  'caption' => 'Quality Control'],
                ['src' => 'images/coffee/cupping-table.webp',      'shot' => 'Green coffee samples on the cupping table',         'caption' => 'Cup Testing'],
                ['src' => 'images/coffee/warehouse-gate.webp',     'shot' => 'Sacks stacked in the export warehouse',             'caption' => 'Ready for Export'],
                ['src' => 'images/coffee/sample-tray.webp',        'shot' => 'A green bean in a Romina sample tray',              'caption' => 'Sample Grading'],
                ['src' => 'images/coffee/green-beans-burlap.webp', 'shot' => 'Green coffee beans in a burlap sack',               'caption' => 'Green Coffee'],
                ['src' => 'images/coffee/processing-floor.webp',   'shot' => 'Our processing and storage floor',                  'caption' => 'Processing Floor'],
                ['src' => 'images/coffee/warehouse-stacks.webp',   'shot' => 'Coffee sacks stacked on pallets',                   'caption' => 'The Warehouse'],
            ],
            'locations_label' => 'Growing Regions',
            'locations_title' => 'Seven Regions, One Legacy.',
            'locations'  => [
                ['name' => 'Sidamo',     'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Limmu',      'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Yirgacheffe', 'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Guji',       'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Neqemte',   'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Nansebo',    'desc' => 'Coffee-growing region', 'tag' => null],
            ],
            'directions' => false,
            'phone'      => null,
            'website'    => null,
        ],

        'coffee-roastery' => [
            'name'         => 'Coffee Roastery',
            'menu'         => 'Coffee Roastery',
            'group'        => 'coffee',
            'coming_soon'  => true,   // renders the "Coming Soon" page (businesses/show.blade.php)
            'kicker'       => 'Coming soon',
            'intro'        => '',
            'image'        => null,
            'title'        => '',
            'body'         => [],
            'facts'        => [],
            'show_highlights' => false,
            'show_gallery' => false,
            'gallery'      => [],
            'locations'    => [],
            'phone'        => null,
            'website'      => null,
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
            'badge'      => ['value' => '5', 'label' => 'Product Categories'],
            'image'      => 'images/hero/imports-partners.webp',
            'image_shot' => 'Warehouse aisle, edible oils and rice',
            'title'      => 'Connecting you directly to premium global products',
            'body'       => [
                "What began as sourcing for Romina's own hospitality operations grew into a dedicated importer supplying the Ethiopian market.",
                'Today, Romina Imports brings in quality fast-moving consumer goods and distributes essential products to the local market, built on the same standards we hold in our own kitchens.',
            ],
            'facts'      => [
                ['value' => '5',     'label' => 'Product Categories'],
                ['value' => 'FMCG',  'label' => 'Imported for Local Consumption'],
                ['value' => 'ETH',   'label' => 'Distributing Nationwide'],
            ],
            'highlights' => [
                'label' => 'What We Import',
                'title' => 'Everyday Essentials, Held to Our Kitchen Standards.',
                'items' => [
                    ['icon' => 'fa-wheat-awn',       'name' => 'Pastas'],
                    ['icon' => 'fa-bread-slice',     'name' => 'Pastry Ingredients'],
                    ['icon' => 'fa-cow',             'name' => 'Dairy Products'],
                    ['icon' => 'fa-bottle-droplet',  'name' => 'Edible Oils'],
                    ['icon' => 'fa-bowl-rice',       'name' => 'Rice'],
                ],
            ],
            'gallery'    => [
                ['src' => null, 'shot' => 'Imported pasta range, studio still life', 'caption' => 'Pastas'],
                ['src' => null, 'shot' => 'Warehouse aisle, edible oils and rice',   'caption' => 'Distribution'],
                ['src' => null, 'shot' => 'Dairy and pastry ingredients, ready for dispatch', 'caption' => 'Ingredients'],
                ['src' => null, 'shot' => 'Edible oils, palletised in the warehouse',        'caption' => 'Edible Oils'],
                ['src' => null, 'shot' => 'Rice sacks, stacked for distribution',            'caption' => 'Rice'],
                ['src' => null, 'shot' => 'Delivery truck loading at dawn',                  'caption' => 'On the Road'],
                ['src' => null, 'shot' => 'Shelf of Romina-imported products in a store',    'caption' => 'On the Shelf'],
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
            'menu'       => 'Jaquar World Addis Ababa',
            'group'      => 'other',
            'theme'      => 'jaguar',   // white-dominant, small blue (see .bz-theme--jaguar)
            'kicker'     => 'Launched 2017 with Jaquar Group',
            'intro'      => 'The complete bathroom solutions destination in Addis Ababa.',
            'badge'      => ['value' => '2017', 'label' => 'Launched With Jaquar Group'],
            'image'      => 'images/gallery/jaquar-world/jaguar_1.webp',
            'title'      => 'The Complete Bathroom Solutions Destination',
            'body'       => [
                'Faucets, shower systems, sanitaryware, smart toilets, jacuzzi baths and architectural lighting, from Artize luxury to Jaquar Premium.',
                'Jaquar World Addis Ababa opened in 2017 through a partnership between Jaquar Group and Romina Group, bringing a complete range of bathroom solutions to two showrooms in the city.',
            ],
            'facts'      => [
                ['value' => '2017', 'label' => 'Partnership With Jaquar Group'],
                ['value' => '2',    'label' => 'Showrooms in Addis Ababa'],
                ['value' => '2',    'label' => 'Brands: Artize & Jaquar Premium'],
            ],
            'highlights' => [
                'label' => 'In Our Showrooms',
                'title' => 'Everything the Modern Bathroom Needs.',
                'items' => [
                    ['icon' => 'fa-faucet',     'name' => 'Faucets'],
                    ['icon' => 'fa-shower',     'name' => 'Shower Systems'],
                    ['icon' => 'fa-toilet',     'name' => 'Sanitaryware'],
                    ['icon' => 'fa-microchip',  'name' => 'Smart Toilets'],
                    ['icon' => 'fa-bath',       'name' => 'Jacuzzi Baths'],
                    ['icon' => 'fa-lightbulb',  'name' => 'Architectural Lighting'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/gallery/jaquar-world/jaguar_1.webp', 'shot' => 'Basin and wall-mounted faucet',                'caption' => 'Bathroom Solutions'],
                ['src' => 'images/gallery/jaquar-world/jaguar_2.webp', 'shot' => 'Jaquar World showroom, Kazanchis',             'caption' => 'Kazanchis Showroom'],
                ['src' => 'images/gallery/jaquar-world/jaguar_3.webp', 'shot' => 'Artize shower system, architectural lighting', 'caption' => 'Artize'],
                ['src' => 'images/gallery/jaquar-world/jaguar_4.webp', 'shot' => 'Meskel Flower showroom floor',                  'caption' => 'Meskel Flower'],
                ['src' => 'images/gallery/jaquar-world/jaguar_5.webp', 'shot' => 'Smart toilet display, detail',                  'caption' => 'Smart Toilets'],
                ['src' => 'images/gallery/jaquar-world/jaguar_6.webp', 'shot' => 'Jacuzzi bath in a styled bathroom',             'caption' => 'Jacuzzi Baths'],
                ['src' => 'images/gallery/jaquar-world/jaguar_7.webp', 'shot' => 'Premium faucet range on display',               'caption' => 'Faucets'],
            ],
            'locations_label' => 'Visit a Showroom',
            'locations'  => [
                ['name' => 'Kazanchis',     'desc' => 'Zewditu Street, Joberg Building, 1st floor',             'tag' => null],
                ['name' => 'Meskel Flower', 'desc' => 'Off Ethio-China Street, Martreza Building, ground floor', 'tag' => null],
            ],
            'phone'      => '+251 944 143 073',
            'website'    => null,
        ],

    ],

];
