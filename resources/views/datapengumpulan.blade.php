@extends('template.index')
@section('isi')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Data Pengumpulan Tugas Tiap Kelas
            </h2>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @foreach($kelas as $kelas)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$kelas->nama_kelas}}</h5>
                            <a href="{{ route('pengumpulankelas', ['id_kelas' => $kelas->id]) }}" class="btn btn-primary">Lihat Tugas dan Jawaban</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
