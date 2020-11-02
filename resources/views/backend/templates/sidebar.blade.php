<ul class="navbar-nav bg-transparent sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ asset('/img/inventory.svg') }}" width="40px" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3"><i>House <sup>Dev</sup></i></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Store Manage
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categorymenu" aria-expanded="true"
            aria-controls="categorymenu">
            <i class="fas fa-sitemap"></i>
            <span class="font-weight-bold">Category</span>
        </a>
        <div id="categorymenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Menu:</h6>
                <a class="collapse-item" href="{{ route('categories.index') }}">Category List</a>
                <a class="collapse-item" href="{{ route('categories.create') }}">Category Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sub Category Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subcategorymenu"
            aria-expanded="true" aria-controls="subcategorymenu">
            <i class="fas fa-sitemap"></i>
            <span class="font-weight-bold">Sub Category</span>
        </a>
        <div id="subcategorymenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Category Menu:</h6>
                <a class="collapse-item" href="{{ route('subcategories.index') }}">Sub Category List</a>
                <a class="collapse-item" href="{{ route('subcategories.create') }}">Sub Category Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Brand Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandmenu"
            aria-expanded="true" aria-controls="brandmenu">
            <i class="fas fa-band-aid"></i>
            <span class="font-weight-bold">Brand</span>
        </a>
        <div id="brandmenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Menu:</h6>
                <a class="collapse-item" href="{{ route('brands.index') }}">Brand List</a>
                <a class="collapse-item" href="{{ route('brands.create') }}">Brand Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Supplier Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#suppliermenu"
            aria-expanded="true" aria-controls="suppliermenu">
            <i class="fas fa-paper-plane"></i>
            <span class="font-weight-bold">Supplier</span>
        </a>
        <div id="suppliermenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Supplier Menu:</h6>
                <a class="collapse-item" href="{{ route('suppliers.index') }}">Supplier List</a>
                <a class="collapse-item" href="{{ route('suppliers.create') }}">Supplier Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Payment Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#paymentmenu"
            aria-expanded="true" aria-controls="paymentmenu">
            <i class="fas fa-money-check-alt"></i>
            <span class="font-weight-bold">Payment</span>
        </a>
        <div id="paymentmenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payment Menu:</h6>
                <a class="collapse-item" href="{{ route('payments.index') }}">Payment List</a>
                <a class="collapse-item" href="{{ route('payments.create') }}">Payment Create</a>
            </div>
        </div>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Product Manage
     </div>

    <!-- Nav Item - Color Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#colormenu"
            aria-expanded="true" aria-controls="colormenu">
            <i class="fas fa-palette"></i>
            <span class="font-weight-bold">Color</span>
        </a>
        <div id="colormenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Color Menu:</h6>
                <a class="collapse-item" href="{{ route('colors.index') }}">Color List</a>
                <a class="collapse-item" href="{{ route('colors.create') }}">Color Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Size Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sizemenu"
            aria-expanded="true" aria-controls="sizemenu">
            <i class="fas fa-text-width"></i>
            <span class="font-weight-bold">Size</span>
        </a>
        <div id="sizemenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Size Menu:</h6>
                <a class="collapse-item" href="{{ route('sizes.index') }}">Size List</a>
                <a class="collapse-item" href="{{ route('sizes.create') }}">Size Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Product Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productmenu"
            aria-expanded="true" aria-controls="productmenu">
            <i class="fab fa-product-hunt"></i>
            <span class="font-weight-bold">Product</span>
        </a>
        <div id="productmenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Menu:</h6>
                <a class="collapse-item" href="{{ route('products.index') }}">Product List</a>
                <a class="collapse-item" href="{{ route('products.create') }}">Product Create</a>
                <a class="collapse-item" href="{{ route('attributes.show.extra') }}">Add Extra Cost</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Order & Check Out Manage
    </div>

    <!-- Nav Item - Order Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="fas fa-shopping-bag"></i>
            <span class="font-weight-bold">Order List</span></a>
    </li>

    <!-- Nav Item - Check Out Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('checkouts.index') }}">
            <i class="fas fa-cash-register"></i>
            <span class="font-weight-bold">Check Out List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Manage
    </div>

    <!-- Nav Item - User Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usermenu" aria-expanded="true"
            aria-controls="usermenu">
            <i class="fas fa-users"></i>
            <span class="font-weight-bold">User</span>
        </a>
        <div id="usermenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Menu:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">User List</a>
                <a class="collapse-item" href="{{ route('users.create') }}">User Create</a>
                {{-- <a class="collapse-item" href="{{ route('users.role.create') }}">User & Role Assign</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Role Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rolemenu" aria-expanded="true"
            aria-controls="rolemenu">
            <i class="fas fa-layer-group"></i>
            <span class="font-weight-bold">Role</span>
        </a>
        <div id="rolemenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Role Menu:</h6>
                <a class="collapse-item" href="{{ route('roles.index') }}">Role List</a>
                <a class="collapse-item" href="{{ route('roles.create') }}">Role Create</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Contact Manage
    </div>

    <!-- Nav Item - State Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statemenu" aria-expanded="true"
            aria-controls="statemenu">
            <i class="fa fa-map-signs" aria-hidden="true"></i>
            <span class="font-weight-bold">State</span>
        </a>
        <div id="statemenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">State Menu:</h6>
                <a class="collapse-item" href="{{ route('states.index') }}">State List</a>
                <a class="collapse-item" href="{{ route('states.create') }}">State Create</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - City Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#citymenu" aria-expanded="true"
            aria-controls="citymenu">
            <i class="fa fa-map-signs" aria-hidden="true"></i>
            <span class="font-weight-bold">City</span>
        </a>
        <div id="citymenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">City Menu:</h6>
                <a class="collapse-item" href="{{ route('cities.index') }}">City List</a>
                <a class="collapse-item" href="{{ route('cities.create') }}">City Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Township Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#townshipmenu" aria-expanded="true"
            aria-controls="townshipmenu">
            <i class="fa fa-map-signs" aria-hidden="true"></i>
            <span class="font-weight-bold">Township</span>
        </a>
        <div id="townshipmenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Township Menu:</h6>
                <a class="collapse-item" href="{{ route('townships.index') }}">Township List</a>
                <a class="collapse-item" href="{{ route('townships.create') }}">Township Create</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
