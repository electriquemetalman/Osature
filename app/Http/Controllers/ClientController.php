<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\compte;
use Illuminate\Support\Facades\Hash;
use Auth;


class ClientController extends Controller
{
    public function Client()
    {
        $title = 'Accueil';
        return view('client.layouts.home', compact('title'));
    }

    public function profile()
    {
        $title = 'Profile';
        return view('client.profile', compact('title'));
    }
    public function editProfile(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'nomuser' => 'required|',
            'pays' => 'required|',
            'email' => 'required|email|unique:comptes,email,'.auth()->user()->id,
            // 'apm' => 'required|',
            // 'bitcoins' => 'required|',
            // 'payeer' => 'required|',
            'image' => 'image|max:5120|nullable',
        ]);

        if ($validator->fails()) {
            $reason='';
            foreach ($validator->errors()->all() as $error){
                $reason.='<li>'.$error.'</li>';
            }
            return response()->json([
                        'state' => 'error',
                        'reason' => $reason
                    ]);
        }

        $client = compte::find(auth()->user()->id);
        if($request->hasFile('image')){
            $profileImage = $request->file('image'); 
            $profileImageSaveAsName = time(). Auth::id() ."-profil.".$profileImage->getClientOriginalExtension();
            $upload_path=public_path('image/profil/'.$profileImageSaveAsName);
            move_uploaded_file($profileImage,$upload_path);
        }else{
            $profileImageSaveAsName = $client->image;
        }
        $reponse = compte::whereId(auth()->user()->id)
        ->update(
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'nomuser' => $request->nomuser,
                'pays' => $request->pays,
                'email' => $request->email,
                // 'apm' => $request->apm,
                // 'bitcoins' => $request->bitcoins,
                // 'payeer' => $request->payeer,
                'image' => $profileImageSaveAsName,
            ]
        );
        return response()->json(['state'=>'success']);
    }
    public function editPassword(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $reason='';
            foreach ($validator->errors()->all() as $error){
                $reason.='<li>'.$error.'</li>';
            }
            return response()->json([
                        'state' => 'error',
                        'reason' => $reason
                    ]);
        }
        $client = compte::find(auth()->user()->id);
        if(Hash::check($request->old_password, $client->password)){
            $reponse = compte::whereId(auth()->user()->id)
            ->update(
                ['password' => Hash::make($request->password),]
            );
            return response()->json(['state'=>'success']);
        }else{
            return response()->json([
                'state' => 'error',
                'reason' => 'Le mot de passe actuel est érroné'
            ]);
        }
        
    }
}
