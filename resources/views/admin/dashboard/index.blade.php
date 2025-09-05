@extends('layouts.app') <!-- On étend le layout admin -->

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre du dashboard -->
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Tableau de bord Administrateur</h1>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Utilisateurs -->
        <div class="bg-blue-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <h2 class="text-lg font-semibold mb-2">Utilisateurs</h2>
            <p class="text-3xl font-bold">{{ $userCount }}</p>
        </div>

        <!-- Adresses créées -->
        <div class="bg-green-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <h2 class="text-lg font-semibold mb-2">Adresses créées</h2>
            <p class="text-3xl font-bold">{{ $addressCount }}</p>
        </div>

        <!-- Adresses validées -->
        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <h2 class="text-lg font-semibold mb-2">Adresses validées</h2>
            <p class="text-3xl font-bold">{{ $validatedCount }}</p>
        </div>

        <!-- Signalements -->
        <div class="bg-red-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <h2 class="text-lg font-semibold mb-2">Signalements</h2>
            <p class="text-3xl font-bold">{{ $reportCount }}</p>
        </div>

    </div>

    <!-- Optionnel : Ajout d'un tableau résumé ou graphique -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Résumé récent</h2>
        <p class="text-gray-600">Ici, tu peux afficher les dernières adresses créées, validations ou signalements pour avoir un aperçu rapide.</p>
        <!-- Exemple : tableau ou graphique à intégrer plus tard -->
    </div>

</div>
@endsection
