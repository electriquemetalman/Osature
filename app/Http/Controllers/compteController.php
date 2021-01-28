<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class compteController extends Controller
{

    public function Compte()
    {
        //return bcrypt(123456);
        return view('Compte.connection');
    }
}
