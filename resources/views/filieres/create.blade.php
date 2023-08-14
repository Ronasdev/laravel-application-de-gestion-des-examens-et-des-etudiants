@extends('layout')

@section('content')
    <div class="container">
        <div class="wrapper w-50 shadow m-auto p-4 mt-5">
            <h1>Ajout d'une filière</h1>
            <form action="{{ route('filieres.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="name" placeholder="Nom de filière" class="form-control">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <Button class="btn btn-success" type="submit">Ajouter</Button>
                <a href="{{route('filieres.index')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    </div>
@endsection
