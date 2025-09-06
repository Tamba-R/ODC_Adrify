@extends('layouts.app')

@section('title', 'QR Code')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">QR Code pour l'adresse {{ $address->adrify_code }}</h1>
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($url) }}" alt="QR Code">
        <p class="mt-4"><a href="{{ route('user.addresses') }}" class="text-blue-600 hover:underline">Retour aux adresses</a></p>
    </div>
</div>
@endsection
