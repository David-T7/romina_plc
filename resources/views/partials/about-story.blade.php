{{-- =====================================================
     OUR STORY — two glass panels set like an open book,
     with pointer-driven 3D tilt (see "OUR STORY — 3D TILT" script).
===================================================== --}}

@php
    $home = url('/');

    $storySectors = [
        ['icon' => 'fa-utensils',          'name' => 'Restaurant Management & Hospitality', 'href' => route('business', 'romina-restaurants')],
        ['icon' => 'fa-globe',             'name' => 'International Culinary Services',     'href' => route('business', 'meskott-culinary')],
        ['icon' => 'fa-mug-hot',           'name' => 'Coffee Exporting',                    'href' => route('business', 'romina-coffee')],
        ['icon' => 'fa-truck-ramp-box',    'name' => 'Importing & Distribution',            'href' => route('business', 'romina-imports')],
    ];
@endphp

<section class="story" id="our-story">

    <div class="story-bg" style="background-image: url('{{ asset('images/hero/hero-01.jpg') }}');" aria-hidden="true"></div>
    <span class="story-orb story-orb--red" aria-hidden="true"></span>
    <span class="story-orb story-orb--blue" aria-hidden="true"></span>
    <span class="story-year" aria-hidden="true">2026</span>

    <div class="container story-grid">

        {{-- ============ LEFT: WELCOME ============ --}}
        <article class="story-card story-card--welcome story-reveal" data-tilt>

            <div class="story-glass" aria-hidden="true"></div>
            <div class="story-glare" aria-hidden="true"></div>

            <div class="story-layer story-layer--1">
                <span class="story-kicker">
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    Welcome to Romina Group
                </span>
                <p class="story-amh" lang="am">እንኳን ደህና መጡ</p>
            </div>

            <h2 class="story-title story-layer story-layer--2">
                Five decades of<br>
                <span>building together.</span>
            </h2>

            <p class="story-text story-layer story-layer--1">
                Established in 1973 and based in Addis Ababa, Ethiopia, Romina Group is a
                formidable Ethiopian holding company that has evolved from a humble beginning
                into a robust and diversified enterprise. Our five decades of growth have been
                marked by strategic expansion, successful partnerships, and an unwavering
                commitment to excellence across all our endeavours.
            </p>

            <div class="story-stats story-layer story-layer--3">
                <div class="story-stat">
                    <strong>1973</strong>
                    <span>Established</span>
                </div>
                <div class="story-stat">
                    <strong>50<sup>+</sup></strong>
                    <span>Years of growth</span>
                </div>
                <div class="story-stat">
                    <strong>4</strong>
                    <span>Key sectors</span>
                </div>
            </div>

            <div class="story-actions story-layer story-layer--2">
                <a href="{{ route('about.leadership') }}" class="story-btn story-btn--solid">
                    Meet Our Leadership
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="{{ $home }}#brands" class="story-btn story-btn--ghost">
                    Explore Our Brands
                </a>
            </div>

        </article>


        {{-- ============ RIGHT: WHO WE ARE ============ --}}
        <article class="story-card story-card--who story-reveal" data-tilt>

            <div class="story-glass" aria-hidden="true"></div>
            <div class="story-glare" aria-hidden="true"></div>

            <span class="story-kicker story-layer story-layer--1">
                <i class="fa-solid fa-earth-africa" aria-hidden="true"></i>
                Who We Are
            </span>

            <h3 class="story-subtitle story-layer story-layer--2">
                From a cherished restaurant in Arat Kilo to a diversified group.
            </h3>

            <p class="story-text story-layer story-layer--1">
                Romina Group was founded in 1973 by <strong>Girma Taye</strong>, a prominent,
                self-made business leader, starting with a small, cherished restaurant in
                Arat Kilo, in the heart of Addis Ababa. After over 50 years of dedicated service
                and continuous evolution, we now operate a dynamic and diverse portfolio
                spanning several key sectors:
            </p>

            <ul class="story-sectors story-layer story-layer--3">
                @foreach ($storySectors as $sector)
                    <li>
                        <a href="{{ $sector['href'] }}" class="story-sector">
                            <span class="story-sector-num">0{{ $loop->iteration }}</span>
                            <span class="story-sector-icon" aria-hidden="true">
                                <i class="fa-solid {{ $sector['icon'] }}"></i>
                            </span>
                            <span class="story-sector-name">{{ $sector['name'] }}</span>
                            <i class="fa-solid fa-arrow-right story-sector-arrow" aria-hidden="true"></i>
                        </a>
                    </li>
                @endforeach
            </ul>

            <p class="story-note story-layer story-layer--1">
                Our diversified assets ensure sustainable growth for our stakeholders and
                deliver satisfactory, high-quality service to our clients.
            </p>

            <div class="story-actions story-layer story-layer--2">
                <a href="{{ $home }}#contact" class="story-btn story-btn--ghost">
                    Get in Touch
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

        </article>

    </div>

</section>
