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
                <h3 class="card-title">Abut us actuelle.</h3>
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-primary" wire:click='ajouter'>Ajouter</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Libele about US</th>
                    <th>Manipulation</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $this->aboutList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($item->security); ?></td>
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
                      <h3 class="card-title">Modifier About US.</h3>
                      <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form wire:submit.prevent='ModifierAbout()'>
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Security</label>
                              <textarea class="form-control" wire:model.lazy='security' rows="6"
                                  placeholder="Entrer le contenu de security" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Guarantee</label>
                              <textarea class="form-control" wire:model.lazy='guarantee' rows="6"
                                  placeholder="Entrer le contenu de guarantee" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">One-off income</label>
                              <textarea class="form-control" wire:model.lazy='income' rows="6"
                                  placeholder="Entrer le contenu de income" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">How we work</label>
                              <textarea class="form-control" wire:model.lazy='howework' rows="6"
                                  placeholder="Entrer le contenu de how we work" required></textarea>
                          </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-center">
                          <button type="submit" class="btn btn-primary" wire:target='ModifierAbout'
                              wire:loading.remove>Modifier</button>
                          <button class="btn btn-success disabled mb-5 mt-2" wire:target='ModifierAbout'
                              wire:loading> Patientez svp ... </button>
                      </div>
                  </form>
              </div>
                <?php endif; ?>




                    <?php if($ajouterAbout): ?>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter About US.</h3>
                        <div class="card-footer text-right">
                          <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form wire:submit.prevent='AjouterAbout()'>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Security</label>
                              <textarea class="form-control" wire:model.lazy='security' rows="6"
                                  placeholder="Entrer le contenu de security" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword2">Guarantee</label>
                              <textarea class="form-control" wire:model.lazy='guarantee' rows="6"
                                  placeholder="Entrer le contenu de guarantee" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword3">One-off income</label>
                              <textarea class="form-control" wire:model.lazy='income' rows="6"
                                  placeholder="Entrer le contenu de income" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword4">How we work</label>
                              <textarea class="form-control" wire:model.lazy='howework' rows="6"
                                  placeholder="Entrer le contenu de how we work" required></textarea>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterAbout'
                                wire:loading.remove>Enregistrer</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterAbout'
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
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/about.blade.php ENDPATH**/ ?>