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
        Schema::table('peminjamen', function (Blueprint $table) {
            $table->enum('status', ['diajukan', 'dipinjam', 'dikembalikan', 'ditolak'])->default('diajukan');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjamen', function (Blueprint $table) {
            $table->dropColumn(['status', 'tanggal_pengajuan', 'tanggal_peminjaman', 'tanggal_kembali']);
        });
    }
};
