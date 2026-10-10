"""
Romina Coffee export-journey map — offline build step.

Reads Natural Earth Admin-0 countries (public domain, https://www.naturalearthdata.com):
  ne_110m_admin_0_countries.geojson  — world, coarse
  ne_50m_admin_0_countries.geojson   — Ethiopia + neighbours, finer (crisp at close-up)
and writes resources/views/businesses/partials/coffee-journey-map.blade.php:
an inline SVG (Miller projection) with country shapes, the four routes and markers.

Run from the project root after downloading both files into resources/map-data/
(they are not committed; ~4 MB):
    curl -L -o resources/map-data/ne_110m_admin_0_countries.geojson https://raw.githubusercontent.com/nvkelso/natural-earth-vector/master/geojson/ne_110m_admin_0_countries.geojson
    curl -L -o resources/map-data/ne_50m_admin_0_countries.geojson  https://raw.githubusercontent.com/nvkelso/natural-earth-vector/master/geojson/ne_50m_admin_0_countries.geojson
    python resources/map-data/build_coffee_map.py

To add a destination: add a region to DESTS here (key, label, representative lon/lat),
rebuild, add the item to 'highlights' in config/businesses.php and its key to $cjRoutes
in businesses/partials/coffee-journey.blade.php (plus a CSS region-highlight line).

Countries are matched by ADM0_A3 code, never by name. South America, Antarctica and
Oceania are left out. Destination points are representative points for each REGION
(visualisation only, not ports, airports or customers).
"""
import json, math, os

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.dirname(os.path.dirname(HERE))
OUT  = os.path.join(ROOT, 'resources', 'views', 'businesses', 'partials', 'coffee-journey-map.blade.php')

K = 4.0                                   # px per degree of longitude
LON0, LON1, LAT0, LAT1 = -130, 150, -12, 74   # world frame


def miller_y(lat):
    lat = max(min(lat, 85), -85)
    return 1.25 * math.log(math.tan(math.pi / 4 + 0.4 * math.radians(lat)))


Y_TOP = miller_y(LAT1)


def project(lon, lat):
    return ((lon - LON0) * K, (Y_TOP - miller_y(lat)) * math.degrees(1) * K)


def simplify(pts, tol):
    """Douglas–Peucker on projected points."""
    if len(pts) < 4:
        return pts
    keep = [False] * len(pts)
    keep[0] = keep[-1] = True
    stack = [(0, len(pts) - 1)]
    while stack:
        a, b = stack.pop()
        ax, ay = pts[a]; bx, by = pts[b]
        dx, dy = bx - ax, by - ay
        L = math.hypot(dx, dy) or 1e-9
        best, idx = 0, None
        for i in range(a + 1, b):
            px, py = pts[i]
            d = abs(dy * px - dx * py + bx * ay - by * ax) / L
            if d > best:
                best, idx = d, i
        if idx is not None and best > tol:
            keep[idx] = True
            stack += [(a, idx), (idx, b)]
    return [p for p, k in zip(pts, keep) if k]


def ring_d(ring, tol):
    raw = [project(lon, lat) for lon, lat in ring]
    if len(raw) > 2 and raw[0] == raw[-1]:
        raw = raw[:-1]
    # a closed ring has no chord: split it at the point farthest from the start
    far = max(range(len(raw)), key=lambda i: math.hypot(raw[i][0] - raw[0][0], raw[i][1] - raw[0][1]))
    pts = simplify(raw[:far + 1], tol) + simplify(raw[far:] + [raw[0]], tol)[1:-1]
    if len(pts) < 3:
        return ''
    # drop rings that are entirely outside the world frame (with a margin)
    xs = [p[0] for p in pts]; ys = [p[1] for p in pts]
    W, H = (LON1 - LON0) * K, project(0, LAT0)[1]
    if max(xs) < -60 or min(xs) > W + 60 or max(ys) < -60 or min(ys) > H + 260:
        return ''
    return 'M' + 'L'.join(f'{x:.1f},{y:.1f}' for x, y in pts) + 'Z'


def geom_d(geom, tol):
    polys = geom['coordinates'] if geom['type'] == 'MultiPolygon' else [geom['coordinates']]
    return ''.join(ring_d(poly[0], tol) for poly in polys)   # outer rings only at this scale


MIDDLE_EAST = {'SAU', 'ARE', 'OMN', 'YEM', 'QAT', 'KWT', 'BHR', 'IRQ', 'IRN', 'SYR', 'JOR', 'ISR', 'PSX', 'PSE', 'LBN', 'TUR', 'CYP', 'CYN'}
DETAIL      = {'ETH', 'ERI', 'DJI', 'SOM', 'SOL', 'KEN', 'SDN', 'SSD', 'UGA'}
SKIP_CONT   = {'South America', 'Antarctica', 'Oceania', 'Seven seas (open ocean)'}


def region_of(a3, cont):
    if a3 == 'USA':
        return 'usa'
    if a3 in MIDDLE_EAST:
        return 'middle-east'
    if a3 == 'RUS':
        return None                       # spans Europe and Asia; kept neutral
    if cont == 'Europe':
        return 'europe'
    if cont == 'Asia':
        return 'asia'
    return None


def load(name):
    return json.load(open(os.path.join(HERE, name), encoding='utf-8'))['features']


world  = load('ne_110m_admin_0_countries.geojson')
detail = {f['properties']['ADM0_A3']: f for f in load('ne_50m_admin_0_countries.geojson')
          if f['properties']['ADM0_A3'] in DETAIL}

