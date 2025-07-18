<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('pages.auth.login');
    }

    public function viewRegister()
    {
        return view('pages.auth.register');
    }

    public function login()
    {

    }

    public function register()
    {

    }
}
