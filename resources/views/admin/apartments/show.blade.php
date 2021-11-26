@extends('layouts.dashboard')

@section('content')


<div class="container ">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome Appartamento</th>
                    <th scope="col">Servizi</th>
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

                </tr>

            </tbody>
        </table>
    </div>

</div>

@endsection



