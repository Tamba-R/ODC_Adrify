@extends('layouts.app') <!-- Layout admin principal -->

@section('title', 'Gestion des adresses')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Toutes les adresses</h1>

    <!-- Message succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des adresses -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Adrify Code</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Description</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Repère local</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Statut</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($addresses as $address)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $address->adrify_code }}</td>
                    <td class="px-4 py-2">{{ $address->description }}</td>
                    <td class="px-4 py-2">{{ $address->repere_local }}</td>
                    <td class="px-4 py-2">
                        @if($address->statut == 'validee')
                            <span class="text-green-600 font-semibold">{{ ucfirst($address->statut) }}</span>
                        @elseif($address->statut == 'rejete')
                            <span class="text-red-600 font-semibold">{{ ucfirst($address->statut) }}</span>
                        @else
                            <span class="text-yellow-600 font-semibold">{{ ucfirst($address->statut) }}</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.addresses.show', $address) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('admin.addresses.edit', $address) }}" class="text-green-600 hover:underline">Modifier</a>
                        <form action="{{ route('admin.addresses.destroy', $address) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cette adresse ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">Aucune adresse trouvée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $addresses->links() }}
    </div>

</div>
@endsection
