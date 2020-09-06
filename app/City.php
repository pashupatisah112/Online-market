<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function street()
    {
        return $this->hasMany('App\Street');
    }
    public function room()
    {
        return $this->hasMany('App\Room');
    }
    public function vehicle()
    {
        return $this->hasMany('App\Vehicle');
    }
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
    public function SearchRecord()
    {
        return $this->hasMany('App\SearchRecord');
    }
}
