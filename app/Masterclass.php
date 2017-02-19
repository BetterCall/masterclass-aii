<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Masterclass extends Model
{
    protected $table = 'masterclass';

    //champs modifiable
    public $fillable =
        [
            'name',
            'cours' ,
            'content',
            'resume' ,
            'start' ,
            'end' ,
            'themes_id' ,
            'price'
        ] ;


    /*
     * Relations
     */

    public function themes() {
        return $this->belongsTo('App\Theme');
    }


    public function users() {
        return $this->belongsToMany('App\User') ;
    }

    public function cours() {
        return $this->hasMany('App\Cours');
    }
    public function concert() {

        return $this->hasMany('App\Concert');
    }

    // Permet de lier plusieurs user a un cours
    public function subscribers() {
        return $this->belongsToMany('App\User','subscriptions_masterclass') ;
    }

    //verfication d'une inscription
    public function followedBy($user) {
        return DB::table('subscriptions_masterclass')
            ->where('user_id', $user->id)
            ->where('masterclass_id',$this->id)
            ->count() ;
    }

    // inscription en attente de validation
    public static function pendingRegistration () {
        return DB::table('subscriptions_masterclass')
            ->where('validate', false)
            ->get();
    }

    /**
     * @param $masterclass_id
     * @param $user_id
     * @param $response 1 accept 2 refus
     */
    public static function responseRegistration($masterclass_id , $user_id , $response) {
        DB::table('subscriptions_masterclass')
            ->where('user_id',  $user_id)
            ->where('masterclass_id',$masterclass_id )
            ->update(['validate' => $response]);
    }


    /*
     * Getter
     */

    // $cours
    public function getCoursAttribute(){
        if($this->id ){
            return $this->cours();
        }
        return [] ;
    }
    // $concert
    public function getConcertsAttribute(){
        if($this->id ){
            return $this->cours();
        }
        return [] ;
    }
/**
    public function getStartAttribute() {

    }
    public function getEndAttribute() {

    }

    /*
     * Setter
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




}
