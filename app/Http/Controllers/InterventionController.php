<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel;
use App\Models\User;
use App\Models\Intervention;
use Illuminate\Support\Facades\Auth;


class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showMaterialInterventions($materialId)
    {
        $materiel = Materiel::with('interventions')->findOrFail($materialId);
        $users = User::all();
        return view('admin.materiel.interventions.interventions', compact('materiel', 'users'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($materialId)
    {
        $materiel = Materiel::findOrFail($materialId);
        return view('admin.materiel.interventions.create', compact('materiel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $materialId)
    {
        $request->validate([
            'intervention_date' => 'required|date',
            'intervention_type' => 'required|string|max:255',
        ]);

        $material = Materiel::findOrFail($materialId);

        $intervention = new Intervention();
        $intervention->intervention_date = $request->input('intervention_date');
        $intervention->intervention_type = $request->input('intervention_type');
        $intervention->user_id = Auth::id(); // Use the logged-in user's ID
        $intervention->materiel_id = $material->id;
        $intervention->save();

        return redirect()->route('materiels.interventions', $material->id)->with('success', 'Intervention created successfully.');
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
