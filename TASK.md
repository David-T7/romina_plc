# Romina PLC — Task List

> Tasks are split across 3 team members. Complete **Person 1** tasks first — they unblock everyone else.
> Check off tasks as you finish them: change `[ ]` to `[x]`.

---

## Person 1 — Structure & Cleanup

- [x] **Task 1 — Remove duplicate home route**
  Delete the first `Route::get('/')` closure in `routes/web.php` (line 17).
  Keep only the `PagesController::home` route below it.

- [x] **Task 2 — Sub-page routes**
  Site is a SPA — all sections live on the home page via anchor links.
  Sub-page routes commented out in `routes/web.php` (can be uncommented if needed later).

- [x] **Task 3 — Split the main layout into partials**
  `resources/views/layouts/mainlayout.blade.php` is ~2500 lines.
  Break it into `@include` partials under `resources/views/partials/`:
  - `header.blade.php`
  - `hero.blade.php`
  - `about.blade.php`
  - `who-we-are.blade.php`
  - `culture.blade.php`
  - `executive-team.blade.php`
  - `businesses.blade.php`
  - `sustainability.blade.php`
  - `portfolio.blade.php`
  - `footer.blade.php`

  > ⚠️ Agree on these file names with the team **before** starting — Person 2 and Person 3 will be editing those same files.

- [x] **Task 4 — Implement mobile menu JavaScript**
  The `.mobile-menu-button` (hamburger) is in the header but nothing wires it up.
  - Toggle an `open` class on `.main-navigation` when the button is clicked
  - Close the nav when any nav link is clicked
  - Handle the mega menu dropdown on mobile too

- [ ] **Task 5 — Fix "Business Group" branding**
  Two places have the wrong name in `mainlayout.blade.php`:
  - `<title>Business Group</title>` → change to `<title>{{ $pageTitle }}</title>`
  - Footer copyright: `"© {{ date('Y') }} Business Group."` → `"Romina Group"`

- [ ] **Task 20 — Audit missing images**
  Check which of these actually exist under `public/images/`:
  - `hero/hero-01.jpg`, `hero-02.jpg`, `hero-03.jpg`
  - `about/romina-history.jpg`
  - `team/executive-01.jpg` through `executive-04.jpg`
  - `portfolio/jaguar.jpg`

  List what's missing and flag to the team. Check `src/assets/` in the React project for anything usable.

---

## Person 2 — New Content Sections

- [ ] **Task 6 — Update the mega menu**
  Replace the 3 generic columns with the 4 real brand groups:
  1. **Restaurants & Culinary Brands** — Romina Restaurants, KOBA, Meskott *(Hospitality in Addis Ababa since 1973.)*
  2. **Romina Coffee** — Romina Coffee *(Ethiopian Arabica, exported since 2009.)*
  3. **Romina Imports** — Romina Imports *(Quality FMCG imported for local consumption.)*
  4. **Jaquar World** — Jaquar World Addis Ababa *(Complete bathroom solutions, since 2017.)*

  Replace all `href="#"` with real anchor links once brand panels exist.

- [x] **Task 7 — Add Company Timeline section**
  Add after the *Who We Are* section. 5 milestones:

  | Year | Title | Details |
  |---|---|---|
  | 1973 | Where it began | Girma Taye opens a small restaurant in Arat Kilo, Addis Ababa |
  | 2009 | Romina Coffee | Ethiopian Arabica exported to Europe, the USA, Asia and the Middle East |
  | 2017 | Jaquar World | Partnership between Jaquar Group and Romina Group opens Jaquar World Addis Ababa |
  | 2020 | KOBA | KOBA Patisserie & Bakery established, built on craftsmanship and artisan baking |
  | Today | Romina Group | Diversified group spanning hospitality, coffee export, trading, importing and distribution |

- [ ] **Task 8 — Add Coffee section**
  Add after the *Portfolio* section. Two parts:

  **Stats (animated counters):**
  - 24 — Wet mill stations
  - 7+ — Coffee-growing regions *(Sidamo, Limmu, Yirgacheffe, Guji, Nekempte, Anfilo, Nansebo)*
  - 3,000–3,500 — Tons of annual capacity
  - 30,000+ — Farmers
  - 6,000+ — Specialty farmer partners
  - 7+ — Certified stations *(Rainforest Alliance, Fair Trade, UTZ)*

  **Export journey bar:**
  Farm → Harvest → Wet mill → Processing → Cup testing → Export → Global market

- [ ] **Task 9 — Add News section**
  Add with `id="news"` so the nav link works.
  - Filter tabs: `All`, `Events`, `Launches`, `Coffee harvest`, `Awards`, `CSR`, `Restaurants`, `Group news`
  - 4 placeholder article cards:
    - *"This season's harvest update"* — Coffee harvest
    - *"A new branch opening"* — Launches
    - *"Community project update"* — CSR
    - *"Group announcement"* — Group news
  - Filtering via vanilla JS (no page reload). Active tab highlighted in red.

- [ ] **Task 10 — Add Careers section**
  Add with `id="careers"` so the nav link resolves.
  Heading + short copy about working at Romina Group + a CTA button (email or link).
  Placeholder content is fine for now.

- [ ] **Task 11 — Add Partners section**
  Add before the footer. Highlight the Jaquar Group partnership.
  Placeholder logos if real assets aren't available yet.

