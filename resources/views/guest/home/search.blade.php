@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')
    <div class="container-fluid text-dark mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{-- @dd($parameters) --}}    {{-- farsi passare la variabile con i dati filtrati --}}
             {{-- <h3><i class="fas fa-search"></i> {{ $parameters['city'] }} - N°stanze {{ $parameters['rooms'] }} - N°letti {{ $parameters['beds'] }}</h3> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid text-dark h-600">
        <div class="row ">

            @if($apartments->isEmpty())
            <div class="col-12 ">
                <div class="mb-4 h-200 text-center ">
                    <h4>Al momento non ci sono appartamenti </h4>
                </div>

            </div>


            @else
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
                                {{-- <img class="w-100 border border-primary" src="{{asset($result->image)}}" alt="{{ $result->title }}"> --}}

                                <img class="w-100 border border-primary" src="{{asset('storage/1638454357.jpg')}}" alt="{{ $result->title }}">
                            </div>
                            {{-- <a href="{{route('messages.show', $result->id) }}" class="btn btn-info">Visualizza appartamento</a> --}}
                        </div>
                    </a>
                </div>
                @endforeach
            @endif
            {{-- IMPORTO LA MAPPA ALL'INTERNO DELLA PAGINA  --}}
            {{-- <all-apartments-map :coordinates="{{ json_encode($coordinates) }}"></all-apartments-map>  --}}
        </div>
        {{-- Nel form della ricerca avanzata inserire un input nascosto con id_apartments  --}}

        <form action="{{ route('search') }}" method="get">
            
            
            <div class="form-group">
                <h4>Filtra per servizi:</h4>
                
                @foreach ($id_apartments as $id_apartment)
                    <input name="id_apartments[]" id="id_apartments" value="{{ $id_apartment }}" type="hidden">
                @endforeach


                @foreach ($services as $service)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input {{ in_array($service['id'], old('services', [])) ? 'checked' : null }} value="{{ $service['id'] }}"
                        id="{{ 'tag' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}"
                        class="form-check-label">{{ $service['service_name'] }}</label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Filtra</button>
            </div>    
        </form>

    </div>
@endsection
