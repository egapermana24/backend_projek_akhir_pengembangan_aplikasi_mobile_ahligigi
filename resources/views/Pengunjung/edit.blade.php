@extends('layout.main')

@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Edit Data Pengunjung</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted" href="/pengunjung">Pengunjung</a>
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
  
  <form action="/pengunjung-update/{{ $pengunjung->id_google }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Informasi Pengunjung</h5>
          </div>
          <div class="card-body p-4">
            <div class="mb-4">
              <label for="nama_user" class="form-label fw-semibold">Nama Pengunjung</label>
              <div class="input-group border rounded-1">
                <input type="text" name="nama_user" class="form-control" value="{{ $pengunjung->user->nama_user }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
              <div class="input-group border rounded-1">
                <select name="jenis_kelamin" class="form-control" required>
                  <option value="laki-laki" {{ $pengunjung->user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                  <option value="perempuan" {{ $pengunjung->user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <label for="no_telepon" class="form-label fw-semibold">Nomor Telepon</label>
              <div class="input-group border rounded-1">
                <input type="text" name="no_telepon" class="form-control" value="{{ $pengunjung->no_telepon }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="tempat_lahir" class="form-label fw-semibold">Tempat Lahir</label>
              <div class="input-group border rounded-1">
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $pengunjung->tempat_lahir }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
              <div class="input-group border rounded-1">
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pengunjung->tanggal_lahir }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="alamat" class="form-label fw-semibold">Alamat</label>
              <div class="input-group border rounded-1">
                <textarea name="alamat" class="form-control" rows="3" required>{{ $pengunjung->alamat }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Edit Inputan Dokter</h5>
          </div>
          <div class="card-body p-4">
            <div class="mb-4">
              <label for="hasil_analisa" class="form-label fw-semibold">Hasil Analisa</label>
              <div class="input-group border rounded-1">
                <textarea name="hasil_analisa" class="form-control" rows="3" required>{{ $pengunjung->hasil_analisa }}</textarea>
              </div>
            </div>
            <div class="mb-4">
              <label for="saran_layanan" class="form-label fw-semibold">Saran Layanan</label>
              <div class="input-group border rounded-1">
                <textarea name="saran_layanan" class="form-control" rows="3" required>{{ $pengunjung->saran_layanan }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body p-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
            <a href="/pengunjung" class="btn btn-danger rounded-pill mx-2">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
