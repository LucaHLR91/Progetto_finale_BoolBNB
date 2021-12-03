@extends('layouts.dashboard')
@section('title', 'Sponsorizza Appartamento')


@section('content')
    <h1>Sponsorizza  il tuo appartamento</h1>

    <form action="{{route('admin.apartments.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="mb-3 form-group" >
          <label for="id_appartamento" class="form-label">Id Appartamento</label>
            <p>{{$apartment->id}}</p>
        </div>




        <div class="form-group">
            <p>Scegli il tipo di sponsorizzazione :</p>
            @foreach ($sponsorships as $sponsorship)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input
                    {{ in_array($sponsorship['id']) }}
                    value="{{ $sponsorship['id'] }}" id="{{ 'tag' . $sponsorship['id'] }}" type="checkbox" name="sponsorship[]" class="form-check-input">
                    <label for="{{ 'sponsorship' . $sponsorship['id'] }}" class="form-check-label">{{ $sponsorship['service_name'] }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary form-group">Inserisci Appartamento</button>
    </form>
@endsection
