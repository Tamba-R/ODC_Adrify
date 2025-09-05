@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Détails de la validation')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Détails de la validation</h1>

    <!-- Carte info -->
    <div class="bg-white shadow rounded p-6 space-y-4">
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Adrify Code :</span>
            <span class="text-gray-900">{{ $validation->address->adrify_code }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Description :</span>
            <span class="text-gray-900">{{ $validation->address->description }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Repère local :</span>
            <span class="text-gray-900">{{ $validation->address->repere_local }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Validateur :</span>
            <span class="text-gray-900">{{ $validation->user->nom }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Statut :</span>
            <span class="px-2 py-1 rounded text-white 
                        {{ $validation->statut == 'validée' ? 'bg-green-600' : ($validation->statut == 'rejetée' ? 'bg-red-600' : 'bg-yellow-600') }}">
                {{ ucfirst($validation->statut) }}
            </span>
        </div>
        <div class="flex justify-between">
            <span class="font-semibold text-gray-700">Date :</span>
            <span class="text-gray-900">{{ $validation->date_validation }}</span>
        </div>
    </div>

    <!-- Bouton retour -->
    <a href="{{ route('admin.validations.index') }}" class="mt-6 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
        Retour
    </a>

</div>
@endsection
