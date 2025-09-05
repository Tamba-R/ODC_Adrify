@extends('layouts.app')

@section('title', 'Modifier utilisateur')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l’utilisateur : {{ $user->nom }}</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Nom :</label>
            <input type="text" name="nom" value="{{ old('nom', $user->nom) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Email :</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Rôle :</label>
            <select name="role" class="border p-2 w-full" required>
                <option value="particulier" {{ $user->role=='particulier' ? 'selected' : '' }}>Particulier</option>
                <option value="validateur" {{ $user->role=='validateur' ? 'selected' : '' }}>Validateur</option>
                <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
        <a href="{{ route('admin.users.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded">Annuler</a>
    </form>
</div>
@endsection
