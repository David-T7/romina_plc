<!-- ==========================================
     FIND US ON THE MAP
=========================================== -->

<section class="find-us-section" id="find-us">

    <div class="find-us-container">

        <!-- HEADING -->
        <div class="find-us-heading">
            <span class="find-us-label">OUR LOCATION</span>
            <h2>Find Us On The Map</h2>
        </div>

        <!-- MAPS PANEL — mimics Google Maps layout -->
        <div class="find-us-panel">

            <!-- LEFT SIDEBAR -->
            <aside class="fup-sidebar">

                <!-- Search bar (decorative) -->
                <div class="fup-searchbar">
                    <span class="fup-search-text">KOBA Patisserie &amp; Bakery | Atlas Br…</span>
                    <div class="fup-search-icons">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>

                <!-- Photo -->
                <div class="fup-photo">
                    <img
                        src="{{ asset('images/business/baked.jpg') }}"
                        alt="KOBA Patisserie &amp; Bakery – Atlas Branch"
                    >
                </div>

                <!-- Info -->
                <div class="fup-info">

                    <h3 class="fup-name">
                        KOBA Patisserie &amp; Bakery | Atlas Branch
                    </h3>

                    <p class="fup-local-name">ኮባ ኬክ ቤት | አትላስ</p>

                    <div class="fup-rating">
                        <span class="fup-score">4.5</span>
                        <span class="fup-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </span>
                        <span class="fup-reviews">(592)</span>
                    </div>

                    <p class="fup-type">
                        Pastry shop
                        <span class="fup-dot">·</span>
                        <i class="fa-solid fa-wheelchair" title="Wheelchair accessible"></i>
                    </p>

                    <!-- Tabs -->
                    <div class="fup-tabs">
                        <button class="fup-tab active">Overview</button>
                        <button class="fup-tab">Menu</button>
                        <button class="fup-tab">Reviews</button>
                        <button class="fup-tab">About</button>
                    </div>

                    <!-- Action icon buttons -->
                    <div class="fup-actions">

                        <a
                            href="https://www.google.com/maps/dir/?api=1&destination=9.0011037,38.7800411"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="fup-action-btn"
                            title="Directions"
                        >
                            <span class="fup-action-icon">
                                <i class="fa-solid fa-diamond-turn-right"></i>
                            </span>
                            <span>Directions</span>
                        </a>

                        <button class="fup-action-btn" title="Save">
                            <span class="fup-action-icon">
                                <i class="fa-regular fa-bookmark"></i>
                            </span>
                            <span>Save</span>
                        </button>

                        <a
                            href="https://www.google.com/maps/place/KOBA+Patisserie+%26+Bakery+%7C+Atlas+Branch/@9.0011037,38.7800411,17z/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="fup-action-btn"
                            title="Nearby"
                        >
                            <span class="fup-action-icon">
                                <i class="fa-solid fa-location-crosshairs"></i>
                            </span>
                            <span>Nearby</span>
                        </a>

                        <button class="fup-action-btn" title="Photos">
                            <span class="fup-action-icon">
                                <i class="fa-regular fa-image"></i>
                            </span>
                            <span>Photos</span>
                        </button>

                        <button class="fup-action-btn" title="Share">
                            <span class="fup-action-icon">
                                <i class="fa-solid fa-share-nodes"></i>
                            </span>
                            <span>Share</span>
                        </button>

                    </div>

                    <!-- Open in Maps CTA -->
                    <a
                        href="https://www.google.com/maps/place/KOBA+Patisserie+%26+Bakery+%7C+Atlas+Branch/@9.0011037,38.7800411,17z/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="fup-open-maps"
                    >
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        Open in Google Maps
                    </a>

                </div>

            </aside>

            <!-- MAP -->
            <div class="fup-map-wrap">
                <iframe
                    class="fup-map"
                    title="KOBA Patisserie &amp; Bakery – Atlas Branch location"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.096!2d38.7800411!3d9.0011037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85a8bec41deb%3A0x9c8d1dfcc7acb10f!2sKOBA%20Patisserie%20%26%20Bakery%20%7C%20Atlas%20Branch!5e0!3m2!1sen!2set!4v1695000000000!5m2!1sen!2set"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>

        </div>

    </div>

</section>

<style>
/* ============================================================
   FIND US — Section wrapper
============================================================ */
.find-us-section {
    padding: var(--section-space) 0;
    /* Interactive animated background using Romina Logo colors */
    background: linear-gradient(-45deg, #0d1b2a, #11233F, #1b365d, #11233F);
    background-size: 400% 400%;
    animation: rominaBG 15s ease infinite;
    position: relative;
}

@keyframes rominaBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.find-us-container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 40px;
}

/* HEADING */
.find-us-heading {
    text-align: center;
    margin-bottom: 52px;
}

.find-us-label {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.2em;
    color: #E61C24;
    margin-bottom: 12px;
    text-transform: uppercase;
    padding: 6px 14px;
    background: rgba(230, 28, 36, 0.15);
    border-radius: 20px;
    border: 1px solid rgba(230, 28, 36, 0.3);
}

.find-us-heading h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    color: #fff;
    letter-spacing: -0.02em;
    line-height: 1.1;
    margin: 0;
}

