<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function fitur1()
    {
        return view('pages.fitur1');
    }

    public function fitur2()
    {
        return view('pages.fitur2');
    }

    public function fitur3()
    {
        return view('pages.fitur3');
    }

    public function profile()
    {
        return view('pages.profile');
    }

}
