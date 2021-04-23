<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    
    public function index()
    {
        $title = 'Role';
        return view('administration.index', compact('title'));
    }
    
    public function add()
    {
        return view('livewire.role.add');
    
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('livewire.role.edit', compact('role'));
    }

    public function create(Request $request)
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

        $Role= Role::create([
            'nom' => $request->nom,
            'slug' => $request->slug,
        ]);
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

    public function destroy($id)
    {
        $Role = Role::destroy($id);
        return response()->json(['state'=>'success']);
    }
}
