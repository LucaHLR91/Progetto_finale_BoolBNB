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

            <table class="table-responsive text-dark ">
                <thead >
                  <tr class="">
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Title</th>
                    <th class="text-center" scope="col">Address</th>
                    <th class="text-center" scope="col">City</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr class=" ">
                            <td scope="row" class="align-top px-3 pb-3">{{ $apartment['id'] }}</td>
                            <td class="align-top px-3 pb-3 text-center">{{ $apartment['title'] }}</td>
                            <td class="align-top px-3 pb-3 text-center">{{ $apartment['address'] }}</td>
                            <td class="align-top px-3 pb-3 text-center">{{ $apartment['city'] }}</td>
                            <td  class="align-top px-3 pb-3 align-start text-center">
                                <a href="{{ route('admin.apartments.show', $apartment['id']) }}" class="btn btn-info mb-2">Dettagli</a>
                                <a href="{{ route('admin.apartments.edit', $apartment['id']) }}" class="btn btn-warning mb-2">Modifica</a>
                                <a href="{{ route('admin.sponsorships.index',['id'=> $apartment['id']]) }}" class="btn btn-success mb-2">Sponsorizza</a>

                                <form action="{{ route('admin.apartments.destroy', $apartment['id']) }}" class="d-inline-block mb-2 delete-post" method="post">
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
