{{--
    ACCOMPLISHMENTS — swipeable milestone cards
    Edit $accomplishments below to add/change milestones. No JS data island needed.
    'img' shows a photo (framed by 'pos'); without it the card keeps its 'shot' placeholder.
--}}

<?php
// TODO: replace with client-supplied accomplishments before launch
$accomplishments = [
    [
        'year'  => '1973',
        'cat'   => 'Founded',
        'title' => 'Founded in 4 Kilo',
        'desc'  => 'Girma Taye opens a small restaurant in 4 Kilo, Addis Ababa — the seed of Romina Group.',
        'shot'  => 'The 4 Kilo monument, Addis Ababa, where Romina began',
        'img'   => 'images/stock/arat-kilo-monument.webp',
        'pos'   => '50% 30%',
    ],
    [
        'year'  => '3,714',
        'cat'   => 'Community',
        'title' => 'Farmers supported',
        'desc'  => 'Romina Coffee directly supports 3,714 smallholder farmers across Ethiopia\'s coffee regions.',
        'shot'  => 'Coffee farmers sorting beans on raised drying beds',
        'img'   => 'images/coffee-origin/01-sorting-drying-beds.webp',
        'pos'   => '50% 50%',
    ],
    [
        'year'  => '7',
        'cat'   => 'Certifications',
        'title' => 'Organic & Rainforest Alliance certified',
        'desc'  => 'Eight certifications including organic and Rainforest Alliance recognition for sustainable practices.',
        'shot'  => 'Green coffee samples on the cupping table',
        'img'   => 'images/coffee/cupping-table.webp',
        'pos'   => '50% 60%',
    ],
    [
        'year'  => '4',
        'cat'   => 'CSR',
        'title' => 'Schools built in coffee communities',
        'desc'  => 'Four schools constructed in remote coffee-growing communities, improving access to education.',
        'shot'  => 'Students learning in a classroom',
        'img'   => 'images/stock/classroom.webp',
        'pos'   => '50% 50%',
    ],
    [
        'year'  => '50+',
        'cat'   => 'Infrastructure',
        'title' => 'Potable water & road infrastructure',
        'desc'  => 'Potable-water sites and road infrastructure developed to serve rural coffee-growing regions.',
        'shot'  => 'A girl drinking from a clean-water tap',
        'img'   => 'images/stock/clean-water.webp',
        'pos'   => '50% 40%',
    ],
];
?>

<section class="sec ac-section" id="accomplishments" aria-labelledby="acHeading">
    <div class="ac-wrap">

        <div class="ac-head">
            <div>
                <p class="mark">
                    <span class="mark-rule"></span>
                    <i></i>
                    Our accomplishments
                </p>
                <h2 class="t-h2" id="acHeading">Milestones we're<br>proud of.</h2>
            </div>

            <div class="ac-arrows" role="group" aria-label="Scroll accomplishments">
                <button class="ac-prev" aria-label="Previous accomplishment">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="ac-next" aria-label="Next accomplishment">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>

        <div class="ac-track-outer">
            <ul class="ac-track" id="acTrack" tabindex="0" aria-label="Our accomplishments" role="list">
                @foreach ($accomplishments as $i => $item)
                <li class="ac-card" data-index="{{ $i }}" role="listitem">
                    @if (!empty($item['img']))
                        <div class="ac-card-img">
                            <img src="{{ asset($item['img']) }}" alt="{{ $item['shot'] }}"
                                 loading="lazy" decoding="async" style="object-position: {{ $item['pos'] ?? '50% 50%' }}">
                        </div>
                    @else
                        <div class="ac-card-img"
                             role="img"
                             aria-label="Image placeholder: {{ $item['shot'] }}">
                            <span class="ac-img-inner">
                                <span class="ac-ph-tag"><i></i>PHOTOGRAPH REQUIRED</span>
                                <span class="ac-ph-shot">{{ $item['shot'] }}</span>
                            </span>
                        </div>
                    @endif
                    <div class="ac-card-body">
                        <span class="ac-badge">{{ $item['year'] }}</span>
                        <span class="ac-cat">{{ $item['cat'] }}</span>
                        <h3 class="ac-title">{{ $item['title'] }}</h3>
                        <p class="ac-desc">{{ $item['desc'] }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="ac-progress" aria-hidden="true">
            <span class="ac-progress-track">
                <i class="ac-progress-dot"></i>
            </span>
        </div>

    </div>
</section>
