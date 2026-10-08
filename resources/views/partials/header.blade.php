@php
    // Section anchors live on the home page; prefix them so they also work from sub-pages.
    $home     = url('/');
    $pageCode = $pageCode ?? 'Home';
    $isAbout  = in_array($pageCode, ['History', 'Leadership']);

    // Businesses menu is built from config/businesses.php
    $bizGroups  = config('businesses.groups');
    $bizBrands  = config('businesses.brands');
    $currentBiz = $pageCode === 'Business' ? ($brandSlug ?? null) : null;

    // Pages with a light/white hero need the dark nav treatment at the top.
    $lightThemes = ['jaguar'];
    $headerLight = in_array($brand['theme'] ?? null, $lightThemes, true);
@endphp

<header class="site-header{{ $headerLight ? ' site-header--light' : '' }}">
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
                    <span data-i18n="nav_about">{{ __('site.nav_about') }}</span>
                    <span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>

                <div class="mega-menu">

                    <div class="mega-menu-intro">
                        <span class="menu-label" data-i18n="mega_about_label">{{ __('site.mega_about_label') }}</span>
                        <h3 data-i18n-html="mega_about_heading">{!! __('site.mega_about_heading') !!}</h3>
                        <p data-i18n="mega_about_text">{{ __('site.mega_about_text') }}</p>
                    </div>

                    <div class="mega-column">
                        <span class="column-title" data-i18n="mega_about_history_col">
                            {{ __('site.mega_about_history_col') }}
                        </span>

                        <a href="{{ route('about.history') }}"{!! $pageCode === 'History' ? ' aria-current="page"' : '' !!}>
                            <span data-i18n="mega_about_story_link">{{ __('site.mega_about_story_link') }}</span>
                            <small><span data-i18n="nav_explore">{{ __('site.nav_explore') }}</span> <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>

                    </div>

                    <div class="mega-column">
                        <span class="column-title" data-i18n="mega_about_lead_col">
                            {{ __('site.mega_about_lead_col') }}
                        </span>

                        <a href="{{ route('about.leadership') }}"{!! $pageCode === 'Leadership' ? ' aria-current="page"' : '' !!}>
                            <span data-i18n="mega_about_lead_link">{{ __('site.mega_about_lead_link') }}</span>
                            <small><span data-i18n="nav_explore">{{ __('site.nav_explore') }}</span> <span><i class="fa-solid fa-arrow-right"></i></span></small>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Businesses Mega Menu -->
            <div class="nav-dropdown{{ $currentBiz ? ' is-current' : '' }}">
                <button class="dropdown-trigger">
                    <span data-i18n="nav_businesses">{{ __('site.nav_businesses') }}</span>
                    <span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>

                <div class="mega-menu">

                    <div class="mega-menu-intro">
                        <span class="menu-label" data-i18n="mega_biz_label">{{ __('site.mega_biz_label') }}</span>
                        <h3 data-i18n-html="mega_biz_heading">{!! __('site.mega_biz_heading') !!}</h3>
                        <p data-i18n="mega_biz_text">{{ __('site.mega_biz_text') }}</p>
                    </div>

                    {{-- Columns come from config/businesses.php, one per group --}}
                    @foreach ($bizGroups as $groupKey => $groupLabel)
                        <div class="mega-column">
                            <span class="column-title">
                                {{ $groupLabel }}
                            </span>

                            @foreach ($bizBrands as $slug => $biz)
                                @continue($biz['group'] !== $groupKey)
                                <a href="{{ route('business', $slug) }}"{!! $currentBiz === $slug ? ' aria-current="page"' : '' !!}>
                                    {{ $biz['menu'] }}
                                    <small><span data-i18n="nav_explore">{{ __('site.nav_explore') }}</span> <span><i class="fa-solid fa-arrow-right"></i></span></small>
                                </a>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>

            <a href="{{ route('sustainability') }}"{!! $pageCode === 'Sustainability' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_sustainability">{{ __('site.nav_sustainability') }}</span></a>
            <a href="{{ route('careers.index') }}"{!! $pageCode === 'Careers' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_careers">{{ __('site.nav_careers') }}</span></a>
            <a href="{{ route('news') }}"{!! $pageCode === 'News' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_news">{{ __('site.nav_news') }}</span></a>
            <a href="{{ $home }}#contact"><span data-i18n="nav_contact">{{ __('site.nav_contact') }}</span></a>

            @if(config('app.show_language_switcher'))
            <nav class="lang-switcher" aria-label="{{ __('site.lang_switcher_label') }}"
                 data-i18n-attr="aria-label:lang_switcher_label">
                <a href="{{ route('lang.switch', 'en') }}" lang="en" hreflang="en"
                   data-locale="en"
                   class="lang-opt{{ app()->getLocale() === 'en' ? ' lang-opt--on' : '' }}">EN</a>
                <span class="lang-div" aria-hidden="true">|</span>
                <a href="{{ route('lang.switch', 'am') }}" lang="am" hreflang="am"
                   data-locale="am"
                   class="lang-opt{{ app()->getLocale() === 'am' ? ' lang-opt--on' : '' }}">አማ</a>
            </nav>
            @endif

            <a href="{{ $home }}#contact" class="talk-button">
                <span data-i18n="nav_lets_talk">{{ __('site.nav_lets_talk') }}</span>
            </a>

        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-button" id="menuOpen"
                aria-label="{{ __('site.nav_open_menu') }}"
                data-i18n-attr="aria-label:nav_open_menu">
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
        <button class="mobile-nav-close" id="menuClose"
                aria-label="{{ __('site.nav_close_menu') }}"
                data-i18n-attr="aria-label:nav_close_menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <nav class="container mobile-nav-links"
         aria-label="{{ __('site.nav_mobile_label') }}"
         data-i18n-attr="aria-label:nav_mobile_label">
        <a href="{{ $home }}#about"          style="--d: 0ms"{!! $pageCode === 'Home' || $isAbout ? ' aria-current="page"' : '' !!}><span data-i18n="nav_about">{{ __('site.nav_about') }}</span></a>
        <div class="mobile-nav-sub" style="--d: 25ms"
             aria-label="{{ __('site.nav_about_pages_label') }}"
             data-i18n-attr="aria-label:nav_about_pages_label">
            <a href="{{ route('about.history') }}"{!! $pageCode === 'History' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_our_history">{{ __('site.nav_our_history') }}</span></a>
            <a href="{{ route('about.leadership') }}"{!! $pageCode === 'Leadership' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_our_leadership">{{ __('site.nav_our_leadership') }}</span></a>
        </div>
        <a href="{{ $home }}#businesses"     style="--d: 50ms"{!! $currentBiz ? ' aria-current="page"' : '' !!}><span data-i18n="nav_businesses">{{ __('site.nav_businesses') }}</span></a>
        <div class="mobile-nav-sub" style="--d: 75ms"
             aria-label="{{ __('site.nav_biz_pages_label') }}"
             data-i18n-attr="aria-label:nav_biz_pages_label">
            @foreach ($bizBrands as $slug => $biz)
                <a href="{{ route('business', $slug) }}"{!! $currentBiz === $slug ? ' aria-current="page"' : '' !!}>{{ $biz['menu'] }}</a>
            @endforeach
        </div>
        <a href="{{ route('sustainability') }}" style="--d: 100ms"{!! $pageCode === 'Sustainability' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_sustainability">{{ __('site.nav_sustainability') }}</span></a>
        <a href="{{ route('careers.index') }}" style="--d: 150ms"{!! $pageCode === 'Careers' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_careers">{{ __('site.nav_careers') }}</span></a>
        <a href="{{ route('news') }}" style="--d: 200ms"{!! $pageCode === 'News' ? ' aria-current="page"' : '' !!}><span data-i18n="nav_news">{{ __('site.nav_news') }}</span></a>
        <a href="{{ $home }}#contact"        style="--d: 250ms"><span data-i18n="nav_contact">{{ __('site.nav_contact') }}</span></a>
    </nav>

    <div class="container mobile-nav-brands">
        <span>Romina Restaurants</span>
        <span>KOBA</span>
        <span>Bacio Cremeria</span>
        <span>Meskott</span>
        <span>Romina Coffee</span>
        <span>Romina Imports</span>
        <span>Jaquar World</span>
    </div>

    @if(config('app.show_language_switcher'))
    <nav class="container mobile-lang-sw"
         aria-label="{{ __('site.lang_switcher_label') }}"
         data-i18n-attr="aria-label:lang_switcher_label">
        <a href="{{ route('lang.switch', 'en') }}" lang="en" hreflang="en"
           data-locale="en"
           class="mobile-lang-opt{{ app()->getLocale() === 'en' ? ' mobile-lang-opt--on' : '' }}">EN — English</a>
        <a href="{{ route('lang.switch', 'am') }}" lang="am" hreflang="am"
           data-locale="am"
           class="mobile-lang-opt{{ app()->getLocale() === 'am' ? ' mobile-lang-opt--on' : '' }}">አማ — አማርኛ</a>
    </nav>
    @endif

    <div class="container mobile-nav-foot">
        <a href="mailto:info@rominaplc.com">info@rominaplc.com</a>
    </div>

</div>
