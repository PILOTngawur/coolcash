<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('profile.password');
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password'      => ['required'],
            'new_password'          => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai.',
            ]);
        }

        // Update password baru
        $user->save([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Password berhasil diganti.');
    }
}
