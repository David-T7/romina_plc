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

    public function news()
    {
        return redirect('/#news');
    }

    public function contact()
    {
        return redirect('/#contact');
    }
}
