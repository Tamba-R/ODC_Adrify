@extends('layouts.app')

@section('title', 'Détail de l\'adresse')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Adresse : {{ $address->adrify_code }}</h1>
    <p class="mb-2"><strong>Description :</strong> {{ $address->description }}</p>
    <p class="mb-2"><strong>Repère local :</strong> {{ $address->repere_local }}</p>
    <p class="mb-2"><strong>Statut :</strong> {{ ucfirst($address->statut) }}</p>

    <p class="mb-2"><strong>Latitude :</strong> {{ $address->latitude }}</p>
    <p class="mb-2"><strong>Longitude :</strong> {{ $address->longitude }}</p>

    <!-- Carte -->
    <div id="map" class="w-full h-96 rounded shadow mt-6"></div>

    <!-- Bouton WhatsApp -->
    <a href="https://wa.me/?text={{ urlencode('Découvrez mon adresse Adrify : ' . $address->adrify_code . ' - Localisation : https://www.google.com/maps?q=' . $address->latitude . ',' . $address->longitude) }}"
       target="_blank"
       class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        📲 Partager via WhatsApp
    </a>
</div>

<!-- LeafletJS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([{{ $address->latitude }}, {{ $address->longitude }}], 15);

        // Ajouter une couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
        }).addTo(map);

        // Ajouter un marqueur
        L.marker([{{ $address->latitude }}, {{ $address->longitude }}])
            .addTo(map)
            .bindPopup("<b>{{ $address->adrify_code }}</b><br>{{ $address->description }}")
            .openPopup();
    });
</script>
@endsection
