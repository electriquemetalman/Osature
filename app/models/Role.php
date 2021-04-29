<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'slug'];
    
    public function permissionRoles(){
        return $this->hasMany(PermissionRole::class)->orderBy('created_at','desc');
    }
}
