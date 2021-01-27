<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Connexion extends Component
{

    public $email;
    public $mdp;
    public $type='password';
    public $testeur=true;


    public function connexion(){
        $email=$this->email;
        $password=$this->mdp;

        $reponse=Auth::attempt(['email' => $email, 'password' => $password]);

        if ($reponse) {
            return \redirect()->route('index_admin_path');
        }else{
            $this->mdp=null;
            session()->flash('error','Nom d\'utilisateur ou mot de passe incorrect');
        }
    }

    
    public function render()
    {
        return view('livewire.connexion');
    }
}
