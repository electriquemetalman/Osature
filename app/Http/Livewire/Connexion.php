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
<<<<<<< HEAD
    public $fail_count=0;
=======
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8


    public function connexion()
    {
<<<<<<< HEAD
        
        
        if ($this->fail_count==2) {
            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => "Votre compte a été bloqué après ces trois tentatives d'échec. Bienvouloir vous rendre dans votre boite mail où un lien de recupération vous a été envoyé."]);
            
        }else{
            $email = $this->email;
            $password = $this->mdp;
    
            $reponse=compte::whereEmail($email)->first();
    
            if ($reponse) {
                
    
                
                $reponse1=Hash::check($this->mdp, $reponse->password);
                //dd($reponse1);
    
                if ($reponse1) {
                $reponse = Auth::attempt(['email' => $email, 'password' => $password,'statut'=>true]);
                    
                if ($reponse) {
                    if(auth()->user()->type=="administrateur"){
                        return \redirect()->route('index_admin_path');
                    }else{ 
                        return \redirect()->route('index_client_path');
                    }
        
                } else {    
                    $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => "Votre compte est inactif. Veuillez contacter l\'administrateur de la plate forme."]);
    
                }
    
                    
                } else {
                    $this->mdp=null;
    
                $this->dispatchBrowserEvent('alert', 

                ['type' => 'error',  'message' => "Nom d'utilisateur ou mot de passe incorrect."]);
                }
                
                $this->fail_count ++;
                
            } else {
                $this->mdp=null;
                session()->flash('error','Nom d\'utilisateur ou mot de passe incorrect');
    
    
                $this->dispatchBrowserEvent('alert', 
                ['type' => 'error',  'message' => "Nom d'utilisateur ou mot de passe incorrect."]);
                $this->fail_count ++;
            }
        }
        
        
        
=======
        $email = $this->email;
        $password = $this->mdp;
        $reponse=compte::whereEmail($email)->first();
        if ($reponse) {
            
            $reponse1=Hash::check($this->mdp, $reponse->password);

            if (true) {
            $resp = Auth::attempt(['email' => $email, 'password' => $password,'statut'=>true]);
                
            if ($resp) {
                if(session()->has('url.intended') && session('url.intended')!=null && session('url.intended')!=url('/'))
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
        
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
}


    public function render()
    {
        return view('livewire.connexion');
    }
}
