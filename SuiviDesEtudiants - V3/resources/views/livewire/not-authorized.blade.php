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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid text-center">

                <h1>Not Authorized</h1>
                <img src="../img/data-not-found.gif" alt="" srcset="">
            </div>
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
