@extends('layouts.dashboard')
@section('title', 'I Tuoi Appartamenti')


@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12 p-0">
            {{-- COMANDO GENERALE PER STAMPARE IL RISULTATO DI UNA OPERAZIONE DI CREAZIONE, CANCELLAZIONE ECC, POTREI NEI METODI WITH DEFINIRE NOMI DIVERSI E DARE CLASSI DIVERSE PER CAMBIARE COLORE AL MESSAGGIO  --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

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

            <table class="table text-dark ">
                <thead >
                  <tr class="">
                    <th scope="col">Titolo</th>
                    <th scope="col">Via</th>
                    <th scope="col">Città</th>
                    <th scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <td>{{ $apartment['title'] }}</td>
                            <td>{{ $apartment['address'] }}</td>
                            <td>{{ $apartment['city'] }}</td>
                            <td>
                                <a href="{{ route('admin.apartments.show', $apartment['id']) }}" class="btn btn-info my-1 my-w">Dettagli</a>
                                <a href="{{ route('admin.apartments.edit', $apartment['id']) }}" class="btn btn-warning my-1 my-w">Modifica</a>
                                <a href="{{ route('admin.sponsorships.index',['id'=> $apartment['id']]) }}" class="btn btn-success my-1 my-w">Sponsorizza</a>

                                <form action="{{ route('admin.apartments.destroy', $apartment['id']) }}" class="d-inline-block delete-post" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- LA CLASSE DELETE-POST CI SERVIRA PER RICHIEDERE CONFERMA DI CANCELLAZIONE TRAMITE IL JS, NON AVRA NULLA DI CSS  --}}
                                    <button type="submit" class="btn btn-danger my-1 my-w">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

    {{-- utente registrato --}}
@endsection
