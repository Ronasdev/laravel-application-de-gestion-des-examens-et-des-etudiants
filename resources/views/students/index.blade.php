@extends('layout')

@section('content')
    <h1>Liste des Etudiants</h1>
    <a href="{{ route('students.create') }}" class="btn btn-info mb-3">Ajouter</a>

    <table class="table table-striped shadow">
        @if (session()->has('success'))
            <div class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-success text-center my-2">{{ session()->get('error') }}</div>
        @endif
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->mobile }}</td>
                <td>{{ $student->filiere->name }}</td>
                <td>
                    <a class="btn text-info" href="{{ route('students.edit', $student->id) }}">Modifier</a>

                    <form action="{{ route('students.destroy', $student->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn text-danger" href="#">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
