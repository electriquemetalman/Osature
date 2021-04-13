<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Changemdp extends Component
{

    public $mdp;
    public $mdpc;
    public $email;


    public function change(){
        
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'error',  'message' => "Fonctionalité en cours de developpement"]);
    }


    public function render()
    {
        return view('livewire.changemdp');
    }
}
