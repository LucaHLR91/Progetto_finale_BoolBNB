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
        @foreach ($sponsorships as $sponsorship)
            <div class="form-check form-check-inline">
                <input class="form-chek-input" value="{{ $sponsorship['id'] }}"
                    id="{{ 'sponsorship' . $sponsorship['id'] }}" type="radio" name="sponsorship[]"
                    class="form-check-input">
                <label for="{{ 'sponsorship' . $sponsorship['id'] }}" class="form-check-label">Tipo {{$sponsorship['id']}}
                    Durata {{$sponsorship['duration']}} Costo {{$sponsorship['price']}}</label>

            </div>
        @endforeach

    <button type="submit" class="btn btn-primary form-group">Sponsorizza</button>
</form>
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
