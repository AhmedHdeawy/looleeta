<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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


        $rules = [
            'categories_id'     =>  'required',
            'articles_title'    =>  'required|min:2|max:40',
            'articles_desc'     =>  'required|min:2',
            'articles_img'      =>  'required|image:png,jpg,jpeg,svg',
        ];

        if($this->method('PATCH')) {
              $rules['articles_img' ] = 'image:png,jpg,jpeg,svg';
        }

        
        return $rules;
    }
}
