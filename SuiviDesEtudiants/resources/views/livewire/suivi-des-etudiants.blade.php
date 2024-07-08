<style>
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
                        <a href="/">
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
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown" style="cursor: pointer;">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @livewire('profile-header')
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY rounded">
                                <a class="dropdown-item" href="/profil"><i data-feather="user"
                                        class="svg-icon me-2 ms-1"></i>
                                    Mon Profil</a>
                                <a class="dropdown-item" href="/profil"><i data-feather="settings"
                                        class="svg-icon me-2 ms-1"></i>
                                    Paremetre du compte</a>
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
                <div class="row">
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-start">
                            <button class="btn btn-rounded  btn-outline-primary px-4 py-2" 
                            type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#suiviadd"
                            >
                            <i class="fas fa-plus me-2"></i>
                                Ajouter un nouveau suivi
                            </button>



                                <!-- Center modal content -->
                                <div class="modal fade" id="suiviadd" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-dark">
                                                <h4 class="modal-title" id="myCenterModalLabel">Nouveau Suivi</h4>
                                                <button type="button" class="btn" data-bs-dismiss="modal"
                                                    aria-hidden="true">
                                                    <i data-feather="x" class="feather-icon bg-dark"></i>
                                                
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('suivi.store') }}" method="POST" class="row">
                                                    @csrf
                                                    <div class="col-6 form-group mb-3">
                                                        <label class="form-label">Matricule Cible</label>
                                                        <input type="text" name="matriculeCible" minlength="5" maxlength="5" class="form-control" placeholder="12345" required>
                                                    </div>
                                                    <div class="col-6 form-group mb-3">
                                                        <label class="form-label">Matricule Createur</label>
                                                        <input type="text" class="form-control" value="{{ $matriculeCreateur }}" readonly required>
                                                    </div>
                                                    <div class="col-6 form-group mb-3">
                                                        <label class="form-label">Types</label>
                                                        <input type="text" name="types" class="form-control" required>
                                                    </div>
                                                    <div class="col-6 form-group mb-3">
                                                        <label class="form-label">Date</label>
                                                        <input type="date" name="dateSuivi" class="form-control" required>
                                                    </div>
                                                    <div class="col-12 form-group mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" placeholder="Description du suivi ..."></textarea>
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
                    <div class="col-2 align-self-center">
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4">
                            
                                <p class="card-title display-6">Suivi Des Etudiants</p>
                                <h6 class="card-subtitle">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente hic nesciunt officia architecto, veniam maxime praesentium, molestiae quae aliquid nemo odio modi quam debitis obcaecati, velit quibusdam optio blanditiis consequuntur!
                                </h6>
                                <hr>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="">Id</th>
                                                <th class="">Matricule Cible</th>
                                                <th class="">Types</th>
                                                <th class="">Date du suivi</th>
                                                <th class="">Description</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($suivis as $suivi)
                                                <tr>
                                                    <td class="">{{$suivi->id}}</td>
                                                    <td class=" ">
                                                        <ul class="list-inline m-auto">
                                                            <li class="list-inline-item">
                                                                <img src="../assets/images/users/{{ $suivi->MatriculeCible }}.jpg" alt="user" class="rounded-circle img-fluid" width="40">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                {{ $suivi->MatriculeCible }}
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ strlen($suivi->Types) > 10 ? substr($suivi->Types, 0, 10) . '...' : $suivi->Types }}</td>
                                                    <td class="">{{ $suivi->DateSuivi }}</td>
                                                    <td>{{ strlen($suivi->Description) > 10 ? substr($suivi->Description, 0, 30) . '...' : $suivi->Description }}</td>
                                                    <td class="">

                                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{$suivi->id}}">
                                                        <i data-feather="maximize-2" class="feather-icon "></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$suivi->id}}">
                                                        <i data-feather="edit" class="feather-icon "></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$suivi->id}}">
                                                        <i data-feather="trash-2" class="feather-icon "></i>
                                                    </button>


                                                    </td>
                                                </tr>

                                                <!-- Modal pour afficher le suivi -->
                                                <div class="modal fade" id="viewModal{{$suivi->id}}" tabindex="-1" aria-labelledby="viewModal{{$suivi->id}}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content modal-filled bg-dark">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suivi n°{{$suivi->id}}</h4>
                                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x" class="feather-icon "></i></button>
                                                            </div>
                                                            <div class="modal-body d-flex gap-1">
                                                                    
                                                                <div class="profile-pic m-4 pe-4 text-center border-end">
                                                                    <img src="../assets/images/users/{{ $suivi->MatriculeCible }}.jpg" alt="user" class="rounded-circle img-fluid" width="170px">
                                                                    <h4 class="mt-3 mb-0">Daniel Kristeen</h4>
                                                                    <h5 class="mb-0 ">{{$suivi->MatriculeCible}}</h5>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <p>Types : {{$suivi->Types}}</p>
                                                                    <p>Description : {{$suivi->Description}}</p>
                                                                    <p>Date du suivi : {{$suivi->DateSuivi}}</p>
                                                                    <p>Creé par : {{$suivi->MatriculeAdd}}</p>
                                                                    <p>Date de creation : {{$suivi->created_at}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal pour éditer le suivi -->
                                                <div class="modal fade" id="editModal{{$suivi->id}}" tabindex="-1" aria-labelledby="editModal{{$suivi->id}}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content modal-filled  bg-primary">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suivi n°{{$suivi->id}}</h4>
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x" class="feather-icon "></i></button>
                                                            </div>
                                                            <div class="modal-body text-white">
                                                                <form action="{{ route('suivi.update', $suivi->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-6 form-group mb-3">
                                                                            <label class="form-label text-white">Matricule Cible</label>
                                                                            <input name="matriculeCible" type="text" id="matriculefiltre" minlength="5" maxlength="5" class="form-control bg-light" value="{{ $suivi->MatriculeCible }}" required>
                                                                        </div>
                                                                        <div class="col-6 form-group mb-3">
                                                                            <label class="form-label text-white">Matricule Modifieur</label>
                                                                            <input type="text" class="form-control bg-light" value="{{ $matriculeCreateur }}" readonly required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6 form-group mb-3">
                                                                            <label class="form-label text-white">Types</label>
                                                                            <input name="types" type="text" class="form-control bg-light" value="{{ $suivi->Types }}" required>
                                                                        </div>
                                                                        <div class="col-6 form-group mb-3">
                                                                            <label class="form-label text-white">Date</label>
                                                                            <input name="dateSuivi" type="date" value="{{ $suivi->DateSuivi }}" class="form-control bg-light" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label text-white">Description</label>
                                                                        <textarea name="description" class="form-control bg-light">{{ $suivi->Description }}</textarea>
                                                                    </div>
                                                                    <div class="col-4 m-auto">
                                                                        <button type="submit" class="btn btn-info px-4">Enregistrer</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal pour confirmer la suppression du suivi -->
                                                <div class="modal fade" id="deleteModal{{$suivi->id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content modal-filled bg-danger">
                                                            <div class="modal-body row text-center">
                                                                <p class="col-12">Êtes-vous sûr de vouloir supprimer ce suivi n°{{ $suivi->id }} ?</p>
                                                                <div class="col-6 m-auto d-flex gap-2">
                                                                <form action="{{ route('suivi.destroy', $suivi->id) }}" method="POST" class="d-inline">
                                                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Annuler</button>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
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

                
                <!-- end row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <footer class="footer text-muted">
                All Rights Reserved by Freedash. Designed and Developed by Dede.
            </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <footer class="footer text-muted">
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
    <script>
    new DataTable('#zero_config', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
    });
        /*
        $(document).ready(function() {
            $('#zero_config').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columns": [
                    { "name": "Id" },
                    { "name": "Matricule Cible" },
                    { "name": "Types" }
                ]
            });
        });
        */
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
    
    

</div>