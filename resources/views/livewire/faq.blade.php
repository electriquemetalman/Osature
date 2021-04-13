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
                    @foreach ($this->faqList as $item)
                    <tr>
                      <td>{{ $item->libelle }}</td>
                      <td>
                        <a href="#" data-toggle="modal" wire:click="voir({{ $item->id }})"><code class="badge badge-success" >Voir / Modifier</code></a>
                        <a href="#" data-toggle="modal" data-target="#modal-sm" ><code class="badge badge-danger" >Supprimer</code></a>
                      </td>
                    </tr>
                    @endforeach
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Delate</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <p>Are you sure you want to delete FAQ??&hellip;</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary"  wire:click="supprimer({{ $item->id }})" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
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
                @endif




                    @if ($ajouterFaq)

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
                    @endif



                </div>
            </div>
        </div>
    </section>


</div>
