@extends('admin.admin')

@section('title', 'Tous les bien')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.proprety.create') }}" class="btn btn-primary"> Ajouter un bien</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($propreties as $proprety)
        <tr>
            <td>{{ $proprety->title }}</td>
            <td>{{ $proprety->surface }} m2</td>
            <td>{{ number_format($proprety->price, thousands_separator: ' ') }}</td>
            <td>{{ $proprety->city }}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route ('admin.proprety.edit', $proprety) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('admin.proprety.destroy', $proprety) }}" method="post">
                        @csrf
                        @method("delete")

                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $propreties->links() }}
@endsection