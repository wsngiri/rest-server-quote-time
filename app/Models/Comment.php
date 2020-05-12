<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body','quote_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tutorial()
    {
        return $this->belongsTo('App\Models\Quote');
    }

}