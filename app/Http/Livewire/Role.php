<?php

namespace App\Http\Livewire;

use App\models\Role as ModelsRole;
use Livewire\Component;

class Role extends Component
{
    public function getRoleListProperty()
    {
        return ModelsRole::orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.role.index');
    }
}
