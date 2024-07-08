<div>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
        @if (!session()->has('error'))
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
        @endif
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(../img/4877010.jpg) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
            <div class="auth-box row rounded-4 shadow" style="background-color:#ffffff8f">
                
                <div class="col-lg-5 col-md-7 rounded-4 ps-3">
                    <div class="p-3">
                        <div class="text-center mt-3">
                            <img src="../img/UAZ Official.png" width="150px" alt="wrapkit">
                        </div>
                        <h2 class="mt-2 text-center">Bienvenue</h2>
                        <form wire:submit.prevent="login" class="mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" wire:model="email" placeholder="Votre Adresse Email">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Mot de passe</label>
                                        <input class="form-control" id="pwd" type="password" wire:model="password" placeholder="Votre Mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-primary">Se Connecter</button>
                                </div>
                                

                                @if (session()->has('error'))
                                <div class="col-lg-12 text-danger text-center mt-5">
                                    Email ou Mot de passe incorrect
                                </div>
                                @else
                                <div class="col-lg-12 text-center mt-5">
                                    Contactez l'administrateur
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 col-md-5 modal-bg-img rounded-4 shadow" style="background-image: url(../img/back.jpg);">
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</div>