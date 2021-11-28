<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark my-navbar flex-md-nowrap p-2">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 d-flex align-items-center" href="#">
                <i class="fab fa-airbnb"></i>
                BoolBNB
            </a>
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="admin/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block sidebar py-4 px-1 my-dashboard full-height">
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

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4 full-height ">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
