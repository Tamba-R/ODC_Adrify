@extends('layouts.app')

@section('title', 'Gestion des utilisateurs')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Liste des utilisateurs</h1>

    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un utilisateur</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Nom</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Rôle</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td class="border px-2 py-1">{{ $user->name }}</td>
                <td class="border px-2 py-1">{{ $user->email }}</td>
                <td class="border px-2 py-1">{{ ucfirst($user->role) }}</td>
                <td class="border px-2 py-1 space-x-2">
                    <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600">Modifier</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer cet utilisateur ?')" class="text-red-600">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center py-4">Aucun utilisateur</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
