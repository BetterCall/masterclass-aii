<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    //Champs modifiable
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname' ,
        'lastname',
        'avatar' ,
        'role' ,
        'instruments_id',
        'posts_id',
        'post_id' ,
        'resume' ,
        'content' ,
        'prof' ,
        'subscription'
    ];

    //champs cachés
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Relations
     */

    public function instruments(){
        return $this->belongsToMany('App\Instrument') ;
    }

    public function posts(){
        return $this->belongsToMany('App\Post') ;
    }
    public function post(){
        return $this->hasMany('App\Post');
    }

    /*
     * Inscription
     */

    public function subscriptions_cours() {
        return $this->belongsToMany('App\Cours', 'subscriptions_cours') ;
    }

    public function subscriptions() {
        return DB::table('subscriptions_masterclass')
            ->where('user_id', $this->id)
            ->get();
    }

    /*
     * Getter
     */
    //retourne l'avatar de l'utilisateur
    public function getAvatarAttribute($avatar){
        if($avatar) {
            return "/images/avatars/users/{$this->id}.png" ;
        } else {
            return false ;
        }
    }


    public
    function getInstrumentsIdAttribute($instrument_id){
        if($this->id){
            return $this->instruments->lists('id')->toArray() ;
        }
        return [] ;
    }

    public function getPostsIdAttribute($post_id){
        if($this->id){
            return $this->posts()->lists('id')->toArray() ;
        }
        return [] ;
    }

    /*
     * Setter
     */
    public function setAvatarAttribute($avatar) {
        if(is_object($avatar) && $avatar->isValid()){
            // Image est un composant externe a laravel pour l'importer "compose require intervention/image"
            ImageManagerStatic::make($avatar)/*->resize(150,150)*/->save(public_path()."/images/avatars/users/{$this->id}.png") ;
            $this->attributes['avatar'] = true ;
        }
    }

    public function setInstrumentsIdAttribute($instrument_id){
        self::saved(function($instance) use ($instrument_id) {
            return $instance->instruments()->sync($instrument_id) ;
        });
    }

    public function setPostsIdAttribute($post_id){
        self::saved(function($instance) use ($post_id) {
            return $instance->posts()->sync($post_id) ;
        });
    }

    public static function Prof() {
        $prof = User::get()
                    ->where('prof' , 1 ) ;
        return $prof ;
    }


}


