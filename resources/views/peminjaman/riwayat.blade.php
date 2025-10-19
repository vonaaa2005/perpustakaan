<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Peminjaman Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center mb-4">Riwayat Peminjaman Saya</h3>

  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Devona Anandra</td>
            <td>Belajar IoT dengan ESP32</td>
            <td>2025-10-01</td>
            <td>2025-10-08</td>
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

      <div class="alert alert-secondary mt-4">
        <strong>Peraturan Peminjaman:</strong><br>
        1. Lama peminjaman maksimal 7 hari.<br>
        2. Jika pengembalian buku lebih dari waktu yang ditentukan, maka akan dikenakan denda Rp.1.000,-/hari.<br>
        3. Denda juga dikenakan jika terjadi kerusakan pada buku yang dipinjam.
      </div>
    </div>
  </div>
</div>

</body>
</html>
