<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>@yield('title') | Agence Lar</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Agence</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarNav" aria-controls="navBarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @php
            $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse" id="navBarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('proprety.index') }}" @class(['nav-link', 'active'=> str_contains($route, 'proprety.' )])>Biens</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>