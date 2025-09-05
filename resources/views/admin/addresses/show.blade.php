@extends('layouts.app') <!-- Layout admin -->

@section('title', "Détails de l'adresse")

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Détails de l'adresse</h1>

    <!-- Card contenant les informations -->
    <div class="bg-white shadow-lg rounded-lg p-6 space-y-4">

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Adrify Code :</span>
            <span class="text-gray-800">{{ $address->adrify_code }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Description :</span>
            <span class="text-gray-800">{{ $address->description }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Repère local :</span>
            <span class="text-gray-800">{{ $address->repere_local }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Latitude :</span>
            <span class="text-gray-800">{{ $address->latitude }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Longitude :</span>
            <span class="text-gray-800">{{ $address->longitude }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Statut :</span>
            <span class="text-gray-800 capitalize">{{ $address->statut }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Créé par :</span>
            <span class="text-gray-800">{{ $address->user->nom }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Date de création :</span>
            <span class="text-gray-800">{{ $address->date_creation }}</span>
        </div>

        <!-- Bouton retour -->
        <div class="pt-4">
            <a href="{{ route('admin.addresses.index') }}" 
               class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-300">
                Retour à la liste
            </a>
        </div>

    </div>

</div>
@endsection
