<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header row">
                    <h3 class="card-title col-md-11">List of roles</h3>
                    <div class="col-md-1">
                        <button type="button" data-lien="roles/add" data-modal="modalAll" class="btn btn-block btn-primary edit-row ">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->roleList as $role)
                            <tr>
                                <td>{{$role->nom}}</td>
                                <td>{{strip_tags($role->slug)}}</td>
                                <td class="actions">
                                    <a class="on-default btn btn-secondary edit-row mr-1 mb-1" data-modal="modalAll" data-lien="roles/edit/{{$role->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="on-default btn btn-danger remove-row" data-lien="roles/delete/{{$role->id}}"><i class="fa fa-trash "></i></a>
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