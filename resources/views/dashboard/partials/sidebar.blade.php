        <ul style="z-index: 2;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark shadow-lg accordion fixed-top" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center ps-3 py-3" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('logotapaksuci.png') }}" alt="Logo" class="img-fluid" style="width: 40px; height: auto;">
                </div>
                <div class="ms-3">
                    <span class="text-white fw-bold">Hai, Admin</span>
                </div>
            </a>

            {{-- <!-- Divider -->
            <hr class="sidebar-divider my-0"> --}}

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span></a>
            </li>

            <div id="accordionMenu">

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#umumMenu" aria-expanded="false" aria-controls="umumMenu">
                    <i class="bi bi-gear-fill"></i>
                    <span>Umum >></span>
                </a>
            </li>

            <!-- Submenu yang bisa dibuka/tutup -->
           <div id="umumMenu" class="collapse" data-bs-parent="#accordionMenu">
            @if(auth()->user()->role == 'admincabang' || auth()->user()->role == 'adminpimda')
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
            @endif

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/kegiatan">
                    <i class="bi bi-calendar-plus-fill"></i>
                    <span>Kegiatan</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>

            @if(auth()->user()->role == 'adminpimda')
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/kegiatan/adminkegiatan">
                    <i class="bi bi-people-fill"></i>
                    <span>Admin Kegiatan</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            @endif
           </div>

           <!-- Nav Item - Kategori Keuangan -->
           <!-- Nav Item - Kategori Keuangan (Toggle Button) -->
           @if(auth()->user()->role == 'admincabang' || auth()->user()->role == 'adminpimda')
           <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#keuanganMenu" aria-expanded="false" aria-controls="keuanganMenu">
                <i class="bi bi-gear-fill"></i>
                <span>Keuangan >></span>
            </a>
            </li>
           
           <!-- Submenu yang bisa dibuka/tutup -->
           <div id="keuanganMenu" class="collapse" data-bs-parent="#accordionMenu">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/kategorikeuangan">
                        <i class="bi bi-journal-text"></i>
                        <span>Kategori Keuangan</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/pemasukan">
                        <i class="bi bi-journal-text"></i>
                        <span>Pemasukan</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/pengeluaran">
                        <i class="bi bi-journal-text"></i>
                        <span>Pengeluaran</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#suratMenu" aria-expanded="false" aria-controls="suratMenu">
                    <i class="bi bi-gear-fill"></i>
                    <span>Surat >></span>
                </a>
                </li>

                <div id="suratMenu" class="collapse" data-bs-parent="#accordionMenu">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/suratmasuk">
                            <i class="bi bi-envelope"></i>
                            <span>Surat Masuk</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/suratkeluar">
                            <i class="bi bi-envelope"></i>
                            <span>Surat Keluar</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </div>
            </div>
            @endif

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/logout">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>