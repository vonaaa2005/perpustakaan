<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambah kolom baru pada tabel users.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom nomor HP dan alamat
            $table->string('no_hp')->nullable()->after('email'); // setelah kolom email
            $table->text('alamat')->nullable()->after('no_hp');  // setelah kolom no_hp
        });
    }

    /**
     * Batalkan perubahan jika migrasi di-rollback.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom jika rollback dijalankan
            $table->dropColumn(['no_hp', 'alamat']);
        });
    }
};
