<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        Course::create($validatedData);

       return redirect()->route("courses.index")->with('success', "Cours crée avec sucèss");

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
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description'=>'required'
        ]);

        Course::where('id',$id)->update($validatedData);

        return redirect()->route('courses.index')->with('success', 'Cours modifié avec sucèss.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $result = $course->delete();
        if ($result) {
            # code...
            return redirect()->route('courses.index')->with('success',"Cours supprimé avec sucèss");
        }else{
            return redirect()->route('courses.index')->with('error',"Erreur lors de suppression de la Cours");
        }
    }
}
