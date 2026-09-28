<?php

return [

    'notify_email' => env('CAREERS_NOTIFY_EMAIL', 'hr@rominaplc.com'),

    'send_confirmation' => env('CAREERS_SEND_CONFIRMATION', false),

    // TODO: replace with client-supplied positions
    'positions' => [

        [
            'slug'            => 'senior-barista-koba',
            'title'           => 'Senior Barista',
            'business'        => 'KOBA Patisserie & Bakery',
            'location'        => 'Addis Ababa',
            'employment_type' => 'Full-time',
            'summary'         => 'Lead specialty coffee service across our flagship Peacock roastery and KOBA outlets.',
            'description'     => 'We are looking for a passionate and skilled Senior Barista to join the KOBA team. You will lead daily coffee service, mentor junior staff, and uphold our commitment to craft and quality across all locations.',
            'requirements'    => [
                'Minimum 3 years of specialty coffee experience',
                'SCA certification preferred',
                'Strong knowledge of espresso, filter, and alternative brew methods',
                'Experience training and mentoring barista teams',
                'Excellent communication and hospitality skills',
            ],
            'deadline'        => '2026-10-31',
            'is_open'         => true,
        ],

        [
            'slug'            => 'restaurant-manager',
            'title'           => 'Restaurant Manager',
            'business'        => 'Romina Restaurants',
            'location'        => 'Addis Ababa',
            'employment_type' => 'Full-time',
            'summary'         => 'Oversee daily operations at one of our Romina Restaurant locations in Addis Ababa.',
            'description'     => 'We are seeking an experienced Restaurant Manager to take ownership of operations, team management, and guest satisfaction at a Romina Restaurant location. The ideal candidate brings a proven track record in hospitality leadership and a passion for excellent service.',
            'requirements'    => [
                'Minimum 4 years of restaurant management experience',
                'Strong leadership and team-building skills',
                'Experience managing budgets and cost control',
                'Excellent customer-service orientation',
                'Proficiency in Amharic and English',
            ],
            'deadline'        => '2026-11-15',
            'is_open'         => true,
        ],

        [
            'slug'            => 'coffee-export-coordinator',
            'title'           => 'Coffee Export Coordinator',
            'business'        => 'Romina Coffee',
            'location'        => 'Addis Ababa',
            'employment_type' => 'Full-time',
            'summary'         => 'Coordinate green coffee export logistics and documentation for international buyers.',
            'description'     => 'Romina Coffee is looking for an Export Coordinator to manage shipment planning, customs documentation, buyer communication, and compliance for our green coffee exports across four continents. This role sits at the heart of our export operations.',
            'requirements'    => [
                "Bachelor's degree in Business, Logistics, or related field",
                'Minimum 2 years of export or logistics experience',
                'Familiarity with Ethiopian coffee export regulations',
                'Strong written and verbal English communication',
                'Ability to manage multiple shipments simultaneously',
            ],
            'deadline'        => null,
            'is_open'         => true,
        ],

        [
            'slug'            => 'group-finance-analyst',
            'title'           => 'Finance Analyst',
            'business'        => 'Romina Group',
            'location'        => 'Addis Ababa',
            'employment_type' => 'Full-time',
            'summary'         => 'Support group-level financial reporting, budgeting, and analysis across Romina business units.',
            'description'     => 'We are looking for an analytical and detail-oriented Finance Analyst to join our Group Finance team. You will support budgeting, financial reporting, and performance analysis across multiple business units, working closely with senior leadership.',
            'requirements'    => [
                "Bachelor's degree in Accounting, Finance, or related field",
                'CPA or ACCA qualification (or in progress) preferred',
                'Minimum 2 years of financial analysis experience',
                'Proficiency in Excel and financial reporting tools',
                'Strong analytical and problem-solving skills',
            ],
            'deadline'        => '2026-10-20',
            'is_open'         => false,
        ],

    ],

];
