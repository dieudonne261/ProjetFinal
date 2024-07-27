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
                                    data-bs-target="#suiviadd"
                            >
                                <i class="fas fa-plus me-2"></i>
                                Ajouter un nouveau membres
                            </button>


                            <!-- Center modal content -->
                            <div class="modal fade" id="suiviadd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-dark">
                                            <h4 class="modal-title" id="myCenterModalLabel">Nouveau membres</h4>
                                            <button type="button" class="btn" data-bs-dismiss="modal"
                                                    aria-hidden="true">
                                                <i data-feather="x" class="feather-icon bg-dark"></i>

                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('membres.store') }}" method="POST" class="row">
                                                @csrf
                                                <div class="col-12 form-group mb-3">

                                                    <label class="form-label">Nom</label>
                                                    <input type="text" name="nom" class="form-control"
                                                           placeholder="Nom du membres ..." required>

                                                </div>
                                                <div class="col-12 form-group mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control"
                                                              placeholder="Description ..."></textarea>
                                                </div>

                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Debut</label>
                                                    <input type="date" name="debut" class="form-control" required>
                                                </div>
                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Fin</label>
                                                    <input type="date" name="fin" class="form-control">
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

                            <p class="card-title display-6"></p>
                            <div class="justify-content-between row">
                                <div class="col-6">
                                    <p class=" card-title display-6">Listes Des Membres</p>
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
                                                            Ajout un nouveau membres
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-5 text-center">
                                                                    <p class="m-0">1 - Cliquer sur le bouton</p>
                                                                    <img src="../assets/images/guide/27.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                    <hr>
                                                                    <p class="m-0">3 - Pour ajouter des membres : Voir
                                                                        "Ajout des membres"</p>
                                                                </div>
                                                                <div class="col-7 text-center">
                                                                    <p class="mb-2 ">2 - Inserer les données requis</p>
                                                                    <img src="../assets/images/guide/28.jpg"
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
                                                                    <p class="m-0">1 - Creez, Modifier votre membres</p>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-sm">
                                                                        <i data-feather="edit"
                                                                           class="feather-icon "></i>
                                                                    </button>
                                                                    <hr>
                                                                </div>
                                                                <div class="col-7 text-center">
                                                                    <p class="mb-2 ">2 - Clic sur "Ajoute un nouveau
                                                                        membres" puis remplisser </p>
                                                                    <img src="../assets/images/guide/29.jpg"
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
                                                            <p>Ce table represente les donneés des membres, il peut
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
                                                                <img src="../assets/images/guide/30.jpg"
                                                                     class="img-fluid mb-2" alt="" srcset="">
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
                                Bienvenue dans la section Listes Des Membres. Cette section vous permet de visualiser et
                                de gérer tous les membres enregistrés dans notre université. Vous pouvez ajouter de
                                nouveaux membres, mettre à jour les informations existantes si nécessaire.
                            </h6>

                            <hr>
                            <div class="table-responsive">
                                <table id="zero_config"
                                       class="table border table-striped table-bordered text-nowrap  custom-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Debut</th>
                                        <th scope="col">Fin</th>
                                        <th scope="col">Listes Des Membres</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($membres as $membre)
                                        <tr>
                                            <td>{{ $membre->id }}</td>
                                            <td>{{ $membre->Nom }}</td>
                                            <td>{{ strlen($membre->Description) > 10 ? substr($membre->Description, 0, 30) . '...' : $membre->Description }}</td>
                                            <td>{{ $membre->Debut }}</td>
                                            <td>{{ $membre->Fin }}</td>
                                            <td>
                                                <ul class="persons">
                                                    @if ($membre->membreUsers->isEmpty())
                                                        <li style="margin-left:0">Aucun membre ...</li>
                                                    @else
                                                        @foreach ($membre->membreUsers->take(5) as $index => $membreUser)
                                                            <li @if($index == 0) style="margin-left:0" @endif>
                                                                <a href="matricule/{{ $membreUser->Matricule }}"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-title="{{ $membreUser->Matricule }} : {{ $membreUser->Role }}">
                                                                    <img
                                                                        src="../assets/images/users/{{ $membreUser->Matricule }}.jpg"
                                                                        alt="Person" class="img-fluid border">
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        @if ($membre->membreUsers->count() > 5)
                                                            <li @if($membre->membreUsers->take(5)->count() == 0) @endif>
                                                                <div class="badge bg-success ms-3 lead">
                                                                    + {{ $membre->membreUsers->count() - 5 }}</div>
                                                            </li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{$membre->id}}">
                                                    <i data-feather="maximize-2" class="feather-icon "></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{$membre->id}}">
                                                    <i data-feather="edit" class="feather-icon "></i>
                                                </button>


                                                <div class="modal fade" id="viewModal{{$membre->id}}" tabindex="-1"
                                                     aria-labelledby="viewModal{{$membre->id}}" role="dialog">
                                                    <div
                                                        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content modal-filled bg-dark">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Membres n°{{$membre->id}}
                                                                    - {{$membre->Nom}}</h4>
                                                                <button type="button" class="btn btn-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                        data-feather="x" class="feather-icon "></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="m-0">{{ $membre->Description }}</p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <hr>
                                                                        @if ($membre->membreUsers->isEmpty())
                                                                            <div class="alert alert-warning">Aucun
                                                                                membre ...
                                                                            </div>
                                                                        @else
                                                                            <div class="row">
                                                                                @foreach ($membre->membreUsers as $membreUser)
                                                                                    <div class="col-lg-4 col-md-6 ">
                                                                                        <div class="card">
                                                                                            <img
                                                                                                src="../assets/images/users/{{ $membreUser->Matricule }}.jpg"
                                                                                                class="card-img-top"
                                                                                                alt="Person">
                                                                                            <div class="card-body">
                                                                                                <h6 class="card-title display-6 border-bottom">
                                                                                                    <a class="text-dark"
                                                                                                       href="matricule/{{ $membreUser->Matricule }}">{{ $membreUser->Matricule }}</a>
                                                                                                </h6>
                                                                                                <p class=" text-dark">{{ $membreUser->Role }}</p>
                                                                                                <p class=""><small
                                                                                                        class="text-muted">Ajouté
                                                                                                        le {{ $membreUser->DateAjout }}</small>
                                                                                                </p>
                                                                                                @if ($membreUser->DateRetire)
                                                                                                    <p class=""><small
                                                                                                            class="text-muted">Retiré
                                                                                                            le {{ $membreUser->DateRetire }}</small>
                                                                                                    </p>
                                                                                                @endif
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

                                                <div class="modal fade" id="editModal{{$membre->id}}" tabindex="-1"
                                                     aria-labelledby="editModal{{$membre->id}}" role="dialog">
                                                    <div
                                                        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">


                                                        <form action="{{ route('membres.update', $membre->id) }}"
                                                              class="modal-content modal-filled bg-primary"
                                                              method="POST">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Membres n°{{$membre->id}}
                                                                    - {{$membre->Nom}}</h4>
                                                                <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                        data-feather="x" class="feather-icon "></i>
                                                                </button>
                                                            </div>
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body bg-white">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="mb-3 text-start">
                                                                            <label class="form-label">Nom</label>
                                                                            <input type="text" class="form-control"
                                                                                   name="Nom" value="{{ $membre->Nom }}"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3 text-start">
                                                                            <label class="form-label">Debut</label>
                                                                            <input type="date" class="form-control"
                                                                                   name="Debut"
                                                                                   value="{{ $membre->Debut }}"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3 text-start">
                                                                            <label class="form-label">Fin</label>
                                                                            <input type="date" class="form-control"
                                                                                   name="Fin" value="{{ $membre->Fin }}"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text-start">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="Description"
                                                                              class="form-control">{{ $membre->Description }}</textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <hr>
                                                                        @if ($membre->membreUsers->isEmpty())

                                                                        @else
                                                                            <div class="row text-dark mx-1">
                                                                                <div class="col-3">Matricule</div>
                                                                                <div class="col-3">Role</div>
                                                                                <div class="col-3">Ajout</div>
                                                                                <div class="col-3">Retire</div>
                                                                            </div>
                                                                            @foreach ($membre->membreUsers as $index => $membreUser)
                                                                                <div class="input-group mb-2">
                                                                                    <input type="hidden"
                                                                                           name="membreUsers[{{ $index }}][id]"
                                                                                           value="{{ $membreUser->id }}">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           name="membreUsers[{{ $index }}][Matricule]"
                                                                                           placeholder="Matricule"
                                                                                           value="{{ $membreUser->Matricule }}"
                                                                                           required>
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           name="membreUsers[{{ $index }}][Role]"
                                                                                           placeholder="Role"
                                                                                           value="{{ $membreUser->Role }}"
                                                                                           required>
                                                                                    <input type="date"
                                                                                           class="form-control"
                                                                                           name="membreUsers[{{ $index }}][DateAjout]"
                                                                                           value="{{ $membreUser->DateAjout }}"
                                                                                           required>
                                                                                    <input type="date"
                                                                                           class="form-control"
                                                                                           name="membreUsers[{{ $index }}][DateRetire]"
                                                                                           value="{{ $membreUser->DateRetire }}">
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
                                                                            onclick="addUserField({{ $membre->id }})">
                                                                        Ajouter un nouveau membre
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
                                        function addUserField(membreId) {
                                            let modal = document.getElementById('editModal' + membreId);
                                            let index = modal.querySelectorAll('.input-group').length;
                                            let html = `
                                                        <div class="input-group mb-2">
                                                            <input type="hidden" name="membreUsers[${index}][id]">
                                                            <input type="text" class="form-control" name="membreUsers[${index}][Matricule]" placeholder="Matricule" required>
                                                            <input type="text" class="form-control" name="membreUsers[${index}][Role]" placeholder="Role" required>
                                                            <input type="date" class="form-control" name="membreUsers[${index}][DateAjout]" required>
                                                            <input type="date" class="form-control" name="membreUsers[${index}][DateRetire]">
                                                        </div>
                                                        `;
                                            modal.querySelector('.row .col-12').insertAdjacentHTML('beforeend', html);
                                        }
                                    </script>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
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
