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
                            <img src="../assets/images/Suivi.png" alt="" class="p-4" width="200px" >
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
                                aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="En développement ...">
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
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @livewire('profile-header')
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY rounded">
                                <a class="dropdown-item" href="/profil"><i data-feather="user"
                                        class="svg-icon me-2 ms-1"></i>
                                    Mon Profil</a>
                                <a class="dropdown-item" href="/parametre"><i data-feather="settings"
                                        class="svg-icon me-2 ms-1"></i>
                                    Parametre du compte</a>
                                <div class="dropdown-divider "></div>
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

                        <li class="sidebar-item"> <a class="sidebar-link" href="/suividesetudiants"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Suivi des etudiants
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/gestiondesroles"
                                aria-expanded="false"><i data-feather="link" class="feather-icon"></i><span
                                    class="hide-menu">Gestion des roles</span></a>
                                </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/workeducation"
                                aria-expanded="false"><i data-feather="briefcase" class="feather-icon"></i><span
                                    class="hide-menu">Work Education</span></a>
                                </li>


                        <!-- Listes -->  
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Les Listes</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/personnages"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Personnages</span></a></li>

                        </li>
                        <!--
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href=""
                                aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span
                                    class="hide-menu">Etudiants</span></a></li>--> 

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/membres"
                                aria-expanded="false"><i data-feather="smile" class="feather-icon"></i><span
                                    class="hide-menu">Membres</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link has-arrow"
                                aria-expanded="false"><i data-feather="activity" class="feather-icon"></i><span
                                    class="hide-menu">Activités </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/activiteuniverste" class="sidebar-link"><span
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

                        <li class="list-divider"></li>


                        <!-- Others -->  
                        <li class="nav-small-cap"><span class="hide-menu">Autres</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="/gestiondesutilisateurs"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Gestion des utilisateurs
                                </span></a>

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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 text-center">
                        <div style="background-image: url(../assets/images/profil-back{{$personne->Sex}}.jpg);background-size: cover;border-radius: 10px;margin-bottom:90px">
                            <img src="../assets/images/users/{{ $user->Matricule }}.jpg" alt="user" class="rounded-circle mt-5 " width="300px" style="border: 0px solid white; margin-bottom:-100px;">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informations personnels</h4>
                                <ul class="list-style-none mt-4">
                                    <li>
                                        <span class="text-muted">Matricule</span>
                                        <span class="text-dark float-end font-weight-medium">{{ $personne->Matricule }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Nom</span>
                                        <span class="text-dark float-end font-weight-medium text-uppercase">{{ $personne->Nom }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Prénom</span>
                                        <span class="text-dark float-end font-weight-medium">{{ $personne->Prenom }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Mention</span>
                                        <span class="text-dark float-end font-weight-medium">Informatiques</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Parcours</span>
                                        <span class="text-dark float-end font-weight-medium">Genies Logiciels</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Année</span>
                                        <span class="text-dark float-end font-weight-medium">L3</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Autre informations</span>
                                        <span class="text-dark float-end font-weight-medium">...</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suivie</h4>
                                <div>
                                    <canvas id="suivi-chart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suivie</h4>
                                <div>
                                    <canvas id="" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suivie</h4>
                                <div>
                                    <canvas id="suivi-chart-2" height="200"></canvas>
                                </div>
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
                All Rights Reserved by Freedash. Designed and Developed by Dede.
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

    <script src="../dist/js/pages/chartjs/chartjs.init.js"></script>
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("suivi-chart"), {
            type: 'doughnut',
            data: {
                labels: [
                    'Suivi Creée',
                    'Suivi Cible'
                ],
                datasets: [{
                    data: [{{ $matriculeAddCount }}, {{ $matriculeCibleCount }}],
                    backgroundColor: [
                    'rgb(142, 55, 255)',
                    'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
        new Chart(document.getElementById("suivi-chart-2"), {
            type: 'bar',
            data: {
                labels: ['S1-2022', 'PS1-2022', 'S2-2022', 'PS2-2022', 'S1-2023', 'PS1-2023'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [65, 59, 80, 81, 56, 55],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Dataset 2',
                    data: [28, 48, 40, 19, 86, 27],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
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

    

</div>