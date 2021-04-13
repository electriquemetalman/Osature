<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\compteUser;

class compteUserController extends Controller
{
    public function index()
    {
        $title = 'Accueil';
        $compteUser= compteUser::orderBy('created_at', 'DESC')->get();
        return view('client.compteUser.index', compact('title','compteUser'));
    }
}
