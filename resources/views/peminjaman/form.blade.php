<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Peminjaman Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center mb-4">Form Peminjaman Buku</h3>

  <div class="card shadow-sm">
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Peminjam</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
        </div>

        <div class="mb-3">
          <label for="judul_buku" class="form-label">Judul Buku</label>
          <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku" required>
        </div>

        <div class="mb-3">
          <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
          <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>

        <div class="mb-3">
          <label for="tanggal_kembali" class="form-label">Tanggal Kembali (otomatis 7 hari setelah pinjam)</label>
          <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" readonly>
        </div>

        <button type="submit" class="btn btn-success w-100">Simpan Peminjaman</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('tanggal_pinjam').addEventListener('change', function() {
    const tanggalPinjam = new Date(this.value);
    if (!isNaN(tanggalPinjam)) {
      tanggalPinjam.setDate(tanggalPinjam.getDate() + 7);
      const tanggalKembali = tanggalPinjam.toISOString().split('T')[0];
      document.getElementById('tanggal_kembali').value = tanggalKembali;
    }
  });
</script>

</body>
</html>
