@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')

    {{-- il seguente link serve per vedere cosa si è cercato --}}
    {{-- <div class="container-fluid text-dark mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                @dd($parameters) 
             <h3><i class="fas fa-search"></i> {{ $parameters['city'] }} - N°stanze {{ $parameters['rooms'] }} - N°letti {{ $parameters['beds'] }}</h3>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid text-dark h-600">
        <form action="{{ route('searchQuery') }}" method="get">


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
                    {{-- <a class="text-decoration-none" href="{{route('messages.show', $result->id) }}"> --}}
                        {{-- RIMUOVERE LE CLASSI DEI BORDI --}}
                        {{-- @dd($result) --}}
                        <div class="house h-250 mb-4 d-flex border ">
                            <div class="col-6 text-dark py-2 ">
                                <h3 class="m-0">{{ $result->title }}</h3>
                                <p class="m-0">N° Stanze: {{ $result->rooms }}</p>
                                <p class="m-0">N° Letti:{{ $result->beds }}</p>
                                <p class="m-0">N° Bagni:{{ $result->bathrooms }}</p>
                                <p class="m-0">MQ:{{ $result->square_meters }}</p>
                                <p class="m-0">Città:{{ $result->city }}</p>
                                <p class="m-0">Indirizzo:{{ $result->address }}</p>
                            </div>
                            <div class="col-6 p-0 border ">
                                {{-- <img src="{{ asset('storage/image_apartments/1638871398.jpeg') }}" alt="" title="" style="width:200px; height:200px"> --}}
                                <img src="{{ asset('storage/image_apartments/' . $result->image) }}" alt="" class="w-100 h-100">
                            </div>
                            {{-- <a href="{{route('messages.show', $result->id) }}" class="btn btn-info">Visualizza appartamento</a> --}}
                        </div>
                    </a>
                </div>
                @endforeach
            @endif
            {{-- IMPORTO LA MAPPA ALL'INTERNO DELLA PAGINA  --}}
            <all-apartments-map :coordinates="{{ json_encode($coordinates) }}"></all-apartments-map>
        </div>
        {{-- Nel form della ricerca avanzata inserire un input nascosto con id_apartments  --}}

    </div>
@endsection
