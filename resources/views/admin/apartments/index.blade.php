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

            <table class="table text-dark ">
                <thead >
                  <tr class="">
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
                                <a href="{{ route('admin.sponsorships.create',['id'=> $apartment['id']]) }}" class="btn btn-success">Sponsorizza</a>
                            
                                <form action="{{ route('admin.apartments.destroy', $apartment['id']) }}" class="d-inline-block delete-post" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="confirm()">Elimina</button>
                                  
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

<script>
        function confirm() {
            Swal.fire({
                title: 'Vuoi eliminare questo annuncio?',
                text: "L'azione è irreversibile!",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't delete`,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/admin/apartments/' + {{ $apartment->id }})
                        .then(function (response) {
                            Swal.fire('Saved!', '', 'success')
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error.response.data);
                        });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    </script>
