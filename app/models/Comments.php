<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'compte_id', 'news_id', 'comments_id','created_at'];
    
    public function news(){
        return $this->belongsTo(News::class);
    }
    public function compte(){
        return $this->belongsTo(compte::class);
    }
    public function comments(){
        return $this->hasMany(Comments::class)->orderBy('created_at','desc');
    }
}
