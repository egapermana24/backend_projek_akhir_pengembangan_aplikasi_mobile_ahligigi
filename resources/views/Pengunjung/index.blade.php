@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Pengunjung</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Pengunjung Casadienta</a>
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
              <h5 class="mb-0">Menampilkan Data Pengunjung</h5>
            </div>
            <p class="card-subtitle mb-3">
              Pengunjung yang menggunakan sistem Casadienta Dental Clinic.
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
                    <th>Action</th>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  <!-- Andi -->
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                      <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="Foto Andi">
                    </td>
                    <td>Andi</td>
                    <td>andi@example.com</td>
                    <td>081234567890</td>
                    <td>Jakarta</td>
                    <td>1990-01-01</td>
                    <td>Jl. Merdeka No.1, Jakarta</td>
                  </tr>
                  <!-- Budi -->
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                      <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-2.jpg') }}" class="rounded-circle" width="40" height="40" alt="Foto Budi">
                    </td>
                    <td>Budi</td>
                    <td>budi@example.com</td>
                    <td>081234567891</td>
                    <td>Bandung</td>
                    <td>1992-02-02</td>
                    <td>Jl. Asia Afrika No.2, Bandung</td>
                  </tr>
                  <!-- Caca -->
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                      <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <td class="text-center">
                      <img src="{{ asset('resources/dist/images/profile/user-3.jpg') }}" class="rounded-circle" width="40" height="40" alt="Foto Caca">
                    </td>
                    <td>Caca</td>
                    <td>caca@example.com</td>
                    <td>081234567892</td>
                    <td>Surabaya</td>
                    <td>1994-03-03</td>
                    <td>Jl. Pahlawan No.3, Surabaya</td>
                  </tr>
                  <!-- end row -->
                </tbody>
                <tfoot>
                  <!-- start row -->
                  <tr>
                    <th>Action</th>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
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