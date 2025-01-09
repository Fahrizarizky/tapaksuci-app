        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark shadow-lg accordion fixed-top" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-emoji-wink-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hai, Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span></a>
            </li>
            @can('adminpimda')
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/cabang-latihan">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Cabang Latihan</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endcan
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
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/anggota">
                    <i class="bi bi-people-fill"></i>
                    <span>Anggota</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/logout">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>