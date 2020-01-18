<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonctions extends Model
{
    public function informations(){
        return $this->hasMany('App\Informations');
    }
}
