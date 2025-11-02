<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - E-Library</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; padding: 30px; }
        .container { background: white; border-radius: 10px; padding: 25px; max-width: 600px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 25px; }
        .header h2 { color: #1d4ed8; font-size: 22px; margin: 0; }
        .content p { margin-bottom: 15px; line-height: 1.6; }
        .button {
            display: inline-block;
            padding: 10px 18px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .footer { font-size: 13px; color: #6b7280; margin-top: 25px; }
        .break-all { word-break: break-all; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Verifikasi Email Anda</h2>
    </div>

    <div class="content">
        <p>Halo <?= htmlspecialchars($greeting ?? 'Pengguna Baru'); ?>,</p>

        <p>Terima kasih telah mendaftar di <strong>E-Library</strong> 📚.</p>
        <p>Sebelum melanjutkan, kami perlu memastikan bahwa alamat email yang Anda daftarkan benar-benar milik Anda.</p>
        <p>Silakan klik tombol di bawah ini untuk memverifikasi email Anda dan mengaktifkan akun:</p>

        <p style="text-align: center;">
            <a href="<?= htmlspecialchars($actionUrl) ?>" class="button">Verifikasi Email</a>
        </p>

        <p>Jika Anda tidak membuat akun E-Library, abaikan saja email ini.</p>

        <p>Selamat membaca dan semoga hari Anda menyenangkan! 🌤️</p>

        <p>Salam hangat,<br><strong>Tim E-Library</strong></p>
    </div>

    <hr>

    <p class="footer">
        Jika tombol di atas tidak berfungsi, salin dan tempel tautan berikut ke peramban Anda:<br>
        <span class="break-all"><?= htmlspecialchars($actionUrl) ?></span>
    </p>
</div>

</body>
</html>
