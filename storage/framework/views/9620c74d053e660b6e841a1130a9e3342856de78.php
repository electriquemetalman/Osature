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
                <h3 class="card-title">Liste des Investissement.</h3>
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-primary" wire:click='ajouter'>Ajouter</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Type</th>
                    <th>Libelle</th>
                    <th>Investment</th>
                    <th>Daily profit</th>
                    <th>Contact lenght</th>
                    <th>Manipulation</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $this->InvestList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($item->type); ?></td>
                      <td><?php echo e($item->libelle); ?></td>
                      <td><?php echo e($item->investmin); ?>$ ---- <?php echo e($item->investmax); ?>$</td>
                      <?php if($item->type=='Trading Robots'): ?>
                      <td><?php echo e($item->profitjourmin); ?>% ---- <?php echo e($item->profitjourmax); ?>%</td>
                          
                      <?php else: ?>
                      <td><?php echo e($item->profitjourmin); ?>%</td>
                          
                      <?php endif; ?>
                      <td><?php echo e($item->dureecontrat); ?></td>
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
                      <h3 class="card-title">Modifier un Investissement.</h3>
                      <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form wire:submit.prevent='ModifierFaq()'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <select class="form-control" wire:model.lazy='type' required>
                                <option value=""></option>
                                <option value="Trading Robots">Trading Robots</option>
                                <option value="Crypto currency">Crypto currency</option>
                            </select>
                        </div>

                        <?php if($type=='Trading Robots'): ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Libellé</label>
                            <input type="text" class="form-control" wire:model.lazy='libelle'
                                placeholder="Entrer le libellé" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Licence</label>
                            <input type="number" class="form-control" wire:model.lazy='licence'
                                placeholder="Licence" min="1" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Investment</label>
                            <div class="row">
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="<?php echo e($inv2-1); ?>" placeholder="Minimum" step="0.01" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv2'  min="<?php echo e($inv1+1); ?>" placeholder="Maximum" step="0.01" required>
                                </div>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Daily profit</label>
                            <div class="row">
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='dayProf1' min="1" step="0.1"  max="<?php echo e($dayProf2-1); ?>" placeholder="Minimum" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='dayProf2' step="0.1"  min="<?php echo e($dayProf1+1); ?>" placeholder="Maximum" required>
                                </div>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Monthly profit</label>
                            <input type="number" class="form-control" wire:model.lazy='profMonth'
                                placeholder="Monthly profit" min="1" step="0.1" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact lenght</label>
                            <input type="number" class="form-control" wire:model.lazy='contractLengh'
                                placeholder="Contact lenght" min="1" required>
                        </div>


                        <?php endif; ?>

                        <?php if($type=='Crypto currency'): ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Libellé</label>
                            <input type="text" class="form-control" wire:model.lazy='libelle'
                                placeholder="Entrer le libellé" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Investment</label>
                            <div class="row">
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="<?php echo e($inv2-1); ?>" placeholder="Minimum" step="0.01" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv2'  min="<?php echo e($inv1+1); ?>" placeholder="Maximum" step="0.01" required>
                                </div>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Daily profit</label>
                                  <input type="number" class="form-control" wire:model.lazy='dayProf1' step="0.1"  min="1" placeholder="Daily profit" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact lenght</label>
                            <input type="number" class="form-control" wire:model.lazy='contractLengh'
                                placeholder="Contact lenght" min="1" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">All the profits</label>
                            <input type="number" class="form-control" wire:model.lazy='profit'
                                placeholder="All the profits" min="1" step="0.1" required>
                        </div>

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

                        <?php endif; ?>
                        


                    </div>
                      <!-- /.card-body -->

                      <?php if($type!=''): ?>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterInv'
                                wire:loading.remove>Enregistrer</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterInv'
                                wire:loading> Patientez svp ... </button>
                        </div>
                        <?php endif; ?>

                  </form>
              </div>
                <?php endif; ?>




                    <?php if($ajouterFaq): ?>
                   
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter un Investissement.</h3>
                        <div class="card-footer text-right">
                          <button type="button" class="btn btn-primary" wire:click='liste'>Liste</button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form wire:submit.prevent='AjouterInv()'>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <select class="form-control" wire:model.lazy='type' required>
                                    <option value=""></option>
                                    <option value="Trading Robots">Trading Robots</option>
                                    <option value="Crypto currency">Crypto currency</option>
                                </select>
                            </div>

                            <?php if($type=='Trading Robots'): ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Libellé</label>
                                <input type="text" class="form-control" wire:model.lazy='libelle'
                                    placeholder="Entrer le libellé" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Licence</label>
                                <input type="number" class="form-control" wire:model.lazy='licence'
                                    placeholder="Licence" min="1" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Investment</label>
                                <div class="row">
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="<?php echo e($inv2-1); ?>" placeholder="Minimum" step="0.01" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv2'  min="<?php echo e($inv1+1); ?>" placeholder="Maximum" step="0.01" required>
                                    </div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Daily profit</label>
                                <div class="row">
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='dayProf1' min="1" step="0.1"  max="<?php echo e($dayProf2-1); ?>" placeholder="Minimum" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='dayProf2' step="0.1"  min="<?php echo e($dayProf1+1); ?>" placeholder="Maximum" required>
                                    </div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Monthly profit</label>
                                <input type="number" class="form-control" wire:model.lazy='profMonth'
                                    placeholder="Monthly profit" min="1" step="0.1" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact lenght</label>
                                <input type="number" class="form-control" wire:model.lazy='contractLengh'
                                    placeholder="Contact lenght" min="1" required>
                            </div>


                            <?php endif; ?>

                            <?php if($type=='Crypto currency'): ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Libellé</label>
                                <input type="text" class="form-control" wire:model.lazy='libelle'
                                    placeholder="Entrer le libellé" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Investment</label>
                                <div class="row">
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="<?php echo e($inv2-1); ?>" placeholder="Minimum" step="0.01" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv2'  min="<?php echo e($inv1+1); ?>" placeholder="Maximum" step="0.01" required>
                                    </div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Daily profit</label>
                                      <input type="number" class="form-control" wire:model.lazy='dayProf1' step="0.1"  min="1" placeholder="Daily profit" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact lenght</label>
                                <input type="number" class="form-control" wire:model.lazy='contractLengh'
                                    placeholder="Contact lenght" min="1" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">All the profits</label>
                                <input type="number" class="form-control" wire:model.lazy='profit'
                                    placeholder="All the profits" min="1" step="0.1" required>
                            </div>

                            <?php endif; ?>
                            


                        </div>
                        <!-- /.card-body -->
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

                        <?php if($type!=''): ?>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterInv'
                                wire:loading.remove>Modifier</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterInv'
                                wire:loading> Patientez svp ... </button>
                        </div>
                        <?php endif; ?>
                        
                    </form>
                </div>
                    <?php endif; ?>

                   

                </div>
            </div>
        </div>
    </section>


</div>
<?php /**PATH C:\laragon\www\Osature\resources\views/livewire/new-investment.blade.php ENDPATH**/ ?>