@extends('template.index')
@section('isi')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Data Materi Kelas
            </h2>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @foreach($kelas as $materi)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            @if (Session('role') == 'guru')
                                <h5 class="card-title">{{ $materi->kelas->nama_kelas ?? 'Nama Kelas Tidak Tersedia' }}</h5>
                                <a href="{{ route('materi', ['id_kelas' => $materi->kelas->id]) }}" class="btn btn-primary">Lihat Materi</a>
                            @else
                                <h5 class="card-title">{{ $materi->nama_kelas }}</h5>
                                <a href="{{ route('materi', ['id_kelas' => $materi->id]) }}" class="btn btn-primary">Lihat Materi</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
