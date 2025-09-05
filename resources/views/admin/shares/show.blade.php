@extends('layouts.app')

@section('title', 'Détails du partage')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails du partage</h1>

    <p><strong>Adrify Code :</strong> {{ $share->address->adrify_code }}</p>
    <p><strong>Type de partage :</strong> {{ $share->type }}</p>
    <p><strong>Date :</strong> {{ $share->date_partage }}</p>
    <p><strong>Description Adresse :</strong> {{ $share->address->description }}</p>
    <p><strong>Repère local :</strong> {{ $share->address->repere_local }}</p>

    @if($share->type == 'QR Code')
        <p><strong>QR Code :</strong></p>
        <img src="{{ asset('qrcodes/'.$share->address->adrify_code.'.png') }}" alt="QR Code">
    @else
        <p><strong>Lien :</strong> <a href="{{ $share->link ?? '#' }}">{{ $share->link ?? 'N/A' }}</a></p>
    @endif

    <a href="{{ route('admin.shares.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
