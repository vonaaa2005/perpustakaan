<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================== Halaman Utama ==================
Route::get('/', function () {
    return view('layout.index');
})->name('dashboard');

// ================== Registrasi & Verifikasi ==================

// Halaman register (tampilan form)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Proses simpan data registrasi
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Menampilkan daftar user (opsional)
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Halaman verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
    // Buat file: resources/views/auth/verify-email.blade.php
})->middleware('auth')->name('verification.notice');

// Link verifikasi yang dikirim ke email user
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // menandai email user sudah terverifikasi
    return redirect('/')->with('success', 'Email berhasil diverifikasi!');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Kirim ulang link verifikasi jika belum menerima
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru telah dikirim ke email Anda!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ================== Login & Logout ==================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== Pencarian ==================
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/hasil-pencarian', [PencarianController::class, 'pencarian'])->name('pencarian.hasil');

// ================== Peminjaman ==================
Route::get('/pinjam-buku', [PeminjamanController::class, 'form'])
    ->middleware(['auth', 'verified']) // hanya bisa diakses oleh user login & verifikasi
    ->name('peminjaman.form');

Route::post('/pinjam-buku', [PeminjamanController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('peminjaman.store');

Route::get('/peminjaman-saya', [PeminjamanController::class, 'riwayat'])
    ->middleware(['auth', 'verified'])
    ->name('peminjaman.riwayat');
