<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <?php if (Auth::check()): ?>
            <?php $user = Auth::user(); ?>
            <?php
              if ($user->avatar && file_exists(public_path('storage/avatars/' . $user->avatar))) {
                  $avatarPath = asset('storage/avatars/' . $user->avatar);
              } else {
                  $avatarPath = asset('assets/image/profile.png');
              }
            ?>
            <img src="<?= $avatarPath ?>" class="user-image rounded-circle shadow" style="width:40px;height:40px;object-fit:cover" alt="User Image"/>
            <span class="d-none d-md-inline"><?= htmlspecialchars($user->name) ?></span>
          <?php else: ?>
            <img src="{{ asset('assets/image/profile.png') }}" class="user-image rounded-circle shadow" style="width:40px;height:40px;object-fit:cover" alt="User Image"/>
            <span class="d-none d-md-inline text-primary">Anda belum memiliki akun</span>
          <?php endif; ?>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <?php if (Auth::check()): ?>
            <li class="user-header text-bg-primary">
              <img src="<?= $avatarPath ?>" class="rounded-circle shadow" style="width:90px;height:90px;object-fit:cover" alt="User Image"/>
              <p><?= htmlspecialchars($user->name) ?><br><small><?= htmlspecialchars($user->email) ?></small></p>
            </li>

            <li class="user-footer d-flex justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-bs-toggle="modal" data-bs-target="#changePhotoModal">Ubah Foto Profil</button>
              <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf
                <button type="submit" class="btn btn-default btn-flat">Sign out</button>
              </form>
            </li>

          <?php else: ?>
            <li class="user-header text-bg-secondary">
              <p>Anda belum memiliki akun<br><small>Silakan login atau daftar terlebih dahulu</small></p>
            </li>
            <li class="user-footer">
              <!-- Tombol Registrasi buka Modal -->
              <button class="btn btn-primary btn-flat" data-bs-toggle="modal" data-bs-target="#registerModal">
                Registrasi
              </button>

              <!-- Tombol Login buka Modal -->
              <button class="btn btn-success btn-flat float-end" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
              </button>
            </li>
          <?php endif; ?>
        </ul>
      </li>
    </ul>
  </div>
</nav>

            <!-- Modal Login -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4">
                  <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="loginModalLabel">Masuk ke Akun Anda</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="email_login" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email_login" name="email" placeholder="Masukkan email" required>
                      </div>
                      <div class="mb-3">
                        <label for="password_login" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password_login" name="password" placeholder="Masukkan kata sandi" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

<!-- Modal Ubah Foto Profil -->
<div class="modal fade" id="changePhotoModal" tabindex="-1" aria-labelledby="changePhotoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="changePhotoLabel">Ubah Foto Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img
            src="{{ Auth::check() && Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('assets/image/profile.png') }}"
            alt="Foto Sekarang"
            class="rounded-circle mb-3 shadow"
            style="width:100px;height:100px;object-fit:cover"
          >
          <div class="mb-3">
            <input type="file" name="avatar" class="form-control" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="registerModalLabel">Daftar Akun Baru</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email aktif" required>
          </div>
          <div class="mb-3">
          <label for="no_hp" class="form-label">Nomor HP</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP aktif" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</div>
