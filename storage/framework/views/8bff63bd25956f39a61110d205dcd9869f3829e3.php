<div>
    

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
                    <h3 class="card-title">Liste des comptes.</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Pays</th>
                        <th>Date de création</th>
                        <th>Manipulations</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $this->accountList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($item->nom); ?></td>
                          <td><?php echo e($item->prenom); ?></td>
                          <td><?php echo e($item->email); ?></td>
                          <td><?php echo e($item->pays); ?></td>
                          <td><?php echo e($item->created_at); ?></td>
                          <td wire:loading.remove>
                            <?php if($item->statut): ?>
                            <a href="#" data-toggle="modal" wire:click="desactiver(<?php echo e($item->id); ?>)"><code class="badge badge-info" >Desactiver </code></a>
                              
                             <?php else: ?>
                             <a href="#" data-toggle="modal" wire:click="activer(<?php echo e($item->id); ?>)"><code class="badge badge-success" >Activer </code></a>
                               
                            <?php endif; ?>
                            
                            <a href="#" data-toggle="modal" wire:click="supprimer(<?php echo e($item->id); ?>)"><code class="badge badge-danger" >Supprimer</code></a>
                          </td>
                          <td wire:loading>
                                <a href="#" data-toggle="modal" class="disabled"><code class="badge badge-info" >Patientier... </code></a>
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
    
    
                    </div>
                </div>
            </div>
        </section>
    
    
    </div>
    

    
</div>
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/compte.blade.php ENDPATH**/ ?>