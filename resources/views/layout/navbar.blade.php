<nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">

<!--begin::End Navbar Links-->
<ul class="navbar-nav ms-auto">

              <!--begin::User Menu Dropdown-->
              <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img
                    src="{{ asset('template_backend/dist/assets/img/user2-160x160.jpg')}}"
                    class="user-image rounded-circle shadow"
                    alt="User Image"
                  />

                  <?php if (Auth::check()): ?>
                    <span class="d-none d-md-inline"><?= Auth::user()->name ?></span>
                  <?php else: ?>
                    <span class="d-none d-md-inline text-primary">Anda belum memiliki akun</span>
                  <?php endif; ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                  <?php if (Auth::check()): ?>
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                      <img
                        src="{{ asset('template_backend/dist/assets/img/user2-160x160.jpg')}}"
                        class="rounded-circle shadow"
                        alt="User Image"
                      />
                      <p>
                        <?= Auth::user()->name ?><br>
                        <small><?= Auth::user()->email ?></small>
                      </p>
                    </li>
                    <!--end::User Image-->

                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>

                    <!-- Tombol Logout -->
                    <li>
                      <form action="{{ route('logout') }}" method="POST" class="d-inline">
                          @csrf
                          <button type="submit" class="btn btn-default btn-flat float-end">
                              Sign out
                          </button>
                      </form>
                    </li>
                    <!-- end::Menu Footer -->

                  <?php else: ?>
                    <!-- Jika belum login -->
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
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
