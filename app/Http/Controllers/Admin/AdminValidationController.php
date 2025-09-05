<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Validation;
use Illuminate\Http\Request;

class AdminValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Liste toutes les validations
    public function index()
    {
        //
        $validations = Validation::with(['address','user'])->latest()->paginate(10);
        return view('admin.validations.index', compact('validations'));
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
    // Afficher le détail d’une validation
    public function show(Validation $validation)
    {
        //
        return view('admin.validations.show', compact('validation'));
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
    // Optionnel : supprimer une validation
    public function destroy(Validation $validation)
    {
        //
        $validation->delete();
        return redirect()->route('validations.index')->with('success', 'Validation supprimée avec succès !');
    }
}
