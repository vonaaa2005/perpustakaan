<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    // 🟢 Menampilkan form peminjaman buku (Sudah Sukses)
    public function form()
    {
        // ambil semua buku yang statusnya masih tersedia
        $buku = Buku::where('status', 'In Stock')->get();

        return view('peminjaman.form', compact('buku'));
    }

    // 🟢 Menyimpan data peminjaman (Sudah Sukses)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
        ]);

        // ambil tanggal pinjam dari form
        $tanggal_pinjam = Carbon::parse($request->tanggal_pinjam);
        // tanggal kembali otomatis 7 hari dari tanggal pinjam
        $tanggal_kembali = $tanggal_pinjam->copy()->addDays(7);

        // simpan ke tabel peminjaman
        Peminjaman::create([
            'nama' => $request->nama,
            'judul_buku' => $request->judul_buku,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
        ]);

        return redirect()->route('peminjaman.form')->with('success', 'Data peminjaman berhasil disimpan!');
    }

    // 🔴 METHOD BARU: Menampilkan Riwayat Peminjaman Anggota
    public function riwayat()
    {
        // Mengambil semua data peminjaman dari tabel Peminjaman
        // Dalam aplikasi nyata, Anda biasanya memfilter berdasarkan user ID yang sedang login: 
        // $riwayat_peminjaman = Peminjaman::where('user_id', auth()->id())->latest()->get();
        
        // Untuk saat ini, kita ambil semua data untuk melihat apakah view-nya bisa dimuat
        $riwayat_peminjaman = Peminjaman::latest()->get(); 

        return view('peminjaman.riwayat', compact('riwayat_peminjaman'));
    }
}
