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
    
<<<<<<< HEAD

    protected $fillable=['nom','prenom','nomuser','email','password','pays','apm','bitcoins','payeer','type','statut','remember_token','verif_email','mdp_forget'];

=======
    protected $fillable=['nom','prenom','nomuser','email','password','pays','image','type','statut','remember_token'];
    
    public function compteUsers(){
        return $this->hasMany(compteUser::class)->orderBy('created_at','desc');
    }
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
}
