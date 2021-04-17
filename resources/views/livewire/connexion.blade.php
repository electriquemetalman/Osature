<div>
    {{-- In work, do what you enjoy. --}}

    <!-- container -->
<div class="container mt-5 mb-3">
    <!-- row -->
    <div class="row">

        <div class="col-md-7" style="float: left">
            <br>
            <!-- Billing Details -->
            @if (session()->has('error'))
            <div class="billing-details ">
                <img src="image/error-connect.jpg" alt="" width="70%">
            </div>
            @else
            <div class="billing-details ">
                <img src="image/connexion.jpg" alt="" width="100%">

            </div>
            @endif

            <!-- /Billing Details -->
        </div>
        <!-- Order Details -->
        <div class="col-md-5 mt-3 product" style="float: right"><!-- Shiping Details -->
            <br>

            <div class="shiping-details">
                <div class="section-title  text-center">
                    <h3 class="title text-primary">Se Connecter ici</h3>
                </div>
                <div class="input-checkbox">
                    <form  wire:submit.prevent='connexion'>
                        <div class="">

                            <span>email</span>
                            <div class="input-group mb-2 mr-sm-2">
                              <input class="form-control" type="email" wire:model.lazy="email" value="{{ $email }}" placeholder="ex: Osature@Admin.com" required>
                            </div>

                          <span>Mot de Passe</span>
                          <div class="input-group mb-2 mr-sm-2">
                            <input  class="form-control" type="password" value="{{ $mdp }}" wire:model.lazy="mdp" placeholder="*******" minlength="6" required>
                          </div>

                          <div class="text-right text-teal">
                            <span >Vous n'avez pas de compte? </span> <a href="{{ route('addCompte') }}">Cliquez ici</a><br/><br/>
                            <a href="{{ route('passOublier') }}">mot de passe oublié</a>
                         </div>

                            <br>
                            @if (session()->has('error'))
                            <div class="alert alert-danger text-center">
                                <span class="text-danger">{{ session('error') }}</span>
                            </div>
                            @endif
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" wire:target='connexion' wire:loading.remove>Connexion</button>
                                <input type="button" class="btn btn-primary" value="Patientez..." wire:target='connexion' wire:loading >
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /Shiping Details -->


        </div>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->


</div>
