@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Pelayanan</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Pelayanan</a>
              </li>
              <!-- <li class="breadcrumb-item" aria-current="page">
                Table-Bootstrap
              </li> -->
            </ol>
          </nav>
        </div>
        <div class="col-3">
          <div class="text-center mb-n5">
            <img src="{{ asset('resources/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="datatables">
    <!-- basic table -->
    <div class="row">
      <div class="col-12">
        <!-- ---------------------
                                    start Zero Configuration
                                ---------------- -->
        <div class="card">
          <div class="card-body">
            <div class="mb-2">
              <h5 class="mb-0">Menampilkan Data Pelayanan</h5>
            </div>
            <p class="card-subtitle mb-3">
              Pelayanan yang akan disediakan untuk customer.
            </p>
            <div class="btn-toolbar justify-content-start" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary">
                  <i class="ti ti-printer fs-4"></i>
                </button>
                <button type="button" class="btn btn-secondary">
                  <i class="ti ti-trash fs-4"></i>
                </button>
                <a href="add-kategori" type="button" class="btn btn-secondary">
                  <i class="ti ti-layout-grid fs-4"></i>
                </a>
                <a href="/add-pelayanan" type="button" class="btn btn-secondary">
                  <i class="ti ti-plus fs-4"></i>
                </a>
              </div>
            </div>
            <div class="table-responsive">
              <table id="zero_config" class="table border table-bordered">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Layanan</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($layanan as $l)
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="{{ route('pelayanan.edit',$l->id_layanan) }}" class="btn btn-warning btn-sm">Edit</a>
                      <a href="{{ route('pelayanan.destroy', $l->id_layanan) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <td>{{ $l->nama_layanan }}</td>
                    <td>{{ $l->harga }}</td>
                    <td>{{ $l->durasi }}</td>
                    <!-- <td class="text-truncate overflow-hidden" style="max-width: 100vh;">{{ $l->deskripsi }}</td> -->
                    <td class="text-center">
                      <!-- munculkan icon detail -->
                      <button class="btn me-1 mb-1 btn-light-primary text-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#{{ $l->id_layanan }}">
                        Detail
                      </button>
                    </td>
                    <div id="{{ $l->id_layanan }}" class="modal fade" tabindex="-1" aria-labelledby="{{ $l->id_layanan }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="{{ $l->id_layanan }}">
                              Detail
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>
                              {{ $l->nama_layanan }}
                            </h4>
                            <p>
                              {{ $l->deskripsi }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
                              Close
                            </button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Layanan</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Deskripsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>

          </div>
        </div>
        <!-- ---------------------end Zero Configuration---------------- -->
      </div>
    </div>
  </section>
</div>
@endsection