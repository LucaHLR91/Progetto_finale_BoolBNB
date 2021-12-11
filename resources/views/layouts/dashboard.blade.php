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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>
        
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Maps TomTom --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js"></script>
    {{-- Services TomTom  --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>
    {{-- SearchMap TomTom --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox-web.js"></script>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>

</head>
<body>
    <div id="app">
        {{-- NAVBAR HEADER --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-navbar d-flex justify-content-between sticky-top">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"><i class="fab fa-airbnb"></i>
                BoolBnB</a>
                <div>
                    <a class="nav-link" href="/"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

        </nav>
        {{-- FINE NAVBAR HEADER --}}



        <div class="container-fluid mt-6">
            <div class="row">

                {{-- inizio dashboard  --}}
                <div class="col-sm-4 col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark my-dashboard">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                            <li class="nav-item">
                                <a data-bs-toggle="collapse" class="nav-link px-0 align-middle" href="{{ route('admin.dashboard_home') }}" >
                                    <i class="fas fa-digital-tachograph"></i>
                                    <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            </li>

                            <li class="nav-item">
                                <a data-bs-toggle="collapse" class="nav-link px-0 align-middle " href="{{ route('admin.apartments.index') }}">
                                    <i class="fas fa-list-ol"></i>
                                    <span class="ms-1 d-none d-sm-inline">I Miei Appartamenti</span></a>

                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" class="nav-link px-0 align-middle" href="{{ route('admin.apartments.create') }}">
                                    <i class="fas fa-plus"></i>
                                    <span class="ms-1 d-none d-sm-inline">Inserisci Appartamento</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fas fa-search"></i>
                                    <span class="ms-1 d-none d-sm-inline">Sponsorizzazioni Attive</span> </a>
                            </li>
                        </ul>
                        <hr>

                    </div>
                </div>

                {{-- fine dashboard  --}}

                {{-- inizio main --}}
                <main role="main" class="col pt-4 mt-6">
                    @yield('content')
                </main>
                {{-- fine main --}}
            </div>
        </div>
    </div>

    
</body>
</html>
