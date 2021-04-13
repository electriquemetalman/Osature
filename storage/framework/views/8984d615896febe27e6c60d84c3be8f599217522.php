<div>
    
    
    <div>
        
    
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
                                  
                                  <input class="form-control" type="text" wire:model.lazy="nom" value="<?php echo e($nom); ?>" placeholder="votre nom" autocomplete required>

                              </div>

                              <span>Prenom</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="prenom" value="<?php echo e($prenom); ?>" placeholder="votre prenom" required>
                              </div>

                              <span>Nom d'utilisateur</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="nomuser" value="<?php echo e($nomuser); ?>" placeholder="votre Nom d'utilisateur" required>
                              </div>

                                <span>Email</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="email" wire:model.lazy="email" value="<?php echo e($email); ?>" placeholder="ex: Osature@Admin.com" required>
                              </div>
                              <?php if(session()->has('error_mail')): ?>
                              <div class="alert alert-danger">
                                  <span class="text-danger"><?php echo e(session('error_mail')); ?></span>
                              </div>
                              <?php endif; ?>
                              <span>Mot de Passe</span>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input  class="form-control" type="password" value="<?php echo e($mdp); ?>" wire:model.lazy="mdp" placeholder="*******" minlength="6" required>
                              </div>

                              <span>Confirmer le mot de Passe</span>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input  class="form-control" type="password" value="<?php echo e($mdpc); ?>" wire:model.lazy="mdpc" placeholder="*******" minlength="6" required>
                              </div>
                              <?php if(session()->has('error_mdp')): ?>
                              <div class="alert alert-danger">
                                  <span class="text-danger"><?php echo e(session('error_mdp')); ?></span>
                              </div>
                              <?php endif; ?>
                              <span>Pays</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="text" wire:model.lazy="pays" value="<?php echo e($pays); ?>" placeholder="Votre pays" required>
                              </div>

    
                              <div class="text-right text-teal">
                                <span >Vous avez un compte? </span> <a href="<?php echo e(route('connexion')); ?>">Cliquez ici</a> 
                             </div>
    
                                <br>
                                <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger text-center">
                                    <span class="text-danger"><?php echo e(session('error')); ?></span>
                                </div>
                                <?php endif; ?>
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
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/creer-compte.blade.php ENDPATH**/ ?>