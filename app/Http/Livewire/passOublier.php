<?php

namespace App\Http\Livewire;

use App\models\compte;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPassword;
use App\Http\Requests\passePartoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class passOublier extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.pass-oublier');
    }

    public function sendMail(passePartoutRequest $request)
    {


        Mail::to($this->email)->send(new resetPassword);
        return redirect()->back()->with('success', 'Le mail de recuperation a ete envoyer. verifier votre boite mail.');
        /*try {

            Mail::to(env('MAIL_USERNAME'))->send(new resetPassword($this->email));
            return redirect()->back()->with('success', 'Le mail de recuperation a ete envoyer. verifier votre boite mail.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', "Erreur lors de l'envoi du mail.Veuillez reéssayer.");
        }*/
    }
}
