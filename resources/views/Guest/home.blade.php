@extends('layouts.app')
@section('title', 'Homepage')


@section('content')
    <div class="container h-600">
        {{-- FORM PER INVIO POST SEARCH --}}
        <div class="form">
            <form class="" action="{{route('search')}}" method="post">
                @csrf
                @method('POST')

                <div class="row">
                    {{-- dove andare --}}
                    <div class="col-md-4">
                        <label for="city" class="form-lable">Dove vuoi andare?</label>
                        <input type="search" id="city" name="city" class="form-control" placeholder="Inserisci la Città"/>
                    </div>


                    {{-- RIPRENDERE IL SEGUENTE CODICE PER LA RICERCA AVANZATA  --}}
                    {{-- raggio --}}
                    {{-- <div class="col-md-3 d-flex flex-column">
                        <label for="slider-range" class="form-lable">Raggio di ricerca: </label>
                        <div class="d-felx">
                            <input id="slider-range" class="mt-2" name="range" type="range" min="0" max="100" value="20" oninput="this.nextElementSibling.value = this.value" />
                            <output class="ml-2"> 20 </output>
                            <span class="font-weight-bold ml-2">Km</span>
                        </div>
                    </div> --}}

                    {{-- stanze --}}
                    <div class="col-md-4">
                        <label for="rooms" class="form-lable">Numero stanze</label>
                        <input type="number" id="rooms" name="rooms" class="form-control" placeholder="Inserisci N°stanze" min="0"/>
                    </div>

                    {{-- letti --}}
                    <div class="col-md-4">
                        <label for="beds" class="form-lable">Posti letto</label>
                        <input type="number" id="beds" name="beds" class="form-control" placeholder="Inserisci N°letti" min="0"/>
                    </div>

                </div>
                <div class="row text-center pt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary form-group">Cerca</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row my-3">
            <div class="col 12">
                <div id="house_carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#house_carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#house_carousel" data-slide-to="1"></li>
                        <li data-target="#house_carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner my-rounded max-height d-flex align-items-center">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://media.istockphoto.com/photos/beautiful-luxury-home-exterior-at-sunset-featuring-large-covered-picture-id1208206114?k=20&m=1208206114&s=612x612&w=0&h=kD-KC6BhYB77xoq_5lvDEJe6NrA9iL5r2-UAsFtig0I=" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://imagesvc.meredithcorp.io/v3/jumpstartpure/image?url=https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/8d913bb0-aa78-460a-ad59-2603ff2491ea/894eda0e-b137-4eba-9328-6ecdc2040923/1280x720/match/image.jpg&w=1280&h=720&q=90&c=cc" alt="Third slide">
                        </div>
                        <a class="carousel-control-prev" href="#house_carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#house_carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
