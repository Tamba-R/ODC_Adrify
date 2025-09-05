@extends('layouts.apps')

@section('title', 'À propos')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <h1 class="text-4xl font-bold mb-6 text-blue-700">À propos d’Adrify</h1>
    <p class="mb-6 text-gray-700">Adrify est une plateforme numérique visant à combler le déficit d’adresses formelles en Guinée. Grâce à la géolocalisation et la validation communautaire, chaque citoyen peut créer, gérer et partager une adresse fiable.</p>

    <!-- Image fluide de l'équipe -->
    <div class="mb-8">
        <img src="{{ asset('images/equipe.jpg') }}" alt="Équipe Adrify" class="w-full h-auto rounded shadow">
    </div>

    <h2 class="text-2xl font-bold mb-4">Nos objectifs</h2>
    <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Accessibilité pour tous les utilisateurs.</li>
        <li>Fiabilité des adresses grâce au GPS et à la validation collaborative.</li>
        <li>Évolutivité pour étendre à d’autres régions ou pays.</li>
        <li>Utilité multisectorielle pour logistique, e-commerce et services publics.</li>
    </ul>
</div>
@endsection
