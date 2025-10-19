<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Peminjaman Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h3 class="mb-4 text-center">Peminjaman Buku</h3>

    <div class="row">
      <!-- Bagian 1: Form Peminjaman Buku -->
      <div class="col-md-6">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white">
            Form Peminjaman Buku
          </div>
          <div class="card-body">
            <form action="{{ route('peminjaman.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
              </div>

              <div class="mb-3">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku">
              </div>

              <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
              </div>

              <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
              </div>

              <button type="submit" class="btn btn-success w-100">Pinjam Buku</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Bagian 2: Daftar Peminjaman Saya -->
      <div class="col-md-6">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-secondary text-white">
            Peminjaman Saya
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Judul Buku</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Devona Anandra</td>
                  <td>Belajar IoT dengan ESP32</td>
                  <td>2025-10-10</td>
                  <td>2025-10-17</td>
                  <td><span class="badge bg-success">Dipinjam</span></td>
                </tr>
                <tr>
                  <td>Devona Anandra</td>
                  <td>Pemrograman Laravel</td>
                  <td>2025-09-20</td>
                  <td>2025-09-27</td>
                  <td><span class="badge bg-danger">Dikembalikan Terlambat</span></td>
                </tr>
              </tbody>
            </table>

            <p class="mt-3 text-muted">
              <strong>Catatan:</strong><br>
              1. Lama peminjaman maksimal 7 hari.<br>
              2. Jika pengembalian buku lebih dari waktu yang ditentukan, maka akan dikenakan denda Rp.1.000,-/hari.<br>
              3. Denda juga dikenakan jika terjadi kerusakan pada buku yang dipinjam.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
