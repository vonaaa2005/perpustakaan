<?php

namespace App\Http\Controllers;

use App\Models\Anggota; // Import Model
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel 'anggotas'
        $anggotas = Anggota::all();

        // Kirim data ke View 'dataanggota_blade'
        return view('dataanggota', compact('anggotas'));
    }
    // Tambahkan metode create dan store untuk form tambah anggota
    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_anggota' => 'required|string|max:150',
            'id_anggota' => 'required|string|max:20|unique:anggotas,id_anggota',
            'email' => 'nullable|email|max:255',
        ]);

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }
}