<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('pages.profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:laki-laki,female',
            'city' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $request['gender'] = ($request->gender === 'laki-laki' ? true : false);

        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
