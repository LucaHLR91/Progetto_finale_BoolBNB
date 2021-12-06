@extends('layouts.dashboard')
@section('title', 'Sponsorizza')



@section('content')
{{-- REINDIRIZZA ALLA PAGINA DEL PAGAMENTO  --}}

{{-- @dd($sponsorships)   --}}

{{-- EFFETTUARE L CICLO ED AGGIUSTARLO CON GLI EVENTUALI IF E TERNARI --}}
<div class="container">
    <div class="row text-dark">
        <div class="col-12 text-center">
            <h1 class="text-dark">Sponsorizza il tuo appartamento</h1>
        </div>
    </div>
</div>
<div class="container-fluid text-dark">
    <div class="row">
        <form action="{{ route('admin.sponsorships.store') }}" method="post" class="w-100 evenly flex-wrap mt-3">
            @csrf
            @method('POST')
    
            @foreach ($sponsorships as $sponsorship)
                    <div class="mycard text-center m-2 @if($sponsorship['name'] == 'bronze') bronze @elseif($sponsorship['name'] == 'silver') silver @else gold @endif ">
                        <h3 class="text-uppercase">{{ $sponsorship['name'] }}</h3>
                        <p>{{ $sponsorship['price'] }} €</p>
                        <p>Per {{ $sponsorship['duration'] }} ore in evidenza</p>
                        <label class="btn btn-primary"  for="sponsorship">
                            Acquista ora
                            <input type="submit" id="sponsorship" name="sponsorship" value="{{ $sponsorship['id'] }}">
                        </label>
                    </div>
            @endforeach
        </form>
    </div>
</div>
@endsection
