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
  <script src="/resources/dist/libs/jquery/dist/jquery.min.js"></script>
  <script src="/resources/dist/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="/resources/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--  core files -->
  <script src="/resources/dist/js/app.min.js"></script>
  <script src="/resources/dist/js/app.init.js"></script>
  <script src="/resources/dist/js/app-style-switcher.js"></script>
  <script src="/resources/dist/js/sidebarmenu.js"></script>
  <script src="/resources/dist/js/custom.js"></script>
  <script src="/resources/dist/libs/prismjs/prism.js"></script>
  <!--  dashboard -->
  <script src="/resources/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="/resources/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/resources/dist/js/dashboard.js"></script>
  <script src="/resources/dist/js/dashboard3.js"></script>
  <!-- table -->
  <script src="/resources/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/resources/dist/js/datatable/datatable-basic.init.js"></script>
  <!-- Dropzone -->
  <script src="/resources/dist/libs/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Summernote -->
  <script src="/resources/dist/libs/summernote/dist/summernote-lite.min.js"></script>
  <script>
    /************************************/
    //default editor
    /************************************/
    $(".summernote").summernote({
      height: 350, // set editor height
      minHeight: null, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      focus: false, // set focus to editable area after initializing summernote
    });

    /************************************/
    //inline-editor
    /************************************/
    $(".inline-editor").summernote({
      airMode: true,
    });

    /************************************/
    //edit and save mode
    /************************************/
    (window.edit = function() {
      $(".click2edit").summernote();
    }),
    (window.save = function() {
      $(".click2edit").summernote("destroy");
    });

    var edit = function() {
      $(".click2edit").summernote({
        focus: true
      });
    };

    var save = function() {
      var markup = $(".click2edit").summernote("code");
      $(".click2edit").summernote("destroy");
    };

    /************************************/
    //airmode editor
    /************************************/
    $(".airmode-summer").summernote({
      airMode: true,
    });
  </script>
  @yield('script')
</body>
@endsection