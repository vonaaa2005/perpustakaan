<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Profil - E-Library</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .avatar-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #ddd;
      cursor: pointer;
      transition: 0.2s;
    }
    .avatar-preview:hover {
      border-color: #007bff;
    }
  </style>
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card mx-auto shadow" style="max-width:720px;">
    <div class="card-body">
      <h4 class="mb-3 text-center">Profil Saya</h4>

      {{-- Notifikasi sukses --}}
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 text-center">
          <label class="form-label fw-bold d-block">Foto Profil</label>

          {{-- Avatar preview --}}
          <img
            id="avatarPreview"
            src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('template_backend/dist/assets/img/user-default.png') }}"
            alt="avatar"
            class="avatar-preview mb-2"
            data-bs-toggle="modal"
            data-bs-target="#avatarModal"
          >

          <input type="file" name="avatar" id="avatarInput" accept="image/*" class="form-control mt-2">
          <div class="form-text">Format: JPG, PNG, atau WebP (maks 2MB)</div>
        </div>

        <div class="text-center">
          <button class="btn btn-primary px-4">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0">
      <div class="modal-body text-center">
        <img
          id="avatarModalImg"
          src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('template_backend/dist/assets/img/user-default.png') }}"
          alt="avatar besar"
          style="width: 250px; height: 250px; border-radius: 50%; object-fit: cover;"
        >
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Preview gambar sebelum upload
  const avatarInput = document.getElementById('avatarInput');
  const avatarPreview = document.getElementById('avatarPreview');
  const avatarModalImg = document.getElementById('avatarModalImg');

  avatarInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        avatarPreview.src = e.target.result;
        avatarModalImg.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>
</body>
</html>
