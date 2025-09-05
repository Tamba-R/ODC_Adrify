@extends('layouts.app')

@section('title', 'Validations')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Toutes les validations</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Validateur</th>
                <th class="border px-2 py-1">Statut</th>
                <th class="border px-2 py-1">Date</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($validations as $validation)
            <tr>
                <td class="border px-2 py-1">{{ $validation->address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ $validation->user->nom }}</td>
                <td class="border px-2 py-1">{{ ucfirst($validation->statut) }}</td>
                <td class="border px-2 py-1">{{ $validation->date_validation }}</td>
                <td class="border px-2 py-1 space-x-2">
                    <a href="{{ route('admin.validations.show', $validation) }}" class="text-blue-600">Voir</a>
                    <form action="{{ route('admin.validations.destroy', $validation) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer cette validation ?')" class="text-red-600">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4">Aucune validation trouvée</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $validations->links() }}
    </div>
</div>
@endsection
