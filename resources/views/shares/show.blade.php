@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 text-center">
    <h1 class="text-2xl font-bold mb-4">Partager l'adresse</h1>

    <p><strong>Adrify Code :</strong> {{ $address->adrify_code }}</p>
    <p><strong>Description :</strong> {{ $address->description }}</p>

    <div class="mt-6">
        <p class="mb-2 font-semibold">Lien de partage :</p>
        <input type="text" value="{{ $link }}" class="border p-2 w-full max-w-lg text-center" readonly>
    </div>

    <div class="mt-6">
        <p class="mb-2 font-semibold">QR Code :</p>
        <img src="data:image/png;base64, {!! $qrCode !!}" alt="QR Code" class="mx-auto">
    </div>

    <a href="{{ route('addresses.index') }}" class="mt-6 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
