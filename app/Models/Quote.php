<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    

}