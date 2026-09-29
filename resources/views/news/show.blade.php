@extends('layouts/mainlayout')

@section('page-content')


{{-- =====================================================
     ARTICLE HERO
===================================================== --}}
<section class="page-hero page-hero--plain news-article-hero">

    <div class="hero-background page-hero-bg"
         style="background-image: url('{{ asset($article['image']) }}');">
    </div>

    <div class="hero-overlay"></div>

    <div class="container page-hero-content">

        <nav class="page-hero-crumbs" aria-label="Breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            <a href="{{ route('news') }}">News</a>
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            <a href="{{ route('news', ['category' => $article['category']]) }}">{{ $categories[$article['category']]['label'] ?? $article['category'] }}</a>
        </nav>

        <div class="hero-category">{{ strtoupper($categories[$article['category']]['full'] ?? $categories[$article['category']]['label'] ?? $article['category']) }}</div>

        <h1>{{ $article['title'] }}</h1>

        <p class="news-article-date">{{ \Carbon\Carbon::parse($article['date'])->format('d M Y') }}</p>

    </div>

</section>


{{-- =====================================================
     ARTICLE BODY
===================================================== --}}
<article class="news-article-section">
    <div class="container">

        <div class="news-article-body">
            @foreach ($article['body'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>

        <a href="{{ route('news') }}" class="news-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"/>
                <polyline points="12 19 5 12 12 5"/>
            </svg>
            Back to all news
        </a>

    </div>
</article>


{{-- =====================================================
     RELATED STORIES
===================================================== --}}
@if (count($related))
<section class="news-list-section news-related-section">
    <div class="container">

        <h2 class="t-h2 news-list-heading">More stories.</h2>

        <div class="news-grid">
            @foreach ($related as $item)
                <a href="{{ route('news.show', $item['slug']) }}" class="news-card">
                    <div class="news-card-media">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy">
                    </div>
                    <div class="news-card-body">
                        <div class="news-meta">
                            <span class="news-cat">{{ $categories[$item['category']]['label'] ?? $item['category'] }}</span>
                            <span class="news-date">{{ \Carbon\Carbon::parse($item['date'])->format('d M Y') }}</span>
                        </div>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['excerpt'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>
@endif


@endsection
