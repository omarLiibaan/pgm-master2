<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champs extends Model
{
    public function informations(){
        return $this->belongsTo('App\Informations');
    }
}
