"""
Homepage coffee section: hand-drawn line illustration (coffee branch -> falling beans -> export sack).
Writes resources/views/partials/coffee-sketch.blade.php. Run from the project root:
    python resources/map-data/build_coffee_sketch.py

Every stroke gets pathLength="1" so the page script can draw it with stroke-dashoffset as the
visitor scrolls. data-at / data-to (0..1) set when each piece draws within the scroll progress.
"""
import math, os, random

random.seed(7)
HERE = os.path.dirname(os.path.abspath(__file__))
OUT = os.path.join(os.path.dirname(os.path.dirname(HERE)), 'resources', 'views', 'partials', 'coffee-sketch.blade.php')
W, H = 500, 900


def cubic(p0, p1, p2, p3, t):
    u = 1 - t
    return tuple(u**3 * a + 3 * u * u * t * b + 3 * u * t * t * c + t**3 * d for a, b, c, d in zip(p0, p1, p2, p3))


def tangent(p0, p1, p2, p3, t):
    u = 1 - t
    return tuple(3 * u * u * (b - a) + 6 * u * t * (c - b) + 3 * t * t * (d - c) for a, b, c, d in zip(p0, p1, p2, p3))


def j(v, k=1.2):
    return v + random.uniform(-k, k)


def f(x):
    return f'{x:.1f}'


els = []      # (svg, at, to)


def stroke(d, at, to, cls='sk'):
    els.append((f'<path class="{cls}" pathLength="1" d="{d}" data-at="{at:.3f}" data-to="{to:.3f}"/>', at, to))


# ---- branch: two cubic segments entering from the top-left -----------------------------
B1 = ((-6, 52), (80, 58), (150, 98), (232, 124))
B2 = ((232, 124), (314, 150), (392, 168), (468, 222))
stroke(f'M{f(B1[0][0])},{f(B1[0][1])} C{f(B1[1][0])},{f(B1[1][1])} {f(B1[2][0])},{f(B1[2][1])} {f(B1[3][0])},{f(B1[3][1])} '
       f'C{f(B2[1][0])},{f(B2[1][1])} {f(B2[2][0])},{f(B2[2][1])} {f(B2[3][0])},{f(B2[3][1])}', 0.0, 0.16, 'sk sk--bold')
# a second, thinner line along the branch gives the hand-drawn double stroke
stroke(f'M2,58 C84,64 152,104 230,130 C312,156 388,176 452,222', 0.04, 0.18)


def branch_at(s):
    return cubic(*B1, s * 2) if s < .5 else cubic(*B2, (s - .5) * 2)


def branch_dir(s):
    t = tangent(*B1, s * 2) if s < .5 else tangent(*B2, (s - .5) * 2)
    return math.atan2(t[1], t[0])


def leaf(base, ang, L, Wd, at, to):
    dx, dy = math.cos(ang), math.sin(ang)
    nx, ny = -dy, dx
    bx, by = base
    tip = (bx + dx * L, by + dy * L)
    def pt(a, n):
        return (bx + dx * L * a + nx * Wd * n, by + dy * L * a + ny * Wd * n)
    c1, c2, c3, c4 = pt(.22, .62), pt(.72, .5), pt(.72, -.46), pt(.22, -.6)
    d = (f'M{f(bx)},{f(by)} C{f(j(c1[0]))},{f(j(c1[1]))} {f(j(c2[0]))},{f(j(c2[1]))} {f(tip[0])},{f(tip[1])} '
         f'C{f(j(c3[0]))},{f(j(c3[1]))} {f(j(c4[0]))},{f(j(c4[1]))} {f(bx)},{f(by)}')
    stroke(d, at, to)
    m = pt(.5, .05)
    stroke(f'M{f(bx)},{f(by)} Q{f(m[0])},{f(m[1])} {f(pt(.9, 0)[0])},{f(pt(.9, 0)[1])}', to - .02, to + .04)
    for a in (.3, .52, .72):                     # veins, curving toward the tip
        for side in (1, -1):
            s0, s1 = pt(a, 0), pt(a + .14, .36 * side * (1 - a * .4))
            stroke(f'M{f(s0[0])},{f(s0[1])} L{f(s1[0])},{f(s1[1])}', to, to + .05, 'sk sk--fine')


def cherries(c, n, at):
    cx, cy = c
    spots = [(0, 0), (-13, 6), (12, 7), (-2, 15), (14, -4)][:n]
    for i, (ox, oy) in enumerate(spots):
        r = random.uniform(7, 8.6)
        x, y = cx + ox, cy + oy + 10
        a = at + i * .012
        stroke(f'M{f(x + r)},{f(y)} A{f(r)},{f(r)} 0 1 1 {f(x + r - .01)},{f(y - .6)}', a, a + .05, 'sk sk--fruit')
        stroke(f'M{f(x - r * .55)},{f(y - r * .2)} Q{f(x - r * .45)},{f(y - r * .6)} {f(x - r * .05)},{f(y - r * .62)}', a + .04, a + .07, 'sk sk--fine')
        els.append((f'<circle class="sk-dot" cx="{f(x + r * .1)}" cy="{f(y + r * .55)}" r="1.3" data-at="{a + .05:.3f}"/>', a, a))


