@extends('layouts.val')

@section('title', 'Adresses en attente')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Adresses en attente de validation</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead>
                <tr class="bg-blue-100 text-gray-700 uppercase text-sm">
                    <th class="py-3 px-6 text-left">Adrify Code</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Repère local</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($addresses as $address)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                    <td class="py-3 px-6 font-medium">{{ $address->adrify_code }}</td>
                    <td class="py-3 px-6">{{ $address->description }}</td>
                    <td class="py-3 px-6">{{ $address->repere_local }}</td>
                    <td class="py-3 px-6 space-x-2">
                        <form action="{{ route('validator.action', $address) }}" method="POST" class="inline">
                            @csrf
                            <button name="action" value="validée" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition">Valider</button>
                            <button name="action" value="rejetée" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">Rejeter</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500 font-medium">Aucune adresse en attente</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $addresses->links('pagination::tailwind') }}
    </div>
</div>
@endsection
