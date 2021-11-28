@extends('layouts.dashboard')
@section('title', 'Benvenuto')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header text-center">
                    <h2> Benvenuto {{ ucfirst(trans(Auth::user()->name)) }} {{ ucfirst(trans(Auth::user()->surname)) }} </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
