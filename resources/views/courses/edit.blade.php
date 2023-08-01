@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Modification d'un cours</h1>
            <form action="{{ route('courses.update', $course->id) }}" method="POST" class="mt-4">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <input type="text" value="{{ $course->name }}" name="name" placeholder="Nom" class="form-control">
                    @error('name')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <div class="form-group mb-3">
                        <textarea name="description" rows="3" placeholder="Description du cours" class="form-control">
                            {{ $course->description }}
                        </textarea>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <Button class="btn btn-success" type="submit">Modifier</Button>
                <a href="{{ route('courses.index') }}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
