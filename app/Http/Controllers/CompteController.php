<?php

namespace App\Http\Controllers;

use App\Http\Requests\passePartoutRequest;
use App\models\compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class compteController extends Controller
{


    public function Compte()

    {

        $users = compte::get();

        return view('compte.connection', compact('users'));
    }
    public function AddCompte()
    {

        $users = compte::get();

        return view('compte.creerCompte', compact('users'));
    }

    public function Administrer()
    {
        $title = 'Accueil';
        return view('administration.index', compact('title'));
    }

    public function Deconnexion(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //$users = compte::get();

        return redirect('/');
    }

    public function Verification($id, $token)
    {

        $reponse = compte::Where(
            [

                'id' => decrypt($id),
                'remember_token' => $token

            ]
        )->first();

        if ($reponse) {
            if ($reponse->verif_email == false) {
                $reponse->update([
                    'verif_email' => true
                ]);
                return redirect()->route('connexion')->with('success', 'Email Confirmé. Veuillez Patienter que nous examinons votre demande de création de compte et un mail vous sera envoyé pour vous donner l\'etat de votre demande.');
            } else {
                return redirect()->route('connexion')->with('warning', 'Votre adresse email a déjà été confirmée.');
            }
        } else {
            return redirect()->route('connexion')->with('warning', 'Lien expiré.! veuillez renvoyer un autre Lien ici.');
        }
    }


    public function ListeCompte()
    {
        $title = 'Compte';
        return view('administration.index', compact('title'));
    }

    public function recoverpw()
    {
        return view('compte.recover_pass_word');
    }

    public function changePw($id, $token)
    {
        $ident = decrypt($id);
        $reponse = compte::Where(
            [
                'id' => $ident,
                'remember_token' => $token
            ]
        )->first();

        if ($reponse) {
            return view('compte.changer_mdp', compact('ident'));
        } else {
            return redirect()->route('connexion')->with('warning', 'Lien expiré.!');
        }
    }
}