countries = []
for f in world:
    p = f['properties']; a3 = p['ADM0_A3']; cont = p['CONTINENT']
    if cont in SKIP_CONT:
        continue
    src, tol = (detail[a3], 0.12) if a3 in detail else (f, 0.45)
    d = geom_d(src['geometry'], tol)
    if d:
        countries.append((a3, p['NAME'], region_of(a3, cont), d))

# ---- routes: great circle from the Ethiopia origin, lifted into an arc ----
ORIGIN = (39.6, 8.6)                      # Ethiopia, central highlands (lon, lat)
DESTS = [                                  # representative points per region (visualisation only)
    ('europe',      'Europe',          (9.0, 49.0)),
    ('usa',         'The USA',         (-98.5, 39.5)),
    ('asia',        'Asia',            (105.0, 34.0)),
    ('middle-east', 'The Middle East', (45.0, 24.0)),
]


def gc_points(a, b, n=72):
    (lo1, la1), (lo2, la2) = [(math.radians(x), math.radians(y)) for x, y in (a, b)]
    p1 = (math.cos(la1) * math.cos(lo1), math.cos(la1) * math.sin(lo1), math.sin(la1))
    p2 = (math.cos(la2) * math.cos(lo2), math.cos(la2) * math.sin(lo2), math.sin(la2))
    om = math.acos(max(-1, min(1, sum(i * j for i, j in zip(p1, p2)))))
    out = []
    for i in range(n + 1):
        t = i / n
        s1, s2 = math.sin((1 - t) * om) / math.sin(om), math.sin(t * om) / math.sin(om)
        x, y, z = (s1 * p1[k] + s2 * p2[k] for k in range(3))
        out.append((math.degrees(math.atan2(y, x)), math.degrees(math.atan2(z, math.hypot(x, y)))))
    return out


routes = []
for key, label, dest in DESTS:
    pts = [project(*p) for p in gc_points(ORIGIN, dest)]
    (x0, y0), (x1, y1) = pts[0], pts[-1]
    L = math.hypot(x1 - x0, y1 - y0)
    nx, ny = (y1 - y0) / L, -(x1 - x0) / L       # unit normal
    if ny > 0:                                      # lift towards the top of the map
        nx, ny = -nx, -ny
    lift = min(L * 0.16, 70)
    arc = [(x + nx * lift * math.sin(math.pi * i / (len(pts) - 1)),
            y + ny * lift * math.sin(math.pi * i / (len(pts) - 1))) for i, (x, y) in enumerate(pts)]
    d = 'M' + 'L'.join(f'{x:.1f},{y:.1f}' for x, y in arc)
    routes.append((key, label, d, project(*dest)))

ox, oy = project(*ORIGIN)
W = (LON1 - LON0) * K
H = project(0, LAT0)[1]

with open(OUT, 'w', encoding='utf-8') as fh:
    fh.write('{{-- GENERATED by resources/map-data/build_coffee_map.py from Natural Earth (public domain). '
             'Do not edit by hand. --}}\n')
    fh.write(f'<svg class="cj-svg" viewBox="0 0 {W:.0f} {H:.0f}" data-world="0 0 {W:.0f} {H:.0f}" '
             f'data-origin="{ox:.1f} {oy:.1f}" preserveAspectRatio="xMidYMid meet" '
             'aria-hidden="true" focusable="false">\n')
    fh.write('<defs><radialGradient id="cjGlow"><stop offset="0" stop-color="#e3262e" stop-opacity=".55"/>'
             '<stop offset="1" stop-color="#e3262e" stop-opacity="0"/></radialGradient></defs>\n')
    fh.write('<g class="cj-land">\n')
    for a3, name, region, d in countries:
        if a3 == 'ETH':
            continue
        attrs = f' data-region="{region}" data-name="{name}"' if region else ''
        cls = 'cj-c' + (' cj-c--dest' if region else '')
        fh.write(f'<path class="{cls}" data-a3="{a3}"{attrs} d="{d}"/>\n')
    eth = next(c for c in countries if c[0] == 'ETH')
    fh.write('</g>\n')
    fh.write(f'<circle class="cj-glow" cx="{ox:.1f}" cy="{oy:.1f}" r="60" fill="url(#cjGlow)"/>\n')
    fh.write(f'<path class="cj-eth" data-a3="ETH" d="{eth[3]}"/>\n')
    fh.write('<g class="cj-routes">\n')
    for key, label, d, _ in routes:
        fh.write(f'<path class="cj-route" data-route="{key}" d="{d}"/>\n')
    fh.write('</g>\n<g class="cj-markers">\n')
    for key, label, d, (dx, dy) in routes:
        fh.write(f'<g class="cj-dest" data-dest="{key}" transform="translate({dx:.1f} {dy:.1f})">'
                 '<circle class="cj-dest-ring" r="7"/><circle class="cj-dest-dot" r="3.2"/></g>\n')
    fh.write(f'<g class="cj-origin" transform="translate({ox:.1f} {oy:.1f})">'
             '<circle class="cj-pulse" r="6"/><circle class="cj-origin-dot" r="3.6"/></g>\n')
    fh.write('</g>\n')
    # aircraft: points along +x, positioned by JS along the active route
    fh.write('<g class="cj-plane"><path d="M7 0 L-3 -1.3 L-5.5 -5.2 L-7 -5.2 L-5.6 -1.2 L-7.6 -1 L-8.6 -2.6 '
             'L-9.6 -2.6 L-9 0 L-9.6 2.6 L-8.6 2.6 L-7.6 1 L-5.6 1.2 L-7 5.2 L-5.5 5.2 L-3 1.3 Z"/></g>\n')
    fh.write('</svg>\n')

size = os.path.getsize(OUT)
print(f'countries={len(countries)} routes={len(routes)} viewBox={W:.0f}x{H:.0f} file={size/1024:.1f}KB')
