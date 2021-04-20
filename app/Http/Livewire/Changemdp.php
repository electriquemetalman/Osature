<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\compte;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Changemdp extends Component
{

    public $mdp;
    public $mdpc;
    public $email;
    public $ident;


    public function change(){

        if ($this->mdp != $this->mdpc) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => 'Erreur! les mots de passe ne correspondent pas.']);
                
        } else {
                $token=str_replace('/','',bcrypt(str::random(20)) );

                $reponse=compte::find($this->ident)
                ->update(
                    [
                        'password'=>Hash::make($this->mdp),
                        'remember_token'=>$token
                    ]);

                    if ($reponse) {
                        return redirect()->route('connexion')->with('success','Mot de passe modifié avec succès! Veuillez vous connecter.');
                    } else {
                        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => 'Erreur lors de la modification veuillez reéssayer plus tard.']);
                    }
                    
        }
    }


    public function render() 
    {
        $this->email=compte::find($this->ident)->email;
        return view('livewire.changemdp');
    }
}
