@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Kategori</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Kategori</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
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
  <div class="row">
    <div class="col-lg-5">
      <div class="card">
        <div class="px-4 py-3 border-bottom">
          <h5 class="card-title fw-semibold mb-0">Tambah Kategori Pelayanan</h5>
        </div>
        <div class="card-body p-4">
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label fw-semibold">Kategori</label>
            <div class="input-group border rounded-1">
              <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-layout-grid fs-6"></i></span>
              <input type="text" class="form-control border-0 ps-2" placeholder="John Deo">
            </div>
          </div>
        </div>
        <div class="card-body p-4 d-flex justify-content-center">
          <button class="btn btn-primary rounded-pill">Submit</button>
          <a href="pelayanan" class="btn btn-danger rounded-pill mx-2">Back</a>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card">
        <div class="border-bottom title-part-padding">
          <h4 class="card-title fw-semibold mb-0">Menampilkan Kategori Pelayanan</h4>
        </div>
        <div class="table-responsive">
          <div class="card-body">
            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
              <thead>
                <!-- start row -->
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                <!-- end row -->
              </thead>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                </tr>
                <!-- end row -->
              </tbody>
              <tfoot>
                <!-- start row -->
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                <!-- end row -->
              </tfoot>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection