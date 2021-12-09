@extends('layouts.dashboard')
@section('title', 'Sponsorizza')



@section('content')
{{-- REINDIRIZZA ALLA PAGINA DEL PAGAMENTO  --}}



{{--IF PER FAR VISUALIZZARE O MENO LE SPONSORIZZAZIONI  --}}

@if ($apartment->sponsorships->isEmpty())
    <div class="container">
        <div class="row text-dark">
            <div class="col-12 text-center">
                <h1 class="text-dark">Sponsorizza il tuo appartamento</h1>
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
                            <input type="hidden" id="sponsorship_price" name="sponsorship_price" value="{{ $sponsorship['price'] }}">
                            <input type="hidden" id="sponsorship_name" name="sponsorship_name" value="{{ $sponsorship['name'] }}">
                            <button type="submit" class="btn btn-primary" >Acquista Ora</button>
                        </div>
                </form>
            @endforeach   
        </div>
    </div>
@else
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="text-dark">Hai già sponsorizzato questo appartamento</h1>
        </div>
    </div>
</div>
@endif
@endsection
