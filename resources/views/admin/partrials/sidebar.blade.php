<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
        {{-- <img src="{{ asset('company/logo/logo_removeBg2.png') }}" alt="AdminLTE Logo" class="brand-image "
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold pl-2">BOOK WORLD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-2 mb-3 d-flex align-items-center ">
            <div class="image">
                <img src="{{ Storage::url(Auth::guard('administrator')->user()->avatar) }}" width="50px;"
                    alt="User Image">
            </div>
            <div class="info pl-3">
                <span class="d-block text-white font-weight-bold"
                    style="font-size: 20px;">{{ Auth::guard('administrator')->user()->name }}</span>
                {{-- <span class="d-block text-white font-weight-bold" style="font-size: 20px;"></span> --}}
                <div class="">
                    {{-- @foreach (Auth::guard('administrator')->user()->roles as $role)
                        <span class="text-white" style="font-size: 14px;">{{ $role->display_name }}</span>
                    @endforeach --}}
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item sidebar-nav">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa-solid fa-chart-pie mr-2"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item sidebar-nav">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa-solid fa-list mr-2"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link">
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item sidebar-nav">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa-solid fa-list mr-2"></i>
                        <p>
                            Quản lý tác giả
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.authors.index') }}" class="nav-link">
                                <p>Danh sách tác giả</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.authors.create') }}" class="nav-link">
                                <p>Thêm tác giả</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item sidebar-nav">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa-solid fa-list mr-2"></i>
                        <p>
                            Quản lý nhà xuất bản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.publishers.index') }}" class="nav-link">
                                <p>Danh sách nhà xuất bản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.publishers.create') }}" class="nav-link">
                                <p>Thêm nhà xuất bản</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item sidebar-nav">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa-solid fa-list mr-2"></i>
                        <p>
                            Quản lý sách
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.books.index') }}" class="nav-link">
                                <p>Danh sách sách</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.publishers.create') }}" class="nav-link">
                                <p>Thêm sách</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
