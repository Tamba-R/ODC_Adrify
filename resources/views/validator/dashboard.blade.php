@extends('layouts.val')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Bienvenue sur votre Dashboard</h1>

<p class="text-gray-700 mb-4">
    Ici, vous pouvez valider les adresses soumises par les utilisateurs et consulter votre historique de validations.
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="p-6 bg-white rounded shadow hover:shadow-lg transition">
        <h2 class="font-bold text-xl mb-2">Adresses à valider</h2>
        <p>Consultez les adresses en attente et confirmez ou rejetez chaque adresse.</p>
        <a href="{{ route('validator.pending') }}" class="text-blue-600 hover:underline mt-2 inline-block">Voir</a>
    </div>
    <div class="p-6 bg-white rounded shadow hover:shadow-lg transition">
        <h2 class="font-bold text-xl mb-2">Historique</h2>
        <p>Consultez toutes vos validations passées et leur statut.</p>
        <a href="{{ route('validator.history') }}" class="text-blue-600 hover:underline mt-2 inline-block">Voir</a>
    </div>
</div>
@endsection
