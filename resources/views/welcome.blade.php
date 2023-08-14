@extends('layout')

@section('content')
    <div class="container">
        <div class="w-75 border pb-5 m-auto mt-5 rounded position-relative" style="height: 60vh">
            <h2 class="text-center text-decoration-underline   alert alert-info">Plateforme des Examens</h2>
            <p class="px-2">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                natus voluptas ratione numquam hic cum illum,
                incidunt a dolorum sint cupiditate aliquam harum blanditiis dolor neque nobis ipsum minus illo?
            </p>
            <p class="px-2">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                natus voluptas ratione numquam hic cum illum,
                natus voluptas ratione numquam hic cum illum, natus voluptas ratione numquam hic cum illum,
                natus voluptas ratione numquam hic cum illum, natus voluptas ratione numquam hic cum illum,
                incidunt a dolorum sint cupiditate aliquam harum blanditiis dolor neque nobis ipsum minus illo?
            </p>
            <div class="w-100 d-flex justify-content-end position-absolute bottom-0 ">
                <a href="{{ route('exams.results.show') }}" class="btn btn-info ">consulter votre resultat</a>
            </div>
        </div>
    </div>
@endsection
