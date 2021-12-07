@extends('layouts.app')
@section('title', 'Dettaglio Appartamento')

@section('content')

    <div class="container ">
        @if(session()->has('message'))
            <div class="alert alert-success ">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-warning">
            {{ session()->get('error') }}
        </div>
    @endif
        <div class="row d-flex flex-column ">
            <div class="col-lg-12 text-dark " >
                <div class="d-flex align-items-center h-100">
                    <div class="container text-center py-5">
                        <h2 class="mb-0">{{ $apartment->title }}</h2>
                    </div>
                </div>

                <section class="mb-5">

                    <div class="row">
                      <div class="col-md-6 mb-4 mb-md-0">

                        <div id="mdb-lightbox-ui"></div>

                        <div class="mdb-lightbox">

                          <div class="row product-gallery mx-1">

                            <div class="col-12 mb-0">
                              <figure class="view overlay rounded z-depth-1 main-img">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                  data-size="710x823">
                                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                    class="img-fluid z-depth-1">
                                </a>
                              </figure>

                            </div>

                          </div>

                        </div>

                      </div>
                      {{-- DETTAGLI DELL'APPARTAMENTO --}}
                      <div class="col-md-6">

                        <div class="table-responsive">

                          <table class="table table-sm table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Dimensioni</strong></th>
                                    <td>{{ $apartment->square_meters}} m²</td>
                                  </tr>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Camere</strong></th>
                                    <td>{{ $apartment->rooms }}</td>
                                  </tr>
                              <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Letti</strong></th>
                                <td>{{ $apartment->beds }}</td>
                              </tr>
                              <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Bagni</strong></th>
                                <td>{{ $apartment->bathrooms }}</td>
                              </tr>

                              <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Città</strong></th>
                                <td>{{ $apartment->city }}, Italia</td>
                                </tr>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Indirizzo</strong></th>
                                    <td>{{ $apartment->address }}</td>
                                </tr>
                                <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Servizi</strong></th>
                                <td>


                                    @if (($apartment->services)->isNotEmpty())
                                        @foreach ($apartment->services as $service)
                                            {{ $service->service_name . ',' }}
                                        @endforeach

                                    @else
                                        <p>Non ci sono servizi</p>
                                    @endif
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <hr>
                        <div class="table-responsive mb-2">
                          <table class="table table-sm table-borderless">
                            <tbody>
                              <tr>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    {{-- INVIA MESSAGGIO AL PROPRIETARIO --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-6 mb-4 mb-md-0 mt-4">
                                <h4>Scrivi al proprietario</h4>
                                <form action="{{ route('admin.messages.store')}}" method="post">
                                    @csrf
                                    {{-- CONTROLLI SE L'UTENTE E' PROPRIETARIO O REGISTRATO --}}
                                    @if (Auth::user() == null)
                                    <!--controllo se l'utente è il proprietario, se lo è disabilito il form-->
                                    @elseif ($apartment->user_id == Auth::user()->id)
                                        <fieldset disabled>
                                    @endif
                                    <div class="form-group message-form">
                                        <label for="exampleInputEmail1">La tua Mail</label>
                                        <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        @if (Auth::user() == null)
                                            placeholder="Inserisci la tua mail">
                                        {{-- se l'utente non è il proprietario inserisco la sua mail nell'input--}}
                                        @elseif ($apartment->user_id != Auth::user()->id)
                                            value="{{ Auth::user()->email }}">
                                        {{-- controllo se l'utente è il proprietario, se lo è inserisco il placeholder --}}
                                        @elseif ($apartment->user_id == Auth::user()->id)
                                            placeholder="Inserisci la tua mail">
                                        @endif
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- FORM --}}
                                    <div class="form-group message-form">
                                        <label for="exampleFormControlTextarea1">Il tuo messaggio</label>
                                        <textarea required class="form-control @error('message') is-invalid @enderror" name="text" id="exampleFormControlTextarea1" rows="3"  placeholder="Inserisci il tuo messaggio"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="text" name="apartment_id" value="{{ $apartment->id }}" hidden>
                                    <button
                                        @if (Auth::user() == null)
                                        {{-- controllo se l'utente è il proprietario, se lo è disabilito il bottone e l'hover --}}
                                        @elseif ($apartment->user_id == Auth::user()->id)
                                            class="btn btn-primary disabled" Style="pointer-events:none;"
                                        @endif
                                        type="submit" class="btn btn-primary">Invia</button>

                                </form>
                            </div>

                        </div>
                    </div>



                  </section>
            </div>
        </div>

    </div>
@endsection
