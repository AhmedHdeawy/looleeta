<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
            'ads_link'  => 'required|min:2|max:40',
            'ads_type'       =>  'required',
            'ads_img'   =>  'required',
        ];

        // if(Request::get('ads_type') == 'lat') {
        //     $rules['ads_img'] = 'required|dimensions:min_width=725,min_height=88';
        // }

        // if(Request::get('ads_type') == 'lang') {
        //     $rules['ads_img'] = 'required|dimensions:min_width=300,min_height=400';
        // }

        
        return $rules;
    }
}
