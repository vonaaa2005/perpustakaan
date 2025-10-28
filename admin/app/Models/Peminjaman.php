<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';

    protected $fillable = [
        'anggota_id',
        'buku_id',
        'tanggal_pengajuan',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
