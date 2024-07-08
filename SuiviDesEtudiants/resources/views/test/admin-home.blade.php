<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/other.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <style>
        /* Style pour masquer le menu latéral */
        #sidemenu.hidden {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand fixed-top bg-tertiary bg-body-tertiary m-2 border rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Suivies des etudiants</a>
            <ul class="navbar-nav justify-content-lg-center text-dark lead">
                admin@gmail.com
            </ul>
            <form class="d-flex">
                <button class="btn btn-primary" type="submit">Deconnexion</button>
            </form>
            <!-- Bouton pour basculer le menu latéral -->
            <button class="btn btn-secondary ms-2" id="toggleMenuButton" type="button">Toggle Menu</button>
        </div>
    </nav>
    <main class="d-flex flex-nowrap ms-1">
        <div id="sidemenu" class="d-flex flex-column align-items-stretch flex-shrink-0 m-2" style="width: 300px;">
            <div class="text-center flex-shrink-0 bg-body-tertiary rounded p-2 mb-2 border">
                <span class="fs-5">Mini Calendrier</span>
            </div>
            
            <div class="list-group list-group-flush border-bottom scrollarea p-1 rounded border">
                <div>
                    <div class="elegant-calencar">
                    <p id="reset" class="btn btn-dark w-100">Aujourd'hui</p>
                        <div id="header" class="clearfix bg-dark rounded pb-3">
                            <button class="pre-button bg-dark lead"><</button>
                            <div class="head-info">
                                <div class="head-day display-3"></div>
                                <div class="head-month lead"></div>
                            </div>
                            <button class="next-button bg-dark lead">></button>
                        </div>
                        <table id="calendar" class="mt-2">
                            <thead class="fs-6">
                                <tr>
                                    <th>Dim</th>
                                    <th>Lun</th>
                                    <th>Mar</th>
                                    <th>Mer</th>
                                    <th>Jeu</th>
                                    <th>Ven</th>
                                    <th>San</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex gap-2 flex-shrink-0 align-item-end bg-dark rounded p-2 border">
                        <form>
                            <input class="form-control" type="hidden" name="" id="inputdate">
                        </form>
                    </div>
                    <script src="{{ asset('js/calendar.js') }}"></script>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column align-items-stretch flex-shrink-0 m-2 w-75">
            <div class="text-center flex-shrink-0 bg-body-tertiary rounded p-2 mb-1 border position-relative">
                <span class="fs-5">Liste des Activité et Suivies</span>
                <div class="position-absolute top-0 end-0 p-2">
                    <input type="text" class="form-control form-control-sm" placeholder="Rechercher...">
                </div>
            </div>

            <div class="text-light text-center flex-shrink-0 rounded px-3 py-2 row align-items-center gap-5">
                <div class="col text-center rounded lead fs-5 p-1 bg-dark">
                    ID
                </div>
                <div class="col text-center rounded lead fs-5 p-1 bg-dark">
                    Date
                </div>
                <div class="col text-center rounded lead fs-5 p-1 bg-dark">
                    Activité
                </div>
            </div>

            <div class="list-group list-group-flush bg-dark scrollarea p-1 rounded mb-2">
                <form action="" class="rounded">
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                    <a class="list-group-item list-group-item-action text-dark bg-dark border-dark py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Matricule</strong>
                        </div>
                        <div class="col-10 mb-1 small">Nom du cours</div>
                    </a>
                </form>
            </div>
            <div class="d-flex gap-2 flex-shrink-0 align-item-end bg-body-tertiary rounded p-2">
                <form class="d-flex">
                    <button class="btn btn-primary" type="submit">Nouveau</button>
                </form>
                <form class="d-flex">
                    <button class="btn btn-primary" type="submit">Nouveau</button>
                </form>
            </div>
        </div>
    </main>
    
    <script>
        document.getElementById('toggleMenuButton').addEventListener('click', function() {
            document.getElementById('sidemenu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
