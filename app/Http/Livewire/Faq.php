<?php

namespace App\Http\Livewire;

use App\models\faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    public $libelle;
    public $reponse;
    public $ajouterFaq;
    public $modifier;
    public $liste;
    public $identificateur;


    public function vueNonVue($v1, $v2, $v3)
    {
        $this->ajouterFaq = $v1;
        $this->modifier = $v2;
        $this->liste = $v3;
    }

    public function AjouterFaq()
    {
        $reponse = ModelsFaq::whereLibelle($this->libelle)->first();
        if ($reponse) {
            \session()->flash("error", "le nom de FAQ *$this->libelle* existe deja");
        } else {
            $reponse = ModelsFaq::create(
                [
                    'libelle' => $this->libelle,
                    'reponse' => $this->reponse,
                ]
            );

            if ($reponse) {
                session()->flash("message", "FAQ $this->libelle ajouté avec success");
                $this->vueNonVue(false, false, true);
                $this->libelle = null;
                $this->reponse = null;
            } else {
                session()->flash("error", "Erreur! le FAQ $this->libelle n'a pas été ajouté");
            }
        }
    }

    public function mount()
    {
        $this->vueNonVue(false, false, true);
    }

    public function getFaqListProperty()
    {
        return ModelsFaq::select('id', 'libelle', 'reponse')->get();
    }

    public function voir($id)
    {
        $reponse = ModelsFaq::find($id);
        $this->libelle = $reponse->libelle;
        $this->reponse = $reponse->reponse;
        $this->identificateur = $id;
        $this->vueNonVue(false, true, false);
    }

    public function ModifierFaq()
    {
        $reponse = ModelsFaq::whereLibelle($this->libelle)->first();
        if ($reponse) {
            \session()->flash("error", "le nom de FAQ *$this->libelle* existe deja");
        } else {
            $reponse = ModelsFaq::whereId($this->identificateur)
                ->update(
                    [
                        'libelle' => $this->libelle,
                        'reponse' => $this->reponse,
                    ]
                );

            if ($reponse) {
                session()->flash("message", "FAQ $this->libelle modifié avec success");
                $this->vueNonVue(false, false, true);
                $this->libelle = null;
                $this->reponse = null;
            } else {
                session()->flash("error", "Erreur! le FAQ $this->libelle n'a pas été modifié");
            }
        }
    }

    public function liste()
    {
        $this->vueNonVue(false, false, true);
    }

    public function ajouter()
    {
        $this->libelle = null;
        $this->reponse = null;
        $this->vueNonVue(true, false, false);
    }

    public function supprimer($id)
    {
        $reponse = ModelsFaq::destroy($id);

        if ($reponse) {
            session()->flash("message", "FAQ supprimé avec succès.");
        } else {
            session()->flash("error", "Erreur! le FAQ n'a pas pu être supprimé.");
        }
    }

    public function render()
    {
        return view('livewire.faq');
    }
}
