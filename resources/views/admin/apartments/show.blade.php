@extends('layouts.dashboard')
@section('title', 'Dettaglio Appartamento')

@section('content')

    <div class="container ">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome Appartamento</th>
                        <th scope="col">Servizi</th>
                        <th scope="col">Messaggi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $apartment->title }}
                        </td>
                        <td>
                            @foreach ($apartment->services as $service)
                                <p>{!! $service->service_name !!}</p>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.messages.index', ['id'=> $apartment['id']]) }}" class="btn btn-primary">Visualizza Messaggi</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@endsection