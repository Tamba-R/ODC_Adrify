@extends('layouts.app')

@section('title', 'Paramètres')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Paramètres de l’application</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Nombre de validations nécessaires avant qu’une adresse soit validée :</label>
            <input type="number" name="validations_required" min="1" max="10"
                value="{{ old('validations_required', $settings['validations_required'] ?? 3) }}"
                class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
