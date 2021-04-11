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
        return view('compte.connection');

    }
    public function AddCompte()
    {
        return view('compte.creerCompte');

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

        return redirect('/');
    }

    public function Verification($id,$token){

        $reponse=compte::Where( 
            [
                'id'=>decrypt($id),
                'remember_token'=>$token
            ],)->first();

            if($reponse){
                if ($reponse->statut==false) {
                    $reponse->update([
                        'statut'=>true
                    ]);
                }else{
                    return redirect()->route('connexion')->with('success','Compte déjà Confirmé. Veuillez vous connecter.');
                }
                
                return redirect()->route('connexion')->with('success','Compte activé avec succès. Veuillez vous connecter.');
            }else{
                return redirect()->route('connexion')->with('warning','Lien expiré.! veuillez renvoyer un autre Lien ici.');
            }
    }
}
