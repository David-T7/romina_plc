@php
    // Our Diversified Portfolio: one card per sector (same order as Our History).
    $portfolioSectors = [
        ['title' => 'Restaurant Management & Hospitality', 'slug' => 'romina-restaurants',
         'img' => 'images/portfolio/restaurant.webp',                        'alt' => 'Romina Restaurants dining room',
         'text' => 'Home-styled dishes, warm service and distinct culinary brands across Addis Ababa.', 'link' => 'Explore Romina Restaurants'],
        ['title' => 'Cakes, Pastries & Confectionaries', 'slug' => 'koba-patisserie',
         'img' => 'images/portfolio/baked.jpg',                              'alt' => 'KOBA cakes and pastries',
         'text' => 'Artisan pastries, handcrafted cakes, signature breakfasts and specialty coffee, baked fresh across Addis Ababa.', 'link' => 'Explore KOBA'],
        ['title' => 'International Culinary Services', 'slug' => 'meskott-culinary',
         'img' => 'images/gallery/meskott-culinary/12-glazed-salmon.webp',   'alt' => 'Glazed salmon at Meskott',
         'text' => 'International cuisine, curated drinks and a welcoming setting for memorable dining in Addis Ababa.', 'link' => 'Explore Meskott'],
        ['title' => 'Coffee Exporting', 'slug' => 'romina-coffee',
         'img' => 'images/coffee-origin/03-drying-beds-team.webp',           'alt' => 'Coffee farmers working the drying beds',
         'text' => 'Upholding the legacy of Ethiopian coffee, from farm to cup, across four continents.', 'link' => 'Explore Romina Coffee'],
        ['title' => 'Coffee Roastery', 'slug' => 'coffee-roastery',
         'img' => 'images/koba/koba-coffee.webp',                            'alt' => 'Iced coffee on a wooden table',
         'text' => 'Coming soon.', 'link' => 'Learn More'],
        ['title' => 'FMCG Importing & Distribution', 'slug' => 'romina-imports',
         'img' => 'images/hero/imports-partners.webp',                       'alt' => 'Romina Imports partners',
         'text' => 'Quality FMCG imported for local consumption.', 'link' => 'Explore Romina Imports'],
    ];
@endphp
<!-- ==========================================
     BUSINESS PORTFOLIO
=========================================== -->

<section id="portfolio" class="portfolio-section">

    <div class="container">

        <!-- Portfolio Header -->
        <div class="portfolio-header">

            <div>
                <p class="mark tone-white">
                    <span class="mark-rule"></span>
                    <i aria-hidden="true"></i>
                    Our Businesses
                </p>

                <h2 class="t-h2 light">Our Diversified Portfolio</h2>
            </div>

            <div class="ac-arrows ac-arrows--on-dark portfolio-arrows" role="group" aria-label="Browse businesses">
                <button class="portfolio-prev" aria-label="Previous business" disabled>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="portfolio-next" aria-label="Next business">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>

        </div>


        <!-- Portfolio Slider -->
        <div class="portfolio-slider-wrapper" tabindex="0" aria-label="Our businesses">

            <div class="portfolio-track">
                {{-- Six sectors (data in $portfolioSectors at the top of this file) --}}
                @foreach ($portfolioSectors as $sector)
                    <article class="portfolio-card">
                        <div class="portfolio-image">
                            <img loading="lazy" decoding="async" src="{{ asset($sector['img']) }}" alt="{{ $sector['alt'] }}">
                        </div>
                        <div class="portfolio-card-content">
                            <span class="portfolio-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3>{{ $sector['title'] }}</h3>
                            <p>{{ $sector['text'] }}</p>
                            <a href="{{ route('business', $sector['slug']) }}" class="portfolio-link">
                                {{ $sector['link'] }}
                                <span><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </article>
                @endforeach

            </div>

        </div>


        <!-- Portfolio Controls -->
        <div class="portfolio-scroll-controls">

    <div class="portfolio-counter">
        <span class="portfolio-current">01</span>
        <span>/</span>
        <span>{{ sprintf('%02d', count($portfolioSectors)) }}</span>
    </div>

    <div class="portfolio-progress">

        <div class="portfolio-progress-line">
            <div class="portfolio-progress-active"></div>

            <span class="portfolio-progress-dot"></span>
        </div>

    </div>

</div>

    </div>

</section>