/* ============================================================
   PANEL — two-column (sidebar + map)
============================================================ */
.find-us-panel {
    display: flex;
    overflow: hidden;
    border-radius: 16px;
    box-shadow:
        0 24px 72px rgba(0, 0, 0, 0.6),
        0 0 0 1px rgba(255,255,255,0.06);
    height: 560px;
    position: relative;
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.5s cubic-bezier(0.25, 1, 0.5, 1);
}

.find-us-panel:hover {
    transform: translateY(-10px) scale(1.01);
    box-shadow:
        0 40px 100px rgba(0, 0, 0, 0.8),
        0 0 0 1px rgba(230, 28, 36, 0.4);
}

.find-us-panel::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: #E61C24; /* Romina Red accent */
    z-index: 10;
}

/* ============================================================
   LEFT SIDEBAR
============================================================ */
.fup-sidebar {
    width: 340px;
    flex-shrink: 0;
    background: #fff;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    scrollbar-width: thin;
}

/* Scrollbar */
.fup-sidebar::-webkit-scrollbar { width: 4px; }
.fup-sidebar::-webkit-scrollbar-thumb { background: #d0d0d0; border-radius: 4px; }

/* SEARCH BAR */
.fup-searchbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    border-bottom: 1px solid #eee;
    background: #fff;
    position: sticky;
    top: 0;
    z-index: 2;
    gap: 8px;
}

.fup-search-text {
    font-size: 13px;
    font-weight: 500;
    color: #1a1a1a;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    flex: 1;
}

.fup-search-icons {
    display: flex;
    gap: 12px;
    color: #555;
    font-size: 14px;
    flex-shrink: 0;
}

.fup-search-icons i { cursor: pointer; }
.fup-search-icons i:hover { color: #000; }

/* PHOTO */
.fup-photo {
    width: 100%;
    height: 190px;
    flex-shrink: 0;
    overflow: hidden;
}

.fup-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.fup-photo:hover img { transform: scale(1.03); }

/* INFO */
.fup-info {
    padding: 18px 16px 20px;
    flex: 1;
}

.fup-name {
    font-size: 17px;
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1.3;
    margin: 0 0 4px;
}

.fup-local-name {
    font-size: 13px;
    color: #666;
    margin: 0 0 8px;
}

/* RATING */
.fup-rating {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 5px;
}

.fup-score {
    font-size: 14px;
    font-weight: 700;
    color: #1a1a1a;
}

.fup-stars {
    color: #f5a623;
    font-size: 13px;
    display: flex;
    gap: 2px;
}

.fup-reviews {
    font-size: 13px;
    color: #1967d2;
    text-decoration: underline;
    cursor: pointer;
}

.fup-type {
    font-size: 13px;
    color: #444;
    margin: 0 0 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.fup-dot { color: #888; }

/* TABS */
.fup-tabs {
    display: flex;
    gap: 0;
    border-bottom: 2px solid #e8e8e8;
    margin-bottom: 16px;
}

.fup-tab {
    background: none;
    border: none;
    border-bottom: 2px solid transparent;
    margin-bottom: -2px;
    padding: 8px 12px;
    font-size: 13px;
    font-weight: 500;
    color: #555;
    cursor: pointer;
    transition: all 0.2s;
}

.fup-tab:hover { color: #000; }

.fup-tab.active {
    color: #E61C24;
    border-bottom-color: #E61C24;
    font-weight: 700;
}

/* ACTION BUTTONS */
.fup-actions {
    display: flex;
    gap: 4px;
    flex-wrap: nowrap;
    margin-bottom: 18px;
    justify-content: space-between;
}

.fup-action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    background: none;
    border: none;
    padding: 6px 4px;
    cursor: pointer;
    text-decoration: none;
    flex: 1;
    min-width: 0;
}

.fup-action-btn span:last-child {
    font-size: 10.5px;
    color: #1967d2;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
}

.fup-action-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e8f0fe;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #1967d2;
    transition: background 0.2s, transform 0.2s;
}

.fup-action-btn:hover .fup-action-icon {
    background: #c5d8fc;
    transform: scale(1.08);
}

/* First action btn (Directions) gets a different fill color based on Romina */
.fup-action-btn:first-child .fup-action-icon {
    background: #11233F;
    color: #fff;
}

.fup-action-btn:first-child:hover .fup-action-icon {
    background: #0d1b2a;
    box-shadow: 0 4px 12px rgba(17, 35, 63, 0.4);
}

/* Open in Maps CTA */
.fup-open-maps {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #11233F;
    text-decoration: none;
    padding: 10px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
    border-radius: 6px;
    background: #f8fafc;
}

.fup-open-maps:hover {
    background: #11233F;
    color: #fff;
}

/* ============================================================
   MAP
============================================================ */
.fup-map-wrap {
    flex: 1;
    position: relative;
    overflow: hidden;
}

.fup-map {
    display: block;
    width: 100%;
    height: 100%;
    border: none;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 900px) {
    .find-us-section { padding: var(--section-space) 0; }
    .find-us-container { padding: 0 20px; }

    .find-us-panel {
        flex-direction: column;
        height: auto;
    }

    .fup-sidebar {
        width: 100%;
        max-height: 420px;
    }

    .fup-map-wrap {
        height: 400px;
    }
}

@media (max-width: 480px) {
    .fup-map-wrap { height: 320px; }
    .fup-tabs { overflow-x: auto; }
    .fup-tab { padding: 8px 10px; font-size: 12px; }
}
</style>
