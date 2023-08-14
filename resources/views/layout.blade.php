<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />

    <title>Etudiants</title>


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info text-white">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler text-white" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 text-white" href="{{ route('home') }}">logo</a>
                <!-- Left links -->
                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('students.index') }}">Etudiants</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('filieres.index') }}">Filières</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('courses.index') }}">Cours</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('exams.index') }}">Examens</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav w-100 d-flex justify-content-end  mb-2 mb-lg-0 " style="float: right">
                            <li class="nav-item  mx-4">
                                <a class="nav-link text-success bg-light rounded"
                                    href="{{ route('exams.results.show') }}">Resultats</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('login') }}" class="nav-link text-white">connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a href="{{ route('register') }}" class="ml-4 nav-link text-white">Inscrire</a>
                                </li>
                            @endif
                        </ul>
                    @endauth
                @endif
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            @auth
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                                alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <div class="container">
        @yield('content')
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>
