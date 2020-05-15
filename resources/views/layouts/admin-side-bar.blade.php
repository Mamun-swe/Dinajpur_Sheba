<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
        <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dinajpur Sheba</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Auth()->User()->account_type == 'admin')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.co-admin.index')}}">
        <i class="fas fa-users"></i>
        <span>Co-Admin List</span></a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.seller.index')}}">
        <i class="fas fa-dollar-sign"></i>
        <span>Seller List</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.buyers')}}">
        <i class="fas fa-user-alt-slash"></i>
        <span>Buyer List</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.loading-point.index')}}">
        <i class="fas fa-truck"></i>
        <span>Loading Point</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product-type.index')}}">
        <i class="fab fa-product-hunt"></i>
        <span>Product Type</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.create')}}">
        <i class="fas fa-plus"></i>
        <span>Create Product</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders')}}">
        <i class="fab fa-paypal"></i>
        <span>Order List</span></a>
    </li>

    
</ul>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow-sm">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize">
                    @if(Auth::user())
                        {{Auth::user()->name}}
                    @endif
                    </span>
                    <img class="img-profile rounded-circle" src="{{asset('images/static/user.jpg')}}">
                </a>
            
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('admin.me')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    আমার প্রোফাইল
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    লগ আউট
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </li>
        </ul>

    </nav>
    <!-- End of Topbar -->
