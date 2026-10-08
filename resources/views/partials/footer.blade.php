    {{-- ==========================================
         FOOTER (ported from React romina.jsx)
    =========================================== --}}

    <footer class="ftr">
        <div class="container">

            <div class="ftr-top">
                <img src="{{ asset('images/logo/logo-romina-white.svg') }}"
                     alt="Romina, since 1973"
                     class="ftr-logo"
                     width="160" height="50">
                <span class="ftr-divider" aria-hidden="true"><b></b><i></i><b></b></span>
            </div>

            <div class="ftr-cols">
                <div>
                    <p class="ftr-h" data-i18n="ftr_group_col">{{ __('site.ftr_group_col') }}</p>
                    <a href="{{ url('/') }}#about"><span data-i18n="nav_about">{{ __('site.nav_about') }}</span></a>
                    <a href="{{ url('/') }}#businesses"><span data-i18n="nav_businesses">{{ __('site.nav_businesses') }}</span></a>
                    <a href="{{ route('sustainability') }}"><span data-i18n="nav_sustainability">{{ __('site.nav_sustainability') }}</span></a>
                    <a href="{{ url('/') }}#careers"><span data-i18n="nav_careers">{{ __('site.nav_careers') }}</span></a>
                    <a href="{{ url('/') }}#news"><span data-i18n="nav_news">{{ __('site.nav_news') }}</span></a>
                    <a href="{{ url('/') }}#contact"><span data-i18n="nav_contact">{{ __('site.nav_contact') }}</span></a>
                </div>
                <div>
                    <p class="ftr-h" data-i18n="ftr_businesses_col">{{ __('site.ftr_businesses_col') }}</p>
                    <a href="{{ route('business', 'romina-restaurants') }}">Romina Restaurants</a>
                    <a href="{{ route('business', 'koba-patisserie') }}">KOBA</a>
                    <a href="{{ route('business', 'bacio-cremeria') }}">Bacio Cremeria</a>
                    <a href="{{ route('business', 'meskott-culinary') }}">Meskott</a>
                    <a href="{{ route('business', 'romina-coffee') }}">Romina Coffee</a>
                    <a href="{{ route('business', 'romina-imports') }}">Romina Imports</a>
                    <a href="{{ route('business', 'jaquar-world') }}">Jaquar World</a>
                </div>
                <div>
                    <p class="ftr-h" data-i18n="ftr_head_office_col">{{ __('site.ftr_head_office_col') }}</p>
                    <p data-i18n-html="ftr_address">{!! __('site.ftr_address') !!}</p>
                    <a href="mailto:info@rominaplc.com">info@rominaplc.com</a>
                </div>
            </div>

            <p class="ftr-copy" data-i18n-html="ftr_copyright">{!! __('site.ftr_copyright', ['year' => date('Y')]) !!}</p>

        </div>
    </footer>
