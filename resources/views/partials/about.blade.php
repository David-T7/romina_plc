<section id="about" class="about-section">
    <div class="container">

        <!-- =============================================
             TWO-COLUMN INTRO
        ============================================== -->

        <div class="about-grid">

            <!-- Left: section label + big heading -->
            <div class="about-head">
                <span class="about-mark" data-i18n="about_mark">{{ __('site.about_mark') }}</span>
                <h2 class="about-heading" data-i18n-html="about_heading">
                    {!! __('site.about_heading') !!}
                </h2>
            </div>

            <!-- Right: Amharic welcome + copy -->
            <div class="about-copy">
                <p class="amh" lang="am" data-i18n="about_amh">{{ __('site.about_amh') }}</p>
                <h3 class="about-sub" data-i18n="about_sub">{{ __('site.about_sub') }}</h3>
                <p class="about-body" data-i18n="about_body">
                    {{ __('site.about_body') }}
                </p>
            </div>

        </div>


        <!-- =============================================
             TIMELINE
        ============================================== -->

        @php
            $tlMilestones = [
                ['year' => 1973,           'label' => '1973',  'i18n_title' => 'tl_0_title'],
                ['year' => 2009,           'label' => '2009',  'i18n_title' => 'tl_1_title'],
                ['year' => 2017,           'label' => '2017',  'i18n_title' => 'tl_2_title'],
                ['year' => 2020,           'label' => '2020',  'i18n_title' => 'tl_3_title'],
                ['year' => (int)date('Y'), 'label' => 'Today', 'i18n_title' => 'tl_4_title'],
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
                        <span class="tl-title" data-i18n="{{ $m['i18n_title'] }}">{{ __('site.' . $m['i18n_title']) }}</span>
                    </button>
                @endforeach

            </div>


            <div class="tl-detail" id="tlDetail">
                <span class="tl-big" id="tlBig" aria-hidden="true">1973</span>
                <p id="tlText" data-i18n-dynamic="tl_text">
                    {{ __('site.tl_0_text') }}
                </p>
            </div>

        </div>

    </div>
</section>
