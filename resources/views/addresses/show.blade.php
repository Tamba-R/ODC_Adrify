@extends('layouts.app')

@section('title', 'Détails de l\'adresse')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de l'adresse</h1>

    <p><strong>Adrify Code :</strong> {{ $address->adrify_code }}</p>
    <p><strong>Latitude :</strong> {{ $address->latitude }}</p>
    <p><strong>Longitude :</strong> {{ $address->longitude }}</p>
    <p><strong>Description :</strong> {{ $address->description }}</p>
    <p><strong>Repère local :</strong> {{ $address->repere_local }}</p>

    <a href="{{ route('user.addresses.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
