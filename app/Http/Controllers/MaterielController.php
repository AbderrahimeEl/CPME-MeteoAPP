<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Materiel;
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
        $validation = $request->validate([
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageBlob = file_get_contents($image);
            $validation['image'] = $imageBlob;
        }

        $data = Materiel::create($validation);


        if ($data) {
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
        return view('admin.materiel.update', compact('materiels'));
    }
    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageBlob = file_get_contents($image);
            $validation['image'] = $imageBlob;
        }
        $materiels = Materiel::findOrFail($id);
        $materiels->update($validation);
        if ($validation) {
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
        return view('admin.materiel.view', compact('materiel'));
    }
    public function delete($id)
    {
        $materiels = Materiel::findOrFail($id);
        $title = $materiels->title;
        $id = $materiels->id;
        $materiels->delete();

        if ($materiels) {
            Log::channel('material')->info('Material deleted', [
                'user' => Auth::user()->name,
                'user_id' => Auth::id(),
                'material_id' => $id,
                'title' => $title,
            ]);
            session()->flash("success", "Material deleted successfully");
        } else {
            session()->flash("error", "Some problem occurred");
        }
        return redirect()->route("materiels");
    }
}
