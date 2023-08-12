<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ShopPhone Philippines | Empowering your Mobile Lifestyle</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-QlYaJVhAEgwodC4m8jk2/WjFXkZiHv7FExSsp8d5ue5C5yGp6EaU6vmkU6zlZKN9RWaIv7PjFFrkwgQ7zvyFjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <link rel="icon" type="image/png" href="{{ asset('storage/uploads/images/shopee-icon.png') }}">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light my-navbar shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ route('productcollection') }}">
                    <img src="{{ asset('storage/uploads/images/ShopPhone-Logo.png') }}" alt="ShopPhone" width="180"
                        height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <form class="d-flex" action="{{ route('productSearch') }}" method="GET" id="searchForm">
                                <div class="input-group">
                                    <input class="form-control border-end-0" type="search"
                                        placeholder="Search Brand or Phone Model..." aria-label="Search"
                                        name="search_query" id="searchInput" style="width: 600px;">

                                    <button class="btn btn-outline-secondary border-start-0" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <style>
                        #searchForm {
                            display: flex;
                            align-items: center;
                        }

                        #searchInput {
                            border: 1px solid black;
                            border-color: #fb5530;
                            border-radius: 2;
                            height: 40px;
                        }

                        #searchInput:focus {
                            outline: none;
                        }

                        .btn-outline-secondary {
                            border-color: #fb5530;
                            border-radius: 2;
                            background-color: #fb5530;
                            color: white;
                            box-shadow: 0 0 0 2px white inset;
                        }

                        .btn-outline-secondary:hover {
                            background-color: transparent;
                        }

                        .navbar-nav li a.nav-link {
                            color: white !important;
                        }

                        .navbar-nav li a i {
                            color: white !important;
                        }



                        .my-navbar {
                            background-color: #fb5530;
                        }

                        body {
                            background-color: whitesmoke;
                        }
                    </style>

                    <script>
                        var typingTimer;
                        var doneTypingInterval = 1000; // in milliseconds

                        // Get the input field and form
                        var searchInput = document.getElementById('searchInput');
                        var searchForm = document.getElementById('searchForm');

                        // Listen for the input event on the search input field
                        searchInput.addEventListener('input', function() {
                            // Clear the timer if it's running
                            clearTimeout(typingTimer);

                            // Start a new timer
                            typingTimer = setTimeout(function() {
                                // Submit the form
                                searchForm.submit();
                            }, doneTypingInterval);
                        });
                    </script>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        @guest
                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i>
                                        {{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                                            {{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCart" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-shopping-cart"></i> Cart
                                    <span class="badge bg-secondary"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownCart">
                                    <a class="dropdown-item" href="{{ route('cartindex') }}">View Cart</a>
                                    <a class="dropdown-item" href="{{ route('Orders') }}">View Order</a>
                                    <a class="dropdown-item" href="{{ route('orderHistory') }}">Order History</a>
                                </div>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-cog"></i> Manage
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <h6 class="dropdown-header">{{ __('Management') }}</h6>
                                        <!-- <a class="dropdown-item" href="">
                                        {{ __('Users') }} </a> -->

                                        <a class="dropdown-item" href="{{ route('viewAllorders') }}">
                                            {{ __('Orders') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('ChartIndex') }}">
                                            {{ __('Chart Report') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('dashboardindex') }}"
                                            id="navbarDashboard" role="button" aria-haspopup="true">Dashboard

                                        </a>

                                        {{--  <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('viewAllorders') }}">
                                            {{ __('Orders') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('ChartIndex') }}">
                                            {{ __('Chart Report') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('dashboardindex') }}"
                                            id="navbarDashboard" role="button" aria-haspopup="true">Dashboard

                                        </a>--}}
                                    </div>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


</html>
