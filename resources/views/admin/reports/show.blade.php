@extends('layouts.app')

@section('title', 'Détails du signalement')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails du signalement</h1>

    <p><strong>Adrify Code :</strong> {{ $report->address->adrify_code }}</p>
    <p><strong>Utilisateur :</strong> {{ $report->user->nom }}</p>
    <p><strong>Motif :</strong> {{ $report->motif }}</p>
    <p><strong>Date :</strong> {{ $report->date_signalement }}</p>
    <p><strong>Description Adresse :</strong> {{ $report->address->description }}</p>
    <p><strong>Repère local :</strong> {{ $report->address->repere_local }}</p>

    <a href="{{ route('admin.reports.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
