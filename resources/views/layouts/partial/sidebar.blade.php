<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #45474B">
        <!-- Brand Logo -->
        <a href="#" class="brand-link text-center">
            <img src="{{asset('backend/dist/img/Parking.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .6">
            <span class="brand-text font-weight-light">The Parking Lot</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="home" class="nav-link active">
                            <i class="nav-icon fas fa-home nav-icon"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                Service
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{route('customers.index')}}" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Costumer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="fa fa-car nav-icon"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('orders.index')}}" class="nav-link">
                                    <i class="fa fa-cart-plus nav-icon"></i>
                                    <p>Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>