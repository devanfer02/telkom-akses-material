<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'no_hp' => ['required', 'string', 'regex:/^(\+62|0)[0-9]{5,}$/'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['no_hp' => $credentials['no_hp'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'no_hp' => 'The provided credentials do not match our records.',
        ])->onlyInput('no_hp');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'regex:/^(\+62|0)[0-9]{5,}$/', 'max:20', 'unique:users'],
            'gender' => ['required', 'string', 'in:laki-laki,wanita'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'min:1'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'gender' => ($request->gender === 'laki-laki' ? true : false),
            'city' => $request->city,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
