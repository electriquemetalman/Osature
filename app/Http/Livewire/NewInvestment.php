<?php

namespace App\Http\Livewire;

use App\models\investissement as ModelsInvest;
use Livewire\Component;

class NewInvestment extends Component
{

    public $type;
    public $libelle;
    public $licence;
    public $reponse;
    public $ajouterFaq;
    public $modifier;
    public $liste;
    public $identificateur;
    public $inv1;
    public $inv2;
    public $dayProf1;
    public $dayProf2;
    public $contractLengh;
    public $profMonth;
    public $profit;
    public $userlimit;
    public $principalback;
    public $profitaccouting;



    public function vueNonVue($v1, $v2, $v3)
    {
        $this->ajouterFaq = $v1;
        $this->modifier = $v2;
        $this->liste = $v3;
    }

    public function setInputNull()
    {
        $this->libelle = null;
        $this->type = null;
        $this->licence = null;
        $this->inv1 = null;
        $this->inv2 = null;
        $this->dayProf1 = null;
        $this->dayProf2 = null;
        $this->profMonth = null;
        $this->contractLengh = null;
        $this->profit = null;
        $this->userlimit = null;
        $this->principalback = null;
        $this->profitaccouting = null;
    }

    public function AjouterInv()
    {
        $reponse = ModelsInvest::whereLibelle($this->libelle)->first();
        if ($reponse) {
            \session()->flash("error", "l'investissement *$this->libelle* existe deja");
        } else {

            if ($this->type == 'Trading Robots') {
                $reponse = ModelsInvest::create(
                    [
                        'type' => $this->type,
                        'libelle' => $this->libelle,
                        'licence' => $this->licence,
                        'investmin' => $this->inv1,
                        'investmax' => $this->inv2,
                        'profitjourmin' => $this->dayProf1,
                        'profitjourmax' => $this->dayProf2,
                        'profitmois' => $this->profMonth,
                        'dureecontrat' => $this->contractLengh,
                    ]
                );
            } else {
                $reponse = ModelsInvest::create(
                    [
                        'type' => $this->type,
                        'libelle' => $this->libelle,

                        'investmin' => $this->inv1,

                        'investmax' => $this->inv2,

                        'profitjourmin' => $this->dayProf1,

                        'profitjourmax' => $this->dayProf2,

                        'dureecontrat' => $this->contractLengh,

                        'profit' => $this->profit,

                        'userlimit' => $this->userlimit,

                        'principalback' => $this->principalback,

                        'profitaccouting' => $this->profitaccouting,

                    ]
                );
            }



            if ($reponse) {
                session()->flash("message", "l'investissement $this->libelle ajouté avec success");
                $this->vueNonVue(false, false, true);
                $this->setInputNull();
            } else {
                session()->flash("error", "Erreur! l'investissement $this->libelle n'a pas été ajouté");
            }
        }
    }

    public function mount()
    {
        $this->vueNonVue(false, false, true);
    }

    public function getInvestListProperty()
    {
        return ModelsInvest::get();
    }

    public function voir($id)
    {
        $reponse = ModelsInvest::find($id);
        $this->libelle = $reponse->libelle;
        $this->type = $reponse->type;
        $this->licence = $reponse->licence;
        $this->inv1 = $reponse->investmin;
        $this->inv2 = $reponse->investmax;
        $this->dayProf1 = $reponse->profitjourmin;
        $this->dayProf2 = $reponse->profitjourmax;
        $this->profMonth = $reponse->profitmois;
        $this->contractLengh = $reponse->dureecontrat;
        $this->profit = $reponse->profit;
        $this->userlimit = $reponse->userlimit;
        $this->principalback = $reponse->principalback;
        $this->profitaccouting = $reponse->profitaccouting;

        $this->identificateur = $id;
        $this->vueNonVue(false, true, false);
    }

    public function ModifierFaq()
    {
        $reponse = ModelsInvest::whereLibelle($this->libelle)->first();
        if ($reponse->id != $this->identificateur) {
            \session()->flash("error", "le nom de l'investissement *$this->libelle* existe deja");
        } else {

            if ($this->type == 'Trading Robots') {
                $reponse = ModelsInvest::whereId($this->identificateur)
                    ->update(
                        [
                            'type' => $this->type,
                            'libelle' => $this->libelle,
                            'licence' => $this->licence,
                            'investmin' => $this->inv1,
                            'investmax' => $this->inv2,
                            'profitjourmin' => $this->dayProf1,
                            'profitjourmax' => $this->dayProf2,
                            'profitmois' => $this->profMonth,
                            'dureecontrat' => $this->contractLengh,
                            'profit' => null,
                        ]
                    );
            } else {
                $reponse =
                    ModelsInvest::whereId($this->identificateur)
                    ->update(
                        [
                            'type' => $this->type,
                            'libelle' => $this->libelle,
                            'licence' => null,
                            'investmin' => $this->inv1,
                            'investmax' => $this->inv2,
                            'profitjourmin' => $this->dayProf1,
                            'profitjourmax' => $this->dayProf2,
                            'profitmois' => $this->profMonth,
                            'dureecontrat' => $this->contractLengh,
                            'profit' => $this->profit,
                            'userlimit' => $this->userlimit,
                            'principalback' => $this->principalback,
                            'profitaccouting' => $this->profitaccouting,

                        ]
                    );
            }

            if ($reponse) {
                session()->flash("message", "l'investissement $this->libelle modifié avec success");
                $this->vueNonVue(false, false, true);
                $this->setInputNull();
            } else {
                session()->flash("error", "Erreur! le l'investissement $this->libelle n'a pas été modifié");
            }
        }
    }

    public function liste()
    {
        $this->vueNonVue(false, false, true);
    }

    public function ajouter()
    {
        $this->setInputNull();
        $this->vueNonVue(true, false, false);
    }

    public function supprimer($id)
    {
        $reponse = ModelsInvest::destroy($id);

        if ($reponse) {
            session()->flash("message", "investissement supprimé avec succès.");
        } else {
            session()->flash("error", "Erreur! l'investissement n'a pas pu être supprimé.");
        }
    }





    public function render()
    {
        return view('livewire.new-investment');
    }
}
