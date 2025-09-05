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

@auth
    @if(auth()->user()->role == 'admin')
        <div class="flex">

            <!-- Sidebar Admin -->
            <div class="w-64 h-screen bg-gray-800 text-gray-100 fixed">
                <div class="p-4 text-xl font-bold border-b border-gray-700">
                    Adrify - Admin
                </div>
                <nav class="mt-4">
                    <ul>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-2">
                                <span>Utilisateurs</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.addresses.index') }}" class="flex items-center space-x-2">
                                <span>Adresses</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.validations.index') }}" class="flex items-center space-x-2">
                                <span>Validations</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.reports.index') }}" class="flex items-center space-x-2">
                                <span>Signalements</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.shares.index') }}" class="flex items-center space-x-2">
                                <span>Partages</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-2">
                                <span>Paramètres</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 mt-4 hover:bg-gray-700">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="w-full text-left">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Contenu principal -->
            <div class="flex-1 ml-64">

                <!-- Header -->
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    <div class="text-xl font-bold">Admin Dashboard</div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Connecté : {{ auth()->user()->nom }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Déconnexion</button>
                        </form>
                    </div>
                </header>

                <!-- Page content -->
                <main class="p-6">
                    @yield('content')
                </main>

            </div>

        </div>
    @else
        <!-- Contenu pour utilisateurs normaux ou validateurs -->
        <div class="p-6">
            @yield('content')
        </div>
    @endif
@else
    <!-- Contenu pour invités -->
    <div class="p-6">
        @yield('content')
    </div>
@endauth

</body>
</html>
