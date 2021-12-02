@extends('layouts.dashboard')
@section('content')

<div class="container text-dark justify-content-center">
    <div class="row justify-content-between">
        <div class=" justify-content-center pb-2">
            <div class="col-4 position-relative">
                <div class="card text-center p-5 card_width gradient-silver">
             
                    <h3>
                    <strong>Silver</strong>
                    </h3>    
                    <p class="h1">2,99 €</p>
                    <p>Per 24 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" justify-content-center pb-2 ">
            <div class="col-4 position-relative">
                <div class="card text-center p-5 gradient-gold card_width">
             
                    <h3>
                    <strong>Gold</strong>
                    </h3>   
                    <p class="h1">5,99 €</p>
                    <p>Per 72 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" justify-content-center pb-2">
            <div class="col-4 position-relative">
                <div class="card text-center p-5 card_width gradient-plat">
             
                    <h3>
                    <strong>Platinum</strong>
                    </h3>   
                    <p class="h1">9,99</p>
                    <p>Per 144 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Acquista ora <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
