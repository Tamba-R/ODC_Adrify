@extends('layouts.app')

@section('title', 'Mes signalements')

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.dashboard') }}" class="font-bold text-xl text-blue-600">Adrify</a>
                <a href="{{ route('user.addresses') }}" class="text-gray-700 hover:text-blue-600">Adresses</a>
                <a href="{{ route('user.reports') }}" class="text-gray-700 hover:text-blue-600">Mes signalements</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.profile') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Profil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Mes signalements</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Adrify Code</th>
                        <th class="border px-4 py-2">Motif</th>
                        <th class="border px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $report->address->adrify_code }}</td>
                        <td class="border px-4 py-2">{{ $report->motif }}</td>
                        <td class="border px-4 py-2">{{ $report->date_signalement }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">Aucun signalement</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection
