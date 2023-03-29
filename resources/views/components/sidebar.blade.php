<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-box"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Invent <sup>App</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Feature
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('product.list') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Product Management</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('stock.list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Stock Management</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('supplier.list') }}">
            <i class="fas fa-fw fa-user-tag"></i>
            <span>Supplier</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Session::get('logged-in')[0]->role == 0)
        <!-- Heading -->
        <div class="sidebar-heading">
            ADMIN
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.list') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>User Management</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
