<?php

namespace App\Http\Controllers;

use App\Mail\resetPassword;

use App\models\compte;

use Illuminate\Http\Request;

class PassOubliercontroller extends Controller
{
    //
    public function passOublier()
    {
        return view('compte.passOublier');
    }

    public function sendMail($id, $token)
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
