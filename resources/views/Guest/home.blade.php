{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    ksdjhvljsdh
                </div>
            </div>
        </div>
 --}}
      {{--   <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.dashboard_home') }}">Dashboard</a>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    edo
                </div>
            </div>
        </div>
    </body>
</html> --}}
@extends('layouts.app')
@section('title', 'Homepage')


@section('content')
    <div class="container">
        {{-- FORM PER INVIO POST SEARCH --}}
        <div class="form">
            <form class="" {{-- action="{{route('guest.homes.search')}}" --}} method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-8">
                        <label for="address">Dove vuoi andare?</label>
                    </div>
                    <div class="col-lg-4 none">
                        <label for="slider-range">Raggio di ricerca</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-7">
                        <div class="form-group">
                            <div id="map-example-container" class="invisible"></div>
                            <input type="search" id="input-map" name="address" class="form-control" placeholder="Indirizzo  Appartamento"/>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <div class="d-flex justify-content-center my-2">
                                <form class="range-field w-75">
                                    <input id="slider-range" class="border-0 width" name="range" type="range" min="5"   max="200" value="20" />
                                </form>
                                <span class="font-weight-bold text-primary ml-2 mt-1 valueRange"></span>
                                <span class="font-weight-bold text-primary ml-2 mt-1">Km</span>
                            </div>
                        </div>
                    </div>
                <div class="form-group invisible">
                    <label for="long">long</label>
                    <input id="long" type="text" name="long" class="form-control"/>
                </div>
                <div class="form-group invisible">
                    <label for="lat">lat</label>
                    <input id="lat" type="text" name="lat" class="form-control"/>
                </div>
                <div class="col-md-12 col-lg-1">
                    <input id="invia-form" class="btn btn-primary" type="submit" value="Find">
                </div>
                </div>
            </form>
        </div>

    </div>
@endsection
