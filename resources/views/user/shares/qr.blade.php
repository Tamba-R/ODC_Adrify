@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">QR Code de l'adresse {{ $address->adrify_code }}</h2>

    <div class="flex justify-center">
        {!! QrCode::size(250)->generate($url) !!}
    </div>

    <p class="mt-4 text-center text-gray-600">
        Scannez ce QR Code pour accéder à l'adresse :<br>
        <a href="{{ $url }}" class="text-blue-600 hover:underline">{{ $url }}</a>
    </p>
</div>
@endsection
