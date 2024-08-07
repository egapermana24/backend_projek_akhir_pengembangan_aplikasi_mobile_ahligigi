    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.html" class="text-nowrap logo-img">
            <img src="{{ asset('resources/assets/images/logo_text.png') }}" class="dark-logo" width="180" alt="" />
            <img src="{{ asset('resources/assets/images/logo.png') }}" class="light-logo" width="180" alt="" />
          </a>
          <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Informasi</span>
            </li>
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            @if ($user->role == 'admin')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/pelayanan" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Pelayanan</span>
              </a>
            </li>
            @endif
            @if ($user->role == 'admin' || $user->role == 'resepsionis')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/pemesanan" aria-expanded="false">
                <span>
                  <i class="ti ti-currency-dollar"></i>
                </span>
                <span class="hide-menu">Pemesanan</span>
              </a>
            </li>
            @endif
            @if ($user->role == 'admin' || $user->role == 'dokter')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/pengunjung" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Data Pengunjung</span>
              </a>
            </li>
            @endif
            @if ($user->role == 'admin')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dokter" aria-expanded="false">
                <span>
                  <i class="ti ti-user-heart"></i>
                </span>
                <span class="hide-menu">Data Dokter</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/user" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Pengguna Aplikasi</span>
              </a>
            </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link" href="/ulasan" aria-expanded="false">
                <span>
                  <i class="ti ti-star"></i>
                </span>
                <span class="hide-menu">Ulasan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/profil" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Profil</span>
              </a>
            </li>
            <!-- ============================= -->
            <!-- Apps -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Aksi</span>
            </li>
            <li class="sidebar-item">
              <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>

          </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="">
            </div>
            <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
              <span class="fs-2 text-dark">Designer</span>
            </div>
            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <!-- Tombol Logout -->
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </button>
          </div>
        </div>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->