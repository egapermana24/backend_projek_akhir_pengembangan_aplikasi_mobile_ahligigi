@extends('layout.main')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Profil Anda</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted " href="#">{{ ucfirst($user->role) }}
                  Casadienta Dental</a>
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
  <div class="card overflow-hidden">
    <div class="card-body p-0">
      <img src="{{ asset('resources/dist/images/backgrounds/profilebg.jpg') }}" alt="" class="img-fluid">
      <div class="row align-items-center">
        <div class="col-lg-4 order-lg-1 order-2">
          <div class="d-flex align-items-center justify-content-around m-4">
            <!-- <div class="text-center">
              <i class="ti ti-file-description fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">938</h4>
              <p class="mb-0 fs-4">Posts</p>
            </div>
            <div class="text-center">
              <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
              <p class="mb-0 fs-4">Followers</p>
            </div>
            <div class="text-center">
              <i class="ti ti-user-check fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
              <p class="mb-0 fs-4">Following</p>
            </div> -->
          </div>
        </div>
        <div class="col-lg-4 mt-n3 order-lg-2 order-1">
          <div class="mt-n5">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;" ;>
                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;" ;>
                  @if($user->role == 'dokter')
                  <img src="{{ asset('resources/assets/images/' . $user->foto_user) }}" alt="" class="w-100 h-100">
                  @elseif($user->role == 'pengunjung')
                  <img src="{{ $user->foto_user }}" alt="" class="w-100 h-100">
                  @else
                  <img src="{{ asset('resources/dist/images/profile/user-1.jpg') }}" alt="" class="w-100 h-100">
                  @endif
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="fs-5 mb-0 fw-semibold">{{ $user->nama_user }}</h5>
              <p class="mb-0 fs-4">{{ $user->role }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-last">
          <!-- <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
            <li class="position-relative">
              <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle" href="javascript:void(0)" width="30" height="30">
                <i class="ti ti-brand-facebook"></i>
              </a>
            </li>
            <li class="position-relative">
              <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                <i class="ti ti-brand-twitter"></i>
              </a>
            </li>
            <li class="position-relative">
              <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                <i class="ti ti-brand-dribbble"></i>
              </a>
            </li>
            <li class="position-relative">
              <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                <i class="ti ti-brand-youtube"></i>
              </a>
            </li>
            <li><button class="btn btn-primary">Add To Story</button></li>
          </ul> -->
        </div>
      </div>
      <ul class="nav nav-pills user-profile-tab justify-content-center mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
            <i class="ti ti-user-circle me-2 fs-6"></i>
            <span class="d-none d-md-block">Profile</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      <div class="row">
        <div class="col-lg-6">
          <div class="card shadow-none border">
            <div class="card-body">
              <h4 class="fw-semibold mb-3">Tentang Anda</h4>
              <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center gap-3 mb-4">
                  <i class="ti ti-mail text-dark fs-6"></i>
                  <h6 class="fs-4 fw-semibold mb-0">{{ $user->email }}</h6>
                </li>
                <li class="d-flex align-items-center gap-3 mb-4">
                  <i class="ti ti-users text-dark fs-6"></i>
                  <h6 class="fs-4 fw-semibold mb-0">{{ $user->jenis_kelamin }}</h6>
                </li>
                @if ($user->role == 'dokter')
                <li class="d-flex align-items-center gap-3 mb-4">
                  <i class="ti ti-briefcase text-dark fs-6"></i>
                  <h6 class="fs-4 fw-semibold mb-0">{{ $user->pengalaman }} Tahun</h6>
                </li>
                <li class="d-flex align-items-center gap-3 mb-2">
                  <h6 class="fs-4 fw-light mb-0">{{ $user->deskripsi }}</h6>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection