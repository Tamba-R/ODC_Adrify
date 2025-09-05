@extends('layouts.val')

@section('title', 'Historique des validations')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Historique de vos validations</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead>
                <tr class="bg-blue-100 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Adrify Code</th>
                    <th class="py-3 px-6 text-left">Statut</th>
                    <th class="py-3 px-6 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($validations as $validation)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                    <td class="py-3 px-6">{{ $validation->address->adrify_code }}</td>
                    <td class="py-3 px-6">
                        @if($validation->statut === 'validée')
                            <span class="text-green-600 font-semibold">{{ ucfirst($validation->statut) }}</span>
                        @elseif($validation->statut === 'rejetée')
                            <span class="text-red-600 font-semibold">{{ ucfirst($validation->statut) }}</span>
                        @else
                            <span>{{ ucfirst($validation->statut) }}</span>
                        @endif
                    </td>
                    <td class="py-3 px-6">{{ \Carbon\Carbon::parse($validation->date_validation)->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-500 font-medium">Aucune validation effectuée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $validations->links('pagination::tailwind') }}
    </div>
</div>
@endsection
