@extends('admin.admin')

@section('title', $proprety->exists ? "Editer un bien" : "Créer un bien")

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{ route($proprety->exists ? 'admin.proprety.update' : 'admin.proprety.store', $proprety) }}" method="post">

    @csrf
    @method($proprety->exists ? 'put' : 'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' =>'title', 'value' => $proprety->title])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'name' =>'surface', 'value' => $proprety->surface])
            @include('shared.input', ['class' => 'col', 'name' =>'price', 'label' => 'Prix', 'value' => $proprety->price])
        </div>
    </div>
    @include('shared.input', ['type' => 'textarea', 'name' =>'description', 'label' => 'Description', 'value' => $proprety->description])

    <div class="row">
        @include('shared.input', ['class' => 'col', 'name' =>'rooms', 'label' => 'Pièce', 'value' => $proprety->rooms])
        @include('shared.input', ['class' => 'col', 'name' =>'bedrooms', 'label' => 'Chambres', 'value' => $proprety->bedrooms])
        @include('shared.input', ['class' => 'col', 'name' =>'floor', 'label' => 'Etage', 'value' => $proprety->floor])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'name' =>'address', 'label' => 'Adresse', 'value' => $proprety->address])
        @include('shared.input', ['class' => 'col', 'name' =>'city', 'label' => 'Ville', 'value' => $proprety->city])
        @include('shared.input', ['class' => 'col', 'name' =>'postal_code', 'label' => 'Code postal', 'value' => $proprety->postal_code])
    </div>
    @include('shared.select', ['name' =>'options', 'label' => 'Options', 'value' => $proprety->options()->pluck('id'), 'multiple' => true])
    @include('shared.checkbox', ['name' =>'sold', 'label' => 'Vendu', 'value' => $proprety->sold, 'options' => $options])
    <div>
        <button class="btn btn-primary">
            @if($proprety->exists)
            Modifier
            @else
            Créer
            @endif
        </button>
    </div>
</form>

@endsection