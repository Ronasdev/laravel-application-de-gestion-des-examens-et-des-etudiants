@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <h1 class="mb-3">Les resultats des examens</h1>
            <a href="{{ route('exams.index') }}" class="btn btn-info">retour</a>

            <table class="table table-striped">

                <tr>
                    <th>#</th>
                    <th>Etudiant</th>
                    <th>Examen</th>
                    <th>Mention</th>
                    <th>Décision</th>
                </tr>
                @foreach ($results as $result)
                    <tr @class([
                        'alert',
                        'alert-success' => $result->note >= 18 && $result->note <= 20,
                        'alert-info' => $result->note >= 16 && $result->note < 18,
                        'alert-primary' => $result->note >= 14 && $result->note < 16,
                        'alert-secondary' => $result->note >= 12 && $result->note < 14,
                        'alert-light' => $result->note >= 10 && $result->note < 12,
                        'alert-dark' => $result->note >= 8 && $result->note < 10,
                        'alert-warning' => $result->note >= 5 && $result->note < 8,
                        'alert-danger' => $result->note < 5,
                    ])>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->student->firstname . ' ' . $result->student->lastname }}</td>
                        <td>{{ $result->exam->title }}</td>
                        <td>{{ $result->grade }}</td>
                        <td>
                            @if ($result->note >= 10)
                                <span class="text-success bg-light py-2 text-center  rounded shadow d-block "
                                    style="width: 100px">Validé</span>
                            @else
                                <span class="text-danger bg-light py-2 text-center rounded shadow d-block "
                                    style="width: 100px">Invalidé</span>
                            @endif
                            {{-- <a class="btn text-info" href="{{ route('results.edit', $result->id) }}">Edit</a>
                            <form action="{{ route('results.destroy', $result->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn text-danger d-inline" href="#">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
