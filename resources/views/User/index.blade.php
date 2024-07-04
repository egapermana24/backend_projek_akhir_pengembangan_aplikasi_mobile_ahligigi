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
              <table id="scroll_hor" class="table border table-striped table-bordered display nowrap" style="width: 100%">
                <thead>
                  <!-- start row -->
                  <tr>
                    <th>Aksi</th>
                    <th class="text-center">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Level/Role</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  @foreach ($pengguna as $user)
                  <tr>
                    <td class="text-nowrap text-center">
                      <a href="/user-edit/{{ $user->id_user }}" class="btn btn-warning btn-sm">Edit</a>
                      <!-- Button trigger modal -->
                      <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id_user }}">Delete</a>

                      <!-- Modal -->
                      <div class="modal fade" id="deleteModal{{ $user->id_user }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id_user }}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteModalLabel{{ $user->id_user }}">Konfirmasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Apakah yakin ingin menghapus {{ $user->nama_user }} ? <br>
                              {{ $user->nama_user }} akan dihapus secara permanen dari database.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <form action="/user-delete/{{ $user->id_user }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <!-- Dummy data for doctors -->
                    <td class="text-center">
                      @if($user->role == 'dokter')
                      <img src="{{ asset('resources/assets/images/' . $user->foto_user) }}" class="rounded-circle" width="40" height="40" alt="Foto {{ $user->nama_user }}">
                      @elseif($user->role == 'pengunjung')
                      <img src="{{ $user->foto_user }}" class="rounded-circle" width="40" height="40" alt="Foto {{ $user->nama_user }}">
                      @else
                      <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" alt="Foto User">
                      @endif
                    </td>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
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