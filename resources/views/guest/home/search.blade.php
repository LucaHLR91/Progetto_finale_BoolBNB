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
                        {{-- <a href="{{route('search.show', $result->id) }}" class="btn btn-info">Dettagli</a> --}}
                    </div>
                @endforeach
            </div>
            <all-apartments-map :coordinates="{{ json_encode($coordinates) }}"></all-apartments-map>

        </div>

        {{-- Nel form della ricerca avanzata inserire un input nascosto con id_apartments  --}}
        {{-- FORM PER LA RICERCA SERVIZI --}}
        <form action="{{ route('searchQuery') }}" method="post">
            @csrf
            @method('POST')
            
            <div class="form-group">
                <h4>Filtra per servizi:</h4>
                @foreach ($services as $service)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input {{ in_array($service['id'], old('services', [])) ? 'checked' : null }} value="{{ $service['id'] }}"
                        id="{{ 'tag' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}"
                        class="form-check-label">{{ $service['service_name'] }}</label>
                </div>
                @endforeach
            </div>
            <input value="{{ json_encode($id_apartments) }}" type="hidden">
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>
    </div>
@endsection
