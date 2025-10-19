<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    // Nama tabel yang digunakan (pastikan sama dengan nama tabel di database)
    protected $table = 'peminjaman'; 

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama', 
        'judul_buku', 
        'tanggal_pinjam', 
        'tanggal_kembali',
        'status_kembali' // Tambahkan status_kembali
    ];
    
    // Konversi kolom tanggal menjadi instance Carbon agar mudah dimanipulasi
    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
    ];
}
