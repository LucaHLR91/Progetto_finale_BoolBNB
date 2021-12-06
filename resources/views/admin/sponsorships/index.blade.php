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
    <div class="row justify-content-center">
        
        @foreach ($sponsorships as $sponsorship)
            <form action="{{ route('admin.sponsorships.store') }}" method="post" class="evenly flex-wrap mt-3">
                @csrf
                @method('POST')
                    <div class="mycard text-center m-2 @if($sponsorship['name'] == 'bronze') bronze @elseif($sponsorship['name'] == 'silver') silver @else gold @endif ">
                        <h3 class="text-uppercase">{{ $sponsorship['name'] }}</h3>
                        <p>{{ $sponsorship['price'] }} €</p>
                        <p>Per {{ $sponsorship['duration'] }} ore in evidenza</p>
                        <input type="hidden" id="apartment_id" name="apartment_id" value="{{ $id }}">
                        <input type="hidden" id="sponsorship_id" name="sponsorship_id" value="{{ $sponsorship['id'] }}">
                        <button type="submit" class="btn btn-primary" >Acquista Ora</button>
                    </div>
            </form>
        @endforeach
    </div>
</div>
@endsection
