@extends('layouts.dashboard')
@section('title', 'Modifica Appartamento')


@section('content')
    <h1 class="text-dark">Modifica il tuo appartamento</h1>

    <form action="{{route('admin.apartments.update', $apartment['id'])}}" method="post" class="text-dark">
        @csrf
        @method('PUT')

        <div class="mb-3 form-group" >
          <label for="title" class="form-label"><h4>Titolo</h4></label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Inserisci titolo" value="{{ old('title', $apartment['title']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="beds" class="form-label"><h4>Numero Letti</h4></label>
            <input name="beds" type="number" class="form-control" id="beds" placeholder="Inserisci il numero dei posti letto" value="{{ old('beds', $apartment['beds']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="rooms" class="form-label"><h4>Numero Stanze</h4></label>
            <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Inserisci il numero di stanze" value="{{ old('rooms', $apartment['rooms']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="bathrooms" class="form-label"><h4>Numero Bagni</h4></label>
            <input name="bathrooms" type="number" class="form-control" id="bathrooms" placeholder="Inserisci il numero dei bagni" value="{{ old('bathrooms', $apartment['bathrooms']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="square_meters" class="form-label"><h4>Metri Quadri</h4></label>
            <input name="square_meters" type="number" class="form-control" id="square_meters" placeholder="Inserisci i metri quadri" value="{{ old('square_meters', $apartment['square_meters']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="image" class="form-label"><h4>Foto</h4></label>
            <input name="image" type="file" class="form-control" id="image">
        </div>

        <div class="form-group">
            <h4>Disponibilità:</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="avaliability" id="available" value="1" checked>
                <label class="form-check-label" for="available">
                    Disponibile
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="avaliability" id="no-available" value="0">
                <label class="form-check-label" for="no-available">
                    Non disponibile
                </label>
            </div>
        </div>


        <div class="mb-3 form-group" >
            <label for="address" class="form-label"><h4>Indirizzo</h4></label>
            <input name="address" type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo" value="{{ old('address', $apartment['address']) }}">
        </div>

        <div class="mb-3 form-group" >
            <label for="city" class="form-label"><h4>Città</h4></label>
            <input name="city" type="text" class="form-control" id="city" placeholder="Inserisci la città" value="{{ old('city', $apartment['city']) }}">
        </div>

        <div class="form-group">
            <h4>Scegli i servizi:</h4>
            @foreach ($services as $service)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input
                    {{$apartment->services->contains($service) ? 'checked' : null }}
                    value="{{ $service['id'] }}" id="{{ 'service' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}" class="form-check-label">{{ $service['service_name'] }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary form-group">Modifica Appartamento</button>
      </form>
@endsection
