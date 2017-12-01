<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the category is authorized to make this request.
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
        // dd($this->categories_id);
        $rules = [
            'categories_name'  => 'required|min:2|max:40|unique:categories',
            'parents_id'       =>  'required',
        ];

        if($this->method('patch')) {
            $rules['categories_name'] = 
            'required|min:2|max:40|unique:categories,categories_name,'. $this->categories_id .',categories_id';
        }

        
        return $rules;
    }
}
