@extends('layouts.app')
@section('title', 'Dettaglio Appartamento')

@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-lg-4 form-house">
                <h3>Scrivi al proprietario</h3>
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
                            <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror"       id="exampleInputEmail1" aria-describedby="emailHelp"
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
@endsection
