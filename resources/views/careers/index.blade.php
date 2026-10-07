@extends('layouts/mainlayout')

@section('page-content')


@include('partials.page-hero', [
    'label' => 'CAREERS',
    'crumb' => 'Careers',
    'title' => 'Grow with a family business<br><span>that keeps growing.</span>',
    'text'  => 'We\'re always looking for talented, passionate people to join our team across restaurants, coffee, imports and group functions.',
    'image' => 'images/stock/team-meeting.webp',
])


{{-- =====================================================
     WHY JOIN ROMINA
===================================================== --}}
<section class="car-why">
    <div class="container">

        <p class="mark">
            <span class="mark-rule"></span>
            <i></i>
            Why Romina
        </p>
        <h2 class="t-h2">Why join us.</h2>

        <div class="car-why-grid">

            <div class="car-why-item">
                <div class="car-why-num">01</div>
                <h3>A culture of growth</h3>
                {{-- TODO: Short description of your growth culture, learning environment, or promotion pathways --}}
                <p>We invest in our people. From day one, you'll have access to mentorship, on-the-job learning, and real opportunities to grow within the Group.</p>
            </div>

            <div class="car-why-item">
                <div class="car-why-num">02</div>
                <h3>Diverse opportunities</h3>
                {{-- TODO: Describe the range of roles across the Group's different businesses --}}
                <p>With businesses spanning hospitality, coffee export, imports and distribution, Romina Group offers a rare breadth of career paths under one roof.</p>
            </div>

            <div class="car-why-item">
                <div class="car-why-num">03</div>
                <h3>Competitive compensation</h3>
                {{-- TODO: Replace with actual benefits/compensation details from the client --}}
                <p>We offer competitive salaries and benefits aligned with industry standards, recognising the contribution of every member of our team.</p>
            </div>

            <div class="car-why-item">
                <div class="car-why-num">04</div>
                <h3>Meaningful work</h3>
                {{-- TODO: Describe the impact employees have on the company's mission/community --}}
                <p>Our work matters — from the farmers we partner with to the guests we welcome. You'll be part of a business with purpose and a five-decade legacy.</p>
            </div>

        </div>

    </div>
</section>


{{-- =====================================================
     OPEN POSITIONS
===================================================== --}}
<section class="car-positions">
    <div class="container">

        <p class="mark">
            <span class="mark-rule"></span>
            <i></i>
            Open Positions
        </p>
        <h2 class="t-h2">Current openings.</h2>

        @if (count($positions))

            {{-- Filter chips --}}
            @if (count($businesses) > 1)
                <div class="car-chips" id="carChips" role="group" aria-label="Filter by business">
                    <button class="car-chip active" data-filter="all" type="button">All</button>
                    @foreach ($businesses as $biz)
                        <button class="car-chip" data-filter="{{ $biz }}" type="button">{{ $biz }}</button>
                    @endforeach
                </div>
            @endif

            <div class="car-grid" id="carGrid">
                @foreach ($positions as $pos)
                    <a href="{{ route('careers.show', $pos['slug']) }}"
                       class="car-card"
                       data-business="{{ $pos['business'] }}">
                        <div class="car-card-info">
                            <h3>{{ $pos['title'] }}</h3>
                            <div class="car-card-meta">
                                <span>{{ $pos['business'] }}</span>
                                <span>{{ $pos['location'] }}</span>
                                <span>{{ $pos['employment_type'] }}</span>
                            </div>
                            @if ($pos['deadline'])
                                <p class="car-deadline">
                                    Deadline: {{ \Carbon\Carbon::parse($pos['deadline'])->format('d M Y') }}
                                </p>
                            @endif
                            <p class="car-card-summary">{{ $pos['summary'] }}</p>
                        </div>
                        <div class="car-card-cta" aria-hidden="true">
                            View &amp; apply
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>

        @else

            <div class="car-empty">
                <p>No open positions right now.</p>
                <a href="#apply">Send us a general application.</a>
            </div>

        @endif

    </div>
</section>


{{-- =====================================================
     GENERAL APPLICATION
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
                <h2 class="t-h2">Send your<br>application.</h2>
                <p class="car-apply-sub">
                    Don't see the right role? Submit a general application and we'll reach out when a match opens up.
                </p>
                <div class="car-apply-hints">
                    <p>CV: PDF, DOC or DOCX &mdash; max 5 MB</p>
                    <p>Questions? <a href="mailto:{{ config('careers.notify_email') }}">{{ config('careers.notify_email') }}</a></p>
                </div>
            </div>

            <div>
                @include('careers._form', ['position' => null, 'positions' => $positions])
            </div>

        </div>
    </div>
</section>


@endsection

@section('page-js')
<script>
/* Careers — filter chips */
(function () {
    var chips = document.querySelectorAll('#carChips .car-chip');
    var cards = document.querySelectorAll('#carGrid .car-card');
    if (!chips.length || !cards.length) return;

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            var filter = chip.dataset.filter;

            chips.forEach(function (c) {
                c.classList.toggle('active', c === chip);
                c.setAttribute('aria-pressed', c === chip ? 'true' : 'false');
            });

            cards.forEach(function (card) {
                var show = filter === 'all' || card.dataset.business === filter;
                card.style.display = show ? '' : 'none';
            });
        });
    });
}());
</script>
@endsection
