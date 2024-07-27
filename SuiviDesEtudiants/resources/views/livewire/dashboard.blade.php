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
                        <form id="searchMatriculeForm" class="input-group">
                            <input id="searchMatricule" class="form-control custom-shadow border-0 bg-white"
                                   type="search" placeholder="Entrez Matricule" aria-label="Search">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
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

                            <p class="card-title display-6">Menu Principal</p>
                            <h6 class="card-subtitle">
                                Bienvenue dans le menu principal de votre tableau de bord. Ici, vous pouvez accéder à
                                toutes les fonctionnalités et informations importantes de votre application. Utilisez le
                                menu de navigation pour gérer les semestres, suivre les activités des étudiants,
                                consulter les rapports et bien plus encore. Veuillez explorer les différentes sections
                                pour tirer le meilleur parti de votre expérience utilisateur.
                            </h6>

                        </div>
                    </div>
                </div>
                <div class="row mt-1">

                    <div class="col-sm-6 col-lg-4">
                        <div class="card  bg-info">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $personnes->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            personnages
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-white"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card bg-danger">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $suivis->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            suivie
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-white"><i data-feather="file-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card  bg-success">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $activites->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            activité
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-white"><i data-feather="activity"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-6">
                        <div class="card  bg-warning">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $workeds->count()}}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            worked
                                        </h6>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $workedsusers->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            membres
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-white"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="card  bg-warning">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $membres->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            groupes
                                        </h6>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-inline-flex align-items-center text-white">
                                            <h2 class="text-white mb-1 font-weight-medium">{{ $membresusers->count() }}</h2>
                                        </div>
                                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total des
                                            membres
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-white"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="row ">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h4 class="mb-0 text-white">Suivi</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chart-Suivi-1" class="mt-2 mb-4" style="height:250px; width:100%;"></canvas>
                                @foreach($suiviStats['labels'] as $index => $label)
                                    <div class="row mb-3 align-items-center mb-1">
                                        <div class="col-4 text-end">
                                            <span class="text-muted font-14">{{ $label }}</span>
                                        </div>
                                        <div class="col-5">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: {{ $suiviStats['percentages'][$index] }}%"
                                                     aria-valuenow="{{ $suiviStats['percentages'][$index] }}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-end">
                                            <span class="mb-0 font-14 text-dark font-weight-medium">{{ $suiviStats['percentages'][$index] }}%</span>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h4 class="mb-0 text-white">Suivi</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chart-Suivi-2" class="mt-2" height="80" width="170"></canvas>
                            </div>
                        </div>
                        <div class="card bg-danger">

                            <div class="card-body text-end">
                                <h4 class="display-4 text-white mb-0">Suivi Des Etudiants</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h4 class="mb-0 text-white">Role</h4>
                            </div>

                            <div id="roleCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($roles as $index => $role)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <div class="card-body bg-dark row">
                                                <div class="col-5 text-center">
                                                    <img
                                                        src="{{ asset('assets/images/users/' . $role->Matricule . '.jpg') }}"
                                                        alt="user" class="rounded-circle img-fluid" width="250px">
                                                </div>
                                                <div class="col-7">
                                                    <h3 class="display-5 text-center mt-5">{{ $role->Matricule }}</h3>
                                                    <hr>
                                                    <h3 class="lead text-center">{{ $role->NomResponsabilite }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#roleCarousel" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#roleCarousel" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>

                        <div class="card bg-dark mt-4">
                            <div class="card-body text-start">
                                <h4 class="fs-1 text-white mb-0 font-medium">Gestion Des Roles</h4>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 text-white">Activités Université</h4>
                            </div>
                            <div class="card-body text-center display-4 m-0 p-2">
                                {{ $activitesU->count() }}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 text-white">Activités S.A.</h4>
                            </div>
                            <div class="card-body text-center display-4 m-0 p-2">
                                {{ $activitesS->count() }}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 text-white">Autres Activités</h4>
                            </div>
                            <div class="card-body text-center display-4 m-0 p-2">
                                {{ $activitesO->count() }}
                            </div>
                        </div>
                    </div>

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
                <!-- End Container fluid  -->
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


        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('searchMatriculeForm');
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const matricule = document.getElementById('searchMatricule').value;
                    if (matricule) {
                        window.location.href = `/matricule/${matricule}`;
                    }
                });
            });
            new Chart(document.getElementById("chart-Suivi-1"), {
                type: 'doughnut',
                data: {
                    labels: @json($suiviStats['labels']),
                    datasets: [{
                        data: @json($suiviStats['data']),
                        backgroundColor: [
                            '#61aaff',
                            '#3772b7',
                            '#113968',
                            '#020e1d'
                        ],
                        hoverOffset: 4
                    }]
                }
            });
            new Chart(document.getElementById("chart-Suivi-2"), {
                type: 'line',
                data: {
                    labels: @json($suiviDateLabels),
                    datasets: [{
                        label: 'Nombre de Suivis',
                        data: @json($suiviDateCounts),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nombre de Suivis'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

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


        <script src="../dist/js/app-style-switcher.js"></script>
        <script src="../dist/js/feather.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <!-- themejs -->
        <!--Menu sidebar -->
        <script src="../dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../dist/js/custom.min.js"></script>


    </div>
