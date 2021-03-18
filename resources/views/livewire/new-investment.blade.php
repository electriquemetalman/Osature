<div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                  @if (session()->has('message'))
                  <div class="alert alert-info text-center alert-dismissible">
                      {{ session('message') }}
                  </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger text-center upper alert-dismissible">
                        {{ session('error') }}
                    </div>
                @endif
                
                @if ($liste)
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
                    @foreach ($this->InvestList as $item)
                    <tr>
                      <td>{{ $item->type }}</td>
                      <td>{{ $item->libelle }}</td>
                      <td>{{ $item->investmin }}$ ---- {{ $item->investmax }}$</td>
                      @if ($item->type=='Trading Robots')
                      <td>{{ $item->profitjourmin }}% ---- {{ $item->profitjourmax }}%</td>
                          
                      @else
                      <td>{{ $item->profitjourmin }}%</td>
                          
                      @endif
                      <td>{{ $item->dureecontrat }}</td>
                      <td>
                        <a href="#" data-toggle="modal" wire:click="voir({{ $item->id }})"><code class="badge badge-success" >Voir / Modifier</code></a>
                        <a href="#" data-toggle="modal" wire:click="supprimer({{ $item->id }})"><code class="badge badge-danger" >Supprimer</code></a>
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                @endif





                @if ($modifier)
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

                        @if($type=='Trading Robots')
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
                                  <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="{{ $inv2-1 }}" placeholder="Minimum" step="0.01" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv2'  min="{{ $inv1+1 }}" placeholder="Maximum" step="0.01" required>
                                </div>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Daily profit</label>
                            <div class="row">
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='dayProf1' min="1" step="0.1"  max="{{ $dayProf2-1 }}" placeholder="Minimum" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='dayProf2' step="0.1"  min="{{ $dayProf1+1 }}" placeholder="Maximum" required>
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


                        @endif

                        @if ($type=='Crypto currency')

                        <div class="form-group">
                            <label for="exampleInputEmail1">Libellé</label>
                            <input type="text" class="form-control" wire:model.lazy='libelle'
                                placeholder="Entrer le libellé" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Investment</label>
                            <div class="row">
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="{{ $inv2-1 }}" placeholder="Minimum" step="0.01" required>
                                </div>
                                
                                <div class="col-6">
                                  <input type="number" class="form-control" wire:model.lazy='inv2'  min="{{ $inv1+1 }}" placeholder="Maximum" step="0.01" required>
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

                        @if (session()->has('message'))
                        <div class="alert alert-info text-center alert-dismissible">
                            {{ session('message') }}
                        </div>
                      @endif
      
                      @if (session()->has('error'))
                          <div class="alert alert-danger text-center upper alert-dismissible">
                              {{ session('error') }}
                          </div>
                      @endif

                        @endif
                        


                    </div>
                      <!-- /.card-body -->

                      @if ($type!='')
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterInv'
                                wire:loading.remove>Enregistrer</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterInv'
                                wire:loading> Patientez svp ... </button>
                        </div>
                        @endif

                  </form>
              </div>
                @endif




                    @if ($ajouterFaq)
                   
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

                            @if($type=='Trading Robots')
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
                                      <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="{{ $inv2-1 }}" placeholder="Minimum" step="0.01" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv2'  min="{{ $inv1+1 }}" placeholder="Maximum" step="0.01" required>
                                    </div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Daily profit</label>
                                <div class="row">
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='dayProf1' min="1" step="0.1"  max="{{ $dayProf2-1 }}" placeholder="Minimum" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='dayProf2' step="0.1"  min="{{ $dayProf1+1 }}" placeholder="Maximum" required>
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


                            @endif

                            @if ($type=='Crypto currency')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Libellé</label>
                                <input type="text" class="form-control" wire:model.lazy='libelle'
                                    placeholder="Entrer le libellé" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Investment</label>
                                <div class="row">
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv1' min="1"  max="{{ $inv2-1 }}" placeholder="Minimum" step="0.01" required>
                                    </div>
                                    
                                    <div class="col-6">
                                      <input type="number" class="form-control" wire:model.lazy='inv2'  min="{{ $inv1+1 }}" placeholder="Maximum" step="0.01" required>
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

                            @endif
                            


                        </div>
                        <!-- /.card-body -->
                        @if (session()->has('message'))
                        <div class="alert alert-info text-center alert-dismissible">
                            {{ session('message') }}
                        </div>
                      @endif
      
                      @if (session()->has('error'))
                          <div class="alert alert-danger text-center upper alert-dismissible">
                              {{ session('error') }}
                          </div>
                      @endif

                        @if ($type!='')
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary" wire:target='AjouterInv'
                                wire:loading.remove>Modifier</button>
                            <button class="btn btn-success disabled mb-5 mt-2" wire:target='AjouterInv'
                                wire:loading> Patientez svp ... </button>
                        </div>
                        @endif
                        
                    </form>
                </div>
                    @endif

                   

                </div>
            </div>
        </div>
    </section>


</div>
