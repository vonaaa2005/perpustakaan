<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil
     */
    public function edit()
    {
        // Menampilkan form profil (upload avatar)
        return view('profile');
    }

    /**
     * Update profil user (termasuk nama / email jika nanti ditambahkan)
     */
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $user->id . '_' . $file->getClientOriginalName());

            // Simpan file ke storage/app/public/avatars
            $path = $file->storeAs('avatars', $filename, 'public');

            // Hapus file lama jika ada
            if ($user->avatar && Storage::disk('public')->exists('avatars/' . $user->avatar)) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            // Update data user
            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Update hanya foto profil (dipanggil dari modal popup)
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'avatar.required' => 'Silakan pilih foto terlebih dahulu.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'avatar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $user = Auth::user();

        // Simpan foto baru
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $user->id . '_' . $file->getClientOriginalName());
            $file->storeAs('avatars', $filename, 'public');

            // Hapus foto lama jika ada
            if ($user->avatar && Storage::disk('public')->exists('avatars/' . $user->avatar)) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            $user->avatar = $filename;
            $user->save();
        }

        // kalau popup pakai AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Foto profil berhasil diperbarui!']);
        }

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