- [ ] **Task 19 — Update Portfolio cards with real copy**
  Replace the placeholder text in the 4 portfolio cards:

  | Card | Title | Body | Pills |
  |---|---|---|---|
  | 01 | Restaurant management & hospitality | Home-styled dishes, warm service and three distinct culinary brands across Addis Ababa. | Romina Restaurants, KOBA, Meskott |
  | 02 | Coffee exporting | Arabica from seven growing regions, sourced from over 30,000 farmers, exported across four continents. | Romina Coffee |
  | 03 | International trading services | Grown out of our hospitality operations into a dedicated importer of quality FMCG for local consumption. | Romina Imports |
  | 04 | Importing & distribution | Distribution of essential products to the local Ethiopian market. | Romina Imports, Jaquar World |

  Also fix **"Jaguar Appliances"** → **"Jaquar World"** on card 03/04.

---

## Person 3 — Brand Panels & Contact

- [ ] **Task 12 — Add Contact form section**
  Add above the footer with `id="contact"`. Fields: Name, Email, Subject, Message.
  - Add a POST route `/contact` in `routes/web.php`
  - Handle in `PagesController` or a new `ContactController`
  - Include `@csrf` token
  - Show a success flash message on submit (no 500s)

- [ ] **Task 13 — Build Romina Restaurants brand panel**
  - **Kicker:** An iconic eatery in the heart of Addis Ababa
  - **Body:** We don't just serve food; we invite you into an experience that mirrors the inclusion and warmth of home. Home-styled dishes from across the world, prepared as the most comforting versions of what you love.
  - **Culinary promise:** European dishes, Asian dishes, Local Ethiopian dishes, Signature Agelgel
  - **Locations:**
    - Arat Kilo (4 Kilo) — Romina Restaurant, Bar & Cafe
    - Balderas — Romina Restaurant / Takeaway Center

- [ ] **Task 14 — Build KOBA brand panel**
  - **Kicker:** Patisserie & bakery, established 2020
  - **Title:** Crafted with passion. Made fresh.
  - **Body:** Artisan pastries, handcrafted cakes, signature breakfasts, specialty coffee and savory dishes, baked fresh by skilled pastry artisans across Addis Ababa.
  - **Phone:** +251 900 989 898
  - **Locations:**
    - Arat Kilo — Pastry & bakery takeaway center
    - Sandford — Pastry, bakery, meals & drinks cafe
    - Atlas — Pastry, bakery, meals & drinks cafe
    - Peacock — Elevated coffee experience *(flagship)*
    - ICS — Pastry, bakery, meals & drinks cafe *(coming soon)*

- [ ] **Task 15 — Build Meskott brand panel**
  - **Kicker:** Fine dining, VIP tables, a street food garden and the bar
  - **Title:** Meskott Culinary Experience
  - **Body:** International cuisine led by talented chefs, paired with a curated selection of wines, spirits and classy cocktails. The new upscale meeting place in the city.
  - **Phone:** +251 90 387 9999
  - **Location:** Arat Kilo, King George VI Street, opposite Menelik II School, ground floor, Sellassie Twin Towers

- [ ] **Task 16 — Build Romina Imports brand panel**
  - **Kicker:** Quality FMCG imported for local consumption
  - **Title:** From our kitchens to the market
  - **Body:** What began as sourcing for Romina's own hospitality operations grew into a dedicated importer supplying the Ethiopian market.
  - **Phone:** 0116 669 100
  - **Product categories:** Pastas, Pastry ingredients, Dairy products, Edible oils, Rice

- [ ] **Task 17 — Build Jaquar World brand panel**
  - **Kicker:** Launched 2017 with Jaquar Group
  - **Title:** The complete bathroom solutions destination
  - **Body:** Faucets, shower systems, sanitaryware, smart toilets, jacuzzi baths and architectural lighting, from Artize luxury to Jaquar Premium.
  - **Phone:** +251 944 143 073
  - **Brands:** Artize (luxury), Jaquar Premium
  - **Locations:**
    - Kazanchis — Zewditu Street, Joberg Building, 1st floor
    - Meskel Flower — Off Ethio-China Street, Martreza Building, ground floor

- [ ] **Task 18 — Update Executive Team with real data**
  All 4 cards currently say "Executive Name" / "Executive Position" with placeholder photos.
  Replace with real names, titles and photos once the team supplies them.
  Add a 5th card if needed.

---

## Reference

**React project (full content reference):**
`C:\Users\25192\Desktop\eyob romnia\eyob romnia\temp\romina.jsx`

Key data constants to pull copy from:
- `TIMELINE` — company milestones
- `PORTFOLIO` — portfolio card content
- `BRANDS` — all 6 brand panels (restaurants, koba, meskott, coffee, imports, jaquar)
- `COFFEE_STATS` — coffee section stats
- `JOURNEY` — export journey steps
- `NEWS` / `NEWS_CATS` — news section
- `MEGA` — mega menu structure
- `PHONES` — business phone numbers

**Key Laravel files:**
- `routes/web.php` — all routes
- `app/Http/Controllers/PagesController.php` — page controller
- `resources/views/layouts/mainlayout.blade.php` — master layout
- `public/css/main.css` — all custom CSS
- `public/images/` — site images
