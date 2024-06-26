@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Pengguna</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Pengguna Aplikasi</a>
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
              <h5 class="mb-0">Menampilkan Data Pengguna</h5>
            </div>
            <p class="card-subtitle mb-3">
              Pengguna yang memakai Sistem Casadienta Dental Clinic.
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
                <a href="/add-user" type="button" class="btn btn-secondary">
                  <i class="ti ti-plus fs-4"></i>
                </a>
              </div>
            </div>
            <div class="table-responsive">
              <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                <thead>
                  <!-- start row -->
                  <tr>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Level</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  <tr>
                    <!-- buatkan data dummynya dengan nama orang indonesia -->
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                    </td>
                    <td>Andi</td>
                    <td>Andi123</td>
                    <td>Resepsionis</td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-2.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                    </td>
                    <td>Budi</td>
                    <td>Budi123</td>
                    <td>Dokter</td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-3.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                    </td>
                    <td>Caca</td>
                    <td>Caca123</td>
                    <td>Resepsionis</td>
                  </tr>
                  <!-- end row -->
                </tbody>
                <tfoot>
                  <!-- start row -->
                  <tr>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Level</th>
                  </tr>
                  <!-- end row -->
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