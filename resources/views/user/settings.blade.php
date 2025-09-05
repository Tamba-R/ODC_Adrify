@extends('user.layout')

@section('title', 'Paramètres')

@section('content')
    <h1 class="text-2xl font-bold mb-6">⚙️ Paramètres de votre compte</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nom</label>
                <input type="text" name="nom" value="{{ $user->nom }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Téléphone</label>
                <input type="text" name="telephone" value="{{ $user->telephone }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Mot de passe</label>
                <input type="password" name="password" class="w-full border p-2 rounded" placeholder="Laissez vide pour ne pas changer">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Mettre à jour</button>
        </form>
    </div>
@endsection
