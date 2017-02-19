<?php

namespace App;


use Carbon\Carbon;

class Concert extends Model
{
    public $fillable = ["name" , "masterclass_id" ,"place" ,"start"] ;

    public function musics() {
        return $this->belongsToMany('App\Music','concert_music') ;
    }

    public function masterclass() {
        return $this->belongsTo('App\Masterclass') ;
    }

    public function have($music_id) {

    }

    public function setStartAttribute($date) {
        if(is_null($date)) {
            $this->attributes['start'] = Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00")->toDateTimeString();
        } else{
            $this->attributes['start'] = Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }
    }


    public function getStartAttribute($date) {

        if(is_null($date)) {
            return Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00:00")->toDateTimeString();
        } else{
            return Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }


    }


}
