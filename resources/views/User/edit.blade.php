@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Edit Data Pengguna</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted" href="/user">Pengguna</a>
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
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="/user-update/{{ $user->id_user }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Informasi Pengguna</h5>
          </div>
          <div class="card-body p-4">
            <div class="mb-4">
              <label for="nama_user" class="form-label fw-semibold">Nama Pengguna</label>
              <div class="input-group border rounded-1">
                <input type="text" name='nama_user' class="form-control" value="{{ $user->nama_user }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="email" class="form-label fw-semibold">Email</label>
              <div class="input-group border rounded-1">
                <input type="email" name='email' class="form-control" value="{{ $user->email }}" required>
              </div>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label fw-semibold">Password</label>
              <div class="input-group border rounded-1">
                <input type="password" name='password' class="form-control border-0 ps-2">
              </div>
              <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <div class="mb-4">
              <label for="role" class="form-label fw-semibold">Role</label>
              <div class="input-group border rounded-1">
                <select class="form-control" name="role" required>
                  <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="resepsionis" {{ $user->role == 'resepsionis' ? 'selected' : '' }}>Resepsionis</option>
                  <option value="dokter" {{ $user->role == 'dokter' ? 'selected' : '' }}>Dokter</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
              <div class="input-group border rounded-1">
                <select class="form-control" name="jenis_kelamin" required>
                  <option value="laki-laki" {{ $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                  <option value="perempuan" {{ $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="border-bottom title-part-padding">
            <h4 class="card-title fw-semibold mb-0">Upload Foto Pengguna</h4>
          </div>
          <div class="card-body">
            <h6 class="card-subtitle mb-3">
              Pilih Foto Pengguna yang akan diperlihatkan.
            </h6>
            <div class="fallback">
              <input name="foto_user" type="file" />
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body p-4 d-flex justify-content-center">
            <button class="btn btn-primary rounded-pill">Update</button>
            <a href="/user" class="btn btn-danger rounded-pill mx-2">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
