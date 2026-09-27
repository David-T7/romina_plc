@php
    // Section anchors live on the home page; prefix them so they also work from sub-pages.
    $home     = url('/');
    $pageCode = $pageCode ?? 'Home';
    $isAbout  = in_array($pageCode, ['History', 'Leadership']);
@endphp

<header class="site-header">
    <div class="container nav-wrapper">

        <!-- Logo -->
        <a href="{{ $home }}" class="logo">
            <img src="{{ asset('images/logo/logo-romina-white.svg') }}" class="logo-white" width="160" height="50" alt="Romina Group">
            <img src="{{ asset('images/logo/logo-romina.svg') }}"       class="logo-navy"  width="160" height="50" alt="Romina Group">
        </a>

        <!-- Desktop Navigation -->
        <nav class="main-navigation">

            <!-- About Mega Menu -->
            <div class="nav-dropdown nav-dropdown--about{{ $isAbout ? ' is-current' : '' }}">
                <button class="dropdown-trigger">
                    About
                    <span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>

                <div class="mega-menu">

                    <div class="mega-menu-intro">
                        <span class="menu-label">ABOUT ROMINA</span>
                        <h3>Five decades<br>of building together.</h3>
                        <p>
                            From a single restaurant in Arat Kilo to a
                            diversified Ethiopian group, since 1973.
                        </p>
                    </div>

                    <div class="mega-column">
                        <span class="column-title">
                            Our History
                        </span>

                        <a href="{{ route('about.history') }}"{!! $pageCode === 'History' ? ' aria-current="page"' : '' !!}>
                            Our Story
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                    </div>

                    <div class="mega-column">
                        <span class="column-title">
                            Our Leadership
                        </span>

                        <a href="{{ route('about.leadership') }}"{!! $pageCode === 'Leadership' ? ' aria-current="page"' : '' !!}>
                            Leadership Overview
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ route('about.leadership') }}#executive-team">
                            Executive Team
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Businesses Mega Menu -->
            <div class="nav-dropdown">
                <button class="dropdown-trigger">
                    Businesses
                    <span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>

                <div class="mega-menu">

                    <div class="mega-menu-intro">
                        <span class="menu-label">OUR BUSINESSES</span>
                        <h3>Building businesses<br>that matter.</h3>
                        <p>
                            A diverse portfolio of businesses creating
                            long-term value across multiple industries.
                        </p>
                    </div>

                    <div class="mega-column">
                        <span class="column-title">
                            Restaurants &amp; Culinary Brands
                        </span>

                        <a href="{{ $home }}#brands">
                            Restaurant Brands
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#brands">
                            Hospitality
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#brands">
                            Food &amp; Beverage
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>
                    </div>

                    <div class="mega-column">
                        <span class="column-title">
                            Romina Coffee
                        </span>

                        <a href="{{ $home }}#brands">
                            Our Coffee
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#brands">
                            Coffee Shops
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#about">
                            Our Story
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>
                    </div>

                    <div class="mega-column">
                        <span class="column-title">
                            Other Businesses
                        </span>

                        <a href="{{ $home }}#brands">
                            Real Estate
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#brands">
                            Investments
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                        <a href="{{ $home }}#brands">
                            Consumer Brands
                            <small>Explore <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>
                    </div>

                </div>
            </div>

            <a href="{{ route('sustainability') }}"{!! $pageCode === 'Sustainability' ? ' aria-current="page"' : '' !!}>Sustainability</a>
            <a href="{{ $home }}#careers">Careers</a>
            <a href="{{ $home }}#accomplishments">News</a>
            <a href="{{ $home }}#contact">Contact</a>

            <a href="{{ $home }}#contact" class="talk-button">
                Let's Talk
            </a>

        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-button" id="menuOpen" aria-label="Open menu">
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>
</header>


<!-- ==========================================
     MOBILE NAV OVERLAY
=========================================== -->

<div class="mobile-nav mobile-menu--centered" id="mobileNav" aria-hidden="true">

    <div class="container mobile-nav-top">
        <a href="{{ $home }}" class="logo">
            <img src="{{ asset('images/logo/logo-romina-white.svg') }}" width="160" height="50" alt="Romina Group">
        </a>
        <button class="mobile-nav-close" id="menuClose" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <nav class="container mobile-nav-links" aria-label="Mobile navigation">
        <a href="{{ $home }}#about"          style="--d: 0ms"{!! $pageCode === 'Home' || $isAbout ? ' aria-current="page"' : '' !!}><span>About</span></a>
        <div class="mobile-nav-sub" style="--d: 25ms" aria-label="About pages">
            <a href="{{ route('about.history') }}"{!! $pageCode === 'History' ? ' aria-current="page"' : '' !!}>Our History</a>
            <a href="{{ route('about.leadership') }}"{!! $pageCode === 'Leadership' ? ' aria-current="page"' : '' !!}>Our Leadership</a>        </div>
        <a href="{{ $home }}#businesses"     style="--d: 50ms"><span>Businesses</span></a>
        <a href="{{ route('sustainability') }}" style="--d: 100ms"{!! $pageCode === 'Sustainability' ? ' aria-current="page"' : '' !!}><span>Sustainability</span></a>
        <a href="{{ $home }}#careers"        style="--d: 150ms"><span>Careers</span></a>
        <a href="{{ $home }}#accomplishments" style="--d: 200ms"><span>News</span></a>
        <a href="{{ $home }}#contact"        style="--d: 250ms"><span>Contact</span></a>
    </nav>

    <div class="container mobile-nav-brands">
        <span>Romina Restaurants</span>
        <span>KOBA</span>
        <span>Meskott</span>
        <span>Romina Coffee</span>
        <span>Romina Imports</span>
        <span>Jaquar World</span>
    </div>

    <div class="container mobile-nav-foot">
        <a href="mailto:info@rominaplc.com">info@rominaplc.com</a>
    </div>

</div>
