@extends('layouts.dashboard')
@section('title', 'Benvenuto')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Benvenuto') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    {{-- farsi passare i dati dell'utente registarto  --}}
                    <div class="card-name">
                        <h3>
                            {{-- es --}}
                            Mario
                            {{-- {{ qui passiamo il nome dell'utente registrato }} --}}
                        </h3>
                        <h3>
                            {{-- es --}}
                            Rossi
                            {{-- {{ qui passiamo il cognome dell'utente registrato }} --}}
                        </h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
