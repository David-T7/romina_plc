    <!-- ==========================================
         HERO
    =========================================== -->

    <section class="hero">

        <!-- Slides -->
        <div class="hero-slides">

            <!-- Slide 01 -->
            <div class="hero-slide active">

                <div class="hero-background"
                     style="background-image:
                     url('{{ asset('images/hero/hero-01.jpg') }}');">
                </div>

                <div class="hero-overlay"></div>

                <div class="container hero-content">

                    <div class="hero-category">
                        BUSINESS GROUP
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


            <!-- Slide 02 -->
            <div class="hero-slide">

                <div class="hero-background"
                     style="background-image:
                     url('{{ asset('images/hero/hero-02.jpg') }}');">
                </div>

                <div class="hero-overlay"></div>

                <div class="container hero-content">

                    <div class="hero-category">
                        OUR BUSINESSES
                    </div>

                    <h1>
                        Creating brands<br>
                        <span>people love.</span>
                    </h1>

                    <p>
                        From hospitality and food to emerging ventures,
                        our businesses are built around quality, experience
                        and meaningful connections.
                    </p>

                    <a href="#businesses" class="hero-link">
                        Explore our businesses
                        <span><i class="fa-solid fa-arrow-right"></i></span>
                    </a>

                </div>

            </div>


            <!-- Slide 03 -->
            <div class="hero-slide">

                <div class="hero-background"
                     style="background-image:
                     url('{{ asset('images/hero/hero-03.jpg') }}');">
                </div>

                <div class="hero-overlay"></div>

                <div class="container hero-content">

                    <div class="hero-category">
                        OUR VISION
                    </div>

                    <h1>
                        Growth with<br>
                        <span>purpose.</span>
                    </h1>

                    <p>
                        We believe successful businesses should create
                        positive impact while delivering sustainable,
                        long-term growth.
                    </p>

                    <a href="{{ route('sustainability') }}" class="hero-link">
                        Our approach
                        <span><i class="fa-solid fa-arrow-right"></i></span>
                    </a>

                </div>

            </div>

        </div>


        <!-- ==========================================
             HERO CONTROLS
        =========================================== -->

        <div class="container hero-controls">

            <!-- Counter -->
            <div class="slide-counter">
                <span class="current-slide">01</span>
                <span class="counter-divider">/</span>
                <span>03</span>
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
