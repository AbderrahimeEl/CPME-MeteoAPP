<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel;
use App\Models\User;
use App\Models\Intervention;
use Illuminate\Support\Facades\Log;
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
        Log::channel('material')->info('intervention added', [
            'added by' => Auth::user()->name,
            'with_id' => Auth::id(),
            'type' => $intervention->intervention_type,
            'for' => $material->titre,
            'mat_id' => $material->id,
        ]);
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
        $intervention = Intervention::findOrFail($id);
        $materiel = Materiel::findOrFail($intervention->materiel_id);
        return view('admin.materiel.interventions.update', compact('intervention', 'materiel'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'intervention_date' => 'required|date',
            'intervention_type' => 'required|string|max:255',
        ]);

        $intervention = Intervention::findOrFail($id);
        $material = Materiel::findOrFail($intervention->materiel_id);
        $intervention->update($validation);
        if ($validation) {
            Log::channel('material')->info('intervention updated', [
                'updated by' => Auth::user()->name,
                'with_id' => Auth::id(),
                'type' => $intervention->intervention_type,
                'for' => $material->titre,
                'mat_id' => $material->id,
            ]);
            session()->flash("success", "intervention updated successfully");
            return redirect()->route('materiels.interventions', $material->id);
        } else {
            session()->flash("error", "Some problem occurred");
            return redirect()->route("materiels/update");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $intervention = Intervention::findOrFail($id);
        $material = Materiel::findOrFail($intervention->materiel_id);
        $type = $intervention->intervention_type;
        $intervention_id = $intervention->id;

        $intervention->delete();

        if ($intervention) {
            Log::channel('material')->info('intervention deleted', [
                'deleted by' => Auth::user()->name,
                'with_id' => Auth::id(),
                'type' => $type,
                'for' => $material->titre,
                'mat_id' => $material->id,
            ]);
            session()->flash("success", "intervention deleted successfully");
        } else {
            session()->flash("error", "Some problem occurred");
        }
        return redirect()->route('materiels.interventions', $material->id);
        //
    }
}
