<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('img/login-back.jpg') }}') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card border-light p-4" style="border-radius: 20px;">

            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    <h1>Gestion des notes</h1>
                    <hr>
                    <div class="form-group row ">
                        <label for="email" class="col-form-label text-md-left h1">Email</label>

                        <div class="">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row pb-2">
                        <label for="password" class=" col-form-label text-md-left h1">Mot de passe</label>

                        <div class="">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary w-50">Suivant</button>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
