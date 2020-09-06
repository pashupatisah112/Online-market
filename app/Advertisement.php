<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Advertisement extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
