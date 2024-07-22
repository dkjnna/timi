@extends('template.index')
@section('isi')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Tables
            </h2>
          </div>
          <div class="col-auto ms-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Pengajar di Kelas
              </a>
        </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Nama Kelas</th>
                      <th>Nama Pengajar</th>
                      <th class="w-1"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->guru->nama }}</td>
                        <td>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                Hapus
                            </a>
                        </td>
                    </tr>
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
                                    <div class="text-muted">Apakah kamu yakin untuk menghapus data pengajar di ruang ini ini? Data yang kamu hapus tidak akan bisa dikembalikan.</div>
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
                                                <form action="{{ route('hapusruang', ['id'=>$item->id]) }}" method="post">
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
                <h5 class="modal-title">Tambah Pengajar di Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambahruang" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="id_kelas" id="id_kelas" class="form-control">
                      <option value="">pilih kelas anda</option>
                      @foreach ($kelas as $item)
                          <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                      @endforeach
                    </select>
                    <label class="form-label">Guru</label>
                    <select name="id_guru" id="id_guru" class="form-control">
                      <option value="">pilih guru anda</option>
                      @foreach ($guru as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Batalkan
                </a>
                <button type="submit" class="btn btn-primary ms-auto">Tambah Kelas</button>
              </div>
        </form>
      </div>
    </div>
</div>
@endsection
