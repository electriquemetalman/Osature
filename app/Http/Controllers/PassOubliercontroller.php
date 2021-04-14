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

    public function sendMail()
    {
        return view('compte.passOublier');
    }
}
