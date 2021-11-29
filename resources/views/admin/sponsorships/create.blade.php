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
        
        @foreach ($sponsorships as $sponsorship)
        <div class="form-check form-check-inline">
            <input {{ ($sponsorship['id']) }} value="{{ $sponsorship['id'] }}"
                id="{{ 'boost_type' . $sponsorship['id'] }}" type="checkbox" name="sponsorship[]" class="form-check-input">
            <label for="{{ 'sponsorship' . $sponsorship['id'] }}"
                class="form-check-label">Tipo {{$sponsorship['id']}}  Durata {{$sponsorship['duration']}} Costo {{$sponsorship['price']}}</label>
        </div>
        @endforeach


        <div class="form-group">
        <div style="background-color: white" id="dropin-container"></div>
        <button id="submit-button">Request payment method</button>
    </div>
    </div>

    <button type="submit" class="btn btn-primary form-group">Sponsorizza</button>
</form>
<script>
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
        authorization: '{{$clientToken}}',
        container: '#dropin-container'
    }, function (createErr, instance) {
        button.addEventListener('click', function () {
            console.log("test");
        });
    });

</script>
@endsection
