{{-- =============================================
     ROMINA COFFEE — exact port of React section
============================================== --}}

<section class="coffee-sec" id="coffee">

    {{-- 1. HERO: beans full-bleed (video when available, image fallback) --}}
    @php
        $mp4Path    = public_path('videos/coffee-legacy.mp4');
        $webmPath   = public_path('videos/coffee-legacy.webm');
        $mobilePath = public_path('videos/coffee-legacy-mobile.mp4');
        $hasMp4     = file_exists($mp4Path);
        $hasWebm    = file_exists($webmPath);
        $hasMobile  = file_exists($mobilePath);
        $poster     = asset('images/coffee/green-beans-burlap.webp');
    @endphp

    <div class="cof-beans{{ $hasMp4 ? ' has-player' : '' }}" id="cofBeans">

        <div class="cof-beans-img" id="cofBeansImg">
            @if ($hasMp4)
                <video
                    class="cof-bg-video"
                    id="cofBgVideo"
                    muted
                    playsinline
                    preload="metadata"
                    poster="{{ $poster }}"
                    aria-hidden="true"
                    @if ($hasMobile)
                        data-mobile-src="{{ route('media.video', 'coffee-legacy-mobile.mp4') }}?v={{ filemtime($mobilePath) }}"
                    @endif
                >
                    @if ($hasWebm)
                        <source src="{{ route('media.video', 'coffee-legacy.webm') }}?v={{ filemtime($webmPath) }}" type="video/webm">
                    @endif
                    <source src="{{ route('media.video', 'coffee-legacy.mp4') }}?v={{ filemtime($mp4Path) }}" type="video/mp4">
                </video>
            @else
                <img loading="lazy" decoding="async"
                    src="{{ $poster }}"
                    alt="Green Ethiopian coffee beans drying on raised beds"
                >
            @endif
        </div>

        <div class="cof-wrap cof-beans-copy" id="cofBeansCopy">

            <p class="mark tone-white">
                <span class="mark-rule"></span>
                <i aria-hidden="true"></i>
                Romina Coffee, since 2009
            </p>

            <h2 class="cof-display">Upholding the legacy of Ethiopian coffee</h2>

            <p class="cof-lead">
                Ethiopian coffee is more than an export commodity. It is one of life's little
                luxuries, a catalyst for meaningful social interaction, and a source of
                inspiration worldwide.
            </p>

        </div>

        @if ($hasMp4)
        <div class="cof-player-ui" id="cofPlayerUi">

            {{-- Center play / pause / replay button --}}
            <button class="cof-center-btn" id="cofCenterBtn" type="button" aria-label="Play video">
                <svg class="icon-play" width="34" height="34" viewBox="0 0 24 24" aria-hidden="true">
                    <polygon fill="currentColor" points="6,3 20,12 6,21"/>
                </svg>
                <svg class="icon-pause" width="34" height="34" viewBox="0 0 24 24" aria-hidden="true" style="display:none">
                    <rect fill="currentColor" x="5" y="2" width="5" height="20" rx="1.5"/>
                    <rect fill="currentColor" x="14" y="2" width="5" height="20" rx="1.5"/>
                </svg>
                <svg class="icon-replay" width="34" height="34" viewBox="0 0 24 24" aria-hidden="true" style="display:none">
                    <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="1,4 1,10 7,10"/>
                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3.51 15a9 9 0 1 0 .49-4.98L1 10"/>
                </svg>
            </button>

            {{-- Bottom control bar --}}
            <div class="cof-controls" id="cofControls" role="toolbar" aria-label="Video controls">
                <div class="cof-ctrl-inner">

                    {{-- Seek timeline --}}
                    <div class="cof-seek-wrap" id="cofSeekWrap">
                        <div class="cof-seek-track">
                            <div class="cof-seek-buffered" id="cofSeekBuf"></div>
                            <div class="cof-seek-played"   id="cofSeekPlayed">
                                <span class="cof-seek-handle"></span>
                            </div>
                        </div>
                        <div class="cof-seek-tip" id="cofSeekTip">0:00</div>
                    </div>

                    {{-- Button row --}}
                    <div class="cof-ctrl-row">

                        <div class="cof-ctrl-left">
                            <button class="cof-ctrl-btn" id="cofCtrlPlay" type="button" aria-label="Play">
                                <svg class="icon-play" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <polygon fill="currentColor" points="6,3 20,12 6,21"/>
                                </svg>
                                <svg class="icon-pause" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" style="display:none">
                                    <rect fill="currentColor" x="5" y="2" width="5" height="20" rx="1.5"/>
                                    <rect fill="currentColor" x="14" y="2" width="5" height="20" rx="1.5"/>
                                </svg>
                            </button>
                            <button class="cof-ctrl-btn" id="cofCtrlRew" type="button" aria-label="Rewind 10 seconds">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="11,17 6,12 11,7"/>
                                    <polyline points="18,17 13,12 18,7"/>
                                </svg>
                            </button>
                            <button class="cof-ctrl-btn" id="cofCtrlFwd" type="button" aria-label="Forward 10 seconds">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="13,17 18,12 13,7"/>
                                    <polyline points="6,17 11,12 6,7"/>
                                </svg>
                            </button>
                            <span class="cof-time" id="cofTime" aria-live="off">0:00 / 0:00</span>
                        </div>

                        <div class="cof-ctrl-right">
                            <div class="cof-speed-wrap" id="cofSpeedWrap">
                                <button class="cof-ctrl-btn cof-speed-btn" id="cofSpeedBtn"
                                        type="button" aria-label="Playback speed"
                                        aria-haspopup="menu" aria-expanded="false">1×</button>
                                <div class="cof-speed-menu" id="cofSpeedMenu" role="menu" aria-label="Playback speed">
                                    <button role="menuitem" type="button" data-speed="0.5">0.5×</button>
                                    <button role="menuitem" type="button" data-speed="0.75">0.75×</button>
                                    <button role="menuitem" type="button" data-speed="1" class="active">1×</button>
                                    <button role="menuitem" type="button" data-speed="1.25">1.25×</button>
                                    <button role="menuitem" type="button" data-speed="1.5">1.5×</button>
                                    <button role="menuitem" type="button" data-speed="2">2×</button>
                                </div>
                            </div>
                            <button class="cof-ctrl-btn" id="cofCtrlMute" type="button" aria-label="Mute">
                                <svg class="icon-vol" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <polygon fill="currentColor" points="11,5 6,9 2,9 2,15 6,15 11,19"/>
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M15.54 8.46a5 5 0 0 1 0 7.07"/>
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M19.07 4.93a10 10 0 0 1 0 14.14"/>
                                </svg>
                                <svg class="icon-muted" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" style="display:none">
                                    <polygon fill="currentColor" points="11,5 6,9 2,9 2,15 6,15 11,19"/>
                                    <line stroke="currentColor" stroke-width="2" stroke-linecap="round" x1="23" y1="9"  x2="17" y2="15"/>
                                    <line stroke="currentColor" stroke-width="2" stroke-linecap="round" x1="17" y1="9"  x2="23" y2="15"/>
                                </svg>
                            </button>
                            <div class="cof-vol-wrap" id="cofVolWrap">
                                <input type="range" class="cof-vol-slider" id="cofVolSlider"
                                       min="0" max="1" step="0.05" value="1" aria-label="Volume">
                            </div>
                            <button class="cof-ctrl-btn" id="cofCtrlFs" type="button" aria-label="Full screen">
                                <svg class="icon-fs" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="15,3 21,3 21,9"/>
                                    <polyline points="9,21 3,21 3,15"/>
                                    <line x1="21" y1="3"  x2="14" y2="10"/>
                                    <line x1="3"  y1="21" x2="10" y2="14"/>
                                </svg>
                                <svg class="icon-exit-fs" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:none">
                                    <polyline points="4,14 10,14 10,20"/>
                                    <polyline points="20,10 14,10 14,4"/>
                                    <line x1="10" y1="14" x2="3"  y2="21"/>
                                    <line x1="21" y1="3"  x2="14" y2="10"/>
                                </svg>
                            </button>
                        </div>

                    </div>{{-- /.cof-ctrl-row --}}
                </div>{{-- /.cof-ctrl-inner --}}
            </div>{{-- /.cof-controls --}}

        </div>{{-- /.cof-player-ui --}}
        @endif

    </div>


    {{-- 2. GRID: sticky photo left + stats right --}}
    <div class="cof-wrap cof-grid">

        <div class="cof-photo">
            <div class="cof-photo-in">
                <img loading="lazy" decoding="async"
                    src="{{ asset('images/coffee/quality-control.webp') }}"
                    alt="Quality control in the Romina Coffee warehouse"
                >
            </div>
            <p class="cof-caption">Quality control at our export warehouse.</p>
        </div>

        <ol class="cof-stats" id="cofStats">

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="24">0</span>+</p>
                <div>
                    <p class="cof-stat-l">Wet mill stations</p>
                    <p class="cof-stat-t">Located across all major coffee-growing regions, at advantageous altitudes.</p>
                </div>
            </li>

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="6">0</span></p>
                <div>
                    <p class="cof-stat-l">Coffee-growing regions</p>
                    <p class="cof-stat-t">Sidamo, Limmu, Yirgachefe, Guji, Nekempte and Nansabo.</p>
                </div>
            </li>

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="3500">0</span></p>
                <div>
                    <p class="cof-stat-l">Tons of annual capacity</p>
                    <p class="cof-stat-t">Annual production capacity, in tons.</p>
                </div>
            </li>

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="30000">0</span>+</p>
                <div>
                    <p class="cof-stat-l">Farmers Collaborated With</p>
                    <p class="cof-stat-t">Supplying beans of varied tastes and profiles.</p>
                </div>
            </li>

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="6000+">0</span>+</p>
                <div>
                    <p class="cof-stat-l">Specialty Farmer Partners</p>
                    <p class="cof-stat-t">Smallholders producing specialty coffee in the Oromia region.</p>
                </div>
            </li>

            <li>
                <p class="cof-stat-n"><span class="cof-count" data-to="7">0</span></p>
                <div>
                    <p class="cof-stat-l">Certified Stations</p>
                    <p class="cof-stat-t">Holding Rainforest Alliance & Organic Certifications</p>
                </div>
            </li>

        </ol>

    </div>


    {{-- 3. QUOTE + MARKETS --}}
    {{--   Left: quote + export markets. Right: masonry of coffee photos
           (tile spans are set in CSS: .cof-mason-a … d). --}}
    <div class="cof-wrap cof-quote" id="cofQuote">

        <div class="cof-quote-copy">
            <p class="cof-quote-text">"Spreading the Magic Across Continents."</p>
            <p class="cof-markets-label">Exporting to</p>
            <ul class="cof-markets">
                <li>Europe</li>
                <li>USA</li>
                <li>Asia</li>
                <li>Middle East</li>
            </ul>
        </div>

        <div class="cof-mason">
            <figure class="cof-mason-a">
                <img src="{{ asset('images/coffee/warehouse-gate.webp') }}" alt="Sacks of export coffee stacked in the warehouse" loading="lazy">
                <figcaption>Ready for export</figcaption>
            </figure>
            <figure class="cof-mason-b">
                <img src="{{ asset('images/coffee/romina-sack.webp') }}" alt="A Romina sack stamped Produce of Ethiopia, washed Arabica" loading="lazy">
                <figcaption>Produce of Ethiopia</figcaption>
            </figure>
            <figure class="cof-mason-c">
                <img src="{{ asset('images/coffee/green-beans-burlap.webp') }}" alt="Green coffee beans in a burlap sack" loading="lazy">
                <figcaption>Green coffee</figcaption>
            </figure>
            <figure class="cof-mason-d">
                <img src="{{ asset('images/coffee/cupping-table.webp') }}" alt="Green coffee samples lined up on the cupping table" loading="lazy">
                <figcaption>Cup testing</figcaption>
            </figure>
        </div>

    </div>


    {{-- 4. JOURNEY: farm to global market --}}
    <div class="cof-wrap cof-journey" id="cofJourney">

        <h3 class="cof-journey-h3">From farm to global market</h3>

        <ol class="cof-j-list">
            <span class="cof-j-line"><i></i></span>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">01</span><span class="cof-j-name">Farm</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">02</span><span class="cof-j-name">Harvest</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">03</span><span class="cof-j-name">Wet mill</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">04</span><span class="cof-j-name">Processing</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">05</span><span class="cof-j-name">Cup testing</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">06</span><span class="cof-j-name">Export</span></li>
            <li><span class="cof-j-dot"></span><span class="cof-j-n">07</span><span class="cof-j-name">Global market</span></li>
        </ol>

        <div class="cof-j-sort">
            <img loading="lazy" decoding="async"
                src="{{ asset('images/coffee/sorting-line.webp') }}"
                alt="Hand-sorting green coffee at a processing station"
            >
        </div>

    </div>


    {{-- 5. THREE COLUMNS --}}
    <div class="cof-wrap cof-cols">

        <div>
            <h4>Quality assurance</h4>
            <p>Careful handpicking and rigorous cupping tests before any lot is approved for export.</p>
        </div>

        <div>
            <h4>Traceability</h4>
            <p>Farm-to-cup tracking, from the station where a lot is washed through to delivery.</p>
        </div>

        <div>
            <h4>Farmers first</h4>
            <p>Training and knowledge transfer, disease-resistant seedlings and shade trees, and fairer
               compensation through higher pricing and a post-sale share.</p>
        </div>

    </div>

</section>
