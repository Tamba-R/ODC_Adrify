@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Partages')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Tous les partages</h1>

    <!-- Table des partages -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Adrify Code</th>
                    <th class="px-4 py-2 border">Type</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($shares as $share)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $share->address->adrify_code }}</td>
                    <td class="px-4 py-2 border">{{ ucfirst($share->type) }}</td>
                    <td class="px-4 py-2 border">{{ $share->date_partage }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="{{ route('admin.shares.show', $share) }}" class="text-blue-600 hover:underline">Voir</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6">Aucun partage</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $shares->links() }}
    </div>

</div>
@endsection
