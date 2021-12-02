@extends('layouts.dashboard')

@section('content')
<div class="container text-dark justify-content-center">
    <div class="row justify-content-between">
        <div class=" justify-content-center pb-2">
            <div class="col-4 position-relative">
                <div class="card text-center p-5" style="width: 20rem">
             
                    <h3>
                    <strong>Standard</strong>
                    </h3>   
                    <p class="h1">2,99 €</p>
                    <p>Per 24 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Order Now <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" justify-content-center pb-2">
            <div class="col-4 position-relative">
                <div class="card text-center p-5" style="width: 20rem;">
             
                    <h3>
                    <strong>Super</strong>
                    </h3>   
                    <p class="h1">5,99 €</p>
                    <p>Per 72 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Order Now <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" justify-content-center pb-2">
            <div class="col-4 position-relative">
                <div class="card text-center p-5" style="width: 20rem;">
             
                    <h3>
                    <strong>Premium</strong>
                    </h3>   
                    <p class="h1">9,99</p>
                    <p>Per 144 ore in evidenza</p>

                    <div class="btn-container d-flex justify-content-center mt-4">
                    <button type="button" class="btn">
                        Order Now <i class="fas fa-long-arrow-alt-right ms-3"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
