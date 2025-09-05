<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Adrify Validateur</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('validator.dashboard') }}" class="text-xl font-bold">Adrify - Validateur</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('validator.dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('validator.pending') }}" class="hover:underline">Adresses à valider</a></li>
                <li><a href="{{ route('validator.history') }}" class="hover:underline">Historique</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container mx-auto p-6 flex-grow">
        @yield('content')
    </main>

    <!-- Footer fixé en bas -->
    <footer class="bg-gray-800 text-white p-4 text-center mt-6">
        &copy; {{ date('Y') }} Adrify. Tous droits réservés.
    </footer>

</body>
</html>
