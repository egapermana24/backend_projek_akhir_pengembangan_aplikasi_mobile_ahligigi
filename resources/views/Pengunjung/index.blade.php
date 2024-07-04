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
  <!-- Notifikasi Konfirmasi Pengunjung -->
  <div class="row">
    @foreach ($pengunjung as $kunjung)
    @php
    $isDoctorForThisKunjungan = false;

    if (Auth::check()) {
    $user = Auth::user();

    // Cek apakah pengguna adalah admin
    $isAdmin = $user->role == 'admin';

    // Cek apakah pengguna adalah dokter yang sesuai dengan id_dokter
    if ($user->role == 'dokter' && $user->dokter && $user->dokter->id_dokter == $kunjung->id_dokter) {
    $isDoctorForThisKunjungan = true;
    }

    // Cek apakah pengguna adalah user yang sesuai dengan id_user
    $isUserForThisKunjungan = $user->id_user == $kunjung->id_user;
    }
    @endphp
    @if ($isAdmin || $isDoctorForThisKunjungan || $isUserForThisKunjungan)
    <!-- Konten yang ingin ditampilkan jika kondisinya terpenuhi -->


    @if ($kunjung->status_pemesanan == 'Selesai' && (is_null($kunjung->hasil_analisa) || $kunjung->hasil_analisa == ''))
    <div class="col-lg-3 col-md-4 col-sm-6" id="cardNotif">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="fw-semibold fs-5 mb-4">Analisa Pasien</h5>
          <div class="position-relative overflow-hidden d-inline-block">
            @if($kunjung->id_pengunjung != null)
            <img src="{{ $kunjung->foto_user }}" alt="" class="img-fluid mb-4 rounded-circle position-relative" width="75">
            @else
            <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid mb-4 rounded-circle position-relative" width="75">
            @endif
            <span class="badge rounded-pill bg-danger fs-2 position-absolute top-0 end-0 d-flex align-items-center justify-content-center" style="width: 20px; height: 20px;">1</span>
          </div>
          <h5 class="fw-semibold fs-5 mb-2">{{ $kunjung->nama_user }}</h5>
          <p class="mb-3 px-xl-2">
            Layanan {{ $kunjung->nama_layanan }} <br>
            Pada {{ \Carbon\Carbon::parse($kunjung->tanggal_pemesanan)->format('d M Y') }}, Pukul {{ \Carbon\Carbon::parse($kunjung->waktu_pemesanan)->format('H:i') }} WIB
          </p>
          <div class="d-flex align-items-center justify-content-center gap-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md{{ $kunjung->id_pengunjung }}">
              Input Analisa
            </button>
          </div>
          <div id="bs-example-modal-md{{ $kunjung->id_pengunjung }}" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md{{ $kunjung->id_pengunjung }}-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                  <h4 class="modal-title" id="bs-example-modal-md{{ $kunjung->id_pengunjung }}-label">
                    Input Analisa dan Saran Layanan {{ $kunjung->nama_layanan }}
                  </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/pemesanan-update/{{ $kunjung->id_pemesanan }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="hasil_analisa{{ $kunjung->id_pengunjung }}" class="form-label">Hasil Analisa</label>
                      <textarea class="form-control" id="hasil_analisa{{ $kunjung->id_pengunjung }}" name="hasil_analisa" rows="4" required>{{ $kunjung->hasil_analisa }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="saran_layanan{{ $kunjung->id_pengunjung }}" class="form-label">Saran Layanan</label>
                      <select class="form-select" id="saran_layanan{{ $kunjung->id_pengunjung }}" name="saran_layanan">
                        <option value="" {{ is_null($kunjung->saran_layanan) ? 'selected' : '' }}>Tidak Ada</option>
                        @foreach($layanan as $l)
                        <option value="{{ $l->nama_layanan }}" {{ $kunjung->saran_layanan == $l->id_layanan ? 'selected' : '' }}>
                          {{ $l->nama_layanan }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
                        Batalkan
                      </button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @endif
    @endforeach
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
            <!-- hanya admin -->
            @if (Auth::user()->role == 'admin')
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
            @endif
            <div class="table-responsive">
              <table id="scroll_hor" class="table border table-striped table-bordered display nowrap" style="width: 100%">
                <thead>
                  <!-- start row -->
                  <tr>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Saran Layanan</th>
                    <th>Hasil Analisa</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  <!-- Andi -->
                  @foreach ($pengunjung as $kunjung)
                  <tr>
                    @if (Auth::user()->role == 'admin')
                    <td class="text-nowrap text-center">
                      <a href="/pengunjung-edit/{{ $kunjung->id_pengunjung }}" class="btn btn-warning btn-sm">Edit</a>
                      <!-- Button trigger modal -->
                      <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $kunjung->id_pengunjung }}">Delete</a>

                      <!-- Modal -->
                      <div class="modal fade" id="deleteModal{{ $kunjung->id_pengunjung }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $kunjung->id_pengunjung }}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteModalLabel{{ $kunjung->id_pengunjung }}">Konfirmasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Apakah yakin ingin menghapus {{ $kunjung->nama_user }} ? <br>
                              {{ $kunjung->nama_user }} akan dihapus secara permanen dari database.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <form action="/user-delete/{{ $kunjung->id_pengunjung }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    @endif
                    <td class="text-center">
                      @if($kunjung->foto_user != null)
                      <img src="{{ $kunjung->foto_user }}" class="rounded-circle" width="40" height="40" alt="Foto {{ $kunjung->nama_user }}">
                      @else
                      <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="Foto User">
                      @endif
                    </td>
                    <td>{{ $kunjung->nama_user }}</td>
                    <td>{{ $kunjung->jenis_kelamin }}</td>
                    <td>{{ $kunjung->email }}</td>
                    <td>{{ $kunjung->no_telepon }}</td>
                    <td>{{ $kunjung->tempat_lahir }}</td>
                    <td>{{ $kunjung->tanggal_lahir }}</td>
                    <td>{{ $kunjung->alamat }}</td>
                    <td>{{ $kunjung->saran_layanan }}</td>
                    <td>{{ $kunjung->hasil_analisa }}</td>
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