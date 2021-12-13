@extends('layouts.app')
@section('title', 'Homepage')


@section('content')
<div class="container h-600">

    <query-form></query-form>
    <div class="col-12">
        <h3 class="text-dark text-center mt-4 mb-2">Appartamenti sponsorizzati </h3>
    </div>
    <div class="row my-3">
        <div class="col-12">
            {{-- @dd($apartments) --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                 @foreach( $apartments as $apartment )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                 @endforeach
                </ol>
              
                <div class="carousel-inner my-rounded max-height d-flex align-items-center" role="listbox">
                  @foreach( $apartments as $apartment )
                     <div class="carousel-item mh-100 {{ $loop->first ? 'active' : '' }}">
                         <img class="d-block w-100" src="{{ asset('storage/image_apartments/' . $apartment->image) }}" alt="{{ $apartment->title }}">
                         <div class="my-carousel-title">
                            <h3 class="m-0">{{ $apartment->title }}</h3>
                            <h4 class="m-0">{{ $apartment->city }}</h4>
                         </div>
                    </div>  
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    
</div>
@endsection
