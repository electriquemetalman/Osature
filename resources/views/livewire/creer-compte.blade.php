<div>
    
    
    <div>
        {{-- In work, do what you enjoy. --}}
    
        <!-- container -->
    <div class="container mt-5 mb-3">
        <!-- row -->
        <div class="row">
    
            <div class="col-md-7" style="float: left">
                <br>
                <br>
                <br>
                
                <div class="billing-details  my-auto">
                    <img src="image/connexion.jpg" alt="" width="100%">
                </div>
    
                <!-- /Billing Details -->
            </div>
            <!-- Order Details -->
            <div class="col-md-5 mt-3 product" style="float: right"><!-- Shiping Details -->
                <br>
    
                <div class="shiping-details">
                    <div class="section-title  text-center">
                        <h3 class="title text-primary">Creer votre compte ici</h3>
                    </div>
                    <div class="input-checkbox">
                        <form  wire:submit.prevent='create'>
                            <div class="">
    
                                <span>Nom</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="nom" value="{{ $nom }}" placeholder="votre nom" autocomplete required>
                              </div>

                              <span>Prenom</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="prenom" value="{{ $prenom }}" placeholder="votre prenom" required>
                              </div>

                              <span>Nom d'utilisateur</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="nomuser" value="{{ $nomuser }}" placeholder="votre Nom d'utilisateur" required>
                              </div>

                                <span>Email</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="email" wire:model.lazy="email" value="{{ $email }}" placeholder="ex: Osature@Admin.com" required>
                              </div>
                              @if (session()->has('error_mail'))
                              <div class="alert alert-danger">
                                  <span class="text-danger">{{ session('error_mail') }}</span>
                              </div>
                              @endif
                              <span>Mot de Passe</span>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input  class="form-control" type="password" value="{{ $mdp }}" wire:model.lazy="mdp" placeholder="*******" minlength="6" required>
                              </div>

                              <span>Confirmer le mot de Passe</span>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input  class="form-control" type="password" value="{{ $mdpc }}" wire:model.lazy="mdpc" placeholder="*******" minlength="6" required>
                              </div>
                              @if (session()->has('error_mdp'))
                              <div class="alert alert-danger">
                                  <span class="text-danger">{{ session('error_mdp') }}</span>
                              </div>
                              @endif
                              <span>Pays</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="pays" value="{{ $pays }}" placeholder="Votre pays" required>
                              </div>
    
                              <div class="text-right text-teal">
                                <span >Vous avez un compte? </span> <a href="{{ route('connexion') }}">Cliquez ici</a> 
                             </div>
    
                                <br>
                                @if (session()->has('error'))
                                <div class="alert alert-danger text-center">
                                    <span class="text-danger">{{ session('error') }}</span>
                                </div>
                                @endif
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary" wire:target='create' wire:loading.remove>Creer</button>
                                    <input type="button" class="btn btn-primary" value="Patientez..." wire:target='create' wire:loading >
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
    
    
    </div>
    


</div>
