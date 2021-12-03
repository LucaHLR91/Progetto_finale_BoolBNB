@extends('layouts.dashboard')
@section('title', 'Sponsorizza')



@section('content')
{{-- REINDIRIZZA ALLA PAGINA DEL PAGAMENTO  --}}
<form action="{{ route('admin.apartments.store') }}" method="post">
    @csrf
    @method('POST')
    <div class="container">
        <div class="row text-dark d-flex justify-content-center ">
            <div class="col-12 text-center mb-4">
                <h1 class="text-dark">
                    Sponsorizza il tuo
                    <a class="text-decoration-none" href="{{ route('admin.apartments.show', $id)}}">{{$id}}°</a>
                     appartamento</h1>
            </div>
            {{-- silver --}}
            <div class="col-12 col-lg-4 col-md-9 mb-3">
                <div class="gradient-silver card text-center card_width d-flex justify-content-center">
                    <h3>Silver</h3>
                    <p>2,99 €</p>
                    <p>Per 24 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-2"><strong> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></strong></button>
                </div>
            </div>
            {{-- gold --}}
            <div class="col-12 col-lg-4 col-md-9 mb-3">
                <div class="gradient-gold card text-center card_width  d-flex justify-content-center">
                    <h3>Gold</h3>
                    <p>5,99 €</p>
                    <p>Per 72 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-2"><strong> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></strong></button>
                </div>
            </div>
            {{-- platinum --}}
            <div class="col-12 col-lg-4 col-md-9 mb-3">
                <div class="card text-center card_width gradient-plat d-flex justify-content-center">
                    <h3>Platinum</h3>
                    <p>9,99 €</p>
                    <p>Per 144 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-2"><strong> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></strong></button>
                </div>
            </div>
        </div>
    </div>
</form>



{{-- <form action="{{route('admin.apartments.store')}}" method="post">
    @csrf
    @method('POST') --}}


@endsection
