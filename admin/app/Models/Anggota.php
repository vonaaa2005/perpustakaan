<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    /**
     * Properti $fillable mendefinisikan kolom mana saja 
     * yang diizinkan untuk diisi (mass assignable) saat 
     * membuat atau memperbarui data (untuk keamanan).
     * * @var array<int, string>
     */
    protected $fillable = [
        'nama_anggota',
        'id_anggota',
        'email',
        // Tidak perlu memasukkan 'id' dan 'timestamps' di sini
    ];
    
    // Jika Anda menggunakan nama tabel 'anggota' (tunggal),
    // Anda harus menambahkan baris ini:
    // protected $table = 'anggota';

    public function peminjamen()
    {
        return $this->hasMany(Peminjaman::class, 'anggota_id');
    }
}