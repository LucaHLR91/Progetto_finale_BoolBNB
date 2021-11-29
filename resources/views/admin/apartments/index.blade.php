@extends('layouts.dashboard')
@section('title', 'I Tuoi Appartamenti')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            {{-- COMANDO GENERALE PER STAMPARE IL RISULTATO DI UNA OPERAZIONE DI CREAZIONE, CANCELLAZIONE ECC, POTREI NEI METODI WITH DEFINIRE NOMI DIVERSI E DARE CLASSI DIVERSE PER CAMBIARE COLORE AL MESSAGGIO  --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <td scope="row">{{ $apartment['id'] }}</td>
                            <td>{{ $apartment['title'] }}</td>
                            <td>{{ $apartment['address'] }}</td>
                            <td>{{ $apartment['city'] }}</td>
                            <td>
                                <a href="{{ route('admin.apartments.show', $apartment['id']) }}" class="btn btn-info">Dettagli</a>
                                <a href="{{ route('admin.apartments.edit', $apartment['id']) }}" class="btn btn-warning">Modifica</a>
                              {{--   <a href="{{ route('admin.sponsorships.index',['id'=> $apartment['id']]) }}" class="btn btn-success">Sponsorizza</a> --}}
                                <a href="{{ route('admin.sponsorships.create',['id'=> $apartment['id']]) }}" class="btn btn-success">Sponsorizza</a>
                            
                                <form action="{{ route('admin.apartments.destroy', $apartment['id']) }}" class="d-inline-block delete-post" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- LA CLASSE DELETE-POST CI SERVIRA PER RICHIEDERE CONFERMA DI CANCELLAZIONE TRAMITE IL JS, NON AVRA NULLA DI CSS  --}}
                                    <button type="submit" class="btn btn-danger">Elimina</button>
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
