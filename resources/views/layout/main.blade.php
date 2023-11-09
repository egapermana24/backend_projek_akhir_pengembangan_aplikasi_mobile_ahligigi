@extends('layout.base')

@section('body')

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('layout.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      @include('layout.head')
      @yield('content')
    </div>
    @include('layout.topbar')
  </div>
  <!--  Import Js Files -->
  <script src="{{ asset('resources/dist/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('resources/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('resources/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--  core files -->
  <script src="{{ asset('resources/dist/js/app.min.js') }}"></script>
  <script src="{{ asset('resources/dist/js/app.init.js') }}"></script>
  <script src="{{ asset('resources/dist/js/app-style-switcher.js') }}"></script>
  <script src="{{ asset('resources/dist/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('resources/dist/js/custom.js') }}"></script>
  <!--  current page js files -->
  <script src="{{ asset('resources/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('resources/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('resources/dist/js/dashboard.js') }}"></script>
  @yield('script')
</body>
@endsection