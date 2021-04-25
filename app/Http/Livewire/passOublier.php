<?php

namespace App\Http\Livewire;

use App\models\compte;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPassword;
use App\Notifications\mailCreationCompte;
use App\Http\Requests\passePartoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class passOublier extends Component
{
    public $email;
    public $token;

    public function render()
    {
        return view('livewire.pass-oublier');
    }

    public function sendMail(passePartoutRequest $request)
    {

        $user = compte::whereEmail($this->email)->first();


        if ($user) {
            $this->token = str_replace('/', '', bcrypt(str::random(10)));
            $user->update([
                'remember_token' => $this->token
            ]);
            $user->apm = '2';


            try {
                //Mail::to($this->email)->send(new resetPassword);
                $user = $user->notify(new mailCreationCompte);
                return redirect()->back()->with(['success' => 'Le mail de recuperation a ete envoyer. verifier votre boite mail.']);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => "Erreur lors de l'envoi du mail.Veuillez reéssayer."]);
            }
        } else {
            return redirect()->back()->with(['error' => 'le mail que vous avez entre exixte pas dans notre base de donner.']);
        }
    }
}
