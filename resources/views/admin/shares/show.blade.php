@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Détails du partage')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Détails du partage</h1>

    <!-- Carte des détails -->
    <div class="bg-white rounded-lg shadow p-6 space-y-4">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><strong>Adrify Code :</strong> <span class="text-gray-700">{{ $share->address->adrify_code }}</span></p>
            <p><strong>Type de partage :</strong> <span class="text-gray-700">{{ ucfirst($share->type) }}</span></p>
            <p><strong>Date :</strong> <span class="text-gray-700">{{ $share->date_partage }}</span></p>
            <p><strong>Repère local :</strong> <span class="text-gray-700">{{ $share->address->repere_local }}</span></p>
        </div>

        <div>
            <p><strong>Description Adresse :</strong></p>
            <p class="text-gray-700 border-l-4 border-blue-500 pl-3">{{ $share->address->description }}</p>
        </div>

        @if($share->type == 'QR Code')
        <div>
            <p class="font-medium">QR Code :</p>
            <img src="{{ asset('qrcodes/'.$share->address->adrify_code.'.png') }}" alt="QR Code" class="mt-2 w-48 h-48 object-contain border rounded shadow">
        </div>
        @else
        <div>
            <p class="font-medium">Lien :</p>
            <a href="{{ $share->link ?? '#' }}" class="text-blue-600 hover:underline">{{ $share->link ?? 'N/A' }}</a>
        </div>
        @endif

        <a href="{{ route('admin.shares.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 mt-4">
            Retour à la liste
        </a>
    </div>

</div>
@endsection
