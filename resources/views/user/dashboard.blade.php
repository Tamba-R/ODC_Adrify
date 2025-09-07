@extends('layouts.app')

@section('title', 'Dashboard Utilisateur')

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

    <!-- Dashboard stats -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Bienvenue {{ Auth::user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Mes adresses -->
            <div class="bg-white shadow-md rounded p-5">
                <h2 class="text-xl font-semibold mb-2">Mes adresses</h2>
                <p class="text-4xl font-bold mb-4">{{ $addressesCount }}</p>
                <a href="{{ route('user.addresses') }}" class="text-blue-600 hover:underline">Voir mes adresses</a>
            </div>

            <!-- Mes partages -->
            <div class="bg-white shadow-md rounded p-5">
                <h2 class="text-xl font-semibold mb-2">Mes partages</h2>
                <p class="text-4xl font-bold mb-4">{{ $sharesCount }}</p>
                <a href="{{ route('user.user.shares.index') }}" class="text-green-600 hover:underline">Voir mes partages</a>
            </div>

            <!-- Mes signalements -->
            <div class="bg-white shadow-md rounded p-5">
                <h2 class="text-xl font-semibold mb-2">Mes signalements</h2>
                <p class="text-4xl font-bold mb-4">{{ $reportsCount }}</p>
                <a href="{{ route('user.reports') }}" class="text-red-600 hover:underline">Voir mes signalements</a>
            </div>

        </div>

        <!-- Bouton rapide pour créer une adresse -->
        <div class="mt-8">
            <a href="{{ route('user.addresses.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Créer une nouvelle adresse</a>
        </div>
    </div>
</div>
@endsection
