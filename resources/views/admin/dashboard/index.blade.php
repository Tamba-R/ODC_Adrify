@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Tableau de bord Administrateur</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-blue-600 text-white p-4 rounded shadow">
            <h2 class="text-xl">Utilisateurs</h2>
            <p class="text-2xl font-bold">{{ $userCount }}</p>
        </div>
        <div class="bg-green-600 text-white p-4 rounded shadow">
            <h2 class="text-xl">Adresses créées</h2>
            <p class="text-2xl font-bold">{{ $addressCount }}</p>
        </div>
        <div class="bg-yellow-600 text-white p-4 rounded shadow">
            <h2 class="text-xl">Adresses validées</h2>
            <p class="text-2xl font-bold">{{ $validatedCount }}</p>
        </div>
        <div class="bg-red-600 text-white p-4 rounded shadow">
            <h2 class="text-xl">Signalements</h2>
            <p class="text-2xl font-bold">{{ $reportCount }}</p>
        </div>
    </div>
</div>
@endsection
