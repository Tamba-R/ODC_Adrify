<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Validation;
use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ValidationController extends Controller
{

    // Liste des adresses en attente de validation
    public function pending()
    {
        $addresses = Address::where('statut', 'en attente')->latest()->paginate(10);
        return view('validator.validations.pending', compact('addresses'));
    }

    /**
     * Display a listing of the resource.
     */
    // Historique des validations du validateur
    public function index()
    {
        //
        $validations = Validation::where('user_id', auth()->id())->latest()->paginate(10);
        return view('validator.validations.index', compact('validations'));
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
    // Valider ou rejeter une adresse
    public function update(Request $request, Address $address)
    {
        //
        $request->validate([
            'statut' => 'required|in:validee,rejete',
        ]);

        $validation = Validation::create([
            'address_id' => $address->id,
            'user_id' => auth()->id(),
            'statut' => $request->statut,
            'date_validation' => Carbon::now(),
        ]);

        // Mettre à jour le statut de l'adresse si nécessaire
        if ($request->statut === 'validee') {
            $address->statut = 'validée';
        } else {
            $address->statut = 'rejetee';
        }
        $address->save();

        return redirect()->back()->with('success', 'Validation enregistrée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
