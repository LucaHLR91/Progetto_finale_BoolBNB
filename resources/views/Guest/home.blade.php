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
                    {{-- dove andare --}}
                    <div class="col-md-4">
                        <label for="address" class="form-lable">Dove vuoi andare?</label>
                        <input type="search" id="address" name="address" class="form-control" placeholder="Indirizzo  Appartamento"/>
                    </div>

                    {{-- raggio --}}
                    {{-- <div class="col-md-4 d-flex flex-column">
                        <label for="slider-range" class="form-lable">Raggio di ricerca: </label>
                        <div class="d-felx">
                            <input id="slider-range" class="mt-2" name="range" type="range" min="0" max="100" value="20" oninput="this.nextElementSibling.value = this.value" />
                            <output class="ml-2"> 20 </output>
                            <span class="font-weight-bold ml-2">Km</span>
                        </div>
                    </div> --}}

                    {{-- stanze --}}
                    <div class="col-md-4">
                        <label for="room" class="form-lable">Numero stanze</label>
                        <input type="number" id="room" name="room" class="form-control" placeholder="Inserisci N°stanze" min="0"/>
                    </div>

                    {{-- letti --}}
                    <div class="col-md-4">
                        <label for="bed" class="form-lable">Posti letto</label>
                        <input type="number" id="bed" name="bed" class="form-control" placeholder="Inserisci N°letti" min="0"/>
                    </div>

                </div>
                <div class="row text-center pt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary form-group">Cerca</button>
                    </div>
                </div>
            </form>
        </div>  

    </div>
@endsection
