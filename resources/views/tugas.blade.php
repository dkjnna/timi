@extends('template.index')
@section('isi')
<script src="{{ asset('demo/dist/js/demo-theme.min.js?1684106062') }}"></script>
<div class="page">
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none bg-primary py-4"> <!-- Menambahkan padding atas dan bawah -->
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title text-white">
                            Tugas Kelas: {{ $namakelas->first()->nama_kelas }}
                        </h2>
                    </div>
                    @if (session('role') == 'guru')
                    <div class="col-auto ms-auto">
                        <a href="" class="btn btn-light" style="float: right" data-bs-toggle="modal" data-bs-target="#tambah{{ $namakelas->first()->id }}">Tambah Tugas</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    @if($tugas->isEmpty())
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('asset/img/icon-removebg-preview.png') }}" alt="None" style="width: 370px; height: auto;">
                            @if (session('role') == 'admin')
                                <p style="font-size: 24px;">Ups... Tugas tidak tersedia</p>
                            @else
                                <p style="font-size: 24px;">Ups... Anda Belum Memberikan Tugas</p>
                            @endif
                        </div>
                    @else
                        @foreach($tugas as $tugas)
                            <div class="col-md-6">
                                <div class="tugas-card">
                                    <div class="tugas-header">
                                        <div>
                                            <h5>{{ $tugas->guru->nama ?? 'Nama Guru Tidak Tersedia' }}</h5>
                                            <p>{{ $tugas->mapel->nama_mapel ?? 'Nama Mapel Tidak Tersedia' }}</p>
                                        </div>
                                        <div>
                                            <p><strong>Tanggal Diberikan:</strong> {{ $tugas->tanggal }}</p>
                                            <p><strong>Tenggat Waktu:</strong> {{ $tugas->tenggat }}</p>
                                        </div>
                                    </div>
                                    <div class="tugas-description">
                                        <p>{{ $tugas->tugas }}</p>
                                    </div>
                                    <div class="tugas-footer">
                                        <a href="{{ route('datapensis', ['id' => $tugas->kelas->id, 'id_tugas'=>$tugas->id]) }}" class="btn btn-info">Lihat Data Pengumpulan</a>
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
                <h5 class="modal-title">Tugas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('/tambahtugas', ['id'=>$namakelas->first()->id]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_kelas">
                        <input type="hidden" name="id_guru">
                        <label class="form-label">Mapel</label>
                        <select name="id_mapel" id="" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($mapel as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tanggal">
                        <label class="form-label">Tugas</label>
                        <textarea type="text" class="form-control" name="tugas" rows="10"></textarea>
                        <label class="form-label">Tenggat</label>
                        <input type="date" class="form-control" name="tenggat" >
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batalkan</a>
                    <button type="submit" class="btn btn-primary ms-auto">Tambah Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
