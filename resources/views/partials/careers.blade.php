{{--
     CAREERS — home page teaser
--}}

@php
    $today           = now()->toDateString();
    $openPositions   = array_values(array_filter(
        config('careers.positions'),
        fn($p) => $p['is_open'] && ($p['deadline'] === null || $p['deadline'] >= $today)
    ));
    $teaserPositions = array_slice($openPositions, 0, 3);
@endphp

<section class="careers" id="careers">
    <div class="container careers-grid">

        <div>
            <p class="mark tone-white">
                <span class="mark-rule"></span>
                <i class="careers-mark-dot"></i>
                Careers
            </p>
            <h2 class="t-h2 light">Grow with a family business that keeps growing.</h2>
        </div>

        <div class="careers-copy">
            <p class="t-lead careers-lead">Our people are the core of our success. Passionate, skilled individuals across restaurants, coffee, imports and group functions.</p>

            @if (count($teaserPositions))
                <ul class="careers-openings">
                    @foreach ($teaserPositions as $pos)
                        <li>
                            <a href="{{ route('careers.show', $pos['slug']) }}">
                                <span class="co-title">{{ $pos['title'] }}</span>
                                <span class="co-meta">
                                    {{ $pos['business'] }} &middot;
                                    {{ $pos['location'] }} &middot;
                                    {{ $pos['employment_type'] }}
                                </span>
                                <svg class="co-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                     stroke-linejoin="round" aria-hidden="true">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="careers-ph">
                    No open positions right now.
                    <a href="{{ route('careers.index') }}#apply" class="careers-general-link">Send us a general application.</a>
                </p>
            @endif

            <a href="{{ route('careers.index') }}" class="careers-btn">
                View all openings
                <svg class="careers-btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

    </div>
</section>
