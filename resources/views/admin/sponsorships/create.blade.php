@extends('layouts.dashboard')

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
            @foreach ($sponsors as $sponsor)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input
                    {{ in_array($sponsor['id'] }}
                    value="{{ $sponsor['id'] }}" id="{{ 'tag' . $sponsor['id'] }}" type="checkbox" name="sponsors[]" class="form-check-input">
                    <label for="{{ 'sponsor' . $sponsor['id'] }}" class="form-check-label">{{ $sponsor['service_name'] }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary form-group">Inserisci Appartamento</button>
      </form>
@endsection
