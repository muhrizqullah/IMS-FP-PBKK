<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ URL::asset('dist/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>

    {{-- Orders --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
            aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-dolly"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Orders</h6>
                <a class="collapse-item {{ Request::is('orders') ? 'active' : '' }}" href="/orders">Orders List</a>
                <a class="collapse-item {{ Request::is('category/store') ? 'active' : '' }}" href="/store-order">New Order</a>
            </div>
        </div>
    </li>
    {{-- Orders --}}

    {{-- Suppliers --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers"
            aria-expanded="true" aria-controls="collapseSuppliers">
            <i class="far fa-address-card"></i>
            <span>Suppliers</span>
        </a>
        <div id="collapseSuppliers" class="collapse" aria-labelledby="headingSuppliers"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Suppliers</h6>
                <a class="collapse-item {{ Request::is('supplier') ? 'active' : '' }}" href="/supplier">Suppliers List</a>
                <a class="collapse-item {{ Request::is('supplier/create') ? 'active' : '' }}" href="/supplier/create">Add Supplier</a>
            </div>
        </div>
    </li>
    {{-- Suppliers --}}    

    {{-- Categories --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-archive"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Categories</h6>
                <a class="collapse-item {{ Request::is('category') ? 'active' : '' }}" href="/category">Categories List</a>
                <a class="collapse-item {{ Request::is('category/create') ? 'active' : '' }}" href="/category/create">Add Category</a>
            </div>
        </div>
    </li>
    {{-- Categories --}}

    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-boxes"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products</h6>
                <a class="collapse-item {{ Request::is('product') ? 'active' : '' }}" href="/product">Products List</a>
                <a class="collapse-item {{ Request::is('product/create') ? 'active' : '' }}" href="/product/create">Add Product</a>
            </div>
        </div>
    </li>
    {{-- Products --}}
    <hr class="sidebar-divider">
</ul>
