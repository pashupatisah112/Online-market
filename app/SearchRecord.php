<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchRecord extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
