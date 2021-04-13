<?php

namespace App\Http\Livewire;

use App\models\compte;
use App\Http\Requests\passePartoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class newPass extends Component
{

    public function render()
    {
        return view('livewire.new-pass');
    }
}
