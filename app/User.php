<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function room()
    {
        return $this->hasMany('App\Room');
    }
    public function vehicle()
    {
        return $this->hasMany('App\Vehicle');
    }
    public function searchRecord()
    {
        return $this->hasMany('App\SearchRecord');
    }
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
    public function advertise()
    {
        return $this->hasMany('App\Advertisement');
    }
}
