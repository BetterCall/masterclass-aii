<?php

namespace App;


use Carbon\Carbon;

class Cours extends Model
{
    // champs protegés
    public $guarded = ['id'] ;
    //champs Modifiables
    public $fillable =
        [
            'name' ,
            'resume' ,
            'content' ,
            'masterclass_id' ,
            'instruments_id' ,
            'user_id' ,
            'start',
            'end'
        ] ;


    /*
    * Relations
    */
    public function instrument(){
        return $this->belongsTo('App\Instrument') ;
        //pour le recuperer $instrument = Cours::first()->instrument->name ;
    }

    public function user() {
        return $this->belongsTo('App\User') ;
    }

    /*
     * Getter / Setter
     */
    public function setStartAttribute($date) {

        if(is_null($date)) {
            $this->attributes['start'] = Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00")->toDateTimeString();
        } else{
            $this->attributes['start'] = Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }

    }
    public function setEndAttribute($date) {
        if(is_null($date)) {
            $this->attributes['end'] = Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00")->toDateTimeString();
        } else{
            $this->attributes['end'] = Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }
    }


    public function getStartAttribute($date) {

        if(is_null($date)) {
            return Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00:00")->toDateTimeString();
        } else{
            return Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }


    }
    public function getEndAttribute($date) {
        if(is_null($date)) {
            return Carbon::createFromFormat('Y-m-d H:i:s',"2017-01-01 00:00:00")->toDateTimeString();
        } else{
            return Carbon::createFromFormat('Y-m-d H:i:s',$date)->toDateTimeString();
        }
    }



    /*
     * Setter
     */
}
