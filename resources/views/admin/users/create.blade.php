@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Créer un nouvel utilisateur</h1>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nom</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Rôle</label>
                <select name="role" class="w-full border rounded p-2" required>
                    <option value="user">Utilisateur</option>
                    <option value="validator">Validateur</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Créer</button>
        </form>
    </div>
@endsection
