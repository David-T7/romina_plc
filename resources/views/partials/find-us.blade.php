<!-- ==========================================
     FIND US ON THE MAP
     Only Romina Group locations are pinned. The base map
     (Esri Light Gray Canvas) has no business listings, so no other places show.
     Coordinates come from OpenStreetMap; edit $sites to move or add a pin.
=========================================== -->

@php
    $sites = [
        ['brand' => 'romina', 'name' => 'Romina Restaurant | 4 Kilo',   'desc' => 'Restaurant, bar & cafe',              'lat' => 9.0361486, 'lng' => 38.7625479],
        ['brand' => 'romina', 'name' => 'Romina Restaurant | Balderas', 'desc' => 'Restaurant & takeaway center',        'lat' => 9.0294129, 'lng' => 38.7850878],
        ['brand' => 'koba',   'name' => 'KOBA | 4 Kilo',                'desc' => 'Pastry & bakery takeaway center',     'lat' => 9.0361979, 'lng' => 38.7625884],
        ['brand' => 'koba',   'name' => 'KOBA | Sandford',              'desc' => 'Pastry, bakery, meals & drinks cafe', 'lat' => 9.0350704, 'lng' => 38.7721537],
        ['brand' => 'koba',   'name' => 'KOBA | Atlas',                 'desc' => 'Pastry, bakery, meals & drinks cafe', 'lat' => 9.0009917, 'lng' => 38.7801206],
        ['brand' => 'koba',   'name' => 'KOBA | Peacock',               'desc' => 'Elevated coffee roastery experience', 'lat' => 8.9990426, 'lng' => 38.7743347],
        ['brand' => 'meskott', 'name' => 'Meskott Culinary | 4 Kilo',   'desc' => 'Sellassie Twin Towers, King George VI St', 'lat' => 9.0355875, 'lng' => 38.7627344],
        ['brand' => 'bacio',   'name' => 'Bacio Cremeria',              'desc' => 'Zimbabwe Street',                      'lat' => 8.989968,  'lng' => 38.782691],
        ['brand' => 'jaquar',  'name' => 'Jaquar World | Kazanchis',    'desc' => 'Joburg Building, Jomo Kenyatta St',    'lat' => 9.0100875, 'lng' => 38.7691719],
    ];

    // label, pin letter and pin colour per brand
    $groups = [
        'romina'  => ['label' => 'Romina Restaurants',       'letter' => 'R', 'color' => '#e3262e'],
        'koba'    => ['label' => 'KOBA Patisserie & Bakery', 'letter' => 'K', 'color' => '#C9953F'],
        'meskott' => ['label' => 'Meskott Culinary',         'letter' => 'M', 'color' => '#1f1f1f'],
        'bacio'   => ['label' => 'Bacio Cremeria',           'letter' => 'B', 'color' => '#1E7FB8'],
        'jaquar'  => ['label' => 'Jaquar World',             'letter' => 'J', 'color' => '#0E2240'],
    ];
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">

<section class="find-us-section" id="find-us">

    <div class="find-us-container">

        <!-- HEADING -->
        <div class="find-us-heading">
            <span class="find-us-label">OUR LOCATIONS</span>
            <h2>Find Us On The Map</h2>
        </div>

        <div class="find-us-panel">

            <!-- BRANCH LIST -->
            <aside class="fu-list" aria-label="Romina and KOBA branches">
                @foreach ($groups as $key => $group)
                    <div class="fu-group" style="--brand: {{ $group['color'] }}">
                        <p class="fu-group-title">
                            <span class="fu-dot" aria-hidden="true"></span>
                            {{ $group['label'] }}
                        </p>
                        <ul>
                            @foreach ($sites as $i => $site)
                                @continue($site['brand'] !== $key)
                                <li>
                                    <button type="button" class="fu-site" data-site="{{ $i }}">
                                        <span class="fu-site-name">{{ $site['name'] }}</span>
                                        <span class="fu-site-desc">{{ $site['desc'] }}</span>
                                    </button>
                                    <a class="fu-site-dir"
                                       href="https://www.google.com/maps/dir/?api=1&destination={{ $site['lat'] }},{{ $site['lng'] }}"
                                       target="_blank" rel="noopener noreferrer"
                                       aria-label="Directions to {{ $site['name'] }}">
                                        <i class="fa-solid fa-diamond-turn-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </aside>

            <!-- MAP -->
            <div class="fu-map-wrap">
                <div class="fu-map" id="fuMap" role="region" aria-label="Map of Romina and KOBA branches in Addis Ababa"></div>
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
    background: #0E2240;
    position: relative;
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
   PANEL — branch list + map
============================================================ */
.find-us-panel {
    display: grid;
    grid-template-columns: 340px 1fr;
    height: 560px;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 30px 60px rgba(0, 0, 0, .35);
}

