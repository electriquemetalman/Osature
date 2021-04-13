<div>
    

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
                        @foreach ($this->accountList as $item)
                        <tr>
                          <td>{{ $item->nom }}</td>
                          <td>{{ $item->prenom }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->pays }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td wire:loading.remove>
                            @if($item->statut)
                            <a href="#" data-toggle="modal" wire:click="desactiver({{ $item->id }})"><code class="badge badge-info" >Desactiver </code></a>
                              
                             @else
                             <a href="#" data-toggle="modal" wire:click="activer({{ $item->id }})"><code class="badge badge-success" >Activer </code></a>
                               
                            @endif
                            
                            <a href="#" data-toggle="modal" wire:click="supprimer({{ $item->id }})"><code class="badge badge-danger" >Supprimer</code></a>
                          </td>
                          <td wire:loading>
                                <a href="#" data-toggle="modal" class="disabled"><code class="badge badge-info" >Patientier... </code></a>
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
    
    
                    </div>
                </div>
            </div>
        </section>
    
    
    </div>
    

    
</div>
