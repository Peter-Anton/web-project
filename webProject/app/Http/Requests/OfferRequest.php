<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'price'=>'required|numeric',
            'description'=>'required',
            'photo'=>'required|mimes:png,jpg,jpeg',
            'category_id'=>'required',
            'company_id'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'you must enter the name',
            'name.unique'=>'the name already exist',
            'price.required'=>'you must enter the price',
            'price.numeric'=>'you must enter number',
            'description.required'=>'you must enter the name',
            'photo.required'=>'you must enter photo',
            'category_id.required'=>'you must enter the category',
            'company_id.required'=>'you must enter the company',
                    ];
    }
}
