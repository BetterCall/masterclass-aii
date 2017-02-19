<?php

namespace App;

use Intervention\Image\ImageManagerStatic;

class Instrument extends Model
{
    protected $table = 'instruments';
    public $fillable = ['name' , 'skill' , 'avatar'] ;

    /*
     * Relations
     */
    //Permettra de recuperer tous les utilisateurs jouant d'un instrument en particulier
    public function users(){
        return $this->belongsToMany('App\User') ;
    }

    public function getAvatarAttribute($avatar){
        if($avatar){
            return "/images/avatars/instruments/{$this->id}.png";
        }
        return false;
    }

    public function setAvatarAttribute($avatar){

        if(is_object($avatar) && $avatar->isValid()){

            self::saved(function($instance) use ($avatar) {

                ImageManagerStatic::make($avatar)
                    ->fit(150,150)
                    ->save(public_path() . "/images/avatars/instruments/{$instance->id}.png");
                $instance->attributes['avatar'] = true;

            });
        }

    }
}
