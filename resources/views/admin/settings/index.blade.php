@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Paramètres')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Paramètres de l’application</h1>

    <!-- Message succès -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-6 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-semibold text-gray-700">
                    Nombre de validations nécessaires avant qu’une adresse soit validée :
                </label>
                <input type="number" name="validations_required" min="1" max="10"
                    value="{{ old('validations_required', $settings['validations_required'] ?? 3) }}"
                    class="border border-gray-300 p-3 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                Mettre à jour
            </button>
        </form>
    </div>

</div>
@endsection
