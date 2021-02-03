<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class compteController extends Controller
{

    public function Compte()
    {
        return view('compte.connection');
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
}
