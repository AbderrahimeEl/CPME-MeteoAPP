<?php

namespace App\Http\Controllers;

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
            session()->flash("success", "Material added successfully");
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
        $materiels = Materiel::findOrFail($id)->delete();
        if ($materiels) {
            session()->flash("success", "Material deleted successfully");
        } else {
            session()->flash("error", "Some problem occurred");
        }
        return redirect()->route("materiels");
    }
}
