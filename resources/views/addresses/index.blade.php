@extends('layouts.app')

@section('title', 'Mes adresses')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Mes adresses</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <a href="{{ route('user.addresses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Créer une nouvelle adresse</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Description</th>
                <th class="border px-2 py-1">Repère local</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($addresses as $address)
            <tr>
                <td class="border px-2 py-1">{{ $address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ $address->description }}</td>
                <td class="border px-2 py-1">{{ $address->repere_local }}</td>
                <td class="border px-2 py-1 space-x-2">
                    <a href="{{ route('user.addresses.show', $address) }}" class="text-blue-600">Voir</a>
                    <a href="{{ route('user.addresses.edit', $address) }}" class="text-green-600">Modifier</a>
                    <a href="{{ route('user.addresses.share', $address) }}" class="text-purple-600">Partager</a>
                    <form action="{{ route('user.addresses.destroy', $address) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer cette adresse ?')" class="text-red-600">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center py-4">Aucune adresse trouvée</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $addresses->links() }}
    </div>
</div>
@endsection
