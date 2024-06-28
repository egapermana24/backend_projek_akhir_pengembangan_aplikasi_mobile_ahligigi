@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Data Pemesanan</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="index.html">Pemesanan</a>
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
  <!-- Notifikasi Konfirmasi Pesanan -->
  <div class="row">
    @foreach ($pemesan as $pesan)
    <div class="col-lg-3" id="cardNotif">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="fw-semibold fs-5 mb-4">Konfirmasi Pesanan Baru</h5>
          <div class="position-relative overflow-hidden d-inline-block">
            <img src="{{ $pesan->foto_user }}" alt="" class="img-fluid mb-4 rounded-circle position-relative" width="75">
            <span class="badge rounded-pill bg-danger fs-2 position-absolute top-0 end-0 d-flex align-items-center justify-content-center" style="width: 20px; height: 20px;">1</span>
          </div>
          <h5 class="fw-semibold fs-5 mb-2">{{ $pesan->nama_user }}</h5>
          <p class="mb-3 px-xl-2">
            Layanan {{ $pesan->nama_layanan }} <br>
            Pada {{ \Carbon\Carbon::parse($pesan->tanggal_pemesanan)->format('d M Y') }}, Pukul {{ \Carbon\Carbon::parse($pesan->waktu_pemesanan)->format('H:i') }} WIB
          </p>
          @if ($pesan->metode_pembayaran != 'COD')
          <p class="mb-2">
            <a href="{{ '/bukti_pembayaran/' . $pesan->bukti_pembayaran }}" target="_blank">Detail Pemesanan</a>
          </p>
          @endif
          <div class="d-flex align-items-center justify-content-center gap-3">
            <button id="btnKonfirmasi" class="btn btn-primary">Konfirmasi</button>
            <!-- <button id="btnTerkonfirmasi" class="btn d-none btn-primary">Terkonfirmasi</button> -->
            <button id="btnTolak" class="btn btn-outline-danger">Tolak</button>
          </div>
        </div>
      </div>
    </div>
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
              <h5 class="mb-0">Menampilkan Data Pemesanan</h5>
            </div>
            <p class="card-subtitle mb-3">
              Pemesanan yang dilakukan oleh customer.
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
                  <tr>
                    <th>Nama</th>
                    <th>Layanan</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status Pemesanan</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  function getStatusBadgeColor($status)
                  {
                  switch ($status) {
                  case 'Menunggu Konfirmasi':
                  return 'bg-warning';
                  case 'Menunggu Kunjungan':
                  return 'bg-primary';
                  case 'Selesai':
                  return 'bg-success';
                  case 'Tidak Valid':
                  return 'bg-danger';
                  default:
                  return 'bg-secondary';
                  }
                  }
                  @endphp
                  @foreach ($pemesan as $pesan)
                  <tr>
                    <td>{{ $pesan->nama_user }}</td>
                    <td>{{ $pesan->nama_layanan }}</td>
                    <td>{{ $pesan->tanggal_pemesanan }} - {{ $pesan->waktu_pemesanan }}</td>
                    <td>
                      <span class="badge {{ getStatusBadgeColor($pesan->status_pemesanan) }}">
                        {{ $pesan->status_pemesanan }}
                      </span>
                    </td>
                    <td>
                      <a href="{{ asset('bukti_pembayaran/' . $pesan->bukti_pembayaran) }}" target="_blank">Detail Pemesanan</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Layanan</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status Pemesanan</th>
                    <th>Detail</th>
                  </tr>
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
<script>
  // Menggunakan Vanilla JavaScript untuk menangani perubahan kelas pada tombol
  const btnKonfirmasi = document.getElementById('btnKonfirmasi');
  const cardNotif = document.getElementById('cardNotif');

  btnKonfirmasi.addEventListener('click', function() {
    // Menampilkan tombol Terkonfirmasi dan menyembunyikan tombol Konfirmasi
    cardNotif.classList.remove('d-none');
  });

  cardNotif.addEventListener('click', function() {
    // Menampilkan tombol Konfirmasi dan menyembunyikan tombol Terkonfirmasi
    btnKonfirmasi.classList.remove('d-none');
    cardNotif.classList.add('d-none');
  });
</script>
@endsection