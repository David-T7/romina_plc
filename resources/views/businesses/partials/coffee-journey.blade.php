{{-- =====================================================
     ROMINA COFFEE — "Where our coffee goes" export journey
     Two columns: the four destinations (existing wording, from
     config highlights) and an interactive map starting in Ethiopia.

     • Map: resources/views/businesses/partials/coffee-journey-map.blade.php
       (generated from Natural Earth by resources/map-data/build_coffee_map.py)
     • Engine + styles: "COFFEE JOURNEY" blocks in businesses/show.blade.php
       and public/css/main.css (all classes prefixed .cj-)
     • Order follows the config items; each item's 'route' key matches a
       data-route in the map. Destination points are representative points
       for each region, for visualisation only.
     Without JavaScript (or with reduced motion) every route shows at once.
===================================================== --}}
@php
    $cjRoutes = ['europe', 'usa', 'asia', 'middle-east'];   // map keys, in config order
    $cjItems  = $brand['highlights']['items'];
@endphp

<section class="cj" id="where-our-coffee-goes" data-cj aria-labelledby="cjTitle">
    <div class="cj-sticky">
        <div class="container cj-grid">

            {{-- ---------- left: destinations ---------- --}}
            <div class="cj-panel">
                <span class="bz-label bz-label--light">{{ $brand['highlights']['label'] }}</span>
                <h2 id="cjTitle" class="cj-title">{{ $brand['highlights']['title'] }}</h2>

                <ol class="cj-list" aria-label="{{ $brand['highlights']['label'] }}">
                    @foreach ($cjItems as $item)
                        <li>
                            <button type="button" class="cj-dest-btn" data-cj-go="{{ $loop->index }}"
                                    data-route="{{ $cjRoutes[$loop->index] ?? '' }}" aria-pressed="false">
                                <span class="cj-dest-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                                <span class="cj-dest-icon" aria-hidden="true"><i class="fa-solid {{ $item['icon'] }}"></i></span>
                                <span class="cj-dest-name">{{ $item['name'] }}</span>
                                <span class="cj-dest-bar" aria-hidden="true"><i></i></span>
                            </button>
                        </li>
                    @endforeach
                </ol>

                <p class="cj-hint" aria-hidden="true">
                    <i class="fa-solid fa-hand-pointer"></i> Scroll, or tap a destination or country on the map
                </p>
                <p class="cj-sr" aria-live="polite" data-cj-live></p>
            </div>

            {{-- ---------- right: map ---------- --}}
            <div class="cj-stage" role="region" aria-label="Map of Romina Coffee's journeys from Ethiopia">
                @include('businesses.partials.coffee-journey-map')

                {{-- HTML labels, positioned over the map by the engine --}}
                <div class="cj-labels" aria-hidden="true">
                    <span class="cj-label cj-label--origin" data-cj-label="origin">Ethiopia</span>
                    @foreach ($cjItems as $item)
                        <span class="cj-label" data-cj-label="{{ $cjRoutes[$loop->index] ?? '' }}">{{ $item['name'] }}</span>
                    @endforeach
                </div>
                <span class="cj-tip" aria-hidden="true" data-cj-tip></span>
                <span class="cj-vignette" aria-hidden="true"></span>
            </div>

        </div>
    </div>
</section>
