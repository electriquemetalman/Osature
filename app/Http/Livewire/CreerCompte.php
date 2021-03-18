<?php

namespace App\Http\Livewire;


use App\models\compte;
use App\Notifications\mailCreationCompte;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;


class CreerCompte extends Component
{

    public $nom;
    public $prenom;
    public $nomuser;
    public $email;
    public $mdp;
    public $mdpc;
    public $pays;
    public $apm;
    public $payeer;
    public $bitcoin;
    public $token;

    public function create(){

        $reponse=compte::whereEmail($this->email)->first();
        if ($reponse) {
            $this->dispatchBrowserEvent('alert', 
                        ['type' => 'error',  'message' => 'Erreur! Cette adresse email existe déjà.']);
                    
        } else {
            if ($this->mdp != $this->mdpc) {
                $this->dispatchBrowserEvent('alert', 
                        ['type' => 'error',  'message' => 'Erreur! les mots de passe ne correspondent pas.']);
                    
            } else {

                try {
                    $this->token=str_replace('/','',bcrypt(str::random(20)) );

                    $reponse=compte::create(
                        [
                            'nom'=>$this->nom,
                            'prenom'=>$this->prenom,
                            'nomuser'=>$this->nomuser,
                            'email'=>$this->email,
                            'password'=>Hash::make($this->mdp),
                            'pays'=>$this->pays,
                            'apm'=>$this->apm,
                            'bitcoins'=>$this->bitcoin,
                            'payeer'=>$this->payeer,
                            'type'=>'cleint',
                            'statut'=>0,
                            'remember_token'=>$this->token
                        ]
                        );
        
                        if ($reponse) {

                            $reponse->notify(new mailCreationCompte);

                            $this->dispatchBrowserEvent('alert', 
                            ['type' => 'success',  'message' => 'Votre compte a été crée avec succès.Veuillez l\'activer a travers le mail que nous vous avons envoyé.']);
                        }else {
                            $this->dispatchBrowserEvent('alert', 
                            ['type' => 'error',  'message' => 'Erreur de création de votre compte.Veuillez reéssayer s\il vous plait.']);
                        
                        }
                } catch (\Throwable $th) {
                    $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => "Erreur Lors de l'envoie du mail de confirmation"]);
                        
                }
                     
                    
            }
        }
        
        
    }

    public function render()
    {
        return view('livewire.creer-compte');
    }
}
