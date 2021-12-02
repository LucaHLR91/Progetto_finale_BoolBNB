@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')
    <div class="container-fluid text-dark mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <span class="border">qui metteremo la ricerc che l'utente ha fatto</span>
            </div>
        </div>
    </div>
    <div class="container-fluid text-dark h-600">
        <div class="row">
            @foreach ($apartments as $result)
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none" href="{{route('messages.show', $result->id) }}"> 
                    {{-- RIMUOVERE LE CLASSI DEI BORDI --}}
                    <div class="house mb-4 d-flex h-200 border border-dark">
                        <div class="col-6 text-dark border border-warning">
                            <h3>{{ $result->title }}</h3>
                            <p>numero stanze: {{ $result->rooms }}</p>
                            <p>numero letti: {{ $result->beds }}</p>
                            <p>città: {{ $result->city }}</p>
                        </div>
                        <div class="col-6 p-0 border border-danger">
                            {{-- farsi cambiare l'indirizzo dell'immagine | rimuovere le classi dei bordi--}}
                            <img class="w-100 border border-primary" src="{{asset($result->image)}}" alt="{{ $result->title }}">
                        </div>
                        {{-- <a href="{{route('messages.show', $result->id) }}" class="btn btn-info">Visualizza appartamento</a> --}}
                    </div>
                </a>    
            </div>
            @endforeach
            {{-- IMPORTO LA MAPPA ALL'INTERNO DELLA PAGINA  --}}
            {{-- <all-apartments-map :coordinates="{{ json_encode($coordinates) }}"></all-apartments-map>  --}}
        </div>
        {{-- Nel form della ricerca avanzata inserire un input nascosto con id_apartments  --}}
    </div>
@endsection
