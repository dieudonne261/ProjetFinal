<style>
    .custom-table tbody .persons {
        padding: 0;
    ²   margin: 0; }
    .custom-table tbody .persons li {
        padding: 0;
        margin: 0 0 0 -15px;
        list-style: none;
        display: inline-block; }
    .custom-table tbody .persons li a {
        display: inline-block;
        width: 36px; }
    .custom-table tbody .persons li a img {
        border-radius: 50%;
        max-width: 100%; }
        
    .table td, .table th {
        text-align: center;
        vertical-align: middle;
        align-items: center;
        align-content: center;}
</style>
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
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ">
            <strong class="me-auto">Messages</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-light">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ">
            <strong class="me-auto">Messages d'erreur</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-light ">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
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
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row justify-content-between">
                    <div class="col-5 align-self-center">
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
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
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
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom du membres ..." required>
                                                        
                                                    </div>
                                                    <div class="col-12 form-group mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" placeholder="Description ..."></textarea>
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
                    <div class="col-5 align-self-center">
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


            <div class="table-responsive">
                <table id="zero_config" class="table border table-striped table-bordered text-nowrap  custom-table">
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
                                <td>{{ $membre->Description }}</td>
                                <td>{{ $membre->Debut }}</td>
                                <td>{{ $membre->Fin }}</td>
                                <td>
                                <ul class="persons">
                                    @if ($membre->membreUsers->isEmpty())
                                        <li style="margin-left:0">Aucun membre ...</li>
                                    @else
                                        @foreach ($membre->membreUsers->take(5) as $index => $membreUser)
                                            <li @if($index == 0) style="margin-left:0" @endif>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-title="{{ $membreUser->Matricule }} : {{ $membreUser->Role }}">
                                                    <img src="../assets/images/users/{{ $membreUser->Matricule }}.jpg" alt="Person"  class="img-fluid border">
                                                </a>
                                            </li>
                                        @endforeach
                                        @if ($membre->membreUsers->count() > 5)
                                            <li @if($membre->membreUsers->take(5)->count() == 0) @endif>
                                                <div class="badge bg-success ms-3 lead">+ {{ $membre->membreUsers->count() - 5 }}</div>
                                            </li>
                                        @endif
                                    @endif
                                </ul>

                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{$membre->id}}">
                                        <i data-feather="maximize-2" class="feather-icon "></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$membre->id}}">
                                        <i data-feather="edit" class="feather-icon "></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$membre->id}}">
                                        <i data-feather="trash-2" class="feather-icon "></i>
                                    </button>   
                                    
    
                                    <div class="modal fade" id="viewModal{{$membre->id}}" tabindex="-1" aria-labelledby="viewModal{{$membre->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content modal-filled bg-dark">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Membres n°{{$membre->id}} - {{$membre->Nom}}</h4>
                                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x" class="feather-icon "></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Informations</h4>
                                                                    <ul class="list-style-none mt-4">
                                                                        <li>
                                                                            <span class="text-muted">Nom</span>
                                                                            <span class="text-dark float-end font-weight-medium">{{ $membre->Nom }}</span>
                                                                        </li>
                                                                        <li class="mt-2">
                                                                            <span class="text-muted">Nom</span>
                                                                            <span class="text-dark float-end font-weight-medium text-uppercase">{{ $membre->Description }}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    


                                </td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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