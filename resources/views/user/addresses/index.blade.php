@extends('layouts.app')

@section('title', 'Mes adresses')

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.dashboard') }}" class="font-bold text-xl text-blue-600">Adrify</a>
                <a href="{{ route('user.addresses') }}" class="text-gray-700 hover:text-blue-600">Adresses</a>
                <a href="{{ route('user.reports') }}" class="text-gray-700 hover:text-blue-600">Mes signalements</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.profile') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Profil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Mes adresses</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <a href="{{ route('user.addresses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700">Créer une adresse</a>

        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">Adrify Code</th>
                    <th class="border px-2 py-1">Description</th>
                    <th class="border px-2 py-1">Repère local</th>
                    <th class="border px-2 py-1">Statut</th>
                    <th class="border px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($addresses as $address)
                <tr class="hover:bg-gray-100">
                    <td class="border px-2 py-1">{{ $address->adrify_code }}</td>
                    <td class="border px-2 py-1">{{ $address->description }}</td>
                    <td class="border px-2 py-1">{{ $address->repere_local }}</td>
                    <td class="border px-2 py-1">{{ ucfirst($address->statut) }}</td>
                    <td class="border px-2 py-1 space-x-2">
                        <a href="{{ route('user.addresses.edit', $address) }}" class="text-blue-600 hover:underline">Modifier</a>
                        <form action="{{ route('user.addresses.destroy', $address) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cette adresse ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                        <a href="{{ route('user.addresses.share', $address) }}" class="text-green-600 hover:underline">Partager</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4">Aucune adresse créée</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $addresses->links() }}
        </div>
    </div>
</div>
@endsection
