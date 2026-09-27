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
                    <p class="ftr-h">Romina Group</p>
                    <a href="{{ url('/') }}#about">About</a>
                    <a href="{{ url('/') }}#businesses">Businesses</a>
                    <a href="{{ url('/') }}#sustainability">Sustainability</a>
                    <a href="{{ url('/') }}#careers">Careers</a>
                    <a href="{{ url('/') }}#news">News</a>
                    <a href="{{ url('/') }}#contact">Contact</a>
                </div>
                <div>
                    <p class="ftr-h">Businesses</p>
                    <a href="{{ url('/') }}#businesses">Romina Restaurants</a>
                    <a href="{{ url('/') }}#businesses">KOBA</a>
                    <a href="{{ url('/') }}#businesses">Meskott</a>
                    <a href="{{ url('/') }}#businesses">Romina Coffee</a>
                    <a href="{{ url('/') }}#businesses">Romina Imports</a>
                    <a href="{{ url('/') }}#businesses">Jaquar World</a>
                </div>
                <div>
                    <p class="ftr-h">Head office</p>
                    <p>Bole Atlas, Cape Verde Street<br>
                       Noah Diplomat Building, 13th floor<br>
                       Addis Ababa, Ethiopia</p>
                    <a href="mailto:info@rominaplc.com">info@rominaplc.com</a>
                </div>
            </div>

            <p class="ftr-copy">© <?php echo date('Y'); ?> Romina Group. All rights reserved.</p>

        </div>
    </footer>
