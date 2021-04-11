<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compteUser extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'compte_id', 'adresse'];
    
    public function compte(){
        return $this->belongsTo(compte::class);
    }
}
