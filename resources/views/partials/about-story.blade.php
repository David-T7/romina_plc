{{-- =====================================================
     OUR STORY — About › Our History
     Two plain columns in the site's brand style: welcome on
     the left, who we are + sectors on the right.
===================================================== --}}

@php
    $home = url('/');

    $storySectors = [
        ['icon' => 'fa-utensils',          'name' => 'Restaurant Management & Hospitality', 'href' => route('business', 'romina-restaurants')],
        ['icon' => 'fa-globe',             'name' => 'International Culinary Services',     'href' => route('business', 'meskott-culinary')],
        ['icon' => 'fa-mug-hot',           'name' => 'Coffee Exporting',                    'href' => route('business', 'romina-coffee')],
        ['icon' => 'fa-truck-ramp-box',    'name' => 'Importing & Distribution',            'href' => route('business', 'romina-imports')],
    ];

    // Milestones share their titles with the homepage timeline (resources/lang/*/site.php)
    $storyMilestones = [
        ['year' => '1973', 'key' => 'tl_0_title'],
        ['year' => '2009', 'key' => 'tl_1_title'],
        ['year' => '2017', 'key' => 'tl_2_title'],
        ['year' => '2020', 'key' => 'tl_3_title'],
        ['year' => '2021', 'key' => 'tl_5_title'],
        ['year' => '2023', 'key' => 'tl_6_title'],
        ['year' => '2026', 'key' => 'tl_7_title'],
    ];
@endphp

<section class="hist" id="our-story">

    <div class="container hist-grid">

        {{-- ============ LEFT: WELCOME ============ --}}
        <div class="hist-col">

            <p class="mark">
                <span class="mark-rule"></span>
                <i aria-hidden="true"></i>
                Welcome to Romina Group
            </p>

            <h2 class="t-h2 hist-title">
                Five Decades of
                <span>Building Together.</span>
            </h2>

            <p class="hist-text">
                Established in 1973 and based in Addis Ababa, Ethiopia, Romina Group is a
                formidable Ethiopian Holding company that has evolved from a humble beginning
                into a robust and diversified enterprise. Our five decades of growth have been
                marked by strategic expansion, successful partnerships, and an unwavering
                commitment to excellence across all our endeavours.
            </p>

            <ol class="hist-milestones" aria-label="Milestones">
                @foreach ($storyMilestones as $m)
                    <li>
                        <span class="hist-ms-year">{{ $m['year'] }}</span>
                        <span class="hist-ms-title">{{ __('site.' . $m['key']) }}</span>
                    </li>
                @endforeach
            </ol>

            <dl class="hist-stats">
                <div>
                    <dt>1973</dt>
                    <dd>Established</dd>
                </div>
                <div>
                    <dt>50+</dt>
                    <dd>Years of growth</dd>
                </div>
                <div>
                    <dt>4</dt>
                    <dd>Key sectors</dd>
                </div>
            </dl>

            <div class="hist-actions">
                <a href="{{ route('about.leadership') }}" class="hist-btn hist-btn--solid">
                    Meet Our Leadership
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="{{ $home }}#brands" class="hist-btn hist-btn--outline">
                    Explore Our Brands
                </a>
            </div>

        </div>


        {{-- ============ RIGHT: WHO WE ARE ============ --}}
        <div class="hist-col">

            <p class="mark">
                <span class="mark-rule"></span>
                <i aria-hidden="true"></i>
                Who We Are
            </p>

            <h3 class="hist-subtitle">
                From a cherished restaurant in 4 Kilo to a diversified group.
            </h3>

            <p class="hist-text">
                Romina Group was founded in 1973 by <strong>Girma Taye</strong>, a prominent,
                self-made business leader, starting with a small, cherished restaurant in
                4 Kilo, in the heart of Addis Ababa. After over 50 years of dedicated service
                and continuous evolution, we now operate a dynamic and diverse portfolio
                spanning several key sectors:
            </p>

            <ul class="hist-sectors">
                @foreach ($storySectors as $sector)
                    <li>
                        <a href="{{ $sector['href'] }}">
                            <span class="hist-sector-num">0{{ $loop->iteration }}</span>
                            <i class="fa-solid {{ $sector['icon'] }} hist-sector-icon" aria-hidden="true"></i>
                            <span class="hist-sector-name">{{ $sector['name'] }}</span>
                            <i class="fa-solid fa-arrow-right hist-sector-arrow" aria-hidden="true"></i>
                        </a>
                    </li>
                @endforeach
            </ul>

            <p class="hist-note">
                Our diversified assets ensure sustainable growth for our stakeholders and
                deliver satisfactory, high-quality service to our clients.
            </p>

            <div class="hist-actions">
                <a href="{{ $home }}#contact" class="hist-btn hist-btn--outline">
                    Get in Touch
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

        </div>

    </div>

</section>
