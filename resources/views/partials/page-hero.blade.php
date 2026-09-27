{{-- ==========================================
     PAGE HERO — banner for sub-pages
     Params: $label, $title (HTML allowed), $text, $image, $pageCode
     Optional: $crumb — breadcrumb label for pages outside About
     About pages get an "About" breadcrumb step and tabs between the About pages.
=========================================== --}}

@php
    $aboutPages = [
        'History'    => ['route' => 'about.history',    'label' => 'Our History'],
        'Leadership' => ['route' => 'about.leadership', 'label' => 'Our Leadership'],
    ];

    $isAboutPage = isset($aboutPages[$pageCode]);
    $crumb       = $isAboutPage ? $aboutPages[$pageCode]['label'] : ($crumb ?? $label);
@endphp

<section class="page-hero{{ $isAboutPage ? '' : ' page-hero--plain' }}">

    <div class="hero-background page-hero-bg"
         style="background-image: url('{{ asset($image) }}');">
    </div>

    <div class="hero-overlay"></div>

    <div class="container page-hero-content">

        <nav class="page-hero-crumbs" aria-label="Breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            @if ($isAboutPage)
                <a href="{{ url('/') }}#about">About</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            @endif
            <span aria-current="page">{{ $crumb }}</span>
        </nav>

        <div class="hero-category">{{ $label }}</div>

        <h1>{!! $title !!}</h1>

        <p>{{ $text }}</p>

    </div>

    @if ($isAboutPage)
        <div class="page-hero-tabs">
            <nav class="container" aria-label="About pages">
                @foreach ($aboutPages as $code => $page)
                    <a href="{{ route($page['route']) }}"
                       class="{{ $code === $pageCode ? 'active' : '' }}"
                       {!! $code === $pageCode ? 'aria-current="page"' : '' !!}>
                        <span class="page-hero-tab-num">0{{ $loop->iteration }}</span>
                        {{ $page['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    @endif

</section>
