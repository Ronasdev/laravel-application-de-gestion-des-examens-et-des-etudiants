<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Result ;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::with('course')->get();
        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('exams.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        Exam::create($validatedData);

        return redirect()->route('exams.index')->with('success', 'Exam created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        $results = Result::where('exam_id', $exam->id)->with('student')->get();
        return view('exams.show', compact('exam', 'results'));
    }

    public function createNote(){
        $exams = Exam::all();
        $students = Student::all();
        return view('exams.store_note', compact('exams','students'));
    }
    public function storeResult(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'note' => 'required|numeric|min:0|max:20',
            'exam_id' => 'required | exists:exams,id'
        ]);

        $grade = "nulle";
        $note = $request->note;

        if ($note <= 5) {
            $grade = "nulle";
        } elseif($note <= 7) {
            $grade = "faible";
        }elseif($note <= 9) {
            $grade = "insuffisante";
        }elseif($note <= 11) {
            $grade = "passable";
        }elseif($note <= 13) {
            $grade = "assez bien";
        }elseif($note <= 15) {
            $grade = "bien";
        }elseif($note <= 17) {
            $grade = "très bien";
        }elseif($note <= 19) {
            $grade = "excéllente";
        }elseif($note <= 20) {
            $grade = "honorable";
        }

        Result::create([
            'student_id' => $validatedData['student_id'],
            'exam_id' =>  $validatedData['exam_id'],
            'note' => $validatedData['note'],
            'grade'=> $grade
        ]);

        return redirect()->route('exams.index')->with('success', 'Result stored successfully.');
    }

    public function showResult(){
        $results = Result::all();
        return view('exams.show_result', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $courses = Course::all();
        return view('exams.edit',compact('exam','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        Exam::where('id',$id)->update($validatedData);

        return redirect()->route('exams.index')->with('success', 'Examen modifié avec sucèss.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $result = $exam->delete();
        if ($result) {
            # code...
            return redirect()->route('exams.index')->with('success',"Examen supprimé avec sucèss");
        }else{
            return redirect()->route('exams.index')->with('error',"Erreur lors de suppression de la Examen");
        }
    }
}
