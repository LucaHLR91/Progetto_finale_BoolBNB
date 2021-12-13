@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')

    {{-- il seguente dic serve per vedere cosa si è cercato (passare nel compact la variabile parameters)--}}
    {{-- <div class="container-fluid text-dark mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                @dd($parameters) 
             <h3><i class="fas fa-search"></i> {{ $parameters['city'] }} - N°stanze {{ $parameters['rooms'] }} - N°letti {{ $parameters['beds'] }}</h3>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid text-dark h-600">

        <form action="{{ route('searchQuery') }}" method="get" class="d-flex justify-content-center">


            <div class="form-group">
                <h3 class="text-center mb-4 mt-2">Filtra per servizi:</h3>

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

            @if(count($apartments) < 0)
              
            <div class="col-12 ">
                <div class="my-5 text-center ">
                    <h4>Al momento non ci sono appartamenti </h4>
                </div>

            </div>


            @else
                @foreach ($apartments as $result)
                <div class="col-lg-4 col-md-6 col-12">
                    <a class="text-decoration-none" href="{{route('messages.show', $result->id) }}">
                        {{-- @dd($result) --}}
                        <div class="card text-dark mb-3" >
                            <img src="{{ asset('storage/image_apartments/' . $result->image) }}" class="card-img-top" style="width: 100%; height: 300px">
                            <h4 class="text-center my-2">{{ $result->title }}</h4>
                            <div class="w-100 d-flex flex-wrap">
                                <div class="spazio4">
                                    <p class=" text-center">N° Stanze: {{ $result->rooms }}</p>
                                </div>
                                <div class="spazio4">
                                    <p class=" text-center">N° Letti: {{ $result->beds }}</p>
                                </div>
                                <div class="spazio4">
                                    <p class=" text-center">N° Bagni: {{ $result->bathrooms }}</p>
                                </div>
                                <div class="spazio4">
                                    <p class=" text-center">MQ: {{ $result->square_meters }}</p>
                                </div>
                                <div class="w-50">
                                    <p class=" text-center">Città: {{ $result->city }}</p>
                                </div>
                                <div class="w-50">
                                    <p class=" text-center">Indirizzo: {{ $result->address }}</p>
                                </div>
                                <div class="w-100">
                                    {{-- effettuare un if per far apparire la disponibilità --}}
                                    @if ($result->avaliability == 1)
                                        <p class=" text-center">Al momento è disponibile</p>
                                    @else
                                        <p class=" text-center">Non disponibile</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- RIMUOVERE LE CLASSI DEI BORDI --}}
                        {{-- @dd($result) --}}
                        {{-- <div class="house mb-4 d-flex border h-250">

                            <div class="col-5 text-dark py-2">
                                <h3 class="m-0">{{ $result->title }}</h3>
                                <p class="m-0">N° Stanze: {{ $result->rooms }}</p>
                                <p class="m-0">N° Letti: {{ $result->beds }}</p>
                                <p class="m-0">N° Bagni: {{ $result->bathrooms }}</p>
                                <p class="m-0">MQ: {{ $result->square_meters }}</p>
                                <p class="m-0">Città: {{ $result->city }}</p>
                                <p class="m-0">Indirizzo: {{ $result->address }}</p>
                            </div>
                            <div class="col-7 p-0"> --}}
                                {{-- <img src="{{ asset('storage/image_apartments/' . $result->image) }}" alt="" class="w-100 h-100"> --}}
                            {{-- </div> --}}
                            {{-- <a href="{{route('messages.show', $result->id) }}" class="btn btn-info">Visualizza appartamento</a> --}}
                        {{-- </div> --}}
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
