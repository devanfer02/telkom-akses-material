<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'gender' => 'required|string|in:laki-laki,wanita',
            'city' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20|unique:users,no_hp,' . $user->id,
            'profile_picture' => 'nullable|string',
        ]);

        $data = $request->except('profile_picture');
        $data['gender'] = ($request->gender === 'laki-laki' ? 1 : 0);

        if ($request->filled('profile_picture')) {
            $base64 = $request->profile_picture;
            if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
                $imageData = substr($base64, strpos($base64, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif

                $imageData = base64_decode($imageData);
                if ($imageData !== false) {
                    $fileName = 'profile/' . Str::random(10) . '_' . time() . '.' . $type;
                    $path = public_path('uploads/' . $fileName);

                    if (!file_exists(dirname($path))) {
                        mkdir(dirname($path), 0755, true);
                    }

                    file_put_contents($path, $imageData);

                    if ($user->profile_picture) {
                        $oldPath = public_path('uploads/' . $user->profile_picture);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }

                    $data['profile_picture'] = $fileName;
                }
            }
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
