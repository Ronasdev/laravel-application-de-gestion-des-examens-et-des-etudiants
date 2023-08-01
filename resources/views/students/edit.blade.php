@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Modification d'un étudiant</h1>
            <form action="{{ route('students.update',$student->id) }}" method="POST" class="mt-4">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <input type="text" value="{{ $student->firstname }}" name="firstname" placeholder="Prénom"
                        class="form-control">
                    @error('firstname')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" value="{{ $student->lastname }}" name="lastname" placeholder="Nom"
                        class="form-control">
                    @error('lastname')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="email" value="{{ $student->email }}" name="email" placeholder="Adresse mail"
                        class="form-control">
                    @error('email')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" value="{{ $student->mobile }}" name="mobile" placeholder="Téléphone"
                        class="form-control">
                    @error('mobile')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <select name="filiere_id" class="form-control">
                        <option value="{{ $student->filiere_id }}">{{ $student->filiere->name }}</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->name }}</option>
                        @endforeach

                    </select>
                    @error('filiere_id')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <Button class="btn btn-success" type="submit">Modifier</Button>
                <a href="{{route('students.index')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
