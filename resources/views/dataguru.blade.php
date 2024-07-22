@extends('template.index')
@section('isi')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Data Akun Guru
            </h2>
          </div>
          @if (Session::get('role')=='admin')
          <div class="col-auto ms-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Akun Baru
              </a>
        </div>
        @endif
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
            @if (Session::get('role')=='admin')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Cari berdasarkan nama atau kode mengajar">
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" id="searchButton">Cari</button>
                </div>
            </div>
            @endif
          <div class="col-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    {{-- table table-vcenter table-mobile-md card-table --}}
                    {{-- table table-vcenter card-table --}}
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Kode Mengajar</th>
                      <th>Email</th>
                      <th>Nomor Telepon</th>
                      {{-- <th>Password</th> --}}
                      <th class="w-1"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td data-label="Nama">{{ $item->nama }}</td>
                        <td data-label="Kode Mengajar">{{ $item->kode }}</td>
                        <td data-label="Email">{{ $item->email }}</td>
                        <td data-label="Nomor Telepon">{{ $item->notlp }}</td>
                        {{-- <td data-label="Password">{{ substr($item->password, 0, 6) . str_repeat('*', max(0, strlen($item->password) - 6)) }}</td> --}}
                        <td>
                            <div class="btn-list flex-nowarp">
                                @if (Session::get('role') == 'admin')
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                    Edit
                                </a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                    Hapus
                                </a>
                                @else
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                    Edit
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal modal-blur fade" id="hapus{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <div class="text-muted">Apakah kamu yakin untuk menghapus data guru ini? Data yang kamu hapus tidak akan bisa dikembalikan.</div>
                                </div>
                                <div class="modal-footer">
                                    <div class="w-100">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                    Batalkan
                                                </a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('hapusguru', ['id' => $item->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- modal edit --}}
                    <div class="modal modal-blur fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Akun</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('updateguru', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" readonly>
                                            <label class="form-label">Kode</label>
                                            <input type="number" class="form-control" name="kode" value="{{ $item->kode }}">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $item->email }}">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="nomor" value="{{ $item->notlp }}" readonly>
                                            <label class="form-label">Password</label>
                                            <input type="text" class="form-control" name="password" value="{{ $item->password }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batalkan</a>
                                        <button type="submit" class="btn btn-primary ms-auto">Edit Akun</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>



{{-- modal tambah --}}
<div class="modal modal-blur fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Akun Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambahguru" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                  <label class="form-label">Kode</label>
                  <input type="number" class="form-control" name="kode" placeholder="Masukkan Kode Mengajar">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Masukkan email anda">
                  <label class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" name="nomor" placeholder="Nomor telepon anda">
                  <label class="form-label">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Masukkan Password Admin">
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

@endsection
