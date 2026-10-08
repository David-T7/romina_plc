@extends('layouts/mainlayout')

@section('page-content')

@include('partials.page-hero', [
    'label' => 'CAREERS',
    'crumb' => 'Careers',
    'title' => '<span>' . e($position['title']) . '</span>',
    'text'  => $position['summary'],
    'image' => 'images/coffee-origin/01-sorting-drying-beds.webp',
])


{{-- =====================================================
     POSITION DETAIL
===================================================== --}}
<section class="car-detail">
    <div class="container">

        <nav class="car-back-nav" aria-label="Back">
            <a href="{{ route('careers.index') }}" class="car-back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                All openings
            </a>
        </nav>

        <div class="car-detail-inner">

            {{-- Main content --}}
            <div class="car-detail-desc">

                <div class="car-detail-meta">
                    <span class="car-tag">{{ $position['business'] }}</span>
                    <span class="car-tag">{{ $position['location'] }}</span>
                    <span class="car-tag">{{ $position['employment_type'] }}</span>
                    @if ($position['deadline'])
                        <span class="car-tag car-tag--deadline">
                            Deadline: {{ \Carbon\Carbon::parse($position['deadline'])->format('d M Y') }}
                        </span>
                    @endif
                </div>

                <h2>About the role</h2>
                <p>{{ $position['description'] }}</p>

                <h2>What we're looking for</h2>
                <ul class="car-req-list">
                    @foreach ($position['requirements'] as $req)
                        <li>{{ $req }}</li>
                    @endforeach
                </ul>

                <a href="#apply" class="car-apply-link">
                    Apply for this role
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>

            </div>

            {{-- Sidebar --}}
            <aside class="car-detail-sidebar">
                <h3>Role summary</h3>
                <div class="car-sidebar-fact">
                    <span>Business</span>
                    <span>{{ $position['business'] }}</span>
                </div>
                <div class="car-sidebar-fact">
                    <span>Location</span>
                    <span>{{ $position['location'] }}</span>
                </div>
                <div class="car-sidebar-fact">
                    <span>Type</span>
                    <span>{{ $position['employment_type'] }}</span>
                </div>
                @if ($position['deadline'])
                    <div class="car-sidebar-fact">
                        <span>Deadline</span>
                        <span>{{ \Carbon\Carbon::parse($position['deadline'])->format('d M Y') }}</span>
                    </div>
                @else
                    <div class="car-sidebar-fact">
                        <span>Deadline</span>
                        <span>Rolling</span>
                    </div>
                @endif
            </aside>

        </div>
    </div>
</section>


{{-- =====================================================
     APPLY FORM
===================================================== --}}
<section class="car-apply-section" id="apply">
    <div class="container">
        <div class="car-apply-cols">

            <div class="car-apply-info">
                <p class="mark">
                    <span class="mark-rule"></span>
                    <i></i>
                    Apply Now
                </p>
                <h2 class="t-h2">Apply for<br>this role.</h2>
                <p class="car-apply-sub">
                    Fill in the form and attach your CV. We'll be in touch if your profile is a strong match.
                </p>
                <div class="car-apply-hints">
                    <p>CV: PDF, DOC or DOCX &mdash; max 5 MB</p>
                    <p>Questions? <a href="mailto:{{ config('careers.notify_email') }}">{{ config('careers.notify_email') }}</a></p>
                </div>
            </div>

            <div>
                @include('careers._form', ['position' => $position, 'positions' => []])
            </div>

        </div>
    </div>
</section>


@endsection
