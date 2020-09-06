<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function room()
    {
        return $this->hasMany('App\Room');
    }
}
