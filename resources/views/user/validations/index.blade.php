@extends('user.layout')

@section('title', 'Mes validations')

@section('content')
    <h1 class="text-2xl font-bold mb-6">✅ Mes validations</h1>

    @if($validations->isEmpty())
        <p class="text-gray-600">Vous n’avez validé aucune adresse pour l’instant.</p>
    @else
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4">Adresse</th>
                    <th class="py-2 px-4">Statut</th>
                    <th class="py-2 px-4">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($validations as $validation)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $validation->address->adrify_code }}</td>
                        <td class="py-2 px-4">
                            @if($validation->statut == 'validée')
                                <span class="text-green-600 font-bold">Validée</span>
                            @else
                                <span class="text-red-600 font-bold">Rejetée</span>
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ $validation->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
