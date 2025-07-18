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

    public function data_alat1()
    {
        return view('pages.data_alat1');
    }

    public function data_alat2()
    {
        return view('pages.data_alat2');
    }

    public function data_alat_fix()
    {
        return view('pages.data_alat_fix');
    }

    public function data_alat_tu()
    {
        return view('pages.data_alat_tu');
    }

    public function data_alat_admin()
    {
        return view('pages.data_alat_admin');
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

    public function login()
    {
        return view('pages.login');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function tambah_alat1()
    {
        return view('pages.tambah_alat1');
    }

    public function tambah_alat2()
    {
        return view('pages.tambah_alat2');
    }

    public function timestamp()
    {
        return view('pages.timestamp');
    }
}
