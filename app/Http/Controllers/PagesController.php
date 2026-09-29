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
        ];

        return view('businesses.show')->with($pageData);
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

    public function news()
    {
        $articles = $this->sortedArticles();

        $pageData = [
            'pageTitle' => 'News — Romina Group',
            'pageCode'  => 'News',
            'featured'  => $articles[0] ?? null,
            'articles'  => array_slice($articles, 1),
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

        $related = array_values(array_filter($articles, function ($item) use ($slug) {
            return $item['slug'] !== $slug;
        }));

        $pageData = [
            'pageTitle' => $article['title'] . ' — Romina Group',
            'pageCode'  => 'News',
            'article'   => $article,
            'related'   => array_slice($related, 0, 3),
        ];

        return view('news.show')->with($pageData);
    }

    public function contact()
    {
        return redirect('/#contact');
    }
}
