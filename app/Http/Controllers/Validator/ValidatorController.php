<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Validation;

use Illuminate\Support\Facades\Auth;

class ValidatorController extends Controller
{

    // Dashboard du validateur
    public function dashboard()
    {
        $pendingCount = Address::where('statut','en_attente')->count();
        $validatedCount = Address::where('statut','validee')->count();
        $rejectedCount = Address::where('statut','rejete')->count();

        return view('validator.dashboard', compact('pendingCount','validatedCount','rejectedCount'));
    }


    // Liste des adresses en attente
    public function pendingAddresses()
    {
        $addresses = Address::where('statut','en_attente')->latest()->paginate(10);
        return view('validator.pending', compact('addresses'));
    }


    // Valider ou rejeter une adresse
    public function validateAddress(Request $request, Address $address)
    {
        $request->validate([
            'action' => 'required|in:validee,rejete'
        ]);

        // Créer la validation
        Validation::create([
            'address_id' => $address->id,
            'user_id' => Auth::id(),
            'statut' => $request->action,
            'date_validation' => now(),
        ]);

        // Mettre à jour le statut de l’adresse si nécessaire
        $requiredValidations = 3; // on peut récupérer depuis Settings plus tard
        $validCount = Validation::where('address_id', $address->id)->where('statut','validee')->count();

        if($validCount >= $requiredValidations) {
            $address->update(['statut'=>'validee']);
        } elseif($request->action == 'rejete') {
            $address->update(['statut'=>'rejete']);
        }

        return redirect()->route('validator.pending')->with('success','Action effectuée avec succès !');
    }


    // Historique des validations du validateur
    public function history()
    {
        $validations = Validation::where('user_id', Auth::id())->with('address')->latest()->paginate(10);
        return view('validator.history', compact('validations'));
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
