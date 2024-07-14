<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>


{{--
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false"
                aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                        </a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
