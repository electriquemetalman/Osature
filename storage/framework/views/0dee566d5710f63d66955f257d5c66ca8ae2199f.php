<div>
    

    <!-- container -->
<div class="container mt-5 mb-3">
    <!-- row -->
    <div class="row">

        <div class="col-md-7" style="float: left">
            <br>
            <!-- Billing Details -->
            <?php if(session()->has('error')): ?>
            <div class="billing-details ">
                <img src="image/error-connect.jpg" alt="" width="70%">
            </div>
            <?php else: ?>
            <div class="billing-details ">
                <img src="image/connexion.jpg" alt="" width="100%">

            </div>
            <?php endif; ?>

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
                              <input class="form-control" type="email" wire:model.lazy="email" value="<?php echo e($email); ?>" placeholder="ex: Osature@Admin.com" required>
                            </div>

                          <span>Mot de Passe</span>
                          <div class="input-group mb-2 mr-sm-2">
                            <input  class="form-control" type="password" value="<?php echo e($mdp); ?>" wire:model.lazy="mdp" placeholder="*******" minlength="6" required>
                          </div>

                          <div class="text-right text-teal">
                            <span >Vous n'avez pas de compte? </span> <a href="<?php echo e(route('addCompte')); ?>">Cliquez ici</a><br/><br/>
                            <a href="<?php echo e(route('passOublier')); ?>">mot de passe oublié</a>
                         </div>

                            <br>
                            <?php if(session()->has('error')): ?>
                            <div class="alert alert-danger text-center">
                                <span class="text-danger"><?php echo e(session('error')); ?></span>
                            </div>
                            <?php endif; ?>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" wire:target='connexion' wire:loading.remove>Connexion</button>
                                <input type="button" class="btn btn-primary" value="Patientez..." wire:target='connexion' wire:loading >
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /Shiping Details -->
            
            <?php if($fail_count==3): ?>
            <div>
            <a href="<?php echo e(route('recoverpw')); ?>">
                    Cliquez ici pour recuperer votre mot de passe
                </a>
            </div>
            <?php endif; ?>
            
            

        </div>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->


</div>
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/connexion.blade.php ENDPATH**/ ?>