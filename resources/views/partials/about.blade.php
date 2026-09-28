<section id="about" class="about-section">
    <div class="container">

        <!-- =============================================
             TWO-COLUMN INTRO
        ============================================== -->

        <div class="about-grid">

            <!-- Left: section label + big heading -->
            <div class="about-head">
                <span class="about-mark">Who we are</span>
                <h2 class="about-heading">
                    Find out all about Romina's<br>
                    corporate business.
                </h2>
            </div>

            <!-- Right: Amharic welcome + copy -->
            <div class="about-copy">
                <p class="amh" lang="am">እንኳን ደህና መጡ</p>
                <h3 class="about-sub">Welcome to Romina Group</h3>
                <p class="about-body">
                    Founded in 1973 by Girma Taye as a small restaurant in 4 Kilo,
                    Romina has grown over five decades into a diversified Ethiopian enterprise,
                    through strategic expansion, successful partnerships and an unwavering
                    commitment to excellence.
                </p>
            </div>

        </div>


        <!-- =============================================
             TIMELINE
        ============================================== -->

        @php
            $tlMilestones = [
                ['year' => 1973,           'label' => '1973',  'title' => 'Romina Restaurant'],
                ['year' => 2009,           'label' => '2009',  'title' => 'Romina Coffee' ],
                ['year' => 2017,           'label' => '2017',  'title' => 'Jaquar World'  ],
                ['year' => 2020,           'label' => '2020',  'title' => 'KOBA'          ],
                ['year' => (int)date('Y'), 'label' => 'Today', 'title' => 'Romina Group'  ],
            ];

            // sqrt-weighted gaps so large spans compress and tight clusters expand
            $tlGaps = [0];
            for ($i = 1, $n = count($tlMilestones); $i < $n; $i++) {
                $tlGaps[] = sqrt($tlMilestones[$i]['year'] - $tlMilestones[$i-1]['year']);
            }
            $tlCum = [];  $tlSum = 0;
            foreach ($tlGaps as $g) { $tlSum += $g; $tlCum[] = $tlSum; }
            $tlTotal  = max($tlSum, 1);
            $tlCount  = count($tlMilestones);
        @endphp

        <div class="tl" id="timeline">

            <div class="tl-rail">

                <span class="tl-line"></span>
                <span class="tl-dot" id="tlDot"></span>

                {{-- equal left= keeps original layout at <1024px; --pos drives sqrt spacing at ≥1024px --}}
                @foreach ($tlMilestones as $m)
                    @php
                        $equalPct = round($loop->index / ($tlCount - 1) * 100, 2);
                        $sqrtPct  = round($tlCum[$loop->index] / $tlTotal * 100, 2);
                    @endphp
                    <button class="tl-node{{ $loop->first ? ' on' : '' }}"
                            data-index="{{ $loop->index }}"
                            style="left: {{ $equalPct }}%; --pos: {{ $sqrtPct }}%"
                            aria-pressed="{{ $loop->first ? 'true' : 'false' }}">
                        <span class="tl-year">{{ $m['label'] }}</span>
                        <span class="tl-title">{{ $m['title'] }}</span>
                    </button>
                @endforeach

            </div>


            <div class="tl-detail" id="tlDetail">
                <span class="tl-big" id="tlBig" aria-hidden="true">1973</span>
                <p id="tlText">
                    Girma Taye opens a small, cherished restaurant in Arat Kilo,
                    in the heart of Addis Ababa.
                </p>
            </div>

        </div>

    </div>
</section>
