<nav class="app-header navbar navbar-expand bg-body">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto">
      <!--begin::User Menu Dropdown-->
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
            <img
              src="<?= $avatarPath ?>"
              class="user-image rounded-circle shadow"
              style="width:40px;height:40px;object-fit:cover"
              alt="User Image"
            />
            <span class="d-none d-md-inline"><?= htmlspecialchars($user->name) ?></span>
          <?php else: ?>
            <img
              src="{{ asset('assets/image/profile.png') }}"
              class="user-image rounded-circle shadow"
              style="width:40px;height:40px;object-fit:cover"
              alt="User Image"
            />
            <span class="d-none d-md-inline text-primary">Anda belum memiliki akun</span>
          <?php endif; ?>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <?php if (Auth::check()): ?>
            <!--begin::User Image-->
            <li class="user-header text-bg-primary">
              <img
                src="<?= $avatarPath ?>"
                class="rounded-circle shadow"
                style="width:90px;height:90px;object-fit:cover"
                alt="User Image"
              />
              <p>
                <?= htmlspecialchars($user->name) ?><br>
                <small><?= htmlspecialchars($user->email) ?></small>
              </p>
            </li>
            <!--end::User Image-->

            <!--begin::Menu Footer-->
            <li class="user-footer d-flex justify-content-between">
              <!-- Tombol ubah foto profil -->
              <button
                type="button"
                class="btn btn-default btn-flat"
                data-bs-toggle="modal"
                data-bs-target="#changePhotoModal"
              >
                Ubah Foto Profil
              </button>

              <!-- Tombol logout -->
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-default btn-flat">
                  Sign out
                </button>
              </form>
            </li>
            <!--end::Menu Footer-->

          <?php else: ?>
            <li class="user-header text-bg-secondary">
              <p>
                Anda belum memiliki akun
                <small>Silakan login atau daftar terlebih dahulu</small>
              </p>
            </li>
            <li class="user-footer">
              <a href="{{ route('register') }}" class="btn btn-primary btn-flat">Registrasi</a>
              <a href="{{ route('login') }}" class="btn btn-success btn-flat float-end">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </li>
      <!--end::User Menu Dropdown-->
    </ul>
    <!--end::End Navbar Links-->
  </div>
  <!--end::Container-->
</nav>

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
