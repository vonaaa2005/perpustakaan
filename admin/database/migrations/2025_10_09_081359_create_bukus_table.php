<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_buku', 150); // Nama Buku
            $table->string('penulis', 100); // Penulis
            $table->string('id_buku', 10)->unique(); // ID Buku (sesuai format '12-00')
            $table->integer('stok')->default(0); // Stok
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};