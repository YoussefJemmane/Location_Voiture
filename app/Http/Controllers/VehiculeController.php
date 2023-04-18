<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Color;
use App\Http\Requests\StoreVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Models\Marque;
use App\Models\ModeleVehicule;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicule::all();

        return view('cars.index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $marques = Marque::all();
        $modeles = Models::where('marque_id','=', $request->marque_id)->get();




        $colors = Color::all();
        return view('cars.create', compact('modeles','colors','marques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store the vehicule
        $vehicule = new Vehicule();


        $vehicule->color_id = $request->color_id;
        $vehicule->modele_id = $request->modele_id;
        $vehicule->marque_id = $request->marque_id;
        $vehicule->prixJour = $request->prixJour;

        $vehicule->disponible = 1;
        // store photo
        $vehicule->photo = $request->file('photo')->store('public/photos');
        $vehicule->save();
        return redirect()->route('vehicules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $vehicule = Vehicule::find($id);
        $marques = Marque::all();
        $modeles = Models::where('marque_id','=', $request->marque_id)->get();




        $colors = Color::all();
        return view('cars.edit', compact('modeles','colors','marques','vehicule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // store the vehicule
        $vehicule = Vehicule::find($id);


        $vehicule->color_id = $request->color_id;
        $vehicule->modele_id = $request->modele_id;
        $vehicule->marque_id = $request->marque_id;
        $vehicule->prixJour = $request->prixJour;

        $vehicule->disponible = $request->disponible;
        if (Storage::exists($vehicule->photo)) {
            Storage::delete($vehicule->photo);
        }
        if ($request->hasFile('photo')) {
        $vehicule->photo = $request->file('photo')->store('public/photos');
        }
        $vehicule->update();
        return redirect()->route('vehicules.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::find($id);
        $vehicule->delete();
        return redirect()->route('vehicules.index');

    }

}
