<?php

namespace App\Http\Controllers;

use App\Http\Requests\passePartoutRequest;
use App\Mail\mailContact;
use App\Notifications\contactMessage;
use Illuminate\Support\Facades\Mail;

class contact extends Controller
{

    public function send(passePartoutRequest $request){

        $details=[
                'message'=>$request->message,
                'subject'=>$request->subject,
                'name'=>$request->name,
                'email'=>$request->email
        ];

        try {
                $reponse= Mail::to(env('MAIL_USERNAME'))->send(new mailContact($details));
                return redirect()->route('welcome')->with('success','Votre message a été envoyé avec succès nous vous repondons des que possible.');
                
        } catch (\Throwable $th) {
            return redirect()->route('welcome')->with('warning',"Erreur lors de l'envoi du message.Veuillez reéssayer.");

        }
        
        
    }
}
