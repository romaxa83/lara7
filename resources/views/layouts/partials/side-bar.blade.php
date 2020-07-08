<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="/img/bender-logo.png" alt="Bender Logo" class="brand-image img-circle elevation-5"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><i>LARKA</i></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customers') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Customers</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.image') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-comments"></i>--}}
{{--                        <p>Image</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Library
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.books.category') }}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Category</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/boxed.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Boxed</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-topnav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Navbar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-footer.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Footer</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Collapsed Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laravel Articles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                </li>
                <li class="nav-header">Services</li>

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.dropbox') }}" class="nav-link" title="Связь с dropbox">--}}
{{--                        <i class="nav-icon fab fa-dropbox"></i>--}}
{{--                        <p>My Dropbox</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
