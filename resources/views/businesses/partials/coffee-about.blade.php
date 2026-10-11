<section class="ce-about" id="bz-overview" aria-labelledby="ce-about-title">
    <div class="container">
        <div class="ce-about-grid">
            <figure class="ce-about-photo">
                <button type="button" class="bz-tile-btn ce-support-photo" data-full="{{ asset('images/coffee-origin/02-coffee-cherries.webp') }}" data-caption="Ethiopian Arabica" aria-label="Enlarge photo: freshly harvested coffee cherries">
                    <img src="{{ asset('images/coffee-origin/02-coffee-cherries.webp') }}" width="2000" height="1333" loading="lazy" decoding="async" alt="Freshly harvested red coffee cherries held in two hands">
                </button>
                <figcaption>It begins with Ethiopian Arabica.</figcaption>
            </figure>
            <div class="ce-about-copy">
                <p class="ce-eyebrow">About {{ $brand['menu'] }}</p>
                <h2 id="ce-about-title">An Ethiopian legacy.<br>A world of coffee.</h2>
                <p class="ce-about-lead">{{ $brand['body'][0] }}</p>
                <p>Launched in 2009, Romina Coffee sources Ethiopian Arabica through a network of more than 30,000 farmers, and exports to Europe, the USA, Asia and the Middle East.</p>
                <dl class="ce-about-facts">
                    @foreach ($brand['facts'] as $fact)
                        <div>
                            <dt>{{ $fact['value'] }}</dt>
                            <dd>{{ $fact['label'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</section>
