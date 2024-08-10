<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Manajemen Asset</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                @if (Auth::user()->image)
                    <img src="{{Storage::url(Auth::user()->image) }}" alt="User Image" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/img/user_default.png') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info ml-2">
                <a href="{{ route('profile.index', encrypt(Auth::user()->id)) }}" class="d-block">{{ Auth::user()->name }}</a>
                <span class="text-xs"><i class="fa fa-circle text-success"></i> Online</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Auth::user()->level_id == 1)
                    <li class="nav-header">Admin</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link @yield('admin')">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pendidikan.index')}}" class="nav-link @yield('pendidikan')">
                            <i class="nav-icon ion ion-person-stalker"></i>
                            <p>Pendidikan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penelitian.index')}}" class="nav-link @yield('penelitian')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Penelitian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pengabdian.index')}}" class="nav-link @yield('pengabdian')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>pengabdian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penunjang.index')}}" class="nav-link @yield('penunjang')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>Penunjang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('aika.index')}}" class="nav-link @yield('aika')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Aika</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->status_keaktifan == 'Active')
                @if (Auth::user()->level_id == 2)
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="{{ route('pendidikan.index')}}" class="nav-link @yield('pendidikan')">
                        <i class="nav-icon ion ion-person-stalker"></i>
                        <p>Pendidikan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penelitian.index')}}" class="nav-link @yield('penelitian')">
                        <i class="nav-icon ion ion-clipboard"></i>
                        <p>Penelitian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengabdian.index')}}" class="nav-link @yield('pengabdian')">
                        <i class="nav-icon ion ion-compose"></i>
                        <p>pengabdian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penunjang.index')}}" class="nav-link @yield('penunjang')">
                        <i class="nav-icon ion ion-compose"></i>
                        <p>Penunjang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('aika.index')}}" class="nav-link @yield('aika')">
                        <i class="nav-icon ion ion-clipboard"></i>
                        <p>Aika</p>
                    </a>
                </li>
                @endif
                @else
                <li class="nav-header badge badge-danger">Menunggu Approve Prodi</li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
