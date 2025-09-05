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
