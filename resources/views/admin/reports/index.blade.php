@extends('layouts.app')

@section('title', 'Signalements')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tous les signalements</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Adrify Code</th>
                <th class="border px-2 py-1">Utilisateur</th>
                <th class="border px-2 py-1">Motif</th>
                <th class="border px-2 py-1">Date</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
            <tr>
                <td class="border px-2 py-1">{{ $report->address->adrify_code }}</td>
                <td class="border px-2 py-1">{{ $report->user->nom }}</td>
                <td class="border px-2 py-1">{{ $report->motif }}</td>
                <td class="border px-2 py-1">{{ $report->date_signalement }}</td>
                <td class="border px-2 py-1 space-x-2">
                    <a href="{{ route('admin.reports.show', $report) }}" class="text-blue-600">Voir</a>
                    <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer ce signalement et l’adresse ?')" class="text-red-600">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4">Aucun signalement</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $reports->links() }}
    </div>
</div>
@endsection
