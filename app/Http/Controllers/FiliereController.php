<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required'
        ]);

        Filiere::create($validatedData);

       return redirect()->route("filieres.index")->with('success', "Filière créée avec sucèss");

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
    public function edit(Filiere $filiere)
    {
        return view('filieres.edit',compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Filiere::where('id',$id)->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière modifiéé avec sucèss.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $result = $filiere->delete();
        if ($result) {
            # code...
            return redirect()->route('filieres.index')->with('success',"Filière supprimé avec sucèss");
        }else{
            return redirect()->route('filieres.index')->with('error',"Erreur lors de suppression de la Filière");
        }
    }
}
