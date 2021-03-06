<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotisations extends Model
{
    public function cours(){
        return $this->belongsTo('App\Cours');
    }

    public function teams(){
        return $this->belongsTo('App\Teams');
    }
}
