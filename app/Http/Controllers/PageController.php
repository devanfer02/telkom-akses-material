<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function dashboard()
    {
        $totalUser = User::count();
        $totalMaterial = Material::count();
        $inMaterial = Material::where('status', 'IN')->count();
        $outMaterial = Material::where('status', 'OUT')->count();

        $data = [
            'totalUser' => $totalUser,
            'totalMaterial' => $totalMaterial,
            'inMaterial' => $inMaterial,
            'outMaterial' => $outMaterial,
        ];

        return view('pages.dashboard', compact('data'));
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



}
