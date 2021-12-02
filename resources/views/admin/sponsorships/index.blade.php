@extends('layouts.dashboard')
@section('title', 'Sponsorizza')
    


@section('content')

{{-- REINDIRIZZA ALLA PAGINA DEL PAGAMENTO  --}}
<form action="">
    <div class="container">
        <div class="row text-dark ">
            {{-- silver --}}
            <div class="col-12 col-md-4">
                <div class="card text-center p-5 card_width gradient-silver d-flex">
                    <h3>Silver</h3>    
                    <p>2,99 €</p>
                    <p>Per 24 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-4"> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></button>
                </div>
            </div>
            {{-- gold --}}
            <div class="col-12 col-md-4">
                <div class="card text-center p-5 card_width gradient-gold d-flex">
                    <h3>Gold</h3>    
                    <p>5,99 €</p>
                    <p>Per 72 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-4"> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></button>
                </div>
            </div>
            {{-- platinum --}}
            <div class="col-12 col-md-4">
                <div class="card text-center p-5 card_width gradient-plat d-flex">
                    <h3>Platinum</h3>    
                    <p>9,99 €</p>
                    <p>Per 144 ore in evidenza</p>
                    <button type="submit" class="btn d-flex align-items-center justify-content-center mt-4"> Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
