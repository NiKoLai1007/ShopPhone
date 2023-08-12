
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route('dashboardindex')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="{{route('ChartIndex')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{route('viewbrands')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-b"></i></div>
                        Brands
                    </a>
                    <a class="nav-link" href="{{route('viewproducts')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-p"></i></div>
                        Products
                    </a>
                    <a class="nav-link" href="{{route('viewshippings')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-shipping-fast"></i></div>
                        Shipping Types
                    </a>
                    <a class="nav-link" href="{{route('viewpayments')}}">
                        <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                        Payment Methods
                    </a>

                    <div class="sb-sidenav-menu-heading">Order</div>
                    {{--  <div class="dropdown-divider" ></div>  --}}
                    <a class="nav-link" href="{{route('viewAllorders')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                        Orders
                    </a>
                    {{--  <div class="dropdown-divider" ></div>
                        <a class="dropdown-item" href="{{route('viewAllorders')}}">
                        <i class="fas fa-shopping-basket"></i>
                        {{ __('Orders') }}
                        </a>  --}}
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                ShopPhone
            </div>
        </nav>
    </div>
