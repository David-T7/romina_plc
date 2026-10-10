@php
    $ksStories = [
        ['name' => 'The craft', 'image' => 'images/koba/koba-cakes.jpg', 'alt' => 'A handcrafted cake on a KOBA cafe table', 'copy' => 'Artisan baking, fresh pastries and celebration cakes, made with care.'],
        ['name' => 'The spaces', 'image' => 'images/koba/koba-coffee.webp', 'alt' => 'Coffee beside seating at a KOBA cafe', 'copy' => 'A family of cafes and takeaway counters across Addis Ababa: ' . $openCount . ' open locations, with ' . (count($locations) - $openCount) . ' coming soon.'],
        ['name' => 'The coffee', 'image' => 'images/gallery/koba-patisserie/04-koba.webp', 'alt' => 'Coffee poured into a glass at KOBA', 'copy' => 'From the espresso bar to an elevated coffee experience.'],
    ];
@endphp
<section id="kb-about" class="ks-about" aria-labelledby="ks-title">
    <div class="container ks-grid">
        <div class="ks-composition">
            <div class="ks-main" data-ks-reveal="0">
                @foreach ($ksStories as $story)
                    <button type="button" class="ks-photo ks-state{{ $loop->first ? ' is-active' : '' }}" data-ks-state="{{ $loop->index }}" data-full="{{ asset($story['image']) }}" data-caption="{{ $story['name'] }}" aria-label="Enlarge photo: {{ $story['alt'] }}" @unless ($loop->first) aria-hidden="true" inert @endunless><img src="{{ asset($story['image']) }}" alt="{{ $story['alt'] }}" loading="eager" decoding="async"></button>
                @endforeach
            </div>
            <button type="button" class="ks-photo ks-detail" data-ks-reveal="1" data-full="{{ asset('images/koba/koba-pastries.webp') }}" data-caption="From the pastry counter" aria-label="Enlarge photo: A KOBA baked tart"><img src="{{ asset('images/koba/koba-pastries.webp') }}" alt="A KOBA baked tart on a slate plate" loading="lazy"></button>
        </div>
        <div class="ks-copy">
            <div data-ks-reveal="2"><p class="ks-label">About KOBA · Since 2020</p><h2 id="ks-title">Crafted with passion.<br>Made fresh.</h2><p class="ks-intro">Established in Addis Ababa in 2020, KOBA brings artisan baking to a family of cafes and takeaway counters.</p></div>
            <div data-ks-reveal="3">
                <div class="ks-tabs" role="tablist" aria-label="Explore the KOBA story">
                    @foreach ($ksStories as $story)
                        <button type="button" role="tab" id="ks-tab-{{ $loop->index }}" data-ks-theme="{{ $loop->index }}" data-description="{{ $story['copy'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="ks-story" tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $story['name'] }}</button>
                    @endforeach
                </div>
                <div id="ks-story" role="tabpanel" aria-labelledby="ks-tab-0" tabindex="0"><p class="ks-description" aria-live="polite">{{ $ksStories[0]['copy'] }}</p><p class="ks-status" role="status" hidden>That photo could not load. The current photograph is still available.</p></div>
            </div>
            <dl class="ks-facts" data-ks-reveal="4"><div><dt>100% handmade</dt><dd>Baked fresh by our pastry artisans</dd></div><div><dt>{{ $openCount }} open locations</dt><dd>{{ count($locations) - $openCount }} coming soon in Addis Ababa</dd></div><div><dt>Coffee</dt><dd>An elevated coffee experience</dd></div></dl>
        </div>
    </div>
</section>
