<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ url('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @php
                    $user = DB::table('users')->where('id', session()->get('user_added'))->first();
                @endphp
                @if ($user->role == 'Admin')
                    <li class="menu-title"><span data-key="t-menu">Products Management</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('category') }}">
                            <i class="fa-solid fa-list-check"></i> <span data-key="t-dashboards">Manage
                                Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('quantity') }}">
                            <i class="fas fa-layer-group"></i> <span data-key="t-dashboards">Manage Quantity
                                Units</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('product') }}">
                            <i class="fab fa-product-hunt"></i> <span data-key="t-dashboards">Manage Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('stocks') }}">
                            <i class="fas fa-layer-group"></i> <span data-key="t-dashboards">View Stock</span>
                        </a>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Change Password</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('change_password') }}">
                            <i class="fa-solid fa-lock"></i> <span data-key="t-dashboards">Change Password</span>
                        </a>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Inventory Management</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('customers') }}">
                            <i class="fas fa-users"></i> <span data-key="t-dashboards">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('orders') }}">
                            <i class="fas fa-layer-group"></i> <span data-key="t-dashboards">Orders</span>
                        </a>
                    </li>
                @else
                    <li class="menu-title"><span data-key="t-menu">Inventory Management</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('orders') }}">
                            <i class="fas fa-layer-group"></i> <span data-key="t-dashboards">Orders</span>
                        </a>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Change Password</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('change_password') }}">
                            <i class="fa-solid fa-lock"></i> <span data-key="t-dashboards">Change Password</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
