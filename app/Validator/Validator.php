<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 06/02/2017
 * Time: 20:06
 */

namespace App\Validator;

use Intervention\Image\ImageManagerStatic;

class Validator extends \Illuminate\Validation\Validator
{

    /**
     * Check if users tags on post exist
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * return true if valid else false
     */
    public function validateUser($attribute , $value , $parameters ) {
        $users_count = User::whereIn('id', $value)-> count() ;
        return count($value)  == $users_count ;
    }

    /**
     * Validate dimensions of posts
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * return true if valid else false
     */
    public function validateDimensions($attribute , $value , $parameters ) {

        $image = ImageManagerStatic::make($value) ;
        return $image->width() >= $parameters[0] && $image->height() >= $parameters[1] ;
    }

}