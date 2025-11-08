<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambahkan kolom no_hp dan alamat pada tabel users.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom baru
            $table->string('no_hp')->nullable()->after('email'); // letakkan setelah kolom email
            $table->text('alamat')->nullable()->after('no_hp');  // letakkan setelah no_hp
        });
    }

    /**
     * Batalkan migrasi ini (hapus kolom no_hp dan alamat).
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom yang sudah ditambahkan
            if (Schema::hasColumn('users', 'no_hp')) {
                $table->dropColumn('no_hp');
            }
            if (Schema::hasColumn('users', 'alamat')) {
                $table->dropColumn('alamat');
            }
        });
    }
};
