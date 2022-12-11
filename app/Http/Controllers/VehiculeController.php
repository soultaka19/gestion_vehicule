<?php

namespace App\Http\Controllers;
use App\Models\vehicule;
use App\Models\marque;

use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = marque::all();
        return view('addvehicule',compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'prix' => 'required',
            'marque_id' => 'required',
        ]);
        $vehicule = new vehicule;
        $vehicule->matricule = $request->matricule;
        $vehicule->prix = $request->prix;
        $vehicule->marque_id = $request->marque_id;
        $save = $vehicule->save();
        if ($save) {
            return redirect(route('tabvehicule'));
        } else {
            return back()->with('fail','une erreur sest produite');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tabvehicule = vehicule::all();
        return view('tabvehicule',compact('tabvehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicule = vehicule::find($id);
        $marque = marque::all();
        return view('editvehicule',compact('vehicule','marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'matricule' => 'required',
            'prix' => 'required',
            'marque_id' => 'required',
        ]);
        $vehicule = vehicule::find($request->id);
        $vehicule->matricule = $request->matricule;
        $vehicule->prix = $request->prix;
        $vehicule->marque_id = $request->marque_id;
        $save = $vehicule->save();

        if($save){
            return redirect(route('tabvehicule'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehic = vehicule::find($id);
        $delete = $vehic->delete();

        if($delete){
            return redirect(route('tabvehicule'));
        }
    }
}
