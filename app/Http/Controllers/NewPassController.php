<?php

namespace App\Http\Controllers;

use App\models\compte;

use Illuminate\Http\Request;

class NewPassController extends Controller
{
    //
    public function newPass()
    {
        return view('compte.newPass');
    }
}
