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
            'kicker'     => 'An iconic eatery in the heart of Addis Ababa',
            'intro'      => 'Home-styled dishes from across the world, served with the warmth of home.',
            'badge'      => ['value' => '1973', 'label' => 'Where it all began'],
            'image'      => 'images/business/restaurant.jpg',
            'title'      => 'The home of great service',
            'body'       => [
                "We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.",
<<<<<<< HEAD
                'Romina Group itself began in 1973 with a small, cherished restaurant in Arat Kilo. Hospitality has been at the heart of the Group ever since, and Romina Restaurants carries that legacy forward today.',
            ],
            'facts'      => [
                ['value' => '1973', 'label' => 'Our roots in Arat Kilo'],
=======
                'Romina Group itself began in 1973 with a small, cherished restaurant in 4 Kilo. Hospitality has been at the heart of the Group ever since, and Romina Restaurants carries that legacy forward today.',
            ],
            'facts'      => [
                ['value' => '1973', 'label' => 'Our roots in 4 Kilo'],
>>>>>>> development
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
<<<<<<< HEAD
                    ['icon' => 'fa-star',       'name' => 'Signature Agelgel'],
=======
>>>>>>> development
                ],
            ],
            'gallery'    => [
                ['src' => 'images/business/restaurant.jpg', 'shot' => 'A signature plate from the kitchen', 'caption' => 'From our kitchen'],
                ['src' => null, 'shot' => 'Balderas dining room, evening service',     'caption' => 'Balderas'],
                ['src' => null, 'shot' => 'Signature Agelgel, plated on the pass',     'caption' => 'Signature Agelgel'],
            ],
            'locations_label' => 'Visit us',
            'locations'  => [
<<<<<<< HEAD
                ['name' => 'Arat Kilo (4 Kilo)', 'desc' => 'Romina Restaurant, Bar & Cafe',      'tag' => null],
=======
                ['name' => '4 Kilo', 'desc' => 'Romina Restaurant, Bar & Cafe',      'tag' => null],
>>>>>>> development
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
                'Artisan pastries, handcrafted cakes, signature breakfasts, specialty coffee and savory dishes, baked fresh by skilled pastry artisans across Addis Ababa.',
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
                    ['icon' => 'fa-bread-slice',  'name' => 'Artisan pastries'],
                    ['icon' => 'fa-cake-candles', 'name' => 'Handcrafted cakes'],
                    ['icon' => 'fa-egg',          'name' => 'Signature breakfasts'],
                    ['icon' => 'fa-mug-hot',      'name' => 'Specialty coffee'],
                    ['icon' => 'fa-plate-wheat',  'name' => 'Savory dishes'],
                ],
            ],
            'gallery'    => [
                ['src' => 'images/business/baked.jpg', 'shot' => 'Handcrafted celebration cake, close detail', 'caption' => 'Handcrafted cakes'],
                ['src' => null, 'shot' => 'KOBA pastry counter, morning light',       'caption' => 'The pastry counter'],
                ['src' => null, 'shot' => 'Peacock roastery, espresso being pulled',  'caption' => 'Peacock roastery'],
            ],
            'locations_label' => 'Find a KOBA near you',
            'locations'  => [
<<<<<<< HEAD
                ['name' => 'Arat Kilo', 'desc' => 'Pastry & bakery takeaway center',     'tag' => null],
=======
                ['name' => '4 Kilo', 'desc' => 'Pastry & bakery takeaway center',     'tag' => null],
>>>>>>> development
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
<<<<<<< HEAD
            'kicker'     => 'Fine dining, VIP tables, a street food garden and the bar',
            'intro'      => 'The new upscale meeting place in the city.',
            'badge'      => ['value' => 'Arat Kilo', 'label' => 'Sellassie Twin Towers'],
            'image'      => null,
            'image_shot' => 'Meskott bar at night, backlit shelves',
            'title'      => 'An evening, elevated.',
            'body'       => [
                'International cuisine led by talented chefs, paired with a curated selection of wines, spirits and classy cocktails. The new upscale meeting place in the city.',
                'From intimate VIP tables to a lively street food garden and a bar made for long evenings, Meskott brings four distinct experiences together under one roof in Arat Kilo.',
            ],
            'facts'      => [
                ['value' => '4',   'label' => 'Experiences under one roof'],
                ['value' => '1',   'label' => 'Destination in Arat Kilo'],
                ['value' => 'Intl.', 'label' => 'Cuisine by talented chefs'],
            ],
            'highlights' => [
                'label' => 'The experience',
                'title' => 'Four ways to spend an evening at Meskott.',
                'items' => [
                    ['icon' => 'fa-utensils',              'name' => 'Fine dining'],
                    ['icon' => 'fa-crown',                 'name' => 'VIP tables'],
                    ['icon' => 'fa-tree',                  'name' => 'Street food garden'],
                    ['icon' => 'fa-martini-glass-citrus',  'name' => 'The bar'],
=======
            'kicker'     => 'Promising an unparalleled selection of International Cuisine',
            'intro'      => 'The new upscale meeting place in the city.',
            'badge'      => ['value' => '4 Kilo', 'label' => 'Selassie Twin Towers'],
            'image'      => null,
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
>>>>>>> development
                ],
            ],
            'gallery'    => [
                ['src' => null, 'shot' => 'Meskott bar at night, backlit shelves', 'caption' => 'The bar'],
                ['src' => null, 'shot' => 'VIP table area, set for dinner',        'caption' => 'VIP table area'],
<<<<<<< HEAD
                ['src' => null, 'shot' => 'Street food garden, brunch service',    'caption' => 'Street food garden'],
            ],
            'locations_label' => 'Find us',
            'locations'  => [
                ['name' => 'Arat Kilo', 'desc' => 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', 'tag' => null],
=======
                ['src' => null, 'shot' => 'Local food garden, brunch service',    'caption' => 'Street food garden'],
            ],
            'locations_label' => 'Find us',
            'locations'  => [
                ['name' => '4 Kilo', 'desc' => 'King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers', 'tag' => null],
>>>>>>> development
            ],
            'phone'      => '+251 90 387 9999',
            'website'    => null,
        ],

        'romina-coffee' => [
            'name'       => 'Romina Coffee',
            'menu'       => 'Romina Coffee',
            'group'      => 'coffee',
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
                ['value' => '7+',   'label' => 'Growing regions'],
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
                ['value' => '24',          'label' => 'Wet mill stations'],
                ['value' => '7+',          'label' => 'Coffee-growing regions'],
                ['value' => '3,000–3,500', 'label' => 'Tons of annual capacity'],
                ['value' => '30,000+',     'label' => 'Farmers'],
                ['value' => '6,000+',      'label' => 'Specialty farmer partners'],
                ['value' => '7',           'label' => 'Certified stations (Rainforest Alliance, Fair Trade, UTZ)'],
            ],
            'journey'    => ['Farm', 'Harvest', 'Wet mill', 'Processing', 'Cup testing', 'Export', 'Global market'],
            'gallery'    => [
                ['src' => 'images/coffee/drying-beds.jpg',  'shot' => 'Farmer tending drying beds',        'caption' => 'Drying beds'],
                ['src' => 'images/coffee/green-beans.jpg',  'shot' => 'Green coffee beans on a raised bed', 'caption' => 'Green coffee'],
                ['src' => 'images/coffee/hand-sorting.jpg', 'shot' => 'Hand-sorting coffee at a station',   'caption' => 'Hand-sorting'],
            ],
            'locations_label' => 'Growing regions',
            'locations_title' => 'Seven regions, one legacy.',
            'locations'  => [
                ['name' => 'Sidamo',     'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Limmu',      'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Yirgachefe', 'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Guji',       'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Nekempte',   'desc' => 'Coffee-growing region', 'tag' => null],
                ['name' => 'Anfilo',     'desc' => 'Coffee-growing region', 'tag' => null],
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
            'kicker'     => 'Launched 2017 with Jaquar Group',
            'intro'      => 'The complete bathroom solutions destination in Addis Ababa.',
            'badge'      => ['value' => '2017', 'label' => 'Launched with Jaquar Group'],
            'image'      => 'images/portfolio/jaguar.jpg',
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
                ['src' => 'images/portfolio/jaguar.jpg', 'shot' => 'Basin and wall-mounted faucet', 'caption' => 'Bathroom solutions'],
                ['src' => null, 'shot' => 'Jaquar World showroom, Kazanchis',             'caption' => 'Kazanchis showroom'],
                ['src' => null, 'shot' => 'Artize shower system, architectural lighting', 'caption' => 'Artize'],
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
