
<!doctype html>
<html lang="en">
  <!--begin::Head-->
    @include('layout.header')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <style>
      /* Left sidebar: change grey to blue and ensure contrast */
      .app-sidebar {
        background-color: #0d6efd !important; /* bootstrap primary blue */
        color: #ffffff !important;
      }
      .app-sidebar .brand-text,
      .app-sidebar .nav-link,
      .app-sidebar .nav-icon,
      .app-sidebar .sidebar-brand a {
        color: #ffffff !important;
      }
      .app-sidebar .nav-link.active {
        background-color: rgba(255,255,255,0.06) !important;
      }
      .app-sidebar .nav-link .nav-icon { opacity: 0.95; }
      /* Make the sidebar separators/subtle lines lighter */
      .app-sidebar .sidebar-brand { border-bottom: none; }
    </style>
    <style>
      /* stat card styling to ensure light grey background */
      .app-main .stat-card {
        background: #f5f5f7 !important;
        border: 1px solid #e6e6e6 !important;
        color: #222 !important;
      }
      .app-main .stat-card small { color: #666 !important; }
      .app-main .stat-card h4 { color: #222 !important; margin:6px 0 0 !important; }
    </style>
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <!-- left navbar links removed -->
          <!--end::Start Navbar Links-->

          <!-- left brand/logo -->
          <a class="navbar-brand d-flex align-items-center" href="#" style="gap:10px;">
            <span class="brand-text fw-bold" style="color:#0d6efd; font-weight:700;">Perpustakaan Daerah Kota Payakumbuh</span>
          </a>

          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              @auth
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img
                    src="{{ 'data:image/png;base64,'.base64_encode(file_get_contents(base_path('gambar/user.png'))) }}"
                    class="user-image rounded-circle shadow"
                    alt="User Image"
                  />
                  <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                  <!--begin::User Image-->
                  <li class="user-header text-bg-primary">
                    <img
                      src="{{ 'data:image/png;base64,'.base64_encode(file_get_contents(base_path('gambar/user.png'))) }}"
                      class="rounded-circle shadow"
                      alt="User Image"
                    />
                    <p>
                      {{ Auth::user()->name }}
                      <small>ID {{ Auth::user()->id }}</small>
                    </p>
                  </li>
                  <!--end::User Image-->
                  <!--begin::Menu Body-->
                  <li class="user-body">
                    <!--begin::Row-->
                    <div class="row">
          
                    </div>
                    <!--end::Row-->
                  </li>
                  <!--end::Menu Body-->
                  <!--begin::Menu Footer-->
                  <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                    </form>
                  </li>
                  <!--end::Menu Footer-->
                </ul>
              @else
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img
                    src="{{ 'data:image/png;base64,'.base64_encode(file_get_contents(base_path('gambar/user.png'))) }}"
                    class="user-image rounded-circle shadow"
                    alt="User Image"
                  />
                  <span class="d-none d-md-inline">Login</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                  @if ($errors->any())
                    <li class="user-header text-bg-danger p-2">
                      <p class="mb-0">Login gagal. Periksa kredensial Anda.</p>
                    </li>
                  @endif
                  <li class="user-body p-3">
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="mb-2">
                        <input type="email" name="username" class="form-control" placeholder="Username (Email)" value="{{ old('username') }}" required>
                        @error('username')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                          <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                      </div>
                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                  </li>
                </ul>
              @endauth
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <style>
              /* custom small-box blue variant (inline so it applies immediately) */
              .small-box.small-box-blue { background-color: #0d6efd !important; color: #fff !important; }
              .small-box.small-box-blue > .inner { color: #fff !important; }
              .small-box.small-box-blue .small-box-footer { background-color: rgba(255,255,255,0.08); color: #fff !important; }
              .small-box.small-box-blue .small-box-icon { color: rgba(255,255,255,0.2) !important; }
            </style>
            <div class="row">
              <div class="col-sm-6">
                <!-- page title removed -->
              </div>
              <div class="col-sm-6">
                <!-- breadcrumb removed -->
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          @yield('content')
        </div>
        <!--end::App Content-->
              </main>
              <!--end::App Main-->
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
    <script>
      // Toggle password visibility
      document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        if (togglePassword && password && toggleIcon) {
          togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
          });
        }
      });
    </script>
  </body>
  <!--end::Body-->
</html>
