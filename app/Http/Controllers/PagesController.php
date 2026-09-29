<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $pageData = [
            'pageTitle' => 'Romina PLC — Official Website',
            'pageCode' => 'Home',
        ];

        return view('homepage.indexPage')->with($pageData);
    }

    public function about()
    {
        return redirect('/#about');
    }

    public function history()
    {
        $pageData = [
            'pageTitle' => 'Our History — Romina Group',
            'pageCode' => 'History',
        ];

        return view('about.history')->with($pageData);
    }

    public function leadership()
    {
        $pageData = [
            'pageTitle' => 'Our Leadership — Romina Group',
            'pageCode' => 'Leadership',
        ];

        return view('about.leadership')->with($pageData);
    }

    public function business($slug)
    {
        $brands = config('businesses.brands');

        abort_unless(isset($brands[$slug]), 404);

        $pageData = [
            'pageTitle' => $brands[$slug]['name'] . ' — Romina Group',
            'pageCode' => 'Business',
            'brandSlug' => $slug,
            'brand' => $brands[$slug],
            'brands' => $brands,
            'groups' => config('businesses.groups'),
            'gallery' => $this->businessGallery($slug, $brands[$slug]),
        ];

        return view('businesses.show')->with($pageData);
    }

    /**
     * Photo mosaic for a brand page.
     *
     * 1. Every image dropped into public/images/gallery/{slug}/ (sorted by
     *    filename; caption from the filename, e.g. "02-bar-at-night.jpg").
     * 2. Photos listed in the brand's 'gallery' config.
     * 3. "Photo coming soon" placeholders from config, padding to 7 tiles
     *    so the mosaic always fills its grid.
     */
    private function businessGallery(string $slug, array $brand): array
    {
        $photos = [];
        $dir = public_path('images/gallery/' . $slug);

        if (is_dir($dir)) {
            $files = glob($dir . '/*');
            natcasesort($files);

            foreach ($files as $file) {
                if (!preg_match('/\.(jpe?g|png|webp)$/i', $file)) {
                    continue;
                }

                $name    = pathinfo($file, PATHINFO_FILENAME);
                $caption = ucfirst(trim(preg_replace('/[-_]+/', ' ', preg_replace('/^\d+[-_ ]*/', '', $name))));

                $photos[] = [
                    'src'     => 'images/gallery/' . $slug . '/' . basename($file),
                    'shot'    => $caption,
                    'caption' => $caption,
                ];
            }
        }

        $placeholders = [];
        foreach ($brand['gallery'] ?? [] as $item) {
            if (!empty($item['src'])) {
                $photos[] = $item;
            } else {
                $placeholders[] = $item;
            }
        }

        $minTiles = 7;
        $padding  = array_slice($placeholders, 0, max(0, $minTiles - count($photos)));

        return array_merge($photos, $padding);
    }

    public function sustainability()
    {
        $pageData = [
            'pageTitle' => 'Sustainability — Romina Group',
            'pageCode' => 'Sustainability',
        ];

        return view('sustainability.index')->with($pageData);
    }

    public function team()
    {
        return redirect('/#executive-team');
    }

    private function sortedArticles(): array
    {
        $articles = config('news.articles', []);

        usort($articles, function ($a, $b) {
            return strcmp($b['date'], $a['date']);
        });

        return $articles;
    }

    public function news(Request $request)
    {
        $articles   = $this->sortedArticles();
        $categories = config('news.categories', []);

        // Count per category for the filter tabs
        $counts = array_fill_keys(array_keys($categories), 0);
        foreach ($articles as $item) {
            if (isset($counts[$item['category']])) {
                $counts[$item['category']]++;
            }
        }

        // ?category=<key> filters the list; unknown values fall back to "All"
        $active = $request->query('category');
        if (!isset($categories[$active])) {
            $active = null;
        }

        if ($active) {
            $articles = array_values(array_filter($articles, function ($item) use ($active) {
                return $item['category'] === $active;
            }));
        }

        $pageData = [
            'pageTitle'  => ($active ? $categories[$active]['label'] . ' — ' : '') . 'News — Romina Group',
            'pageCode'   => 'News',
            'categories' => $categories,
            'counts'     => $counts,
            'total'      => count($this->sortedArticles()),
            'active'     => $active,
            'featured'   => $articles[0] ?? null,
            'articles'   => array_slice($articles, 1),
        ];

        return view('news.index')->with($pageData);
    }

    public function newsShow($slug)
    {
        $articles = $this->sortedArticles();

        $article = null;
        foreach ($articles as $item) {
            if ($item['slug'] === $slug) {
                $article = $item;
                break;
            }
        }

        abort_unless($article, 404);

        // Related: same category first, then the latest from other categories
        $others = array_values(array_filter($articles, function ($item) use ($slug) {
            return $item['slug'] !== $slug;
        }));
        usort($others, function ($a, $b) use ($article) {
            return ($b['category'] === $article['category']) <=> ($a['category'] === $article['category']);
        });

        $pageData = [
            'pageTitle'  => $article['title'] . ' — Romina Group',
            'pageCode'   => 'News',
            'article'    => $article,
            'categories' => config('news.categories', []),
            'related'    => array_slice($others, 0, 3),
        ];

        return view('news.show')->with($pageData);
    }

    public function contact()
    {
        return redirect('/#contact');
    }
}
