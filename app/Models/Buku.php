<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // nama tabel di database kamu
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'pengarang',
        'kategori',
        'status',
    ];
}
