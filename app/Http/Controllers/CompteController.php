<?php

namespace App\Http\Controllers;

use App\Http\Requests\passePartoutRequest;
use App\models\compte;
use App\models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class compteController extends Controller
{


    public function Compte(){
        $users = compte::get();
        return view('compte.connection', compact('users'));

    }

    public function add()
    {
        $role = Role::get();
        return view('livewire.compte.add', compact('role'));
    
    }

    public function edit($id)
    {
        $compte = compte::find($id);
        $role = Role::get();
        return view('livewire.compte.edit', compact('compte','role'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|min:3',
            'nomuser' => 'required|min:3',
            'email' => 'required|unique:comptes|',
            'password' => 'required|min:6',
            'statut' => 'required|',
            'type' => 'required|',
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
        if($request->hasFile('image')){
            $profileImage = $request->file('image'); 
            $profileImageSaveAsName = time(). Auth::id() ."-profil.".$profileImage->getClientOriginalExtension();
            $upload_path=public_path('image/profil/'.$profileImageSaveAsName);
            move_uploaded_file($profileImage,$upload_path);
        }else{
            $profileImageSaveAsName = '';
        }
        $compte= compte::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'nomuser'=>$request->nomuser,
            'email'=>$request->email,
            'password'=>Hash::make($request->mdp),
            'pays'=>$request->pays,
            'type'=>$request->type,
            'statut'=>$request->statut,
            'roles_id'=>$request->type!='client' ? $request->roles_id:NULL,
            'image' => $profileImageSaveAsName,
        ]);
        return response()->json(['state'=>'success']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'statut' => 'required|',
            'type' => 'required|',
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

        $reponse = compte::whereId($id)
        ->update(
            [
                'type' => $request->type,
                'statut' => $request->statut,
                'roles_id'=>$request->type!='client' ? $request->roles_id:NULL,
            ]
        );
        return response()->json(['state'=>'success']);
    }

    public function destroy($id)
    {
        $compte = compte::destroy($id);
        return response()->json(['state'=>'success']);
    }

    public function AddCompte()
    {

        $users = compte::get();

        return view('compte.creerCompte', compact('users'));
    }

    public function Administrer()
    {
        $title = 'Accueil';
        return view('administration.index', compact('title'));
    }

    public function Deconnexion(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //$users = compte::get();

        return redirect('/');
    }

    public function Verification($id, $token)
    {

        $reponse = compte::Where(
            [

                'id'=>decrypt($id),
                'remember_token'=>$token

            ])->first();

            if($reponse){
                if ($reponse->verif_email==false) {
                    $reponse->update([
                        'verif_email'=>true
                    ]);
                    return redirect()->route('connexion')->with('success','Email Confirmé. Veuillez Patienter que nous examinons votre demande de création de compte et un mail vous sera envoyé pour vous donner l\'etat de votre demande.');

                }else{
                return redirect()->route('connexion')->with('warning','Votre adresse email a déjà été confirmée.');

                }
                

            }else{
                return redirect()->route('connexion')->with('warning','Lien expiré.! veuillez renvoyer un autre Lien ici.');

            }
    }
    

    public function ListeCompte(){
        $title = 'Compte';
        return view('administration.index', compact('title'));
    }

    public function recoverpw(){
        return view('compte.recover_pass_word');
    }

    public function changePw($id,$token){
        $ident=decrypt($id);
        $reponse=compte::Where( 
        [
            'id'=>$ident,
            'remember_token'=>$token
        ])->first();

        if($reponse){
            return view('compte.changer_mdp',compact('ident'));
        }else{
            return redirect()->route('connexion')->with('warning','Lien expiré.!');
        }

    }

}
