<div id="demo" class="about col-md-10 mx-auto">

    <?php if(session()->has('message')): ?>
    <div class="alert alert-info text-center alert-dismissible">
        <?php echo e(session('message')); ?>

    </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    <div class="alert alert-danger text-center upper alert-dismissible">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <?php if($adresse==null): ?>
    <form action="<?php echo e(route('save_contact_admin_path')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <h3 class="text-center">Mettre à jour les adresses</h3>
        </div>
            <span>Localisation</span>

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="localisation" placeholder="Localisation" required>
        </div>

            <span>Adresse(s) Emails</span>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="email"  placeholder="Adresse(s) Emails" required>
        </div>

        <span>Numéro de téléphone</span>
        <div class="input-group mb-3">

            <input type="text" class="form-control" name="telephone"  placeholder="Numéro de téléphone" required>
        </div>

        <span>Code de l'adresse de localisation google map (<a href="https://www.e-monsite.com/pages/tutoriels/services-externes/afficher-une-carte-de-localisation-geographique-sur-votre-site.html"> En savoir plus </a>)</span>
        <div class="input-group mb-3">
            <textarea name="adresse"  rows="6"  class="form-control"  placeholder=" Adresse google map "
                 ></textarea>
        </div>

        <input type="submit" class="btn btn-success  form-control mb-5" value='Valider'/>
    </form>
    <?php else: ?>
    <form action="<?php echo e(route('save_contact_admin_path')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <h3 class="text-center">Mettre à jour les adresses</h3>
        </div>
            <span>Localisation</span>

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="localisation" value=" <?php if($adresse): ?> <?php echo e($adresse->localisation); ?> <?php endif; ?> " placeholder="Localisation" required>
        </div>

            <span>Adresse(s) Emails</span>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" value=" <?php if($adresse): ?> <?php echo e($adresse->email); ?> <?php endif; ?>" placeholder="Adresse(s) Emails" required>
        </div>

        <span>Numéro de téléphone</span>
        <div class="input-group mb-3">

            <input type="text" class="form-control" name="telephone" value=" <?php if($adresse): ?> <?php echo e($adresse->telephone); ?> <?php endif; ?>" placeholder="Numéro de téléphone" required>
        </div>

        <span>Code de l'adresse de localisation google map (<a href="https://www.e-monsite.com/pages/tutoriels/services-externes/afficher-une-carte-de-localisation-geographique-sur-votre-site.html"> En savoir plus </a>)</span>
        <div class="input-group mb-3">
            <textarea name="adresse"  rows="6"  class="form-control" value="<?php echo e($adresse->adresse); ?>" placeholder=" <?php if($adresse): ?> <?php echo e($adresse->adresse); ?> <?php else: ?> Adresse google map <?php endif; ?> "
                 ></textarea>
        </div>

        <input type="submit" class="btn btn-success  form-control mb-5" value='Valider'/>
    </form>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyContact.blade.php ENDPATH**/ ?>