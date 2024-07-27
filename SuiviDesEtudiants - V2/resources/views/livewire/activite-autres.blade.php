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
                <div class="row">
                    <div class="col-lg-5 col-md-12 align-self-center">
                        <div class="customize-input float-start">
                            <button class="btn btn-rounded  btn-outline-primary px-4 py-2"
                                    type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#suiviadd"
                            >
                                <i class="fas fa-plus me-2"></i>
                                Ajouter un nouveau activité
                            </button>


                            <!-- Center modal content -->
                            <div class="modal fade" id="suiviadd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div
                                    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable rounded">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-dark">
                                            <h4 class="modal-title" id="myCenterModalLabel">Nouveau autre activité</h4>
                                            <button type="button" class="btn" data-bs-dismiss="modal"
                                                    aria-hidden="true">
                                                <i data-feather="x" class="feather-icon bg-dark"></i>

                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('activite.store') }}" method="POST"
                                                  enctype="multipart/form-data" class="row">
                                                @csrf
                                                <div class="col-4 form-group mb-3">
                                                    <label class="form-label">Types</label>
                                                    <input type="text" name="Type" class="form-control"
                                                           placeholder="Types de l'activité" required>
                                                </div>
                                                <div class="col-4 form-group mb-3">
                                                    <label class="form-label">Responsable</label>
                                                    <input id="responsableInput" type="text" minlength="5"
                                                           name="Responsable" class="form-control"
                                                           placeholder="Responsable de l'activité" required>
                                                </div>
                                                <div class="col-4 form-group mb-3">
                                                    <label class="form-label">Cible</label>
                                                    <input id="cibleInput" name="Cible" type="text" minlength="5"
                                                           class="form-control" placeholder="Cible de l'activité"
                                                           required>
                                                </div>
                                                <div class="col-12 form-group mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="Description" class="form-control"
                                                              placeholder="Description du suivi ..."></textarea>
                                                </div>
                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Rapport de l'activité [format PDF]</label>
                                                    <input type="file" name="Rapportfilepath" class="form-control"
                                                           accept=".pdf">
                                                </div>
                                                <div class="col-3 form-group mb-3">
                                                    <label class="form-label">Debut</label>
                                                    <input type="date" name="DateDebut" class="form-control" required>
                                                </div>
                                                <div class="col-3 form-group mb-3">
                                                    <label class="form-label">Fin</label>
                                                    <input type="date" name="DateFin" class="form-control">
                                                </div>
                                                <div class="text-center">
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
                                    <p class=" card-title display-6">Autres Activités</p>
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
                                                            Ajout de nouveau activité
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-4 text-center">
                                                                    <p class="m-0">1 - Cliquer sur le bouton</p>
                                                                    <img src="../assets/images/guide/31.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                </div>
                                                                <div class="col-8 text-center">
                                                                    <p class="mb-2 ">2 - Inserer les données requis</p>
                                                                    <img src="../assets/images/guide/32.jpg"
                                                                         class="img-fluid" alt="" srcset="">
                                                                    <p>A Vous de choisir d'inserer le rapport ou pas</p>
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
                                                            Visialisation du datatable
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <img src="../assets/images/guide/33.jpg"
                                                                 class="img-fluid mb-2" alt="" srcset="">
                                                            <p>Ce table represente les donneés sur les activité, il peut
                                                                s'ordrer avec les colonnes et un bar de recherche
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
                                                                    : Pour modifier
                                                                </div>


                                                            </div>
                                                            <img src="../assets/images/guide/34.png"
                                                                 class="img-fluid mt-3" alt="" srcset="">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-subtitle">
                                Bienvenue dans la section Autres Activités. Cette section vous permet de consulter et de
                                gérer toutes les activités qui ne relèvent pas des catégories principales de notre
                                université. Vous pouvez ajouter de nouvelles activités, mettre à jour les détails des
                                activités existantes.
                            </h6>

                            <hr>
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Types</th>
                                        <th>Responsable</th>
                                        <th>Cible</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($activites as $activite)
                                        <tr>
                                            <td>{{ $activite->id }}</td>
                                            <td>{{ $activite->Type }}</td>
                                            <td>{{ $activite->Responsable }}</td>
                                            <td>{{ $activite->Cible }}</td>
                                            <td>{{ strlen($activite->Description) > 10 ? substr($activite->Description, 0, 30) . '...' : $activite->Description }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{$activite->id}}">
                                                    <i data-feather="maximize-2" class="feather-icon "></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $activite->id }}">
                                                    <i data-feather="edit" class="feather-icon "></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="viewModal{{$activite->id}}" tabindex="-1"
                                             aria-labelledby="viewModal{{$activite->id}}" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
                                                <div class="modal-content modal-filled bg-dark">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Suivi n°{{$activite->id}}
                                                            - {{$activite->Type}}</h4>
                                                        <button type="button" class="btn btn-dark"
                                                                data-bs-dismiss="modal" aria-label="Close"><i
                                                                data-feather="x" class="feather-icon "></i></button>
                                                    </div>
                                                    <div class="modal-body ">

                                                        <div class="row rounded">
                                                            <div class="col-12 ">
                                                                <div class="text-start display-5 mb-2">
                                                                    A propos
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 mt-2">
                                                                <div class="bg-white text-dark rounded-2 p-2">
                                                                    Responsable : {{$activite->Responsable}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 mt-2">
                                                                <div class="bg-white text-dark rounded-2 p-2">
                                                                    Cible : {{$activite->Cible}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 mt-2">
                                                                <div class="bg-white text-dark rounded-2 p-2">
                                                                    Date debut : {{$activite->DateDebut}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 mt-2">
                                                                <div class="bg-white text-dark rounded-2 p-2">
                                                                    Date fin :
                                                                    @if($activite->DateFin)
                                                                        {{$activite->DateFin}}
                                                                    @else
                                                                        Non definie
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($activite->Description)
                                                                <div class="col-12 mt-2">
                                                                    <div class="bg-white text-dark rounded-2 p-2">
                                                                        Description : {{$activite->Description}}
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div>
                                                            @if($activite->Rapportfilepath)
                                                                <div class="col-12 mt-1">
                                                                    <hr>
                                                                    <div
                                                                        class="row justify-content-between align-items-center">
                                                                        <div class="col-4 display-5">
                                                                            Rapport
                                                                        </div>


                                                                        <div
                                                                            class="col-4 d-grid gap-2 d-md-block d-md-flex justify-content-md-end">
                                                                            <a class="btn btn-dark  waves-effect waves-light"
                                                                               role="button"
                                                                               href="{{ asset($activite->Rapportfilepath) }}"
                                                                               download><span
                                                                                    class="btn-label"><i
                                                                                        data-feather="download"
                                                                                        class="feather-icon "></i></span>
                                                                                Télécharger
                                                                            </a>
                                                                            <a class="btn btn-dark waves-effect waves-light"
                                                                               role="button"
                                                                               href="{{ asset($activite->Rapportfilepath) }}"
                                                                               target="_blank"><span
                                                                                    class="btn-label"><i
                                                                                        data-feather="external-link"
                                                                                        class="feather-icon "></i></span>
                                                                                Ouvrir
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <embed
                                                                            src="{{ asset($activite->Rapportfilepath) }}"
                                                                            type="application/pdf" width="100%"
                                                                            height="600px"/>
                                                                        <!-- <iframe src="{{ asset($activite->Rapportfilepath) }}" width="100%" height="600px" style="border: none;"></iframe> -->
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="editModal{{$activite->id}}" tabindex="-1"
                                             aria-labelledby="editModal{{$activite->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content modal-filled  bg-primary">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Activités n°{{$activite->id}}</h4>
                                                        <button type="button" class="btn btn-primary"
                                                                data-bs-dismiss="modal" aria-label="Close"><i
                                                                data-feather="x" class="feather-icon "></i></button>
                                                    </div>
                                                    <div class="modal-body text-white">
                                                        <form action="{{ route('activite.update', $activite->id) }}"
                                                              method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-4 form-group mb-3">
                                                                    <label class="form-label text-white">Types</label>
                                                                    <input name="Type" type="text" minlength="5"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->Type }}" required>
                                                                </div>
                                                                <div class="col-4 form-group mb-3">
                                                                    <label
                                                                        class="form-label text-white">Responsable</label>
                                                                    <input type="text" name="Responsable"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->Responsable }}"
                                                                           required>
                                                                </div>
                                                                <div class="col-4 form-group mb-3">
                                                                    <label class="form-label text-white">Cible</label>
                                                                    <input type="text" name="Cible"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->Cible }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label text-white">Description</label>
                                                                <textarea name="Description"
                                                                          class="form-control bg-light">{{ $activite->Description }}</textarea>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 form-group mb-3">
                                                                    <label class="form-label text-white">Rapport de
                                                                        l'activité</label>
                                                                    <input type="file" name="Rapportfilepath"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->Rapportfilepath }}"
                                                                           accept=".pdf">
                                                                </div>
                                                                <div class="col-3 form-group mb-3">
                                                                    <label class="form-label text-white">Date
                                                                        debut</label>
                                                                    <input type="date" name="DateDebut"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->DateDebut }}" required>
                                                                </div>
                                                                <div class="col-3 form-group mb-3">
                                                                    <label class="form-label text-white">Date
                                                                        fin</label>
                                                                    <input type="date" name="DateFin"
                                                                           class="form-control bg-light"
                                                                           value="{{ $activite->DateFin }}">
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info px-4">
                                                                    Enregistrer
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- end card-body-->
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
