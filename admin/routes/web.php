<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController; 
use App\Http\Controllers\AnggotaController; 
use App\Http\Controllers\PeminjamanController; 
use App\Http\Controllers\PengembalianController; // <-- TAMBAHKAN INI!
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 1. ROUTE BERANDA (Halaman Utama)
Route::get('/', function () {
    return view('dashboard');
})->name('beranda'); 

// -------------------------------------------------------------------------
## MANAJEMEN DATA BUKU 📚
// -------------------------------------------------------------------------

Route::get('/databuku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');


// -------------------------------------------------------------------------
## MANAJEMEN DATA ANGGOTA 🧑‍🤝‍🧑
// -------------------------------------------------------------------------

Route::get('/dataanggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');


// -------------------------------------------------------------------------
## KONFIRMASI PEMINJAMAN BUKU 📝
// -------------------------------------------------------------------------

// ROUTE untuk menampilkan daftar pengajuan konfirmasi
Route::get('/peminjamanbuku', [PeminjamanController::class, 'index'])->name('peminjaman.index');

// ROUTE untuk form pengajuan peminjaman baru
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');

// ROUTE untuk simpan pengajuan peminjaman
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// ROUTE untuk memproses konfirmasi peminjaman (Tombol Hijau "Konfirmasi")
Route::put('/peminjaman/konfirmasi/{peminjaman}', [PeminjamanController::class, 'konfirmasi'])->name('peminjaman.konfirmasi');

// ROUTE untuk Cetak Bukti Peminjaman (Halaman Cetak)
Route::get('/peminjaman/cetak/{peminjaman}', [PeminjamanController::class, 'cetak'])->name('peminjaman.cetak');

// ROUTE untuk memproses penolakan peminjaman (Tombol Merah "Tolak")
Route::put('/peminjaman/tolak/{peminjaman}', [PeminjamanController::class, 'tolak'])->name('peminjaman.tolak');


// -------------------------------------------------------------------------
## PENGEMBALIAN BUKU 🔄
// -------------------------------------------------------------------------

// ROUTE 1: Menampilkan Form Pengembalian (Halaman Awal)
// Ini adalah link yang diklik dari dashboard
Route::get('/pengembalianbuku', [PengembalianController::class, 'index'])->name('pengembalian.index');

// ROUTE 2: Memproses Pencarian dari Form (Cari Peminjaman)
Route::post('/pengembalian/search', [PengembalianController::class, 'search'])->name('pengembalian.search');

// ROUTE 3: Konfirmasi Pengembalian dan Denda
Route::post('/pengembalian/proses/{peminjaman}', [PengembalianController::class, 'prosesPengembalian'])->name('pengembalian.proses');

// ROUTE 4: Pembayaran Denda (Halaman Pembayaran)
Route::get('/pengembalian/bayar-denda/{peminjaman}', [PengembalianController::class, 'formPembayaran'])->name('pengembalian.form_bayar');

// ROUTE 5: Bukti Pengembalian
Route::get('/pengembalian/bukti/{peminjaman}', [PengembalianController::class, 'buktiPengembalian'])->name('pengembalian.bukti');
