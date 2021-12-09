<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Pagamento</title>
        
        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}

        {{-- collego l'app css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="wrapper pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h1>Aggiungi la tua carta</h1>
                    </div>
                    <div class="col-12 text-center">
                        <p>Stai acquistando la sponsorizzazione {{ucfirst($sponsorship_data['sponsorship_name'])}}</p>
                    </div>
                </div>
            </div>
            <div class="flex-center position-ref">
                {{-- @dd($sponsorship_data)     --}}
                <div class="content">
                    <form method="post" id="payment-form" action="{{ route('admin.checkout') }}">
                        @csrf
                        @method('POST')
                        <section>
                            <label for="amount">
                                <span class="input-label">Prezzo {{$sponsorship_data['sponsorship_price']}} €</span>
                                <div class="input-wrapper amount-wrapper">
                                    <input id="amount" name="amount" type="hidden" step="any" min="1" placeholder="Prezzo"  value="{{ floatval($sponsorship_data['sponsorship_price'])  +  0.99 }}">
                                </div>
                            </label>
    
                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>
                        <input type="hidden" id="apartment_id" name="apartment_id" value="{{ $sponsorship_data['apartment_id'] }}">
                        <input type="hidden" id="sponsorship_id" name="sponsorship_id" value="{{ $sponsorship_data['sponsorship_id'] }}">
                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="btn btn-primary" type="submit">Paga ora</button>
                    </form>
                </div>
            </div>
            <div class="col-12 mt-5 d-flex justify-content-end">
                <img class="w-25" src="https://res.cloudinary.com/practicaldev/image/fetch/s--EZs7UUTE--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/npiu494797ky06ir4nz0.png" alt="">
            </div>
        </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
        }, 
        function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
    </body>
</html>

   


