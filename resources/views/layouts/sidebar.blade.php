<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-check"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Absensi Karyawan SDN 006</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('absensaya')">
                <a class="nav-link collapsed" href="{{route('absen')}}" >
                    <i class="fas fa-fw fa-check"></i>
                    <span>Absensi Saya</span>
                </a>
            </li>
           

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            @if (auth()->user()->role == "Admin")

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>


 <li class="nav-item @yield('manajemen absen')">
                <a class="nav-link " href="{{route('tasemeter')}}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Managemen Absen</span></a>
            </li>
            
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('user')">
                <a class="nav-link " href="{{route('pengguna.index')}}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Pegawai</span></a>
            </li>
            @endif

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>