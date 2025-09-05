<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Afficher les paramètres
    public function index()
    {
        //
        $settings = DB::table('settings')->pluck('value','key')->toArray();
        return view('admin.settings.index', compact('settings'));
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
    // Mettre à jour les paramètres
    public function update(Request $request)
    {
        //
        $request->validate([
            'validations_required' => 'required|integer|min:1|max:10',
        ]);

        // Sauvegarder le paramètre
        DB::table('settings')->updateOrInsert(
            ['key' => 'validations_required'],
            ['value' => $request->validations_required]
        );

        return redirect()->route('admin.settings.index')->with('success','Paramètres mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
