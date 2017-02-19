<?php

namespace App;

class Theme extends Model
{

    public $fillable = ['name'] ;

    public function masterclasses() {
        return $this->belongsToMany('App\Masterclass');
    }
}
