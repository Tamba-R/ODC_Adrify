@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Mon profil</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-1">Nom</label>
            <input type="text" name="nom" class="border p-2 w-full" value="{{ old('nom', Auth::user()->nom) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Email</label>
            <input type="email" name="email" class="border p-2 w-full" value="{{ old('email', Auth::user()->email) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Téléphone</label>
            <input type="text" name="telephone" class="border p-2 w-full" value="{{ old('telephone', Auth::user()->telephone) }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
