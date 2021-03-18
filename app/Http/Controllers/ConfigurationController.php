<?php

namespace App\Http\Controllers;

use App\Http\Requests\passePartoutRequest;
use App\models\adresse;
use App\models\about as ModelsAbout;
use App\models\investissement as ModelsInvest;
use App\models\faq as ModelsFaq;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    //
    public function Contact()
    {
        $adresse = adresse::first();
        $title = 'Contact';
        return view('administration.index', compact('title', 'adresse'));
    }

    //aficher les config du site
    public function Welcome()
    {
        $AboutList = ModelsAbout::get();
        $FaqList = ModelsFaq::get();
        $InvestmentList = ModelsInvest::get();
        return view('welcome', compact('AboutList', 'FaqList', 'InvestmentList'));
    }

    //enregistrement des adresses
    public function saveContact(passePartoutRequest $request)
    {

        $reponse = adresse::first();



        if ($reponse) {

            if ($request->adresse == null) {
                $response = $reponse->update([
                    'localisation' => $request->localisation,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                ]);
            } else {
                $response = $reponse->update([
                    'localisation' => $request->localisation,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'adresse' => $request->adresse
                ]);
            }
        } else {
            $response = adresse::create([
                'localisation' => $request->localisation,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse
            ]);
        }

        if ($response) {
            session()->flash('message', 'Coordonnées mises à jour avec succés');
            return redirect()->route('admin_contact_path');
        } else {
            session()->flash('error', 'Erreur lors de la mise à jour');
            return redirect()->route('admin_contact_path');
        }
    }


    //
    public function FAQ()
    {
        $title = 'FAQ';
        return view('administration.index', compact('title'));
    }

    //
    public function Investment()
    {
        $title = 'Investment';
        return view('administration.index', compact('title'));
    }

    public function About()
    {
        $title = 'About';
        return view('administration.index', compact('title'));
    }
}
