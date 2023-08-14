@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <h1 class="mb-3">Liste des Filières</h1>
            <a href="{{ route('filieres.create') }}" class="btn btn-info mb-3">Ajouter</a>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
                @endif

                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                @foreach ($filieres as $filier)
                    <tr>
                        <td>{{ $filier->id }}</td>
                        <td>{{ $filier->name }}</td>
                        <td>
                            <a class="btn text-info" href="{{ route('filieres.edit', $filier->id) }}">Edit</a>
                            <form action="{{ route('filieres.destroy', $filier->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn text-danger" href="#">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
