@extends('template.index')
@section('isi')
<div class="page-wrapper">
    <div class="page page-center">
        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                    Dashboard Admin
                  </h2>
                </div>
              </div>
            </div>
          </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-4">
                        <a href="dataguru" class="card card-link card-link-pop">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Guru</h5>
                                <p class="card-text">{{ $data1 }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="datasiswa" class="card card-link card-link-pop">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Siswa</h5>
                                <p class="card-text">{{ $data2 }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="datakelas" class="card card-link card-link-pop">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Kelas</h5>
                                <p class="card-text">{{ $data3 }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
