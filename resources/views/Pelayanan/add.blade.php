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
    <div class="col-lg-6">
      <div class="card">
        <div class="px-4 py-3 border-bottom">
          <h5 class="card-title fw-semibold mb-0">Informasi Pelayanan</h5>
        </div>
        <div class="card-body p-4">
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label fw-semibold">Name</label>
            <div class="input-group border rounded-1">
              <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-user fs-6"></i></span>
              <input type="text" class="form-control border-0 ps-2" placeholder="John Deo">
            </div>
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label fw-semibold">Company</label>
            <div class="input-group border rounded-1">
              <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-building-arch fs-6"></i></span>
              <input type="text" class="form-control border-0 ps-2" placeholder="ACME Inc.">
            </div>
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
            <div class="input-group border rounded-1">
              <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-mail fs-6"></i></span>
              <input type="text" class="form-control border-0 ps-2" placeholder="John Deo">
            </div>
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label fw-semibold">Message</label>
            <div class="input-group border rounded-1">
              <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-message-2 fs-6"></i></span>
              <textarea class="form-control summernote p-7 border-0 ps-2" name="" id="" cols="20" rows="1" placeholder="Hi, Do you  have a moment to talk Jeo ?"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="border-bottom title-part-padding">
          <h4 class="card-title fw-semibold mb-0">Upload Gambar Pelayanan</h4>
        </div>
        <div class="card-body">
          <h6 class="card-subtitle mb-3">
            Pilih Gambar Pelayanan Yang akan diperlihatkan kepada user.
          </h6>
          <form action="#" class="dropzone">
            <div class="fallback">
              <input name="file" type="file" />
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-body p-4 d-flex justify-content-center">
          <button class="btn btn-primary rounded-pill">Submit</button>
          <a href="pelayanan" class="btn btn-danger rounded-pill mx-2">Back</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection