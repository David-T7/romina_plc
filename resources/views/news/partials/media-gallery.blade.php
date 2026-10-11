<section class="news-event-media" aria-labelledby="news-event-media-title">
    <div class="news-event-media-heading">
        <h2 id="news-event-media-title">Moments from the story.</h2>
        <p>Select a photograph to view it in full.</p>
    </div>
    <div class="news-event-media-grid">
        @foreach ($article['gallery'] as $photo)
            @php($dimensions = getimagesize(public_path($photo['image'])))
            <button type="button" class="news-event-photo" data-news-photo="{{ asset($photo['image']) }}"
                    data-caption="{{ $photo['alt'] }}" aria-label="View photograph: {{ $photo['alt'] }}" aria-haspopup="dialog">
                <img src="{{ asset($photo['image']) }}" alt="{{ $photo['alt'] }}"
                     width="{{ $dimensions[0] }}" height="{{ $dimensions[1] }}" loading="lazy" decoding="async">
                <span aria-hidden="true"><i class="fa-solid fa-expand"></i></span>
            </button>
        @endforeach
    </div>
    <dialog class="news-photo-viewer" aria-labelledby="news-photo-caption">
        <button type="button" class="news-photo-close" aria-label="Close photograph">×</button>
        <button type="button" class="news-photo-prev" aria-label="Previous photograph">‹</button>
        <figure>
            <img class="news-photo-full" alt="">
            <figcaption id="news-photo-caption" aria-live="polite"></figcaption>
        </figure>
        <button type="button" class="news-photo-next" aria-label="Next photograph">›</button>
    </dialog>
</section>
