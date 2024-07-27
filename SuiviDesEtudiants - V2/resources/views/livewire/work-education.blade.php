<style>
    .custom-table tbody .persons {
        padding: 0;
        margin: 0;
    }

    .custom-table tbody .persons li {
        padding: 0;
        margin: 0 0 0 -15px;
        list-style: none;
        display: inline-block;
    }

    .custom-table tbody .persons li a {
        display: inline-block;
        width: 36px;
    }

    .custom-table tbody .persons li a img {
        border-radius: 50%;
        max-width: 100%;
    }

    .table td, .table th {
        text-align: center;
        vertical-align: middle;
        align-items: center;
        align-content: center;
    }

    .sidebar-item:hover {
        color: blue;
    }
</style>
<link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
<div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 border-success end-0 p-3 ">
            <div id="liveToast" class="toast show bg-success border-2 border-success rounded" role="alert"
                 aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Messages</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast show bg-danger border-2 border-danger" role="alert" aria-live="assertive"
                 aria-atomic="true">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Messages d'erreur</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-danger">
                    <ul class="lists-style-none">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header shadow" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/dashboard">
                            <img src="../assets/images/Suivi.png" alt="" class="p-4" width="200px">
                        </a>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light"
                       data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                        <li class="nav-item ">
                            <a class="nav-link " role="button"
                               aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip"
                               data-bs-placement="right" data-bs-title="En développement ...">
                                <i data-feather="moon" class="svg-icon"></i>
                            </a>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">

                        <!-- ============================================================== -->
                        <!-- User profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown" style="cursor: pointer;">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                @livewire('profile-header')
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY rounded">
                                <a class="dropdown-item mt-2" href="/profil"><i data-feather="user"
                                                                                class="svg-icon me-2 ms-1"></i>
                                    Mon Profil</a>
                                <a class="dropdown-item">@livewire('logout')</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- Menu principal -->
                        @php
                            $user = Auth::user();
                        @endphp

                        @if($user && $user->role == 1 || $user->role == 2)
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link sidebar-link " href="/dashboard" aria-expanded="false">
                                    <i data-feather="home" class="feather-icon"></i>
                                    <span
                                        class="hide-menu">Menu principal
                                </span>
                                </a>
                            </li>

                            <!-- Application-->

                            <li class="list-divider mt-4"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Les APPLICATIONS</span></li>

                            <li class="sidebar-item"><a class="sidebar-link" href="/suividesetudiants"
                                                        aria-expanded="false"><i data-feather="file-text"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Suivi des etudiants
                                </span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="/gestiondesroles"
                                                        aria-expanded="false"><i data-feather="link"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Gestion des rôles</span></a>
                            </li>

                            <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="/workeducation"
                                                        aria-expanded="false"><i data-feather="briefcase"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Work education</span></a>
                            </li>


                            <!-- Listes -->
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Les Listes</span></li>

                            <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="/personnages"
                                                        aria-expanded="false"><i data-feather="users"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Personnages</span></a></li>

                            </li>
                            <!--
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href=""
                                    aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span
                                        class="hide-menu">Etudiants</span></a></li>-->

                            <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="/membres"
                                                        aria-expanded="false"><i data-feather="smile"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Membres</span></a></li>

                            <li class="sidebar-item"><a class="sidebar-link has-arrow"
                                                        aria-expanded="false"><i data-feather="activity"
                                                                                 class="feather-icon"></i><span
                                        class="hide-menu">Activités </span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="/activiteuniversite" class="sidebar-link"><span
                                                class="hide-menu"> Université
                                        </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="/activitesa" class="sidebar-link"><span
                                                class="hide-menu"> S.A.
                                        </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="/activiteautres" class="sidebar-link"><span
                                                class="hide-menu"> Autres
                                        </span></a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        @if($user && $user->role == 1)
                            <li class="list-divider"></li>
                            <!-- Others -->
                            <li class="nav-small-cap"><span class="hide-menu">Autres</span></li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/gestiondesutilisateurs" aria-expanded="false">
                                    <i data-feather="user" class="feather-icon"></i>
                                    <span class="hide-menu">Gestion des utilisateurs</span>
                                </a>
                            </li>
                            <li class="sidebar-item mb-3">
                                <a class="sidebar-link" href="/outils" aria-expanded="false">
                                    <i data-feather="settings" class="feather-icon"></i>
                                    <span class="hide-menu">Autres outils</span>
                                </a>
                            </li>
                        @endif


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-12 align-self-center">
                        <div class="customize-input float-start">
                            <button class="btn btn-rounded  btn-outline-primary px-4 py-2"
                                    type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#workadd"
                            >
                                <i class="fas fa-plus me-2"></i>
                                Ajouter un nouveau work-ed
                            </button>


                            <!-- Center modal content -->
                            <div class="modal fade" id="workadd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-dark">
                                            <h4 class="modal-title" id="myCenterModalLabel">Nouveau Work-Ed</h4>
                                            <button type="button" class="btn" data-bs-dismiss="modal"
                                                    aria-hidden="true">
                                                <i data-feather="x" class="feather-icon bg-dark"></i>

                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('worked.store') }}" method="POST" class="row">
                                                @csrf
                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Nom</label>
                                                    <input type="text" name="nom" class="form-control"
                                                           placeholder="Nom du worked ..." required>
                                                </div>
                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Responsable</label>
                                                    <input type="text" name="responsable" minlength="5" maxlength="5"
                                                           class="form-control" placeholder="12345" required>
                                                </div>
                                                <div class="col-12 form-group mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control"
                                                              placeholder="Description ..."></textarea>
                                                </div>
                                                <div class="col-12 form-group mb-3">
                                                    <label class="form-label">Semestre</label>
                                                    <select class="form-select" name="idsemestre" required>
                                                        @foreach ($semestres as $semestre)
                                                            <option value="{{ $semestre->IdSemestre }}"
                                                                    selected>{{ $semestre->NomSemestre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4 m-auto">
                                                    <button type="submit" class="btn btn-info px-4">Enregistrer</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                        </div>
                    </div>
                    <div class="col-lg-1 col-md-12 p-2 align-self-center">
                    </div>
                    <div class="col-lg-6 col-md-12 align-self-center">
                        <div class="customize-input float-end">
                            @livewire('current-date-semestre')
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card p-4">

                            <div class="justify-content-between row">
                                <div class="col-6">
                                    <p class=" card-title display-6">Work Education</p>
                                </div>
                                <div class="col-6 my-auto">
                                    <button class="btn float-end " style=""
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#info">
                                        <i data-feather="info" class="feather-icon" sty></i>
                                        Guide
                                    </button>
                                </div>

                            </div>

                            <div class="modal fade" id="info" tabindex="-1" aria-labelledby="info" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content modal-filled bg-white">
                                        <div class="modal-body ">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne"
                                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                            Ajout un nouveau responsable de Work-Ed
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-5 text-center">
                                                                    <p class="m-0">1 - Cliquer sur le bouton</p>
                                                                    <img src="../assets/images/guide/24.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                    <hr>
                                                                    <p class="m-0">3 - Pour ajouter des membres : Voir
                                                                        "Ajout des membres"</p>
                                                                </div>
                                                                <div class="col-7 text-center">
                                                                    <p class="mb-2 ">2 - Inserer les données requis</p>
                                                                    <img src="../assets/images/guide/25.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseTwo"
                                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Ajout des membres
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-5 text-center">
                                                                    <p class="m-0">1 - Creez, Modifier votre Word-Ed</p>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-sm">
                                                                        <i data-feather="edit"
                                                                           class="feather-icon "></i>
                                                                    </button>
                                                                    <hr>
                                                                </div>
                                                                <div class="col-7 text-center">
                                                                    <p class="mb-2 ">2 - Clic sur "Ajoute un nouveau
                                                                        worked" et remplisser </p>
                                                                    <img src="../assets/images/guide/23.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseThree"
                                                                aria-expanded="false"
                                                                aria-controls="flush-collapseThree">
                                                            Affichage des donneés sur la datatable
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <img src="../assets/images/guide/21.jpg"
                                                                 class="img-fluid mb-2" alt="" srcset="">
                                                            <p>Ce table represente les donneés des Work-Ed, il peut
                                                                s'ordrer avec les colonnes et un bar de recherche
                                                                aussi.</p>
                                                            <p>On cliquant sur le matricule du table, on peut se
                                                                rediriger vers le profil du matricule et les membres
                                                                aussi.</p>
                                                            <div class="d-flex gap-3">
                                                                <div>
                                                                    <button type="button" class="btn btn-dark btn-sm">
                                                                        <i data-feather="maximize-2"
                                                                           class="feather-icon "></i>
                                                                    </button>
                                                                    : Pour voir les details
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-sm">
                                                                        <i data-feather="edit"
                                                                           class="feather-icon "></i>
                                                                    </button>
                                                                    : Pour modifier ou ajout des membres et des notes
                                                                </div>
                                                            </div>
                                                            <div class="text-center mt-3">
                                                                <img src="../assets/images/guide/22.jpg"
                                                                     class="img-fluid mb-2" alt="" srcset="">
                                                                <p>Ceci represent les note sur 100 de Work-Ed par
                                                                    matricule</p>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-subtitle">
                                Bienvenue dans la section Work Education. Ici, vous pouvez gérer les informations liées
                                aux responsables et les membres du travail pendant les semestres.
                            </h6>

                            <hr>

                            <div class="table-responsive">
                                <table id="zero_config"
                                       class="table border table-striped table-bordered text-nowrap  custom-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Listes des personnages</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($workeds as $worked)
                                        <tr>
                                            <td>{{ $worked->id }}</td>
                                            <td>{{ $worked->Nom }}</td>
                                            <td>
                                                <ul class="list-inline m-auto">
                                                    <li class="list-inline-item">
                                                        <img src="../assets/images/users/{{ $worked->Responsable }}.jpg"
                                                             alt="user" class="rounded-circle img-fluid" width="40">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="font-bold link"
                                                           href="matricule/{{ $worked->Responsable }}">{{ $worked->Responsable }}</a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @foreach ($semestres as $semestre)
                                                @if ($worked->IdSemestre == $semestre->IdSemestre)
                                                    <td>{{ $semestre->NomSemestre }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <ul class="persons">
                                                    @if ($worked->workedUsers->isEmpty())
                                                        <li style="margin-left:0">Aucun membre du worked ...</li>
                                                    @else
                                                        @foreach ($worked->workedUsers->take(5) as $index => $workedUser)
                                                            <li @if($index == 0) style="margin-left:0" @endif>
                                                                <a href="matricule/{{ $workedUser->Matricule }}"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-title="{{ $workedUser->Matricule }}">
                                                                    <img
                                                                        src="../assets/images/users/{{ $workedUser->Matricule }}.jpg"
                                                                        alt="Person" class="img-fluid border">
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        @if ($worked->workedUsers->count() > 5)
                                                            <li @if($worked->workedUsers->take(5)->count() == 0) @endif>
                                                                <div class="badge bg-success ms-3 lead">
                                                                    + {{ $worked->workedUsers->count() - 5 }}</div>
                                                            </li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{$worked->id}}">
                                                    <i data-feather="maximize-2" class="feather-icon "></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{$worked->id}}">
                                                    <i data-feather="edit" class="feather-icon "></i>
                                                </button>


                                                <div class="modal fade" id="viewModal{{$worked->id}}" tabindex="-1"
                                                     aria-labelledby="viewModal{{$worked->id}}" role="dialog">
                                                    <div
                                                        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content modal-filled bg-dark">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">workeds n°{{$worked->id}}
                                                                    - {{$worked->Nom}}</h4>
                                                                <button type="button" class="btn btn-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                        data-feather="x" class="feather-icon "></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="m-0">{{ $worked->Description }}</p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <hr>
                                                                        @if ($worked->workedUsers->isEmpty())
                                                                            <div class="alert alert-warning">Aucun
                                                                                membre du worked ...
                                                                            </div>
                                                                        @else
                                                                            <div class="row">
                                                                                @foreach ($worked->workedUsers as $workedUser)
                                                                                    <div class="col-lg-4 col-md-6 ">
                                                                                        <div class="card">
                                                                                            <img
                                                                                                src="../assets/images/users/{{ $workedUser->Matricule }}.jpg"
                                                                                                class="card-img-top"
                                                                                                alt="Person">
                                                                                            <div class="m-2">
                                                                                                @php
                                                                                                    $note = is_numeric($workedUser->Note) ? $workedUser->Note : 0;
                                                                                                @endphp
                                                                                                <h6 class="fs-4 lead ">
                                                                                                    <a class="text-dark"
                                                                                                       href="matricule/{{ $workedUser->Matricule }}">{{ $workedUser->Matricule }}
                                                                                                        - {{ $note }}
                                                                                                        %</a></h6>


                                                                                                <div
                                                                                                    class="text-center m-1">


                                                                                                    <div
                                                                                                        class="progress"
                                                                                                        role="progressbar"
                                                                                                        aria-label="Animated striped example"
                                                                                                        aria-valuenow="75"
                                                                                                        aria-valuemin="0"
                                                                                                        aria-valuemax="100">
                                                                                                        <div
                                                                                                            class="progress-bar bg-dark"
                                                                                                            style="width: {{ $note }}%"></div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editModal{{$worked->id}}" tabindex="-1"
                                                     aria-labelledby="editModal{{$worked->id}}" role="dialog">
                                                    <div
                                                        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">


                                                        <form action="{{ route('worked.update', $worked->id) }}"
                                                              class="modal-content modal-filled bg-primary"
                                                              method="POST">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Work-Ed N°{{$worked->id}}
                                                                    - {{$worked->Nom}}</h4>
                                                                <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                        data-feather="x" class="feather-icon "></i>
                                                                </button>
                                                            </div>
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body bg-white">
                                                                <div class="row">
                                                                    <div class="mb-3 col-6 text-start">
                                                                        <label class="form-label">Nom</label>
                                                                        <input type="text" class="form-control"
                                                                               name="Nom" value="{{ $worked->Nom }}"
                                                                               required>
                                                                    </div>
                                                                    <div class="mb-3 col-6 text-start">
                                                                        <label class="form-label">Responsable</label>
                                                                        <input type="text" class="form-control"
                                                                               minlength="5" maxlength="5"
                                                                               name="Responsable"
                                                                               value="{{ $worked->Responsable }}"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="text-start">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="Description"
                                                                              class="form-control">{{ $worked->Description }}</textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 form-group mt-2 text-start">
                                                                        <label class="form-label ">Semestre</label>
                                                                        <select class="form-select" name="IdSemestre"
                                                                                required>
                                                                            @foreach ($semestres as $semestre)
                                                                                <option
                                                                                    value="{{ $semestre->IdSemestre }}"
                                                                                    @if($worked->IdSemestre == $semestre->IdSemestre) selected @endif>{{ $semestre->NomSemestre }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <hr>
                                                                        @if ($worked->workedUsers->isEmpty())

                                                                        @else
                                                                            <div class="row text-dark mx-1">
                                                                                <div class="col-6">Matricule</div>
                                                                                <div class="col-6">Note</div>
                                                                            </div>
                                                                            @foreach ($worked->workedUsers as $index => $workedUser)
                                                                                <div class="input-group mb-2">
                                                                                    <input type="hidden"
                                                                                           name="workedUsers[{{ $index }}][id]"
                                                                                           value="{{ $workedUser->id }}">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           name="workedUsers[{{ $index }}][Matricule]"
                                                                                           placeholder="Matricule"
                                                                                           value="{{ $workedUser->Matricule }}"
                                                                                           required>
                                                                                    <input type="number" max="100"
                                                                                           min="0" class="form-control"
                                                                                           name="workedUsers[{{ $index }}][Note]"
                                                                                           placeholder="Note"
                                                                                           value="{{ $workedUser->Note }}"
                                                                                           required>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="mt-3 d-flex justify-content-between">
                                                                    <button type="button"
                                                                            class="btn btn-light text-primary"
                                                                            onclick="addUserField({{ $worked->id }})">
                                                                        Ajouter un nouveau worked
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Soumettre
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <script>
                                        function addUserField(workedId) {
                                            let modal = document.getElementById('editModal' + workedId);
                                            let index = modal.querySelectorAll('.input-group').length;
                                            let html = `
                                                        <div class="input-group mb-2">
                                                            <input type="hidden" name="workedUsers[${index}][id]">
                                                            <input type="text" minlength="5" maxlength="5" class="form-control"  name="workedUsers[${index}][Matricule]" placeholder="Matricule" required>
                                                            <input type="number" max="100" min="0" class="form-control" name="workedUsers[${index}][Note]" value="0">
                                                        </div>
                                                        `;
                                            modal.querySelector('.row .col-12').insertAdjacentHTML('beforeend', html);
                                        }
                                    </script>
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                Copyright © 2024 Suivi des étudiants | UAZ
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>

    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
</div>
