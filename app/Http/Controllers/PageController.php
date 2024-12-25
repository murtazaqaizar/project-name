<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function nowShowing()
    {
        return view('now-showing');
    }

    public function comingSoon()
    {
        return view('coming-soon');
    }

    public function avatar()
    {
        return view('avatar');
    }
}

