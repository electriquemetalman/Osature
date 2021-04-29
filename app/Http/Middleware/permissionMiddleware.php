<?php

namespace App\Http\Middleware;
use App\models\PermissionRole;

use Closure;

class permissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {   
        $check = PermissionRole::join('permissions', 'permissions.id', '=', 'permission_roles.permissions_id')
                                ->where('permission_roles.roles_id',auth()->user()->roles_id)
                                ->where('permissions.nom',$role)
                                ->count();   
        if($check==0){
            return redirect()->back();
        }
        return $next($request);
    }
}
