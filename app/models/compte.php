<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as basicAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class compte extends Model implements Authenticatable
{
    use basicAuth;
    use Notifiable;

    protected $fillable=['nom','prenom','nomuser','email','password','pays',
    'image','type','statut','remember_token','verif_email','mdp_forget','roles_id'];

    public function compteUsers(){
        return $this->hasMany(compteUser::class)->orderBy('created_at','desc');
    }
    
    public function roles(){
        return $this->belongsTo(Role::class);
    }
}
