<section class="imp-about" id="bz-overview" aria-labelledby="imp-about-title">
    <div class="container">
        <p class="imp-about-eyebrow">About {{ $brand['menu'] }}</p>
        <div class="imp-about-grid">
            <div class="imp-about-heading">
                <h2 id="imp-about-title">Quality products.<span>For everyday life.</span></h2>
                <p class="imp-about-summary">{{ count($brand['highlights']['items'] ?? []) }} product categories.<br>The care behind every essential.</p>
            </div>
            <div class="imp-about-copy">
                <p class="imp-about-lead">{{ $brand['body'][0] }}</p>
                <p class="imp-about-body">Today, Romina Imports brings in quality everyday food products and distributes essential goods to the Ethiopian market.</p>
            </div>
        </div>
        <ol class="imp-about-journey" aria-label="How Romina Imports developed">
            <li><span class="imp-about-step" aria-hidden="true">01</span><div><strong>Hospitality sourcing</strong><span>Where the business began</span></div><span class="imp-about-arrow" aria-hidden="true">→</span></li>
            <li><span class="imp-about-step" aria-hidden="true">02</span><div><strong>A dedicated import business</strong><span>Built on careful sourcing</span></div><span class="imp-about-arrow" aria-hidden="true">→</span></li>
            <li><span class="imp-about-step" aria-hidden="true">03</span><div><strong>The Ethiopian market</strong><span>Everyday food essentials</span></div></li>
        </ol>
    </div>
</section>
