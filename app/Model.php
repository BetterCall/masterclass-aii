<?php

namespace App;

use Illuminate\Database\Eloquent\Model  as IlluminateModel;

class Model extends IlluminateModel
{
    public function scopeLatest($query , $limit){
        return $query->orderBy('created_at', 'DESC')->limit($limit);
    }
}
