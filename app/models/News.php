<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','title', 'image', 'content','created_at'];

    public function comments(){
        return $this->hasMany(Comments::class)->orderBy('created_at','desc');
    }

}
