@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Enregistrement d'un examen</h1>
            <form action="{{ route('exams.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="title" placeholder="Titre de l'examen" class="form-control">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="datetime-local" name="date" placeholder="Date de composition de l'examen"
                        class="form-control">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <select name="course_id" class="form-control">
                        <option value="">--cours--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach

                    </select>
                    @error('course_id')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <Button class="btn btn-success" type="submit">Enregistrer</Button>
                <a href="{{ route('exams.index') }}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
