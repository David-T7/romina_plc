{{-- ============ NUOVA SIMONELLI — Romina Imports, authorized agent ============
     Copy from the client's "Nuova Simonelli - Content" brief; product photos in
     public/images/nuova-simonelli/. Styles: .ns-* in public/css/main.css. --}}
@php
    $nsImg = fn ($f) => asset('images/nuova-simonelli/' . $f . '.webp');
    $nsWhy = [
        ['fa-bullseye',      'Consistency', 'Delivering the perfect shot every single time.'],
        ['fa-microchip',     'Technology',  'Features like the T3 engine and Soft Infusion System (SIS).'],
        ['fa-shield-halved', 'Durability',  'Built to withstand the high-volume demands of a busy professional environment.'],
    ];
    $nsServices = [
        ['fa-gears',        'Genuine Spare Parts',   'We only use Authentic Nuova Simonelli components.'],
        ['fa-user-gear',    'Certified Technicians', 'Our team is trained directly on Italian engineering standards.'],
        ['fa-award',        'Warranty Coverage',     'Full Manufacturer-Backed peace of mind.'],
    ];
    $nsLineup = [
        [
            'name'  => 'The Aurelia Wave',
            'lead'  => 'The gold standard for high volume specialty coffee shops.',
            'img'   => ['aurelia-wave-red', 'aurelia-wave-black'],
            'alt'   => 'Nuova Simonelli Aurelia Wave espresso machine',
            'feats' => [
                ['Smart Water Technology', 'Detects Water Quality and Protects the Machine.'],
                ['Ergonomics', 'Designed to reduce barista fatigue and improve workflow.'],
                ['Pulse-Jet Technology', 'Optimizes extraction for diverse flavor profiles.'],
            ],
        ],
        [
            'name'  => 'The Appia Life',
            'lead'  => 'Compact, productive, and incredibly reliable.',
            'img'   => ['appia-life-2group-black', 'appia-life-1group-red', 'appia-life-3group-white'],
            'alt'   => 'Nuova Simonelli Appia Life espresso machine',
            'feats' => [
                ['Energy Efficient', 'Reduced energy consumption compared to previous models.'],
                ['Easy Maintenance', 'Simple internal architecture for quick servicing.'],
                ['Consistent Results', 'SIS technology ensures a creamy, even espresso.'],
            ],
        ],
        [
            'name'  => 'Professional Grinders: The Mythos Series',
            'lead'  => 'Because the grind is just as important as the brew.',
            'img'   => ['mythos-grinder'],
            'alt'   => 'Nuova Simonelli Mythos coffee grinder',
            'feats' => [
                ['Clima Pro Technology', 'Keeps coffee temperature stable for precise dosing.'],
                ['Micrometric Adjustment', 'Infinite control over your grind size.'],
            ],
        ],
    ];
@endphp
<section class="ns" id="nuova-simonelli" aria-labelledby="nsTitle">
    <div class="container">

        {{-- intro --}}
        <div class="ns-intro">
            <div>
                <img class="ns-logo" src="{{ $nsImg('logo') }}" alt="Nuova Simonelli: the coffee machines you can trust" loading="lazy">
                <p class="ns-eyebrow">Proud Authorized Agent</p>
                <h2 id="nsTitle">Romina plc &amp; Nuova Simonelli</h2>
            </div>
            <div class="ns-intro-copy">
                <p>At Romina plc, we believe that the soul of a great café lies in the precision of its machinery. That is why we have partnered with Nuova Simonelli, the world leader in espresso technology and the choice of champions.</p>
                <p>As an authorized agent, we provide the tools you need to master the art of coffee. Choosing Romina plc means you get more than just a box. We provide a full-service ecosystem to ensure your success.</p>
            </div>
        </div>

        {{-- why + services --}}
        <div class="ns-pillars">
            <div class="ns-col">
                <h3>Why Nuova Simonelli?</h3>
                <p class="ns-col-lead">For over 80 years, Nuova Simonelli has pushed the boundaries of innovation, ergonomics, and sustainability.</p>
                <ul>
                    @foreach ($nsWhy as [$icon, $t, $d])
                        <li><i class="fa-solid {{ $icon }}" aria-hidden="true"></i><span><strong>{{ $t }}</strong>{{ $d }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="ns-col">
                <h3>Services Included</h3>
                <p class="ns-col-lead">What it means for you.</p>
                <ul>
                    @foreach ($nsServices as [$icon, $t, $d])
                        <li><i class="fa-solid {{ $icon }}" aria-hidden="true"></i><span><strong>{{ $t }}</strong>{{ $d }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- lineup --}}
        <p class="ns-eyebrow ns-eyebrow--center">Our Featured Lineup</p>
        <div class="ns-lineup">
            @foreach ($nsLineup as $m)
                <article class="ns-model">
                    <div class="ns-model-media" data-ns-swatches>
                        @foreach ($m['img'] as $img)
                            <img class="{{ $loop->first ? 'is-on' : '' }}" src="{{ $nsImg($img) }}" alt="{{ $m['alt'] }}" loading="lazy" decoding="async">
                        @endforeach
                        @if (count($m['img']) > 1)
                            <div class="ns-swatch-row" role="group" aria-label="Show another version">
                                @foreach ($m['img'] as $img)
                                    <button type="button" class="ns-swatch{{ $loop->first ? ' is-on' : '' }}" aria-label="Version {{ $loop->iteration }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="ns-model-copy">
                        <span class="ns-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <h3>{{ $m['name'] }}</h3>
                        <p class="ns-model-lead">{{ $m['lead'] }}</p>
                        <dl>
                            @foreach ($m['feats'] as [$ft, $fd])
                                <div><dt>{{ $ft }}</dt><dd>{{ $fd }}</dd></div>
                            @endforeach
                        </dl>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- closing --}}
        <div class="ns-close">
            <blockquote>“Nuova Simonelli have built our identity on the emotions inspired by a good espresso. Experience, technology, innovation, and design are the tools we use and will continue to use to pass on this legacy.”</blockquote>
            <div class="ns-contact">
                <a href="tel:0116669100" class="ns-btn"><i class="fa-solid fa-phone" aria-hidden="true"></i>011 666 91 00</a>
                <a href="mailto:info@rominaplc.com" class="ns-btn ns-btn--ghost"><i class="fa-regular fa-envelope" aria-hidden="true"></i>info@rominaplc.com</a>
            </div>
        </div>

    </div>
</section>
<script>
document.querySelectorAll('[data-ns-swatches]').forEach(function (box) {
    var imgs = box.querySelectorAll('img'), sw = box.querySelectorAll('.ns-swatch');
    sw.forEach(function (b, i) {
        b.addEventListener('click', function () {
            imgs.forEach(function (im, k) { im.classList.toggle('is-on', k === i); });
            sw.forEach(function (s, k) { s.classList.toggle('is-on', k === i); s.setAttribute('aria-pressed', String(k === i)); });
        });
    });
});
</script>