nodes = [(.18, 1, .05), (.34, 1, .09), (.5, 1, .13), (.66, 1, .17), (.82, -1, .2), (.95, -1, .23)]
for k, (s, side, at) in enumerate(nodes):
    p = branch_at(s)
    a = branch_dir(s)
    L = 78 - k * 3
    leaf(p, a - 1.05, L, 30, at, at + .06)                 # upper leaf
    leaf(p, a + 1.0 + random.uniform(-.1, .1), L - 6, 27, at + .02, at + .08)   # lower leaf
    if k in (1, 2, 3, 4, 5):
        cherries(p, 3 if k % 2 else 4, at + .06)

# ---- falling beans -----------------------------------------------------------------------
T1 = ((462, 252), (500, 330), (432, 392), (468, 468))
T2 = ((468, 468), (502, 540), (420, 610), (300, 668))
trail = (f'M{T1[0][0]},{T1[0][1]} C{T1[1][0]},{T1[1][1]} {T1[2][0]},{T1[2][1]} {T1[3][0]},{T1[3][1]} '
         f'C{T2[1][0]},{T2[1][1]} {T2[2][0]},{T2[2][1]} {T2[3][0]},{T2[3][1]}')
els.append((f'<mask id="skTrailMask" maskUnits="userSpaceOnUse" x="0" y="0" width="{W}" height="{H}">'
            f'<path class="sk-mask" pathLength="1" d="{trail}" data-at=".30" data-to=".66"/></mask>'
            f'<path class="sk-trail" d="{trail}" mask="url(#skTrailMask)"/>', .3, .66))


def bean(x, y, rot, at, cls='sk-bean'):
    return (f'<g class="{cls}" data-at="{at:.3f}" transform="translate({f(x)} {f(y)}) rotate({rot:.0f})">'
            '<ellipse rx="6.2" ry="8.8"/><path d="M0,-7.6 C-3,-3 3,2 0,7.6"/></g>')


for i in range(8):
    t = (i + .5) / 8
    p = cubic(*T1, t * 2) if t < .5 else cubic(*T2, (t - .5) * 2)
    els.append((bean(p[0], p[1], random.uniform(-60, 60), .32 + t * .34), 0, 0))

# ---- export sack -------------------------------------------------------------------------
SA, ST = .62, .9
sack = [
    # open rim (back and front lips)
    ('M168,686 C196,664 300,662 338,684', 0),
    ('M168,686 C204,706 304,706 338,684', .02),
    # folded collar
    ('M166,688 C160,700 162,712 170,720 C214,738 296,738 338,718 C344,710 344,698 338,686', .04),
    # body: left bulge, base, right bulge
    ('M171,720 C138,760 130,830 146,872 C150,884 158,890 172,892', .08),
    ('M172,892 C214,900 292,900 330,890', .12),
    ('M330,890 C350,878 356,836 352,800 C348,764 338,738 336,720', .14),
    # creases and burlap weave
    ('M164,748 C157,774 156,804 160,830', .18),
    ('M334,748 C341,776 342,806 338,830', .19),
    ('M232,738 C230,746 234,754 232,762', .2),
]
for d, off in sack:
    stroke(d, SA + off, SA + off + .1, 'sk sk--bold' if off in (.08, .12, .14) else 'sk')
for x in range(184, 330, 18):
    y = random.uniform(870, 880)
    stroke(f'M{x},{f(y)} l6,-3', SA + .2, SA + .24, 'sk sk--fine')
# beans heaped in the mouth
for i, (x, y, r) in enumerate([(226, 676, -30), (250, 670, 20), (274, 677, -10), (300, 672, 40), (238, 686, 70), (288, 688, -50)]):
    els.append((bean(x, y, r, SA + .06 + i * .015, 'sk-bean sk-bean--pile'), 0, 0))
# a few spilled at the foot
for i, (x, y, r) in enumerate([(372, 884, 60), (392, 890, -20), (128, 888, 30)]):
    els.append((bean(x, y, r, SA + .28 + i * .02, 'sk-bean sk-bean--pile'), 0, 0))

# stencil lettering
els.append((f'<g class="sk-type" data-at="{SA + .24:.3f}">'
            '<text x="248" y="790" text-anchor="middle" class="sk-t1">COFFEE</text>'
            '<text x="248" y="826" text-anchor="middle" class="sk-t1">EXPORT</text>'
            '<text x="248" y="852" text-anchor="middle" class="sk-t2">PRODUCE OF ETHIOPIA</text>'
            '</g>', 0, 0))
stroke('M196,800 L204,802 M292,802 L300,800', SA + .26, SA + .3, 'sk sk--fine')

with open(OUT, 'w', encoding='utf-8') as fh:
    fh.write('{{-- GENERATED by resources/map-data/build_coffee_sketch.py. Do not edit by hand. --}}\n')
    fh.write(f'<svg class="cof-sketch" id="cofSketch" viewBox="0 0 {W} {H}" preserveAspectRatio="xMidYMid meet" '
             'aria-hidden="true" focusable="false">\n')
    fh.write('<defs><filter id="skRough" x="-5%" y="-5%" width="110%" height="110%">'
             '<feTurbulence type="fractalNoise" baseFrequency=".035" numOctaves="2" seed="4"/>'
             '<feDisplacementMap in="SourceGraphic" scale="2.6"/></filter></defs>\n')
    fh.write('<g filter="url(#skRough)">\n')
    for svg, _, _ in els:
        fh.write(svg + '\n')
    fh.write('</g>\n</svg>\n')
print('elements', len(els), 'bytes', os.path.getsize(OUT))
