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
                                Data Pengumpulan: {{ $namakelas->first()->nama_kelas }}
                            </h2>
                        </div>
                        <div class="col-auto ms-auto">
                            <a href="{{ route('tugas', ['id_kelas' => $id]) }}" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="row">
                        @foreach($kumpul as $k)
                            <div class="col-md-4">
                                <div class="tugas-card">
                                    <div class="tugas-header">
                                        <div>
                                            <h3>Nama Siswa: {{ $k->siswa->nama ?? 'Nama Siswa Tidak Tersedia' }}
                                                <p style="float: right">
                                                    <span class="badge bg-azure text-azure-fg ms-2">{{ $k->nilai }}</span>
                                                </p>
                                            </h3>
                                            <p>Absen: {{ $k->siswa->absen ?? 'Absen Tidak Tersedia' }}</p>
                                            <p>Tugas: {{ $k->tugas->tugas }}</p>
                                            <p>Tanggal Terkumpul: {{ $k->tgl }}</p>
                                        </div>
                                    </div>
                                    <div class="tugas-footer">
                                        <a href="{{ $k->jawaban }}" target="_blank" class="btn btn-primary">Lihat Jawaban</a>
                                        @if (session('role') == 'guru')
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nilai{{ $k->id }}">Beri Nilai</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($kumpul as $k)
        <div class="modal modal-blur fade" id="nilai{{ $k->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-success"></div>
                    <form action="{{ route('/nilai', ['id_siswa' => $k->id_siswa, 'id_kelas' => $k->id_kelas, 'id_tugas' => $k->id_tugas]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body text-center py-4">
                            <h3>Beri Nilai Jawaban Ini</h3>
                            <input type="hidden" name="id_tugas" value="{{ $k->id_tugas }}">
                            <input type="hidden" name="id_kelas" value="{{ $k->id_kelas }}">
                            <input type="hidden" name="id_siswa" value="{{ $k->id_siswa }}">
                            <input type="hidden" name="id_mapel" value="{{ $k->id_mapel }}">
                            <input type="hidden" name="id_guru" value="{{ $k->id_guru }}">
                            <input type="hidden" name="tgl" value="{{ $k->tanggal }}">
                            <input type="hidden" name="jawaban" value="{{ $k->jawaban }}">
                            <input type="number" class="form-control" name="nilai">
                            <input type="hidden" name="status" value="{{ $k->status }}">
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn w-100" data-bs-dismiss="modal">Batalkan</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success w-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('demo/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('demo/dist/js/demo.min.js?1684106062') }}" defer></script>
</body>
</html>
