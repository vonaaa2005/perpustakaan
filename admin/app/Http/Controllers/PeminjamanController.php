<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan daftar semua pengajuan peminjaman dengan status 'diajukan'.
     */
    public function index()
    {
        // Ambil semua data peminjaman dengan status 'diajukan'
        // Gunakan with(['anggota', 'buku']) untuk memuat relasi (eager loading)
        $pengajuan = Peminjaman::where('status', 'diajukan')
                                 ->with(['anggota', 'buku'])
                                 ->get();

        // Kirim data ke View Konfirmasi Pengajuan (peminjamanbuku.blade.php)
        return view('layouts.peminjamanbuku', compact('pengajuan'));
    }

    /**
     * Menampilkan form untuk pengajuan peminjaman baru.
     */
    public function create()
    {
        $anggotas = \App\Models\Anggota::all();

        return view('peminjaman.create', compact('anggotas'));
    }

    /**
     * Simpan pengajuan peminjaman baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggotas,id',
            'id_buku' => 'required|exists:bukus,id',
            'judul_buku' => 'required|string|max:255',
        ]);

        $buku = \App\Models\Buku::findOrFail($request->id_buku);
        if ($buku->judul !== $request->judul_buku) {
            return redirect()->back()->with('error', 'Judul buku tidak sesuai dengan ID yang dimasukkan.');
        }
        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku tidak tersedia.');
        }

        Peminjaman::create([
            'anggota_id' => $request->id_anggota,
            'buku_id' => $request->id_buku,
            'status' => 'diajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $buku->decrement('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman berhasil diajukan!');
    }

    /**
     * Memproses konfirmasi pengajuan peminjaman (dipanggil oleh tombol hijau 'Konfirmasi').
     */
    public function konfirmasi(Peminjaman $peminjaman) 
    {
        // Update status menjadi 'dipinjam' dan catat tanggal pinjam
        $peminjaman->update([
            'status' => 'dipinjam',
            'tanggal_peminjaman' => now(),
            'tanggal_kembali' => now()->addDays(7), // Contoh: 7 hari masa pinjam
        ]);

        // Redirect ke halaman cetak bukti setelah konfirmasi
        return redirect()->route('peminjaman.cetak', $peminjaman->id)
                         ->with('success', 'Peminjaman berhasil dikonfirmasi dan siap dicetak!');
    }

    /**
     * Memproses penolakan pengajuan peminjaman (dipanggil oleh tombol merah 'Tolak').
     */
    public function tolak(Peminjaman $peminjaman) 
    {
        // Update status menjadi 'ditolak'
        $peminjaman->update([
            'status' => 'ditolak',
        ]);

        // Increment stok buku kembali karena ditolak
        $peminjaman->buku->increment('stok');

        // Redirect kembali ke halaman konfirmasi dengan pesan sukses
        return redirect()->route('peminjaman.index')
                         ->with('success', 'Pengajuan peminjaman berhasil ditolak!');
    }

    /**
     * Menampilkan halaman bukti peminjaman (Cetak Peminjaman).
     * Ini dipanggil oleh route 'peminjaman.cetak'.
     */
    public function cetak(Peminjaman $peminjaman) 
    {
        // Pastikan relasi buku dan anggota dimuat
        $peminjaman->load('buku', 'anggota'); 

        // Kirim data peminjaman yang sudah dikonfirmasi ke view cetak
        // (Asumsi nama file view untuk cetak adalah 'cetak_peminjaman.blade.php')
        return view('cetak_peminjaman', compact('peminjaman')); 
    }
}
