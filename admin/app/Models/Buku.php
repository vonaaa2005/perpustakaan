<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'nama_buku',
        'penulis',
        'id_buku',
        'stok',
    ];

    public function peminjamen()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }
}