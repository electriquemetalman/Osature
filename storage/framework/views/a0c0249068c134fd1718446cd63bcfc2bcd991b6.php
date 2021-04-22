<div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
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

                <?php if($liste): ?>
                    <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Frequently Asked Questions.</h3>
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-primary" wire:click='ajouter'>Ajouter</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Question</th>
                    <th>Manipulation</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $this->faqList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($item->libelle); ?></td>
                      <td>
                        <a href="#" data-toggle="modal" wire:click="voir(<?php echo e($item->id); ?>)"><code class="badge badge-success" >Voir / Modifier</code></a>
                        <a href="#" data-toggle="modal" wire:click="supprimer(<?php echo e($item->id); ?>)"><code class="badge badge-danger" >Supprimer</code></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                <?php endif; ?>





                <?php if($modifier): ?>
                <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Modifier un Frequently Asked Questions.</h3>
                      <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form wire:submit.prevent='ModifierFaq()'>
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Libellé</label>
                              <input type="text" class="form-control" wire:model.lazy='libelle'
                                  placeholder="Entrer le libellé" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Réponse</label>
                              <textarea class="form-control" wire:model.lazy='reponse' rows="6"
                                  placeholder="Entrer les éléments de reponse" required></textarea>
                          </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-center">
                          <button type="submit" class="btn btn-primary" wire:target='ModifierFaq'
                              wire:loading.remove>Modifier</button>
                          <button class="btn btn-success disabled mb-5 mt-2" wire:target='ModifierFaq'
                              wire:loading> Patientez svp ... </button>
                      </div>
                  </form>
              </div>
                <?php endif; ?>




                    <?php if($ajouterFaq): ?>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter un Frequently Asked Questions.</h3>
                        <div class="card-footer text-right">
                          <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form wire:submit.prevent='AjouterFaq()'>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Libellé</label>
                                <input type="text" class="form-control" wire:model.lazy='libelle'
                                    placeholder="Entrer le libellé" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Réponse</label>
                                <textarea class="form-control" wire:model.lazy='reponse' rows="6"
                                    placeholder="Entrer les éléments de reponse" required></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterFaq'
                                wire:loading.remove>Enregistrer</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterFaq'
                                wire:loading> Patientez svp ... </button>
                        </div>
                    </form>
                </div>
                    <?php endif; ?>



                </div>
            </div>
        </div>
    </section>


</div>
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/faq.blade.php ENDPATH**/ ?>