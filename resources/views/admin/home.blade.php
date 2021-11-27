@extends('layouts.dashboard')
@section('title', 'Benvenuto')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Benvenuto</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- farsi passare i dati dell'utente registrato --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
