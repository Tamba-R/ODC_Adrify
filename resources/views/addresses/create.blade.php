@extends('layouts.app')

@section('title', 'Créer une adresse')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Créer une adresse</h1>

    <form action="{{ route('user.addresses.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Latitude</label>
            <input type="text" name="latitude" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Longitude</label>
            <input type="text" name="longitude" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="border p-2 w-full"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Repère local</label>
            <input type="text" name="repere_local" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Créer l'adresse</button>
    </form>
</div>
@endsection
