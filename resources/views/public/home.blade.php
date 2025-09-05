@extends('layouts.apps')

@section('title', 'Accueil')

@section('content')
<div class="text-center py-16">
    <h1 class="text-5xl font-extrabold mb-6 text-blue-700">Bienvenue sur Adrify</h1>
    <p class="text-lg mb-8 text-gray-700">Créez, gérez et partagez des adresses fiables en Guinée.</p>
    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Commencer</a>
</div>

<div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
    <div class="p-6 bg-white rounded shadow hover:shadow-lg transition">
        <h2 class="font-bold text-xl mb-2">Accessibilité</h2>
        <p>Créer et partager une adresse facilement, même sans expérience technique.</p>
    </div>
    <div class="p-6 bg-white rounded shadow hover:shadow-lg transition">
        <h2 class="font-bold text-xl mb-2">Fiabilité</h2>
        <p>Des adresses précises grâce à la validation communautaire et GPS.</p>
    </div>
    <div class="p-6 bg-white rounded shadow hover:shadow-lg transition">
        <h2 class="font-bold text-xl mb-2">Utilité multisectorielle</h2>
        <p>Facilite la logistique, l’e-commerce, services publics et plus encore.</p>
    </div>
</div>
@endsection
