<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


            <!-- container -->
<div class="container mt-5 mb-3">
    <!-- row -->
    <div class="row">

        <div class="col-md-7" style="float: left">
            <br>
            <!-- Billing Details -->
            

            <!-- /Billing Details -->
        </div>
        <!-- Order Details -->
        <div class="col-md-5 mt-3 product" style="float: right"><!-- Shiping Details -->
            <br>
            <br>
            

            <div class="shiping-details">
                <div class="section-title  text-center">
                    <h3 class="title text-primary">Entrer votre adresse email ici</h3>
                </div>
                <div class="input-checkbox">
                    <form  wire:submit.prevent='change'>
                        <div class="">

                            <span>email</span>
                            <br>
                            <div class="input-group mb-2 mr-sm-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-phone"></i></div>
                              </div>
                              <input class="form-control" type="email" wire:model.lazy="email" value="{{ $email }}" placeholder="ex: Osature@Admin.com" disabled>
                          </div>

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

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" wire:target='change' wire:loading.remove>Confirmer</button>
                                <input type="button" class="btn btn-primary" value="Patientez..." wire:target='change' wire:loading >
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /Shiping Details -->
            <br>
            <br>
            <br>
            <br>
            
            

        </div>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->


</div>