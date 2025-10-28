public function up(): void
{
    Schema::create('peminjaman', function (Blueprint $table) {
        $table->id();
        // Foreign Key ke tabel anggota
        $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade'); 
        // Foreign Key ke tabel buku
        $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade'); 

        $table->date('tanggal_pengajuan');
        $table->date('tanggal_peminjaman')->nullable(); // Tanggal konfirmasi/peminjaman resmi
        $table->date('tanggal_kembali')->nullable(); // Tanggal seharusnya kembali
        $table->enum('status', ['diajukan', 'dipinjam', 'dikembalikan', 'ditolak'])->default('diajukan');

        $table->timestamps();
    });
}