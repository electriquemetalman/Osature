<?php

namespace App\Http\Livewire;

use App\models\Permission as ModelsPermission;
use App\models\Role as ModelsRole;
use Livewire\Component;

class Permission extends Component
{
    public function getPermissionListProperty()
    {
        return ModelsPermission::orderBy('created_at', 'DESC')->get();
    }
    public function getRoleListProperty()
    {
        return ModelsRole::orderBy('created_at', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.permission.index');
    }
}
