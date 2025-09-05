<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Adrify</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">Adrify</a>
            <nav>
                <a href="{{ route('home') }}" class="mr-4 hover:underline">Accueil</a>
                <a href="{{ route('about') }}" class="mr-4 hover:underline">À propos</a>
                <a href="{{ route('contact') }}" class="mr-4 hover:underline">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="mr-4 hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="mr-4 hover:underline">Inscription</a>
                @else
                    <span>Bonjour, {{ Auth::user()->nom }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-2 underline">Déconnexion</button>
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Foote
