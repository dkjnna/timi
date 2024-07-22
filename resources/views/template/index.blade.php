<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Admin-TIMI</title>
    <!-- CSS files -->
    <link href="{{ asset('demo/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('demo/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('demo/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('demo/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('demo/dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
      <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .tugas-card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #ffffff;
        }

        .tugas-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .tugas-description {
            margin-bottom: 0.5rem;
        }

        .tugas-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

    </style>
    </style>
  </head>
  <body >
    <script src="{{ asset('demo/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="{{ asset('asset/img/poto.png') }}" width="55" height="55" alt="TIMI" >
            </a>
            <p class="navbar-brand" style="font-weight: 700">Teach-Me</p>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">

            </div>

            <div class="nav-item dropdown">
              <a href="#" data-bs-toggle="modal" data-bs-target="#logout" class="nav-link d-flex lh-1 text-reset p-0" >
                <span class="avatar avatar-sm" style="background-image: url({{ asset('demo/static/avatars/user.png') }})"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Selamat Datang</div>
                  <div class="mt-1 small text-muted">{{ Session::get('nama') }}</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </header>
      @if (Session::get('role') == 'admin')
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/beranda" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Beranda
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dataguru" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Guru
                      </span>
                    </a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="/datasiswa" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Data Siswa
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/datakelas">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-table">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                            <path d="M3 10h18" />
                            <path d="M10 3v18" />
                          </svg>
                    </span>
                    <span class="nav-link-title">
                      Data Kelas
                    </span>
                  </a>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/datatugas">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Data Tugas
                    </span>
                  </a>

                </li>

                {{-- <li class="nav-item ">
                    <a class="nav-link" href="datapengumpulan">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.5 5.5l1.5 1.5l2.5 -2.5" /><path d="M3.5 11.5l1.5 1.5l2.5 -2.5" /><path d="M3.5 17.5l1.5 1.5l2.5 -2.5" /><path d="M11 6l9 0" /><path d="M11 12l9 0" /><path d="M11 18l9 0" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Pengumpulan
                      </span>
                    </a>

                </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" href="/datamateri">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Materi
                      </span>
                    </a>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/dataruangajar">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-door"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 12v.01" /><path d="M3 21h18" /><path d="M6 21v-16a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v16" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Ruang Ajar
                      </span>
                    </a>

                  </li>
              </ul>

            </div>
          </div>
        </div>
      </header>
      @else
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/beranda" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Beranda
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dataguru" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Diri
                      </span>
                    </a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="/datatugas">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Data Tugas
                    </span>
                  </a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/datamateri">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Data Materi
                      </span>
                    </a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
      @endif
      @yield('isi')
    </div>
    <div class="modal modal-blur fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Icon Peringatan -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                        <path d="M12 9v4" />
                        <path d="M12 17h.01" />
                    </svg>
                    <h3>Apa kamu yakin?</h3>
                    <div class="text-muted">Apakah kamu benar benar ingin logout?</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Tidak
                                </a>
                            </div>
                            <div class="col">
                                <a href="/logout" class="btn btn-danger w-100">Ya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">

              </ul>
            </div>

          </div>
        </div>
      </footer>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('demo/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/js/demo.min.js?1684106062') }}" defer></script>
    <!-- Libs JS -->
    <script src="{{ asset('demo/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
          var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
          });
        });
      </script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Temukan semua elemen dropdown
          var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

          // Tambahkan event listener untuk setiap elemen dropdown
          dropdownToggles.forEach(function(dropdownToggle) {
            dropdownToggle.addEventListener('click', function(event) {
              // Temukan dropdown-menu yang terkait dengan elemen ini
              var dropdownMenu = this.nextElementSibling;

              // Toggle kelas 'show' pada dropdown-menu
              dropdownMenu.classList.toggle('show');
            });
          });

          // Sembunyikan dropdown saat klik di luar dropdown
          document.addEventListener('click', function(event) {
            var dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(function(dropdownMenu) {
              // Cek apakah event target bukanlah dropdown atau dropdown-toggle
              if (!dropdownMenu.contains(event.target)) {
                // Hapus kelas 'show' dari dropdown-menu
                dropdownMenu.classList.remove('show');
              }
            });
          });
        });
      </script>


  </body>
  <script>
    // Fungsi untuk mengubah teks password menjadi titik-titik
    function maskPassword(password) {
        // Mengembalikan titik-titik sebanyak karakter password dikurangi 6, dengan menambahkan 6 karakter terakhir dari password
        return "*".repeat(Math.max(0, password.length - 6)) + password.slice(-6);
    }

    // Mengganti teks password dengan titik-titik saat dokumen dimuat
    document.addEventListener('DOMContentLoaded', function () {
        var passwordCells = document.querySelectorAll('.password-cell');
        passwordCells.forEach(function (cell) {
            cell.textContent = maskPassword(cell.textContent);
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var searchText = $('#searchInput').val().toLowerCase();

            $('tbody tr').each(function() {
                var nama = $(this).find('td[data-label="Nama"]').text().toLowerCase();
                var kode = $(this).find('td[data-label="Kode Mengajar"]').text().toLowerCase();

                if (nama.includes(searchText) || kode.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#searchButtonSiswa').click(function() {
            var searchText = $('#searchInputSiswa').val().toLowerCase();

            $('tbody tr').each(function() {
                var nama = $(this).find('td[data-label="Nama"]').text().toLowerCase();
                var nisn = $(this).find('td[data-label="NISN"]').text().toLowerCase();
                var kelas = $(this).find('td[data-label="Kelas"]').text().toLowerCase();

                if (nama.includes(searchText) || nisn.includes(searchText) || kelas.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
</html>
