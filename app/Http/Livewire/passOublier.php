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

        $user = compte::whereEmail($this->email)->first();
        //$remember_token = bcrypt::random(10);

        if($user){
            try {
                Mail::to($this->email)->send(new resetPassword);
                return redirect()->back()->with(['success'=> 'Le mail de recuperation a ete envoyer. verifier votre boite mail.']);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error'=> "Erreur lors de l'envoi du mail.Veuillez reéssayer."]);
            }
        } else{
            return redirect()->back()->with(['error'=>'le mail que vous avez entre exixte pas dans notre base de donner.']);
        }
    }
}
