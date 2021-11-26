@extends('layouts.dashboard')

@section('content')
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{$apartment->title}}</li>
        @endforeach
    </ul>

    {{-- utente registrato --}}
@endsection