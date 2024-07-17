<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Materiel;
use App\Models\Calibration;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input("title");
        $materiels = Materiel::when($title, function ($query) use ($title) {
            return $query->where("titre", "like", "%" . $title . "%");
        })->get();
        $total = Materiel::count();
        return view("admin.materiel.home", ["materiels" => $materiels, "total" => $total]);
    }

    public function create()
    {
        return view("admin.materiel.create");
    }

    public function save(Request $request)
    {
        $rules = [
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "is_sensor" => "boolean",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ];

        if ($request->input('is_sensor')) {
            $rules["date_calibrage"] = "required|date";
            $rules["date_prochaine_calibrage"] = "required|date";
        }

        $validation = $request->validate($rules);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageBlob = file_get_contents($image);
            $validation['image'] = $imageBlob;
        }

        $data = Materiel::create($validation);
        $data->is_sensor = $request->has('is_sensor') ? 1 : 0;

        if ($data) {
            if ($request->is_sensor) {
                Calibration::create([
                    'materiel_id' => $data->id,
                    'date_calibrage' => $request->date_calibrage,
                    'date_prochaine_calibrage' => $request->date_prochaine_calibrage,
                ]);
            }

            Log::channel('material')->info('Material added', [
                'user' => auth()->user()->name,
                'user_id' => Auth::id(),
                'material_id' => $data->id,
                'title' => $data->titre,
            ]);
            session()->flash("success", "Material added successfully");
            return redirect()->route("materiels");
        } else {
            session()->flash("error", "Some problem occurred");
            return redirect()->route("materiels/create");
        }
    }
    public function edit($id)
    {
        $materiels = Materiel::findOrFail($id);
        if ($materiels->is_sensor) {
            $calibration = $materiels->calibrations()->first();
            return view('admin.materiel.update', compact('materiels', 'calibration'));
        } else
            return view('admin.materiel.update', compact('materiels'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "is_sensor" => "boolean",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
        
        if ($request->input('is_sensor')) {
            $rules["date_calibrage"] = "required|date";
            $rules["date_prochaine_calibrage"] = "required|date";
        }

        $validation = $request->validate($rules);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageBlob = file_get_contents($image);
            $validation['image'] = $imageBlob;
        }

        $materiels = Materiel::findOrFail($id);
        $materiels->update($validation);

        if ($validation) {
            if ($materiels->is_sensor) {
                $materiels->calibrations()->update(
                    [
                        'date_calibrage' => $request->date_calibrage,
                        'date_prochaine_calibrage' => $request->date_prochaine_calibrage,
                    ]
                );
            }

            Log::channel('material')->info('Material updated', [
                'user' => Auth::user()->name,
                'user_id' => Auth::id(),
                'material_id' => $materiels->id,
                'title' => $materiels->titre,
            ]);
            session()->flash("success", "Material updated successfully");
            return redirect()->route("materiels");
        } else {
            session()->flash("error", "Some problem occurred");
            return redirect()->route("materiels/update");
        }
    }

    public function view($id)
    {
        $materiel = Materiel::findOrFail($id);
        if ($materiel->is_sensor == 1) {
            $calibration = $materiel->calibrations()->first();
            return view('admin.materiel.view', compact('materiel', 'calibration'));
        } else
            return view('admin.materiel.view', compact('materiel'));
    }
    public function delete($id)
    {
        $materiels = Materiel::findOrFail($id);
        $title = $materiels->titre;
        $materialId = $materiels->id;

        $materiels->calibrations()->delete();

        $materiels->delete();

        Log::channel('material')->info('Material deleted', [
            'user' => Auth::user()->name,
            'user_id' => Auth::id(),
            'material_id' => $materialId,
            'title' => $title,
        ]);

        session()->flash("success", "Material deleted successfully");
        return redirect()->route("materiels");
    }
}
