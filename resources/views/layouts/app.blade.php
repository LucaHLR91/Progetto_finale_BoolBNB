<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>BoolBnB | @yield('title')</title>

    {{-- link carosello --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- script carosello  --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    {{-- link tomtom --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox.css'>

    {{-- scripts tomtom --}}
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js'></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox-web.js"></script>


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

        <nav class="navbar navbar-expand-lg navbar-light bg-light my-navbar sticky-top ">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"><i class="fab fa-airbnb"></i>
                BoolBnB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent">

                <div class="d-flex  ">
                    @guest

                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))

                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @endif
                  @else

                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div>

                      </div>
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

              @endguest

                  </div>
            </div>
          </nav>

        <main class="pt-4 mt-6">
            @yield('content')

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
                <div class="footer-copyright text-center">?? 2021 Copyright:
                    <a href=""> BoolBnB</a>
                </div>
            </footer>
        </main>


        {{-- @yield('footer') --}}

    </div>

</body>
</html>
