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
  <div class="col-lg-3">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="fw-semibold fs-5 mb-4">Konfirmasi Pesanan Baru</h5>
        <div class="position-relative overflow-hidden d-inline-block">
          <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid mb-4 rounded-circle position-relative" width="75">
          <span class="badge rounded-pill bg-danger fs-2 position-absolute top-0 end-0 d-flex align-items-center justify-content-center" style="width: 20px; height: 20px;">1</span>
        </div>
        <h5 class="fw-semibold fs-5 mb-2">Reno Pengepul Pilem</h5>
        <p class="mb-3 px-xl-2">Layanan Cabut Gigi pada Hari Sabtu, 23 Dec 2023 Pukul 14.30 WIB</p>
        <div class="d-flex align-items-center justify-content-center gap-3">
          <button class="btn btn-primary">Konfirmasi</button>
          <button class="btn btn-outline-danger">Tolak</button>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-xl-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold">Top Collectibles</h5>
        <p class="card-subtitle mb-0">The Beginner's Guide to Collectible Items</p>
        <div class="owl-carousel collectibles-carousel owl-theme mt-9">
          <div class="item">
            <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
              <div class="position-relative">
                <img src="{{ asset('resources/dist/images/nft/1.jpg') }}" class="img-fluid w-100" alt="1" />
                <div class="card-img-overlay">
                  <div class="text-end">
                    <span class="badge bg-light-dark rounded-pill fs-2">04h 09m 12s</span>
                  </div>
                </div>
              </div>
              <div class="p-9 text-start">
                <h6 class="fw-semibold fs-4">Geo Runners</h6>
                <div class="d-flex align-items-center mt-3 justify-content-between">
                  <div class="fs-3">Volume</div>
                  <h6 class="mb-0">
                    <i class="cc ETH" title="ETH"></i>
                    <span class="text-dark fw-bold">10.1</span> ETH
                  </h6>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
              <div class="position-relative">
                <img src="{{ asset('resources/dist/images/nft/5.jpg') }}" class="img-fluid w-100" alt="1" />
                <div class="card-img-overlay">
                  <div class="text-end">
                    <span class="badge bg-light-dark rounded-pill fs-2">02h 10m 30s</span>
                  </div>
                </div>
              </div>
              <div class="p-9 text-start">
                <h6 class="fw-semibold fs-4">Cube Runner</h6>
                <div class="d-flex align-items-center mt-3 justify-content-between">
                  <div class="fs-3">Volume</div>
                  <h6 class="mb-0">
                    <i class="cc ETH" title="ETH"></i>
                    <span class="text-dark fw-bold">10.1</span> ETH
                  </h6>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
              <div class="position-relative">
                <img src="{{ asset('resources/dist/images/nft/3.jpg') }}" class="img-fluid w-100" alt="1" />
                <div class="card-img-overlay">
                  <div class="text-end">
                    <span class="badge bg-light-dark rounded-pill fs-2">01h 02m 10s</span>
                  </div>
                </div>
              </div>
              <div class="p-9 text-start">
                <h6 class="ffw-semibold fs-4">Algo cube</h6>
                <div class="d-flex align-items-center mt-3 justify-content-between">
                  <div class="fs-3">Volume</div>
                  <h6 class="mb-0">
                    <i class="cc ETH" title="ETH"></i>
                    <span class="text-dark fw-bold">10.1</span> ETH
                  </h6>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
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
                  <!-- start row -->
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <!-- end row -->
                  <!-- start row -->
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <!-- end row -->
                  <!-- start row -->
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <!-- end row -->
                </tbody>
                <tfoot>
                  <!-- start row -->
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
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