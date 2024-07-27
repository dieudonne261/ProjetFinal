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
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 text-center">
                        <div
                            style="background-image: url(../assets/images/profil-back{{$personne->Sex}}.jpg);background-size: cover;border-radius: 10px;margin-bottom:90px">
                            <img src="../assets/images/users/{{ $matricule }}.jpg" alt="user"
                                 class="rounded-circle mt-5 " width="300px"
                                 style="border: 0px solid white; margin-bottom:-100px;">
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
                                        <span
                                            class="text-dark float-end font-weight-medium">{{ $personne->Matricule }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Nom</span>
                                        <span
                                            class="text-dark float-end font-weight-medium text-uppercase">{{ $personne->Nom }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <span class="text-muted">Prénom</span>
                                        <span
                                            class="text-dark float-end font-weight-medium">{{ $personne->Prenom }}</span>
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
                                    <canvas id="suivi-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suivie</h4>
                                <div style="height:295px;max-height: 295px; overflow-y: auto;" class="m-0">

                                    <div class="table-responsive">
                                        <table id="suivi_lists"
                                               class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                            <tr>
                                                <th class="">Matricule</th>
                                                <th class="">Types</th>
                                                <th class="">Voir</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($suivisLists as $suivi)
                                                <tr>
                                                    <td class="fs-5">{{$suivi->MatriculeCible}}</td>
                                                    <td class="fs-5">{{ strlen($suivi->Types) > 10 ? substr($suivi->Types, 0, 5) . '...' : $suivi->Types }}</td>
                                                    <td class="fs-5">
                                                        <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#viewModal{{$suivi->id}}">
                                                            <i class="fas fa-angle-double-right"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="viewModal{{$suivi->id}}" tabindex="-1"
                                                     aria-labelledby="viewModal{{$suivi->id}}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content modal-filled bg-dark">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suivi n°{{$suivi->id}}</h4>
                                                                <button type="button" class="btn btn-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                        data-feather="x" class="feather-icon "></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body d-flex gap-1">

                                                                <div
                                                                    class="profile-pic m-4 pe-4 text-center border-end">
                                                                    <img
                                                                        src="../assets/images/users/{{ $suivi->MatriculeCible }}.jpg"
                                                                        alt="user" class="rounded-circle img-fluid"
                                                                        width="170px">
                                                                    <h5 class="mt-2 mb-0">
                                                                        <a href="matricule/{{$suivi->MatriculeCible}}">{{$suivi->MatriculeCible}}</a>
                                                                    </h5>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <p>Types : {{$suivi->Types}}</p>
                                                                    <p>Description : {{$suivi->Description}}</p>
                                                                    <p>Date du suivi : {{$suivi->DateSuivi}}</p>
                                                                    <p>Creé par : <a
                                                                            href="../matricule/{{$suivi->MatriculeAdd}}">{{$suivi->MatriculeAdd}}</a>
                                                                    </p>
                                                                    <p>Date de creation : {{$suivi->created_at}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            </tbody>
                                        </table>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suivie</h4>
                                <div>
                                    <canvas id="suivi-chart-2"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Roles</h4>
                                <div id="charttestRole"></div>
                            </div>
                        </div>
                        <!--<pre>{{ json_encode($chartDataRole, JSON_PRETTY_PRINT) }}</pre>-->
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Membres</h4>
                                <div id="charttest3"></div>
                            </div>
                        </div>
                        <!--<pre>{{ json_encode($chartData3, JSON_PRETTY_PRINT) }}</pre>-->
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Work Education</h4>
                                <div class="row">
                                    @foreach($workedList as $worked)
                                        <div class="col-lg-6 col-md-12">
                                            <div class="m-1 p-3 border d-flex">

                                                <div class="border-end pe-3">
                                                    <input data-plugin="knob" data-width="150" data-height="150"
                                                           data-angleOffset="90"
                                                           data-linecap="round" data-fgColor="#6edef4"
                                                           value="{{ $worked['Note'] }}" data-readOnly=true/>
                                                </div>
                                                <div class="ps-3 align-content-center">
                                                    <h4 class="text-center pt-1">{{ $worked['Nom'] }}</h4>
                                                    <h4 class="text-center pt-1">{{ $worked['IdSemestre'] }}</h4>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <button>

            </button>
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


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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


        document.addEventListener('DOMContentLoaded', function () {
            const chartData = @json($chartData);

            //console.log(chartData); // Afficher les données dans la console pour débogage

            new Chart(document.getElementById("suivi-chart-2"), {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [
                        {
                            label: 'Suivi Cible',
                            data: chartData.datasets.cible,
                            backgroundColor: 'rgb(54, 162, 235)'
                        },
                        {
                            label: 'Suivi Créée',
                            data: chartData.datasets.add,
                            backgroundColor: 'rgb(142, 55, 255)'
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

        })
        ;

        /*
            document.addEventListener('livewire:load', function () {
                    var options3 = {
                        series: {!! json_encode($chartData3) !!}, // Encode $chartData3 to JSON
                chart: {
                    height: 450,
                    type: 'rangeBar'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '80%'
                    }
                },
                xaxis: {
                    type: 'datetime'
                },
                stroke: {
                    width: 1
                },
                fill: {
                    type: 'solid',
                    opacity: 0.6
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left'
                }
            };

            var chart3 = new ApexCharts(document.querySelector("#charttest"), options3);
            chart3.render();
    });

    */

        var options = {
            series: [
                {
                    name: 'President',
                    data: [
                        {
                            x: 'Test',
                            y: [
                                1719792000000,
                                1721347200000
                            ]
                        },
                        {
                            x: 'Membre 2',
                            y: [
                                new Date('2019-03-02').getTime(),
                                new Date('2019-03-05').getTime()
                            ]
                        },
                        {
                            x: 'Membre 2',
                            y: [
                                new Date('2019-03-05').getTime(),
                                new Date('2019-03-07').getTime()
                            ]
                        },
                        {
                            x: 'Membre 1',
                            y: [
                                new Date('2019-03-01').getTime(),
                                new Date('2019-03-03').getTime()
                            ],
                        }
                    ]
                },
                {
                    name: 'Role 2',
                    data: [
                        {
                            x: 'Membre 1',
                            y: [
                                new Date('2019-03-02').getTime(),
                                new Date('2019-03-05').getTime()
                            ]
                        },

                        {
                            x: 'Membre 2',
                            y: [
                                new Date('2019-03-03').getTime(),
                                new Date('2019-03-07').getTime()
                            ]
                        },
                        {
                            x: 'Membre 1',
                            y: [
                                new Date('2019-03-10').getTime(),
                                new Date('2019-03-16').getTime()
                            ]
                        }
                    ]
                },
                {
                    name: 'Role 3',
                    data: [
                        {
                            x: 'Membre 2',
                            y: [
                                new Date('2019-03-10').getTime(),
                                1721347200000
                            ]
                        },
                    ]
                }
            ],
            chart: {
                height: 450,
                type: 'rangeBar'
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '80%'
                }
            },
            xaxis: {
                type: 'datetime'
            },
            stroke: {
                width: 1
            },
            fill: {
                type: 'solid',
                opacity: 0.6
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            }
        };

        var chart = new ApexCharts(document.querySelector("#charttest"), options);
        chart.render();


        var chartData3 = {!! json_encode($chartData3) !!}; // Encode $chartData3 to JSON

        var seriesData3 = [];
        chartData3.forEach(function (series) {
            var data = [];
            series.data.forEach(function (item) {
                data.push({
                    x: item.x,
                    y: item.y
                });
            });
            seriesData3.push({
                name: series.name,
                data: data
            });
        });

        var options3 = {
            series: seriesData3,
            chart: {
                height: 450,
                type: 'rangeBar'
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '80%'
                }
            },
            xaxis: {
                type: 'datetime'
            },
            stroke: {
                width: 1
            },
            fill: {
                type: 'solid',
                opacity: 0.6
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            }
        };

        var chart3 = new ApexCharts(document.querySelector("#charttest3"), options3);
        chart3.render(); // Encode $chartDataRole to JSON

        var chartDataRole = {!! json_encode($chartDataRole) !!}; // Encode $chartDataRole to JSON

        var optionsRole = {
            series: [{
                data: chartDataRole
            }],
            chart: {
                height: 350,
                type: 'rangeBar'
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    distributed: true,
                    dataLabels: {
                        hideOverflowingLabels: false
                    }
                }
            },
            chart: {
                height: 450,
                type: 'rangeBar'
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '80%'
                }
            },
            xaxis: {
                type: 'datetime'
            },
            stroke: {
                width: 1
            },
            fill: {
                type: 'solid',
                opacity: 0.6
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            }
        };

        var chartRole = new ApexCharts(document.querySelector("#charttestRole"), optionsRole);
        chartRole.render();


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
    <script src="../assets/extra-libs/knob/jquery.knob.min.js"></script>
    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });
    </script>

</div>
