<?php

namespace App\models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as basicAuth;
use Illuminate\Database\Eloquent\Model;

class compte extends Model implements Authenticatable
{
    use basicAuth;
}
