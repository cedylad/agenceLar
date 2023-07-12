@extends('base')

@section('title', $proprety->title)

@section('content')

<div class="container mt-4">

    <h1>{{ $proprety->titile }}</h1>
    <h2>{{ $proprety->rooms }} pièces - {{ $proprety->surface}} m2</h2>

    <div class="text-prilmary fw-bold" style="font-size: 4rem;">
        {{ number_format($proprety->price, thousands_separator: ' ')}} €
    </div>

    <hr>
    <div class="mt_4">
        <h4>Intéressé par ce bien ?</h4>

        @include('shared.flash')

        <form action="{{ route('proprety.contact', $proprety) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'name' =>'lastname', 'label' => 'Nom'])
                @include('shared.input', ['class' => 'col', 'name' =>'firstname', 'label' => 'Prénom'])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col', 'name' =>'phone', 'label' => 'Téléphone'])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' =>'email', 'label' => 'Email'])
            </div>
            @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' =>'message', 'label' => 'Votre message'])
            <button class="btn btn-primary">
                Nous contacter
            </button>
        </form>
    </div>

    <div class="mt-4">

        <p>{{ nl2br($proprety->description) }}</p>

        <div class="row">
            <div class="col-8">
                <h2>Caractéristiques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surfaces</td>
                        <td>{{ $proprety->surface }} m2</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{ $proprety->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{ $proprety->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{ $proprety->floor ?: 'Rez-de-chaussé' }}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $proprety->address }} <br>
                            {{ $proprety->city }} ({{ $proprety->postal_code }})
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-4">

                <h2>Spécificités</h2>

                <ul class="list-group">
                    @foreach($proprety->options as $option)
                    <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection