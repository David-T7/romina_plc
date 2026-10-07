@extends('layouts/mainlayout')

@section('page-content')


@include('partials.page-hero', [
    'label' => 'NEWS',
    'crumb' => 'News',
    'title' => 'Stories from<br><span>the Group.</span>',
    'text'  => 'Events, launches, harvest updates, awards, community work and more from across our restaurants, coffee, imports and showrooms.',
    'image' => 'images/stock/boardroom.webp',
])


{{-- =====================================================
     CATEGORY FILTER — plain links (?category=key), so every
     view is shareable and works without JavaScript.
===================================================== --}}
<nav class="news-filter" aria-label="Filter news by category">
    <div class="container">
        <ul class="news-filter-list">
            <li>
                <a href="{{ route('news') }}"
                   class="news-filter-tab{{ $active ? '' : ' is-active' }}"
                   {!! $active ? '' : 'aria-current="page"' !!}>
                    <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                    All
                    <span class="news-filter-count">{{ $total }}</span>
                </a>
            </li>
            @foreach ($categories as $key => $cat)
                <li>
                    <a href="{{ route('news', ['category' => $key]) }}"
                       class="news-filter-tab{{ $active === $key ? ' is-active' : '' }}"
                       {!! $active === $key ? 'aria-current="page"' : '' !!}>
                        <i class="fa-solid {{ $cat['icon'] }}" aria-hidden="true"></i>
                        {{ $cat['label'] }}
                        <span class="news-filter-count">{{ $counts[$key] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>


{{-- =====================================================
     FEATURED STORY
===================================================== --}}
@if ($featured)
<section class="news-featured-section">
    <div class="container">

        <p class="mark">
            <span class="mark-rule"></span>
            <i></i>
            {{ $active ? 'Latest in ' . ($categories[$active]['full'] ?? $categories[$active]['label']) : 'Latest' }}
        </p>

        <a href="{{ route('news.show', $featured['slug']) }}" class="news-featured">
            <div class="news-featured-media">
                <img src="{{ asset($featured['image']) }}" alt="{{ $featured['title'] }}" loading="lazy">
            </div>
            <div class="news-featured-body">
                <div class="news-meta">
                    <span class="news-cat">{{ $categories[$featured['category']]['label'] ?? $featured['category'] }}</span>
                    <span class="news-date">{{ \Carbon\Carbon::parse($featured['date'])->format('d M Y') }}</span>
                </div>
                <h2>{{ $featured['title'] }}</h2>
                <p>{{ $featured['excerpt'] }}</p>
                <span class="news-readmore" aria-hidden="true">
                    Read story
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </span>
            </div>
        </a>

    </div>
</section>
@endif


{{-- =====================================================
     MORE STORIES
===================================================== --}}
<section class="news-list-section">
    <div class="container">

        @if (count($articles))
            <h2 class="t-h2 news-list-heading">More stories.</h2>

            <div class="news-grid">
                @foreach ($articles as $article)
                    <a href="{{ route('news.show', $article['slug']) }}" class="news-card">
                        <div class="news-card-media">
                            <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" loading="lazy">
                        </div>
                        <div class="news-card-body">
                            <div class="news-meta">
                                <span class="news-cat">{{ $categories[$article['category']]['label'] ?? $article['category'] }}</span>
                                <span class="news-date">{{ \Carbon\Carbon::parse($article['date'])->format('d M Y') }}</span>
                            </div>
                            <h3>{{ $article['title'] }}</h3>
                            <p>{{ $article['excerpt'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @elseif (!$featured)
            <div class="news-empty">
                <p>
                    @if ($active)
                        No {{ strtolower($categories[$active]['full'] ?? $categories[$active]['label']) }} to share right now.
                        <a href="{{ route('news') }}">See all news</a>
                    @else
                        No news to share right now — check back soon.
                    @endif
                </p>
            </div>
        @elseif ($active)
            <p class="news-list-note">
                That's everything in {{ $categories[$active]['label'] }} for now.
                <a href="{{ route('news') }}">See all news <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </p>
        @endif

    </div>
</section>


@endsection


@section('page-js')
<script>
/* On narrow screens the filter bar scrolls sideways — bring the active tab into view */
(function () {
    var list = document.querySelector('.news-filter-list');
    var tab  = list && list.querySelector('.news-filter-tab.is-active');
    if (!tab || list.scrollWidth <= list.clientWidth) return;
    list.scrollLeft = tab.parentElement.offsetLeft - (list.clientWidth - tab.offsetWidth) / 2;
}());
</script>
@endsection
