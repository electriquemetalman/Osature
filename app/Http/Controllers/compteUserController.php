<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\compteUser;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8

class compteUserController extends Controller
{
    public function index()
    {
        $title = 'Accueil';
<<<<<<< HEAD
        $compteUser= compteUser::orderBy('created_at', 'DESC')->get();
        return view('client.compteUser.index', compact('title','compteUser'));
    }
=======
        return view('client.compteUser.index', compact('title'));
    }
    
    public function add()
    {
        $compteUser = auth()->user()->compteUsers;
        $table=[];
        foreach ($compteUser as $v) {
            $table[] = $v->type;
        }
        return view('client.compteUser.add', compact('table'));
    
    }

    public function edit($id)
    {
        $compteUser = compteUser::findorfail($id);
        $compteUsers = auth()->user()->compteUsers;
        $table=[];
        foreach ($compteUsers as $v) {
            $table[] = $v->type;
        }
        return view('client.compteUser.edit',compact('compteUser','table'));
    
    }
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'adresse' => 'required',
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
        $compteUser= compteUser::create([
            'type' => $request->type,
            'adresse' => $request->adresse,
            'compte_id' => auth()->user()->id,
        ]);
        return response()->json(['state'=>'success']);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'adresse' => 'required',
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

        $reponse = compteUser::whereId($id)
        ->update(
            [
                'type' => $request->type,
                'adresse' => $request->adresse,
            ]
        );
        return response()->json(['state'=>'success']);
    }

    public function destroy($id)
    {
        $compteUser = compteUser::destroy($id);
        return response()->json(['state'=>'success']);
    }

>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
}
