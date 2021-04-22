<?php

namespace App\Http\Livewire;

use App\Mail\mailContact;
use App\Notifications\contactMessage;
use Illuminate\Support\Facades\Mail;
use App\models\compte As compteList;
use Livewire\Component;

class Compte extends Component
{


    public $libelle;
    public $reponse;
    public $ajouterFaq;
    public $modifier;
    public $liste;
    public $identificateur;


    public function vueNonVue($v1, $v2, $v3)
    {
        $this->modifier = $v2;
        $this->liste = $v3;
    }


    public function mount()
    {
        $this->vueNonVue(false, false, true);
    }

    public function getAccountListProperty()
    {
        return compteList::get();
    }

    public function voir($id)
    {
        $reponse = compteList::find($id);
        $this->libelle = $reponse->libelle;
        $this->reponse = $reponse->reponse;
        $this->identificateur = $id;
        $this->vueNonVue(false, true, false);
    }

    public function activer($id)
    {
        $reponse = compteList::find($id);

        $nom=$reponse->nom;
        $email=$reponse->email;
        
        $reponse =$reponse->update([
            'statut'=>true
        ]);

        if ($reponse) {
            $details=[
                'message'=>"Votre accès à la plate forme Osature est desormais valide. veuillez acceder via l'adresse suivante :  www.osature.com",
                'subject'=>"Confirmation d'accès à la plate forme Osature",
                'name'=>$nom,
                'email'=>env('MAIL_FROM_ADDRESS')
        ];

        try {
            $reponse= Mail::to($email)->send(new mailContact($details));
            session()->flash("message", "compte activé avec succès. Le concerné à été notifié par mail.");
                
        } catch (\Throwable $th) {
            session()->flash("error", "Erreur! Le mail n\a pas pu être envoyé.");

        }
        } else {
            session()->flash("error", "Erreur! le compte n'a pas pu être activé.");
        }
    }

    public function desactiver($id)
    {
        $reponse = compteList::find($id)->update([
            'statut'=>false
        ]);

        if ($reponse) {
            session()->flash("message", "compte desactivé avec succès.");
        } else {
            session()->flash("error", "Erreur! le compte n'a pas pu être desactivé.");
        }
    }

    public function liste()
    {
        $this->vueNonVue(false, false, true);
    }


    public function supprimer($id)
    {
        $reponse = compteList::destroy($id);

        if ($reponse) {
            session()->flash("message", "compte supprimé avec succès.");
        } else {
            session()->flash("error", "Erreur! le compte n'a pas pu être supprimé.");
        }
    }


    public function render()
    {
        return view('livewire.compte'); 
    }
}
