<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            // Kolom dari data yang Anda simpan di store()
            $table->string('nama'); 
            $table->string('judul_buku'); 
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali'); 
            
            // Kolom status untuk menandai apakah buku sudah dikembalikan atau belum
            $table->enum('status_kembali', ['Dipinjam', 'Selesai'])->default('Dipinjam');

            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
