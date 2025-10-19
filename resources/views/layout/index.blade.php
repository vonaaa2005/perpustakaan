
<!doctype html>
<html lang="en">
  <!--begin::Head-->
    @include('layout.header')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
    @include('layout.navbar')
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" background-color:#e3f0ff>
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('assets/image/logobuku.png')}}"
              alt="logobuku"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">E-library</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="navigation"
          aria-label="Main navigation"
          data-accordion="false"
          id="navigation"
        >

          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Pencarian -->
          <li class="nav-item">
            <a href="{{ route('pencarian.index') }}" class="nav-link">
              <i class="nav-icon bi bi-search"></i>
              <p>Pencarian</p>
            </a>
          </li>

          <!-- Peminjaman -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu-peminjaman" aria-expanded="false" aria-controls="submenu-peminjaman">
              <i class="nav-icon bi bi-book"></i>
              <p>Peminjaman</p>
              <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <!-- Submenu -->
            <ul class="collapse list-unstyled ps-3" id="submenu-peminjaman">
              <li class="nav-item">
                <a href="{{ route('peminjaman.form') }}" class="nav-link">
                  <i class="bi bi-plus-circle nav-icon"></i>
                  <p>Pinjam Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('peminjaman.riwayat') }}" class="nav-link">
                  <i class="bi bi-clock-history nav-icon"></i>
                  <p>Peminjaman Saya</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
        <!--end::Sidebar Menu-->

        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
              <!--begin::Small Box Widget 3-->
              <div class="small-box text-bg-primary" data-bs-toggle="modal" data-bs-target="#registerModal" style="cursor: pointer;">
                <div class="inner text-light">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <svg
                  class="small-box-icon"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true"
                >
                  <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                  ></path>
                </svg>
                <div class="small-box-footer text-light text-decoration-none fw-semibold">
                  Klik untuk registrasi <i class="bi bi-person-plus"></i>
                </div>
              </div>
              <!--end::Small Box Widget 3-->

              <!-- ========== MODAL FORM REGISTRASI (WARNA BIRU) ========== -->
              <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">

                    <!-- Header Modal -->
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title fw-bold" id="registerModalLabel">Form Registrasi User</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body Modal -->
                    <div class="modal-body bg-light">
                      <form>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat lengkap">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="nohp" class="form-label fw-semibold">No. Handphone</label>
                            <input type="text" class="form-control" id="nohp" placeholder="08xxxxxxxxxx">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="confirm_password" class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Ulangi password">
                          </div>
                        </div>

                        <div class="text-end mt-3">
                          <button type="submit" class="btn btn-primary fw-semibold px-4">
                            Daftar
                          </button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- ========== END MODAL FORM REGISTRASI ========== -->
               
              </div>
              <!--end::Col-->
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
            </div>
            <!--begin::World Book Day Section-->
            <div class="row justify-content-center" style="margin-top:3px;">
              <div class="col-md-10">
                <div style="background:#e3f0ff; border-radius:20px; padding:40px; display:flex; flex-wrap:wrap; align-items:center;">
                  <div style="flex:1; min-width:250px;">
                    <h2 style="color:#2a3990; font-family:'Comic Sans MS', cursive, sans-serif; font-size:2.5rem; font-weight:bold;">World<br>Book Day</h2>
                    <p style="font-family:'Comic Sans MS', cursive, sans-serif; font-size:1.2rem; color:#2a3990; margin-top:20px;">
                      "Membaca adalah perjalanan paling tenang yang membawa kita menjelajahi ribuan tempat. Di antara rak-rak buku, tersimpan petualangan tanpa akhir, karena perpustakaan bukan sekadar gudang buku, melainkan rumah yang menenangkan bagi jiwa yang selalu haus akan ilmu dan makna." ✨📚
                    </p>
                  </div>
                  <div style="flex:1; min-width:250px; text-align:center;">
                    <img src="{{ asset('assets/image/gambarbuku.png') }}" alt="World Book Day" style="max-width:100%; height:auto; border-radius:20px;">
                  </div>
                </div>
              </div>
            </div>
            <!--end::World Book Day Section-->

            <!-- Bagian Informasi Aturan Peminjaman -->
            <div style="
              background-color: #e0e0e0;
              border-radius: 10px;
              padding: 20px 30px;
              margin-top: 30px;
              color: #333;
              box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            ">
              <h5 style="display: flex; align-items: center; font-weight: 600;">
                <i class="bi bi-info-circle-fill" style="margin-right: 8px; color:#0d6efd;"></i>
                Informasi Aturan Peminjaman
              </h5>
              <ol style="margin-top: 10px; line-height: 1.7;">
                <li>Waktu peminjaman maksimal 1 minggu.</li>
                <li>Setiap anggota hanya dapat meminjam maksimal 3 buku.</li>
                <li>Jika pengembalian buku lebih dari waktu yang ditentukan, maka akan dikenakan denda <b>Rp.1.000,-/hari</b>.</li>
                <li>Jika telah meminjam buku, silakan ke tempat petugas untuk melakukan konfirmasi.</li>
                <li>Jika terlambat mengembalikan buku atau ada denda atas kerusakan buku, maka wajib langsung membayar pada petugas saat mengembalikan buku.</li>
              </ol>
            </div>

            <!--end::Row-->

            <!--begin::Row-->
                        <!-- End Contact Item -->
              <!-- /.Start col -->
                  </div>
                </div>
              </div>
              <!-- /.Start col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
    @include('layout.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('template_backend/dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <!-- OPTIONAL SCRIPTS -->

    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>

    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>

    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>

    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>

    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>

    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
