<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mon Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">📍 AppLocalisation</a>
            <div>
                {{-- <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('adresses.index') }}">Adresses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reperes.index') }}">Repères</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('validations.index') }}">Validations</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('partages.index') }}">Partages</a></li>
                </ul> --}}
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
