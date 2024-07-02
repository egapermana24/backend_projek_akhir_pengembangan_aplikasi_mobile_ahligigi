@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Dokter</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Dokter Klinik</a>
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
              <h5 class="mb-0">Menampilkan Data Dokter</h5>
            </div>
            <p class="card-subtitle mb-3">
              Dokter yang bekerja di Casadienta Dental Clinic.
            </p>
            <div class="btn-toolbar justify-content-start" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary">
                  <i class="ti ti-printer fs-4"></i>
                </button>
                <button type="button" class="btn btn-secondary">
                  <i class="ti ti-trash fs-4"></i>
                </button>
                <button type="button" class="btn btn-secondary">
                  <i class="ti ti-device-floppy fs-4"></i>
                </button>
                <a href="/add-doctor" type="button" class="btn btn-secondary">
                  <i class="ti ti-plus fs-4"></i>
                </a>
              </div>
            </div>
            <div class="table-responsive">
              <table id="scroll_hor" class="table border table-striped table-bordered display nowrap" style="width: 100%">
                <thead>
                  <!-- start row -->
                  <tr>
                    <th>Aksi</th>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Pengalaman (dalam tahun)</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  @foreach ($dokter as $dr)
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                      <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <!-- Dummy data for doctors -->
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="Foto Dokter Andi">
                    </td>
                    <td>{{ $dr->nama_user }}</td>
                    <td>{{ $dr->email }}</td>
                    <td>{{ $dr->jenis_kelamin }}</td>
                    <td>{{ $dr->pengalaman }}</td>
                  </tr>
                  @endforeach
                  <!-- end row -->
                </tbody>
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