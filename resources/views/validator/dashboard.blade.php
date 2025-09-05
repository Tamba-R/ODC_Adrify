@extends('layouts.app')

@section('title', 'Dashboard Validateur')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Dashboard Validateur</h1>
        <!-- Bouton Déconnexion -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Déconnexion
            </button>
        </form>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-blue-200 p-4 rounded">
            <h2 class="text-lg font-bold">Adresses en attente</h2>
            <p class="text-3xl">{{ $pendingCount }}</p>
            <a href="{{ route('validator.pending') }}" class="text-blue-700 underline">Voir les adresses</a>
        </div>

        <div class="bg-green-200 p-4 rounded">
            <h2 class="text-lg font-bold">Validations effectuées</h2>
            <p class="text-3xl">{{ $validatedCount }}</p>
            <a href="{{ route('validator.history') }}" class="text-green-700 underline">Voir l’historique</a>
        </div>
    </div>
</div>
@endsection
