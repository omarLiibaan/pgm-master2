<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    public function seances(){
        return $this->hasMany('App\Seances');
    }

    public function cotisations(){
        return $this->hasMany('App\Cotisations');
    }
}
