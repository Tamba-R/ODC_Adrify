@extends('layouts.app') <!-- Layout admin -->

@section('title', 'Détails du signalement')

@section('content')
<div class="container mx-auto p-6">

    <!-- Titre -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Détails du signalement</h1>

    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <p><span class="font-semibold">Adrify Code :</span> {{ $report->address->adrify_code }}</p>
        <p><span class="font-semibold">Utilisateur :</span> {{ $report->user->name }}</p>
        <p><span class="font-semibold">Motif :</span> {{ $report->motif }}</p>
        <p><span class="font-semibold">Date :</span> {{ $report->date_signalement }}</p>
        <p><span class="font-semibold">Description Adresse :</span> {{ $report->address->description }}</p>
        <p><span class="font-semibold">Repère local :</span> {{ $report->address->repere_local }}</p>
    </div>

    <a href="{{ route('admin.reports.index') }}" class="mt-6 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Retour à la liste</a>

</div>
@endsection
