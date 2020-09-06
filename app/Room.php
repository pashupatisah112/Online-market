<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');   
    }
    public function city()
    {
        return $this->belongsTo('App\City');

    }
    public function street()
    {
        return $this->belongsTo('App\Street');
    }
}
