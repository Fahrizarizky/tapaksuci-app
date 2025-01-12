        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark shadow-lg accordion fixed-top" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center ps-3 py-3" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('logotapaksuci.png') }}" alt="Logo" class="img-fluid" style="width: 40px; height: auto;">
                </div>
                <div class="ms-3">
                    <span class="text-white fw-bold">Hai, Admin</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span></a>
            </li>

            @if(auth()->user()->status == true)
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/cabang-latihan">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Cabang Latihan</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endif

            @can('adminpimda')
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/tingkatan">
                    <i class="bi bi-reception-4"></i>
                    <span>Tingkatan</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endcan

            @if(auth()->user()->status == true)
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/anggota">
                    <i class="bi bi-people-fill"></i>
                    <span>Anggota</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endif

            @can('adminpimda')
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/admincabang">
                    <i class="bi bi-people-fill"></i>
                    <span>Admin Cabang</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endcan

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/logout">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>