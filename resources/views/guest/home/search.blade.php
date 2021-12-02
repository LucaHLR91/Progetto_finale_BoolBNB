@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')
    <div class="container text-dark">
        <div class="row">
            <div class="col-12">
                @foreach ($apartments as $result)
                    <div class="house">
                        <h2>{{ $result->title }}</h2>
                        <img src="{{asset($result->image)}}" alt="{{ $result->title }}">
                        <p>numero stanze: {{ $result->rooms }}</p>
                        <p>numero letti: {{ $result->beds }}</p>
                        <p>città: {{ $result->city }}</p>
                        <a href="{{route('messages.show', $result->id) }}" class="btn btn-info">Visualizza appartamento</a>
                    </div>
                @endforeach
            </div>
            <all-apartments-map :coordinates="{{ json_encode($coordinates) }}"></all-apartments-map>

        </div>

        {{-- Nel form della ricerca avanzata inserire un input nascosto con id_apartments  --}}

    </div>
@endsection
