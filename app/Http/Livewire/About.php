<?php

namespace App\Http\Livewire;

use App\models\about as ModelsAbout;
use Livewire\Component;

class About extends Component
{
    public $security;
    public $guarantee;
    public $income;
    public $howework;
    public $ajouterAbout;
    public $modifier;
    public $liste;
    public $identificateur;
    public $reponse;

    public function vueNonVue($v1, $v2, $v3)
    {
        $this->ajouterAbout = $v1;
        $this->modifier = $v2;
        $this->liste = $v3;
    }

    public function AjouterAbout()
    {
        $reponse = ModelsAbout::create(
            [
                'security' => $this->security,
                'guarantee' => $this->guarantee,
                'income' => $this->income,
                'howework' => $this->howework,
            ]
        );

        if ($reponse) {
            session()->flash("message", "About us ajouté avec success");
            $this->vueNonVue(false, false, true);
            $this->security  = null;
            $this->guarantee = null;
            $this->income    = null;
            $this->howework  = null;
        } else {
            session()->flash("error", "Erreur! le About us n'a pas été ajouté");
        }
    }

    public function mount()
    {
        $this->vueNonVue(false, false, true);
    }

    public function getAboutListProperty()
    {
        return ModelsAbout::select('id', 'security', 'guarantee', 'income', 'howework')->get();
    }

    public function voir($id)
    {
        $reponse = ModelsAbout::find($id);
        $this->security = $reponse->security;
        $this->guarantee = $reponse->guarantee;
        $this->income = $reponse->income;
        $this->howework = $reponse->howework;
        $this->identificateur = $id;
        $this->vueNonVue(false, true, false);
    }

    public function ModifierAbout()
    {
        $reponse = ModelsAbout::whereSecurity($this->security)->first();
        if ($reponse) {
            \session()->flash("error", "ce About us existe deja");
        } else {
            $reponse = ModelsAbout::whereId($this->identificateur)
                ->update(
                    [
                        'security' => $this->security,
                        'guarantee' => $this->guarantee,
                        'income' => $this->income,
                        'howework' => $this->howework,
                    ]
                );

            if ($reponse) {
                session()->flash("message", "About us modifié avec success");
                $this->vueNonVue(false, false, true);
                $this->security  = null;
                $this->guarantee = null;
                $this->income    = null;
                $this->howework  = null;
            } else {
                session()->flash("error", "Erreur! le About us n'a pas été modifié");
            }
        }
    }

    public function liste()
    {
        $this->vueNonVue(false, false, true);
    }

    public function ajouter()
    {
        $this->security  = null;
        $this->guarantee = null;
        $this->income    = null;
        $this->howework  = null;
        $this->vueNonVue(true, false, false);
    }

    public function supprimer($id)
    {
        $reponse = ModelsAbout::destroy($id);

        if ($reponse) {
            session()->flash("message", "About us supprimé avec succès.");
        } else {
            session()->flash("error", "Erreur! About us n'a pas pu être supprimé.");
        }
    }

    public function render()
    {
        return view('livewire.about');
    }
}
