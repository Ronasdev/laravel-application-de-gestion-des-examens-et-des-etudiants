@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Enregistrer une note</h1>
            <form action="{{ route('exams.results.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group mb-3">
                    <select name="student_id" class="form-control">
                        <option value="">--Etudiant--</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</option>
                        @endforeach

                    </select>
                    @error('student_id')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <select name="exam_id" class="form-control">
                        <option value="">--Examen--</option>
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                        @endforeach

                    </select>
                    @error('exam_id')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="number" name="note" placeholder="La note" class="form-control">
                    @error('note')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <Button class="btn btn-success" type="submit">Enregistrer</Button>
                <a href="{{ route('exams.index') }}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
