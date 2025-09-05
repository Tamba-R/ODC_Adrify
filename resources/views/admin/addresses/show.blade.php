@extends('layouts.app')

@section('title', 'Détails de l\'adresse')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de l'adresse</h1>

    <p><strong>Adrify Code :</strong> {{ $address->adrify_code }}</p>
    <p><strong>Description :</strong> {{ $address->description }}</p>
    <p><strong>Repère local :</strong> {{ $address->repere_local }}</p>
    <p><strong>Latitude :</strong> {{ $address->latitude }}</p>
    <p><strong>Longitude :</strong> {{ $address->longitude }}</p>
    <p><strong>Statut :</strong> {{ ucfirst($address->statut) }}</p>
    <p><strong>Créé par :</strong> {{ $address->user->nom }}</p>
    <p><strong>Date de création :</strong> {{ $address->date_creation }}</p>

    <a href="{{ route('admin.addresses.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour à la liste</a>
</div>
@endsection
