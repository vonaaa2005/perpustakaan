<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PencarianController extends Controller
{
    /**
     * Menampilkan form pencarian (tampilan awal).
     */
    public function index()
    {
        // Tampilkan view pencarian (resources/views/pencarian.blade.php)
        return view('pencarian');
    }

    /**
     * Memproses request pencarian dari form (menggantikan 'search').
     */
    public function pencarian(Request $request)
    {
        // Ambil data query dari input form (name="query")
        $query = $request->input('query');
        
        // ==========================================================
        // SIMULASI LOGIKA PENCARIAN (GANTI DENGAN KODE DATABASE ANDA)
        // ==========================================================
        
        if ($query) {
            // SIMULASI DATA HASIL PENCARIAN
            $results = [
                (object)['title' => "Hasil 1: {$query}", 'author' => 'Penulis A', 'year' => 2024],
                (object)['title' => "Hasil 2: {$query} Lanjutan", 'author' => 'Penulis B', 'year' => 2023],
                (object)['title' => "Hasil 3: Buku Tentang {$query}", 'author' => 'Penulis C', 'year' => 2022],
            ];
            $message = "Menampilkan hasil untuk: **{$query}**";
        } else {
            $results = [];
            $message = "Silakan masukkan kata kunci untuk memulai pencarian.";
        }
        
        // Kirim data kembali ke view pencarian
        return view('pencarian', [
            'query' => $query,
            'results' => $results,
            'message' => $message,
        ]);
    }
}