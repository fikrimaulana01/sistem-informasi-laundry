<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('pelanggan-dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/logo.png') }}" alt="" width="70px" height="70px">
        </div>
        <div class="sidebar-brand-text mx-3">Fikri Laundry</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('pelanggan-dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('layanan')">
        <a class="nav-link" href="{{ route('pelanggan-data-layanan') }}" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Layanan</span>
        </a>
    </li>
    <li class="nav-item @yield('laundry') @yield('data-laundry') @yield('data-laundry-proses') @yield('data-laundry-selesai')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laundry"
            aria-expanded="true" aria-controls="laundry">
            <i class="fas fa-fw fa-file"></i>
            <span>Laundry</span>
        </a>
        <div id="laundry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pelanggan-data-laundry') }}">Data Laundry</a>
                <a class="collapse-item" href="{{ route('pelanggan-data-laundry-proses') }}">Data Laundry Proses</a>
                <a class="collapse-item" href="{{ route('pelanggan-data-laundry-selesai') }}">Data Laundry Selesai</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
