@extends('layout.main')

@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Edit Data Dokter</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted" href="/dokter">Dokter</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">Edit Data</li>
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

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Ooops!!</strong> There were some problem with your input. <br><br>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/dokter-update/{{ $dokter->id_dokter }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Informasi Dokter</h5>
          </div>
          <div class="card-body p-4">
            <div class="mb-4">
              <label for="id_user" class="form-label fw-semibold">Nama Pengguna (Dokter)</label>
              <div class="input-group border rounded-1">
                <input type="text" name="nama_user" class="form-control" value="{{ $dokter->user->nama_user }}" disabled>
                <input type="hidden" name="id_user" value="{{ $dokter->id_user }}">
              </div>
            </div>
            <div class="mb-4">
              <label for="pengalaman" class="form-label fw-semibold">Pengalaman (dalam tahun)</label>
              <div class="input-group border rounded-1">
                <input type="number" name="pengalaman" class="form-control" value="{{ $dokter->pengalaman }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
              <div class="input-group border rounded-1">
                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $dokter->deskripsi }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body p-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
            <a href="/dokter" class="btn btn-danger rounded-pill mx-2">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection