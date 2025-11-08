<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan data user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
        ]);

        // Trigger event registrasi biar email verification bisa jalan
        event(new Registered($user));

        // Redirect dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan periksa email untuk verifikasi.');
    }
}
