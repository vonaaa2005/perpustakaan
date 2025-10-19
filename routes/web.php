<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('layout.index');
})->name('dashboard');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

// halaman register muncul ketika klik "User Registrations"
Route::get('/register', function () {
    return view('register');
})->name('register');

// ================== Pencarian ==================
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/hasil-pencarian', [PencarianController::class, 'pencarian'])->name('pencarian.hasil');

// ================== Peminjaman ==================
Route::get('/pinjam-buku', [PeminjamanController::class, 'form'])->name('peminjaman.form');
Route::post('/pinjam-buku', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman-saya', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');