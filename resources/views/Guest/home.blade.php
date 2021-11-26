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

@section('content')
    <div class="container">
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
        <h1 class="my-test">homepage</h1>
    </div>
@endsection
