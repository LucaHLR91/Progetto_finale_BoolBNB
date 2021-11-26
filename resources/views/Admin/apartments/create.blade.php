@extends('layouts.dashboard')

@section('content')
    <h1>Inserisci il tuo appartamento</h1>

    <form action="{{route('admin.apartments.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="mb-3 form-group" >
          <label for="title" class="form-label">Titolo</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Inserisci titolo">
        </div>

        <div class="mb-3 form-group" >
            <label for="beds" class="form-label">Numero Letti</label>
            <input name="beds" type="number" class="form-control" id="beds" placeholder="Inserisci il numero dei posti letto">
        </div>

        <div class="mb-3 form-group" >
            <label for="rooms" class="form-label">Numero Stanze</label>
            <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Inserisci il numero di stanze">
        </div>

        <div class="mb-3 form-group" >
            <label for="bathrooms" class="form-label">Numero Bagni</label>
            <input name="bathrooms" type="number" class="form-control" id="bathrooms" placeholder="Inserisci il numero dei bagni">
        </div>

        <div class="mb-3 form-group" >
            <label for="square_meters" class="form-label">Metri Quadri</label>
            <input name="square_meters" type="number" class="form-control" id="square_meters" placeholder="Inserisci i metri quadri">
        </div>

        <div class="mb-3 form-group" >
            <label for="image" class="form-label">Foto</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>

        {{-- <div class="mb-3 form-group">
            <div class="form-group">
                <label for="avaliability" class="form-label">Si</label>
                <input name="avaliability" type="radio" class="form-control" id="avaliability" value="1">
            </div>

            <div class="form-group">
                <label for="avaliability" class="form-label">No</label>
                <input name="avaliability" type="radio" class="form-control" id="avaliability" value="0">
            </div>
        </div> --}}
        <div class="form-group">
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
            <label for="address" class="form-label">Indirizzo</label>
            <input name="address" type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo">
        </div>

        <div class="mb-3 form-group" >
            <label for="city" class="form-label">Città</label>
            <input name="city" type="text" class="form-control" id="city" placeholder="Inserisci la città">
        </div>

        <div class="form-group">
            <p>Scegli i servizi:</p>
            @foreach ($services as $service)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input
                    {{ in_array($service['id'], old('services', [])) ? 'checked' : null }}
                    value="{{ $service['id'] }}" id="{{ 'tag' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}" class="form-check-label">{{ $service['service_name'] }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary form-group">Inserisci Appartamento</button>
      </form>
@endsection
