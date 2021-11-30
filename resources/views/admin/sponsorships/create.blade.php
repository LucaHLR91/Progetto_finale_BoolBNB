@extends('layouts.dashboard')
@section('title', 'Sponsorizza Appartamento')


@section('content')
<h1>Sponsorizza il tuo appartamento</h1>

<form action="{{route('admin.sponsorships.store')}}" method="post">
    @csrf
    @method('POST')

    <div class="mb-3 form-group">
        <label for="id_appartamento" class="form-label">Id Appartamento</label>
        <p>{{$apartment['id']}}</p>
    </div>


    <div class="form-group">
        <p>Scegli il tipo di sponsorizzazione :</p>
        <input type="hidden" name="id_appartamento" value="{{$apartment['id']}}">
        <div class="row">
        @foreach ($sponsorships as $sponsorship)
            <div class="col-md-4">
            <div class="form-check form-check-inline">
                <input class="form-chek-input" value="{{ $sponsorship['duration'] }}"
                    id="{{ 'sponsorship' . $sponsorship['id'] }}" type="radio" name="sponsorship[]"
                    class="form-check-input">
                <label for="{{ 'sponsorship' . $sponsorship['id'] }}" class="form-check-label">Tipo {{$sponsorship['id']}}
                    Durata {{$sponsorship['duration']}} Costo {{$sponsorship['price']}}</label>

            </div>
            </div>
        @endforeach
        </div>
    </form>   

   
        <button type="submit" class="btn btn-primary">Sponsorizza</button>
  
    
<script>
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
        authorization: '{{$clientToken}}',
        container: '#dropin-container'
    }, function (createErr, instance) {
        button.addEventListener('click', function () {
            //
        });
    });

</script>
@endsection
