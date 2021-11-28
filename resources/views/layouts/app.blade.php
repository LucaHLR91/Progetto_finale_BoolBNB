<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>BoolBnB | @yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm my-navbar">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <i class="fab fa-airbnb"></i>
                    BoolBnB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard_home') }}">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

        <footer class="">
            <div class="container text-md-left">
                <div class="row">
                <div class="col-md-3 ">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">informazioni</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Come funziona</a>
                        </li>
                        <li>
                            <a href="#!">Associates</a>
                        </li>
                        <li>
                            <a href="#!">News</a>
                        </li>
                        <li>
                            <a href="#!">AirBnB Citizen</a>
                        </li>
                        <li>
                            <a href="#!">Olimpiadi</a>
                        </li>
                        <li>
                            <a href="#!">Newsroom</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">community</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Magazine</a>
                        </li>
                        <li>
                            <a href="#!">Associates</a>
                        </li>
                        <li>
                            <a href="#!">Invita gli amici</a>
                        </li>
                        <li>
                            <a href="#!">AirBnb for Work</a>
                        </li>
                        <li>
                            <a href="#!">Invita</a>
                        </li>
                        <li>
                            <a href="#!">saluta</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">ospita</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Diventa un host</a>
                        </li>
                        <li>
                            <a href="#!">Offi un esperienza</a>
                        </li>
                        <li>
                            <a href="#!">Affittare responbilmente</a>
                        </li>
                        <li>
                            <a href="#!">Messaggio dal CEO</a>
                        </li>
                        <li>
                            <a href="#!">Open Homes</a>
                        </li>
                        <li>
                            <a href="#!">Centro risorse</a>
                        </li>
                        <li>
                            <a href="#!">Community center</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">assistenza</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Aggiornamento sulla pandemia COVID-19</a>
                        </li>
                        <li>
                            <a href="#!">Centro assistenza</a>
                        </li>
                        <li>
                            <a href="#!">Opzioni di cancellazione</a>
                        </li>
                        <li>
                            <a href="#!">Opzioni di cancellazione</a>
                        </li>
                        <li>
                            <a href="#!">Servizio assienstenza quartiere</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
            </div>
            </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12 py-4">
                        <div class="flex-center icon">
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="tw-ic">
                                <i class="fab fa-twitter fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="li-ic">
                                <i class="fab fa-linkedin-in fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="ins-ic">
                                <i class="fab fa-instagram fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="pin-ic">
                                <i class="fab fa-pinterest fa-lg  mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center">© 2021 Copyright:
                <a href=""> AirBnB</a>
            </div>
        </footer>
    </div>
</body>
</html>
