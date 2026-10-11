(function () {
    'use strict';
    var root = document.querySelector('.news-event-media');
    if (!root) return;
    var dialog = root.querySelector('.news-photo-viewer');
    var photos = Array.from(root.querySelectorAll('[data-news-photo]'));
    if (!dialog || typeof dialog.showModal !== 'function' || !photos.length) return;
    var full = dialog.querySelector('.news-photo-full');
    var caption = dialog.querySelector('figcaption');
    var current = 0;
    var opener;
    var previousOverflow;

    function show(index) {
        current = (index + photos.length) % photos.length;
        full.src = photos[current].dataset.newsPhoto;
        full.alt = photos[current].dataset.caption;
        caption.textContent = (current + 1) + ' / ' + photos.length + ' — ' + full.alt;
    }
    photos.forEach(function (photo, index) {
        photo.addEventListener('click', function () {
            opener = photo;
            show(index);
            previousOverflow = document.body.style.overflow;
            document.body.style.overflow = 'hidden';
            dialog.showModal();
        });
    });
    dialog.querySelector('.news-photo-close').addEventListener('click', function () { dialog.close(); });
    dialog.querySelector('.news-photo-prev').addEventListener('click', function () { show(current - 1); });
    dialog.querySelector('.news-photo-next').addEventListener('click', function () { show(current + 1); });
    dialog.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            event.preventDefault();
            show(current + (event.key === 'ArrowLeft' ? -1 : 1));
        }
    });
    dialog.addEventListener('close', function () {
        document.body.style.overflow = previousOverflow;
        if (opener) opener.focus();
    });
}());
