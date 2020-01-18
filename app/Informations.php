<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    public function fonctions(){
        return $this->belongsTo('App\Fonctions');
    }
    public function champs(){
        return $this->hasMany('App\Champs');
    }
}
