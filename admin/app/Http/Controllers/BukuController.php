<?php

namespace App\Http\Controllers;

use App\Models\Buku; // Panggil Model Buku
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'bukus' menggunakan Model Eloquent
        $bukus = Buku::all();

    // Kirim data ke View 'databuku.blade.php' (tanpa ekstensi .blade.php)
    return view('databuku', compact('bukus'));
    }

    /**
     * Show form to create a new Buku.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created Buku in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_buku' => 'required|string|max:150',
            'penulis' => 'nullable|string|max:100',
            'id_buku' => 'required|string|max:10|unique:bukus,id_buku',
            'stok' => 'required|integer|min:0',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'nama_buku' => 'required|string|max:150',
            'penulis' => 'nullable|string|max:100',
            'id_buku' => 'required|string|max:10|unique:bukus,id_buku,'.$buku->id,
            'stok' => 'required|integer|min:0',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
    // ... Di sini Anda bisa menambahkan metode create, store, edit, update, destroy
}