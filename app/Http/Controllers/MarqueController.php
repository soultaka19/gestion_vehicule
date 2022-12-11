<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marque;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$marque = marque::all();
        //return view('addmarque',compact('marque'));
        return view('addmarque');
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
            'libelle' => 'required',
        ]);
        $marque = new marque;
        $marque->libelle = $request->libelle;
        $save = $marque->save();
        if ($save) {
            return redirect(route('tabmarque'));
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
        $tabmarque = marque::all();
        return view('tabmarque',compact('tabmarque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque = marque::find($id);
        return view('editmarque',compact('marque'));
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
            'libelle' => 'required',
        ]);
        $marque = marque::find($request->id);
        $marque->libelle = $request->libelle;
        $save = $marque->save();

        if($save){
            return redirect(route('tabmarque'));
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
        $mar = marque::find($id);
        $delete = $mar->delete();

        if($delete){
            return redirect(route('tabmarque'));
        }
    }
}
