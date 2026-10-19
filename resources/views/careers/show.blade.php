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

                <h2>About the Role</h2>
                <p>{{ $position['description'] }}</p>

                <h2>What We're Looking For</h2>
                <ul class="car-req-list">
                    @foreach ($position['requirements'] as $req)
                        <li>{{ $req }}</li>
                    @endforeach
                </ul>

                <a href="{{ $position['apply_url'] }}" class="car-apply-link"
                   target="_blank" rel="noopener noreferrer">
                    Apply on EthioJobs
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>

            </div>

            {{-- Sidebar --}}
            <aside class="car-detail-sidebar">
                <h3>Role Summary</h3>
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

                <a href="{{ $position['apply_url'] }}" class="car-sidebar-apply"
                   target="_blank" rel="noopener noreferrer">
                    Apply on EthioJobs
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </aside>

        </div>
    </div>
</section>


@endsection
