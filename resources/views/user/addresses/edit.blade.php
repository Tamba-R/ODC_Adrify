@extends('layouts.app')

@section('title', 'Modifier adresse')

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.dashboard') }}" class="font-bold text-xl text-blue-600">Adrify</a>
                <a href="{{ route('user.addresses') }}" class="text-gray-700 hover:text-blue-600">Mes adresses</a>
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

    <!-- Formulaire -->
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded p-6 max-w-xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Modifier l'adresse</h1>

            @if($errors->any())
                <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.addresses.update', $address) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Latitude</label>
                    <input type="text" name="latitude" class="border p-2 w-full rounded" value="{{ old('latitude', $address->latitude) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Longitude</label>
                    <input type="text" name="longitude" class="border p-2 w-full rounded" value="{{ old('longitude', $address->longitude) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Description</label>
                    <textarea name="description" class="border p-2 w-full rounded" required>{{ old('description', $address->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Repère local</label>
                    <input type="text" name="repere_local" class="border p-2 w-full rounded" value="{{ old('repere_local', $address->repere_local) }}" required>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
                    <a href="{{ route('user.addresses') }}" class="text-gray-600 underline hover:text-gray-800">Annuler</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
