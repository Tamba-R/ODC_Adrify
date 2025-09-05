@extends('layouts.app')

@section('title', 'Modifier une adresse')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l'adresse</h1>

    <form action="{{ route('user.addresses.update', $address) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Latitude</label>
            <input type="text" name="latitude" value="{{ old('latitude', $address->latitude) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Longitude</label>
            <input type="text" name="longitude" value="{{ old('longitude', $address->longitude) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="border p-2 w-full">{{ old('description', $address->description) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Repère local</label>
            <input type="text" name="repere_local" value="{{ old('repere_local', $address->repere_local) }}" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
