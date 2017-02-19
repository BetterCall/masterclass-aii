<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Validator;

class UpdatePostsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required' ,
            'image' => 'image' ,
            'masterclass_id' => 'required'
        ];

        if ($this->method() == 'POST') {
            $rules['image'] = '|required' ;
        }

        return $rules ;
    }
}
