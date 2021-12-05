@extends('layouts.dashboard')
@section('title', 'Sponsorizza')



@section('content')
{{-- REINDIRIZZA ALLA PAGINA DEL PAGAMENTO  --}}

{{-- @dd($sponsorships)   --}}

{{-- EFFETTUARE L CICLO ED AGGIUSTARLO CON GLI EVENTUALI IF E TERNARI --}}
<div class="container">
    <div class="row text-dark">
        <div class="col-12 text-center">
            <h1 class="text-dark">
                Sponsorizza il tuo
                <a class="text-decoration-none" href="{{ route('admin.apartments.show', $id)}}">{{$id}}°</a>
                appartamento
            </h1>
        </div>
    </div>
</div>
<div class="container-fluid text-dark">
    <div class="row">
        {{-- <div class="col-12"> --}}
            <form action="{{ route('admin.sponsorships.store') }}" method="post" class="w-100 evenly flex-wrap mt-3">
                @csrf
                @method('POST')

                @foreach ($sponsorships as $sponsorship)
                        <div class="mycard text-center m-2 @if($sponsorship['name'] == 'bronze') bronze @elseif($sponsorship['name'] == 'silver') silver @else gold @endif ">
                            <h3 class="text-uppercase">{{ $sponsorship['name'] }}</h3>
                            <p>{{ $sponsorship['price'] }} €</p>
                            <p>Per {{ $sponsorship['duration'] }} ore in evidenza</p>
                            <a href="{{ route('admin.payment.process') }}">
                                <label class="btn btn-primary"  for="sponsorship">
                                    Acquista ora
                                    <input type="submit" id="sponsorship" name="sponsorship" value="{{ $sponsorship['id'] }}">
                                </label>
                            </a>

                        </div>
                @endforeach
            </form>
        {{-- </div> --}}
    </div>
</div>


        {{-- <div class="container">
            <div class="row text-dark d-flex justify-content-center ">
                <div class="col-12 text-center mb-4">
                    <h1 class="text-dark">
                        Sponsorizza il tuo
                        <a class="text-decoration-none" href="{{ route('admin.apartments.show', $id)}}">{{$id}}°</a>
                        appartamento
                    </h1>
                </div>
                <div class="col-12 col-lg-4 col-md-9 mb-3">
                    <div class="gradient-silver card text-center card_width d-flex justify-content-center">
                        <h3>Silver</h3>
                        <p>2,99 €</p>
                        <p>Per 24 ore in evidenza</p>
                        <label for="gold">
                        <input type="submit" value="1" name="gold" id="gold" class="btn btn-primary d-flex align-items-center justify-content-center mt-2">
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-md-9 mb-3">
                    <div class="gradient-gold card text-center card_width  d-flex justify-content-center">
                        <h3>Gold</h3>
                        <p>5,99 €</p>
                        <p>Per 72 ore in evidenza</p>
                        <button type="submit" value="2" class="btn d-flex align-items-center justify-content-center mt-2"><strong> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></strong></button>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-md-9 mb-3">
                    <div class="card text-center card_width gradient-plat d-flex justify-content-center">
                        <h3>Platinum</h3>
                        <p>9,99 €</p>
                        <p>Per 144 ore in evidenza</p>
                        <button type="submit" value="3" class="btn d-flex align-items-center justify-content-center mt-2"><strong> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></strong></button>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </form> --}}
{{--
    @dd($sponsorships)
<form action="{{route('admin.apartments.store')}}" method="post">
    @csrf
    @method('POST')

    <div class="mb-3 form-group" >
      <label for="id_appartamento" class="form-label">Id Appartamento</label>

    </div>




    <div class="form-group">
        <p>Scegli il tipo di sponsorizzazione :</p>
        @foreach ($sponsorships as $sponsorship)
            <div class="form-check form-check-inline">

                <input

                value="{{ $sponsorship['id'] }}" id="{{ 'tag' . $sponsorship['id'] }}" type="checkbox" name="sponsorship[]" class="form-check-input">
                <label for="{{ 'sponsorship' . $sponsorship['id'] }}" class="form-check-label">{{ $sponsorship['service_name'] }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary form-group">Inserisci Appartamento</button>
</form> --}}





@endsection
