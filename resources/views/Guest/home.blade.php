@extends('layouts.app')
@section('title', 'Homepage')


@section('content')
    <div class="container">
        {{-- FORM PER INVIO POST SEARCH --}}
        <div class="form">
            <form class="" {{-- action="{{route('guest.home.search')}}" --}} method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-8">
                        <label for="address" class="form-lable">Dove vuoi andare?</label>
                        <input type="search" id="address" name="address" class="form-control" placeholder="Indirizzo  Appartamento"/>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="slider-range" class="form-lable">Raggio di ricerca: </label>
                        <input id="slider-range" class="d-flex" name="range" type="range" min="0" max="100" value="20" oninput="this.nextElementSibling.value = this.value" />
                        <output class="ml-2"> 20 </output>
                        <span class="font-weight-bold ml-2">Km</span>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary form-group">Cerca</button>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary form-group">Ricerca avanzata</button>
                    </div>
                </div>
            </form>
        </div>  

    </div>
@endsection
