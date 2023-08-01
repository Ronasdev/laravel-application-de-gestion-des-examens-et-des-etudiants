<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('filiere')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('students.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:8',
            'filiere_id' => 'required',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student créé avec sucèss.');

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
    public function edit(Student $student)
    {
        $filieres = Filiere::all();
        return view('students.edit',compact('student','filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:8',
            'filiere_id' => 'required',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Student::where('id',$id)->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student modifié avec sucèss.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $result = $student->delete();
        if ($result) {
            # code...
            return redirect()->route('students.index')->with('success',"Etudiant supprimé avec sucèss");
        }else{
            return redirect()->route('students.index')->with('error',"Erreur lors de suppression de l'Etudiant");
        }
    }
}
