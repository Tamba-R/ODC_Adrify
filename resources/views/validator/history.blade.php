@extends('layouts.app')

@section('title', 'Historique des validations')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Historique de vos validations</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Statut</th>
                <th class="border px-2 py-1">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($validations as $validation)
            <tr>
                <td class="border px-2 py-1">{{ $validation->address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ ucfirst($validation->statut) }}</td>
                <td class="border px-2 py-1">{{ $validation->date_validation }}</td>
            </tr>
            @empty
            <tr><td colspan="3" class="text-center py-4">Aucune validation effectuée</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $validations->links() }}
    </div>
</div>
@endsection
