<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Share;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Dashboard utilisateur
    public function dashboard()
    {
        $addressesCount = Address::where('user_id', Auth::id())->count();
        $sharesCount = Share::whereHas('address', function($q){
            $q->where('user_id', Auth::id());
        })->count();
        $reportsCount = Report::whereHas('address', function($q){
            $q->where('user_id', Auth::id());
        })->count();

        return view('user.dashboard', compact('addressesCount','sharesCount','reportsCount'));
    }


    // Liste des adresses de l’utilisateur
    public function addresses()
    {
        $addresses = Address::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.addresses.index', compact('addresses'));
    }


    // Formulaire pour créer une adresse
    public function createAddress()
    {
        return view('user.addresses.create');
    }


    // Enregistrer une nouvelle adresse
    public function storeAddress(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string|max:255',
            'repere_local' => 'required|string|max:255',
        ]);

        $adrify_code = strtoupper(substr(md5(now().Auth::id()),0,6));

        Address::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'repere_local' => $request->repere_local,
            'adrify_code' => $adrify_code,
            'statut' => 'en_attente',
            'user_id' => Auth::id(),
            'date_creation' => now(),
        ]);

        return redirect()->route('user.addresses')->with('success','Adresse créée avec succès !');
    }



    // Formulaire pour éditer une adresse
    public function editAddress(Address $address)
    {
        $this->authorize('update', $address);
        return view('user.addresses.edit', compact('address'));
    }


    // Mettre à jour une adresse
    public function updateAddress(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string|max:255',
            'repere_local' => 'required|string|max:255',
        ]);

        $address->update($request->only(['latitude','longitude','description','repere_local']));

        return redirect()->route('user.addresses')->with('success','Adresse mise à jour !');
    }



    // Supprimer une adresse
    public function destroyAddress(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return redirect()->route('user.addresses')->with('success','Adresse supprimée !');
    }


    // Partager une adresse
    public function shareAddress(Address $address)
    {
        $this->authorize('view', $address);
        $shares = Share::where('address_id', $address->id)->latest()->get();
        return view('user.addresses.share', compact('address','shares'));
    }


    public function allShares()
{
    // On récupère toutes les adresses de l'utilisateur
    $addressesIds = Address::where('user_id', Auth::id())->pluck('id');

    // On récupère tous les partages liés à ces adresses
    $shares = Share::whereIn('address_id', $addressesIds)->latest()->paginate(10);

    return view('user.shares.index', compact('shares'));
}



    // Mes signalements
    public function reports()
    {
        $reports = Report::whereHas('address', function ($q) {
            $q->where('user_id', Auth::id()); // on ne prend que les adresses de l'utilisateur connecté
        })
        ->with('address')
        ->latest()
        ->paginate(10);

        return view('user.reports.index', compact('reports'));
    }


    // Profil utilisateur
    public function profile()
    {
        return view('user.profile');
    }

    // Mettre à jour le profil
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'telephone' => 'required|string|max:20',
        ]);

        User::where('id', Auth::id())->update($request->only(['nom','email','telephone']));


        // $user = User::find(Auth::id());
        // $user->nom = $request->nom;
        // $user->email = $request->email;
        // $user->telephone = $request->telephone;
        // $user->save();

        return redirect()->route('user.profile')->with('success','Profil mis à jour !');
    }

    public function showAddress($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        return view('user.addresses.show', compact('address'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
