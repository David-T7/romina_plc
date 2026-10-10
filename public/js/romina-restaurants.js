(function () {
    'use strict';
    var root = document.querySelector('.rr-page');
    if (!root) return;

    var extras = Array.from(root.querySelectorAll('[data-rr-extra]'));
    var toggle = root.querySelector('.rr-gallery-toggle');
    if (toggle && extras.length) {
        extras.forEach(function (item) { item.hidden = true; });
        toggle.hidden = false;
        var originalLabel = toggle.innerHTML;
        toggle.addEventListener('click', function () {
            var expanded = toggle.getAttribute('aria-expanded') !== 'true';
            extras.forEach(function (item) { item.hidden = !expanded; });
            toggle.setAttribute('aria-expanded', String(expanded));
            if (expanded) toggle.textContent = 'Show fewer photos';
            else toggle.innerHTML = originalLabel;
        });
    }

    // Same photo / previous / next pattern as the site's shared viewer, with native modal isolation.
    var dialog = root.querySelector('.rr-lightbox');
    var triggers = Array.from(root.querySelectorAll('[data-rr-photo]'));
    // One navigation entry per image, even when a photograph appears in several sections.
    var photos = triggers.filter(function (photo, index) {
        return triggers.findIndex(function (other) { return other.href === photo.href; }) === index;
    });
    if (dialog && typeof dialog.showModal === 'function') {
        var image = dialog.querySelector('.rr-lightbox-image');
        var caption = dialog.querySelector('#rr-lightbox-caption');
        var count = dialog.querySelector('#rr-lightbox-count');
        var closeButton = dialog.querySelector('.rr-lightbox-close');
        var previousButton = dialog.querySelector('.rr-lightbox-prev');
        var nextButton = dialog.querySelector('.rr-lightbox-next');
        var opener;
        var current = 0;
        var previousOverflow;

        function show(index) {
            current = (index + photos.length) % photos.length;
            var photo = photos[current];
            image.src = photo.href;
            image.alt = photo.querySelector('img').alt;
            caption.textContent = photo.dataset.caption;
            count.textContent = (current + 1) + ' / ' + photos.length;
        }
        function close() {
            if (dialog.open) dialog.close();
        }
        triggers.forEach(function (photo) {
            photo.addEventListener('click', function (event) {
                if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
                event.preventDefault();
                opener = photo;
                show(photos.findIndex(function (item) { return item.href === photo.href; }));
                previousOverflow = document.body.style.overflow;
                dialog.showModal();
                document.body.style.overflow = 'hidden';
                closeButton.focus();
            });
        });
        closeButton.addEventListener('click', close);
        previousButton.addEventListener('click', function () { show(current - 1); });
        nextButton.addEventListener('click', function () { show(current + 1); });
        dialog.addEventListener('cancel', function (event) { event.preventDefault(); close(); });
        dialog.addEventListener('close', function () {
            document.body.style.overflow = previousOverflow;
            if (opener) opener.focus({ preventScroll: true });
        });
        dialog.addEventListener('click', function (event) {
            if (event.target !== dialog) return;
            var bounds = dialog.getBoundingClientRect();
            if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) close();
        });
        dialog.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
                event.preventDefault();
                show(current + (event.key === 'ArrowRight' ? 1 : -1));
            }
            if (event.key === 'Tab') {
                var controls = [closeButton, previousButton, nextButton];
                var index = controls.indexOf(document.activeElement);
                event.preventDefault();
                controls[(index + (event.shiftKey ? -1 : 1) + controls.length) % controls.length].focus();
            }
        });
        var touchX = null;
        dialog.addEventListener('touchstart', function (event) { touchX = event.changedTouches[0].clientX; }, { passive: true });
        dialog.addEventListener('touchend', function (event) {
            if (touchX === null) return;
            var distance = event.changedTouches[0].clientX - touchX;
            if (Math.abs(distance) > 45) show(current + (distance < 0 ? 1 : -1));
            touchX = null;
        }, { passive: true });
    }

    var locations = Array.from(root.querySelectorAll('[data-rr-location]'));
    var locationStates = Array.from(root.querySelectorAll('[data-rr-location-state]'));
    var requestedLocation = 0;
    // Eager/preloaded DOM images share their ready promises across hover, focus and tap.
    var locationReady = locationStates.map(function (state) {
        var img = state.querySelector('img');
        return new Promise(function (resolve) {
            var fallbackAttempted = false;
            function loaded() {
                if (!img.naturalWidth) return failed();
                // Keep the old frame until the new pixels are decoded and ready to paint.
                if (typeof img.decode === 'function') img.decode().then(function () { resolve(true); }, function () { resolve(img.naturalWidth > 0); });
                else resolve(true);
            }
            function failed() {
                if (fallbackAttempted) { resolve(false); return; }
                fallbackAttempted = true;
                var link = img.closest('[data-rr-photo]');
                img.alt = 'Romina restaurant interior';
                link.href = img.dataset.rrFallback;
                link.dataset.caption = img.alt;
                link.setAttribute('aria-label', 'Enlarge photo: ' + img.alt);
                img.src = img.dataset.rrFallback;
            }
            img.addEventListener('load', loaded);
            img.addEventListener('error', failed);
            if (img.complete) {
                if (img.naturalWidth) loaded();
                else failed();
            }
        });
    });
    function selectLocation(index) {
        requestedLocation = index;
        locations.forEach(function (item, i) {
            item.classList.toggle('is-active', i === index);
            item.querySelector('button').setAttribute('aria-pressed', String(i === index));
        });
        locationReady[index].then(function (ready) {
            if (!ready || requestedLocation !== index) return;
            locationStates.forEach(function (state, i) {
                state.classList.toggle('is-active', i === index);
                state.setAttribute('aria-hidden', String(i !== index));
                state.inert = i !== index;
            });
        });
    }
    locations.forEach(function (item, index) {
        item.addEventListener('pointerenter', function (event) {
            if (event.pointerType !== 'touch') selectLocation(index);
        });
        item.addEventListener('focusin', function () { selectLocation(index); });
        item.querySelector('button').addEventListener('click', function () { selectLocation(index); });
    });

    // Web Animations keeps the unenhanced document visible, including if JS fails.
    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    var animations = [];
    function reveal(element, delay, distance) {
        if (reducedMotion.matches || typeof element.animate !== 'function') return;
        var animation = element.animate([
            { opacity: 0, transform: 'translateY(' + distance + 'px)' },
            { opacity: 1, transform: 'translateY(0)' }
        ], { duration: 780, delay: delay, fill: 'backwards', easing: 'cubic-bezier(.2,.7,.3,1)' });
        animations.push(animation);
        animation.onfinish = function () { animations = animations.filter(function (item) { return item !== animation; }); };
    }
    reducedMotion.addEventListener('change', function (event) {
        if (event.matches) animations.forEach(function (animation) { animation.cancel(); });
    });
    if ('IntersectionObserver' in window && !reducedMotion.matches) {
        var story = root.querySelector('.rr-story');
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                if (entry.target === story) {
                    reveal(story.querySelector('.rr-story-room'), 0, 36);
                    reveal(story.querySelector('.rr-story-dish'), 160, 26);
                    story.querySelectorAll('.rr-story-copy > *').forEach(function (element, index) {
                        reveal(element, 280 + index * 110, 22);
                    });
                } else reveal(entry.target, 0, 18);
                observer.unobserve(entry.target);
            });
        }, { threshold: .12 });
        observer.observe(story);
        root.querySelectorAll('[data-rr-reveal]').forEach(function (element) { observer.observe(element); });
    }
}());
