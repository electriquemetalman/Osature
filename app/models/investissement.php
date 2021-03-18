<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class investissement extends Model
{
    protected $fillable = ['type', 'libelle', 'licence', 'investmin', 'investmax', 'profitjourmin', 'profitjourmax', 'profitmois', 'dureecontrat', 'profit', 'userlimit', 'principalback', 'profitaccouting'];
}
