@extends('layouts.app')
@section('title', 'Pagina di Ricerca')

@section('content')
    {{-- @dd($form_apartment) --}}
    <div class="container text-dark">
        <div class="row">
            <div class="col-12">
                {{ $form_apartment['city'] }}
            </div>
        </div>
    </div>
@endsection