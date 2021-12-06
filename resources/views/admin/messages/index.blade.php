@extends('layouts.dashboard')
@section('title', 'Visualizza messaggi')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if ($messages->isEmpty())
                    <h3 class="text-dark">Non ci sono messaggi</h3>
                @else
                    @foreach ($messages as $message)

                        @if ($message->apartment_id == $apartment_id)

                            <div class="mb-2 p-4 bg-secondary rounded">
                                <h3>{{ $message->email }}</h3>
                                <p>{{ $message->text }}</p>
                                <small>{{ $message->date }}</small>
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection
