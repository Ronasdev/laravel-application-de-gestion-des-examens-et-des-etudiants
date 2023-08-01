@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Modification d'une filière</h1>
            <form action="{{ route('filieres.update',$filiere->id) }}" method="POST" class="mt-4">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <input type="text" value="{{ $filiere->name }}" name="name" placeholder="Nom"
                        class="form-control">
                    @error('name')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <Button class="btn btn-success" type="submit">Modifier</Button>
                <a href="{{route('filieres.index')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
