<?php
    use App\models\PermissionRole;

    function check($role,$permission){
        if(PermissionRole::where('roles_id',$role) ->where('permissions_id',$permission)->count()==0){
            return '';
        }
        return 'checked';
    }
?>
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header row">
                    <h3 class="card-title col-md-11">List of permissions</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Roles</th>
                                @foreach ($this->roleList as $role)
                                <th class="text-center">{{$role->slug}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->permissionList as $permission)
                            <tr>
                                <td colspan="{{$this->roleList->count()+1}}" style="text-align:center;background-color:#343A40;color: white;font-weight: bold;">{{$permission->intitule}}</td>
                            </tr> 
                            <tr>
                                <td>Voir le menu</td>
                                @foreach ($this->roleList as $role)
                                <td>
                                    <div class="text-center">
                                        <input type="checkbox" class="btncheck" {{check($role->id,$permission->id)}} data-role="{{$role->id}}" data-permission="{{$permission->id}}">
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>