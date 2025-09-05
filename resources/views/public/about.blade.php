@extends('layouts.apps')

@section('title', 'À propos')

@section('content')
<!-- Section hero avec image et overlay -->
<div class="relative w-full h-[600px] flex items-center justify-center text-white mb-12"
     style="background-image: url('{{ asset('images/adrify-img.jpg') }}'); background-size: cover; background-position: center;">

    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Contenu texte en deux colonnes -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center text-left">
        <!-- Colonne 1 : titre -->
        <div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Notre équipe Adrify</h1>
            <p class="text-lg md:text-xl mb-4">Une équipe passionnée dédiée à la création d’adresses fiables en Guinée.</p>
        </div>

        <!-- Colonne 2 : objectifs -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Nos objectifs</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li>Accessibilité pour tous les utilisateurs.</li>
                <li>Fiabilité des adresses grâce au GPS et à la validation collaborative.</li>
                <li>Évolutivité pour étendre à d’autres régions ou pays.</li>
                <li>Utilité multisectorielle pour logistique, e-commerce et services publics.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
