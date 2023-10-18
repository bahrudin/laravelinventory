<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">INVENTORY</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRto2Wk4cu26_C-0Bmfj9T3DZf3lvPNCV2ubHay8WDA5017ElFECImLUGXlhLTWCdRTDJI&usqp=CAU" class="img-circle elevation-2"
                 alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Bahrudin</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                    <a href="{{ route('transaction.index') }}" class="nav-link {{ Route::is('transaction.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Order
                        </p>
                    </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('order*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Order List
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link {{ Route::is('order.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('product*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Master Product
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product-category.index') }}" class="nav-link {{ Route::is('product-category.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link {{ Route::is('product.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('supplier*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Master Supplier
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('supplier.index') }}" class="nav-link {{ Route::is('supplier.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('employee*')|| request()->is('job*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Master Employee
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('job.index') }}" class="nav-link {{ Route::is('job.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Job</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.index') }}" class="nav-link {{ Route::is('employee.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" class="nav-link"
                       onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
