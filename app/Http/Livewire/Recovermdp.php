<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\compte;
use App\Notifications\mailCreationCompte;
use Illuminate\Support\Str;

class Recovermdp extends Component
{
    public $email;
    public $token;


    public function connexion(){
        $reponse=compte::whereEmail($this->email)->first();

        if ($reponse) {

            $this->token=str_replace('/','',bcrypt(str::random(10)) );
            $reponse->update([
                'remember_token'=>$this->token
            ]);
            $reponse->apm='2';

            

            try {
                $reponse=$reponse->notify(new mailCreationCompte); 
                $this->dispatchBrowserEvent('alert', 
                  ['type' => 'success',  'message' => "Mail envoyé avec succès."]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => "erreur lors de l'envoi du mail."]);

        }

            
        } else { 
            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => "Adresse email introuvable."]);
        }
        
    }

    public function render()
    {
        return view('livewire.recovermdp');
    }
}
