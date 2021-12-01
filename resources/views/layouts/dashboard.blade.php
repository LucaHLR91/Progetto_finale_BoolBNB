<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <title>Dashboard</title> --}}
    <title>BoolBnB | @yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark my-navbar shadow-sm flex-md-nowrap p-2">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 d-flex align-items-center" href="/">
                <i class="fab fa-airbnb"></i>
                BoolBNB
            </a>
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-sm-12 col-lg-2 d-md-block sidebar py-4 px-4 px-1 my-dashboard">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.dashboard_home') }}">
                                    <i class="fas fa-digital-tachograph"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.apartments.index') }}">
                                    <i class="fas fa-list-ol"></i>
                                    Miei Appartamenti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.apartments.create') }}">
                                    <i class="fas fa-plus"></i>
                                    Inserisci Appartamento
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>


                <main role="main" class="col-md-9 p-0 col-lg-10 full-height d-flex align-self-center overflow">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
