<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Utilisateur - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen flex flex-col">
        <!-- Logo / Titre -->
        <div class="p-4 text-center font-bold text-xl border-b border-gray-700">
            Utilisateur
        </div>

        <!-- Navigation -->
        <nav class="flex-1 mt-4">
            <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">🏠 Tableau de bord</a>
            <a href="{{ route('user.addresses.index') }}" class="block px-4 py-2 hover:bg-gray-700">📍 Mes adresses</a>
            <a href="{{ route('user.shares.index') }}" class="block px-4 py-2 hover:bg-gray-700">🔗 Mes partages</a>
            <a href="{{ route('user.validations.index') }}" class="block px-4 py-2 hover:bg-gray-700">✅ Mes validations</a>
            <a href="{{ route('user.settings') }}" class="block px-4 py-2 hover:bg-gray-700">⚙️ Paramètres</a>
        </nav>

        <!-- Bouton déconnexion -->
        <div class="p-4 border-t border-gray-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 py-2 rounded text-center">Déconnexion</button>
            </form>
        </div>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
