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
            <div class="col-md-5 mt-3 product" style="float: right">
                <!-- Shiping Details -->
                <br>

                <div class="shiping-details">
                    <div class="section-title  text-center">
                        <h3 class="title text-primary">Nouveau mot de passe</h3>
                    </div>
                    <div class="input-checkbox">
                        <form wire:submit.prevent='sendMail'>
                            <div class="">

                                <span>email</span>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input class="form-control" type="email" wire:model.lazy="email" value="entrer votre adresse mail" placeholder="ex: Osature@Admin.com" required>
                                </div>

                                <span>Password</span>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input class="form-control" type="password" wire:model.lazy="password" value="entrer le nouveau mot de passe" placeholder="ex: Osature@Admin.com" required>
                                </div>

                                <span>confirm password</span>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input class="form-control" type="text" wire:model.lazy="confPassword" value="Confirmer le mot de passe" placeholder="ex: Osature@Admin.com" required>
                                </div>

                                <br>
                                @if (session()->has('error'))
                                <div class="alert alert-danger text-center">
                                    <span class="text-danger">{{ session('error') }}</span>
                                </div>
                                @endif
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary" wire:target='sendMail' wire:loading.remove>Envoyer</button>
                                    <input type="button" class="btn btn-primary" value="Patientez..." wire:target='sendMail' wire:loading >
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