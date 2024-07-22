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
</head>
<body>
    <script src="{{ asset('demo/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none bg-primary py-4"> <!-- Menambahkan padding atas dan bawah -->
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title text-white">
                                Materi Kelas: {{ $namakelas->first()->nama_kelas }}
                            </h2>
                        </div>
                        @if (session('role') == 'guru')
                    <div class="col-auto ms-auto">
                        <a href="" class="btn btn-light" style="float: right" data-bs-toggle="modal" data-bs-target="#tambah{{ $namakelas->first()->id }}">Tambah Materi</a>
                    </div>
                    @endif
                        <div class="col-auto ms-auto">
                            <a href="/datamateri" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row">
                        @if($materi->isEmpty())
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('asset/img/icon-removebg-preview.png') }}" alt="None" style="width: 370px; height: auto;">
                            <p style="font-size: 24px;">Ups... Materi tidak tersedia</p>
                        </div>
                        @else
                            @foreach($materi as $materi)
                                <div class="col-md-6">
                                    <div class="tugas-card">
                                        <div class="tugas-header">
                                            <div>
                                                <h5>{{ $materi->guru->nama ?? 'Nama Guru Tidak Tersedia' }}</h5>
                                                <p>{{ $materi->mapel->nama_mapel ?? 'Nama Mapel Tidak Tersedia' }}</p>

                                            </div>
                                        </div>
                                        <div class="tugas-description">
                                            <a href="{{ $materi->materi }}" target="_blank" class="btn btn-primary">Lihat materi</a>
                                        </div>
                                        <div class="tugas-footer">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
<div class="modal modal-blur fade" id="tambah{{ $namakelas->first()->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Materi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('/tambahmateri', ['id'=>$namakelas->first()->id]) }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" name="id_kelas">
                    <input type="hidden" name="id_login">
                    <label for="">Pilih Mapel</label>
                    <select name="id_mapel" id="" class="form-control">
                        <option value=""></option>
                        @foreach ($mapel as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                        @endforeach
                    </select>
                    <label for="">Tempel Link Materi</label>
                    <input type="link" class="form-control" name="materi">
                </div>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Batalkan
                </a>
                <button type="submit" class="btn btn-primary ms-auto">Tambah Akun</button>
              </div>
        </form>
      </div>
    </div>
</div>
    </footer>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('demo/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/js/demo.min.js?1684106062') }}" defer></script>
    <!-- Libs JS -->
</body>
</html>
