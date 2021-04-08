<?php

namespace App\Http\Livewire;

use App\models\compte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Connexion extends Component
{

    public $email;
    public $mdp;
    public $type = 'password';
    public $testeur = true;


    public function connexion()
    {
        $email = $this->email;
        $password = $this->mdp;

        $reponse=compte::whereEmail($email)->first();

        if ($reponse) {

            
            $reponse1=Hash::check($this->mdp, $reponse->password);

            if ($reponse1) {
            $resp = Auth::attempt(['email' => $email, 'password' => $password,'statut'=>true]);
                
            if ($resp) {
                if(session()->has('url.intended') && session('url.intended')!=null)
                {
                    return \redirect(session('url.intended'));
                }
                if($reponse->type=="administrateur"){
                    return \redirect()->route('index_admin_path');
                }else{
                    return \redirect()->route('index_client_path');
                }
    
            } else {    
                $this->dispatchBrowserEvent('alert', 
                ['type' => 'error',  'message' => "Votre compte est inactif. Veuillez l'activer à travers l'email que vous avez reçu."]);
            }

                
            } else {
                $this->mdp=null;

            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => "Nom d'utilisateur ou mot de passe incorrect."]);
            }
            
            
        } else {
            $this->mdp=null;
            session()->flash('error','Nom d\'utilisateur ou mot de passe incorrect');


            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => "Nom d'utilisateur ou mot de passe incorrect."]);
        }
        
}


    public function render()
    {
        return view('livewire.connexion');
    }
}
