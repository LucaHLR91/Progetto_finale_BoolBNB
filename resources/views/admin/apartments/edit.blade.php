@extends('layouts.dashboard')
@section('title', 'Modifica Appartamento')


@section('content')
<h1>Modifica il tuo appartamento</h1>

<form action="{{route('admin.apartments.update', $apartment['id'])}}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3 form-group">
        <label for="title" class="form-label">Titolo</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Inserisci titolo"
            class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $apartment['title']) }}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-3 form-group">
        <label for="beds" class="form-label">Numero Letti</label>
        <input name="beds" type="number" class="form-control" id="beds"
            class="form-control @error('beds') is-invalid @enderror" placeholder="Inserisci il numero dei posti letto" value="{{ old('beds', $apartment['beds']) }}">
        @error('beds')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-group">
        <label for="rooms" class="form-label">Numero Stanze</label>
        <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Inserisci il numero di stanze"
          class="form-control @error('rooms') is-invalid @enderror"  value="{{ old('rooms', $apartment['rooms']) }}">
        @error('rooms')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-group">
        <label for="bathrooms" class="form-label">Numero Bagni</label>
        <input name="bathrooms" type="number" class="form-control" id="bathrooms"
            class="form-control @error('bathrooms') is-invalid @enderror" placeholder="Inserisci il numero dei bagni" value="{{ old('bathrooms', $apartment['bathrooms']) }}">
        @error('bathrooms')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-group">
        <label for="square_meters" class="form-label">Metri Quadri</label>
        <input name="square_meters" type="number" class="form-control" id="square_meters"
            placeholder="Inserisci i metri quadri" class="form-control @error('square_meters') is-invalid @enderror" value="{{ old('square_meters', $apartment['square_meters']) }}">
        @error('square_meters')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-group">
        <label for="image" class="form-label">Foto</label>
        <input name="image" type="file" class="form-control" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <p>Disponibilità:</p>
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


    <div class="mb-3 form-group">
        <label for="address" class="form-label">Indirizzo</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo"
           class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $apartment['address']) }}">
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-group">
        <label for="city" class="form-label">Città</label>
        <input name="city" type="text" class="form-control" id="city" placeholder="Inserisci la città"
            class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $apartment['city']) }}">
        @error('city')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <p>Scegli i servizi:</p>
        @foreach ($services as $service)
        <div class="form-check form-check-inline">
            {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
            <input {{ in_array($service['id'], old('services', [])) ? 'checked' : null }} value="{{ $service['id'] }}"
                id="{{ 'service' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
            <label for="{{ 'service' . $service['id'] }}"
                class="form-check-label">{{ $service['service_name'] }}</label>
        </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary form-group">Modifica Appartamento</button>
</form>
@endsection
