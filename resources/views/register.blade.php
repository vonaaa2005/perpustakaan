<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 750px; margin: 0 auto;">
        <h3 class="mb-4 text-center text-primary fw-bold">Form Registrasi User</h3>

        <?php if (session('success')): ?>
            <div class="alert alert-success">
                <?= session('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors->all() as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= route('register.store'); ?>" method="POST">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
