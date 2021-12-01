@extends('layouts.dashboard')
@section('title', 'Crea Appartamento')
 
 
@section('content')
<h1 class="text-dark">Inserisci il tuo appartamento</h1>
 
<form action="{{route('admin.apartments.store')}}" method="post" class="text-dark">
    @csrf
    @method('POST')
 
    <div class="mb-3 form-group">
        <label for="title" class="form-label"><h4>Titolo</h4></label>
        <input name="title" type="text" class="form-control" id="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="Inserisci titolo" value="{{ old('title')}}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="beds" class="form-label"><h4>Numero Letti</h4></label>
        <input name="beds" type="number" class="form-control" id="beds" class="form-control @error('beds') is-invalid @enderror"
            placeholder="Inserisci il numero dei posti letto" value="{{ old('beds') }}">
        @error('beds')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="rooms" class="form-label"><h4>Numero Stanze</h4></label>
        <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Inserisci il numero di stanze"
            class="form-control @error('rooms') is-invalid @enderror" value="{{ old('rooms') }}">
        @error('rooms')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="bathrooms" class="form-label"><h4>Numero Bagni</h4></label>
        <input name="bathrooms" type="number" class="form-control" id="bathrooms"
            placeholder="Inserisci il numero dei bagni" class="form-control @error('bathrooms') is-invalid @enderror" value="{{ old('bathrooms') }}">
         @error('bathrooms')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="square_meters" class="form-label"><h4>Metri Quadri</h4></label>
        <input name="square_meters" type="number" class="form-control" id="square_meters"
            placeholder="Inserisci i metri quadri" class="form-control @error('square_meters') is-invalid @enderror" value="{{ old('square_meters') }}">
        @error('square_meters')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="image" class="form-label"><h4>Foto</h4></label>
        <input name="image" type="file" class="form-control" class="form-control @error('image') is-invalid @enderror" id="image">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
    
    <div class="mb-3 form-group">
        <label for="address" class="form-label"><h4>Indirizzo</h4></label>
        <input name="address" type="text" id="address" placeholder="Inserisci l'indirizzo"
           class="form-control  @error('address') is-invalid @enderror" value="{{ old('address') }}">
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="mb-3 form-group">
        <label for="city" class="form-label"><h4>Città</h4></label>
        <input name="city" type="text" class="form-control" id="city" placeholder="Inserisci la città"
            class="form-control  @error('city') is-invalid @enderror" value="{{ old('city') }}">
         @error('city')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 
    <div class="form-group">
        <h4>Scegli i servizi:</h4>
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
 
    <button type="submit" class="btn btn-primary form-group">Inserisci Appartamento</button>
</form>
@endsection