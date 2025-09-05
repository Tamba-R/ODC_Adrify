@extends('layouts.app')

@section('title', 'Gestion des adresses')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Toutes les adresses</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Description</th>
                <th class="border px-2 py-1">Repère local</th>
                <th class="border px-2 py-1">Statut</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($addresses as $address)
            <tr>
                <td class="border px-2 py-1">{{ $address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ $address->description }}</td>
                <td class="border px-2 py-1">{{ $address->repere_local }}</td>
                <td class="border px-2 py-1">{{ ucfirst($address->statut) }}</td>
                <td class="border px-2 py-1 space-x-2">
                    <a href="{{ route('admin.addresses.show', $address) }}" class="text-blue-600">Voir</a>
                    <a href="{{ route('admin.addresses.edit', $address) }}" class="text-green-600">Modifier</a>
                    <form action="{{ route('admin.addresses.destroy', $address) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer cette adresse ?')" class="text-red-600">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4">Aucune adresse trouvée</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $addresses->links() }}
    </div>
</div>
@endsection
