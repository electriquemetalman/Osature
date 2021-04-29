<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header row">
                    <h3 class="card-title col-md-11">Liste des comptes</h3>
                    <div class="col-md-1">
                        <button type="button" data-lien="comptes/add" data-modal="modalAll1" class="btn btn-block btn-primary edit-row ">Ajouter</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom complet</th>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Pays</th>
                                <th>Type</th>
                                <th>Statut</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->accountList as $compte)
                            <tr>
                                <td><img height="50" src="{{$compte->image=='' ? 'default.png':'image/profil/'.$compte->image}}" alt="comptes"></td>
                                <td>{{$compte->nom}} {{$compte->prenom}}</td>
                                <td>{{$compte->nomuser}}</td>
                                <td>{{$compte->email}}</td>
                                <td>{{$compte->pays}}</td>
                                <td>{{$compte->type}}</td>
                                <td>
                                    @if($compte->statut)
                                        <span class="text-success">Actif</span> 
                                    @else
                                        <span class="text-danger">Inactif</span> 
                                    @endif
                                </td>
                                <td>{{$compte->roles!=NULL ? $compte->roles->nom:''}}</td>
                                <td class="actions">
                                    <a class="on-default btn btn-primary mr-1 mb-1" wire:click="toggle({{ $compte->id }},{{ $compte->statut }})" ><i class="fa fa-power-off"></i></a>
                                    <a class="on-default btn btn-secondary edit-row mr-1 mb-1" data-modal="modalAll" data-lien="comptes/edit/{{$compte->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="on-default btn btn-danger remove-row" data-lien="comptes/delete/{{$compte->id}}"><i class="fa fa-trash "></i></a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>