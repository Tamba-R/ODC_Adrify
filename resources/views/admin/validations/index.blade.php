@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Validations')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Toutes les validations</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-6 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des validations -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 shadow-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-3 py-2 text-left">Adrify Code</th>
                    <th class="border px-3 py-2 text-left">Validateur</th>
                    <th class="border px-3 py-2 text-left">Statut</th>
                    <th class="border px-3 py-2 text-left">Date</th>
                    <th class="border px-3 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($validations as $validation)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2">{{ $validation->address->adrify_code }}</td>
                    <td class="border px-3 py-2">{{ $validation->user->name }}</td>
                    <td class="border px-3 py-2">
                        <span class="px-2 py-1 rounded text-white {{ $validation->statut == 'validee' ? 'bg-green-600' : ($validation->statut == 'rejete' ? 'bg-red-600' : 'bg-yellow-600') }}">
                            {{ ucfirst($validation->statut) }}
                        </span>
                    </td>
                    <td class="border px-3 py-2">{{ $validation->date_validation }}</td>
                    <td class="border px-3 py-2 space-x-2">
                        <a href="{{ route('admin.validations.show', $validation) }}" class="text-blue-600 hover:underline">Voir</a>
                        <form action="{{ route('admin.validations.destroy', $validation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cette validation ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">Aucune validation trouvée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $validations->links() }}
    </div>

</div>
@endsection
