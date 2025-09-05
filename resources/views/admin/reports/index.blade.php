@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Signalements')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Tous les signalements</h1>

    <!-- Message succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table signalements -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">Adrify Code</th>
                    <th class="px-4 py-3 border-b">Utilisateur</th>
                    <th class="px-4 py-3 border-b">Motif</th>
                    <th class="px-4 py-3 border-b">Date</th>
                    <th class="px-4 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($reports as $report)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $report->address->adrify_code }}</td>
                    <td class="px-4 py-2 border-b">{{ $report->user->nom }}</td>
                    <td class="px-4 py-2 border-b">{{ $report->motif }}</td>
                    <td class="px-4 py-2 border-b">{{ $report->date_signalement }}</td>
                    <td class="px-4 py-2 border-b space-x-2">
                        <a href="{{ route('admin.reports.show', $report) }}" class="text-blue-600 hover:underline">Voir</a>
                        <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer ce signalement et l’adresse ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">Aucun signalement</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $reports->links() }}
    </div>

</div>
@endsection
