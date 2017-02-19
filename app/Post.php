<?php

namespace App;



use Intervention\Image\ImageManagerStatic;

class Post extends Model
{
    public $fillable = ['name' , 'content' , 'image' , 'user_id' , 'masterclass_id' , 'users_id'] ;
    public $formats = [
        "thumb" => [360,200],
        "large" => [940,530]
    ];

    public static function boot(){
        parent::boot();
        static::deleted(function($instance){
            $instance->detachImage();
            return true;
        });
    }

    public function detachImage(){
        unlink($this->getImageDir() . "/{$this->id}.{$this->image}");
        foreach($this->formats as $format => $dimensions){
            unlink(public_path() . $this->image($format));
        }
    }


    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function getImagePath($size){
        return '/' . $this->getImageDir() . '/' . $this->id . '_' . $size . '.jpg';
    }


    /**
     *
     * @return string
     */
    public function getImageDir(){
        return 'images/photos/' . ceil($this->id / 1000);
    }

    /**
     * @param $image
     */

    /*
    public function setImageAttribute($image){
        if(is_object($image) && $image->isValid()){
            if(!empty($this->image)){
                unlink($this->getImageDir() . "/{$this->id}.{$this->image}");
            }
            self::saved(function($instance) use ($image) {
                $image = $image->move($instance->getImageDir(), $instance->id . '.' . $image->getClientOriginalExtension());
                foreach($instance->formats as $format => $dimensions){
                    ImageManagerStatic::make($image)->fit($dimensions[0],$dimensions[1])->save(public_path() . $instance->image($format));
                }
            });
            $this->attributes['image'] = $image->getClientOriginalExtension();
        }
    }
    */

    public function setImageAttribute($image) {
        if(is_object($image) && $image->isValid() ){

            if(!empty($this->image)){
                unlink($this->getImageDir() ."{$this->id}.{$this->image}") ;
            }
            self::saved(function($instance) use ($image) {
                $image = $image->move($instance->getImageDir() , $instance->id .'.' . $image->getClientOriginalExtension()) ;
                foreach($instance->formats as $format => $dimensions) {

                    ImageManagerStatic::make($image)->fit($dimensions[0] , $dimensions[1])->save(public_path(). $instance->getImagePath($format)) ;
                }
            });
            $this->attributes['image'] = $image->getClientOriginalExtension() ;

        }
    }

    public function setUsersIdAttribute($users_id){
        self::saved(function($instance) use ($users_id) {
            $instance->users()->sync($users_id);
        });
    }

    public function getUsersIdAttribute(){
        if($this->id){
            return $this->users->lists('id');
        }
        return [];
    }

/**
    public function scopeSubscribedBy($query, $user){
        $pets_ids = \DB::table('subscriptions')->where('user_id', $user->id)->lists('pet_id');
        return $query
            ->select('posts.*')
            ->join('pet_post', 'pet_post.post_id', '=', 'posts.id')
            ->whereIn('pet_post.pet_id', $pets_ids);
    }
    **/


}
