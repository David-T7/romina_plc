@if (!empty($brand['locations']))
<section class="ce-regions" id="bz-locations" aria-labelledby="ce-regions-title">
    <div class="container ce-regions-grid">
        <div class="ce-regions-copy">
            <p class="ce-eyebrow">{{ $brand['locations_label'] }}</p>
            <h2 id="ce-regions-title">Six Regions,<br>One Legacy.</h2>
            <p>Our coffee begins in Ethiopia’s growing regions. These are the origins behind Romina’s Arabica sourcing.</p>
            <ol class="ce-region-list">
                @foreach ($brand['locations'] as $region)
                    <li><span class="ce-region-index" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span><span>{{ $region['name'] }}</span></li>
                @endforeach
            </ol>
        </div>
        <figure class="ce-regions-photo">
            <button type="button" class="bz-tile-btn ce-support-photo" data-full="{{ asset('images/coffee-origin/03-drying-beds-team.webp') }}" data-caption="Care at the Source" aria-label="Enlarge photo: coffee drying on raised beds">
                <img src="{{ asset('images/coffee-origin/03-drying-beds-team.webp') }}" width="2000" height="1333" loading="lazy" decoding="async" alt="A team working with coffee spread across raised drying beds">
            </button>
            <figcaption><span>Ethiopian origins</span><strong>Care at the source.</strong></figcaption>
        </figure>
    </div>
</section>
@endif
