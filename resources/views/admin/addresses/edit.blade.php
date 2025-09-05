@extends('layouts.app') <!-- On utilise le layout admin -->

@section('title', 'Modifier une adresse')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Modifier l'adresse</h1>

    <!-- Formulaire de modification -->
    <form action="{{ route('admin.addresses.update', $address) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Latitude -->
        <div>
            <label class="block mb-2 font-medium text-gray-700">Latitude</label>
            <input type="text" name="latitude" value="{{ old('latitude', $address->latitude) }}" 
                   class="border border-gray-300 rounded p-3 w-full focus:ring-2 focus:ring-blue-500" required>
            @error('latitude')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Longitude -->
        <div>
            <label class="block mb-2 font-medium text-gray-700">Longitude</label>
            <input type="text" name="longitude" value="{{ old('longitude', $address->longitude) }}" 
                   class="border border-gray-300 rounded p-3 w-full focus:ring-2 focus:ring-blue-500" required>
            @error('longitude')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-2 font-medium text-gray-700">Description</label>
            <textarea name="description" 
                      class="border border-gray-300 rounded p-3 w-full focus:ring-2 focus:ring-blue-500" rows="4">{{ old('description', $address->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Repère local -->
        <div>
            <label class="block mb-2 font-medium text-gray-700">Repère local</label>
            <input type="text" name="repere_local" value="{{ old('repere_local', $address->repere_local) }}" 
                   class="border border-gray-300 rounded p-3 w-full focus:ring-2 focus:ring-blue-500">
            @error('repere_local')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Statut -->
        <div>
            <label class="block mb-2 font-medium text-gray-700">Statut</label>
            <select name="statut" class="border border-gray-300 rounded p-3 w-full focus:ring-2 focus:ring-blue-500">
                <option value="en attente" {{ $address->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="validée" {{ $address->statut == 'validée' ? 'selected' : '' }}>Validée</option>
                <option value="rejetée" {{ $address->statut == 'rejetée' ? 'selected' : '' }}>Rejetée</option>
            </select>
            @error('statut')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de mise à jour -->
        <div class="pt-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition duration-300">
                Mettre à jour
            </button>
        </div>

    </form>

</div>
@endsection
