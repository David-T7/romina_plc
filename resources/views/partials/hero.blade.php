    <!-- ==========================================
         HERO
    =========================================== -->

    @php
        // One representative image per brand, appended to the hero slider.
        $brandSlides = [
            ['img' => 'images/gallery/romina-restaurants/06-romina-restaurant.webp', 'cat' => 'Restaurants & Culinary', 'title' => 'Romina Restaurants', 'sub' => 'Home of Great Service.',        'text' => 'An Iconic Eatery in the heart of Addis Ababa', 'slug' => 'romina-restaurants'],
            ['img' => 'images/gallery/koba-patisserie/06-koba.webp',                 'cat' => 'Restaurants & Culinary', 'title' => 'KOBA Patisserie',    'sub' => 'Crafted with Passion.',            'text' => 'Pastries, Cakes, Breakfasts and Coffee, across Addis Ababa.', 'slug' => 'koba-patisserie'],
            ['img' => 'images/gallery/meskott-culinary/meskott_1.webp',              'cat' => 'Restaurants & Culinary', 'title' => 'Meskott Culinary',   'sub' => 'Diverse Experiences, Unified.',         'text' => 'Fine dining, and an unparalleled selection of International Cuisine', 'slug' => 'meskott-culinary'],
            ['img' => 'images/coffee/warehouse-stacks.webp',                         'cat' => 'Romina Coffee',          'title' => 'Romina Coffee',      'sub' => 'Legacy of Ethiopian Coffee.',   'text' => 'Sourced from six regions and exported across four continents since 2009.','slug' => 'romina-coffee'],
            ['img' => 'images/hero/hero-02.jpg',                                     'cat' => 'Other Businesses',       'title' => 'Romina Imports',     'sub' => 'From our Partners to You.',  'text' => 'Quality FMCG imported and distributed across the Ethiopian market.','slug' => 'romina-imports'],
            ['img' => 'images/gallery/jaquar-world/01-jaquar.webp',                  'cat' => 'Jaquar World',       'title' => 'Jaquar World',       'sub' => 'Complete Bathroom Solutions.',      'text' => 'Faucets, Showers, Sanitary-ware and more, from exquisite luxury to Jaquar Premium.','slug' => 'jaquar-world'],
        ];
        $heroTotal = 1 + count($brandSlides);
    @endphp

    <section class="hero">

        <!-- Slides -->
        <div class="hero-slides">

            {{-- Slide 01 — Romina Group (no image for now) --}}
            <div class="hero-slide active">

                <div class="hero-background" style="background: var(--deep-blue);"></div>

                <div class="hero-overlay"></div>

                <div class="container hero-content">

                    <div class="hero-category">
                        ROMINA GROUP
                    </div>

                    <h1>
                        Building businesses<br>
                        <span>that shape tomorrow.</span>
                    </h1>

                    <p>
                        We build, grow and invest in businesses that create
                        lasting value for people, communities and the future.
                    </p>

                    <a href="#businesses" class="hero-link">
                        Discover our businesses
                        <span><i class="fa-solid fa-arrow-right"></i></span>
                    </a>

                </div>

            </div>


            {{-- Brand slides — one image per brand --}}
            @foreach ($brandSlides as $s)
                <div class="hero-slide">

                    <div class="hero-background"
                         style="background-image:
                         url('{{ asset($s['img']) }}');">
                    </div>

                    <div class="hero-overlay"></div>

                    <div class="container hero-content">

                        <div class="hero-category">{{ strtoupper($s['cat']) }}</div>

                        <h1>
                            {{ $s['title'] }}<br>
                            <span>{{ $s['sub'] }}</span>
                        </h1>

                        <p>{{ $s['text'] }}</p>

                        <a href="{{ route('business', $s['slug']) }}" class="hero-link">
                            Explore
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>

                    </div>

                </div>
            @endforeach

        </div>


        <!-- ==========================================
             HERO CONTROLS
        =========================================== -->

        <div class="container hero-controls">

            <!-- Counter -->
            <div class="slide-counter">
                <span class="current-slide">01</span>
                <span class="counter-divider">/</span>
                <span>{{ sprintf('%02d', $heroTotal) }}</span>
            </div>


            <!-- Progress Line -->
            <div class="slide-progress">

                <div class="progress-line">
                    <div class="progress-active"></div>
                    <span class="progress-dot"></span>
                </div>

            </div>


            <!-- Arrows -->
            <div class="slide-arrows">

                <button class="slide-arrow prev-slide"
                        aria-label="Previous slide">
                    ←
                </button>

                <button class="slide-arrow next-slide"
                        aria-label="Next slide">
                    →
                </button>

            </div>

        </div>

    </section>
