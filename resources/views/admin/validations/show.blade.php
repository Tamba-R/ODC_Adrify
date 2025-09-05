@extends('layouts.app')

@section('title', 'Détails de la validation')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de la validation</h1>

    <p><strong>Adrify Code :</strong> {{ $validation->address->adrify_code }}</p>
    <p><strong>Description Adresse :</strong> {{ $validation->address->description }}</p>
    <p><strong>Repère local :</strong> {{ $validation->address->repere_local }}</p>
    <p><strong>Validateur :</strong> {{ $validation->user->nom }}</p>
    <p><strong>Statut :</strong> {{ ucfirst($validation->statut) }}</p>
    <p><strong>Date :</strong> {{ $validation->date_validation }}</p>

    <a href="{{ route('admin.validations.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
