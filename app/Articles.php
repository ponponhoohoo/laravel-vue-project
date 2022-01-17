<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'category',
    ];

    public function category(){
        return $this->hasOne('App\Category', 'id', 'category');
    }
}