.fu-list {
    overflow-y: auto;
    padding: 28px 24px;
    border-right: 1px solid rgba(14, 34, 64, .1);
}

.fu-group + .fu-group { margin-top: 28px; }

.fu-group-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 10px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: #0E2240;
}

.fu-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--brand, #e3262e);
}

.fu-list ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.fu-list li {
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(14, 34, 64, .08);
}

.fu-site {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding: 14px 10px 14px 0;
    background: none;
    border: 0;
    text-align: left;
    cursor: pointer;
    font-family: inherit;
}

.fu-site-name { font-size: 15px; font-weight: 600; color: #0E2240; }
.fu-site-desc { font-size: 13px; color: #6b7a90; }

.fu-site:hover .fu-site-name,
.fu-site.is-active .fu-site-name { color: #e3262e; }

.fu-site-dir {
    flex: none;
    width: 36px;
    height: 36px;
    display: grid;
    place-items: center;
    border: 1px solid rgba(14, 34, 64, .14);
    color: #0E2240;
    font-size: 14px;
}
.fu-site-dir:hover { background: #0E2240; border-color: #0E2240; color: #fff; }

.fu-site:focus-visible,
.fu-site-dir:focus-visible { outline: 2px solid #e3262e; outline-offset: 2px; }

/* MAP */
.fu-map-wrap { position: relative; min-height: 0; }
.fu-map { position: absolute; inset: 0; background: #eef0f3; }

/* pins — a teardrop in each brand's colour */
.fu-pin {
    background: none;
    border: 0;
}
.fu-pin span {
    display: grid;
    place-items: center;
    width: 34px;
    height: 34px;
    border-radius: 50% 50% 50% 0;
    transform: rotate(-45deg);
    background: #e3262e;
    border: 2px solid #fff;
    box-shadow: 0 6px 14px rgba(14, 34, 64, .35);
    color: #fff;
    font-size: 13px;
    font-weight: 700;
}
.fu-pin b { transform: rotate(45deg); font-weight: 700; }

.find-us-section .leaflet-popup-content { font-family: inherit; font-size: 13px; line-height: 1.5; color: #0E2240; }
.find-us-section .leaflet-popup-content a { color: #e3262e; font-weight: 600; }

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 900px) {
    .find-us-container { padding: 0 20px; }

    .find-us-panel {
        grid-template-columns: 1fr;
        height: auto;
    }

    .fu-list {
        border-right: 0;
        border-bottom: 1px solid rgba(14, 34, 64, .1);
    }

    .fu-map-wrap { height: 400px; }
}

@media (max-width: 480px) {
    .fu-map-wrap { height: 320px; }
}
</style>

{{-- after the styles, so Leaflet sees the map's sizing when it initialises --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<script>
(function () {
    var el = document.getElementById('fuMap');
    if (!el || typeof L === 'undefined') return;

    var sites  = @json($sites);
    var groups = @json($groups);

    var map = L.map(el, { scrollWheelZoom: false, zoomControl: true });

    /* Esri Light Gray Canvas: streets and area names only, no shops or restaurants */
    var esri = 'https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/';
    L.tileLayer(esri + 'World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 16,
        attribution: 'Tiles &copy; Esri &mdash; Esri, HERE, Garmin, &copy; OpenStreetMap contributors'
    }).addTo(map);
    L.tileLayer(esri + 'World_Light_Gray_Reference/MapServer/tile/{z}/{y}/{x}', { maxZoom: 16 }).addTo(map);

    var markers = sites.map(function (s) {
        var icon = L.divIcon({
            className: 'fu-pin',
            html: '<span style="background:' + groups[s.brand].color + '"><b>' + groups[s.brand].letter + '</b></span>',
            iconSize: [34, 34],
            iconAnchor: [17, 34],
            popupAnchor: [0, -32]
        });
        return L.marker([s.lat, s.lng], { icon: icon, title: s.name })
            .addTo(map)
            .bindPopup('<strong>' + s.name + '</strong><br>' + s.desc +
                '<br><a href="https://www.google.com/maps/dir/?api=1&destination=' + s.lat + ',' + s.lng +
                '" target="_blank" rel="noopener noreferrer">Get directions</a>');
    });

    var bounds = L.latLngBounds(sites.map(function (s) { return [s.lat, s.lng]; }));
    map.fitBounds(bounds, { padding: [40, 40] });

    var buttons = document.querySelectorAll('.fu-site');
    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var i = +btn.dataset.site;
            buttons.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
            map.setView([sites[i].lat, sites[i].lng], 16);
            markers[i].openPopup();
        });
    });

    /* the map sits below the fold; redraw once it is laid out */
    window.addEventListener('load', function () { map.invalidateSize(); map.fitBounds(bounds, { padding: [40, 40] }); });
}());
</script>
