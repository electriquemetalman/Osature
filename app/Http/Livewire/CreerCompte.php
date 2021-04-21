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

    public function create()
    {

        $reponse = compte::whereEmail($this->email)->first();
        if ($reponse) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Erreur! Cette adresse email existe déjà.']
            );
        } else {
            if ($this->mdp != $this->mdpc) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Erreur! les mots de passe ne correspondent pas.']
                );
            } else {

                try {
                    $this->token = str_replace('/', '', bcrypt(str::random(20)));

                    $reponse = compte::create(
                        [
                            'nom'=>$this->nom,
                            'prenom'=>$this->prenom,
                            'nomuser'=>$this->nomuser,
                            'email'=>$this->email,
                            'password'=>Hash::make($this->mdp),
                            'pays'=>$this->pays,
                            'apm'=>null,
                            'bitcoins'=>null,
                            'payeer'=>null,
                            'type'=>'cleint',
                            'statut'=>0,
                          'avatar' => 'avatar.png',
                            'remember_token'=>$this->token
                        ]
                    );

                    if ($reponse) {


//Notification admin
                            $reponse->email=env('MAIL_ADMIN');

                            $reponse->notify(new mailCreationCompte); 

                            $reponse->email=$this->email;
                            $reponse->apm='1';
                            $reponse->notify(new mailCreationCompte); 


//Notification user

                            

                            $this->dispatchBrowserEvent('alert', 
                            ['type' => 'success',  'message' => 'Veuillez Patienter que nous examinons votre demande de création de compte et un mail vous sera envoyé pour vous donner l\'etat de votre demande.']);

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
        $users = compte::get();
        return view('livewire.creer-compte', compact('users'));
    }
}
