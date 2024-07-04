<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index(){
        $materiels = Materiel::orderBy('id','desc')-> get();
        $total = Materiel::count();
        return view("admin.materiel.home",["materiels"=>$materiels,"total"=>$total]);
    }
    public function create(){
        return view("admin.materiel.create");
    }

    public function save(Request $request){
        $validation = $request->validate([
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "intervention" => "required",
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
    
    public function edit($id){
        $materiels = Materiel::findOrFail($id);
        return view('admin.materiel.update',compact('materiels'));
    }

    public function update(Request $request, $id){ 

        $validation = $request->validate([
            "titre" => "required",
            "localisation" => "required",
            "constructeur" => "required",
            "type" => "required",
            "n_serie" => "required",
            "n_inventaire" => "required",
            "n_marchee" => "required",
            "date_mise_service" => "required",
            "intervention" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageBlob = file_get_contents($image);
            $validation['image'] = $imageBlob;
        }
        $materiels = Materiel::findOrFail($id);

        $materiels->update($validation);

        // $materiels->titre = $request->titre;
        // $materiels->localisation = $request->localisation;
        // $materiels->type = $request->type;
        // $materiels->n_serie = $request->n_serie;
        // $materiels->n_inventaire = $request->n_inventaire;
        // $materiels->n_marchee = $request->n_marchee;
        // $materiels->date_mise_service = $request->date_mise_service;
        // $materiels->intervention = $request->intervention;
        // $materiels->image = $request->image;


        // $data = $materiels->save();
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
}
