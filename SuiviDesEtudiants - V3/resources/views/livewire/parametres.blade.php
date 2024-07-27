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
                            <div class="col-6">
                                <p class=" card-title display-6">Outils supplémentaires</p>
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
                                                            Accordion Item #1
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">Placeholder content for this
                                                            accordion, which is intended to demonstrate the <code>.accordion-flush</code>
                                                            class. This is the first item's accordion body.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseTwo"
                                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Accordion Item #2
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">Placeholder content for this
                                                            accordion, which is intended to demonstrate the <code>.accordion-flush</code>
                                                            class. This is the second item's accordion body. Let's
                                                            imagine this being filled with some actual content.
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
                                                            Accordion Item #3
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">Placeholder content for this
                                                            accordion, which is intended to demonstrate the <code>.accordion-flush</code>
                                                            class. This is the third item's accordion body. Nothing more
                                                            exciting happening here in terms of content, but just
                                                            filling up the space to make it look, at least at first
                                                            glance, a bit more representative of how this would look in
                                                            a real-world application.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-subtitle">
                                Bienvenue dans la section Outils supplémentaires. Cette section vous permet d'accéder à
                                divers outils et fonctionnalités supplémentaires pour faciliter la gestion et
                                l'administration de votre plateforme. Explorez et utilisez ces outils pour optimiser
                                votre expérience utilisateur et répondre à vos besoins spécifiques.
                            </h6>


                            <!-- end card-body-->
                        </div> <!-- end card -->


                    </div> <!-- end col -->
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card p-4">
                            <div class="justify-content-between row">
                                <div class="col-6"><p class=" card-title display-6">Etats Du Semestre</p></div>
                                <div class="col-6">
                                    <button class="btn btn-rounded float-end btn-outline-primary px-4 py-2"
                                            type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#suiviadd">
                                        <i class="fas fa-plus me-2"></i>
                                        Ajouter
                                    </button>
                                </div>


                            </div>

                            <div class="modal fade" id="suiviadd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-dark">
                                            <h4 class="modal-title" id="myCenterModalLabel">Nouveau utilisateur</h4>
                                            <button type="button" class="btn" data-bs-dismiss="modal"
                                                    aria-hidden="true">
                                                <i data-feather="x" class="feather-icon bg-dark"></i>

                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('etatsemestre.store') }}" method="POST" class="row">
                                                @csrf
                                                <div class="col-12 form-group mb-3">
                                                    <label class="form-label">Nom du semestre - [ ex : Premier Semestre
                                                        - 2023/2024 ]</label>
                                                    <input type="text" minlength="10" name="NomSemestre"
                                                           class="form-control"
                                                           required>
                                                </div>

                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Debut du semestre</label>
                                                    <input type="date" name="DateDebut" class="form-control"
                                                           required>
                                                </div>
                                                <div class="col-6 form-group mb-3">
                                                    <label class="form-label">Fin du semestre</label>
                                                    <input type="date" name="DateFin"
                                                           class="form-control" required>
                                                </div>
                                                <div class="col-4 m-auto">
                                                    <button type="submit" class="btn btn-info px-4">Enregistrer
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>


                            <h6 class="card-subtitle">
                                La section Etat Semestre vous permet de gérer les périodes académiques en cours, y
                                compris les dates de début et de fin de chaque semestre. Utilisez cette section pour
                                consulter et mettre à jour les informations sur les semestres actifs, assurant ainsi une
                                gestion précise et efficace des périodes d'études.
                            </h6>


                            <!-- end card-body-->
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom du Semestre</th>
                                        <th>Debut</th>
                                        <th>Fin</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($semestres as $semestre)
                                        <tr>
                                            <td>{{ $semestre->id }}</td>
                                            <td>{{ $semestre->NomSemestre }}</td>
                                            <td>{{ $semestre->DateDebut }}</td>
                                            <td>{{ $semestre->DateFin }}</td>
                                            <td class="text-center">

                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $semestre->id }}">
                                                    <i data-feather="edit" class="feather-icon "></i>
                                                </button>

                                            </td>


                                            <!-- Modal pour éditer le role -->
                                            <div class="modal fade" id="editModal{{$semestre->id}}" tabindex="-1"
                                                 aria-labelledby="editModal{{$semestre->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content modal-filled  bg-primary">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">role n°{{$semestre->id}}</h4>
                                                            <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal" aria-label="Close"><i
                                                                    data-feather="x" class="feather-icon "></i></button>
                                                        </div>
                                                        <div class="modal-body text-white">
                                                            <form
                                                                action="{{ route('etatsemestre.update', $semestre->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-12 form-group mb-3">
                                                                        <label
                                                                            class="form-label text-white">Nom du
                                                                            Semestre</label>
                                                                        <input name="NomSemestre" type="text"
                                                                               id="matriculefiltre" minlength="5"
                                                                               class="form-control bg-light"
                                                                               value="{{ $semestre->NomSemestre }}"
                                                                               required>
                                                                    </div>
                                                                    <div class="col-6 form-group mb-3">
                                                                        <label
                                                                            class="form-label text-white">Debut</label>
                                                                        <input name="DateDebut" type="date"
                                                                               value="{{ $semestre->DateDebut }}"
                                                                               class="form-control bg-light" required>
                                                                    </div>
                                                                    <div class="col-6 form-group mb-3">
                                                                        <label class="form-label text-white">Fin</label>
                                                                        <input name="DateFin" type="date"
                                                                               value="{{ $semestre->DateFin }}"
                                                                               class="form-control bg-light">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-info px-4">
                                                                            Enregistrer
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card -->


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

</div>
