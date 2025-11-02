<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 400px;">
        <div class="card-body">
            <h4 class="text-center mb-4">Login</h4>

            <form action="<?= route('login.post') ?>" method="POST">
                <input type="hidden" name="_token" value="<?= csrf_token() ?>">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Masuk</button>

                <?php if (session('error')): ?>
                    <div class="alert alert-danger mt-3">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session('success')): ?>
                    <div class="alert alert-success mt-3">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
            </form>

            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="<?= route('register') ?>">Daftar</a></small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
