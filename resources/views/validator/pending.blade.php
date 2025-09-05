@extends('layouts.app')

@section('title', 'Adresses en attente')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Adresses en attente de validation</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

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
                    <form action="{{ route('validator.action', $address) }}" method="POST" class="inline">
                        @csrf
                        <button name="action" value="validée" class="bg-green-600 text-white px-2 py-1 rounded">Valider</button>
                        <button name="action" value="rejetée" class="bg-red-600 text-white px-2 py-1 rounded">Rejeter</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center py-4">Aucune adresse en attente</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $addresses->links() }}
    </div>
</div>
@endsection
