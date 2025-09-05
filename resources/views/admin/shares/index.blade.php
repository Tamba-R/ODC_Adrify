@extends('layouts.app')

@section('title', 'Partages')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tous les partages</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Type</th>
                <th class="border px-2 py-1">Date</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shares as $share)
            <tr>
                <td class="border px-2 py-1">{{ $share->address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ $share->type }}</td>
                <td class="border px-2 py-1">{{ $share->date_partage }}</td>
                <td class="border px-2 py-1">
                    <a href="{{ route('admin.shares.show', $share) }}" class="text-blue-600">Voir</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center py-4">Aucun partage</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $shares->links() }}
    </div>
</div>
@endsection
