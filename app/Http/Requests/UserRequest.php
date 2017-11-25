<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $rules = [];

        $rules = [
            'name'  => 'required|min:2|max:40',
            'email' =>  'required|email',
            'image' =>  'image',
        ];

        if($this->method('patch')) {
            $rules['email'] = 'required|email|unique:users,email,'. Request::get('id') .',id';
        }
        // dd($rules);
        return $rules;
    }
}
