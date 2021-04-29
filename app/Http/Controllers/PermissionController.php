<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\models\PermissionRole;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $title = 'Permission';
        return view('administration.index', compact('title'));
    }

    public function checked(Request $request)
    {
        if($request->state==1){
            $permissionRole= PermissionRole::create([
                'roles_id' => $request->role,
                'permissions_id' => $request->permission,
            ]);
        }else{
            $permissionRole = PermissionRole::where('roles_id',$request->role)
                                            ->where('permissions_id',$request->permission)
                                            ->delete();
        }
        
        return response()->json(['state'=>'success']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|min:3',
            'slug' => 'required|unique:roles|min:3',
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

        $reponse = Role::whereId($id)
        ->update(
            [
                'nom' => $request->nom,
                'slug' => $request->slug,
            ]
        );
        return response()->json(['state'=>'success']);
    }

}
