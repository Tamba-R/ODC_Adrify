<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Str;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Autoriser uniquement les adresses de l'utilisateur connecté

        $addresses = auth()->user()->addresses()->latest()->paginate(10);
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Formulaire création
    {
        //
        // return view('addresses.create');
        return view('user.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
            'repere_local' => 'nullable|string',
        ]);

        // $adrify_code = Str::upper(Str::random(8));

        // $address = Address::create([
        //     'latitude' => $request->latitude,
        //     'longitude' => $request->longitude,
        //     'description' => $request->description,
        //     'repere_local' => $request->repere_local,
        //     'adrify_code' => $adrify_code,
        //     'user_id' => auth()->id(),
        // ]);

        Address::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'repere_local' => $request->repere_local,
            'adrify_code' => strtoupper(Str::random(8)), // Génère un code unique
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('addresses.create')->with('success', 'Adresse créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
        $this->authorize('view', $address);
        return view('user.addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
        $this->authorize('update', $address);
        return view('user.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //

        $this->authorize('update', $address);

        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
            'repere_local' => 'nullable|string',
        ]);

        // $address->update([
        //     'latitude' => $request->latitude,
        //     'longitude' => $request->longitude,
        //     'description' => $request->description,
        //     'repere_local' => $request->repere_local,
        // ]);
        $address->update($request->only('latitude', 'longitude', 'description', 'repere_local'));

        return redirect()->route('addresses.index')->with('success', 'Adresse mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
        $this->authorize('delete', $address);
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Adresse supprimée avec succès !');
    }
}
