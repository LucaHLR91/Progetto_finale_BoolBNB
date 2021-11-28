@extends('layouts.dashboard')
@section('title', 'Benvenuto')


@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header text-center">
                     <h2> Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }} </h2> 
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            
           <div class="card bg-dark">
                <div class="card-header text-center">
                    <h2> Mappa </h2> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <empty-map></empty-map>
                        
        </div>
    </div>
</div>
@endsection
