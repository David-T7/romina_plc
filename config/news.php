<?php

return [

    /*
    |--------------------------------------------------------------------------
    | News & press articles
    |--------------------------------------------------------------------------
    | TODO: DUMMY CONTENT — replace with client-supplied news (or a CMS /
    | database) before launch. Images reuse existing site photos.
    |
    | Each article's 'category' must be one of the keys in 'categories'.
    | The newest item (by 'date') is shown first and used as the featured story.
    | Images are relative to public/.
    */

    'categories' => [
        'events'                => ['label' => 'Events',                  'icon' => 'fa-calendar-days'],
        'launches'              => ['label' => 'Launches',                'icon' => 'fa-rocket',              'full' => 'New product & branch launches'],
        'coffee-harvest'        => ['label' => 'Coffee harvest',          'icon' => 'fa-seedling',            'full' => 'Coffee harvest updates'],
        'awards'                => ['label' => 'Awards',                  'icon' => 'fa-trophy'],
        'csr'                   => ['label' => 'CSR',                     'icon' => 'fa-hand-holding-heart',  'full' => 'CSR activities'],
        'restaurant-promotions' => ['label' => 'Restaurant promotions',   'icon' => 'fa-utensils'],
        'group-news'            => ['label' => 'Group news',              'icon' => 'fa-newspaper',           'full' => 'Other Group news'],
    ],

    'articles' => [

        /* ---------------- EVENTS ---------------- */

        [
            'slug'     => 'coffee-cupping-evening',
            'title'    => 'An evening of Ethiopian coffee: our annual cupping night',
            'category' => 'events',
            'date'     => '2026-09-20',
            'image'    => 'images/coffee/cupping-table.webp',
            'excerpt'  => 'Guests, partners and buyers joined our coffee team to taste this season\'s lots from across Ethiopia\'s growing regions.',
            'body'     => [
                'Romina Coffee welcomed partners, buyers and friends of the Group for an evening of cupping, bringing together lots from several of Ethiopia\'s best-known growing regions.',
                'Our quality team guided guests through each coffee — from bright, floral washed lots to deeper, fruit-forward naturals — sharing the story of the farmers and stations behind every cup.',
                'Events like this are a chance to celebrate the people who make Ethiopian coffee exceptional, and to share that pride with the partners who carry it around the world.',
            ],
        ],

        [
            'slug'     => 'hospitality-expo-addis',
            'title'    => 'Romina Group joins the Addis Ababa hospitality showcase',
            'category' => 'events',
            'date'     => '2026-05-14',
            'image'    => 'images/hero/hero-02.jpg',
            'excerpt'  => 'Our hospitality, coffee and imports teams met industry peers and partners at the city\'s hospitality showcase.',
            'body'     => [
                'Teams from across Romina Group took part in the Addis Ababa hospitality showcase, meeting industry peers, suppliers and partners from across the region.',
                'Visitors to our stand sampled KOBA pastries and Romina Coffee, and learned about the Group\'s work across restaurants, imports and distribution.',
                'We look forward to building on the conversations started at the showcase in the months ahead.',
            ],
        ],

        /* ---------------- LAUNCHES ---------------- */

        [
            'slug'     => 'koba-flagship-opening',
            'title'    => 'KOBA Patisserie opens new flagship in Addis Ababa',
            'category' => 'launches',
            'date'     => '2026-08-28',
            'image'    => 'images/portfolio/baked.jpg',
            'excerpt'  => 'A new flagship location brings KOBA\'s craft patisserie and specialty coffee to the heart of the city.',
            'body'     => [
                'KOBA Patisserie & Bakery has opened the doors of its newest flagship in Addis Ababa, bringing together craft pastry, fresh bakery, and specialty coffee service under one roof.',
                'The new space was designed as a destination — a place for guests to slow down, enjoy a carefully made cup, and experience the quality that has become synonymous with the KOBA name.',
                'The opening marks another step in the Group\'s continued growth across hospitality and coffee.',
            ],
        ],

        [
            'slug'     => 'jaquar-world-artize-collection',
            'title'    => 'Jaquar World introduces the Artize luxury collection',
            'category' => 'launches',
            'date'     => '2026-02-18',
            'image'    => 'images/portfolio/jaguar.jpg',
            'excerpt'  => 'Our showrooms now feature Artize — luxury faucets, showers and architectural lighting for premium spaces.',
            'body'     => [
                'Jaquar World Addis Ababa has introduced the Artize collection to its showrooms, bringing luxury faucets, shower systems and architectural lighting to customers across the city.',
                'Artize sits alongside the Jaquar Premium range, giving architects, developers and homeowners a complete choice for every kind of project.',
                'Visitors can explore the collection at our Kazanchis and Meskel Flower showrooms.',
            ],
        ],

        /* ---------------- COFFEE HARVEST ---------------- */

        [
            'slug'     => 'harvest-season-begins',
            'title'    => 'This season\'s harvest begins across our growing regions',
            'category' => 'coffee-harvest',
            'date'     => '2026-08-10',
            'image'    => 'images/coffee/drying-beds.jpg',
            'excerpt'  => 'Picking is under way, and the first cherries are arriving at our wet mill stations for processing.',
            'body'     => [
                'The new harvest season is under way across the regions where Romina Coffee sources, with the first ripe cherries arriving at our wet mill stations.',
                'Our field teams are working alongside farmer partners to ensure selective picking, so only fully ripe cherries go into processing.',
                'We will share updates on volumes and cup quality as the season progresses.',
            ],
        ],

        [
            'slug'     => 'hand-sorting-quality-program',
            'title'    => 'Inside our hand-sorting quality programme',
            'category' => 'coffee-harvest',
            'date'     => '2026-03-08',
            'image'    => 'images/coffee/sorting-line.webp',
            'excerpt'  => 'A look at the meticulous hand-sorting process that helps ensure every bean meets our standard.',
            'body'     => [
                'Quality begins long before the cup. At Romina Coffee, hand-sorting is a core part of how we ensure every bean that carries our name meets the standard our customers expect.',
                'Skilled teams review the beans by hand, removing defects and preserving the consistency that defines specialty-grade Ethiopian coffee.',
                'It is meticulous, deliberate work — and it is one of the many reasons our coffee stands apart.',
            ],
        ],

        /* ---------------- AWARDS ---------------- */

        [
            'slug'     => 'romina-coffee-rainforest-alliance',
            'title'    => 'Romina Coffee earns Rainforest Alliance recognition',
            'category' => 'awards',
            'date'     => '2026-09-12',
            'image'    => 'images/coffee/green-beans-burlap.webp',
            'excerpt'  => 'Our coffee arm is recognised for sustainable farming practices that protect the land and support smallholder farmers across Ethiopia.',
            'body'     => [
                'Romina Coffee has been recognised by the Rainforest Alliance for its commitment to sustainable and responsible farming across Ethiopia\'s coffee-growing regions.',
                'The recognition reflects years of work partnering directly with smallholder farmers, investing in soil health, and protecting the biodiversity of the highlands where our beans are grown.',
                'For us, this is more than a certificate on the wall. It is a promise to the farmers we work with and to the communities and landscapes that make Ethiopian coffee among the finest in the world.',
            ],
        ],

        [
            'slug'     => 'koba-favourite-bakery',
            'title'    => 'KOBA voted among the city\'s favourite bakeries',
            'category' => 'awards',
            'date'     => '2026-01-22',
            'image'    => 'images/business/baked.jpg',
            'excerpt'  => 'Guests recognised KOBA for its handcrafted cakes, artisan pastries and warm cafe experience.',
            'body'     => [
                'KOBA Patisserie & Bakery has been named among the city\'s favourite bakeries, recognised by guests for its handcrafted cakes and artisan pastries.',
                'The recognition belongs to our pastry artisans and cafe teams, who bake fresh every day across our Addis Ababa locations.',
                'Thank you to every guest who has made KOBA part of their day.',
            ],
        ],

        /* ---------------- CSR ---------------- */

        [
            'slug'     => 'schools-in-coffee-communities',
            'title'    => 'Four schools built in remote coffee-growing communities',
            'category' => 'csr',
            'date'     => '2026-07-15',
            'image'    => 'images/stock/classroom.webp',
            'excerpt'  => 'As part of our CSR commitment, four new schools are improving access to education in the regions where our coffee is grown.',
            'body'     => [
                'Romina Group has completed the construction of four schools in remote coffee-growing communities, expanding access to education for children in regions that have historically been under-served.',
                'The schools are part of a broader community-investment programme that also includes potable-water sites and road infrastructure serving rural coffee regions.',
                'We believe the success of our business should create lasting, positive impact for the people and places that make it possible.',
            ],
        ],

        [
            'slug'     => 'clean-water-site-opens',
            'title'    => 'New potable-water site brings clean water closer to home',
            'category' => 'csr',
            'date'     => '2026-04-02',
            'image'    => 'images/stock/clean-water.webp',
            'excerpt'  => 'A new water site serves families in one of the communities that grow our coffee.',
            'body'     => [
                'A new potable-water site is now serving families in one of Romina Coffee\'s growing communities, bringing clean water within reach for households that previously travelled far to collect it.',
                'The project was delivered together with community leaders, and forms part of the Group\'s wider investment in schools, bridges and roads across coffee regions.',
                'Clean water changes daily life — for health, for school attendance, and for the time families get back.',
            ],
        ],

        /* ---------------- RESTAURANT PROMOTIONS ---------------- */

        [
            'slug'     => 'agelgel-lunch-special',
            'title'    => 'Signature Agelgel lunch, now at Romina Restaurants',
            'category' => 'restaurant-promotions',
            'date'     => '2026-09-05',
            'image'    => 'images/business/restaurant.webp',
            'excerpt'  => 'Our signature Agelgel is available as a weekday lunch special at Arat Kilo and Balderas.',
            'body'     => [
                'Romina Restaurants is celebrating one of its most-loved dishes with a weekday Agelgel lunch special, available at both our Arat Kilo and Balderas locations.',
                'Prepared the way our guests have always loved it, the Agelgel brings home-style comfort to the middle of the working day.',
                'Visit us for lunch, or ask our Balderas takeaway centre to prepare it to go.',
            ],
        ],

        [
            'slug'     => 'meskott-weekend-brunch',
            'title'    => 'Weekend brunch arrives in the Meskott street food garden',
            'category' => 'restaurant-promotions',
            'date'     => '2026-06-20',
            'image'    => 'images/portfolio/restaurant.webp',
            'excerpt'  => 'Slow Saturdays and Sundays with brunch plates, fresh juices and coffee in the garden.',
            'body'     => [
                'Meskott Culinary Experience now hosts weekend brunch in its street food garden, with brunch plates, fresh juices and specialty coffee.',
                'It is the perfect way to spend a slow Saturday or Sunday morning in Arat Kilo — whether catching up with friends or bringing the family.',
                'Tables can be reserved by calling Meskott directly.',
            ],
        ],

        /* ---------------- GROUP NEWS ---------------- */

        [
            'slug'     => 'romina-restaurants-milestone',
            'title'    => 'Romina celebrates five decades of hospitality',
            'category' => 'group-news',
            'date'     => '2026-06-02',
            'image'    => 'images/about/romina-history.jpg',
            'excerpt'  => 'From a small restaurant in Arat Kilo to a group of businesses, we mark fifty years of welcoming guests.',
            'body'     => [
                'What began in 1973 as a small restaurant in Arat Kilo, Addis Ababa, has grown into a group of businesses spanning hospitality, coffee export, imports and distribution.',
                'Across five decades, the constant has been our commitment to quality, craft, and the guests and communities we serve.',
                'As we look ahead, we remain a family business — one that keeps growing while staying true to the values it was founded on.',
            ],
        ],

        [
            'slug'     => 'import-division-partnerships',
            'title'    => 'Import division expands partnerships with global brands',
            'category' => 'group-news',
            'date'     => '2026-04-20',
            'image'    => 'images/hero/hero-02.jpg',
            'excerpt'  => 'New agreements broaden the range of quality products the Group brings to the Ethiopian market.',
            'body'     => [
                'Romina Group\'s import and distribution division has expanded its portfolio through new partnerships with established global brands.',
                'The agreements broaden the range of quality products available to the Ethiopian market and strengthen the Group\'s position across its distribution network.',
                'The expansion reflects a disciplined approach to growth — pursuing partnerships that align with the Group\'s standards and long-term vision.',
            ],
        ],

    ],
];
