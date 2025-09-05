@extends('layouts.app')

@section('title', 'Partager adresse')

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

    <!-- Contenu principal -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Partager l'adresse {{ $address->adrify_code }}</h1>

        <div class="bg-white shadow-md rounded p-6 mb-6">
            <p class="mb-4"><strong>Lien :</strong> 
                <a href="{{ url('/address/'.$address->adrify_code) }}" target="_blank" class="text-blue-600 hover:underline">
                    {{ url('/address/'.$address->adrify_code) }}
                </a>
            </p>

            <div class="mb-4">
                <p><strong>QR Code :</strong></p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ url('/address/'.$address->adrify_code) }}" alt="QR Code" class="mt-2">
            </div>
        </div>

        @if($shares->count())
        <div class="bg-white shadow-md rounded p-6">
            <h2 class="text-2xl font-bold mb-4">Historique des partages</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-3 py-2">Type</th>
                        <th class="border px-3 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shares as $share)
                    <tr>
                        <td class="border px-3 py-2">{{ $share->type }}</td>
                        <td class="border px-3 py-2">{{ $share->date_partage }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('user.addresses') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Retour à mes adresses</a>
        </div>
    </div>
</div>
@endsection
