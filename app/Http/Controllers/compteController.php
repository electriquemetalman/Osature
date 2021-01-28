<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class compteController extends Controller
{
<<<<<<< HEAD

    public function Compte()
    {
        //return bcrypt(123456);
=======
    
    public function Compte(){
>>>>>>> 9cc641224a0c06cdb0adb8443ea0c04d1178e788
        return view('Compte.connection');
    }


    public function Administrer(){
        $title='Accueil';
        return view('Administration.index',compact('title'));
    }

    
        public function Deconnexion(Request $request)
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/');
        }
    
}
