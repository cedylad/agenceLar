@extends('base')

@section('title', 'Accueil')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence Lor</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a sem et ante sollicitudin pulvinar non nec enim.<br>
            Mauris quam magna, laoreet non laoreet nec, rutrum egestas eros.</p>
    </div>
</div>

<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach($propreties as $proprety)
        <div class="col">
            @include('proprety.card')
        </div>
        @endforeach
    </div>
</div>

@endsection