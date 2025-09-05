@extends('layouts.app')

@section('title', 'Mes partages')

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

    <!-- Contenu principal -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Mes partages</h1>

        @if($shares->count())
            <div class="overflow-x-auto bg-white shadow-md rounded p-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-2 py-1">Adrify Code</th>
                            <th class="border px-2 py-1">Type</th>
                            <th class="border px-2 py-1">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shares as $share)
                        <tr>
                            <td class="border px-2 py-1">{{ $share->address->adrify_code }}</td>
                            <td class="border px-2 py-1">{{ $share->type }}</td>
                            <td class="border px-2 py-1">{{ $share->date_partage }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $shares->links() }}
            </div>
        @else
            <div class="bg-white shadow-md rounded p-4">
                <p class="text-gray-700">Aucun partage effectué pour le moment.</p>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('user.addresses.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Créer une nouvelle adresse</a>
        </div>
    </div>
</div>
@endsection
