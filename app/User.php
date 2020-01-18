<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function members(){
        return $this->hasMany('App\Member');
    }
    public function fonctions(){
        return $this->hasMany('App\Fonctions');
    }
    public function cours(){
        return $this->hasMany('App\Cours');
    }
    public function saisons(){
        return $this->hasMany('App\Saisons');
    }
    public function evenements(){
        return $this->hasMany('App\Evenements');
    }
    public function email(){
        return $this->hasMany('App\Email');
    }
    public function factures(){
        return $this->hasMany('App\Factures');
    }
}
