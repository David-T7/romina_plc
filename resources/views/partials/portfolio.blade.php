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


                <!-- CARD 01 -->
                <article class="portfolio-card">

                    <div class="portfolio-image">

                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/portfolio/restaurant.webp') }}"
                            alt="Romina Restaurant interior, evening service"
                        >

                        {{-- <div class="portfolio-image-caption">
                            Romina Restaurant, evening service
                        </div> --}}

                    </div>


                    <div class="portfolio-card-content">

                        <span class="portfolio-number">
                            01
                        </span>

                        <h3>
                            Restaurant Management
                            &amp; Hospitality
                        </h3>

                        <p>
                            Home-styled Dishes, Warm Service and
                            Distinct Culinary Brands across
                            Addis Ababa.
                        </p>


                        {{-- <div class="portfolio-pills">

                            <span>Romina Restaurants</span>
                            <span>KOBA</span>
                            <span>Meskott</span>

                        </div> --}}


                        <a href="businesses/romina-restaurants" class="portfolio-link">
                            Explore our Restaurant
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>

                    </div>

                </article>


                <!-- CARD 02 -->
                <article class="portfolio-card">

                    <div class="portfolio-image">

                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/coffee/romina-sack.webp') }}"
                            alt="A Romina coffee sack: produce of Ethiopia, washed Arabica"
                        >

                        {{-- <div class="portfolio-image-caption">
                            Romina Coffee, crafted for everyday moments
                        </div> --}}

                    </div>


                    <div class="portfolio-card-content">

                        <span class="portfolio-number">
                            02
                        </span>

                        <h3>
                            Coffee Experiences
                        </h3>

                        <p>
                            Thoughtfully Sourced Coffee, Distinctive
                            spaces and a growing culture built around
                            every cup.
                        </p>


                        {{-- <div class="portfolio-pills">

                            <span>Romina Coffee</span>
                            <span>Retail</span>

                        </div> --}}


                        <a href="/businesses/romina-coffee" class="portfolio-link">
                            Explore Romina Coffee
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>

                    </div>

                </article>


                <!-- CARD 03 -->
                <article class="portfolio-card">

                    <div class="portfolio-image">

                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/portfolio/jaguar.jpg') }}"
                            alt="Business investment and ventures"
                        >

                        {{-- <div class="portfolio-image-caption">
                            Building the next generation of businesses
                        </div> --}}

                    </div>


                    <div class="portfolio-card-content">

                        <span class="portfolio-number">
                            03
                        </span>

                        <h3>
                            Jaquar Appliances
                        </h3>

                        <p>
                            Spaces Designed for People and Business
                        </p>


                        {{-- <div class="portfolio-pills">

                            <span>Investments</span>
                            <span>New Ventures</span>
                            <span>Partnerships</span>

                        </div> --}}


                        <a href="/businesses/jaquar-world" class="portfolio-link">
                            Explore our Appliances
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>

                    </div>

                </article>


                <!-- CARD 04 -->
                <article class="portfolio-card">

                    <div class="portfolio-image">

                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/portfolio/baked.jpg') }}"
                            alt="Business property and real estate"
                        >

                        {{-- <div class="portfolio-image-caption">
                            Identifying opportunities, supporting
                            entrepreneurs and building businesses
                            with long-term potential.
                        </div> --}}

                    </div>


                    <div class="portfolio-card-content">

                        <span class="portfolio-number">
                            04
                        </span>

                        <h3>
                            Cake, Pastry &amp; Confectionary
                        </h3>

                        <p>
                            Creating purposeful spaces that bring
                            together people, businesses and communities.
                        </p>


                        {{-- <div class="portfolio-pills">

                            <span>Patisseries</span>
                            <span>Passion</span>
                            <span>Cake</span>

                        </div> --}}


                        <a href="/businesses/koba-patisserie" class="portfolio-link">
                            Explore our Pastries
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>

                    </div>

                </article>


                <!-- CARD 05 -->
                <article class="portfolio-card">
                    <div class="portfolio-image">
                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/bacio/gelato-counter.webp') }}"
                            alt="Bacio Cremeria gelato counter">
                    </div>
                    <div class="portfolio-card-content">
                        <span class="portfolio-number">05</span>
                        <h3>Bacio Cremeria</h3>
                        <p>Handcrafted ice creams, gelatos and elegant sundaes, made with fresh dairy from Romina Dairy Farm.</p>
                        <a href="{{ route('business', 'bacio-cremeria') }}" class="portfolio-link">
                            Explore Bacio Cremeria
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </article>


                <!-- CARD 06 -->
                <article class="portfolio-card">
                    <div class="portfolio-image">
                        <img loading="lazy" decoding="async"
                            src="{{ asset('images/gallery/meskott-culinary/meskott_1.webp') }}"
                            alt="Meskott Culinary Experience dining space">
                    </div>
                    <div class="portfolio-card-content">
                        <span class="portfolio-number">06</span>
                        <h3>Meskott Culinary Experience</h3>
                        <p>International cuisine, curated drinks and a welcoming setting for memorable dining in Addis Ababa.</p>
                        <a href="{{ route('business', 'meskott-culinary') }}" class="portfolio-link">
                            Explore Meskott
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </article>

            </div>

        </div>


        <!-- Portfolio Controls -->
        <div class="portfolio-scroll-controls">

    <div class="portfolio-counter">
        <span class="portfolio-current">01</span>
        <span>/</span>
        <span>06</span>
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
