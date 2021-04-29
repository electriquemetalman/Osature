<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['intitule', 'nom','idmodule'];

    public function permissionRoles(){
        return $this->hasMany(PermissionRole::class)->orderBy('created_at','desc');
    }
}
