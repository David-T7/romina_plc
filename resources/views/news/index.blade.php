@extends('layouts/mainlayout')

@section('page-content')


@include('partials.page-hero', [
    'label' => 'NEWS',
    'crumb' => 'News',
    'title' => 'Stories from<br><span>the Group.</span>',
    'text'  => 'News, milestones and stories from across our restaurants, coffee, imports and community work.',
    'image' => 'images/hero/hero-02.jpg',
])


{{-- =====================================================
     FEATURED STORY
===================================================== --}}
@if ($featured)
<section class="news-featured-section">
    <div class="container">

        <p class="mark">
            <span class="mark-rule"></span>
            <i></i>
            Latest
        </p>

        <a href="{{ route('news.show', $featured['slug']) }}" class="news-featured">
            <div class="news-featured-media">
                <img src="{{ asset($featured['image']) }}" alt="{{ $featured['title'] }}" loading="lazy">
            </div>
            <div class="news-featured-body">
                <div class="news-meta">
                    <span class="news-cat">{{ $featured['category'] }}</span>
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
                                <span class="news-cat">{{ $article['category'] }}</span>
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
                <p>No news to share right now — check back soon.</p>
            </div>
        @endif

    </div>
</section>


@endsection
