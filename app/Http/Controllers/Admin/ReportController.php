<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Liste de tous les signalements
    public function index()
    {
        //
        $reports = Report::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
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
    // Afficher les détails d’un signalement
    public function show(Report $report)
    {
        //
        return view('admin.reports.show', compact('report'));
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
    // Supprimer le signalement ou l’adresse signalée
    public function destroy(Report $report)
    {
        //
        // Si on veut supprimer l’adresse signalée
        $report->address->delete();

        // Supprimer le signalement après action
        $report->delete();

        return redirect()->route('admin.reports.index')->with('success','Signalement et adresse supprimés avec succès !');
    }
}
